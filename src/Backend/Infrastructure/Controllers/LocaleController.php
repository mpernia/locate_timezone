<?php

namespace Src\Backend\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LocaleController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(
            data: ['status' => 'OK', 'message' => trans('app::messages.welcome')],
            status: Response::HTTP_OK
        );
    }
}
