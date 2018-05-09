<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Content\PaymentController;
use App\Http\Services\Admin\AdminPaymentService;
use App\Http\Services\Content\PaymentsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminPaymentController extends PaymentController
{
    /**
     * @var AdminPaymentService
     */
    private $adminPaymentService;

    public function __construct(PaymentsService $paymentsService, AdminPaymentService $adminPaymentService)
    {
        parent::__construct($paymentsService);
        $this->adminPaymentService = $adminPaymentService;
    }

    public function setPaymentStatus(Request $request){
        $status = (boolean) $request->status;
        $id = (int)$request->id;

        $message = $this->adminPaymentService->setStatuse($id, $status);

        return Redirect::back()->with('message', $message);
    }
}