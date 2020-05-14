<!-- Modal -->
<div class="modal fade" id="modalGoCinetpay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="getCode">
        @if($html)
            <h1>Vous allez être redirigé vers la plateforme de paiement...</h1>
            {!! $html !!}
        @endif
      
        
      </div>
    </div>
  </div>
</div>