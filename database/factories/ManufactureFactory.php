<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\URL>
 */
class ManufactureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Apple', 'Dell', 'HP', 'Acer']),
            'sales_name' => $this->faker->name(),
            'sales_phone' => $this->faker->phoneNumber(),
            'sales_email' => $this->faker->email(),
            'techsupport_name' => $this->faker->name(),
            'techsupport_phone' => $this->faker->phoneNumber(),
            'techsupport_email' => $this->faker->email(),
        ];
    }
}
