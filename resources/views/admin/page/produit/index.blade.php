@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Produit</h4>
          
          <div class="row">
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"><a style="float: right;margin-right: 100px" href="/administration/produit/add" type="button"  class="btn btn-default"><i class="fa fa-plus-square" style="color: #08367A" aria-hidden="true"></i> Nouveau</a></div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-3 mb">
              
            </div>
            <div class="col-md-6 col-sm-6 mb">
              
            </div>
            <div class="col-md-3 col-sm-3 mb">
              <form class="form-inline" role="form" action="{{route('administration.produit.search')}}">
                @csrf
                <div class="form-group">
                  <label class="sr-only" for="name">Nom</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Entrer le nom">
                </div>
                <button type="submit" class="btn btn-theme">Rechercher</button>
              </form> 
            </div>
          </div>
          @include('admin.page.message')
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf" style="font-size: 18px">
              <thead class="cf">
                <tr>
                  <th>Image</th> 
                  <th>Titre</th>
                  <th>Prix</th>
                  <th>Prix de gros</th>
                  <th>Stock</th>
                  <th>Quantité minimale de vente en gros</th>
                  <th>Ancien prix</th>
                  <th>Url</th>
                  <th>Catégorie</th>
                  <th class="numeric"></th>
                  <th class="numeric"></th>
                  <th class="numeric"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($produits as $type)
                <tr>
                  <td data-title="Code" ><img src="{{asset('/storage/imgs/'.$type->image)}}" alt="" height="100px" width="100px"></td>
                  <td data-title="Code">{{$type->title}}</td>
                  <td data-title="Company">{{$type->prix}}</td>
                  <td data-title="Company">{{$type->prix_gros}}</td>
                  <td data-title="Company">{{$type->stock}}</td>
                  <td data-title="Company">{{$type->qte_min_gros}}</td>
                  <td data-title="Company">{{$type->ancien_prix}}</td>
                  <td data-title="Company">{{$type->url}}</td>
                  <td data-title="Company">{{$type->categorie->title}}</td>
                  @if ($type->stock < $type->qte_min)
                    <td data-title="Code"><button class="btn btn-danger">En rupture de stock</button></td>
                  @else
                    <td data-title="Code"><button class="btn btn-success">En stock</button></td>
                  @endif
                  
                  <td class="numeric" data-title="Price"><a href="/administration/produit/edit/{{$type->id}}"> <i class="fa fa-pencil" style="color: #08367A" aria-hidden="true"></i></a></td>
                  <td class="numeric" data-title="Change">
                    <form action="/administration/produit/destroy/{{$type->id}}" method="DELETE">
                      @csrf
                      @method('DELETE')
                      <a href="/administration/produit/destroy/{{$type->id}}" type="button" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" style="color: red" aria-hidden="true"></i></a></td>
                      
                  </form>
                    
                </tr>                   
                @endforeach
              </tbody>
            </table>
            <div style="text-align: right; margin: 15px">{{$produits->links()}}</div>
          </section>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
  </section>
</section>
@endsection
