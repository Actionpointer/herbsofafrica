<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AffiliateController;

//register as affiliate
Route::group(['prefix'=>'affiliate','as'=> 'affiliate.'],function(){
    Route::get('/', [AffiliateController::class, 'index'])->name('index'); //intro
    Route::get('signup', [AffiliateController::class, 'signup'])->name('signup'); //register
    Route::post('register', [AffiliateController::class, 'register'])->name('register'); //register
    Route::post('update', [AffiliateController::class, 'update'])->name('update'); //update
    Route::get('bank/account', [AffiliateController::class, 'bankAccountLink'])->name('bank.account');
    Route::post('bank/account/store', [AffiliateController::class, 'storeBankAccount'])->name('bank.account.store');
    Route::get('stripe/onboarding', [AffiliateController::class, 'stripeOnboarding'])->name('stripe.onboarding');
    Route::get('stripe/postboarding', [AffiliateController::class, 'stripePostboarding'])->name('stripe.postboarding');
    Route::get('dashboard', [AffiliateController::class, 'dashboard'])->name('overview');
    Route::post('coupon',[AffiliateController::class,'coupon'])->name('coupon');
});
Route::group(['domain'=> '{domain}.'.config('app.url'),'as'=>'affiliate.'],function () {
    Route::get('/', [WebsiteController::class,'shop'])->name('shop');
    Route::get('product-category/{category}', [WebsiteController::class, 'categories'])->name('shop.category');
    Route::get('product/{product}', [WebsiteController::class, 'product'])->name('product.show');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('product/add-to-cart',[CartController::class,'addtocart'])->name('cart.add');
    Route::post('product/remove-from-cart',[CartController::class,'removefromcart'])->name('cart.remove');
    Route::get('wishlist', [CartController::class, 'wishlist'])->name('wishlist');
    Route::post('wishlist/add',[CartController::class,'addtowish'])->name('product.addtowish');
    Route::post('wishlist/remove',[CartController::class,'removefromwish'])->name('product.removefromwish');

    Route::get('checkout',[CartController::class,'checkout'])->name('checkout');
    Route::post('checkout/pay', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('payment/redirect', [PaymentController::class, 'callback'])->name('payment.callback');
    Route::get('order/confirmation/{payment}', [CartController::class, 'confirmation']);
    include('user.php');
});