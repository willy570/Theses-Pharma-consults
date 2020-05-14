<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token"content="{{ csrf_token() }}">
    <title>pharmaConsults - Thèses</title>

   <!--  Bootstrap CSS-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <!-- Google Fonts--> 
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <!--  Fonts Awesone and Icons     -->
    <link href="{{ asset('creative-pharma') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link rel="icon" href="{{ asset('creative-pharma') }}/img/fav/favicon.png" />
      <!-- Plugin CSS -->
    <link href="{{ asset('creative-pharma') }}/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
   <link href="{{ asset('css') }}/front.css" rel="stylesheet">
   <link href="{{ asset('creative-pharma') }}/css/media.css" rel="stylesheet">

  </head>
   
<body class="bg-light">
  <header>
   <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar top-nav navbar-expand-md navbar-dark fixed-top bg-transparent">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-sm-none" id="navbarCollapse">
                      @auth
                        
                      @else
                      <ul class="navbar-nav ml-auto align-items-end">
                          <li class="nav-item">
                            <span class="top-nav-label txt-not-member">Pas encore membre? Rejoins nous!</span>
                          </li>
                          <li class="nav-item">
                           <span class="top-nav-label txt-welcome">Bienvenue chez toi</span>
                          </li>
                      </ul>
                      @endauth
                    </div>
                </nav>
            </div>
        </div>
    </div>
      <!-- Fixed navbar -->
      <nav class="navbar main-menu navbar-expand-md navbar-dark fixed-top bg-white">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <img src="{{ asset('creative-pharma')}}/img/logo/Logo.png" class="logo" alt="" width="200px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          @auth
            <ul class="navbar-nav ml-auto align-items-end">
              <li class="nav-item">
                <a class="" id="btn-login" href="/login">{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}&nbsp;<i class="fa fa-chevron-right"></i></a>
              </li>
            </ul>
          @else
            <ul class="navbar-nav ml-auto align-items-end">
              <li class="nav-item">
                <a class="btn btn-warning" id="btn-login" role="button" href="/register">INSCRIPTION</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-warning" id="btn-login" href="/login">CONNEXION</a>
              </li>
          </ul>
          @endauth
        </div>
        </div>
      </nav>
  </header>
<main role="main" class="container">

 <div class="row mt-5">
    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-white rounded shadow-sm">
        <h5 class="legend-h">Legende des thèses</h5>
        <div class="media text-muted pt-3">
         <img src="{{ asset('backend') }}/img/Untitled-1-93-512.png" alt="" class="bd-placeholder-img mr-2 rounded" width="32" height="32">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Aucun document rattaché</strong>
          </p>
        </div>
        <div class="media text-muted pt-3">
         <img src="{{ asset('backend') }}/img/computer-icons-pdf-filename-extension-pdf-icon.jpg" alt="" class="bd-placeholder-img mr-2 rounded" width="32" height="32">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Document pdf existant</strong>
          </p>
        </div>
      </div>
      <div class="p-4 mb-3 bg-white rounded shadow-sm">
        <h5>Filtres</h5>
         <form class="form-horizontal" method="post" action="{{ route('filtre')}}">
            @csrf
            <div class="form-group">
              <label for="university">Universités</label>
              <select class="form-control selectpicker show-tick" title="Selectionner une Universités" data-live-search="true" name="university" id="university">
                @foreach($universities as $option => $value)
                  <option value="{{$option}}">{{$value}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="departments">Departements</label>
               <select class="form-control selectpicker show-tick" title="Selectionner un departement" data-live-search="true" name="departments" id="departments">
                @foreach($departments as $option => $value)
                  <option value="{{$option}}" name="departments" id="departments" class="selected-discipline">{{$value}}</option>
                @endforeach
                </select> 
            </div>

            <div class="form-group">
              <label for="disciplines">Disciplines</label>
                <select class="form-control selectpicker show-tick" title="Selectionner une discipline" data-live-search="true" name="disciplines" id="disciplines">
                  @foreach($disciplines as $option => $value)
                   <option value="{{$option}}" name="disciplines" id="disciplines" >{{$value}}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group">
               <button type="submit" class="btn btn-block btn-info mb-2">
              Filtrer&nbsp;
                <i class="fa fa-filter"></i>
            </button>
            </div>
          </form>
      </div>
  </aside>
  <!-- /.blog-sidebar -->
  
    <div class="col-md-8 blog-main">
      <div class="col p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Liste des thèses</h6>
      
        @foreach($results as $r)
        <div class="media text-muted pt-3">
          @if( $r->fichier == "")
             <img src="{{ asset('backend') }}/img/Untitled-1-93-512.png" alt="" class="bd-placeholder-img mr-2 rounded" width="32" height="32">
          @else
            <img src="{{ asset('backend') }}/img/computer-icons-pdf-filename-extension-pdf-icon.jpg" alt="" class="bd-placeholder-img mr-2 rounded" width="32" height="32">
          @endif
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><a href="{{route('theses.details', $r->url)}}" class="these-title">{{$r->titre}}</a></strong><br>
           {{ substr($r->resume, 0, 305) ?? 'Aucun resumé'}}
          </p>
        </div>
        @endforeach
        <small class="d-block text-right mt-3">
            {!! $results->appends(['sort' => 'liste'])->render() !!}
        </small>
  </div>

  </div><!-- /.blog-main -->
  </div><!-- /.row -->
</main>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('creative-pharma') }}/js/creative.js"></script>

</body>
</html>
