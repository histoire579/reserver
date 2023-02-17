@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
            <div class="row">
                <div class="col-md-4 col-sm-4 mb">
                  <a href="javascript:history.go(-1)" class="btn btn-default">
                    <i class="fas fa-arrow-alt-circle-left">Retour</i>
                  </a>
                </div>
                <div class="col-md-4 col-sm-4 mb">
                  
                </div>
                <div class="col-md-4 col-sm-4 mb">
                  <button id="print" class="btn btn-primary" style="float: left">Imprimer</button>
                </div>
            </div>
          
          
          <div class="row">
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"></div>
             {{-- <div class="col-md-4 col-sm-4 mb"><a style="float: right;margin-right: 100px" href="/administration/promotion/add" type="button"  class="btn btn-default"><i class="fa fa-plus-square" style="color: #08367A" aria-hidden="true"></i> Nouveau</a></div> --}}
          </div>
          @php
            $num=$order->order_number;
          @endphp
          @include('admin.page.message')
          <section id="no-more-tables" >
            <div id="orderPrint">
            <h4><i class="fa fa-angle-right"></i>Commande de {{$order->user->name}} du {{Carbon\Carbon::parse($order->order_date)->format('M d Y')}} et d'un total de: {{getPrix($order->total)}}</h4>
            <table class="table table-bordered table-striped table-condensed cf"  style="font-size: 18px; margin-top: 20px">
              <thead class="cf">
                <tr>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Prix unitaire</th>
                  <th>Total</th>
                  <th>TVA</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($order->products as $item)
                <tr>
                  <td data-title="Company">{{$item->title}}</td>
                  <td data-title="Company">{{$item->pivot->total_qty}}</td>
                  <td data-title="Company">{{getPrix($item->pivot->total_price / $item->pivot->total_qty)}}</td>
                  <td data-title="Company">{{getPrix($item->pivot->total_price)}}</td>
                  <td data-title="Company">{{getPrix($item->pivot->tva)}}</td>
                    
                </tr>                   
                @endforeach
              </tbody>
            </table>
          </div>
          </section>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
  </section>
</section>
@endsection

@section('extra-js')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('printThis/printThis.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','#print',function(){
                
                $('#orderPrint').printThis({
                  importCSS: false,
                  loadCSS: "/dash/lib/bootstrap/css/bootstrap.min.css",
                  header: "<h1>Facture n° </h1>"
                });
            })
            
        })

    </script>

@endsection
