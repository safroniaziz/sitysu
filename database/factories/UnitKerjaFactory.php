<?php

namespace Database\Factories;

use App\Models\UnitKerja;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Factory as Faker;

class UnitKerjaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UnitKerja::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_unit_kerja' => 'G1' . $this->faker->numberBetween($min = 10, $max = 900),
            'nama_departemen' => 'Fakultas Teknik',
        ];
    }
}
