<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // get all items for menu
    public function index()
    {
        try 
        {
            $items = Item::all();
    
            $pizza_type = [];
            $breakfast_meal_type = [];
            $ice_cream_type = [];
            $shake_type = [];
            $drink_type = [];
            
            foreach($items as $item) {
                switch($item->item_type) 
                {
                    case 'Pizza':
                        $pizza_type[] = $item;
                        break;
                    case 'Breakfast Meals':
                        $breakfast_meal_type[] = $item;
                        break;
                    case 'Ice Cream':
                        $ice_cream_type[] = $item;
                        break;
                    case 'Shakes':
                        $shake_type[] = $item;
                        break;
                    case 'Drinks':
                        $drink_type[] = $item;
                        break;
                }
            }
    
            $allItems = [
                'pizzas' => $pizza_type, 
                'breakfastMeals' => $breakfast_meal_type,
                'iceCreams' => $ice_cream_type,
                'shakes' => $shake_type,
                'drinks' => $drink_type
            ];

        } catch(Exception $e) 
        {
            throw $e;
            $allItems = [];
        }

        return response()->json($allItems);
    }

    // items to be ordered
    // public function orderItems(Request $request)
    // {
    //     $items = Item::create([
    //         'item_type' => $request->item_type,
    //         'item_name' => $request->item_name,
    //         'ingredients' => $request->item_ingredients,
    //         'total_price' => $request->price * $request->quantity,
    //         'quantity' => $request->quantity,
    //     ]);

    //     if (!$items) {
    //         return response()->json([
    //             'message' => 'Error occurred during insertion of item record.'
    //         ], 500);
    //     } else {
    //         return response()->json([
    //             'message' => 'Item successfully added.',
    //         ], 200);
    //     }
    // }
}
