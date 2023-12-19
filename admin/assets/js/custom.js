$(document).ready(function () {

    $(document).on('click','.delete_reminder_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'reminderId': id,
                        'delete_reminder_btn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Reminder deleted Successfully!", "success");
                            $('#reminders_list').load(location.href + " #reminders_list");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    });

    $(document).on('click','.deleteClinicBtn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'clinicId': id,
                        'deleteClinicBtn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Clinic deleted Successfully!", "success");
                            $('#dataTable').load(location.href + " #dataTable");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    });

    $(document).on('click','.deleteDocBtn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, doctor account will be deactivated",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'doctorId': id,
                        'deleteDocBtn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Doctor Account has been deactivated Successfully!", "success");
                            $('#dataTable').load(location.href + " #dataTable");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    });

    $(document).on('click','.restoreDocBtn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Doctor account will be restored",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'doctorId': id,
                        'restoreDocBtn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Doctor Account has been restored Successfully!", "success");
                            $('#dataTable').load(location.href + " #dataTable");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    }); 
    
    $(document).on('click','.deleteWExceptionBtn', function (e) {
        e.preventDefault();

        var date = $(this).val();
        var id = $(this).closest('td').find('.drExId').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'drId': id,
                        'date': date,
                        'deleteWExceptionBtn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Exception deleted Successfully!", "success");
                            $('#dataTable').load(location.href + " #dataTable");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    });    

    $(document).on('click','.deleteDonorBtn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'donorId': id,
                        'deleteDonorBtn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Donor deleted Successfully!", "success");
                            $('#dataTable').load(location.href + " #dataTable");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    }); 
    
    $(document).on('click','.deleteUrgentBTBtn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'urgentBTId': id,
                        'deleteUrgentBTBtn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Urgent BloodType deleted Successfully!", "success");
                            $('#dataTable2').load(location.href + " #dataTable2");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    });
    
    $(document).on('click','.deleteMedHoursBtn', function (e) {
        e.preventDefault();

        var day = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'medDay': day,
                        'deleteMedHoursBtn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "Medical Hour deleted Successfully!", "success");
                            $('#dataTable2').load(location.href + " #dataTable2");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    }); 

    $(document).on('click','.restrictUserBtn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "User will be restricted from logging in.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'userId': id,
                        'restrictUserBtn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "User Account Restricted Successfully!", "success");
                            $('#dataTable').load(location.href + " #dataTable");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    });
    
    $(document).on('click','.restoreUserBtn', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "User Account will be restored.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method:"POST",
                    url: "functions/code.php",
                    data: {
                        'userId': id,
                        'restoreUserBtn': true
                    },
                    success: function(response){
                        if(response == 200){
                            swal("Success!", "User Account Restored Successfully!", "success");
                            $('#dataTable').load(location.href + " #dataTable");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
            }
          });
    });
    
});