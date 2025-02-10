ls<?php

use App\Http\Controllers\api\v1\ApplicationController;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\VacanciesController;
use App\Http\Controllers\api\v1\ValidationController;
use App\Http\Middleware\VerifyToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {

    Route::prefix('auth')->group(function() {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout'])->middleware(VerifyToken::class);
    });

    Route::middleware(VerifyToken::class)->group(function() {
        Route::prefix('validations')->group(function() {
            Route::post('', [ValidationController::class, 'create']);
            Route::get('', [ValidationController::class, 'get']);
        });

        Route::prefix('job_vacancies')->group(function() {
            Route::get('', [VacanciesController::class, 'get']);
            Route::get('{id}', [VacanciesController::class, 'getDetail']);
        });

        Route::prefix('applications')->group(function() {
            Route::post('', [ApplicationController::class, 'apply']);
            Route::get('', [ApplicationController::class, 'getAll']);
        });
    });
});
