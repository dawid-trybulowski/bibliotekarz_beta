<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'login' => 'required|string|min:1|unique:users',
            'firstName' => 'required|string|max:255',
            'secondName' => 'max:255',
            'surname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'houseNumber' => 'required|string|max:255',
            'apartmentNumber' => 'max:255',
            'postCode' => 'required|string|max:6',
            'birthDate' => 'required|date|max:10',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $count = User::count();
        if(!$count){
            $permissions = 3;
        }else{
            $permissions = 1;
        }

        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'login' => $data['login'],
            'first_name' => $data['firstName'],
            'second_name' => $data['secondName'],
            'surname' => $data['surname'],
            'city' => $data['city'],
            'street' => $data['street'],
            'house_number' => $data['houseNumber'],
            'apartment_number' => $data['apartmentNumber'],
            'post_code' => $data['postCode'],
            'birth_date' => $data['birthDate'],
            'status' => 0,
            'permissions' => $permissions
        ]);
    }
}
