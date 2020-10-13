@extends('layouts.backend')

@push('style-after')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/table/datatable/dt-global_style.css') }}">
    <!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('cork/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('cork/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cork/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cork/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cork/plugins/bootstrap-range-Slider/bootstrap-slider.css') }}" rel="stylesheet" type="text/css">
    <!--  END CUSTOM STYLE FILE  -->

    <!--  BEGIN MYSTYLES  -->
    <link href="{{ asset('custom/css/main.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> --}}
    <script src="https://kit.fontawesome.com/b6d19992bf.js" crossorigin="anonymous"></script>
    <!--  END MYSTYLES  -->
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <div class="d-flex">

                <div id="flash-data" data-flashdata="{{ session()->get('success') }}"></div>

                <h4 class="mr-2">Surat Tugas</h4>
                <a href="{{ route('surat.tugas.create') }}" class="align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e2a03f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>

            </div>

            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4" style="overflow-x: hidden;">

                    <livewire:surat-tugas.data-table>

                </div>
            </div>
        </div>

    </div>
</div>

{{-- <livewire:surat-tugas.delete-modal> --}}

@endsection

@push('script-after')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script>
        window.addEventListener('closeSuratTugasDeleteModal', event => {
            $("#deleteSuratTugasModal").modal('hide');
        });

        window.addEventListener('openSuratTugasDeleteModal', event => {
            $("#deleteSuratTugasModal").modal('show');
        })

        window.addEventListener('swalDeleted', event => {
            Swal.fire({
                icon: 'success',
                title: 'Surat Tugas Berhasil Dihapus',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
        })
    </script>

    <script src="{{ asset('cork/plugins/table/datatable/datatables.js') }}"></script>
    {{-- <script>
        $('#default-ordering').DataTable( {
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "order": [[ 3, "desc" ]],
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7,
            drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
	    } );
    </script> --}}


    <script src="{{ asset('cork/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('cork/plugins/flatpickr/custom-flatpickr.js') }}"></script>

    <script>
        flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
            mode: "range"
        });
    </script>

    <script src="{{ asset('custom/js/myscript.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush