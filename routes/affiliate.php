<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AffiliateController;

Route::group(['domain' => "{domain}.".config('app.url'),'as' => 'subdomain.'],function ($domain) {
    Route::get('subdomain', [AffiliateController::class, 'index'])->name('index');
});