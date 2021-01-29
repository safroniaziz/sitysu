@extends('layouts.auth')

@section('content')
<h1 class="">Sign In</h1>
<p class="">Log in to your account to continue.</p>
@if (session()->has('error'))
    <span class="alert alert-danger mb-4">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
        <strong>Error!</strong> NIP / Password Anda Salah!</button>
    </span>
@endif
@error('nip')
    <div class="alert alert-danger mb-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
        <strong>Error!</strong> {{ $message }}</button>
    </div>
@enderror

    <form class="text-left" method="POST" action="{{ route('login.panda') }}">
        @csrf
        <div class="form">

            <div id="username-field" class="field-wrapper input">
                <label for="nip">NIP / NIK</label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <input id="nip" name="nip" type="text" class="form-control" placeholder="199201042019031015">
                @error('nip')
                    <strong>{{ $message }}</strong>
                @enderror
                </div>

                <div id="password-field" class="field-wrapper input mb-2">
                    <div class="d-flex justify-content-between">
                        <label for="password">PASSWORD</label>
                        <a href="auth_pass_recovery_boxed.html" class="forgot-pass-link">Forgot Password?</a>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    <input id="password" name="password" type="password" class="form-control" placeholder="*******">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    @error('password')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="d-sm-flex justify-content-between">
                    <div class="field-wrapper">
                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                    </div>
                </div>

        </div>
    </form>
@endsection
