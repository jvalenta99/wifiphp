<?php

namespace App\Http\Middleware;

use Closure;

use Lang;
use Illuminate\Support\Facades\Session;

class LanguageSwitch
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

        Lang::setLocale(Session::get('locale'));
        return $next($request);


    }
}
