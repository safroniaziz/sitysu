@extends('layouts.backend')

@push('style-after')
<link href="{{ asset('cork/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('custom/css/main.css') }}">
@endpush

@section('content')

<div class="row layout-top-spacing ">
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto" style="margin-bottom:24px;">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Form Ubah Password</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area" style="height: 471px;">
                <form wire:submit.prevent="submit">
                    <div class="form-row mb-2 justify-content-center">
                        <div class="form-group col-md-6 ">
                            <label for="nama">Password Lama <span class="red-star">*</span></label>
                            <input type="text" class="form-control" id="nama" placeholder="*********" name="nama" wire:model="nama">
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row mb-2 justify-content-center">
                        <div class="form-group col-md-6">
                            <label for="nama">Password Baru <span class="red-star">*</span></label>
                            <input type="text" class="form-control" id="nama" placeholder="*********" name="nama" wire:model="nama">
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row mb-2 justify-content-center">
                        <div class="form-group col-md-6">
                            <label for="nama">Ulangi Password <span class="red-star">*</span></label>
                            <input type="text" class="form-control" id="nama" placeholder="*********" name="nama" wire:model="nama">
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection