@extends('layouts.user.dashboard')

@section('content')
<!-- Modal -->
 <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="getCode">
        
      </div>
    </div>
  </div>
 </div>
 <div class="row mb-4 mt-4">
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-capitalize mb-0">Ma souscription en cours...</h2>
                  </div>
                  <div class="card-body">
                    <p class="text-gray"></p>
                    <div class="chart-holder">
                     <table class="table card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Offre</th>
                          <th>Montant</th>
                          <th>Date de souscription</th>
                          <th>Date d'expiration</th>
                          <th>Opérateur</th>
                          <th>Numéro</th>
                          <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>
                        @if($datas->isEmpty())
                        <tr>
                          <td colspan="6" >{{'Vous n\'avez pas d\'abonnement'}}</td>
                        </tr>
                        @else
                        @foreach($datas as $d)
                        <tr>
                          <td scope="row">{{$d->id}}</td>
                          <td>{{$d->offres->libelle}}</td>
                          <td>{{$d->prix}}CFA</td>
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
              
            </div>
            <div class="row">
              <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row align-items-center mb-3 flex-row">
                      <div class="col-lg-5">
                        <h2 class="mb-0 d-flex align-items-center"><span>Basic</span><span class="dot bg-violet d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small">Cette offre est valable pour 1 jour</span>
                      </div>
                      
                    </div>
                  </div>
                </div> 
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row align-items-center mb-3 flex-row">
                      <div class="col-lg-5">
                        <h2 class="mb-0 d-flex align-items-center"><span>Standard</span><span class="dot bg-info d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small">Cette offre est valable pour 7 jours</span>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row align-items-center mb-3 flex-row">
                      <div class="col-lg-5">
                        <h2 class="mb-0 d-flex align-items-center"><span>Premium</span><span class="dot bg-red d-inline-block ml-3"></span></h2><span class="text-muted text-uppercase small">Cette offre est valable pour 30 jours</span>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 mb-4">
                <div class="card mb-3">
                  <div class="card-header">
                    <h2 class="h6 text-capitalize mb-0">Souscrire à une offre</h2>
                  </div>
                  <div class="card-body">
                    <form id="orderPlanForm">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                         <label class="form-control-label">Selectionner une offre</label>
                        <div class="col-md-9 select mb-3">
                          @if(!$offres->isEmpty())
                          <select name="offre" class="form-control">
                            @foreach($offres as $offre)
                            <option value="{{$offre->id}}">{{$offre->libelle}}</option>
                            @endforeach
                          </select>
                          @endif
                        </div>
                      </div>
                      <div class="form-group">
                     <a href="JavaScript:void(0);" class="btn btn-primary" id="orderPlan">Acheter cette offre</a>   
                      </div>
                    </form>
                    <div class="row">
                      <div class="modalKu"></div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3">
                  <div class="card-header">
                    <h2 class="h6 text-capitalize mb-0">Historique de souscription</h2>
                  </div>
                  <div class="card-body">
                   
                   
                  </div>
                </div>
              </div>
            </div>
            
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  
<script type="text/javascript">
 $.ajaxSetup({
  headers: {
   'X-CSRF-TOKEN': $('input[name="_token"]').val(),
  }
 });
 
$('#orderPlan').click(function (e) {
  e.preventDefault();
  $(this).html('opération en cours...');
    $.ajax({
    url: "{{ route('btn.payer') }}",
    type: "POST",
    data: $('#orderPlanForm').serialize(),
    success: function (response) {
      $("#getCode").html(response);
      $("#getCodeModal").modal('show');

      //console.log(response);
      /*$('.modalKu').html(response);
      $('#modalGoCinetpay').modal('show'); */    
    },
    error: function (data) {
          
          }
        }).done(function(){
          $('#orderPlan').html('Opération en cours...');
        })
});
</script>
@endsection
