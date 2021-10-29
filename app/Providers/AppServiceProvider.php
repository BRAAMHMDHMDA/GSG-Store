<?php

namespace App\Providers;

use App\Http\Traits\CartTrait;
use App\View\Composers\CartComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    use CartTrait;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
//        View::share('cart', $this->getCart());
        View::composer(['website.shopping-proccess.checkout', 'website.shopping-proccess.cart', 'website.shopping-proccess.cart-menu'],
            CartComposer::class);

    }
}
