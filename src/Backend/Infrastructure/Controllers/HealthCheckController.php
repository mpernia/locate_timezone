<?php

namespace Src\Backend\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HealthCheckController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(
            data: ['status' => 'OK', 'message' => 'Server is running'],
            status: Response::HTTP_OK
        );
    }
}
