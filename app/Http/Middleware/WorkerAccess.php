<?php

namespace App\Http\Middleware;

use App\Http\Helpers\Message;
use Closure;
use Illuminate\Support\Facades\Auth;

class WorkerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        if((int)Auth::User()->permissions < 2)
        {
            $message = new Message(__('view.Błąd'), __('view.Brak dostępu do zasobu'), 403, false);
            return redirect('/')->with('message', $message);
        }
        return $next($request);
    }
}