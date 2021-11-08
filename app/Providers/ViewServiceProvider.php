<?php

namespace App\Providers;

use App\Http\View\Composers\BannerComposer;
use App\Http\View\Composers\BrandsWithCategoryComposer;
use App\Http\View\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
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
        View::composer(['guest.layouts.menu','index'], MenuComposer::class);

        View::composer('index', BannerComposer::class);

        View::composer('index', BrandsWithCategoryComposer::class);
    }
}
