<?php

namespace App\Http\Services\Content;

use App\Http\Entities\PaymentEntity;
use App\Http\Helpers\Message;
use App\Http\Helpers\Przelewy24;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentsService
{
    /**
     * @var Payments
     */
    protected $payments;
    /**
     * @var Config
     */
    protected $configAll;
    /**
     * @var ConfigService
     */
    protected $configService;

    protected $config;

    protected $przelewy24;
    /**
     * @var User
     */
    protected $user;

    public function __construct
    (
        Payments $payments,
        Config $configAll,
        ConfigService $configService,
        User $user
    )
    {
        $this->payments = $payments;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
        $this->przelewy24 = $przelewy24 = new Przelewy24($this->config['przelewy24_config']['p24_merchant_id'], $this->config['przelewy24_config']['p24_pos_id'], $this->config['przelewy24_config']['crc'], (bool)$this->config['przelewy24_config']['test_mode']);
        $this->user = $user;
    }

    public function getPaymentsByUserId($userId)
    {
        $payments = $this->payments
            ->where('user_id', (int)$userId)
            ->get()
            ->first();
        return $payments;
    }

    public function przelewy24Payment(float $amount)
    {
        $amount = (int)(round($amount, 2) * 100);
        $sessionId = md5($this->config['przelewy24_config']['p24_merchant_id'] . Auth::User()->login . now());
        $userId = Auth::User()->id;
        $data = $this->preparePrzelewy24Data($amount, $sessionId);
        foreach ($data as $key => $value) {
            $this->przelewy24->addValue($key, $value);
        }
        $przelewy24TrnRegister = $this->przelewy24->trnRegister();

        if (!$przelewy24TrnRegister['error'] && $przelewy24TrnRegister['token']) {
            $paymentEntity = $this->createPaymentEntity($userId, $amount, 'PLN', 'Przelewy24', $sessionId);
            if ($this->payments->addPayment($paymentEntity)) {
                return $message = new Message('przelewy24', $this->przelewy24->getHost() . 'trnRequest/' . $przelewy24TrnRegister['token'], 200, true);
            } else {
                return $message = new Message('przelewy24', 'Generowanie transakcji nie powiodło się', 400, false);
            }
        } else {
            return $message = new Message('przelewy24', 'Generowanie transakcji nie powiodło się', 401, false);
        }
    }

    public function preparePrzelewy24Data($amount, $sessionId)
    {
        return
            [
                'p24_merchant_id' => $this->config['przelewy24_config']['p24_merchant_id'],
                'p24_pos_id' => $this->config['przelewy24_config']['p24_pos_id'],
                'p24_session_id' => $sessionId,
                'p24_amount' => (int)round($amount, 2),
                'p24_currency' => 'PLN',
                'p24_description' => 'Płatność użytkownika ' . Auth::User()->login,
                'p24_email' => Auth::User()->email,
                'p24_country' => 'PL',
                'p24_url_return' => 'http://localhost/bibliotekarz_beta/public?session_id=' . $sessionId,
                'p24_url_status' => 'http://localhost/bibliotekarz_beta/public/',
                'p24_api_version' => '3.2',
                'p24_sign' => md5($sessionId . '|' . $this->config['przelewy24_config']['p24_merchant_id'] . '|' . (int)$amount . '|' . 'PLN' . $this->config['przelewy24_config']['crc'])
            ];
    }

    public function createPaymentEntity($userId, $amount, $currency, $method, $sessionId = null, $status = 0)
    {
        $paymentEntity = new PaymentEntity();

        $paymentEntity->setUserId((int)$userId);
        $paymentEntity->setAmount((int)$amount);
        $paymentEntity->setCurrency($currency);
        $paymentEntity->setMethod($method);
        $paymentEntity->setSessionId($sessionId);
        $paymentEntity->setStatus((int)$status);

        return $paymentEntity;
    }

    public function przelewy24PaymentTrnVerify($request)
    {
        $przelewy24Data =
            [
                'p24_merchant_id' => $request->p24_merchant_id,
                'p24_pos_id' => $request->p24_merchant_id,
                'p24_session_id' => $request->p24_session_id,
                'p24_amount' => $request->p24_amount,
                'p24_currency' => $request->p24_currency,
                'p24_order_id' => $request->p24_order_id,
                'p24_method' => $request->p24_method,
                'p24_statement' => $request->p24_statement,
                'p24_sign' => $request->p24_sign
            ];
        $internalPrzelewy24Data = $this->payments->getPaymentDataBySessionId($request->p24_session_id);

        $internalPrzelewy24DataArray =
            [
                'p24_merchant_id' => $this->config['przelewy24_config']['p24_merchant_id'],
                'p24_pos_id' => $this->config['przelewy24_config']['p24_pos_id'],
                'p24_amount' => $internalPrzelewy24Data->amount,
                'p24_currency' => $internalPrzelewy24Data->currency,
                'p24_order_id' => $request->p24_order_id,
                'p24_session_id' => $internalPrzelewy24Data->session_id
            ];

        foreach ($internalPrzelewy24DataArray as $key => $value) {
            $this->przelewy24->addValue($key, $value);
        }
        $result['error'] = 0;
        $user = $this->user->where('id', $internalPrzelewy24Data->user_id)->get()->first();

        if (!$result['error']) {
            $this->payments->updatePaymentStatus($internalPrzelewy24Data->id, 1);
            $this->user->updateUserDebt($user->id, $this->countDebtAfterPayment($user->debt, $internalPrzelewy24Data->amount));
        }

        return $result;
    }

    public function countDebtAfterPayment($debt, $payment)
    {
        return $debt - $payment;
    }
}