<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    //shows all orders in Admin
    public function getAllOrders()
    {

        $orders = Order::select('id', 'name', 'email', 'created_at')->get();

        return view('back.orders.index', ['orders' => $orders]);
    }

    //shows all order info By ID
    public function show(Order $order)
    {
        $order = Order::with([
            'orderItems' => function ($query) {
                return $query->select('id', 'qty', 'price', 'car_id', 'brand', 'order_id');
            },
            'orderItems.car' => function ($query) {
                return $query->select('id', 'model');
            },
            'user' => function ($query) {
                return $query->select('id', 'name', 'email');
            }
        ])->select('id', 'name', 'email', 'user_id')->where('id', $order->id)->first();

        return view('back.orders.show', ['order' => $order]);
    }
}
