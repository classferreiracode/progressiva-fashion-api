<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backoffice\BannersController;
use App\Http\Controllers\Backoffice\ContactsController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\FaqsController;
use App\Http\Controllers\Backoffice\ProductsController;
use App\Http\Controllers\Backoffice\TestimonialsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('/dashboard', '/backoffice')->name('dashboard');

    Route::prefix('backoffice')->name('backoffice.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductsController::class)->except(['show']);
        Route::resource('banners', BannersController::class)->except(['show']);
        Route::resource('faqs', FaqsController::class)->except(['show']);
        Route::resource('testimonials', TestimonialsController::class)->except(['show']);
        Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
