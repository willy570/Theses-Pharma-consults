$(function () {


    // ------------------------------------------------------- //
    // Sidebar
    // ------------------------------------------------------ //
    $('.sidebar-toggler').on('click', function () {
        $('.sidebar').toggleClass('shrink show');
    });



    // ------------------------------------------------------ //
    // For demo purposes, can be deleted
    // ------------------------------------------------------ //

    var stylesheet = $('link#theme-stylesheet');
    $( "<link id='new-stylesheet' rel='stylesheet'>" ).insertAfter(stylesheet);
    var alternateColour = $('link#new-stylesheet');

    if ($.cookie("theme_csspath")) {
        alternateColour.attr("href", $.cookie("theme_csspath"));
    }

    $("#colour").change(function () {

        if ($(this).val() !== '') {

            var theme_csspath = 'css/style.' + $(this).val() + '.css';

            alternateColour.attr("href", theme_csspath);

            $.cookie("theme_csspath", theme_csspath, { expires: 365, path: document.URL.substr(0, document.URL.lastIndexOf('/')) });

        }

        return false;
    });
});


Cookies.set('active', 'true');

function deleteBiblio(id){
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
            url: "/home/biblio/delete/"+id,
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


function goCheck(id) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.ajax({
    url: "/home/biblio/ligne/check/"+id,
    type: "POST",
    data: {
        _ligne: id,
        _token: CSRF_TOKEN
    },
    dataType: "JSON",
  }).done(function(results) {
    if (results.state =='success')
      {
        Swal.fire('Done!',results.message,'success'
        ).then((e) =>{
          window.open(results.downloadlink, '_blank');
        })
      }else{
        swal("Error!", results.message, "error");
      }
    
  })
}