<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EASY</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.css" />
        <link rel="apple-touch-icon" sizes="180x180" href="/public/uploads/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/public/uploads/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/public/uploads/favicon-16x16.png">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

        <!-- Styles -->
      
    </head>
    <body>
    <header>
          <nav class="navbar navbar-default" role="navigation">
    	  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <div class="navbar-brand navbar-brand-centered">TP</div>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="navbar-brand-centered">
		      <ul class="nav navbar-nav">

		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		       @if (Route::has('login'))
                    @auth
                         <li>  <a href="{{ url('/home') }}">Home</a></li>
                    @else
                          <li> <a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                         <li>   <a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
            @endif        
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
    </header>
        <div class="flex-center position-ref full-height">
           

            <div class="container">
            
            <div class="col-md-12">
             <div class="row">
             @php
             $x = 0;
             @endphp
              @foreach($blogs as $k=>$item)
                    <div class="col-md-4">
                        <div class="thumbnail">
                        <img src="{{$item->blog_pic}}" alt{{$item->blog_title}} />
                        <div class="caption">
                            <h3>{{$item->blog_title}}</h3>
                            <p>{!! str_limit($item->blog_contents,150) !!}</p>
                            <p><a href="{{action('MainController@details',[$item->blog_slug])}}" class="btn btn-default" role="button">read more</a></p>
                        </div>
                        </div>
                    </div>
                        @php
                        $x++
                        @endphp
                @if($x%3 == 0)
                    <div class="row">
                        <br clear="all"/>
                    </div>
                @endif
                @endforeach
                
            </div>
            </div>
             
            
            </div>
        </div>
         
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
                      @if (session('status'))
                      <script>
                      swal(":(", "{{ session('status') }}", "error")
                            
                      </script>
                    @endif
    </body>
</html>
