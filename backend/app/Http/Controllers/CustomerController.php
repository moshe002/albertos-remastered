<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $customers = Customer::all();

        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($customer) {
            return response()->json([
                'message'=> 'Customer added successfully.',
            ],200);
        } else {
            return response()->json([
                'message' => 'Customer record insertion unsuccessful'
            ],500);
        }
    }
}
