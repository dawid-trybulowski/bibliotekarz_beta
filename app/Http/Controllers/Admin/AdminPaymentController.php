<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Content\PaymentController;
use App\Http\Services\Admin\AdminPaymentService;
use App\Http\Services\Content\PaymentsService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminPaymentController extends PaymentController
{
    /**
     * @var AdminPaymentService
     */
    private $adminPaymentService;
    /**
     * @var PaymentsService
     */
    private $paymentsService;
    /**
     * @var ConfigService
     */
    private $configService;
    /**
     * @var Config
     */
    private $configAll;

    private $config;

    public function __construct(PaymentsService $paymentsService, AdminPaymentService $adminPaymentService, ConfigService $configService, Config $configAll)
    {
        parent::__construct($paymentsService);
        $this->paymentsService = $paymentsService;
        $this->adminPaymentService = $adminPaymentService;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
    }

    public function setPaymentStatus(Request $request){
        $status = (boolean) $request->status;
        $id = (int)$request->id;

        $message = $this->adminPaymentService->setStatuse($id, $status);

        return Redirect::back()->with('message', $message);
    }
    public function addPaymentShow()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('admin/admin-payment-add', compact('compact'));
    }

    public function addPayment(Request $request)
    {
        $request->validate([
            'userId' => 'required|integer',
            'amount' => 'required|string',
            'method' => 'required|string',
            'status' => 'required|integer|max:1'
        ]);

        $message = $this->adminPaymentService->addPayment($request);

        return Redirect::back()->with('message', $message);
    }
}