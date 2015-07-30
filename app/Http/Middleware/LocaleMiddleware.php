<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Auth;
use Session;

class LocaleMiddleware
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
        if (Auth::user()) {
            App::setLocale(Auth::user()->locale);
        } else {
            if (Session::has('locale')) {
                $locale = Session::get('locale');
                if ($locale) {
                    App::setLocale($locale);
                }
            }
        }

        return $next($request);
    }
}
