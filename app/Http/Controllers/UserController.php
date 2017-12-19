<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mockery\Exception;

class UserController extends Controller
{

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function changeLoginData(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users|confirmed',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(
                    [
                        'email' => $request->post('email'),
                        'password' => $request->post('password')
                    ]
                );
            $message = 'Dane zostały zmienione';
        } catch (Exception $e) {
            $message = 'Wystąpił błąd';
        }
        return Redirect::back()->with('message', $message);
    }

}
