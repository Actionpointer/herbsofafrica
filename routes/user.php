<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;


Route::group(['middleware'=> ['auth','active','verified']],function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('password', [UserController::class, 'password_update'])->name('password_update');
    Route::post('profile_update', [UserController::class, 'profile_update'])->name('profile.update');
    

    Route::group(['prefix'=>'orders','as'=> 'orders.'],function(){
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('view/{order}', [OrderController::class, 'show'])->name('view');
        Route::post('status', [OrderController::class, 'edit'])->name('edit');
    });


});