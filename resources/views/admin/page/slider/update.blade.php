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
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.slider.edit',$slider->id)}}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group ">
                  <label for="title" class="control-label col-lg-2">Titre </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="title" name="title" value="{{$slider->title}}" minlength="2" type="text" required />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="title_en" class="control-label col-lg-2">Titre_en </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="title_en" name="title_en" value="{{$slider->title_en}}" minlength="2" type="text" required />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="sous_title" class="control-label col-lg-2">Sous Titre </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="sous_title" name="sous_title" value="{{$slider->sous_title}}" minlength="2" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="sous_title_en" class="control-label col-lg-2">Sous Titre_en </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="sous_title_en" name="sous_title_en" value="{{$slider->sous_title_en}}" minlength="2" type="text" />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="paragraphe" class="control-label col-lg-2">Paragraphe </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="paragraphe" name="paragraphe" value="{{$slider->paragraphe}}" minlength="2" type="text" />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="paragraphe_en" class="control-label col-lg-2">Paragraphe_en </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="paragraphe_en" name="paragraphe_en" value="{{$slider->paragraphe_en}}" minlength="2" type="text" />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="lien" class="control-label col-lg-2">Lien</label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="lien" name="lien" value="{{$slider->lien}}" minlength="2" type="text" />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="bg" class="control-label col-lg-2">Couleur de fond</label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="bg" name="bg" minlength="2" value="{{$slider->bg}}" type="text" required/>
                  </div>
                </div>

                <div class="form-group ">
                  <label class="control-label col-lg-2 col-sm-3">Image Mise en avant</label>
                  <div class="col-lg-10 col-sm-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                        <img src="{{asset('/storage/imgs/'.$slider->image)}}" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" class="default" id="image" name="image" />
                        </span>
                        <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div>
                    <span class="label label-info">NOTE!</span>
                    <span>
                      Attached image thumbnail is
                      supported in Latest Firefox, Chrome, Opera,
                      Safari and Internet Explorer 10 only
                      </span>
                  </div>
                </div>

                <div class="form-group ">
                  <label class="control-label col-lg-2 col-sm-3"></label>
                  
                  <button type="submit" class="btn btn-primary">Sauvegarder</button>
                  <a href="/administration/slider" type="button" class="btn btn-danger">Annuler</a>
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
