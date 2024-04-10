<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $dishes = Dish::where('restaurant_id', $id)->get();

        return view('restaurant_dishes', compact('restaurant', 'dishes'));
//        return view('layouts.indev');
    }

    public function create()
    {
        $this->middleware('admin');
        return view('admin.restaurants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'rating' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/restaurants/'), $imageName);

        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->rating = $request->rating;
        $restaurant->image = $imageName;
        $restaurant->description = $request->description;
        $restaurant->type = "restaurant";
        $restaurant->save();
        return redirect('/admin');
    }
}
