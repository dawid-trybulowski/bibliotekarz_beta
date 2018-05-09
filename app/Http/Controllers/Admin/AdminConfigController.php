<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Content\ConfigController;
use App\Http\Services\Admin\AdminConfigService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminConfigController extends ConfigController
{
    /**
     * @var AdminConfigController
     */
    private $adminConfigService;

    public function __construct(Config $config, ConfigService $configService, AdminConfigService $adminConfigService)
    {
        parent::__construct($config, $configService);
        $this->adminConfigService = $adminConfigService;
    }

    public function updateGeneralSettings(Request $request)
    {
        $request->validate([
            'libraryName' => 'required|string|max:255',
            'libraryAddress' => 'required|string|max:255',
            'libraryPhone' => 'required|string|max:20',
            'libraryEmail' => 'required|email|max:255',
            'reservationTime' => 'required|integer',
            'maxReservationCount' => 'required|integer',
            'borrowTime' => 'required|integer',
            'reservationWithoutVerification' => 'required|string|max:3'
        ]);

        $message = $this->adminConfigService->updateGeneralSettings($request->all());

        return Redirect::back()->with('message', $message);
    }

    public function updatePaymentsSettings(Request $request)
    {

        $message = $this->adminConfigService->updatePaymentsSettings($request);

        return Redirect::back()->with('message', $message);
    }

    public function updateViewSettings(Request $request)
    {
        $message = $this->adminConfigService->updateViewSettings($request);

        return Redirect::back()->with('message', $message);
    }
}