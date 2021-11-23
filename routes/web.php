<?php

use App\Http\Controllers\Admin\Auth\AccountController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TariffController;
use Illuminate\Support\Facades\Route;

#====ROUTE FOR CUSTOMER====#

Route::get('/', function () {
    return view('index');
})->name('index');

#Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

Route::get('/blogs/{category}.html', [BlogController::class, 'getPostWithCategory'])->name('blogs.category');

Route::get('/posts/{post}.html', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');

#Products
Route::get('/san-pham', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');

#Comment and Rate
Route::post('/comments/create', [CommentController::class, 'create']);

Route::post('/comments/rate', [CommentController::class, 'rate']);

#Brands
Route::name('hang.')->group(function () {
    Route::get('/thuong-hieu', [\App\Http\Controllers\BrandController::class, 'list'])->name('index');

    Route::prefix('hang')->group(function () {
        Route::get('/{brand}.html', [\App\Http\Controllers\BrandController::class, 'getProductByBrand'])->name('chitiet');
        Route::get('/{brand}/{category}.html', [\App\Http\Controllers\ProductController::class, 'getProductByBrandAndCategory'])->name('danhmuc');
    });
});

#Categories
Route::get('/danh-muc/{category}.html', [\App\Http\Controllers\ProductController::class, 'getProductByCategory'])->name('danhmuc.chitiet');

#Tariff
Route::get('/bang-gia', [TariffController::class, 'getAll'])->name('bang-gia');

Route::get('/bang-gia/{brand}.html', [TariffController::class, 'getTariffWithBrand'])->name('bang-gia.hang');

Route::get('/bang-gia/{tariff}/{id}.html', [TariffController::class, 'getDetailTariff'])->name('bang-gia.chitiet');

# Get product discount > 40%
Route::get('/khuyen-mai', [\App\Http\Controllers\ProductController::class, 'getProductDiscount'])->name('khuyen-mai');

#Contact
Route::get('/contact.html', [CommentController::class, 'contact'])->name('contact');
Route::post('/contact/send', [CommentController::class, 'sendContact'])->name('contact.send');

#Search
Route::resource('/search', SearchController::class);

#====ROUTE FOR ADMIN====#

Route::get('/admin/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/auth/login', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::name('admin.')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name('dashboard');
            Route::get('/dashboard', [HomeController::class, 'index']);

            #Categories of products
            Route::resource('/categories', CategoryController::class);

            #Categories of posts
            Route::get('/categories_post', [CategoryController::class, 'getCategoriesOfPost'])->name('categories_post');

            Route::get('/categories_post/create', [CategoryController::class, 'createCategoriesOfPost'])->name('categories_post.create');

            Route::post('/categories_post/create', [CategoryController::class, 'storeCategoriesOfPost'])->name('categories_post.store');

            Route::get('/categories_post/{category}', [CategoryController::class, 'showCategoriesOfPost'])->name('categories_post.show');

            Route::get('/categories_post/{category}/edit', [CategoryController::class, 'editCategoriesOfPost'])->name('categories_post.edit');

            Route::patch('/categories_post/{category}', [CategoryController::class, 'updateCategoriesOfPost'])->name('categories_post.update');

            Route::delete('/categories_post/destroy', [CategoryController::class, 'destroy'])->name('categories_post.destroy');

            #Posts
            Route::resource('/posts', PostController::class);

            #Price list - tariff
            Route::resource('/tariffs', TariffController::class);

            #Brands
            Route::resource('/brands', BrandController::class);

            #Shipping Methods
            Route::resource('/shipping_methods', ShippingController::class);

            #Products
            Route::resource('/products', ProductController::class);

            #Pages
            Route::resource('/pages', PageController::class);

            #Reviews
            Route::resource('/reviews', CommentController::class);

            #Comments
            Route::get('/comments', [CommentController::class, 'listCommentPost'])->name('comments');

            Route::patch('/comments/update', [CommentController::class, 'update']);

            #Contacts
            Route::get('/contacts', [CommentController::class, 'listContact'])->name('contacts');

            #Info
            Route::resource('/info', InfoController::class);

            #Contact with staff
            Route::resource('/groups', GroupController::class);

            #Banners
            Route::resource('/banners', BannerController::class);

            #Logout
            Route::post('logout', [LoginController::class, 'logout'])->name('logout');

            #Info Account Admin
            Route::resource('/account', AccountController::class);
            Route::post('/account', [AccountController::class, 'change'])->name('account.change');
        });
    });

});


