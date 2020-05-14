<!-- Modal -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
<div class="modal fade" id="addToLibrary" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mes bibliothèques</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        @if(!$library->isEmpty())
          <form class="form-horizontal" id="createCatForm" action="#" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_su" value="{{ Auth::user()->id }}">
            <input type="hidden" name="_tu" value="{{ $theseID }}">
            @foreach($library as $option => $value)
             <div class="pretty p-default p-round p-smooth">
                <input type="radio" name="lib" value="{{$option}}" />
                <div class="state p-success">
                    <i class="icon mdi mdi-check"></i>
                    <label>{{ucfirst($value)}}</label>
                </div>
              </div>
            @endforeach              
              <div class="modal-footer">
                <button type="submit" id="saveBtn" class="btn btn-primary btn-block">Ajouter à cette bibliothèques</button>
              </div>
          </form>
        @else
          <form class="form-horizontal" id="bilioForm" action="#" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_su" value="{{ Auth::user()->id }}">
            <input type="hidden" name="_tu" value="{{ $theseID }}">
             <div class="form-group row">
              <label class="control-label col-md-3">Libelle de la bibiothèque</label>
              <div class="col-md-8">
                <input class="form-control" type="text" placeholder="Scineces, Histoire, Geographie" name="biblioname">
              </div>
            </div>          
            <div class="modal-footer">
              <button type="submit" id="saveBiblio" class="btn btn-primary btn-block">Créer et ajouter le document </button>
            </div>
          </form>
      @endif
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
 $.ajaxSetup({
  headers: {
   'X-CSRF-TOKEN': $('input[name="_token"]').val(),
  }
 });
$('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Ajout en cours...');
        $.ajax({
          url: "{{ route('ligne.store') }}",
          type: "POST",
          data: $('#createCatForm').serialize(),
          success: function (data) {
            $('#createCatForm').trigger("reset");
              console.log('done!')
          },
          error: function (data) {
             console.log('Error:', data);
             $('#saveBtn').html('Save Changes');
          }
  }).done(function(result) {
        $('#addToLibrary').modal('hide');
          if (result.state =='success')
          {
            toastr.success(result.message);
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
          }
          else {
             toastr.warning(result.message);
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
          }
  })
});
</script>

<script type="text/javascript">
 $.ajaxSetup({
  headers: {
   'X-CSRF-TOKEN': $('input[name="_token"]').val(),
  }
 });
$('#saveBiblio').click(function (e) {
  e.preventDefault();
  $(this).html('opération en cours...');
        $.ajax({
          url: "{{ route('ligne.biblio') }}",
          type: "POST",
          data: $('#bilioForm').serialize(),
          success: function (data) {
            $('#bilioForm').trigger("reset");
              console.log('done!')
          },
          error: function (data) {
             console.log('Error:', data);
             $('#saveBiblio').html('Ajout en cours...');
          }
  }).done(function(result) {
        $('#addToLibrary').modal('hide');
          if (result.state =='success')
          {
            toastr.success(result.message);
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
          }
          else {
             toastr.warning(result.message);
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
          }
  })
});
</script>