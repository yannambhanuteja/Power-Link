<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

use Redirect;

use View;
use Cookie;
use Response;
use App\Settings;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $Settings = Settings::orderBy('created_at', 'desc')->first();
        $tok = Cookie::make('token', csrf_token(), 30);

        if (Auth::check()) {
            return Redirect('/home');
        }

        if ($Settings && $Settings->mail_conform == 'yes') {
            $view = View::make('auth.verifyemail');

            return Response::make($view)->withCookie($tok);
        } else {
            $view = View::make('auth.register');

            return Response::make($view)->withCookie($tok);
        }
    }
}
