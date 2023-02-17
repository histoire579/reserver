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
            <h3 class="breadcrumb-title pe-3">{{ __('Confirm password')}}</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> {{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Authentication')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Confirm password')}}</li>
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
                                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }} 
                                    </p>
                                </div>
                                
                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{ route('password.confirm') }}">
                                        @csrf
                                        
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
                                        
                                        
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-dark"><i class="bx bxs-lock-open"></i>{{ __('Confirm')}}</button>
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