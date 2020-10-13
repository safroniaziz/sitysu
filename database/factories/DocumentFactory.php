<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_surat' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'no_surat' => $this->faker->numerify('############'),
            'penandatangan' => $this->faker->name,
            'ditetapkan' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'file' => 'surat-tugas/pdf-upload.pdf',
            'jenis_surat' => $this->faker->randomElement($array = array('t', 'k')),
        ];
    }
}
