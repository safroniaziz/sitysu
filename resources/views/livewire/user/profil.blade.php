<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <h3>Edit Profil</h3>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12">

        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex">
                    <h3 class="">Profil</h3>
                </div>
                <div class="text-center user-info">
                    <img src="{{ asset(($user->foto_profil ? 'storage/' . $user->foto_profil : 'cork/assets/img/90x90.jpg'))   }}" alt="avatar" style="width: 90px; height: 90px; object-fit: cover;">
                    <p class="">{{ $user->nama }}</p>
                    <p class="" style="margin-top: -10px; margin-bottom: -10px; font-size: 17px;">{{ Str::ucfirst($user->role) }}</p>
                </div>
                <div class="user-info-list">

                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                @if ($user->jk == 'l')
                                Laki-laki
                                @else
                                Perempuan
                                @endif
                            </li>
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> {{ Str::ucfirst($user->nip_nidn) }}
                            </li>
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> {{ ($user->alamat ? $user->alamat : 'Belum Diisi') }}
                            </li>
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> {{ ($user->no_hp ? $user->no_hp : 'Belum Diisi') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Form Edit Profil</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area" style="height: 471px;">
                <form wire:submit.prevent="submit">
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Wahyu Syahputra" name="nama" wire:model="nama">
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nip_nidn">NIP/NIDN</label>
                                <input type="text" class="form-control" id="nip_nidn" placeholder="21387429" name="nip_nidn" wire:model="nip_nidn">
                                @error('nip_nidn') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Jl. Kampar 03" name="alamat" wire:model="alamat">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="no_hp">No. Hp</label>
                                <input type="text" class="form-control" id="no_hp" placeholder="0812381731" wire:model="no_hp">
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="form-group col-md-12">
                                <label for="foto_profil">Foto Profil</label>
                                <input type="file" class="form-control" id="foto_profil" wire:model="foto_profil" value="{{ $user->foto_profil }}">
                                @error('foto_profil') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="form-group col-md-12">
                                <label for="jk">Jenis Kelamin</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="jk" class="custom-control-input" value="l" wire:model="jk">
                                    <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                                    </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="jk" class="custom-control-input" value="p" wire:model="jk">
                                    <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                </div>

                            </div>
                        </div>
                      <button type="submit" class="btn btn-primary mt-3 float-right">Simpan</button>
                    </form>
            </div>
        </div>
    </div>

</div>