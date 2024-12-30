<?php

namespace Src\Shared\Infrastructure\Middlewares;

use Closure;
use Src\Backend\Application\Traits\AcceptLanguage;

class SetLocale
{
    use AcceptLanguage;

    public function handle($request, Closure $next)
    {
        if (!$request->header('X-Language') && !$request->header('Accept-Language')) {
            return $next($request);
        }

        if ($request->header('X-Language')) {
            session()->put('locale', $request->header('X-Language'));
        } elseif ($request->header('Accept-Language')) {
            $locale = $this->localeByFactorWeighting($request->header('Accept-Language'));
            session()->put('locale', $locale);
        }

        $locale = session()->has('locale') ? session('locale') : config('app.locale');

        app()->setLocale(
            $this->isSupportedLocale($locale) ? $locale : config('app.locale')
        );

        return $next($request);
    }
}
