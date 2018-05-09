<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 09.03.2018
 * Time: 19:38
 */

namespace App\Http\Controllers\Content;


use App\Http\Services\Content\BorrowsService;
use App\Http\Services\Content\PaymentsService;
use App\Http\Services\Content\ReservationsService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use Illuminate\Support\Facades\Auth;

class UserDashboardController
{

    /**
     * @var Config
     */
    private $config;
    /**
     * @var Config
     */
    private $configAll;
    /**
     * @var BorrowsService
     */
    private $borrowsService;
    /**
     * @var ReservationsService
     */
    private $reservationsService;
    /**
     * @var PaymentsService
     */
    private $paymentsService;

    public function __construct
    (
        Config $configAll,
        ConfigService $configService,
        BorrowsService $borrowsService,
        ReservationsService $reservationsService,
        PaymentsService $paymentsService
    )
    {
        $this->configService = $configService;
        $this->configAll = $configAll;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
        $this->borrowsService = $borrowsService;
        $this->reservationsService = $reservationsService;
        $this->paymentsService = $paymentsService;
    }
    public function userDashboardReservationsHistory(){
        $userId = Auth::User()->id;

        $reservations = $this->reservationsService->getReservationsByUserId($userId);

        $compact =
            [
                'reservations' => $reservations,
                'config' => $this->config
            ];
        return view('user-dashboard-reservations-history', compact('compact'));
    }

    public function userDashboardBorrowsHistory(){
        $userId = Auth::User()->id;

        $borrows = $this->borrowsService->getPreparedBorrows($userId);

        $compact =
            [
                'borrows' => $borrows,
                'config' => $this->config
            ];
        return view('user-dashboard-borrows-history', compact('compact'));
    }

    public function userDashboardPayments() {
        $userId = Auth::User()->id;

        $payments = $this->paymentsService->getPaymentsByUserId($userId);
        $delayedBorrows = $this->borrowsService->getDelayedBorrowsByUserId($userId);

        $compact =
            [
                'payments' => $payments,
                'delayedBorrows' => $delayedBorrows,
                'config' => $this->config
            ];
        return view('user-dashboard-payments', compact('compact'));
    }
}