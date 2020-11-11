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
                        <th>Nama Singkatan Satuan Kerja</th>
                        <th>Nama Satuan Kerja</th>
                        <th>Tanggal Berakhir</th>
                        <th>Status Unit Kerja</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayat_unit_kerja as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $r->user->nama }}</td>
                        <td class="text-center">{{ $r->id_unit_kerja }}</td>
                        <td class="text-center">{{ $r->unitkerja->nama_departemen }}</td>
                        <td class="text-center">{{ $r->tanggal_berakhir }}</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Aktif</button>
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

</div>
</div>
