<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // image path
        $image = 'item_images/pizza_slice.jpg';
        $imagePath = 'http://127.0.0.1:8000' . Storage::url($image);

        // pizzas
        Item::firstOrCreate([
            'item_name' => 'Hawaiian',
            'item_type' => 'Pizza',
        ],
        [
            'item_ingredients' => 'Cheese, Pineapple Tidbits, Sliced Ham, Olives, Mushrooms',
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 80.00,
            'image_path' => $imagePath,
        ]);

        Item::firstOrCreate([
            'item_name' => 'Yummy Hotdog',
            'item_type' => 'Pizza',
        ],
        [
            'item_ingredients' => 'All Hotdogs, Cheese',
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 70.00,
            'image_path' => $imagePath,
        ]);

        Item::firstOrCreate([
            'item_name' => 'Ham Delight',
            'item_type' => 'Pizza',
        ],
        [
            'item_ingredients' => 'All Ham, Cheese',
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 70.00,
            'image_path' => $imagePath,
        ]);

        Item::firstOrCreate([
            'item_name' => 'Tuna Garlic',
            'item_type' => 'Pizza',
        ],
        [
            'item_ingredients' => 'Tuna Flakes, Tomatoes, Onions Sliced',
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 80.00,
            'image_path' => $imagePath,
            
        ]);

        Item::firstOrCreate([
            'item_name' => 'Garden Express',
            'item_type' => 'Pizza',
        ],
        [
            'item_ingredients' => 'Button Mushroom, Pineapple Tidbits, Black Olives, Onions, Tomatoes, Red & Green Bell Peppers',
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 80.00,
            'image_path' => $imagePath,
            
        ]);

        Item::firstOrCreate([
            'item_name' => 'Aloha',
            'item_type' => 'Pizza',
        ],
        [
            'item_ingredients' => 'Lots of Pineapples, Ham Sausage, Mushroom & Green Bell Peppers',
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 80.00,
            'image_path' => $imagePath,
            
        ]);

        // breakfast meals
        Item::firstOrCreate([
            'item_name' => 'Chicken Hotdog',
            'item_type' => 'Breakfast Meals',
        ],
        [
            'item_ingredients' => 'Rice, Chicken Hotdog',
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 40.00,
            'image_path' => $imagePath,
            
        ]);

        Item::firstOrCreate([
            'item_name' => 'Ham',
            'item_type' => 'Breakfast Meals',
        ],
        [
            'item_ingredients' => 'Rice, Ham',
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 50.00,
            'image_path' => $imagePath,
            
        ]);

        Item::firstOrCreate([
            'item_name' => 'Hungarian Sausage',
            'item_type' => 'Breakfast Meals',
        ],
        [
            'item_ingredients' => 'Rice, Hungarian Sausage',
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 90.00,
            'image_path' => $imagePath,
        ]);

        // ice creams
        Item::firstOrCreate([
            'item_name' => 'Cookies n Cream',
            'item_type' => 'Ice Cream',
        ],
        [
            'item_ingredients' => null,
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 135.00,
            'image_path' => $imagePath,
        ]);

        Item::firstOrCreate([
            'item_name' => 'Chocolate',
            'item_type' => 'Ice Cream',
        ],
        [
            'item_ingredients' => null,
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 120.00,
            'image_path' => $imagePath,
        ]);

        Item::firstOrCreate([
            'item_name' => 'Vanilla',
            'item_type' => 'Ice Cream',
        ],
        [
            'item_ingredients' => null,
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 120.00,
            'image_path' => $imagePath,
        ]);

        // shakes
        Item::firstOrCreate([
            'item_name' => 'Mango Shake',
            'item_type' => 'Shakes',
        ],
        [
            'item_ingredients' => null,
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 60.00,
            'image_path' => $imagePath,
        ]);

        // drinks
        Item::firstOrCreate([
            'item_name' => 'Coke',
            'item_type' => 'Drinks',
        ],
        [
            'item_ingredients' => null,
            'size' => null,
            'cheese_type' => null,
            'quantity' => null,
            'price' => 80.00,
            'image_path' => $imagePath,
        ]);
    }
}
