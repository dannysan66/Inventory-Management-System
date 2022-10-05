<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\URL>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'equipment_id' => $this->faker->numberBetween(1, 50),
            'subject' => $this->faker->randomElement(['Repair', 'Update', 'Software']),
            'content' => $this->faker->paragraph(),
        ];
    }
}
