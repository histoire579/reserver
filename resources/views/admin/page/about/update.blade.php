@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <!-- FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">
          <h4><i class="fa fa-angle-right"></i> </h4>
          {{-- <div class="row">
            <div class="col-md-4 col-sm-4 mb"><a style="float: left;margin-left: 100px" href="/administration/about_saconets" type="button"  class="btn btn-default"><i class="fa fa-arrow-circle-o-left" style="color: #08367A" aria-hidden="true"></i> Retourner à la liste</a></div>
            <div class="col-md-4 col-sm-4 mb"></div>
            <div class="col-md-4 col-sm-4 mb"></div>
         </div> --}}
          <div class="form-panel">
            <div class=" form">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.about.edit',$about->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Titre </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="titre" name="titre" value="{{$about->titre}}" minlength="2" type="text"  />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Titre_en </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="titre_en" name="titre_en" value="{{$about->titre_en}}" minlength="2" type="text"  />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="description" class="control-label col-lg-2">Description </label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="description" id="description" placeholder="Votre description" rows="5" data-rule="required" data-msg="Votre description">{{$about->description}}</textarea>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="description_en" class="control-label col-lg-2">Description_en </label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="description_en" id="description_en" placeholder="Your description" rows="5" data-rule="required" data-msg="Your description">{{$about->description_en}}</textarea>
                  </div>
                </div>
                
              
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <a href="/administration/about" type="button" class="btn btn-danger">Annuler</a>
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
@section('extra-js')

<script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description',{
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('description_en',{
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
        });
        
    </script>
 
    
@endsection
