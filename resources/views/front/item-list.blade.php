<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pharmaConsults - Thèses</title>

   <!--  Bootstrap CSS-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <!-- Google Fonts--> 
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <!--  Fonts Awesone and Icons     -->
    <link href="{{ asset('creative-pharma') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link rel="icon" href="{{ asset('creative-pharma') }}/img/fav/favicon.png" />
      <!-- Plugin CSS -->
    <link href="{{ asset('creative-pharma') }}/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
   <link href="{{ asset('css') }}/front.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-white ">
      <a class="navbar-brand mr-auto mr-lg-0" href="/">
        <img src="{{ asset('creative-pharma')}}/img/logo/Logo.png" class="logo" alt="" width="150px">
      </a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    
     @auth
      <ul class="navbar-nav ml-auto align-items-end">
        <li class="nav-item">
          <a class="" href="/login">{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}&nbsp;<i class="fa fa-user"></i></a>
        </li>
      </ul>
      @else
        <ul class="navbar-nav ml-auto align-items-end">
          <li class="nav-item">
            <a class="btn btn-outline-danger" id="btn-register" role="button" href="/register">INSCRIPTION</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-warning" id="btn-login" href="/login">connexion</a>
          </li>
      </ul>
      @endauth
  </div>
</nav>



<main role="main" class="container mt-5">

 <div class="row">
    <div class="col-md-12 blog-main">
      <div class="col p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-2">Résultats de la recherche</h6>
        <p class="small text-muted text-gray-dark"><b class="small">{{ $SearchResults->count() }} results found for "&nbsp;{{ $query }}&nbsp;"</b></p>
      @if($SearchResults->isEmpty())
      <p class="alert alert-info p-3">Désolé nous avons trouvé aucun document&nbsp;!</p>
      @else
        @foreach($SearchResults as $results)
          <div class="media text-muted pt-3">

            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block text-gray-dark"><a href="{{route('theses.details', $results->url)}}" style="color: #1a0dab">
               {{ $results->titre }}
              </a></strong><br>
              {{substr($results->resume, 0, 305)}}
            </p>
          </div>
        @endforeach
        @endif
        <small class="d-block text-right mt-3">
          {{ $SearchResults->appends(request()->input())->links()}}
          {{-- $SearchResults->appends(['search' => Request::get('page')])->links() --}}
          {{--$SearchResults->appends(Request::except('page'))->links()--}}
        </small>
  </div>

  </div><!-- /.blog-main -->
  </div><!-- /.row -->
  </div><!-- /.row -->
</main>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
</body>
</html>
