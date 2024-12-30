<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\Backend\Infrastructure\Controllers\{HealthCheckController, LocaleController, TimezoneController};

Route::get('health-check', HealthCheckController::class)->name('health-check');
Route::get('locale', LocaleController::class)->name('locale');
Route::get('timezone', TimezoneController::class)->name('timezone');
