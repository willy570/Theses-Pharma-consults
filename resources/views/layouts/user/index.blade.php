@extends('layouts.user.dashboard')
@section('content')

  <div class="row mt-5">
              <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row align-items-center mb-3 flex-row">
                      <div class="col-lg-5">
                        <h2 class="mb-0 d-flex align-items-center"><span>{{$count}}</span><span class="dot bg-violet d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small"></span>
                        <hr><small class="text-muted">Les documents ajoutés à vos différentes bibliothèques</small>
                      </div>
                      <div class="col-lg-7">
                        <canvas id="pieChartHome3"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row align-items-center flex-row">
                      <div class="col-lg-5">
                        <h2 class="mb-0 d-flex align-items-center"><span>{{$biblio}}</span><span class="dot bg-green d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small">Bibliothèques</span>
                        <hr><small class="text-muted">L'ensemble de vos bibliothèque <br>
                @if($userbiblio)
                 @foreach($userbiblio as $b)
                  <h5 class="badge badge-info">{{strtoupper($b->libelle)}}</h5></small>
                  @endforeach
                  @endif
                      </div>
                      <div class="col-lg-7">
                        <canvas id="pieChartHome4"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0">MES ABONNEMENTS</h2>
                  </div>
                  <div class="card-body">
                    <p class="text-gray">L'ensemble de mes abonnements</p>
                    <div class="chart-holder">
                      <table class="table card-text">
                      <thead>
                        <tr>
                          <th>Offre</th>
                          <th>Montant</th>
                          <th>Numéro</th>
                          <th>x</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($abon->isEmpty())
                        <tr>
                          <td colspan="4"> Aucune donnée trouver pour l'instant</td>
                        </tr>
                        @else
                        @foreach($abon as $l)
                        <tr>
                          <td>
                            {{$l->offres->libelle}}
                          </td>
                          <td>{{$l->prix}}
                          </td>
                          <td>
                            {{__($l->prefixe)}}&nbsp;{{__($l->numero_operation)}}
                          </td>
                          @if($l->expire_le < date('Y-m-d H:i:s'))
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
            </div>
            <div class="row mb-4 mt-4">
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-capitalize mb-0">MES DOCUMENTS</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart-holder">
                     <table class="table card-text">
                      <thead>
                        <tr>
                          <th>Document</th>
                          <th>Bibliothèque</th>
                          <th>Ajouter le</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($lignes->isEmpty())
                        <tr>
                          <td colspan="4"> Aucune donnée trouver pour l'instant</td>
                        </tr>
                        @else
                        @foreach($lignes as $l)
                        <tr>
                          <td>
                            <a href="{{route('theses.details', $l->theses->url)}}">{{$l->theses->titre ?? ''}}</a>
                          </td>
                          <td>{{$l->bibliotheques->libelle?? ''}} <br />
                          </td>
                          <td>
                            {{ $l->created_at }}
                          </td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
            </div>
              
            </div>
            


@endsection