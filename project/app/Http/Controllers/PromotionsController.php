<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.promotions', compact('promotions'));
    }

    public function applyPromocode(Request $request)
    {
        $promocode = Promotion::where('promocode', $request->input('promocode'))->first();

        if ($promocode) {
            $discount = $promocode->discount;
            $total = session()->get('total', 0);

            $total_with_discount = $total * (1 - $discount / 100);

            session(['total_with_discount' => $total_with_discount]);

            return response()->json([
                'success' => true,
                'total_price' => $total_with_discount,
                'message' => 'Промокод успешно применен.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Промокод недействителен.'
            ]);
        }
    }
}
