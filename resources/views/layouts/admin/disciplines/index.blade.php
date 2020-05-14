
@extends('layouts.admin.dashboard')

@section('content')
     <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">52 Universités</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">600 URF</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-info shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1"></div>
                     <div class="row no-gutters align-items-center">
                       <div class="col-auto">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">600 Dpts</div>
                       </div>
                       <div class="col">
                         <div class="progress progress-sm mr-2">
                           <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="col-auto">
                     <i class="fas fa-alarm-exclamation fa-2x text-gray-300"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>
            
            <!-- Pending Requests Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Discipline</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">500</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-xl-12">

            @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <i class="far fa-times"></i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
          </div>
           <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Liste des Departements</h6>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <a href="{{route('disciplines.add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary mb-4 shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Enregistrer une discipline
                  </a>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success mb-4 shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Generer un rapport excel
                  </a>
                  <br/>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Libellé</th>
                  <th>Departement</th>
                  <th>Nombre de thèse</th>
                  <th>Crée le</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                
                @if(sizeof($disciplines) != 0)
                @foreach($disciplines as $u)
                <tr>
                  <td>{{ucfirst($u->libelle)}}</td>
                  <td>{{$u->departments->libelle}} </td>
                  <td><span class="label label-info">{{$u->theses->count()}}</span></td>
                  <td>{{$u->created_at->diffForHumans()}}</td>
                  <td>
                    <a href="{{route('disciplines.edit.form',$u->id)}}" class="d-none d-sm-inline-block btn btn-sm btn-info mb-4 shadow-sm">
                      <i class="fas fa-edit fa-sm text-white-50"></i>
                    </a>
                     <button type="button" class="btn mb-4 shadow-sm btn-danger btn-sm d-sm-inline-block" data-original-title="" title="" onclick="deleteDiscipline({{$u['id']}})">
                       <i class="fas fa-trash fa-sm text-white-50"></i>
                      </button>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                 <td colspan="4">Aucune donnée enregistrer</td>
               </tr>  
               @endif                
              </tbody>
            </table>
            {!! $disciplines->links() !!}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

 