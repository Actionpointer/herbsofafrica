<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AddressController;


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

    Route::group(['prefix'=>'addressbook','as'=> 'address.'],function(){
        Route::get('/', [AddressController::class, 'index'])->name('index');
        Route::get('create-address', [AddressController::class, 'create'])->name('create');
        Route::get('edit-address/{address}', [AddressController::class, 'edit'])->name('edit');
        Route::post('store', [AddressController::class, 'store'])->name('store');
        Route::post('update', [AddressController::class, 'update'])->name('update');
        Route::post('delete', [AddressController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix'=>'reviews','as'=> 'reviews.'],function(){
        Route::post('store', [ReviewController::class, 'store'])->name('store');
    });

});