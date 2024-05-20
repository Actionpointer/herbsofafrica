<?php

namespace App\Providers;

use App\Models\Currency;
use Illuminate\Support\Facades\URL;
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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        if(!session('currency')){
            session(['currency'=> ['code'=> 'NGN','symbol'=> '₦']]);
        }
        View::composer('layouts.app', function ($view) {
            $currencies = Currency::all();
            $view->with('currencies',$currencies);
        });
    }
}
