@extends('layouts.backend')

@push('style-after')

<link href="{{ asset('cork/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('custom/css/main.css') }}">

@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing">

        <livewire:user.profil>

    </div>
</div>
@endsection

@section('script-after')
    <script>
        window.addEventListener('swalUpdated', event => {
            Swal.fire({
                icon: 'success',
                title: 'Data User Berhasil Diperbarui',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
        })
    </script>
@endsection