<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetUserLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->header('accept-language', 'en');
        $locale = explode(',', $locale)[0];
        $locale = explode('-', $locale)[0];

        // ضبط اللغة في التطبيق
        app()->setLocale($locale);

        return $next($request);
    }
}
