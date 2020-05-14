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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('creative-pharma') }}/img/fav/favicon.png" />
      <!-- Plugin CSS -->
    <link href="{{ asset('creative-pharma') }}/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
   <link href="{{ asset('css') }}/front.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
  </head>
  <body class="bg-light">
   <header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar top-nav navbar-expand-md navbar-dark fixed-top bg-white">
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
                <a class="btn btn-warning" id="btn-register" role="button" href="/register">inscription</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-warning" id="btn-login" href="/login">connexion</a>
              </li>
          </ul>
          @endauth
        </div>
        </div>
      </nav>
  </header>

<main role="main" class="container mt-5">
  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-white rounded shadow-sm">
    <div class="lh-100">
      <a href="{{route('theses.all')}}"><i class="fa fa-chevron-left"></i>&nbsp;Retourner à la liste des thèses</a>
    </div>
  </div>

 <div class="row">
    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-white rounded shadow-sm">
        <h5>Méta-données</h5>
        <div class="media text-muted pt-3">
         <i class="fa fa-user"></i>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">&nbsp;{{$results->auteur}}</strong>
          </p>
        </div>
        <div class="media text-muted pt-3">
         <i class="fa fa-university"></i>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">&nbsp;{{$results->universites->denomination ?? 'Non définit'}}</strong>
          </p>
        </div>
        <div class="media text-muted pt-3">
         <i class="fas fa-atlas"></i>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">&nbsp;{{$results->departments->libelle ?? 'Non définit'}}</strong>
          </p>
        </div>
        <div class="media text-muted pt-3">
         <i class="fas fa-briefcase"></i>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">&nbsp;{{$results->disciplines->libelle ?? 'Non définit'}}</strong>
          </p>
        </div> 
        <div class="media text-muted pt-3">
         <i class="fas fa-vote-yea"></i>&nbsp;
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-light">soutenu en&nbsp;{{$results->annee ?? 'Non définit'}}</strong>
          </p>
        </div>
      </div>
  </aside>
  <!-- /.blog-sidebar -->
  
    <div class="col-md-8 blog-main">
      <div class="col p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Details</h6>
      
        <div class="media text-muted pt-3">
          @if( $results->fichier == "")
             <img src="{{ asset('backend') }}/img/Untitled-1-93-512.png" alt="" class="bd-placeholder-img mr-2 rounded" width="32" height="32">
          @else
            <img src="{{ asset('backend') }}/img/computer-icons-pdf-filename-extension-pdf-icon.jpg" alt="" class="bd-placeholder-img mr-2 rounded" width="32" height="32">
          @endif
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"> {{$results->titre}}</strong><br>
           {{$results->resume ?? 'Aucun resumé'}}
          </p>
          
        </div>
        <p class="media-body pb-3 mt-3 text-muted small lh-125 border-bottom border-gray">
           <b>Mots clés du documents:</b><br/>
           @if(count($_keywordsTable) !=0)
            @foreach($_keywordsTable as $word)
              @if(strlen($word) >3)
               <span class="badge badge-primary">
                 {{ $word }}
               </span>
              @endif
            @endforeach
           @else
            Mots clés non définit
           @endif
        </p>
        @auth
          @if( $results->fichier != "")
            <small class="d-block text-right mt-3">
              <a href="JavaScript:Void(0)" class="btn btn-success btn-sm downloadBook" id="_todownload">Télécharger le document&nbsp;<i class="fa fa-download"></i></a>&nbsp;&nbsp;  
              <a href="JavaScript:Void(0)" class="btn btn-primary btn-sm addToLibrary" id="showLibrary" data-toggle="modal" data-target="#addToLibraryTrigger">Ajouter à ma bibliothèque&nbsp;<i class="fa fa-book"></i>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </a>
            </small>
          @else
            <small class="d-block text-right mt-3"> 
              <a href="JavaScript:Void(0)" class="btn btn-primary btn-sm addToLibrary" data-toggle="modal" data-target="#addToLibraryTrigger" id="showLibrary">Ajouter à ma bibliothèque&nbsp;<i class="fa fa-book"></i>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </a>
            </small>
          @endif
        @else
        @if( $results->fichier != "")
            <small class="d-block text-right mt-3">
              <a href="JavaScript:Void(0)" class="btn btn-success btn-sm downloadBook" id="_todownload">Télécharger le document&nbsp;<i class="fa fa-download"></i></a>&nbsp;&nbsp;  
               <a href="JavaScript:Void(0)" class="btn btn-primary btn-sm addToLibrary" data-toggle="modal" data-target="#addToLibraryTrigger" id="showLibrary">Ajouter à ma bibliothèque&nbsp;<i class="fa fa-book"></i>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </a>
            </small>
          @else
            <small class="d-block text-right mt-3"> 
               <a href="JavaScript:Void(0)" class="btn btn-primary btn-sm addToLibrary" data-toggle="modal" data-target="#addToLibraryTrigger" id="showLibrary">Ajouter à ma bibliothèque&nbsp;<i class="fa fa-book"></i>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </a>
            </small>
          @endif
        @endauth
  </div>

  </div><!-- /.blog-main -->

   <div class="row">
      <div class="modalKu"></div>
    </div>
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
<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

  $('#showLibrary').click(function(event){
      @auth
      var id = {{Auth::user()->id}};
      var item = {{$results->id}}
      event.preventDefault();
            $.ajax({
                url     : "{{route('library.show')}}",
                method  : "GET",
                data:{'id':id, 'item':item},
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success : function(response){
                    $('.modalKu').html(response);
                    $('#addToLibrary').modal('show');
                }
            });
      @else
      toastr.info("Veuillez vous connecter, pour ajouter à votre bibliothèque !");
       toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        };
        @endauth
      });
</script>
  
<script type="text/javascript">
  
  //AJAX headers
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('input[name="_token"]').val(),
      }
    });
    @auth
   $('#_todownload').click(function(event){
      event.preventDefault();
        //$(this).html('Opération en cours...');

      var datas = {
        id: {{Auth::user()->id}},
        item: {{$results->id}}
      };
    
      $.ajax({
          url: "{{route('abonnement.check')}}",
          type: "POST",
          data: datas,
          success: function (data) {
              console.log('done!')
          },
          error: function (data) {
             console.log('Error:', datas);
          }
      }).done(function (results) {
         if (results.state =='success')
          {
            toastr.success(results.message);
             toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
              };

              window.open(results.downloadlink, '_blank');
          }
          else {
             toastr.warning(results.message);
             toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
              }
              $(this).html('Télécharger le document');
            }
      });
    })
   @else
   $('#_todownload').click(function(event){
      event.preventDefault();
   toastr.info("Veuillez vous connecter, afin de télécharger le document !");
       toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        };
});
  @endauth
</script>
</body>
</html>
