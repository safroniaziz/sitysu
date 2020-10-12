<?php

namespace App\Http\Livewire\SuratTugas;

use Livewire\Component;
use App\Models\Document;

class DataTable extends Component
{
    public $modalDocument;
    public $nama_surat, $no_surat;

    public function openModal($data)
    {
        $this->nama_surat = $data['nama_surat'];
        $this->no_surat = $data['no_surat'];

        $this->dispatchBrowserEvent('openSuratTugasDeleteModal');
    }

    public function closeModal()
    {
        dd('tesgin');
    }

    public function render()
    {
        $documents = Document::latest()->get();

        return view('livewire.surat-tugas.data-table', compact('documents'));
    }
}
