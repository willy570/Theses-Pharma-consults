<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="{{ asset('front/css/orionicons.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('front/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('front/css/custom.css')}}">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('creative-pharma') }}/img/fav/favicon.png" />
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>

 <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="{{'/'}}" class="navbar-brand font-weight-bold text-uppercase text-base">Pharma Consult - Thèses</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item dropdown mr-3"><a id="notifications" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i class="fa fa-bell"></i><span class="notification-icon"></span></a>
            <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a><a href="#" class="dropdown-item"> 
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 6 new messages</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">Server rebooted</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>
            </div>
          </li>
          <li class="nav-item dropdown ml-auto"><a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <img src="{{ asset('front/img/avatar-0.jpg')}}" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}</strong><small>{{Auth::user()->email ?? ''}} | téléphone : {{Auth::user()->phone ?? ''}}</small></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Paramètre</a><a href="#" class="dropdown-item">Historique d'activité</a>
              <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                        {{ __('Se deconnecter') }}
                </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MENU</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item">
                <a href="/" class="sidebar-link text-muted active"><i class="o-home-1 mr-3 text-gray"></i><span>Aller au site</span>
                </a>
              </li>
              <li class="sidebar-list-item">
                <a href="{{route('biblio.index')}}" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>{{'Bibliothèque'}}</span>
                </a>
              </li>
              <li class="sidebar-list-item">
                <a href="{{route('abonnement.index')}}" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>{{'Abonnement'}}</span>
                </a>
              </li>
              <li class="sidebar-list-item">
                <a href="{{route('abonnement.index')}}" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>{{'Profile'}}</span>
                </a>
              </li>
        </ul>
      </div>
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          
          @yield('content')
         
        </div>
        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 text-center text-md-left text-primary">
                <p class="mb-2 mb-md-0">Pharma consult &copy; 2019-2020</p>
              </div>
              <div class="col-md-6 text-center text-md-right text-gray-400">
                <p class="mb-0">Design by <a href="#" class="external text-gray-400">Patrick&Georgie</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('front/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('backend/js') }}/sweetalert.min.js"></script>
    <script src="{{ asset('backend/js') }}/sweetalert2.js"></script>
    <script src="{{ asset('front/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('front/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ asset('front/js/charts-home.js')}}"></script>
    <script src="{{ asset('front/js/front.js')}}"></script>
  </body>
</html>