@extends('layouts.mainAdmin')

@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Commentaires</h4>
          {{-- <div class="row">
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"></div>
             <div class="col-md-4 col-sm-4 mb"><a style="float: right;margin-right: 100px" href="/administration/blog/add" type="button"  class="btn btn-default"><i class="fa fa-plus-square" style="color: #08367A" aria-hidden="true"></i> Nouveau</a></div>
          </div> --}}
          @include('admin.page.message')
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf" style="font-size: 18px">
              <thead class="cf">
                <tr>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Commentaire</th>
                  <th class="numeric"></th>
                  <th class="numeric"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($comments as $type)
                <tr>
                  
                  <td data-title="Code" >{{$type->name}}</td>
                  <td data-title="Company" >{{$type->email}}</td>
                  <td data-title="Company" >{{$type->comment}}</td>
                  @if ($type->status == 'Actif')
                  <td class="numeric" data-title="Price"><a href="/administration/comment/show/{{$type->id}}">Déspprouver</a></td>
                  @else
                  <td class="numeric" data-title="Price"><a href="/administration/comment/edit/{{$type->id}}">Approuver</a></td>
                  @endif
                  
                  <td class="numeric" data-title="Change">
                    <form action="/administration/comment/destroy/{{$type->id}}" method="DELETE">
                      @csrf
                      @method('DELETE')
                      <a href="/administration/comment/destroy/{{$type->id}}" type="button" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" style="color: red" aria-hidden="true"></i></a></td>
                      
                  </form>
                    
                </tr>                   
                @endforeach
              </tbody>
            </table>
            <div style="text-align: right; margin: 15px">{{$comments->links()}}</div>
          </section>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
  </section>
</section>
@endsection
