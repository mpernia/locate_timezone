<?php

namespace Src\Shared\Infrastructure\Middlewares;

use Closure;
use Carbon\Carbon;

class SetTimeZone
{
    public function handle($request, Closure $next)
    {
        $timezone = $request->header('X-Timezone', config('app.timezone'));

        if (in_array($timezone, timezone_identifiers_list())) {
            session()->put('timezone', $request->header('X-Timezone'));
        }

        return $next($request);
    }
}
