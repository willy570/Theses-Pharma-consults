<div class="modal fade" id="modalkeyword">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form role="form" id="keywordsForm" class="form-horizontal">
					<legend>Ajouter des mots clés</legend>
					<small>Séparer les mot par des espaces<br/> Ex: manger dormir courrir sauter mars mairie clé element </small>
					<div class="form-group">
						<textarea name="keywords" id="keywords" class="form-control" rows="3" required="required">
						
						</textarea>
					</div>
					<div class="form-group">
						<input type="hidden" class="form-control" id="these_id" name="these_id" value="{{$id}}">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" id="saveBtn" class="btn btn-primary">Enregistrer</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(function (e) {
      $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

    });

    $('#saveBtn').click(function (e) {
    	e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
          data: $('#keywordsForm').serialize(),
          url: "{{ route('theses.keywords.add') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#keywordsForm').trigger("reset");
              $('#modalkeyword').modal('hide');
              if (data.etat === 'success') {
                swal("Done!", data.message, "success")
                .then((e) =>{
                  location.reload();
                })
              } else {
                  swal("Error!", data.message, "error");
              }
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Enregistrer');
          }
      });
    });

});

</script>


