@extends('layouts.backend')

@push('style-after')
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ asset('cork/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
{{-- <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/dropify/dropify.min.css') }}">

<link href="{{ asset('cork/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('cork/plugins/select2/select2.min.css') }}">
<!-- END PAGE LEVEL STYLES -->

<link href="{{ asset('custom/css/main.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <h4>Edit Surat</h4>

            <div class="widget-content widget-content-area br-6">
                <div class="mb-4">

                    <form action="{{ route('surat.update', $document->id_surat) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="row">
                            {{-- <div class="col-xl-3">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Dokumen Elektronik <span class="red-star">*</span></label>
                                    @error('link_file')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <input name="link_file" type="file" id="input-file-max-fs" class="dropify" data-default-file="{{ $document->link_file ? asset('storage/' . $document->link_file) : asset('cork/assets/img/upload-dokumen.png') }}" data-max-file-size="2M" data-height="300" data-allowed-file-extensions="pdf doc docx" />
                                </div>
                            </div> --}}
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="link_file">Link File <span class="red-star">*</span></label>
                                        <input type="text" class="form-control" id="link_file" placeholder="https://drive.google.com/file/d/1IaDz-Vbuq4NLJ1S1EuzRrLe4kXdLhZSA/view?usp=sharing" name="link_file" value="{{ $document->link_file }}">
                                        @error('link_file')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_surat">Nomor Surat <span class="red-star">*</span></label>
                                        <input type="text" class="form-control" id="no_surat" placeholder="1298390183" name="no_surat" value="{{ $document->no_surat }}">
                                        @error('no_surat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tentang">Tentang <span class="red-star">*</span></label>
                                        <input type="text" class="form-control" id="tentang" placeholder="Lorem ipsum dolor sit..." name="tentang" value="{{ $document->tentang }}">
                                        @error('tentang')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jenis_surat">Jenis Surat <span class="red-star">*</span></label>
                                        <select name="jenis_surat" class="form-control">
                                            <option value="" disabled>Pilih Jenis Surat...</option>
                                            @if ($document->jenis_surat == 'Surat Keputusan')
                                            <option value="Surat Keputusan" selected>Surat Keputusan</option>
                                            <option value="Surat Tugas">Surat Tugas</option>
                                            @else
                                            <option value="Surat Keputusan">Surat Keputusan</option>
                                            <option value="Surat Tugas" selected>Surat Tugas</option>
                                            @endif
                                        </select>
                                        @error('jenis_surat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="basicFlatpickr">Tanggal Ditetapkan <span class="red-star">*</span></label>
                                        <input id="basicFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." name="tanggal_surat" value="{{ $document->tanggal_surat }}">
                                        @error('tanggal_surat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="pejabat">Pejabat</label>
                                        <input type="text" class="form-control" id="pejabat" placeholder="Wahyu Syahputra" name="pejabat" value="{{ $document->pejabat }}">
                                        @error('pejabat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jabatan_pejabat">Jabatan Pejabat</label>
                                        <input type="text" class="form-control" id="jabatan_pejabat" placeholder="Rektor" name="jabatan_pejabat" value="{{ $document->jabatan_pejabat }}">
                                        @error('jabatan_pejabat')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_mulai">Tanggal Surat Mulai</label>
                                        <input id="basicFlatpickr2" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." name="tanggal_mulai" value="{{ $document->tanggal_mulai }}">
                                        @error('tanggal_mulai')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_akhir">Tanggal Surat Berakhir</label>
                                        <input id="basicFlatpickr3" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." name="tanggal_akhir" value="{{ $document->tanggal_akhir }}">
                                        @error('tanggal_akhir')
                                        <div class="mt-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="penerima_surat">Penerima Surat <span class="red-star">*</span></label>
                                        <select class="js-example-basic-multiple" name="penerima_surat[]" multiple="multiple">
                                        @foreach ($users as $user)
                                            @if($document->users->contains('nip', $user->nip))
                                            <option value="{{ $user->nip }}" selected>{{ $user->nama }}</option>
                                            @else
                                            <option value="{{ $user->nip }}">{{ $user->nama }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                        @error('penerima_surat')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-12 ml-3">
                                        <label for="exampleFormControlTextarea1">Deskripsi Surat</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="98" name="deskripsi_surat" value="{{ $document->deskripsi_surat }}"></textarea>
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

<script src="{{ asset('cork/plugins/select2/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<!-- END PAGE LEVEL PLUGINS -->

<script src="{{ asset('cork/plugins/flatpickr/flatpickr.js') }}"></script>
<script>
    var f1 = flatpickr(document.getElementById('basicFlatpickr'));
</script>
@endpush