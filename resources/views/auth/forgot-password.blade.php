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
            <h3 class="breadcrumb-title pe-3">{{ __('Forgot Password')}}</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> {{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Authentication')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Forgot Password')}}</li>
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
        <div class="authentication-forgot d-flex align-items-center justify-content-center my-5">
            <div class="card forgot-box">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="text-center">
                            <img src="{{asset('dist/assets/images/icons/forgot-2.png')}}" width="120" alt="" />
                            
                        </div>
                        <h3 class="">{{ __('Sign In')}}</h3>
                        <p>{{ __('Forgot Password?')}} 
                            {{ __('Enter your registered email ID to reset the password')}}
                        </p>
                        
                        <div class="form-body">
                            <form class="row g-3" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="email" class="form-label">{{ __('Email')}}</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                
                                
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-dark btn-lg">{{ __('Send')}}</button> <a href="{{ route('login') }}" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>{{ __('Back to Login')}}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end shop cart-->
    
@endsection