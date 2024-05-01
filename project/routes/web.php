<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\RestaurantCartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\VerificationController;
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

Route::get('/categories', [CategoryController::class, 'show'])->name('categories.index');

Route::get('/promotions/{id}', [PromotionsController::class, 'index'])->name('promotions.index');
Route::get('/apply-promocode', [PromotionsController::class, 'applyPromocode'])->name('apply.promocode');
Route::post('/apply-promocode', [PromotionsController::class, 'applyPromocode'])->name('apply.promocode');

Route::get('/products', [ProductController::class, 'show'])->name('products.shop_products');
Route::get('/products/{product}', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/shop/{shop}/category/{category}', [ProductController::class, 'showByCategory'])->name('products');
Route::get('/products/reset-categories', [ProductController::class, 'resetCategory'])->name('products.shop_products.reset-categories');

Route::get('add-to-cart/{product_id}', [CartController::class, 'addToCart']);
Route::get('add-to-cart/{dish_id}', [RestaurantCartController::class, 'addToCartFromRestaurant']);
Route::get('remove-from-cart/{product_id}', [CartController::class, 'removeFromCart']);

Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('/search-suggestions', [SearchController::class, 'suggestions'])->name('search.suggestions');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');


Route::get('/order', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/confirm', [OrderController::class, 'confirm'])->name('orders.confirm');
Route::get('/orders/{id}/info', [OrderController::class, 'showInfo'])->name('orders.info');

Route::get('/reviews', [ReviewController::class, 'show'])->name('reviews.show');
Route::get('/reviews/create/', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews/create', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/info', [ReviewController::class, 'showInfo'])->name('reviews.info');


Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::get('indev', function () {
    return view('layouts.indev');
});

