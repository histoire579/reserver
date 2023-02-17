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
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.couleur.edit',$couleur->id)}}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group ">
                  <label for="libelle" class="control-label col-lg-2">Libelle </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="libelle" name="libelle" minlength="2" type="text" value="{{$couleur->libelle}}" required />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="libelle_en" class="control-label col-lg-2">Libelle_en </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="libelle_en" name="libelle_en" minlength="2" type="text" value="{{$couleur->libelle_en}}" required />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="code" class="control-label col-lg-2">Code </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="code" name="code" minlength="2" type="color" value="{{$couleur->code}}" required />
                  </div>
                </div>
              
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <a href="/administration/couleur" type="button" class="btn btn-danger">Annuler</a>
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
