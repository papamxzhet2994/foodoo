<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Shop;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function suggestions(Request $request)
    {
        $query = $request->input('q');
        $suggestions = Shop::where('name', 'like', "%$query%")->get()->take(5);
        $suggestions1 = Restaurant::where('name', 'like', "%$query%")->get()->take(5);
        $suggestions = array_merge($suggestions->toArray(), $suggestions1->toArray());

        return response()->json($suggestions);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $shops = Shop::where('name', 'like', "%$query%")->get();
        $restaurants = Restaurant::where('name', 'like', "%$query%")->get();

        return response()->json(array_merge($shops->toArray(), $restaurants->toArray()));
    }
}
