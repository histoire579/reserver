@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <!-- FORM VALIDATION -->
    
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> </h4>
          <div class="row">
            <div class="col-md-4 col-sm-4 mb"><a style="float: left;margin-left: 100px" href="/administration/demi-gros" type="button"  class="btn btn-default"><i class="fa fa-arrow-circle-o-left" style="color: #08367A" aria-hidden="true"></i> Retourner à la liste</a></div>
            <div class="col-md-4 col-sm-4 mb"></div>
            <div class="col-md-4 col-sm-4 mb"></div>
         </div>
         @include('admin.page.message')
          <div class="form-panel">
            <div class=" form">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.demi-gros')}}">
                @csrf

                <div class="form-group ">
                  <label for="prix_unitaire" class="control-label col-lg-2">Prix unitaire </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="prix_unitaire" name="prix_unitaire" minlength="1" type="number" required />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Produit </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="prod_id" id="prod_id">
                      @foreach ($produits as $produit)
                        <option value="{{$produit->id}}">{{$produit->title}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="qte_min" class="control-label col-lg-2">Quantité minimale </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="qte_min" name="qte_min" minlength="2" type="number" required />
                  </div>
                </div>
              
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
      </div>
  </section>
</section>
@endsection
