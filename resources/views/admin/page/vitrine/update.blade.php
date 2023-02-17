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
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.vitrine.edit',$vitrine->id)}}">
                @csrf

                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Catégorie </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="cat_id" id="cat_id">
                      @foreach ($categories as $categorie)
                        
                        @if ($categorie->id == $vitrine->cat_id)
                          <option value="{{$categorie->id}}" selected>{{$categorie->title}}</option>
                        @else
                          <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                        @endif
                      @endforeach
                      
                    </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <a href="/administration/vitrine" type="button" class="btn btn-danger">Annuler</a>
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
