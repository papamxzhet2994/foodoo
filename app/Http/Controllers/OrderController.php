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

        $products = Product::whereIn('id', $productIds)->get();

        return view('orders.index', compact('cart', 'products'));
    }

    public function store(Request $request)
    {
        // Создаем новый заказ
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $order->email = auth()->user()->email;
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
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

        return view('orders.confirm');
    }

    public function confirm()
    {
        return view('orders.confirm');
    }

    public function showInfo($id)
    {

        // Получаем заказ по id
        $order = Order::find($id);

        // Если заказ не найден, возвращаем 404 ошибку
        if (!$order) {
            abort(404);
        }

        $userName = $order->name;
        $userEmail = $order->email;

        // Получаем продукты этого заказа
        $orderProducts = OrderProduct::where('order_id', $order->id)->get();

        // Вычисляем общую стоимость заказа
        $totalPrice = $orderProducts->sum('total_price');


        return view('orders.info', compact('order', 'orderProducts', 'totalPrice', 'userName', 'userEmail'));
    }


}
