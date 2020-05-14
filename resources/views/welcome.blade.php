<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   
    <title>Thèses - Pharma Consults</title>
    <meta name="kamilo" content="kamilo.dev">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />

      <!--  Fonts Awesone and Icons     -->
      <link href="{{ asset('creative-pharma') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

      <!--  Fav icon -->
      <link rel="icon" href="{{ asset('creative-pharma') }}/img/fav/favicon.png" />

      <!--style and ustom style -->
      <link href="{{ asset('creative-pharma') }}/css/welcome.css" rel="stylesheet">
      <link href="{{ asset('creative-pharma') }}/css/style.css" rel="stylesheet">
     

  </head>
  <body>
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
      <nav class="navbar main-menu navbar-expand-md navbar-dark fixed-top bg-transparent">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('creative-pharma')}}/img/logo/Logo.png" class="logo" alt="" width="230px">
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
               <!--  <a class="btn btn-warning" id="btn-login" role="button" href="/register">inscription</a> -->
                <a class="btn btn-warning nav-link" id="btn-login" style="cursor: pointer" data-toggle="modal" data-target="#registerModal">{{ __('inscription') }}</a>
              </li>
              <li class="nav-item">
                <!-- <a class="btn btn-warning" id="btn-login" href="/login">connexion</a> -->
                <a class="btn btn-warning nav-link" id="btn-login" style="cursor: pointer" data-toggle="modal" data-target="#loginModal">{{ __('connexion') }}</a>
              </li>
          </ul>
          @endauth
        </div>
        </div>
      </nav>
  </header>
@include('partials.login')
@include('partials.register')
  <!-- En tete -->
  <div class="container"> 
    <div class="row">
      <div class="col wrapper-welcome">
          <h1 class="mt-5 welcome-title ">etudiez.&nbsp;progressez.&nbsp;soutenez.</h1>
          <p class="lead-in">Base de données de thèses doctorales téléchargeables</p>
      </div>
  </div>

  
  

<div class="s130">
  <form method="get" action="{{route( 'search', ['q' => ''])}}">
    <div class="inner-form">
      <div class="input-field first-wrap">
        <div class="svg-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
          </svg>
        </div>
        <input id="search" type="text" name="q" placeholder="Que cherchez-vous ? Entrer ci-contre les mots clés" />
      </div>
      <div class="input-field second-wrap">
        <button class="btn-search" type="submit">RECHERCHER</button>
      </div>
    </div>
    <span class="info text-center text-white">
      <h5><a href="{{route('theses.all')}}" ><i class="fas fa-book"></i>&nbsp;Acceder à tout les documents</a></h5>
    </span>
  </form>
</div>

</div>

<!--responsive footer-->

<footer class="footer-for-xs for-xs mt-3">
 <div class="col-sm-12" >
   <!--  <form action="#" method="post" id="newsletter" name="newsletter">
     <div class="input-group mb-3 mt-3">
       <input type="email" class="form-control" placeholder="Recevoir notre newsletter?" aria-label="Recipient's username" aria-describedby="basic-addon2">
       <div class="input-group-append">
         <span class="input-group-text" id="basic-addon2">
           <a href="" class="btn btn-sm">s'inscrire</a>
         </span>
       </div>
     </div>
   </form> -->
  </div>
  <p class="finder" align="left">RETROUVER NOUS SUR</p>

  <p class="" align="left" style="text-align: center; padding: 2vh;margin-bottom: 0">
    <a href="https://Facebook.com/PharmaConsults/" target="blank"><i class="fab fa-facebook fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fab fa-twitter fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fab fa-google-plus-g fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fab fa-instagram fa-2x" aria-hidden="true"></i></a>
  </p>
</footer>
<section id="disclaimer">      
      <div class="d-lg-none d-md-none disclaimer_for_sm">
        <span style="line-height: 10px; margin-top: 15px;"><a href="#">PharmaConsults 2020 |</a></span>
        <span style="line-height: 10px; margin-top: 15px;"><a href="#">Equipes |</a></span>
        <span style="line-height: 10px; margin-top: 15px;"><a href="#">Conditions Generales d'utilisation</a></span>
      </div>
    </section>
<!--end responsive footer-->




<footer class="footer py-2 hidden-xs-down">
  <div class="container-fluid">
   <div class="row">

      <div class="col-auto footerElm">
        <ul id="footerMenu">
          <li><a href="#">Pourquoi pharmaConsults?</a></li>
          <li><a href="#">Equipes</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

      <div class="col footerElm">
        <span>Copyright 2019 All rights reserved.Products by <a href="#" class="author">Georgie</a> & <a href="#" class="author">Patrick</a></span>
      </div>

      <div class="col-auto footerElm"> 
        <ul id="footerMenuIcons" class="avbar-nav ml-auto align-items-end">
          <li><a href="https://Facebook.com/PharmaConsults/" target="blank"><i class="fab fa-facebook fa-2x" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter fa-2x"  aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fab fa-google-plus-g fa-2x" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram fa-2x" aria-hidden="true"></i></a></li>
        </ul> 
      </div>
    </div>
</footer>
</div>
</div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  @yield('scripts')
  </body>
</html>
