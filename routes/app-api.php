<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| Api Routes - Generated by Vemto
|--------------------------------------------------------------------------
|
| It is not recommended to edit this file directly. Although you can do so,
| it will generate a conflict on Vemto's next build.
|
*/

Route::name('api.')
    ->prefix('api')
    ->group(function () {
        Route::post('/login', [AuthController::class, 'login'])->name(
            'api.login'
        );

        Route::middleware('auth:sanctum')->group(function () {});

        Route::get('/produtos', [ProductController::class, 'index']);
        Route::get('/produtos/{slug}', [ProductController::class, 'show']);
    });
