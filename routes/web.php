<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/cart', function () {
    return view('front.cart');
})->name('cart');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('back.admin');
    })->name('admin');

    Route::post('/order', [HomeController::class, 'order'])->name('order');

    //Allow Only Admin See This Routes
    Route::middleware(['admin'])->group(function () {

        // Admin Cars Routes
        Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
        Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
        Route::post('/cars/create', [CarController::class, 'store'])->name('cars.store');
        Route::get('/cars/{car}', [CarController::class, 'edit'])->name('cars.edit');
        Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
        Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.delete');
        Route::put('/cars/approve/{car}', [CarController::class, 'approveCar'])->name('cars.approveCar');
        Route::put('/cars/dissaprove/{car}', [CarController::class, 'disapproveCar'])->name('cars.disapproveCar');

        // Admin Tags Routes
        Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
        Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
        Route::post('/tags/create', [TagController::class, 'store'])->name('tags.store');
        Route::get('/tags/{tag}', [TagController::class, 'edit'])->name('tags.edit');
        Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
        Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

        //Admin Order Routes
        Route::get('/orders', [OrderController::class, 'getAllOrders'])->name('orders.index');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    });
});


Auth::routes();
