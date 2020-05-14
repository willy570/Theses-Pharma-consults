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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{'TOTAL DES SOUSCRIPTIONS'}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalAbonnement}}</div>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SOUSCRIPTIONS ACTIVES</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalAktive}}</div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-danger shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1"></div>
                     <div class="row no-gutters align-items-center">
                       <div class="col-auto">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SOUSCRIPTION EXPIREES</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totaldsaAktive}}</div>
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
                  <h6 class="m-0 font-weight-bold text-primary">Liste des souscriptions</h6>

                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                	<table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                  <th>Utilisateur</th>
                                                  <th>Offre</th>
                                                  <th>Date de souscription</th>
                                                  <th>Date d'expiration</th>
                                                  <th>Opérateur</th>
                                                  <th>Numéro</th>
                                                  <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!$datas)
                                                    <tr>
                                                      <td colspan="7" >{{'Aucune souscription trouvée !'}}</td>
                                                    </tr>
                                                @else
                                                @foreach($datas as $d)
                                                    <tr>
                                                      <td>{{$d->users->name}}&nbsp;{{$d->users->lastname}}</td>
                                                      <td>
                                                        {{$d->offres->libelle}} <br/>
                                                        <span>{{$d->prix}}&nbsp;CFA</span>
                                                      </td>
                                                      <td>{{$d->souscrit_le}}</td>
                                                      <td>{{$d->expire_le}}</td>
                                                      
                                                      <td>
                                                        {{__($d->operateur)}}
                                                      </td>
                                                      <td>
                                                        {{__($d->prefixe)}}&nbsp;{{__($d->numero_operation)}}
                                                      </td>
                                                      @if($d->expire_le < date('Y-m-d H:i:s'))
                                                      <td>
                                                        <span class="badge badge-danger">
                                                          {{__('abonnement expiré')}}
                                                        </span>
                                                        
                                                      </td>
                                                      @else
                                                      <td>
                                                       <span class="badge badge-success">
                                                          {{__('abonnement valide')}}
                                                        </span>
                                                      </td>
                                                      @endif
                                                    </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                </div>
             </div>
      </div>
  </div>
@endsection

 