<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Customer::create([
            'name' => 'John Doe',
            'address' => 'Ramos, Cebu City',
            'phone_number' => '09123456789',
            'email' => 'johndoe@example.com'
        ]);
    }
}
