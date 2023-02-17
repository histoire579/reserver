@extends('layouts.main')

@section('extra-script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

<!--start breadcrumb-->
<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
    <div class="container">
        <div class="page-breadcrumb d-flex align-items-center">
            @if (app()->getLocale() == 'en')
                <h3 class="breadcrumb-title pe-3">{{$page->title_en}}</h3>
            @else
                <h3 class="breadcrumb-title pe-3">{{$page->title}}</h3> 
            @endif
            
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> {{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Pages')}}</a>
                        </li>
                        @if (app()->getLocale() == 'en')
                            <li class="breadcrumb-item active" aria-current="page">{{$page->title_en}}</li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--end breadcrumb-->

<!--start page content-->
<section class="py-0 py-lg-4">
    <div class="container">
        @if (app()->getLocale() == 'en')
        <h4 style="color:#DD0A7C">{{$page->title_en}}</h4>
        <p style="text-align: justify">{!!$page->content_en!!}</p>
        @else
        <h4 style="color:#DD0A7C">{{$page->title}}</h4>
        <p style="text-align: justify">{!!$page->content!!}</p>
        @endif

    </div>
</section>

<!--end start page content-->

@endsection

@section('extra-js')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true,
        "newestOnTop" : false
    }
            toastr.success("{{ session('success') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true,
        "newestOnBottom" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

  
    
  </script>
    
@endsection