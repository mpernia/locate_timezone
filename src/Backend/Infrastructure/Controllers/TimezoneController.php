<?php

namespace Src\Backend\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use DateTime;
use DateTimeZone;
use Illuminate\Http\JsonResponse;
use Src\Backend\Application\Services\DateTimeService;
use Symfony\Component\HttpFoundation\Response;

class TimezoneController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $timeZone = 'America/New_York';
        $date = new DateTime('now', new DateTimeZone($timeZone));
        return response()->json(
            data: [
                'status' => 'OK',
                'time' => [
                    'now' => $date,
                    'utc' => DateTimeService::toUTC($date->format('Y-m-d H:i:s'), $timeZone),
                    'local_timezone' => DateTimeService::toLocal($date->format('Y-m-d H:i:s'))
                ]
            ],
            status: Response::HTTP_OK
        );
    }
}
