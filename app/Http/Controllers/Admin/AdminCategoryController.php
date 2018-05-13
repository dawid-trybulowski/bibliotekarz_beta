<?php


namespace App\Http\Controllers\Admin;


use App\Http\Services\Admin\AdminCategoryService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCategoryController
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
     * @var AdminCategoryService
     */
    private $adminCategoryService;

    public function __construct
    (
        Config $configAll,
        ConfigService $configService,
        AdminCategoryService $adminCategoryService
    )
    {
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
        $this->adminCategoryService = $adminCategoryService;
    }

    public function editCategoryShow(Request $request)
    {
        $categoryId = (int)$request->categoryId;

        $category = $this->adminCategoryService->getCategoryById($categoryId);

        $compact =
            [
                'category' => $category,
                'config' => $this->config
            ];
        return view('admin/admin-category-edit', compact('compact'));
    }

    public function editCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string'
        ]);

        $message = $this->adminCategoryService->editCategory($request);

        return Redirect::back()->with('message', $message);
    }

    public function addCategoryShow()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('admin/admin-category-add', compact('compact'));
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $message = $this->adminCategoryService->addCategory($request);

        return Redirect::back()->with('message', $message);
    }

    public function deleteCategory(Request $request)
    {
        $request->validate([
            'categoryId' => 'required|integer'
        ]);

        $message = $this->adminCategoryService->deleteCategory($request->categoryId);

        return Redirect::back()->with('message', $message);
    }
}