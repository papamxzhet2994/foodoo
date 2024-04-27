<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function show($id)
    {
//        $restaurant = Restaurant::findOrFail($id);
//        $dishes = Dish::where('restaurant_id', $id)->get();
//        $categories = RestaurantCategory::all();
//        $cart = session()->get('cart', []);
//
//        return view('restaurant_dishes', compact('restaurant', 'dishes', 'categories', 'cart'));
        return view('layouts.indev');
    }

    public function index()
    {
        $this->middleware('admin');
        $restaurants = Restaurant::all();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    public function delete($id)
    {
        $this->middleware('admin');
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.restaurants.delete', compact('restaurant'));
    }

    public function destroy($id)
    {
        $this->middleware('admin');
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        return redirect('/admin');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,heic|max:4096',
            'description' => 'required',
            'rating' => 'required',
        ]);

        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->rating = $request->rating;
        $restaurant->image = $this->uploadPhoto($request);
        $restaurant->description = $request->description;
        $restaurant->type = "restaurant";
        $restaurant->save();

        return redirect('/admin');
    }

    public function uploadPhoto(Request $request)
    {
        $path = $request->file('image')->store('images/restaurants', 'public');
        return $path;
    }
}
