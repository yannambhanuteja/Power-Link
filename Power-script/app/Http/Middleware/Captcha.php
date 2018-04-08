<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

use Auth;

use Redirect;

use View;
use Cookie;
use Response;
use App\Settings;

class Captcha
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
        $Settings = Settings::orderBy('created_at')->first();
        $tok = Cookie::make('token', csrf_token(), 30);
        if ($Settings && $Settings->captcha=='yes') {
            $view = View::make('captcha');

            return Response::make($view)->withCookie($tok);
        }



        return $next($request)->withCookie($tok);
    }
}
