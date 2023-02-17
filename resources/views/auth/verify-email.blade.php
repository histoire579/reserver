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
            <h3 class="breadcrumb-title pe-3">{{ __('Verification Email')}}</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> {{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Authentication')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Verification Email')}}</li>
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
                                <div class="text-center">
   
                                    <p>
                                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                    </p>

                                    <p>
                                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                    </p>
                                </div>
                                
                                
                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-dark"><i class="bx bxs-lock-open"></i>{{ __('Resend Verification Email') }}</button>
                                            </div>
                                        </div>
                                    </form>

                                    <form class="row g-3" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-light btn-lg"><i class="bx bxs-lock-open"></i>{{ __('Log Out') }}</button>
                                                
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