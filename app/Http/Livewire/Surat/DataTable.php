<?php

namespace App\Http\Livewire\Surat;

use Livewire\Component;
use App\Models\Surat;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $modalSurat;
    public $nama_surat, $no_surat, $id_surat, $filter;

    public $from = '1500-01-01';
    public $to = '2200-01-01';

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    public $search = '';

    public function openModal($data)
    {
        $this->nama_surat = $data['nama_surat'];
        $this->no_surat = $data['no_surat'];
        $this->id_surat = $data['id'];

        $this->dispatchBrowserEvent('openSuratTugasDeleteModal');
    }

    public function render()
    {
        $documents = Surat::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->WhereBetween('tanggal_surat', [$this->from, $this->to])
            // ->where('jenis_surat')
            ->paginate(10);

        return view('livewire.surat.data-table', compact('documents'));
    }

    public function remove($id_surat)
    {
        Surat::find($id_surat)->delete();
        $this->dispatchBrowserEvent('closeSuratTugasDeleteModal');
        $this->dispatchBrowserEvent('swalDeleted');
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getFilterData()
    {
        if ($this->filter) {
            $data = $this->filter;
            $dataFilter = explode(" to ", $data);

            $this->from = $dataFilter[0];
            $this->to = $dataFilter[1];
        }
    }
}
