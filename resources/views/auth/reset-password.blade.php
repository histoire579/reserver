@extends('layouts.main')

@section('extra-css')

<style>

   

</style>
    
@endsection

@section('content')

<!--start breadcrumb-->
<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
    <div class="container">
        <div class="page-breadcrumb d-flex align-items-center">
            <h3 class="breadcrumb-title pe-3">{{ __('Reset Password')}}</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> {{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Authentication')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Reset Password')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--end breadcrumb-->

<!--start shop cart-->
<section class="">
    <div class="container">
        <div class="authentication-reset-password d-flex align-items-center justify-content-center my-5">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-lg-5 border-end">
                                <div class="card-body">
                                    <div class="p-5">
                                        <h4 class="font-weight-bold">{{ __('Genrate New Password')}}</h4>
                                        <p class="">{{ __('We received your reset password request. Please enter your new password!')}}</p>
                                        <form class="row g-3" method="POST" action="{{ route('password.update') }}">
                                            @csrf

                                            <div class="mb-3 mt-5">
                                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                            </div>

                                            <div class="mb-3 mt-5">
                                                <label for="email" class="form-label">{{ __('Email')}}</label>
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 mt-5">
                                                <label for="password" class="form-label">{{ __('New password')}}</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" id="password" class="form-control border-end-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputSelectCountry" class="form-label">{{ __('Confirm Password')}}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-dark">{{ __('Change Password')}}</button> <a href="authentication-login.html" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>{{ __('Back to Login')}}</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <img src="{{ asset('dist/assets/images/login-images/forgot-password-frent-img.jpg')}}" class="card-img login-img h-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end shop cart-->
    
@endsection