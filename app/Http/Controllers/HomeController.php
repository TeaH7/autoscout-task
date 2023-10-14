<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;

class HomeController extends Controller
{
    //search for cars by brand, engine size and price. Show all Cars in frontend when they are active
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->get('search')) {
            $query->where('is_active', 1)
                ->where('brand', 'LIKE', '%' . $request->get('search') . '%');
        }


        if ($request->get('engine')) {

            $query->where('is_active', 1)
                ->where('engine_size', 'LIKE', '%' . $request->get('engine') . '%');
        }

        if ($request->get('price')) {

            if ($request->get('price') !== '10000+') {
                $explodePrice = explode('-', $request->get('price'));

                $query->where('is_active', 1)->whereBetween('price', $explodePrice);
            } else {

                $query->where('is_active', 1)->where('price', '>=', '10000');
            }
        }


        $cars = $query->where('is_active', 1)->with('tags')->latest()->get();

        return view('home', ['cars' => $cars]);
    }


    //insert orders in DB
    public function order(StoreOrderRequest $request)
    {
        try {

            $data = $request->validated();


            //initially we insert the order data in DB
            $order =  Order::create([
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'user_id' => auth()->user()->id,

            ]);

            $cartItems = $data['cart_items'];

            //then we loop for each item in the cart and added as an item of this order
            foreach ($cartItems as $item) {

                $car = Car::where('id', $item['id'])->first();

                OrderItem::create([
                    'order_id' => $order->id,
                    'car_id' => $car->id,
                    'price' => $item['price'],
                    'qty' => $item['qty'],
                    'brand' => $item['brand']

                ]);
            }

            return redirect()->route('home')->with('success', 'Thank You! We Received Your Order.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
