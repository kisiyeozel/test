<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', 'tr');

        if ($request->has('lang')) {
            $locale = in_array($request->lang, ['tr', 'en']) ? $request->lang : 'tr';
            session(['locale' => $locale]);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
