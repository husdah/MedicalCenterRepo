
    /*$('#donateform').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "donateData.php",
            data: $('#donateform').serialize(),
            success: function (response) {
                if (response.trim() === '200') {
                    swal("Thank you again", "But you have already donated and we have your data");
                } else if (response.trim() === '300') {
                    swal("Thank You!", "Your data has been submitted successfully!", "success");
                    // Clear form inputs
                    $('#donateform')[0].reset();
                    document.getElementById('errorInput').innerHTML = '';
                } else if (response.trim() === '500') {
                    swal("Error!", "Please, Fill The Fields", "error");
                }
            },
            error: function () {
                swal("Error!", "Failed to communicate with the server.", "error");
            }
        });
    });*/
