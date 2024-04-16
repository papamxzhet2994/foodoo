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
        $isMobile = false;
        if (isset($_SERVER['HTTP_USER_AGENT']) && (str_contains($_SERVER['HTTP_USER_AGENT'], 'Mobile') || str_contains($_SERVER['HTTP_USER_AGENT'], 'Tablet'))) {
            $isMobile = true;
        }

        $shops = Shop::all();
        $restaurants = Restaurant::all();

        return view('home', compact('shops', 'restaurants', 'isMobile'));
    }
}
