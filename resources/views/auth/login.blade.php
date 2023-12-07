@extends('layouts.auth')

@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index-2.html"><img src="{{ asset('images/logo/logo.png') }}" alt="Logo"
                                style="width: 150px;height: 150px;" /></a>
                    </div>
                    <h1 class="auth-title" style="margin-top: -80px">Selamat Datang.</h1>
                    <p class="auth-subtitle mb-5">
                        Please enter your credentials below to proceed.
                    </p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">

                            <input id="student_id" type="text"
                                class="form-control form-control-xl @error('student_id') is-invalid @enderror"
                                name="student_id" value="{{ old('student_id') }}" autocomplete="student_id" autofocus>

                            @error('student_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password"
                                class="form-control form-control-xl @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password">


                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">
                            Log in
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-bold">Sign up</a>.
                        </p>
                        <p>

                            @if (Route::has('password.request'))
                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> --}}
                                <a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>
                            @endif
                        </p>



                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
@endsection
