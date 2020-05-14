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
           
          </div>
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
