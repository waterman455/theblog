@extends('layouts.app')

@section('content')

     <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2><b>{{$blog->blog_title}} </b><small> @ {{$blog->category_name}}</small></h2></div>

                <div class="card-body">
                <div class="row">
                    <img src="{{$blog->blog_pic}}" class="img-responsive img-rounded" style="width:100%;" />
                </div>
                <br clear="all" />
                    
                <div class="row">
                    {!! $blog->blog_contents !!}
                </div>
                </div>
            </div>
        </div>
    </div>
     </div>
@endsection