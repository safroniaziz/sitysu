@extends('layouts.backend')

@push('style-after')

@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <h4>Surat Tugas - </h4>

            <div class="widget-content widget-content-area br-6">
                <div class="mb-4">

                    <div class="d-flex justify-content-between">
                        <div>
                            <button class="btn btn-dark">Kembali</button>
                        </div>
                        <div>
                            <button class="btn btn-primary">Download</button>
                        </div>
                    </div>

                    <embed
                    src="{{ asset('storage/' . $document->file) }}"
                    type="application/pdf"
                    frameBorder="0"
                    scrolling="auto"
                    height="100%"
                    width="100%"
                    ></embed>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

