@extends('layouts.backend')

@push('style-after')
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ asset('cork/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
{{-- <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/dropify/dropify.min.css') }}">

<link href="{{ asset('cork/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL STYLES -->

<!--  BEGIN MYSTYLES  -->
<link href="{{ asset('custom/css/main.css') }}" rel="stylesheet" type="text/css" />
<!--  END MYSTYLES  -->
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <h4>Edit User</h4>

            <div class="widget-content widget-content-area br-6">
                <div class="mb-4">

                    <form action="{{ route('manajemen.user.update', $user->nip_nidn) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="nama">Nama <span class="red-star">*</span></label>
                                    <input type="text" class="form-control" id="nama" placeholder="John Doe" name="nama" value="{{ $user->nama }}">
                                        @error('nama')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nip_nidn">NIP/NIDN <span class="red-star">*</span></label>
                                        <input type="text" class="form-control" id="nip_nidn" placeholder="129839120183" name="nip_nidn" value="{{ $user->nip_nidn }}">
                                        @error('nip_nidn')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="role">Hak Akses <span class="red-star">*</span></label>
                                        <select name="role" id="role" class="form-control">
                                            @if ($user->role == 'dosen')
                                            <option value="" disabled>Pilih Hak Akses...</option>
                                            <option value="dosen" selected>Dosen</option>
                                            <option value="staf">Staf</option>
                                            @elseif($user->role == 'staf')
                                            <option value="" disabled>Pilih Hak Akses...</option>
                                            <option value="dosen">Dosen</option>
                                            <option value="staf" selected>Staf</option>
                                            @endif
                                        </select>
                                        @error('role')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Jl. Kampar 03" name="alamat" value="{{ $user->alamat }}">
                                        @error('alamat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_hp">No. Hp</label>
                                        <input type="text" class="form-control" id="no_hp" placeholder="083287498327" name="no_hp" value="{{ $user->no_hp }}">
                                        @error('no_hp')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jk">Jenis Kelamin</label>
                                        <div class="mt-2">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                                                </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                            </div>
                                            @error('jk')
                                            <div class="mt-2 text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-5 text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('script-after')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('cork/assets/js/scrollspyNav.js') }}"></script>
{{-- <script src="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
--}}

<script src="{{ asset('cork/plugins/dropify/dropify.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
       // Basic
       $('.dropify').dropify();
   });
</script>

<script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
<!-- END PAGE LEVEL PLUGINS -->

<script src="{{ asset('cork/plugins/flatpickr/flatpickr.js') }}"></script>
<script>
    var f1 = flatpickr(document.getElementById('basicFlatpickr'));
</script>
@endpush