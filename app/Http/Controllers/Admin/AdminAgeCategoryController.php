<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\Admin\AdminAgeCategoryService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminAgeCategoryController
{
    /**
     * @var Config
     */
    private $configAll;
    /**
     * @var ConfigService
     */
    private $configService;

    private $config;
    /**
     * @var AdminAgeCategoryService
     */
    private $adminAgeCategoryService;

    public function __construct
    (
        Config $configAll,
        ConfigService $configService,
        AdminAgeCategoryService $adminAgeCategoryService
    )
    {
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
        $this->adminAgeCategoryService = $adminAgeCategoryService;
    }

    public function editAgeCategoryShow(Request $request)
    {
        $categoryId = (int)$request->ageCategoryId;

        $ageCategory = $this->adminAgeCategoryService->getAgeCategoryById($categoryId);

        $compact =
            [
                'ageCategory' => $ageCategory,
                'config' => $this->config
            ];
        return view('admin/admin-age-category-edit', compact('compact'));
    }

    public function editAgeCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'minAge' => 'required|integer',
            'maxAge' => 'required|integer'
        ]);

        $message = $this->adminAgeCategoryService->editAgeCategory($request);

        return Redirect::back()->with('message', $message);
    }

    public function addAgeCategoryShow()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('admin/admin-age-category-add', compact('compact'));
    }

    public function addAgeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'minAge' => 'required|integer',
            'maxAge' => 'required|integer'
        ]);

        $message = $this->adminAgeCategoryService->addAgeCategory($request);

        return Redirect::back()->with('message', $message);
    }

    public function deleteAgeCategory(Request $request)
    {
        $request->validate([
            'ageCategoryId' => 'required|integer'
        ]);

        $message = $this->adminAgeCategoryService->deleteCategory($request->ageCategoryId);

        return Redirect::back()->with('message', $message);
    }
}