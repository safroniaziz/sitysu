@extends('layouts.backend')

@push('style-after')
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ asset('cork/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cork/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL STYLES -->
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <h4>Input Surat Tugas</h4>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <div class="widget-content widget-content-area br-6">
                <div class="mb-4">

                    <form action="{{ route('surat.tugas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Dokumen Elektronik <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="application/pdf/*" name="file">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="nama_surat">Nama Surat</label>
                                        <input type="text" class="form-control" id="nama_surat" placeholder="Surat Pernyataan..." name="nama_surat">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="no_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" id="no_surat" placeholder="1298390183" name="no_surat">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="penandatangan">Penandatangan</label>
                                        <input type="text" class="form-control" id="penandatangan" placeholder="Wahyu Syahputra" name="penandatangan">
                                    </div>
                                    <div class="form-group col-md-6 mb-5">
                                        <label for="basicFlatpickr">Ditetapkan</label>
                                        <input id="basicFlatpickr" value="2019-09-04" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." name="ditetapkan">
                                    </div>
                                    <div class="form-group col-md-6 mb-5">
                                        <label for="jenis_surat">Jenis Surat</label>
                                        <select name="jenis_surat" id="jenis_surat" class="form-control">
                                            <option value="">Pilih Jenis Surat ...</option>
                                            <option value="k">Surat Keterangan</option>
                                            <option value="t">Surat Tugas</option>
                                        </select>
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
<script src="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
<!-- END PAGE LEVEL PLUGINS -->

<script src="{{ asset('cork/plugins/flatpickr/flatpickr.js') }}"></script>
<script>
    var f1 = flatpickr(document.getElementById('basicFlatpickr'));
</script>
@endpush