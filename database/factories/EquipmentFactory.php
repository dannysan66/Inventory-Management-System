<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\URL>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'manufacture_id' => $this->faker->numberBetween(1, 5),
            'category_id' => $this->faker->numberBetween(1, 3),
            'user_id' => $this->faker->numberBetween(1, 5),
            'model' => $this->faker->randomElement(['Model A', 'Model B', 'Model C', 'Model D']),
            'CPU' => $this->faker->randomElement(['N/A', 'i7', 'i9', 'i5']),
            'memory' => $this->faker->randomElement(['8GB', '16GB', '32GB']),
            'storage' => $this->faker->randomElement(['256GB', '512GB', '1TB', '2TB']),
            'invoice_number' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'price' => $this->faker->randomFloat(2, 500, 5000),
            'purchase_date' => $this->faker->date(),
        ];
    }
}
