<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Session::has('admin_lang')) {
            \App::setLocale(\Session::get('admin_lang'));
        }
        return $next($request);
    }
}
