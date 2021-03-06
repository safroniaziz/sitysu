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
    public $tentang, $no_surat, $id_surat, $filter;

    public $from = '1500-01-01';
    public $to = '2200-01-01';

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    public $search = '';

    public function openModal($data)
    {
        $this->tentang = $data['tentang'];
        $this->no_surat = $data['no_surat'];
        $this->id_surat = $data['id_surat'];

        $this->dispatchBrowserEvent('openSuratTugasDeleteModal');
    }

    public function render()
    {
        if (auth()->user()->hak_akses == 'dosen' || auth()->user()->hak_akses == 'staf' && auth()->user()->input_surat == 'tidak') {
            $documents = auth()->user()->surat()
                ->search($this->search)
                ->orderBy($this->sortBy, $this->sortDirection)
                ->WhereBetween('tanggal_surat', [$this->from, $this->to])
                ->paginate(10);
        } else {
            $documents = Surat::query()
                ->search($this->search)
                ->orderBy($this->sortBy, $this->sortDirection)
                ->WhereBetween('tanggal_surat', [$this->from, $this->to])
                ->paginate(10);
        }


        return view('livewire.surat.data-table', compact('documents'));
    }

    public function remove($id_surat)
    {
        $surat = Surat::find($id_surat)->delete();

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
