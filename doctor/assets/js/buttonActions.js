$(document).ready(function () {

    $(document).on('click','.del-btn', function (e) {
        
        e.preventDefault();
        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once the apppointment is canceled, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:'POST',
                    url: 'queryFunctions/buttonActions.php',
                    data: {
                        'appId': id,
                        'del-btn': 1
                    },
                    success: function () {
                           swal("Success!", "Appointment canceled successfully!", "success");
                           // $('#requestTable').load(location.href + " #requestTable");
                           location.reload();
                    },
                    error: function () {
                        swal("Error!", "Something Went Wrong!", "error");
                    }
              });
          }
        });
  });
           $(document).on('click','.acc-btn', function (e) {
        
            e.preventDefault();
            var id = $(this).val();
                    $.ajax({
                        method:'POST',
                        url: 'queryFunctions/buttonActions.php',
                        data: {
                            'appId': id,
                            'acc-btn': 1
                        },
                        success: function(){
                            location.reload();
                          },
                          error: function () {
                          swal("Error!", "Something Went Wrong!", "error");
                        }
                      });
                });
          });