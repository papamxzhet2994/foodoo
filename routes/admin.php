<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ShopController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth', 'middleware' => 'access:admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.store');

    Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::post('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('/admin/restaurants/create', [RestaurantController::class, 'create'])->name('admin.restaurants.create');
    Route::post('/admin/restaurants/create', [RestaurantController::class, 'store'])->name('admin.restaurants.store');

    Route::get('/admin/shops/create', [ShopController::class, 'create'])->name('admin.shops.create');
    Route::post('/admin/shops/create', [ShopController::class, 'store'])->name('admin.shops.store');

    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/create', [ProductController::class, 'store'])->name('admin.products.store');

    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/create', [CategoryController::class, 'store'])->name('admin.categories.store');

    Route::get('/admin/dishes/create', [DishController::class, 'create'])->name('admin.dishes.create');
    Route::post('/admin/dishes/create', [DishController::class, 'store'])->name('admin.dishes.store');
});
