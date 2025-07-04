<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContatoController;
use App\Http\Controllers\Api\{HomeController, ProductController};

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produtos', [ProductController::class, 'index'])
    ->name('api.produtos.index');

Route::post('/search', [ProductController::class, 'search'])
    ->name('api.produtos.search');

Route::get('/produtos/{slug}', [ProductController::class, 'show'])
    ->name('api.produtos.show');

Route::post('/contato', [ContatoController::class, 'enviar'])
    ->name('api.contato.enviar');

Route::get('/home', [HomeController::class, 'index'])
    ->name('api.home.index');
