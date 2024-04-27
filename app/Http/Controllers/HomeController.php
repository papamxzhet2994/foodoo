<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index()
    {
        $isMobile = false;
        if (isset($_SERVER['HTTP_USER_AGENT']) && (str_contains($_SERVER['HTTP_USER_AGENT'], 'Mobile') || str_contains($_SERVER['HTTP_USER_AGENT'], 'Tablet'))) {
            $isMobile = true;
        }

        $promotions = Promotion::all();
        $shops = Shop::all();
        $restaurants = Restaurant::all();
        $cartItemCount = 0;


        if (session()->has('cart')) {
            $cartItemCount = count(session()->get('cart') ?? []);
        }


        return view('home', compact('shops', 'restaurants', 'promotions', 'isMobile', 'cartItemCount'));
    }
}
