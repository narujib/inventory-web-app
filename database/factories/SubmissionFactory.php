<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'status' => mt_rand(1, 2),
        //     'kode_permintaan' => 'TX'. $this->faker->unique->randomNumber(5, true),
        //     'inventory_id' => $this->faker->unique->numberBetween(1,20),
        //     'user_id' => $this->faker->numberBetween(1,2),
        // ];

        return [
            'status' => 3,
            'kode_permintaan' => 'TR'. $this->faker->unique->randomNumber(4, true),
            'inventory_id' => $this->faker->numberBetween(21,45),
            'user_id' => $this->faker->numberBetween(1,20),
        ];
    }
}
