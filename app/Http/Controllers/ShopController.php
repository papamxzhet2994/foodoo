<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $shops = Shop::where('name', 'like', "%$query%")->get();
        return view('products.shop_products', compact('shops'));
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        $products = $shop->products;
        $categories = Category::all();
        return view('products.shop_products', compact('shop', 'categories', 'products'));
    }

    public function create()
    {
        $this->middleware('admin');
        return view('admin.shops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rating' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);


        $shop = new Shop;
        $shop->name = $request->name;
        $shop->rating = $request->rating;
        $shop->image = $this->uploadPhoto($request);
        $shop->description = $request->description;
        $shop->type = 'shop';
        $shop->save();

        return back()
            ->with('success','Магазин успешно создан.');
    }

    public function uploadPhoto(Request $request)
    {
        $path = $request->file('image')->store('images', 'public');
        return $path;
    }

}

