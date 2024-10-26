<?php

namespace Database\Seeders;

use App\Models\Customer;
use Hash;
use Illuminate\Database\Seeder;

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
            'email' => 'johndoe@example.com',
            'password' => Hash::make('moses123'),
        ]);
    }
}
