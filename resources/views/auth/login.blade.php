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
            <h3 class="breadcrumb-title pe-3">{{ __('Sign In')}}</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> {{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Authentication')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Sign In')}}</li>
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
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5">
            <div class="row row-cols-1 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                    <i class='bx bx-error' style="font-size: 18px"></i>
                                    <div>
                                        {{session('error')}}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                
                                <div class="text-center">
                                    <h3 class="">{{ __('Sign In')}}</h3>
                                    <p>{{ __('Don\'t have an account yet?')}} <a href="{{ route('register') }}">{{ __('Sign up here')}}</a>
                                    </p>
                                </div>
                                <div class="d-grid">
                                    <a class="btn my-4 shadow-sm btn-white" href="{{ route('google.auth') }}"> <span class="d-flex justify-content-center align-items-center">
                                        <img class="me-2" src="{{asset('dist/assets/images/icons/search.svg')}}" width="16" alt="Image Description">
                                        <span>{{ __('Sign In with Google')}}</span>
                                        </span>
                                    </a> <a href="{{ route('facebook.auth') }}" class="btn btn-white"><i class="bx bxl-facebook"></i>{{ __('Sign In with Facebook')}}</a>
                                </div>
                                <div class="login-separater text-center mb-4"> <span>{{ __('OR SIGN In WITH EMAIL')}}</span>
                                    <hr/>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="login" class="form-label">{{ __('Email or Phone')}}</label>
                                            <input type="text" id="login" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" placeholder="Email or Phone">
                                            @error('login')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">{{ __('Password')}}</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                            @endif
                                            	
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-dark"><i class="bx bxs-lock-open"></i>{{ __('Sign In')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</section>
<!--end shop cart-->
    
@endsection