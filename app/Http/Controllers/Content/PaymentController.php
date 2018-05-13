<?php

namespace App\Http\Controllers\Content;

use App\Http\Services\Content\PaymentsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController
{
    /**
     * @var PaymentsService
     */
    private $paymentsService;

    public function __construct
    (
        PaymentsService $paymentsService
    )
    {
        $this->paymentsService = $paymentsService;
    }

    public function przelewy24Payment(Request $request){
        $amount = (float)$request->amount;

        $message = $this->paymentsService->przelewy24Payment($amount);
        if($message->success){
            return Redirect::away($message->content);
        }
        else{
            return Redirect::back()->with('message', $message);
        }
    }

    public function przelewy24PaymentTrnVerify(Request $request){
        return $this->paymentsService->przelewy24PaymentTrnVerify($request);
    }
}