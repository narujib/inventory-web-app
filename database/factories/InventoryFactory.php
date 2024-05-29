<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle(),
            'kode_barang' => null,
            'jumlah' => mt_rand(50, 200),
            'keterangan' => $this->faker->paragraph(2),
            'jenis' => mt_rand(1, 3),
        ];

        // return [
        //     'name' => $this->faker->jobTitle(),
        //     'kode_barang' => 'BR'. $this->faker->unique->randomNumber(5, true),
        //     'jumlah' => mt_rand(50, 200),
        //     'keterangan' => $this->faker->paragraph(2),
        //     'jenis' => mt_rand(1, 3),
        // ];
    }
}
