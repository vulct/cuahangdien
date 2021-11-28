<?php

namespace App\Providers;

use App\Http\View\Composers\BannerComposer;
use App\Http\View\Composers\BlogComposer;
use App\Http\View\Composers\BrandComposer;
use App\Http\View\Composers\BrandsWithCategoryComposer;
use App\Http\View\Composers\InfoComposer;
use App\Http\View\Composers\MenuComposer;
use App\Http\View\Composers\PageComposer;
use App\Http\View\Composers\ProductComposer;
use App\Http\View\Composers\StaffComposer;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['guest.layouts.menu','index', 'guest.brands.list'], MenuComposer::class);

        View::composer('index', BannerComposer::class);

        View::composer(['index', 'guest.layouts.product'], BrandComposer::class);

        View::composer(['index', 'guest.layouts.product','guest.brands.list'], BrandsWithCategoryComposer::class);

        View::composer(['*'], InfoComposer::class);

        View::composer(['index', 'guest.layouts.footer', 'guest.layouts.menu'], PageComposer::class);

        View::composer(['guest.layouts.footer', 'guest.products.detail'], StaffComposer::class);

        View::composer('index', BlogComposer::class);

        View::composer('guest.layouts.product', ProductComposer::class);
    }
}
