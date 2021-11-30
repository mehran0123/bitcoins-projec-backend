<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class WebLanguage

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
        if ($request->session()->has('web_lang'))
         {
            \App::setLocale($request->session()->get('web_lang'));
        }
        return $next($request);
    }
}
