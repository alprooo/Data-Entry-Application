@extends('layouts.main')


@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>User Profile</h3>
                                <p class="text-subtitle text-muted">
                                    Ubah data profile user.
                                </p>

                            </div>
                            <div class="card-body">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        {{ $message }}
                                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label>Student ID</label>
                                        <input type="text" class="form-control @error('student_id') is-invalid @enderror"
                                            value="{{ Auth::user()->student_id }}" name="student_id" id="student_id">

                                        @error('student_id')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            value="{{ Auth::user()->email }}" name="email" id="email">

                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <input type="hidden" name="password_old" value="{{ Auth::user()->password }}">

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            value="{{ Auth::user()->password }}" name="password" id="password">

                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary">Update</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection
