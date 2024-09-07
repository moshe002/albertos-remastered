<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();

        return response()->json($orders);
    }

    public function show($id) {
        $order = Order::find($id);

        if ($order){
            return response()->json($order,200);
        } else {
            return response()->json('Order record not found',404);
        }
    }

    public function store(Request $request) {
        //create

        $order = Order::create([
            'order_date' => $request->order_date,
            'price' => $request->price
        ]);
        
        if ($order){
            return response()->json('Order added successfully',200);
        } else {
            return response()->json('Order addition unsuccessful',500);
        }
    }

    public function update() {
        //when to update order?? 
        //when order items is finalized it changes the price?
    }

    public function destroy(int $id) {

    }
}
