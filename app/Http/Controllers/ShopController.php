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

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $shop = new Shop;
        $shop->name = $request->name;
        $shop->rating = $request->rating;
        $shop->image = $imageName;
        $shop->description = $request->description;
        $shop->type = 'shop';
        $shop->save();

        return back()
            ->with('success','Магазин успешно создан.')
            ->with('image',$imageName);
    }


}

