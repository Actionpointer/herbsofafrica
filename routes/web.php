<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebsiteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/', [WebsiteController::class, 'welcome']);
    Route::view('who-we-are', 'webpages.whoweare')->name('about');
    Route::view('faqs', 'webpages.faq')->name('faqs');
    // Route::view('/', 'contact-us');
    // Route::view('/', 'affilaite-register');
    Route::view('terms-of-use', 'webpages.legal.terms-of-use')->name('terms_of_use');
    Route::view('terms-and-conditions', 'webpages.legal.terms-and-conditions')->name('terms_and_conditions');
    Route::view('organic-and-quality', 'webpages.legal.organic-and-quality')->name('organic_and_quality');
    Route::view('customer-reviews-policy', 'webpages.legal.customer-reviews-policy')->name('customer-reviews-policy');
    Route::view('cookie-policy', 'webpages.legal.cookie-policy')->name('cookie_policy');
    Route::view('return-policy', 'webpages.legal.return-policy')->name('return-policy');
    Route::view('privacy-policy', 'webpages.legal.privacy-policy')->name('privacy-policy');
// Route::view('/', 'return-policy');

    Route::get('articles', [WebsiteController::class, 'articles'])->name('articles');
    Route::get('articles/post', [WebsiteController::class, 'post'])->name('articles.post');
    Route::get('services', [WebsiteController::class, 'services'])->name('services');
    Route::get('training', [WebsiteController::class, 'trainings'])->name('training');
    Route::get('training/{training}', [WebsiteController::class, 'training_single'])->name('training.single');
    Route::get('shop', [WebsiteController::class,'shop'])->name('shop');
    Route::get('product-category/{category}', [WebsiteController::class, 'categories'])->name('shop.category');
    Route::get('product/{product}', [WebsiteController::class, 'product'])->name('product.show');
    Route::get('contact', [WebsiteController::class, 'contact'])->name('contact');
    Route::post('contact/store', [WebsiteController::class, 'contact_store'])->name('contact.store');
    Route::get('post', [WebsiteController::class, 'news'])->name('news');
    Route::get('post/single/{slug}', [WebsiteController::class, 'post_single'])->name('post.single');
    Route::get('currency-switcher', [WebsiteController::class, 'switch_currency'])->name('switch_currency');
    Route::get('getCountryStates/{iso}', [WebsiteController::class, 'getCountryStates'])->name('getCountryStates');
    Route::post('verify/account', [WebsiteController::class, 'verify_account'])->name('verify_account');

    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('product/add-to-cart',[CartController::class,'addtocart'])->name('cart.add');
    Route::post('product/remove-from-cart',[CartController::class,'removefromcart'])->name('cart.remove');
    Route::get('wishlist', [CartController::class, 'wishlist'])->name('wishlist');
    Route::post('wishlist/add',[CartController::class,'addtowish'])->name('product.addtowish');
    Route::post('wishlist/remove',[CartController::class,'removefromwish'])->name('product.removefromwish');

    Route::get('checkout',[CartController::class,'checkout'])->name('checkout');
    Route::post('checkout/pay', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('payment/redirect', [PaymentController::class, 'callback'])->name('payment.callback');


    require __DIR__.'/user.php';
    require __DIR__.'/admin.php';
    require __DIR__.'/auth.php';

require __DIR__.'/affiliate.php';


