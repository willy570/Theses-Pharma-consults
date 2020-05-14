@extends('layouts.user.dashboard')

@section('content')
 <div class="row mb-4 mt-4">
              <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-capitalize mb-0">Mes bibliothèques</h2>
                  </div>
                  <div class="card-body">
                    <p class="text-gray"></p>
                    <div class="chart-holder">
                     <table class="table card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Libellé</th>
                          <th>Total</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@if($datas->isEmpty())
                      	<tr>
                      		<td colspan="4"> Aucune donnée trouver pour l'instant</td>
                      	</tr>
                      	@else
                      	@foreach($datas as $d)
                        <tr>
                          <th scope="row">{{$d->id}}</th>
                          <td>{{$d->libelle}}</td>
                          <td>{{$d->lignes->count()}}</td>
                          <td><a href="JavaScript:void(0);" class="btn btn-danger btn-sm" onclick="deleteBiblio({{$d->id}})"><i class="fas fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-capitalize mb-0">Mes documents</h2>
                  </div>
                  <div class="card-body">
                    <p class="text-gray"></p>
                    <div class="chart-holder">
                     <table class="table card-text">
                      <thead>
                        <tr>
                          <th>Document</th>
                          <th>Bibliothèque</th>
                          <th>Actions</th>
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
                          <td>
                            {{$l->bibliotheques->libelle?? ''}} <br />
                             <a href="JavaScript:void(0);" class="btn btn-info btn-sm" onclick="goCheck({{$l->id}})"><i class="fas fa-download"></i></a>
                          </td>
                          <td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
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
            <div class="row">
              <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row align-items-center mb-3 flex-row">
                      <div class="col-lg-5">
                        <h2 class="mb-0 d-flex align-items-center"><span>{{$datas->count()}}</span><span class="dot bg-violet d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small">Nombre de bibliothèque</span>
                        <hr><small class="text-muted"></small>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-capitalize mb-0">Créer une bibliothèque</h2>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('biblio.store') }}">
	        			      @csrf
                      <div class="form-group">
                        <label class="form-control-label text-uppercase">Libellé de la bibliothèque</label>
                        <input type="texte" placeholder="Libellé de votre bibliothèque" class="form-control" name="library_name">
                      </div>
                      <div class="form-group">       
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
  <div class="row">
    <div class="modalKu">
      
    </div>
  </div>
@endsection
