<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Content\UserController;
use App\Http\Helpers\SharedHelper;
use App\Http\Services\Admin\AdminUserService;
use App\Http\Services\Content\UserService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminUserController extends UserController
{
    /**
     * @var AdminUserService
     */
    private $adminUserService;

    public function __construct(User $user, UserService $userService, SharedHelper $sharedHelper, Config $configAll, ConfigService $configService, AdminUserService $adminUserService)
    {
        parent::__construct($user, $userService, $sharedHelper, $configAll, $configService);
        $this->adminUserService = $adminUserService;
    }

    public function closeAccount(Request $request)
    {
        $userId = (int)$request->userId;
        $message = $this->adminUserService->changeUserAccountStatus($userId, 2);

        return Redirect::back()->with('message', $message);
    }

    public function OpenAccount(Request $request)
    {
        $userId = (int)$request->userId;
        $message = $this->adminUserService->changeUserAccountStatus($userId, 0);

        return Redirect::back()->with('message', $message);
    }

    public function editUserShow(Request $request)
    {
        $userId = (int)$request->userId;
        $user = $this->adminUserService->getUserById($userId);

        $compact =
            [
                'user' => $user,
                'config' => $this->config
            ];

        return view('admin/admin-user-edit', compact('compact'));
    }

    public function editUser(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users,email,' . (int)$request->id,
            'login' => 'required|string|min:1|unique:users,login,' . (int)$request->id,
            'firstName' => 'required|string|max:255',
            'secondName' => 'max:255',
            'surname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'houseNumber' => 'required|string|max:255',
            'apartmentNumber' => 'max:255',
            'postCode' => 'required|string|max:6',
            'birthDate' => 'required|date|max:10',
            'cardNumber' => 'max:255',
            'status' => 'required|integer|max:3',
            'debt' => 'required|integer'
        ]);

        $message = $this->adminUserService->editUser($request);

        return Redirect::back()->with('message', $message);
    }

    public function editPermittedUserShow(Request $request)
    {
        $userId = (int)$request->userId;
        $user = $this->adminUserService->getUserById($userId);

        $compact =
            [
                'user' => $user,
                'config' => $this->config
            ];

        return view('admin/admin-permitted-user-edit', compact('compact'));
    }

    public function editPermittedUser(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users,email,' . (int)$request->id,
            'login' => 'required|string|min:1|unique:users,login,' . (int)$request->id,
            'firstName' => 'required|string|max:255',
            'secondName' => 'max:255',
            'surname' => 'required|string|max:255',
            'status' => 'required|integer|max:3',
            'permissions' => 'required|integer'
        ]);

        $message = $this->adminUserService->editPermittedUser($request);

        return Redirect::back()->with('message', $message);
    }

    public function addPermittedUserShow()
    {
        $compact =
            [
                'config' => $this->config
            ];

        return view('admin/admin-permitted-user-add', compact('compact'));
    }

    public function addPermittedUser(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . (int)$request->id,
            'login' => 'required|string|min:1|unique:users,login,' . (int)$request->id,
            'password' => 'required|string|min:6|confirmed',
            'firstName' => 'required|string|max:255',
            'secondName' => 'max:255',
            'surname' => 'required|string|max:255',
            'permissions' => 'required|integer',
            'status' => 'required|integer',
        ]);
        $message = $this->adminUserService->addPermittedUser($request);

        return Redirect::back()->with('message', $message);
    }
}