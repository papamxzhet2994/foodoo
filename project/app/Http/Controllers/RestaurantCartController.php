<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class RestaurantCartController extends Controller
{
    public function addToCartFromRestaurant(Request $request, $id)
    {
        $dishes = Dish::find($id);
        $restaurantCart = session()->get('restaurantCart', []);


        if(isset($restaurantCart[$id])) {
            $restaurantCart[$id]['quantity']++;
        } else {
            $restaurantCart[$id] = [
                "name" => $dishes->name,
                "quantity" => 1,
                "price" => $dishes->price,
                "image" => $dishes->image,
                "weight" => $dishes->weight
            ];
        }

        session()->put('restaurantCart', $restaurantCart);

        return response()->json(session()->get('restaurantCart', []));
    }


}
