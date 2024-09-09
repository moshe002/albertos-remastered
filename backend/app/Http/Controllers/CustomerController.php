<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //TO DO:
    /*
    1. STAY HANDSOME
    2. add edit function?
    */

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

    public function destroy(int $id)
    {
        $deleted = Customer::destroy(1);

        if ($deleted) {
            return response()->json('Customer deleted.',200);
        } else {
            return response()->json('Customer deletion unsuccessful.',500);
        }
    }
}
