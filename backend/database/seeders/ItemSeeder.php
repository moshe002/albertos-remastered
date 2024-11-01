<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unique = 'item_name';
        $model = new Item();
        $items = config('item');
        $fields = $model->getFillable();
        insert_unique_data($model, $items, $fields, $unique);
    }
}
