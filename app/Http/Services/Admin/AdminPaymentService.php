<?php


namespace App\Http\Services\Admin;


use App\Http\Helpers\Message;
use App\Http\Services\Content\PaymentsService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use App\Models\Payments;
use App\Models\User;

class AdminPaymentService extends PaymentsService
{
    public function __construct(Payments $payments, Config $configAll, ConfigService $configService, User $user)
    {
        parent::__construct($payments, $configAll, $configService, $user);
    }

    public function getAllPayments($request)
    {
        if ($request->searchBy) {
            return $this->payments->searchByAndSortBy($request);
        }
        return $this->payments->getAllPayments();
    }

    public function setStatuse($id, $status)
    {
        $result = $this->payments
            ->where('id', $id)
            ->update
            (
                [
                    'status' => $status
                ]
            );
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }
}