<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Currency;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        if(!session('currency')){
            session(['currency'=> ['code'=> 'NGN','symbol'=> '₦']]);
        }
        View::composer('layouts.app', function ($view) {
            $currencies = Currency::all();
            $view->with('currencies',$currencies);
        });
        // View::composer('layouts.menubar', function ($view) {
        //     $carts = Cart::where('ipaddress',request()->ip())->whereDoesntHave('payment',function($query) {$query->where('status','success');})->get();
        //     $view->with('carts',$carts);
        // });
    }
}
