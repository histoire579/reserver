@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> </h4>
          <div class="form-panel">
            <div class=" form">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.promotion.edit',$promotion->id)}}">
                @csrf

                <div class="form-group ">
                  <label for="prix" class="control-label col-lg-2">Pourcentage </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="prix" name="prix" minlength="1" type="text" value="{{$promotion->prix}}" required />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Produit </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="prod_id" id="prod_id">
                      @foreach ($produits as $produit)
                      @if ($produit->id == $promotion->prod_id)
                        <option value="{{$produit->id}}" selected>{{$produit->title}}</option>
                      @else
                        <option value="{{$produit->id}}">{{$produit->title}}</option>
                      @endif
                      @endforeach

                      
                      
                    </select>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="debut" class="control-label col-lg-2">Début </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="debut" name="debut" minlength="2" type="date" value="{{$promotion->debut}}" required />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="fin" class="control-label col-lg-2">Fin </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="fin" name="fin" minlength="2" type="date" value="{{$promotion->fin}}" required />
                  </div>
                </div>
              
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <a href="/administration/promotion" type="button" class="btn btn-danger">Annuler</a>
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
