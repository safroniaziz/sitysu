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

            <h4 class="text-center">Tambah Dosen</h4>

            <div class="widget-content widget-content-area br-6">
                <div class="mb-4">

                    <form action="{{ route('manajemen.user.store', 'dosen') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="nip">NIP / NIK <span class="red-star">*</span></label>
                                        <input type="text" class="form-control" id="nip" placeholder="129839120183" name="nip">
                                        @error('nip')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nama">Nama <span class="red-star">*</span></label>
                                        <input type="text" class="form-control" id="nama" placeholder="John Doe" name="nama">
                                        @error('nama')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="id_unit_kerja">Unit Kerja <span class="red-star">*</span></label>
                                        <select name="id_unit_kerja" id="id_unit_kerja" class="form-control">
                                            <option value="">Pilih Unit Kerja...</option>
                                            @foreach ($unit_kerja as $uk)
                                            <option value="{{ $uk->id_unit_kerja }}">{{ $uk->nama_departemen }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_unit_kerja')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="no_hp">No. Hp</label>
                                        <input type="text" class="form-control" id="no_hp" placeholder="083287498327" name="no_hp">
                                        @error('no_hp')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nidn">NIDN</label>
                                        <input type="text" class="form-control" id="nidn" placeholder="0228434920" name="nidn">
                                        @error('nidn')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Jl. Kampar 03" name="alamat">
                                        @error('alamat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="jenis_kelamin">Jenis Kelamin <span class="red-star">*</span></label>
                                        <div class="mt-2">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="L">
                                                <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="P">
                                                <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                            </div>
                                            @error('jenis_kelamin')
                                            <div class="mt-2 text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 mt-1 text-right">
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