
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">BASIC</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">500 CFA</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">STANDARD</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">2000 CFA</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PREMIUM</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">5000&nbsp;CFA</div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total des offres</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$datas->count()}} offres</div>
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
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Liste des forfaits disponible</h6>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                	<a href="{{route('offres.show.form')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary mb-4 shadow-sm">
                   			<i class="fas fa-plus fa-sm text-white-50"></i> Créer un forfait
               		</a>
               		{{--<a href="{{route('offres.add')}}" class="d-none d-sm-inline-block btn btn-sm btn-success mb-4 shadow-sm">
               			<i class="fas fa-download fa-sm text-white-50"></i> Generer un rapport excel
               		</a>--}}
               		<br/>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Libellé</th>
                  <th>Coût</th>
                  <th>Périodes (en jours)</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @if(sizeof($datas) != 0)
                @foreach($datas as $offre)
                <tr>
                  <td>{{$offre->libelle}}</td>
                  <td>{{$offre->cout}}&nbsp;{{'CFA'}}</td>
                  <td>{{$offre->temps}}</td>
                  <td>
                    <a href="{{route('offres.edit.form', $offre->id)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary mb-4 shadow-sm">
                        <i class="fas fa-edit fa-sm text-white-50"></i>
                  </a>

                    <button type="button" class="btn mb-4 shadow-sm btn-danger btn-sm d-sm-inline-block" data-original-title="" title="" onclick="deleteOffre({{$offre->id}})">
                       <i class="fas fa-trash fa-sm text-white"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="4">{{'Aucune donnée trouvées !'}}</td>
                </tr>
                @endif
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Forfaits / Statistique</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <!-- <canvas id="myPieChart"></canvas> -->
                  </div>
                  <!-- <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div> -->
                </div>
              </div>
            </div>
          </div>

@endsection

 