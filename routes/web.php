<?php


use App\Http\Controllers\Admin\Auth\LoginController;
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

//            #Categories
//            Route::name('categories.')->group(function () {
//                Route::prefix('categories')->group(function () {
//                    Route::get('/', [CategoriesController::class, 'index'])->name('list');
//                    Route::get('/list', [CategoriesController::class, 'index']);
//                    Route::get('/add', [CategoriesController::class, 'create'])->name('create');
//                    Route::post('/add', [CategoriesController::class, 'store']);
//                    Route::delete('/destroy', [CategoriesController::class, 'destroy'])->name('destroy');
//                    Route::get('/{cate}/edit', [CategoriesController::class, 'show'])->name('edit');
//                    Route::post('/{cate}/edit', [CategoriesController::class, 'update']);
//                });
//            });
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
