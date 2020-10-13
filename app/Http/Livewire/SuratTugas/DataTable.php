<?php

namespace App\Http\Livewire\SuratTugas;

use Livewire\Component;
use App\Models\Document;

class DataTable extends Component
{
    public $modalDocument;
    public $nama_surat, $no_surat, $id_surat;

    public function openModal($data)
    {
        $this->nama_surat = $data['nama_surat'];
        $this->no_surat = $data['no_surat'];
        $this->id_surat = $data['id'];

        $this->dispatchBrowserEvent('openSuratTugasDeleteModal');
    }

    public function render()
    {
        $documents = Document::latest()->get();

        return view('livewire.surat-tugas.data-table', compact('documents'));
    }

    public function remove($id_surat)
    {
        Document::find($id_surat)->delete();
        $this->dispatchBrowserEvent('closeSuratTugasDeleteModal');
        $this->dispatchBrowserEvent('swalDeleted');
    }
}
