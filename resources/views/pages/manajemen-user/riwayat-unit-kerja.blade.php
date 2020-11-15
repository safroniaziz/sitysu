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

            <livewire:riwayat-unit-kerja.data-table>

        </div>

    </div>
</div>

@endsection

@push('script-after')
    <script>
        window.addEventListener('openNonActiveUser', event => {
            $("#nonActiveUser").modal('show');
        });

        window.addEventListener('closeNonActiveUser', event => {
            $("#nonActiveUser").modal('hide');
        });
    </script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
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