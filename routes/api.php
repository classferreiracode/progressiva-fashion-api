<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{HomeController, ProductController};

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produtos/{slug}', [ProductController::class, 'show']);

Route::get('/home', [HomeController::class, 'index'])
    ->name('api.home.index');
