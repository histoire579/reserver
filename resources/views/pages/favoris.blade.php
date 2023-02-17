@extends('layouts.main')

@section('extra-script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

<!--start breadcrumb-->
<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
    <div class="container">
        <div class="page-breadcrumb d-flex align-items-center">
            <h3 class="breadcrumb-title pe-3">{{ __('Wishlist')}}</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> {{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Pages')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Wishlist')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--end breadcrumb-->

<!--start Featured product-->

@php
    $favoris= auth()->user()->favoris;
    //var_dump($favoris);
@endphp
<section class="py-4">
    <div class="container">
        <div class="product-grid">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @forelse ($favoris as $item)
                    
                
                <div class="col">
                    <div class="card rounded-0 border">
                        <a href="{{route('produit.detail',$item->produit->url)}}">
                            <img src="{{asset('/storage/imgs/'.$item->produit->image)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <div class="product-info">
                                @if (app()->getLocale() == 'en')
                                    <a href="javascript:;">
                                        <p class="product-catergory font-13 mb-1">{{$item->produit->categorie->title_en}}</p>
                                    </a>
                                    <a href="{{route('produit.detail',$item->produit->url)}}">
                                        <h6 class="product-name mb-2">{{$item->produit->title_en}}</h6>
                                    </a>
                                @else
                                    <a href="javascript:;">
                                        <p class="product-catergory font-13 mb-1">{{$item->produit->categorie->title}}</p>
                                    </a>
                                    <a href="{{route('produit.detail',$item->produit->url)}}">
                                        <h6 class="product-name mb-2">{{$item->produit->title}}</h6>
                                    </a>
                                @endif
                                
                                <div class="d-flex align-items-center">
                                    <div class="mb-1 product-price">	<span class="me-1 text-decoration-line-through">{{getPrix($item->produit->ancien_prix)}}</span>
                                        <span class="fs-5">{{getPrix($item->produit->prix)}}</span>
                                    </div>
                                    <div class="cursor-pointer ms-auto">	<i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                </div>
                                <div class="product-action mt-2">
                                    <div class="d-grid gap-2">
                                        
                                        <a href="{{route('produit.detail',$item->produit->url)}}" class="btn btn-dark btn-ecomm">{{ __('View')}}</a>	
                                        <a href="{{route('favoris.delete',$item->id)}}" class="btn btn-light btn-ecomm"><i class='bx bx-zoom-in'></i>Remove From List</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                    <h2 style="text-align: center !important; margin: 20px">{{ __('Nothing wishlist')}}</h2>
                @endforelse

            </div>
            <!--end row-->
        </div>
    </div>
</section>
<!--end Featured product-->
    
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
  
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true,
        "newestOnBottom" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

  
    
  </script>
    
@endsection