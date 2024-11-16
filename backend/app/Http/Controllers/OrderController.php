<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // fetch all orders regardless of customer
    public function index()
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    // fetch order of a customer
    public function show($customer_id)
    {
        $order = Order::find($customer_id);

        if ($order) {
            return response()->json($order, 200);
        } else {
            return response()->json('Order record not found', 404);
        }
    }

    // order
    public function order(Request $request)
    {

        $order = Order::create([
            'date_ordered' => $request->date_ordered,
            'instruction' => $request->instruction,
            'customer_id' => $request->customer_id,
        ]);

        if ($order) {
            return response()->json(['message' => 'Order added successfully'], 200);
        } else {
            return response()->json(['message' => 'Order failed'], 500);
        }
    }

    public function update()
    {
        //when to update order??
        //when order items is finalized it changes the price?
    }

    public function destroy(int $id)
    {

    }
}
