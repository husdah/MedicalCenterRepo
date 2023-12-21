$(document).ready(function () {
    $('#sign-up').submit(function(e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "phpCode.php",
            data: $("#sign-up").serialize(),
            success: function(response){
                if(response === '1') {
                    displayError("Please fill in all the required fields before proceeding.");
                } else if(response === '2') {
                    displayError("Please enter a valid name!");
                } else if(response === '3') {
                    displayError("Please enter a valid email!");
                }else if(response === '5') {
                    displayError("Please enter a valid password!");
                } else if(response === '6') {
                    displayError("Please Confirm Password!");
                } else if(response === '7') {
                    displayError("Password Confirmation Incorrect!");
                } else if(response === '8') {
                    displayError("Email already exists!");
                } else if(response === '9') {
                    displayError("Phone number already exists!");
                    console.log("phone number");
                } else if(response === '10') {
                    displayError("User already exists!");
                } else if(response === '11') {
                    displayError("Something went wrong!");
                } else if (response === '12'){
                    displaySuccess("Form Submitted Successfully!");
                }
            }
        });
    });

    $('#sign-in').submit(function(e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "phpCode.php",
            data: $("#sign-in").serialize(),
            success: function(response){
                if(response === '1') {
                    displayError("Incorrect email or password. Please try again.");
                }
              }
            });
        });
});

// Function to display error message using SweetAlert
function displayError(message) {
    swal("Error",message, "error");
}

// Function to display success message using SweetAlert
function displaySuccess(message) {
    swal("Success",message, "success");
}