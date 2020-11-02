<?php

namespace Database\Factories;

use App\Models\Surat;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuratFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Surat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tentang' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'no_surat' => $this->faker->numerify('############'),
            // 'penandatangan' => $this->faker->name,
            'tanggal_surat' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'link_file' => 'surat-tugas/pdf-upload.pdf',
            'jenis_surat' => $this->faker->randomElement($array = array('Surat Keputusan', 'Surat Tugas')),
            'nip' => '117687575697627358',
        ];
    }
}
