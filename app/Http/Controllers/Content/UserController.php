<?php

namespace App\Http\Controllers\Content;


use App\Http\Controllers\Controller;
use App\Http\Helpers\SharedHelper;
use App\Http\Services\Content\UserService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * @var User
     */
    protected $user;
    /**
     * @var UserService
     */
    protected $userService;
    /**
     * @var SharedHelper
     */
    protected $sharedHelper;

    protected $config;
    /**
     * @var Config
     */
    protected $configAll;
    /**
     * @var ConfigService
     */
    protected $configService;

    public function __construct
    (
        User $user,
        UserService $userService,
        SharedHelper $sharedHelper,
        Config $configAll,
        ConfigService $configService
    )
    {
        $this->user = $user;
        $this->userService = $userService;
        $this->sharedHelper = $sharedHelper;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
    }

    public function UserDataLoginEdit(Request $request){
        $request->validate([
            'userId' => 'required|numeric|min:1',
            'login' => 'required|string|max:255|confirmed|unique:users,login,' . (int)$request->userId,
            'password' => 'required|string|min:6|confirmed'
        ]);

        $login = filter_var($request->login, FILTER_SANITIZE_STRING);
        $password = $request->password;
        $userId = (int)$request->userId;

        $message = $this->userService->UserDataLoginEdit($userId, $login, $password);

        return Redirect::back()->with('message', $message);
    }

    public function UserDataPersonalEdit(Request $request){
        $request->validate([
            'userId' => 'required|numeric|min:1',
            'email' => 'required|email|max:255',
            'firstName' => 'required|string|max:255',
            'secondName' => 'max:255',
            'surname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'houseNumber' => 'required|numeric|max:255',
            'apartmentNumber' => 'numeric|max:255',
            'postCode' => 'required|string|max:6',
            'birthDate' => 'required|date|max:10'
        ]);

        $userId = (int)$request->userId;
        $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);
        $firstName = filter_var($request->first_name, FILTER_SANITIZE_STRING);
        $secondName = filter_var($request->second_name, FILTER_SANITIZE_STRING);
        $surname = filter_var($request->surname, FILTER_SANITIZE_STRING);
        $houseNumber = (int)$request->houseNumber;
        $street = filter_var($request->street, FILTER_SANITIZE_STRING);
        $city = filter_var($request->city, FILTER_SANITIZE_STRING);
        $apartmentNumber = (int)$request->apartmentNumber;
        $postCode = filter_var($request->postCode, FILTER_SANITIZE_STRING);
        $birthDate = filter_var($request->birthDate, FILTER_SANITIZE_STRING);

        $message = $this->userService->UserDataPersonalEdit($userId, $email, $firstName, $secondName, $surname, $city, $street, $houseNumber, $apartmentNumber, $postCode, $birthDate);

        return Redirect::back()->with('message', $message);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}