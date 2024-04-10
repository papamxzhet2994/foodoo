<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\User\ProfileController;
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
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/admin.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.show');
Route::get('/shops/{id}', [ShopController::class, 'show'])->name('shops.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/products', [ProductController::class, 'index'])->name('products.shop_products');
Route::get('/products/{product}', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/shop/{shop}/category/{category}', [ProductController::class, 'showByCategory'])->name('products');
Route::get('/products/reset-categories', [ProductController::class, 'resetCategory'])->name('products.shop_products.reset-categories');

Route::get('add-to-cart/{id}', [CartController::class, 'addToCart']);
Route::get('remove-from-cart/{id}', [CartController::class, 'removeFromCart']);

Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('/search-suggestions', [SearchController::class, 'suggestions'])->name('search.suggestions');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');


Route::get('/order', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/confirm', [OrderController::class, 'confirm'])->name('orders.confirm');
Route::get('/orders/{id}/info', [OrderController::class, 'showInfo'])->name('orders.info');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');




Route::get('indev', function () {
    return view('layouts.indev');
});

