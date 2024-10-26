<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'type' => $this->faker->word,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => json_encode(['item_price' => [1.00, 22.00]]),
            'properties' => json_encode([
                'size' => ['9"', '11"'],
                'quantity' => 1,
                'sauce' => ['Hot Sauce', 'Normal Sauce'],
            ]),
        ];
    }
}
