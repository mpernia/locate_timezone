<?php

namespace Src\Backend\Application\Services;

use DateTime;
use DateTimeZone;
use Src\Backend\Application\Traits\HasTimezone;

class DateTimeService
{
    use HasTimezone;

    public static function toUTC(string $date, string $timeZone): DateTime
    {
        $dateTime = new DateTime($date, new DateTimeZone($timeZone));
        $dateTime->setTimezone(new DateTimeZone('UTC'));
        return $dateTime;
    }
    public static function toLocal(string $date): DateTime
    {
        $timeZone = (new self)->localTimeZone();
        $dateTime = new DateTime($date, new DateTimeZone('UTC'));
        $dateTime->setTimezone(new DateTimeZone($timeZone));
        return $dateTime;
    }
}
