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
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.categorie.edit',$categorie->id)}}">
                @csrf
                <div class="form-group ">
                  <label for="title" class="control-label col-lg-2">Titre </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="title" name="title" value="{{$categorie->title}}" minlength="2" type="text" required />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="title_en" class="control-label col-lg-2">Titre_en </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="title_en" name="title_en" value="{{$categorie->title_en}}" minlength="2" type="text" required />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Catégorie </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="super_id" id="super_id">
                      @foreach ($supers as $super)
                        
                        @if ($super->id == $categorie->super_id)
                          <option value="{{$super->id}}" selected>{{$super->title}}</option>
                        @else
                          <option value="{{$super->id}}">{{$super->title}}</option>
                        @endif
                      @endforeach
                      
                    </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <a href="/administration/categorie" type="button" class="btn btn-danger">Annuler</a>
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
