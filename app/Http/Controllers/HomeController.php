<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $restaurants = Restaurant::all(); // Получаем все рестораны

        return view('home', compact('shops', 'restaurants'));
    }
}
