@extends('layouts.backend')

@push('style-after')

    <link href="{{ asset('cork/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/assets/css/elements/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/css/main.css') }}">

@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <div class="d-flex">

                <div id="flash-data" data-user="{{ session()->get('success') }}"></div>

                <h3 class="mr-2">Manajemen User</h3>
                <a href="{{ route('manajemen.user.create') }}" class="align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke=" #1b55e2 " stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
            </div>

            <div class="widget-content widget-content-area br-6">

                <livewire:manajemen-user.data-card>

            </div>
        </div>
    </div>
</div>
@endsection

@push('script-after')

    <script>
        window.addEventListener('closeUserDeleteModal', event => {
            $("#deleteUserModal").modal('hide');
        });

        window.addEventListener('openUserDeleteModal', event => {
            $("#deleteUserModal").modal('show');
        });

        window.addEventListener('swalDeleted', event => {
            Swal.fire({
                icon: 'success',
                title: 'Data User Berhasil Dihapus',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
        });
    </script>

    <script src="{{ asset('custom/js/myscript.js') }}"></script>

@endpush