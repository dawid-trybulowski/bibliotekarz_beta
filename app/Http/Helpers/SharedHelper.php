<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 10.03.2018
 * Time: 16:45
 */

namespace App\Http\Helpers;


use Illuminate\Support\Facades\Redirect;

class SharedHelper
{
    public function Redirector(array $message) {
        return redirect()->route('login');
    }
}