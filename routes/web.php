<?php


use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ShippingController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('welcome');
});

Route::get('/admin/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/auth/login', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {

    Route::name('admin.')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name('dashboard');
            Route::get('/dashboard', [HomeController::class, 'index']);

            #Categories
            Route::resource('/categories',CategoryController::class);

            #Brands
            Route::resource('/brands',BrandController::class);

            #Shipping Methods
            Route::resource('/shipping_methods',ShippingController::class);

            #Products
            Route::resource('/products', ProductController::class);

            #Pages
            Route::resource('/pages', PageController::class);

            #Reviews
            Route::resource('/reviews', CommentController::class);

            #Comments
            Route::get('/comments', [CommentController::class, 'listCommentPost'])->name('comments');

            #Contacts
            Route::get('/contacts', [CommentController::class, 'listContact'])->name('contacts');

            #Info
            Route::resource('/info', InfoController::class);

            #Banners
            Route::resource('/banners',BannerController::class);
        });
    });

});
