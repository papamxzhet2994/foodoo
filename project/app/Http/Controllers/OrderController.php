<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);

        $total = 0;
        foreach ($cart as $productId => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        $total = number_format($total, 2, '.', '');
        $products = Product::whereIn('id', $productIds)->get();

        return view('orders.index', compact('cart', 'products', 'total'));
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $order->email = auth()->user()->email;
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $totalWithPromo = session()->get('total_with_promo');

        if ($totalWithPromo) {
            $order->total = $totalWithPromo;
        } else {
            $order->total = $request->input('total');
        }

        $order->save();

        $cart = session()->get('cart', []);

        foreach ($cart as $productId => $details) {
            $orderProduct = new OrderProduct;
            $orderProduct->user_id = auth()->user()->id;
            $orderProduct->name = session()->get('cart')[$productId]['name'];
            $orderProduct->price = session()->get('cart')[$productId]['price'];
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $productId;
            $orderProduct->quantity = $details['quantity'];
            $orderProduct->total_price = $details['price'] * $details['quantity'];
            $orderProduct->save();
        }

        session()->forget('cart');
        session()->forget('total_with_promo');

        return view('orders.confirm');
    }


    public function confirm()
    {
        return view('orders.confirm');
    }

    public function showInfo($id)
    {

        $order = Order::find($id);

        if (!$order) {
            abort(404);
        }

        $userName = $order->name;
        $userEmail = $order->email;
        $orderProducts = OrderProduct::where('order_id', $order->id)->get();


        return view('orders.info', compact('order', 'orderProducts', 'userName', 'userEmail'));
    }


}
