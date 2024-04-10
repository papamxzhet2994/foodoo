<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        return view('restaurants_products.index');
    }

    public function create()
    {
        $this->middleware('admin');
        $restaurants = Restaurant::all();
        return view('admin.dishes.create', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'restaurant_id' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/dishes/'), $imageName);

        $dish = new Dish();
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->description = $request->description;
        $dish->image = $imageName;
        $dish->restaurant_id = $request->restaurant_id;
        $dish->save();
        return redirect('/admin');
    }
}
