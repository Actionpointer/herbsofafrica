<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TestimonialController;

Route::group(['prefix'=> 'admin','as'=> 'admin.' ,'middleware'=> ['auth','verified']],function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('password', [AdminController::class, 'password_update'])->name('password_update');
    Route::get('users', [AdminController::class, 'admins'])->name('admins');
    Route::post('users', [AdminController::class, 'manage_admins'])->name('admins');
    Route::get('settings', [AdminController::class, 'admins'])->name('settings');

    Route::group(['prefix'=>'categories','as'=> 'categories.'],function(){
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{training}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update', [CategoryController::class, 'update'])->name('update');
        Route::post('delete', [CategoryController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix'=>'products','as'=> 'products.'],function(){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::post('update', [ProductController::class, 'update'])->name('update');
        Route::post('delete', [ProductController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix'=>'orders','as'=> 'orders.'],function(){
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('view/{order}', [PaymentController::class, 'view'])->name('view');
        Route::post('dispatch', [PaymentController::class, 'dispatch'])->name('dispatch');
    });

    Route::group(['prefix'=>'customers','as'=> 'customers.'],function(){
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('view/{order}', [PaymentController::class, 'view'])->name('view');
        Route::post('dispatch', [PaymentController::class, 'dispatch'])->name('dispatch');
    });

    Route::group(['prefix'=>'settings','as'=> 'settings.'],function(){
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::post('currencies', [SettingsController::class, 'currencies'])->name('currencies');
        Route::post('counters', [SettingsController::class, 'counters'])->name('counters');
    });

    Route::group(['prefix'=>'staff','as'=> 'staff.'],function(){
        Route::get('/', [StaffController::class, 'index'])->name('index');
        Route::post('manage', [StaffController::class, 'manage'])->name('manage');
    });

    Route::group(['prefix'=>'posts','as'=> 'post.'],function(){
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('create', [NewsController::class, 'create'])->name('create');
        Route::get('edit/{post}', [NewsController::class, 'edit'])->name('edit');
        Route::post('store', [NewsController::class, 'store'])->name('store');
        Route::post('update', [NewsController::class, 'update'])->name('update');
        Route::post('delete', [NewsController::class, 'delete'])->name('delete');
    });


    Route::group(['prefix'=>'testimonials','as'=> 'testimonials.'],function(){
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::post('manage', [TestimonialController::class, 'manage'])->name('manage');

    });

    Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

});