$(document).ready(function () {
    $('#contactForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "functions/sendEmail.php",
            data: $('#contactForm').serialize(),
            success: function (response) {
                if (response.trim() === '100') {
                    swal("Check!", "All Fileds should required", "error");
                    
                } else if (response.trim() === '200') {
                    swal("Check!", "All Fileds should Validated", "error");
                }
                else if (response.trim() === '300') {
                    swal("Thank You!", "Your data has been submitted successfully!", "success");
                    // Clear form inputs
                    $('#contactForm')[0].reset();
                    document.getElementById('fname-error').innerHTML = '';
                    document.getElementById('lname-error').innerHTML = '';
                    document.getElementById('email-error').innerHTML = '';
                    document.getElementById('subject-error').innerHTML='';
                    document.getElementById('message-error').innerHTML='';
                }
            },
            error: function () {
                swal("Error!", "Failed to communicate with the server.", "error");
            }
        });
    });
});

