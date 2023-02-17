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
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.taille.edit',$taille->id)}}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group ">
                  <label for="libelle" class="control-label col-lg-2">Libelle </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="libelle" name="libelle" minlength="1" type="text" value="{{$taille->libelle}}" required />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="libelle_en" class="control-label col-lg-2">Libelle_en </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="libelle_en" name="libelle_en" minlength="1" type="text" value="{{$taille->libelle_en}}" required />
                  </div>
                </div>

                
              
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <a href="/administration/taille" type="button" class="btn btn-danger">Annuler</a>
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
