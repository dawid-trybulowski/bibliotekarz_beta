<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\Admin\AdminLocationService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminLocationController
{

    private $configAll;

    private $configService;

    private $config;

    private $adminLocationService;

    public function __construct
    (
        Config $configAll,
        ConfigService $configService,
        AdminLocationService $adminLocationService
    )
    {
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
        $this->adminLocationService = $adminLocationService;
    }

    public function editLocationShow(Request $request)
    {
        $locationId = (int)$request->locationId;

        $location = $this->adminLocationService->getLocationById($locationId);

        $compact =
            [
                'location' => $location,
                'config' => $this->config
            ];
        return view('admin/admin-location-edit', compact('compact'));
    }

    public function editLocation(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string'
        ]);

        $message = $this->adminLocationService->editLocation($request);

        return Redirect::back()->with('message', $message);
    }

    public function addLocationShow()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('admin/admin-location-add', compact('compact'));
    }

    public function addLocation(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $message = $this->adminLocationService->addLocation($request);

        return Redirect::back()->with('message', $message);
    }

    public function deleteLocation(Request $request)
    {
        $request->validate([
            'locationId' => 'required|integer'
        ]);

        $message = $this->adminLocationService->deleteLocation($request->locationId);

        return Redirect::back()->with('message', $message);
    }
}