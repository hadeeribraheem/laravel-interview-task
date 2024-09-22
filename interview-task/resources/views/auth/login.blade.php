@extends('layout.master')
@section('title','login')

@section('content')
<div class="login">
    <div class="container">
        <div class="card login-card">
            <div class="login-logo d-flex justify-content-center align-items-center">
                <i class="bi bi-bag-check-fill"></i>
            </div>
            <h2 class="text-center">Login Page</h2>
            <form method="post" action="{{ route('auth.login') }}"  enctype="multipart/form-data" class="loginform">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="phone"
                           value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" name="password" type="password">
                </div>
                {{--@if ($errors->has('error'))
                    <div>
                        <p class="alert alert-danger mt-2"> {{ $errors->first('error') }}</p>
                    </div>
                @endif--}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection






















