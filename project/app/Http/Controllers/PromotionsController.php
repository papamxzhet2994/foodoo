<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Promotion;
use App\Models\Shop;
use App\Models\UserPromotion;
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
        $promoCode = $request->input('promocode');
        $now = now();

        $promotion = Promotion::where('promocode', $promoCode)
            ->where('is_active', true)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->first();

        if (!$promotion) {
            $total = 0;
            $products = session()->get('cart');
            foreach ($products as $productId => $details) {
                $total += $details['price'] * $details['quantity'];
            }
            session()->put('total_with_promo', $total);
            return [
                'success' => false,
                'message' => 'Неверный промокод или промокод не активен.'
            ];
        }

        $total = 0;

        $products = session()->get('cart');

        foreach ($products as $productId => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        $discount = $total * $promotion->discount / 100;

        if ($discount < 0) {
            return [
                'success' => false,
                'message' => 'Промокод не может быть применен.'
            ];
        }

        session()->put('total_with_promo', $total - $discount);
        return [
            'success' => true,
            'discount_amount' => $discount,
            'message' => 'Промокод применен.',
            'promotion' => $promotion->toArray()
        ];
    }
}
