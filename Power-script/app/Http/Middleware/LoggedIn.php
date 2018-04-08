<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

use Redirect;

use View;
use Cookie;
use Response;
use App\Settings;
use App\User;

class LoggedIn
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
        $tok = Cookie::make('token', csrf_token(), 30);
        if (Auth::check() && Auth::user()->status=='1') {
            return $next($request);
        } elseif (!Auth::Check()) {
            
            return Redirect('/');
        } else {
            $view = View::make('auth.verify');

            return Response::make($view)->withCookie($tok);
        }
    }
}
