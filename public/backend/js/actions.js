
function deleteUser(id){
   swal({
        title: "Voulez vous supprimer cet utlisateur?",
        text: "Cette action est irreversible!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, supprimé!",
        closeOnConfirm: false
    }).then(function (isConfirm) {
        if (!isConfirm) return;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "user/delete/"+id,
            type: "POST",
            data: $(this).serialize(),
            dataType: "JSON",
            success: function (results) {
              if (results.success === true) {
                swal("Done!", results.message, "success")
                .then((e) =>{
                  location.reload();
                })
              } else {
                  swal("Error!", results.message, "error");
              }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}



function deletePromotionModal(id){
   swal({
        title: "Etes vous sure?",
        text: "Cette action est irreversible!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, supprimé!",
        closeOnConfirm: false
    }).then(function (isConfirm) {
        if (!isConfirm) return;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "promotion/delete/"+id,
            type: "POST",
            data: {
                _prom: id,
                _token: CSRF_TOKEN
            },
            dataType: "JSON",
            success: function (results) {
              if (results.success === true) {
                swal("Done!", results.message, "success")
                .then((e) =>{
                  location.reload();
                })
              } else {
                  swal("Error!", results.message, "error");
              }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}


function deleteUniversity(id){
   Swal.fire({
    title: 'êtes-vous sure?',
    text: 'Cette opération est irreversible!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Oui, supprimé',
    cancelButtonText: 'Non, annulé'
  }).then((result) => {
  if (result.value) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
            url: "university/delete/"+id,
            type: "POST",
            data: {
                _prom: id,
                _token: CSRF_TOKEN
            },
            dataType: "JSON",
            success: function (results) {
              if (results.success === true) {
                //swal("Done!", results.message, "success")
                Swal.fire(
                  'Done!',
                  results.message,
                  'success'
                ).then((e) =>{
                  location.reload();
                })
              } else {
                  swal("Error!", results.message, "error");
              }
            }
        });
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire(
      'Annulé',
      'Opération annulée',
      'error'
    )
  }
})

}

function deleteDiscipline(id){
   Swal.fire({
    title: 'êtes-vous sure?',
    text: 'Cette opération est irreversible!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Oui, supprimé',
    cancelButtonText: 'Non, annulé'
  }).then((result) => {
  if (result.value) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
            url: "disciplines/delete/"+id,
            type: "POST",
            data: {
                _prom: id,
                _token: CSRF_TOKEN
            },
            dataType: "JSON",
            success: function (results) {
              if (results.success === true) {
                //swal("Done!", results.message, "success")
                Swal.fire(
                  'Done!',
                  results.message,
                  'success'
                ).then((e) =>{
                  location.reload();
                })
              } else {
                  swal("Error!", results.message, "error");
              }
            }
        });
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire(
      'Annulé',
      'Opération annulée',
      'error'
    )
  }
})
}

function deleteDepartement(id){
   Swal.fire({
    title: 'êtes-vous sure?',
    text: 'Cette opération est irreversible!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Oui, supprimé',
    cancelButtonText: 'Non, annulé'
  }).then((result) => {
  if (result.value) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
            url: "departement/delete/"+id,
            type: "POST",
            data: {
                _prom: id,
                _token: CSRF_TOKEN
            },
            dataType: "JSON",
            success: function (results) {
              if (results.success === true) {
                //swal("Done!", results.message, "success")
                Swal.fire(
                  'Done!',
                  results.message,
                  'success'
                ).then((e) =>{
                  location.reload();
                })
              } else {
                  swal("Error!", results.message, "error");
              }
            }
        });
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire(
      'Annulé',
      'Opération annulée',
      'error'
    )
  }
})
}

function deleteUfr(id){
   Swal.fire({
    title: 'êtes-vous sure?',
    text: 'Cette opération est irreversible!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Oui, supprimé',
    cancelButtonText: 'Non, annulé'
  }).then((result) => {
  if (result.value) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
            url: "ufr/delete/"+id,
            type: "POST",
            data: {
                _prom: id,
                _token: CSRF_TOKEN
            },
            dataType: "JSON",
            success: function (results) {
              if (results.success === true) {
                //swal("Done!", results.message, "success")
                Swal.fire(
                  'Done!',
                  results.message,
                  'success'
                ).then((e) =>{
                  location.reload();
                })
              } else {
                  swal("Error!", results.message, "error");
              }
            }
        });
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire(
      'Annulé',
      'Opération annulée',
      'error'
    )
  }
})
}

function deleteThese(id){
   Swal.fire({
    title: 'êtes-vous sure?',
    text: 'Cette opération est irreversible!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Oui, supprimé',
    cancelButtonText: 'Non, annulé'
  }).then((result) => {
  if (result.value) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
            url: "theses/delete/"+id,
            type: "POST",
            data: {
                _prom: id,
                _token: CSRF_TOKEN
            },
            dataType: "JSON",
            success: function (results) {
              if (results.success === true) {
                //swal("Done!", results.message, "success")
                Swal.fire(
                  'Done!',
                  results.message,
                  'success'
                ).then((e) =>{
                  location.reload();
                })
              } else {
                  swal("Error!", results.message, "error");
              }
            }
        });
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire(
      'Annulé',
      'Opération annulée',
      'error'
    )
  }
})
}

function deleteOffre(id){
   Swal.fire({
    title: 'êtes-vous sure?',
    text: 'Cette opération est irreversible!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Oui, supprimé',
    cancelButtonText: 'Non, annulé'
  }).then((result) => {
  if (result.value) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
            url: "offres/delete/"+id,
            type: "POST",
            data: {
                _prom: id,
                _token: CSRF_TOKEN
            },
            dataType: "JSON",
            success: function (results) {
              if (results.success === true) {
                //swal("Done!", results.message, "success")
                Swal.fire(
                  'Done!',
                  results.message,
                  'success'
                ).then((e) =>{
                  location.reload();
                })
              } else {
                  swal("Error!", results.message, "error");
              }
            }
        });
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire(
      'Annulé',
      'Opération annulée',
      'error'
    )
  }
})
}
