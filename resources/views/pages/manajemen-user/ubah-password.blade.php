@extends('layouts.backend')

@push('style-after')
<link href="{{ asset('cork/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('custom/css/main.css') }}">
@endpush

@section('content')

<div class="row layout-top-spacing ">
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto" style="margin-bottom:24px;">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Form Ubah Password</h4>
                    </div>
                </div>
            </div>

            <livewire:manajemen-user.ubah-password>

        </div>
    </div>
</div>
@endsection