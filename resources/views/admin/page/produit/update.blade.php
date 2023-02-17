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
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="{{route('administration.produit.edit',$produit->id)}}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group ">
                  <label for="title" class="control-label col-lg-2">Titre </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="title" name="title" value="{{$produit->title}}" minlength="2" type="text" required />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="title_en" class="control-label col-lg-2">Titre_en </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="title_en" name="title_en" value="{{$produit->title_en}}" minlength="2" type="text" required />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">catégorie </label>
                  <div class="col-lg-10">
                    <select class="form-control" name="cat_id" id="cat_id">
                      @foreach ($categories as $categorie)
                        
                        @if ($categorie->id == $produit->cat_id)
                          <option value="{{$categorie->id}}" selected>{{$categorie->title}}</option>
                        @else
                          <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                        @endif
                      @endforeach
                      
                    </select>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="caracteristique" class="control-label col-lg-2">Caractéristique </label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="caracteristique" id="caracteristique" placeholder="Caractéristique" rows="5" data-rule="required" data-msg="Votre caractéristique">{{$produit->caracteristique}}</textarea>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="caracteristique_en" class="control-label col-lg-2">Caractéristique_en </label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="caracteristique_en" id="caracteristique_en" placeholder="Caracteristique" rows="5" data-rule="required" data-msg="Your caracteristique">{{$produit->caracteristique_en}}</textarea>
                  </div>
                </div>


                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Description </label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="description" id="description" placeholder="Your Message" rows="5" data-rule="required" data-msg="Votre description">{{$produit->description}}</textarea>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Description_en </label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="description_en" id="description_en" placeholder="Your Message" rows="5" data-rule="required" data-msg="Your description">{{$produit->description_en}}</textarea>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Prix </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="prix" name="prix" value="{{$produit->prix}}" minlength="2" type="number" required />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Quantité stock </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="stock" name="stock" value="{{$produit->stock}}" minlength="2" type="number" required />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Nouveau stock </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="new" name="new"  minlength="2" type="number"  />
                  </div>
                </div>
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Ancien prix </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="ancien_prix" name="ancien_prix" value="{{$produit->ancien_prix}}" minlength="2" type="number"  />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="prix_gros" class="control-label col-lg-2">Prix de gros</label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="prix_gros" name="prix_gros" value="{{$produit->prix_gros}}" minlength="2" type="number" required />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="qte_min_gros" class="control-label col-lg-2">Quantité minimale de vente engros</label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="qte_min_gros" name="qte_min_gros" value="{{$produit->qte_min_gros}}" minlength="2" type="number" required />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="qte_min" class="control-label col-lg-2">Quantité seuille </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="qte_min" name="qte_min" value="{{$produit->qte_min}}" minlength="2" type="number" required />
                  </div>
                </div>

                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Tailles </label>
                  <div class="col-lg-10">
                    @php
                      $size = explode(',',$produit->taille);
                      
                      //var_dump($tab)
                    @endphp
                    @foreach ($tailles as $taille)
                      @if (in_array($taille->id, $size))
                        <label class="checkbox-inline">
                          <input type="checkbox" id="taille" name="taille[]" checked value="{{$taille->id}}"> {{$taille->libelle}}
                        </label>
                      @else
                      <label class="checkbox-inline">
                        <input type="checkbox" id="taille" name="taille[]" value="{{$taille->id}}"> {{$taille->libelle}}
                      </label>
                      @endif
                      
                    @endforeach
                    
                  </div>
                </div>

                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Couleurs </label>
                  <div class="col-lg-10">
                    @php
                      $colors = explode(',',$produit->couleur);
                      //var_dump($tab)
                    @endphp
                    

                    @foreach ($couleurs as $couleur)
                      @if (in_array($couleur->id, $colors))
                        <label class="checkbox-inline">
                          <input type="checkbox" id="taille" name="couleur[]" checked value="{{$couleur->id}}"> {{$couleur->libelle}}
                        </label>
                      @else
                      <label class="checkbox-inline">
                        <input type="checkbox" id="taille" name="couleur[]" value="{{$couleur->id}}"> {{$couleur->libelle}}
                      </label>
                      @endif
                      
                    @endforeach
                    
                  </div>
                </div>

                <div class="form-group ">
                  <label for="video" class="control-label col-lg-2">Vidéo </label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="video" name="video" minlength="2" type="file"  />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label class="control-label col-lg-2 col-sm-3 " style="margin-left: 10px">Images Mises en avant</label>
                    <div class="col-md-3 col-sm-4 mb">
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                          <img src="{{asset('/storage/imgs/'.$produit->image)}}" alt="" />
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
                    </div>
                    <div class="col-md-3 col-sm-4 mb">
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                          <img src="{{asset('/storage/imgs/'.$produit->image2)}}" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                          <span class="btn btn-theme02 btn-file">
                            <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                          <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                          <input type="file" class="default" id="image2" name="image2" />
                          </span>
                          <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-4 mb">
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                          <img src="{{asset('/storage/imgs/'.$produit->image3)}}" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                          <span class="btn btn-theme02 btn-file">
                            <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                          <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                          <input type="file" class="default" id="image3" name="image3" />
                          </span>
                          <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="form-group ">
                  <label class="control-label col-lg-2 col-sm-3"></label>
                  
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
                  <a href="/administration/produit" type="button" class="btn btn-danger">Annuler</a>
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
