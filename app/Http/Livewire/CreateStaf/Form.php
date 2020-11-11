<?php

namespace App\Http\Livewire\CreateStaf;

use Livewire\Component;

class Form extends Component
{
    public $unitKerja, $input_surat;

    public function mount($unitKerja)
    {
        $this->unitKerja = $unitKerja;
    }

    public function render()
    {
        return view('livewire.create-staf.form');
    }
}
