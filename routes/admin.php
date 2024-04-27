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
    // админ
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // пользователи
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::post('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/edit/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/take/{id}', [AdminController::class, 'take'])->name('admin.take');
    Route::post('/admin/take/{id}', [AdminController::class, 'take'])->name('admin.take');

    // рестораны
    Route::get('/admin/restaurants/create', [RestaurantController::class, 'create'])->name('admin.restaurants.create');
    Route::post('/admin/restaurants/create', [RestaurantController::class, 'store'])->name('admin.restaurants.store');
    Route::get('/admin/restaurants/', [RestaurantController::class, 'index'])->name('admin.restaurants.index');
    Route::get('/admin/restaurants/delete{id}', [RestaurantController::class, 'delete'])->name('admin.restaurants.delete');
    Route::post('/admin/restaurants/delete{id}', [RestaurantController::class, 'delete'])->name('admin.restaurants.delete');
    Route::delete('/admin/restaurants/delete{id}', [RestaurantController::class, 'destroy'])->name('admin.restaurants.delete');

    // магазины
    Route::get('/admin/shops/create', [ShopController::class, 'create'])->name('admin.shops.create');
    Route::post('/admin/shops/create', [ShopController::class, 'store'])->name('admin.shops.store');
    Route::get('/admin/shops/', [ShopController::class, 'index'])->name('admin.shops.index');
    Route::get('/admin/shops/delete{id}', [ShopController::class, 'delete'])->name('admin.shops.delete');
    Route::post('/admin/shops/delete{id}', [ShopController::class, 'delete'])->name('admin.shops.delete');
    Route::delete('/admin/shops/delete{id}', [ShopController::class, 'destroy'])->name('admin.shops.delete');

    // продукты
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/create', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/delete{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::post('/admin/products/delete{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::delete('/admin/products/delete{id}', [ProductController::class, 'destroy'])->name('admin.products.delete');

    // категории
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/create', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/delete{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    Route::post('/admin/categories/delete{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    Route::delete('/admin/categories/delete{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');

    // блюда
    Route::get('/admin/dishes/create', [DishController::class, 'create'])->name('admin.dishes.create');
    Route::post('/admin/dishes/create', [DishController::class, 'store'])->name('admin.dishes.store');
    Route::get('/admin/dishes/', [DishController::class, 'index'])->name('admin.dishes.index');
    Route::get('/admin/dishes/delete{id}', [DishController::class, 'delete'])->name('admin.dishes.delete');
    Route::post('/admin/dishes/delete{id}', [DishController::class, 'delete'])->name('admin.dishes.delete');
    Route::delete('/admin/dishes/delete{id}', [DishController::class, 'destroy'])->name('admin.dishes.delete');
});
