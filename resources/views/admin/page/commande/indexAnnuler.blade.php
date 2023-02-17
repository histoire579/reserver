@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i>Commande Régléés</h4>
          
          <div class="row">
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"></div>
             {{-- <div class="col-md-4 col-sm-4 mb"><a style="float: right;margin-right: 100px" href="/administration/promotion/add" type="button"  class="btn btn-default"><i class="fa fa-plus-square" style="color: #08367A" aria-hidden="true"></i> Nouveau</a></div> --}}
          </div>
          @include('admin.page.message')

          <div class="row">
            <div class="col-md-3 col-sm-3 mb">
              
            </div>
            <div class="col-md-6 col-sm-6 mb">
              
            </div>
            <div class="col-md-3 col-sm-3 mb">
                <button id="print" class="btn btn-primary" style="float: left">Imprimer</button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-3 mb">
              <form class="form-inline" role="form" action="{{route('administration.commande-annulee-search-date')}}">
                @csrf
                <div class="form-group">
                  <label class="sr-only" for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" >
                </div>
                <button type="submit" class="btn btn-theme">Rechercher</button>
              </form> 
            </div>
            <div class="col-md-6 col-sm-6 mb">
              <form class="form-inline" role="form" action="{{route('administration.commande-annulee-search-interval-date')}}">
                @csrf
                <div class="form-group">
                  <label class="col-sm-3 col-sm-3 control-label">Entre le</label>
                  <input type="date" class="form-control" id="debut" name="debut" >
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-sm-3 control-label">Et le</label>
                  <input type="date" class="form-control" id="fin" name="fin" >
                </div>
                <button type="submit" class="btn btn-theme">Rechercher</button>
              </form> 
            </div>
            <div class="col-md-3 col-sm-3 mb">
              <form class="form-inline" role="form" action="{{route('administration.commande-annulee-search')}}">
                @csrf
                <div class="form-group">

                  <input type="text" class="form-control" id="code" name="code" placeholder="Entrer le code">
                </div>
                <button type="submit" class="btn btn-theme" style="margin-top: 5px">Rechercher</button>
              </form> 
            </div>
          </div>

          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf" style="font-size: 18px">
              <thead class="cf">
                <tr>
                  <th id="">Client</th>
                  <th>Commande</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Total</th>
                  <th class="numeric"></th>
                  <th class="numeric"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $type)
                <tr>
                  <td data-title="Company">{{$type->user->name}}</td>
                  <td data-title="Company">{{$type->order_number}}</td>
                  <td data-title="Company">{{$type->order_date}}</td>
                  <td data-title="Company">{{$type->status}}</td>
                  <td data-title="Company">{{getPrix($type->total)}}</td>
                  <td class="numeric" data-title="Price"><a href="{{route('administration.commande-annulee.edit', ['order' => $type->id])}}" title="Modifier"> Détails</a></td>
                  <td class="numeric" data-title="Price"><a href="{{route('administration.commande-annulee.delete', ['order' => $type->id])}}" title="Modifier" style="color: red"> Supprimer</a></td>  
                </tr>                   
                @endforeach
              </tbody>
            </table>
            <div style="text-align: right; margin: 15px">{{$orders->links()}}</div>
          </section>


          <section id="no-more-tables" style="display: none">
            <table class="table table-bordered table-striped table-condensed cf" id="orderPrint" style="font-size: 18px">
              <thead class="cf">
                <tr>
                  <th id="">Client</th>
                  <th>Commande</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $type)
                <tr>
                  <td data-title="Company">{{$type->user->name}}</td>
                  <td data-title="Company">{{$type->order_number}}</td>
                  <td data-title="Company">{{$type->order_date}}</td>
                  <td data-title="Company">{{$type->status}}</td>
                  <td data-title="Company">{{getPrix($type->total)}}</td>  
                </tr>                   
                @endforeach
              </tbody>
            </table>
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
                
                $('#orderPrint').printThis();
            })
            
        })

    </script>

@endsection
