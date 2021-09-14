<?php


use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
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
        });
    });

});
