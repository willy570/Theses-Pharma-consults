<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PharmaConsults') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Custom fonts for this template-->
    <link  href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">

      <!-- Page Wrapper -->
  <div id="wrapper">

   <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pharma <sup>Consults</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('utilisateur.home')}}" data-toggle="" data-target="" aria-expanded="" aria-controls="">
          <i class="fas fa-fw fa-cog"></i>
          <span>Utilisateurs</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('offres.home')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Offres</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tâches
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('abonnement.admin.index')}}" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Abonnement</span>
        </a>
       
      </li> 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesUniversites" aria-expanded="true" aria-controls="collapsePagesUniversites">
          <i class="fas fa-fw fa-folder"></i>
          <span>Universités</span>
        </a>
        <div id="collapsePagesUniversites" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Universités</h6>
            <a class="collapse-item" href="{{route('university.add')}}">Ajouter une université</a>
            <a class="collapse-item" href="{{route('university.home')}}">Liste des universités</a>
            <div class="collapse-divider"></div>

            <h6 class="collapse-header">Ufr</h6>
            <a class="collapse-item" href="{{route('ufr.add')}}">Créer une  UFR</a>
            <a class="collapse-item" href="{{route('ufr.home')}}">Liste des UFR</a>

            <h6 class="collapse-header">Departements</h6>
            <a class="collapse-item" href="{{route('departement.add')}}">Créer un departement</a>
            <a class="collapse-item" href="{{route('departement.home')}}">Liste des dpts</a>
          </div>
        </div>
      </li>

      <!--discipline Nav Item-->
      <li class="nav-item">
        <a class="nav-link" href="{{route('disciplines.home')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Disciplines</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('theses.home')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Thèses</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/biblio">
          <i class="fas fa-fw fa-table"></i>
          <span>Bibliothèques</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
         <!--  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
           <div class="input-group">
             <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
             <div class="input-group-append">
               <button class="btn btn-primary" type="button">
                 <i class="fas fa-search fa-sm"></i>
               </button>
             </div>
           </div>
         </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
               
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->last_name }}  </span>
                <img src="{{ asset('front/img/avatar-0.jpg')}}" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Paramètres
                </a> -->
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
               
                <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                


              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          
         

         
          @yield('content')

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
       <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PharmaConsults 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


        

   

<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Bootstrap core JavaScript-->
  <script src="{{ asset('backend/vendor/jquery/jquery.min.js')}}" defer></script>
  <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
  <script src="{{ asset('backend/js') }}/sweetalert.min.js"></script>
  <script src="{{ asset('backend/js') }}/sweetalert2.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}" defer></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('backend/js/sb-admin-2.min.js')}}" defer></script>

  <!-- Page level plugins -->
  <script src="{{ asset('backend/vendor/chart.js/Chart.min.js')}}" defer></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('backend/js/demo/chart-area-demo.js')}}" defer></script>
  <script src="{{ asset('backend/js/demo/chart-pie-demo.js')}}" defer></script>
  <script src="{{ asset('backend/js/demo/chart-bar-monthly-user.js')}}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  <script src="{{ asset('backend/js') }}/actions.js"></script>
  </body>
</html>
