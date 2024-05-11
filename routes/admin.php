<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\TransactionsController;


Route::group(['prefix'=> 'admin','as'=> 'admin.'],function () {
    Route::group(['middleware'=> ['auth','active','verified','role:admin']],function () {

        Route::get('dashboard', [UserController::class, 'admin'])->name('dashboard');
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::post('profile/update', [UserController::class, 'profile_update'])->name('profile.update');

        Route::group(['prefix'=>'users','as'=> 'users.'],function(){
            Route::group(['middleware'=> ['role:staff']],function () {
                Route::get('staff', [UserController::class, 'staff'])->name('staff');
                Route::post('manage', [UserController::class, 'manage'])->name('manage');
            });
            Route::get('customers', [UserController::class, 'customers'])->middleware('role:customers')->name('customers');
            Route::group(['middleware'=> ['role:affiliates']],function () {
                Route::get('affiliates', [UserController::class, 'affiliates'])->name('affiliates');
                Route::post('affiliates', [UserController::class, 'affiliates_commission'])->name('affiliates');
            });
        });
        
        Route::group(['middleware'=> 'role:categories','prefix'=>'categories','as'=> 'categories.'],function(){
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('create', [CategoryController::class, 'create'])->name('create');
            Route::post('store', [CategoryController::class, 'store'])->name('store');
            Route::get('edit/{training}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('update', [CategoryController::class, 'update'])->name('update');
            Route::post('delete', [CategoryController::class, 'delete'])->name('delete');
        });

        Route::group(['middleware'=> 'role:products','prefix'=>'products','as'=> 'products.'],function(){
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('create', [ProductController::class, 'create'])->name('create');
            Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
            Route::post('store', [ProductController::class, 'store'])->name('store');
            Route::post('update', [ProductController::class, 'update'])->name('update');
            Route::post('delete', [ProductController::class, 'delete'])->name('delete');
        });

        Route::group(['middleware'=> 'role:orders','prefix'=>'orders','as'=> 'orders.'],function(){
            Route::get('/', [OrderController::class, 'browse'])->name('browse');
            Route::get('view/{order}', [OrderController::class, 'read'])->name('read');
            Route::post('status', [OrderController::class, 'edit'])->name('edit');
        });

        Route::group(['middleware'=> 'role:settings','prefix'=>'settings','as'=> 'settings.'],function(){
            Route::get('/', [SettingsController::class, 'index'])->name('index');
            Route::post('currencies', [SettingsController::class, 'currencies'])->name('currencies');
            Route::post('counters', [SettingsController::class, 'counters'])->name('counters');
        });

        Route::group(['middleware'=> 'role:shipments','prefix'=>'shipment','as'=> 'shipment.'],function(){
            Route::group(['prefix'=>'rates','as'=> 'rates.'],function(){
                Route::get('/', [ShipmentController::class, 'index'])->name('index');
                Route::get('create', [ShipmentController::class, 'create'])->name('create');
                Route::get('edit/{rate}', [ShipmentController::class, 'edit'])->name('edit');
                Route::post('store', [ShipmentController::class, 'store'])->name('store');
                Route::post('update', [ShipmentController::class, 'update'])->name('update');
                Route::post('delete', [ShipmentController::class, 'destroy'])->name('destroy');
                
            });
            Route::get('packages', [ShipmentController::class, 'packages'])->name('packages');
        });


        Route::group(['middleware'=> 'role:posts','prefix'=>'posts','as'=> 'post.'],function(){
            Route::get('/', [NewsController::class, 'index'])->name('index');
            Route::get('create', [NewsController::class, 'create'])->name('create');
            Route::get('edit/{post}', [NewsController::class, 'edit'])->name('edit');
            Route::post('store', [NewsController::class, 'store'])->name('store');
            Route::post('update', [NewsController::class, 'update'])->name('update');
            Route::post('delete', [NewsController::class, 'delete'])->name('delete');
        });


        Route::group(['prefix'=>'transactions','as'=> 'transactions.'],function(){
            Route::get('payments', [TransactionsController::class, 'payments'])->middleware('role:payments')->name('payments');
            Route::group(['middleware'=> 'role:settlements'],function(){
                Route::get('settlements', [TransactionsController::class, 'settlements'])->name('settlements');
                Route::post('settlements', [TransactionsController::class, 'manage'])->name('settlements');
                Route::post('settlements/pay', [TransactionsController::class, 'pay'])->name('settlements.pay');
            });
            Route::get('revenues', [TransactionsController::class, 'revenues'])->middleware('role:revenues')->name('revenues');

        });

        Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });

    });
});