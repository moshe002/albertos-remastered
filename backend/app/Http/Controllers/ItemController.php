<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    //get all items
    public function index()
    {
        $items = Item::all();

        return response()->json($items);
    }
    //create items
    public function create(Request $request)
    {
        $item = Item::create([
            'type' => $request->type,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'properties' => $request->properties,
        ]);

        if (!$item) {
            return response()->json([
                'message' => 'Error occurred during insertion of item record.'
            ], 500);
        } else {
            return response()->json([
                'message' => 'Item successfully added.',
            ], 200);
        }
    }
}
