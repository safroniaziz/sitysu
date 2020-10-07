@extends('layouts.backend')

@push('style-after')
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ asset('cork/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
{{-- <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/dropify/dropify.min.css') }}">

<link href="{{ asset('cork/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL STYLES -->
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <h4>Input Surat Tugas</h4>

            <div class="widget-content widget-content-area br-6">
                <div class="mb-4">

                    <form action="{{ route('surat.tugas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Dokumen Elektronik</label>
                                <input type="file" id="input-file-max-fs" class="dropify" data-default-file="{{ asset('cork/assets/img/upload-dokumen.png') }}" data-max-file-size="2M" data-height="300" data-allowed-file-extensions="pdf doc docx" />
                                </div>
                            </div>
                            <div class="col-xl-9">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="nama_surat">Nama Surat</label>
                                        <input type="text" class="form-control" id="nama_surat" placeholder="Surat Pernyataan..." name="nama_surat">
                                        @error('nama_surat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="no_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" id="no_surat" placeholder="1298390183" name="no_surat">
                                        @error('no_surat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="penandatangan">Penandatangan</label>
                                        <input type="text" class="form-control" id="penandatangan" placeholder="Wahyu Syahputra" name="penandatangan">
                                        @error('penandatangan')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-5">
                                        <label for="basicFlatpickr">Ditetapkan</label>
                                        <input id="basicFlatpickr" value="2020-01-01" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." name="ditetapkan">
                                        @error('ditetapkan')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-5">
                                        <label for="jenis_surat">Jenis Surat</label>
                                        <select name="jenis_surat" id="jenis_surat" class="form-control">
                                            <option value="">Pilih Jenis Surat ...</option>
                                            <option value="k">Surat Keterangan</option>
                                            <option value="t">Surat Tugas</option>
                                        </select>
                                        @error('jenis_surat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
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