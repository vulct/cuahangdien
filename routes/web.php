<?php


use App\Http\Controllers\Admin\Auth\LoginController;
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
            Route::name('categories.')->group(function () {
                Route::prefix('categories')->group(function () {
                    Route::get('/', [CategoryController::class, 'index'])->name('list');
                    Route::get('/create', [CategoryController::class, 'create'])->name('create');
                    Route::post('/create', [CategoryController::class, 'store']);
                    Route::delete('/destroy', [CategoryController::class, 'destroy'])->name('destroy');
                    Route::get('/{cate}/edit', [CategoryController::class, 'show'])->name('edit');
                    Route::post('/{cate}/edit', [CategoryController::class, 'update']);
                });
            });
//
//            #Brands
//            Route::name('brands.')->group(function () {
//                Route::prefix('brands')->group(function () {
//                    Route::get('/', [BrandsController::class, 'index']);
//                    Route::get('/list', [BrandsController::class, 'index'])->name('list');
//                    Route::get('/add', [BrandsController::class, 'create'])->name('create');
//                    Route::post('/add', [BrandsController::class, 'store']);
//                    Route::delete('/destroy', [BrandsController::class, 'destroy'])->name('destroy');
//                    Route::get('/{brand}/edit', [BrandsController::class, 'edit'])->name('edit');
//                    Route::post('/{brand}/edit', [BrandsController::class, 'update']);
//                });
//            });
        });
    });

});
