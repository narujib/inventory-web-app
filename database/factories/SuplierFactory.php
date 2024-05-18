<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suplier>
 */
class SuplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'alamat' => $this->faker->address(),
            'telepon' => $this->faker->numberBetween(1000000000, 9999999999),
            'email' => $this->faker->unique->safeEmail(),
        ];
    }
}
