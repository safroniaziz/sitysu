<?php

namespace App\Http\Livewire\SatuanKerja;

use App\Models\UnitKerja;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Validation\Rule;

class DataTable extends Component
{
    use WithPagination;

    public $id_unit_kerja, $nama_departemen;

    public $lorem_ipsum = 1;

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $search = '';

    protected $rules = [
        'id_unit_kerja' => 'required|unique:unit_kerja',
        'nama_departemen' => 'required',
    ];

    protected $messages = [
        'id_unit_kerja.required' => 'Form ini harus diisi',
        'nama_departemen.required' => 'Form ini harus diisi',
    ];

    public function render()
    {
        $unit_kerja = UnitKerja::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return view('livewire.satuan-kerja.data-table', compact('unit_kerja'));
    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules, $this->messages);
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

    public function resetModal()
    {
        $this->id_unit_kerja = '';
        $this->nama_departemen = '';
    }

    /*
        CREATE DATA
    */
    public function openCreateModal()
    {
        $this->resetModal();

        $this->dispatchBrowserEvent('openCreateSatuanKerjaModal');
    }

    public function store()
    {
        UnitKerja::create($this->validate());

        $this->dispatchBrowserEvent('closeCreateSatuanKerjaModal');
        $this->dispatchBrowserEvent('swalCreated');
    }

    /*
        EDIT DATA
    */
    public function openEditModal($data)
    {
        $this->id_unit_kerja = $data['id_unit_kerja'];
        $this->nama_departemen = $data['nama_departemen'];

        $this->dispatchBrowserEvent('openEditSatuanKerjaModal');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'id_unit_kerja' => [
                'required',
                Rule::unique('unit_kerja', 'id_unit_kerja')->ignore($this->id_unit_kerja, 'id_unit_kerja')
            ],
            'nama_departemen' => 'required',
        ]);

        $data = UnitKerja::where('id_unit_kerja', $this->id_unit_kerja);
        $data->update($validatedData);

        $this->dispatchBrowserEvent('closeEditSatuanKerjaModal');
        $this->dispatchBrowserEvent('swalEdited');
    }

    /*
        DELETE DATA
    */
    public function openDeleteModal($data)
    {
        $this->id_unit_kerja = $data['id_unit_kerja'];
        $this->nama_departemen = $data['nama_departemen'];

        $this->dispatchBrowserEvent('openDeleteSatuanKerjaModal');
    }

    public function remove()
    {
        $data = UnitKerja::where('id_unit_kerja', $this->id_unit_kerja)->first();

        $data->delete();
        $this->dispatchBrowserEvent('closeDeleteSatuanKerjaModal');
        $this->dispatchBrowserEvent('swalDeleted');
    }
}
