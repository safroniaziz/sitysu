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
            <select name="" id="" class="form-control float-right" style="width: 200px;" wire:model="filter">
                <option value="semua">Semua</option>
                <option value="admin">Admin</option>
                <option value="staf">Staf</option>
                <option value="dosen">Dosen</option>
            </select>
        </div>
    </div>

    <div class="row">

        @forelse ($users as $user)
        <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
            <div class="card image-container"width: 18rem;">
                @if ($user->status == 'nonaktif')
                    <span class="user-status">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#e7515a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </span>
                @else
                    <span class="user-status">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#8dbf42" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </span>
                @endif
                <div class="dropdown custom-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f1f2f3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                        <a class="dropdown-item" href="{{ route('manajemen.user.edit', $user->nip) }}">Edit</a>
                        <a class="dropdown-item" wire:click.prevent="openModal({{ $user }})" style="cursor:pointer">Disable</a>
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('storage/foto-profil/user-default.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h6 class="card-text"><b>Nama : {{ Str::limit($user->nama, 15) }}</b></h6>
                    <p class="text-muted">NIP/NIDN : {{ $user->nip }}</p>
                    <p class="text-muted">Hak Akses :
                        @if ($user->hak_akses == 'admin')
                        <span class="btn btn-info btn-sm tiny-button">{{ Str::ucfirst($user->hak_akses) }}</span>
                        @elseif ($user->hak_akses == 'staf')
                        <span class="btn btn-success btn-sm tiny-button">{{ Str::ucfirst($user->hak_akses) }}</span>
                        @else
                        <span class="btn btn-secondary btn-sm tiny-button">{{ Str::ucfirst($user->hak_akses) }}</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-outline-danger mx-auto mt-3 text-center text-danger" role="alert" style="width: 900px;">
            <strong>Error!</strong> Data yang anda cari tidak ditemukan.
        </div>
        @endforelse

        <div class="col-md-12 mt-2">
            <div class="d-flex justify-content-center">
                <p>
                    {{ $users->links() }}
                </p>
            </div>
        </div>

        <div wire:ignore.self class="modal animated zoomInUp custo-zoomInUp" id="disableUserModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" id="standardModalLabel">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="icon-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                        </div>
                        <h4 class="modal-text mt-3">Apakah anda yakin ingin <strong>menonaktifkan</strong> akun ini?</h4>
                        <div class="d-flex justify-content-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <h6 class="text-muted ml-1">{{ $nama }}</h6>
                            <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                            <h6 class="text-muted">{{ $nip }}</h6>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tidak</button>
                        <button type="button" class="btn btn-danger" wire:click="disable({{ $id_user }})">Ya</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>