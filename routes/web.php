<?php


use App\Http\Controllers\Admin\Auth\AccountController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\TariffController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('index');
});

Route::get('/admin/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/auth/login', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {

    Route::name('admin.')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name('dashboard');
            Route::get('/dashboard', [HomeController::class, 'index']);

            #Categories of products
            Route::resource('/categories',CategoryController::class);

            #Categories of posts
            Route::get('/categories_post',[CategoryController::class,'getCategoriesOfPost'])->name('categories_post');

            Route::get('/categories_post/create',[CategoryController::class,'createCategoriesOfPost'])->name('categories_post.create');

            Route::post('/categories_post/create',[CategoryController::class,'storeCategoriesOfPost'])->name('categories_post.store');

            Route::get('/categories_post/{category}',[CategoryController::class,'showCategoriesOfPost'])->name('categories_post.show');

            Route::get('/categories_post/{category}/edit',[CategoryController::class,'editCategoriesOfPost'])->name('categories_post.edit');

            Route::patch('/categories_post/{category}',[CategoryController::class,'updateCategoriesOfPost'])->name('categories_post.update');

            Route::delete('/categories_post/destroy',[CategoryController::class,'destroy'])->name('categories_post.destroy');


            #Posts
            Route::resource('/posts',PostController::class);

            #Price list - tariff
            Route::resource('/tariffs',TariffController::class);

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

            #Logout
            Route::post('logout', [LoginController::class, 'logout'])->name('logout');

            #Info Account Admin
            Route::resource('/account',AccountController::class);
            Route::post('/account',[AccountController::class, 'change'])->name('account.change');
        });
    });

});
