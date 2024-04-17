<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function show()
    {
        return view('restaurants_products.index');
    }

    public function create()
    {
        $this->middleware('admin');
        $restaurants = Restaurant::all();
        return view('admin.dishes.create', compact('restaurants'));
    }

    public function index()
    {
        $this->middleware('admin');
        $dishes = Dish::all();
        $restaurants = Restaurant::all();
        return view('admin.dishes.index', compact('dishes', 'restaurants'));
    }

    public function delete($id)
    {
        $this->middleware('admin');
        $dish = Dish::findOrFail($id);
        return view('admin.dish.delete', compact('dish'));
    }

    public function destroy($id)
    {
        $this->middleware('admin');
        $dish = Dish::findOrFail($id);
        $dish->delete();
        return redirect('/admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,heic|max:4096',
            'restaurant_id' => 'required',
        ]);


        $dish = new Dish();
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->description = $request->description;
        $dish->image = $this->uploadPhoto($request);
        $dish->restaurant_id = $request->restaurant_id;
        $dish->save();
        return redirect('/admin');
    }

    public function uploadPhoto(Request $request)
    {
        $path = $request->file('image')->store('images/dishes', 'public');
        return $path;
    }
}
