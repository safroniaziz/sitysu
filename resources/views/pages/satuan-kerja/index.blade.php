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
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/assets/css/elements/alert.css') }}">
    <!--  END CUSTOM STYLE FILE  -->

    <!--  BEGIN MYSTYLES  -->
    <link href="{{ asset('custom/css/main.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/b6d19992bf.js" crossorigin="anonymous"></script>
    <!--  END MYSTYLES  -->
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <livewire:satuan-kerja.data-table>

        </div>

    </div>
</div>

@endsection

@push('script-after')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script>
        window.addEventListener('closeDeleteSatuanKerjaModal', event => {
            $("#deleteSatuanKerjaModal").modal('hide');
        });

        window.addEventListener('openDeleteSatuanKerjaModal', event => {
            $("#deleteSatuanKerjaModal").modal('show');
        });

        window.addEventListener('closeCreateSatuanKerjaModal', event => {
            $("#createSatuanKerjaModal").modal('hide');
        });

        window.addEventListener('openCreateSatuanKerjaModal', event => {
            $("#createSatuanKerjaModal").modal('show');
        });

        window.addEventListener('closeEditSatuanKerjaModal', event => {
            $("#editSatuanKerjaModal").modal('hide');
        });

        window.addEventListener('openEditSatuanKerjaModal', event => {
            $("#editSatuanKerjaModal").modal('show');
        });

        window.addEventListener('swalCreated', event => {
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil ditambahkan',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
        });

        window.addEventListener('swalEdited', event => {
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil diedit',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
        });

        window.addEventListener('swalDeleted', event => {
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil deleted',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
        });
    </script>

    <script src="{{ asset('cork/plugins/table/datatable/datatables.js') }}"></script>
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