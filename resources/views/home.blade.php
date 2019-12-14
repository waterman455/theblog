@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <form class="form col-md-12" method="post" action="{{action('MainController@add')}}" enctype="multipart/form-data">
                        @csrf()
                            <div class="form-group">
                                <label class="control-label col-md-4 pull-left">Titre</label>
                                <div class="col-md-12">
                                    <input  class="form-control input-sm" name="title" placeholder="Titre"  required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 pull-left">Categorie</label>
                                <div class="col-md-12">
                                    <select name="category" class="form-control input-sm">
                                        <option>---------</option>
                                        @foreach($ctgs as $key=>$val)
                                        <option value="{{$val->category_id}}">{{$val->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 pull-left">Image</label>
                                <div class="col-md-12">
                                    <input name="category_pic" type="file"  class="control-form"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 pull-left">Contenu</label>
                                <div class="col-md-12">
                                    <textarea name="editor1" id="editor1" class="control-form"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block btn-sm" type="submit">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-4">
                <div class="card">
                 <div class="card-header">Parametres</div>
                    <div class="card-body">
                        <button class="btn btn-block btn-sm btn-warning"  data-toggle="modal" data-target="#myModal">Ajouter categorie</button>
                    </div>
                </div>
            </div>
    </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Ajouter une categorie</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <form class="form" method="post" action="{{action('MainController@addctg')}}">
        @csrf()
            <div class="form-group">
                <label class="control-label pull-left col-md-4">
                    Nom
                </label>
                <div class="col-md-12">
                    <input name="ctg" class="form-control input-sm" placeholde="Nom" />
                </div>
            </div>
            <div class="col-md-12">
               
                    <button type="submit" name="button" class="btn btn-primary btn-sm  pull-right">Ajouter</button>
               
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
                    @if (session('status'))
                      <script>
                      swal("Good job!", "{{ session('status') }}", "success")
                            
                      </script>
                    @endif
                <script>
                $("document").ready(function(){
                     CKEDITOR.replace( 'editor1' );
                
                });
                   
                </script>
@endsection
