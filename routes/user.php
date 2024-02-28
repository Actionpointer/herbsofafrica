<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\TestimonialController;

Route::group(['middleware'=> ['auth','verified']],function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('password', [UserController::class, 'password_update'])->name('password_update');
    Route::post('profile_update', [UserController::class, 'profile_update'])->name('profile.update');
    

    Route::group(['prefix'=>'orders','as'=> 'orders.'],function(){
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('view', [OrderController::class, 'show'])->name('view');
    });

    Route::group(['prefix'=>'settings','as'=> 'settings.'],function(){
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::post('currencies', [SettingsController::class, 'currencies'])->name('currencies');
        Route::post('counters', [SettingsController::class, 'counters'])->name('counters');
    });

    Route::group(['prefix'=>'products','as'=> 'products.'],function(){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::post('update', [ProductController::class, 'update'])->name('update');
        Route::post('delete', [ProductController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix'=>'categories','as'=> 'categories.'],function(){
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{training}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update', [CategoryController::class, 'update'])->name('update');
        Route::post('delete', [CategoryController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix'=>'testimonials','as'=> 'testimonials.'],function(){
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::post('manage', [TestimonialController::class, 'manage'])->name('manage');

    });

    Route::group(['prefix'=>'payment','as'=> 'payment.'],function(){
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('view/{order}', [PaymentController::class, 'view'])->name('view');
        Route::post('dispatch', [PaymentController::class, 'dispatch'])->name('dispatch');
    });

});