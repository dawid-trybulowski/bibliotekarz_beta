<?php


namespace App\Http\Services\Admin;

use App\Http\Entities\GeneralSettingsEntity;
use App\Http\Entities\PaymentsSettingsEntity;
use App\Http\Entities\ViewSettingsEntity;
use App\Http\Helpers\Message;
use App\Http\Services\Shared\ConfigService;
use App\Mappers\GeneralSettingsMapper;

class AdminConfigService extends ConfigService
{
    public function updateGeneralSettings($request)
    {
        $mapper = new GeneralSettingsMapper();
        $map = [];
        foreach ($mapper->map as $key => $value) {
            $map[$value] = $request[$value];
        }

        $generalSettingsEntity = $this->createGeneraSettingsEntity($map);

        if ($this->config->updateGeneralSettings($mapper, $generalSettingsEntity)) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }

        return $message;
    }

    public function createGeneraSettingsEntity($map)
    {
        $generalSettingsEntity = new GeneralSettingsEntity();
        $generalSettingsEntity->setReservationTime((int)$map['reservationTime']);
        $generalSettingsEntity->setMaxReservationCount((int)$map['maxReservationCount']);
        $generalSettingsEntity->setBorrowTime((int)$map['borrowTime']);
        $generalSettingsEntity->setReservationWithoutVerification((int)$map['reservationWithoutVerification']);
        $generalSettingsEntity->setLibraryName($map['libraryName']);
        $generalSettingsEntity->setLibraryPhone($map['libraryPhone']);
        $generalSettingsEntity->setLibraryAddress($map['libraryAddress']);
        $generalSettingsEntity->setLibraryEmail($map['libraryEmail']);
        return $generalSettingsEntity;
    }

    public function updatePaymentsSettings($request)
    {
        $PaymentsData =
            [
                'account_number' => $request->accountNumber,
                'payment_title' => $request->paymentTitle,
                'receiver' => $request->receiver,
                'address' => $request->address,
            ];
        $PaymentsData = json_encode($PaymentsData);

        $przelewy24Status = $request->przelewy24Status;

        if ($przelewy24Status === 'on') {
            $przelewy24Status = true;
        } else {
            $przelewy24Status = false;
        }
        $przelewy24TestMode = $request->testMode;
        if ($przelewy24TestMode === 'on') {
            $przelewy24TestMode = true;
        } else {
            $przelewy24TestMode = false;
        }

        if ($przelewy24Status) {
            $przelewy24Config =
                [
                    'p24_merchant_id' => $request->p24MerchantId,
                    'p24_pos_id' => $request->p24PosId,
                    'crc' => $request->crc,
                    'test_mode' => $przelewy24TestMode
                ];
        } else {
            $przelewy24Config =
                [
                    'p24_merchant_id' => '',
                    'p24_pos_id' => '',
                    'crc' => '',
                    'test_mode' => false
                ];
        }
        $przelewy24Config = json_encode($przelewy24Config);

        $chargeFee = $request->chargeFee;

        if ($chargeFee === 'on') {
            $chargeFee = true;
        } else {
            $chargeFee = false;
        }

        $delayCost = (int)$request->delayCost;

        $paymentsSettingsEntity = $this->createPaymentsSettingsEntity($PaymentsData, $przelewy24Status, $przelewy24Config, $chargeFee, $delayCost);

        if ($this->config->updatePaymentsSettings($paymentsSettingsEntity)) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function createPaymentsSettingsEntity($PaymentsData, $przelewy24Status, $przelewy24Config, $chargeFee, $delayCost)
    {
        $paymentsSettingsEntity = new PaymentsSettingsEntity();
        $paymentsSettingsEntity->setPaymentData($PaymentsData);
        $paymentsSettingsEntity->setPrzelewy24Status($przelewy24Status);
        $paymentsSettingsEntity->setPrzelewy24Config($przelewy24Config);
        $paymentsSettingsEntity->setCargeFee($chargeFee);
        $paymentsSettingsEntity->setDelayCost($delayCost);
        return $paymentsSettingsEntity;
    }

    public function updateViewSettings($request)
    {
        $booksPerPage = $request->booksPerPage;

        $ageLimit = $request->ageLimit == 'on' ? 1 : 0;

        $viewSettingsEntity = $this->createViewSettingsEntity($booksPerPage, $ageLimit);

        if ($this->config->updateViewSettings($viewSettingsEntity)) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function createViewSettingsEntity($booksPerPage, $ageLimit)
    {
        $viewSettingsEntity = new ViewSettingsEntity();
        $viewSettingsEntity->setBooksPerPage($booksPerPage);
        $viewSettingsEntity->setAgeLimit($ageLimit);
        return $viewSettingsEntity;
    }
}