<div>
    <div class="d-flex">

        <div id="flash-data" data-surat="{{ session()->get('success') }}"></div>

        <h4 class="mr-2">Riwayat Unit Kerja</h4>

    </div>

    <div class="widget-content widget-content-area br-6">
        <div class="table-responsive mb-4 mt-4" style="overflow-x: hidden;">

            <table id="default-ordering" class="table table-hover" style="width:100%;">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Nama Satuan Kerja</th>
                        <th>Tanggal Berakhir</th>
                        <th>Status Unit Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayat_unit_kerja as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $r->user->nama }}</td>
                        <td class="text-center">{{ $r->unitkerja->nama_departemen }}</td>
                        <td class="text-center">{{ $r->tanggal_berakhir }}</td>
                        <td class="text-center">
                            @if ($r->status == 'aktif')
                            <button class="btn btn-success btn-sm">Aktif</button>
                            @else
                            <button class="btn btn-danger btn-sm">Tidak Aktif</button>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($r->status == 'aktif')
                            <div class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nonaktifkan" wire:click="openModal({{ $r->nip }})" style="cursor: pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e7515a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
                            </div>
                            @else
                            <div class="bs-tooltip">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#acb0c3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
                            </div>
                            @endif
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

        </div>
    </div>

    <div wire:ignore.self class="modal animated zoomInUp custo-zoomInUp" id="nonActiveUser" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" id="standardModalLabel">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="icon-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    </div>
                    <h4 class="modal-text mt-3">Apakah anda yakin ingin <strong>menonaktifkan</strong> hak akses inputan surat untuk akun ini?</h4>
                    <div class="d-flex justify-content-center mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <h6 class="text-muted ml-1 mr-3">{{ $nama_user }}</h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <h6 class="text-muted">{{ $tanggal_berakhir }}</h6>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tidak</button>
                    <button type="button" class="btn btn-danger" wire:click="nonActive({{ $nip }})">Ya</button>
                </div>
            </div>
        </div>
    </div>

</div>
