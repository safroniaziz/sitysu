<div>
    <div class="d-flex">

        <div id="flash-data" data-surat="{{ session()->get('success') }}"></div>

        <h4 class="mr-2">Satuan Kerja</h4>

        <div style="cursor: pointer;" wire:click="openCreateModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke=" #1b55e2 " stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
        </div>

    </div>

    <div class="widget-content widget-content-area br-6">
        <div class="table-responsive mb-4 mt-4" style="overflow-x: hidden;">

            <div class="d-flex justify-content-between">
                <div class="data-table-filter mb-2 col-md-6 col-sm-8">
                    <div class="d-flex">
                        <label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Cari...">
                        </label>
                    </div>
                </div>
            </div>

            <table id="default-ordering" class="table table-hover" style="width:100%;">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th wire:click="sortBy('id_unit_kerja')" style="cursor: pointer;">
                            Nama Singkatan Satuan Kerja

                            @include('partials._sort-icon', ['field' => 'id_unit_kerja'])
                        </th>
                        <th wire:click="sortBy('nama_departemen')" style="cursor: pointer;">
                            Nama Satuan Kerja

                            @include('partials._sort-icon', ['field' => 'nama_departemen'])
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($unit_kerja as $u)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $u->id_unit_kerja }}</td>
                        <td class="text-center">{{ $u->nama_departemen }}</td>
                        <td class="text-center">
                            <a class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" wire:click.prevent="openEditModal({{ $u }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 table-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </a>
                            <a class="bs-tooltip" data-toggle="tooltip" data-placement="top" data-original-title="Hapus" wire:click.prevent="openDeleteModal({{ $u }})">
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
                    {{ $unit_kerja->links() }}
                </p>
            </div>

            <div wire:ignore.self class="modal animated zoomInUp custo-zoomInUp" id="deleteSatuanKerjaModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" id="standardModalLabel">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <div class="icon-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                            </div>
                            <h4 class="modal-text mt-3">Apakah anda yakin ingin menghapus data ini?</h4>
                            <div class="d-flex justify-content-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <h6 class="text-muted ml-1">{{ $id_unit_kerja }}</h6>
                                <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                                <h6 class="text-muted">{{ $nama_departemen }}</h6>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button class="btn btn-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tidak</button>
                            <button type="button" class="btn btn-danger" wire:click="remove">Ya</button>
                        </div>
                    </div>
                </div>
            </div>

            <div wire:ignore.self class="modal fade" id="createSatuanKerjaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Unit Kerja</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_unit_kerja">Singkatan Unit Kerja</label>
                                <input type="text" placeholder="G1A" class="form-control" id="id_unit_kerja" wire:model="id_unit_kerja">
                                @error('id_unit_kerja')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_departemen">Nama Unit Kerja</label>
                                <input type="text" placeholder="Fakultas Teknik" class="form-control" id="nama_departemen" wire:model="nama_departemen">
                                @error('nama_departemen')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                            <button type="button" class="btn btn-primary" wire:click="store">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div wire:ignore.self class="modal fade" id="editSatuanKerjaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Unit Kerja</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_unit_kerja">Singkatan Unit Kerja</label>
                                <input type="text" placeholder="G1A" class="form-control" id="id_unit_kerja" wire:model="id_unit_kerja">
                                @error('id_unit_kerja')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_departemen">Nama Unit Kerja</label>
                                <input type="text" placeholder="Fakultas Teknik" class="form-control" id="nama_departemen" wire:model="nama_departemen">
                                @error('nama_departemen')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                            <button type="button" class="btn btn-primary" wire:click="update">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
