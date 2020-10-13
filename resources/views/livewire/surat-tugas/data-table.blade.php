<div>
    <div class="d-flex justify-content-between">
        <div class="data-table-filter mb-2 col-md-6 col-sm-8">
            <div class="d-flex">
            <label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Cari...">
            </label>
        </div>
        </div>
        <div class="data-table-filter mb-2 col-md-6 col-sm-4">
            <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active mr-3" type="text" placeholder="Pilih Tanggal..." wire:model="filter">
            <button class="btn btn-primary mb-1" style="width: 95px; height: 45px;" wire:click="getFilterData">Urutkan</button>
        </div>
    </div>

    <table id="default-ordering" class="table table-hover" style="width:100%;">
        <thead>
            <tr class="text-center">
                <th>#</th>
                <th wire:click="sortBy('nama_surat')" style="cursor: pointer;">
                    Nama Surat

                    @include('partials._sort-icon', ['field' => 'nama_surat'])
                </th>
                <th wire:click="sortBy('no_surat')" style="cursor: pointer;">
                    Nomor Surat

                    @include('partials._sort-icon', ['field' => 'no_surat'])
                </th>
                <th wire:click="sortBy('penandatangan')" style="cursor: pointer;">
                    Penandatangan

                    @include('partials._sort-icon', ['field' => 'penandatangan'])
                </th>
                <th wire:click="sortBy('ditetapkan')" style="cursor: pointer;">
                    Ditetapkan

                    @include('partials._sort-icon', ['field' => 'ditetapkan'])
                </th>
                <th>E-Doc</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($documents as $document)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $document->nama_surat }}</td>
                <td>{{ $document->no_surat }}</td>
                <td>{{ $document->penandatangan }}</td>
                <td>{{ $document->ditetapkan }}</td>
                <td class="text-center">
                    <a href="" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Unduh">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download table-info"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                    </a>
                </td>
                <td class="text-center">
                    <a href="{{ route('surat.tugas.detail', $document->no_surat) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye table-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                    <a href="{{ route('surat.tugas.edit', $document->no_surat) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 table-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                    <a class="bs-tooltip" data-toggle="tooltip" data-placement="top" data-original-title="Hapus" wire:click.prevent="openModal({{ $document }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon table-cancel"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    <div class="alert alert-outline-danger" role="alert">
                        <strong>Error!</strong> Data yang anda cari tidak ditemukan.
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <p>
            {{ $documents->links() }}
        </p>
    </div>

    <div wire:ignore.self class="modal animated zoomInUp custo-zoomInUp" id="deleteSuratTugasModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" id="standardModalLabel">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="icon-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    </div>
                    <h4 class="modal-text mt-3">Apakah anda yakin ingin menghapus data ini?</h4>
                    <div class="d-flex justify-content-center mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <h6 class="text-muted ml-1">{{ $nama_surat }}</h6>
                        <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                        <h6 class="text-muted">{{ $no_surat }}</h6>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tidak</button>
                    <button type="button" class="btn btn-danger" wire:click="remove({{ $id_surat }})">Ya</button>
                </div>
            </div>
        </div>
    </div>

</div>
