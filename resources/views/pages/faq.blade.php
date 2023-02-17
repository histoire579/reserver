@extends('layouts.main')

@section('extra-script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

<!--start breadcrumb-->
<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
    <div class="container">
        <div class="page-breadcrumb d-flex align-items-center">
            <h3 class="breadcrumb-title pe-3">{{ __('Frequently asked questions')}}</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> {{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Pages')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Frequently asked questions')}}</li>
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
        <div class="accordion" id="accordionExample">
          @foreach ($faqs as $faq)
            @if ($faq->id == 1)
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{$faq->id}}">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                    @if (app()->getLocale() == 'en')
                      {{$faq->question_en}}
                    @else
                      {{$faq->question}}
                    @endif
                    
                  </button>
                </h2>
                <div id="collapse{{$faq->id}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$faq->id}}" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    @if (app()->getLocale() == 'en')
                      <p style="color: #000">{{$faq->reponse_en}}</p>
                    @else
                      <p style="color: #000">{{$faq->reponse}}</p>
                    @endif
                    
                  </div>
                </div>
              </div>
            @else
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{$faq->id}}">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                    @if (app()->getLocale() == 'en')
                      {{$faq->question_en}}
                    @else
                      {{$faq->question}}
                    @endif
                  </button>
                </h2>
                <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$faq->id}}" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    @if (app()->getLocale() == 'en')
                      <p style="color: #000">{{$faq->reponse_en}}</p>
                    @else
                      <p style="color: #000">{{$faq->reponse}}</p>
                    @endif
                  </div>
                </div>
              </div>
            @endif
         
          @endforeach  
          <hr>
          {{$faqs->links('blog.pagination')}}

    </div>
</section>
    
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