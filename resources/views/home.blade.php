@extends('layouts.app')

@section('content')

<div class="container">
    <main role="main" class="container mt-2">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-white rounded shadow-sm">
        <div class="lh-100">
        
        </div>
      </div>

 <div class="row">
    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-white rounded shadow-sm">
        <h5 class="txt-center">Profile</h5>
        <div class="media text-muted pt-3">
         <img src="{{ asset('backend') }}/img/img_326343.png" alt="" class="bd-placeholder-img mr-2 rounded" width="32" height="32">
          <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{Auth::user()->name}}&nbsp;{{Auth::user()->lastname}}</strong>
          </p>
        </div>
        <div class="media text-muted pt-3">

              <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark"> <i class="fas fa-phone"></i>{{Auth::user()->phone}} / {{Auth::user()->email}} </strong>
              </p>
        </div>
      </div>

      <div class="p-4 mb-3 bg-white rounded shadow-sm">
        <h5>Actions</h5>
       
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Bibliothèque
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                         <a href="javascript:void(0)" class="btn btn-success mb-2" id="create-new-biblio">Créer une bibliothèque</a> 
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Abonnement
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                     <a href="#">Mon abonnement</a>
                    </div>
                </div>
            </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Profile
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                 
                   <a href="#">Modifier mon profile</a>
                  
                </div>
            </div>
        </div>
    </div>
  </div>
  </aside><!-- /.blog-sidebar -->
  
    <div class="col-md-8 blog-main">
      <div class="col p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Mes bibliothèques</h6>
      
         <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Libelle</th>
                 <th>Nb documents</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody id="users-crud">
              
           </tbody>
          </table>
  </div>
  </div><!-- /.blog-main -->

  </div><!-- /.row -->

 
</main>

  
</div>
@yield('js')

@endsection
