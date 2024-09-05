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
        // remove old data
        //DB::table('items')->truncate();

        // image path
        $image = 'item_images/pizza_slice.jpg';
        $imagePath = 'http://127.0.0.1:8000' . Storage::url($image);

        Item::firstOrCreate([
            'type' => 'Ice Cream',
            'name' => 'Rocky Road',
        ],
        [
            'description' => 'One of the best Ice Creams in the market. You can\'t go wrong with Rocky Road',
            'price' => [ 'item_price' => [250.00] ],
            'image_path' => $imagePath,
            'properties' => [
                'quantity' => 5,
            ],
        ]);

        Item::firstOrCreate([
            'type' => 'Pizza',
            'name' => 'Hawaiian',
        ],
        [
            'description' => 'Inspired by tropical ingredients, this pizza will surely make it worth your while',
            'price' => [ 'item_price' => [90.00, 135.00] ],
            'image_path' => $imagePath,
            'properties' => [
                'size' => ['9"', '11"'],
                'quantity' => 5,
                'sauce' => ['Hot Sauce', 'Regular Sauce'],
                'cheese' => ['Quickmelt', 'Mozarella'],
                'ingredients' => 'Pineapple Tidbits, Cheese, Olives, Red Pepper, Mushrooms, Beef Tidbits',
            ],
        ]);

        Item::firstOrCreate([
            'type' => 'Pizza',
            'name' => 'Taco d\' Albertos',
        ],
        [
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            'price' => [ 'item_price' => [100.00, 220.00] ],
            'image_path' => $imagePath,
            'properties' => [
                'size' => ['9"', '11"'],
                'quantity' => 5,
                'sauce' => ['Hot Sauce', 'Regular Sauce'],
                'cheese' => ['Quickmelt', 'Mozarella'],
                'ingredients' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            ],
        ]);

        Item::firstOrCreate([
            'type' => 'Pizza',
            'name' => 'Pizza Supreme',
        ],
        [
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            'price' => [ 'item_price' => [90.00, 145.00] ],
            'image_path' => $imagePath,
            'properties' => [
                'size' => ['9"', '11"'],
                'quantity' => 5,
                'sauce' => ['Hot Sauce', 'Regular Sauce'],
                'cheese' => ['Quickmelt', 'Mozarella'],
                'ingredients' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            ],
        ]);

        Item::firstOrCreate([
            'type' => 'Shake',
            'name' => 'Mango Shake',
        ],
        [
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            'price' => [ 'item_price' => [65.00] ],
            'image_path' => $imagePath,
            'properties' => [
                'size' => ['Large'],
                'quantity' => 5,
            ],
        ]);
    }
}
