<?php

namespace Src\Backend\Application\Traits;

use Carbon\Carbon;

trait HasTimezone
{
    public function localTimeZone(): string
    {
        return session()->has('timezone') ? session('timezone') : config('app.timezone');
    }
}
