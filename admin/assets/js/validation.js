// Function to validate name
function validateName(name) {
    var nameRegex = /^[a-zA-Z]+$/;
    return nameRegex.test(name);
}

// Function to validate desc
function validateDesc(desc) {
    var descRegex = /^[a-zA-Z\s]+$/;
    return descRegex.test(desc);
}

// Function to validate email
function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Function to validate password
function validatePass(pass) {
    var passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    return passRegex.test(pass);
}

// Function to validate phone
function validatePhone(phone) {
    var lebanesePhoneRegex = /^\d{8}$/;
    /* var lebanesePhoneRegex = /^(?:\+961|0\d{1,2}) \d{3} \d{3}$/; */
    return lebanesePhoneRegex.test(phone);
}

// Function to handle submit Name events
function validateNameSubmit(name, nameInput, errorName) {
    if (name == '' || !validateName(name)) {
        nameInput.classList.add("required");

        if (name == '') {
            errorName.textContent = errorName.className +' required';
            return false;
        } else if (!validateName(name)) {
            errorName.textContent = 'Only letters are allowed.';
            return false;
        }
    }
    return true;
}

// Function to handle submit Email events
function validateEmailSubmit(email, emailInput, erroremail) {
    if (email == '' || !validateEmail(email)) {
        emailInput.classList.add("required");

        if (email == '') {
            erroremail.textContent = 'email required';
            return false;
        } else if (!validateEmail(email)) {
            erroremail.textContent = 'Invalid email';
            return false;
        }
    }
    return true;
}

// Function to handle submit Phone events
function validatePhoneSubmit(phone, phoneInput, errorPhone) {
    if (phone == '' || !validatePhone(phone)) {
        phoneInput.classList.add("required");

        if (phone == '') {
            errorPhone.textContent = 'Phone required';
            return false;
        } else if (!validatePhone(phone)) {
            errorPhone.textContent = 'Invalid Phone';
            return false;
        }
    }
    return true;
}

// Function to handle submit Password events
function validatePassSubmit(pass, passInput, errorPass) {
    if (pass == '' || !validatePass(pass)) {
        passInput.classList.add("required");

        if (pass == '') {
            errorPass.textContent = 'Password required';
            return false;
        } else if (!validatePass(pass)) {
            errorPass.textContent = 'Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, and one digit.';
            return false;
        }
    }
    return true;
}

// Function to handle submit ConfPass events
function ConfirmPassSubmit(confPass, confPassInput, pass, errorconfPass) {
    if (confPass == '' || confPass != pass) {
        confPassInput.classList.add("required");

        if (confPass == '') {
            errorconfPass.textContent = 'Confirm Password required';
            return false;
        } else if (confPass != pass) {
            errorconfPass.textContent = 'Password Confirmation Incorrect';
            return false;
        }
    }
    return true;
}

// Function to handle submit Desc events
function validateDescSubmit(name, nameInput, errorName) {
    if (name == '' || !validateDesc(name) || name.length < 5 || name.length > 50) {
        nameInput.classList.add("required");
        errorName.classList.add("count");
        if (name == '') {
            errorName.textContent = 'description required';
            return false;
        } else if (!validateDesc(name)) {
            errorName.textContent = 'Invalid description. Only letters are allowed.';
            return false;
        } else if (name.length < 5) {
            errorName.textContent = "min length: 5";
            return false;
        }
        else if (name.length > 50) {
            errorElement.textContent = "max length: 50";
            return false;
        }
    }
    return true;
}

// Function to handle submit SelectBOX events
function validateSelectSubmit(selectInput, errorselect) {
    var selectedOption = selectInput.options[selectInput.selectedIndex];
    var selectedValue = selectedOption.value;

    if (selectedValue == '' || selectInput.selectedIndex == 0) {
        /* selectInput.classList.add("required"); */

        selectInput.classList.add("required");
        errorselect.textContent = selectInput.options[0].value +" required";
        return false;
    }
    return true;
}

// Function to handle submit DOB events
function validateDOBSubmit(dobInput, errorDob) {
    var dobValue = dobInput.value;
    var dobDate = new Date(dobValue);
    var currentDate = new Date();

    if (isNaN(dobDate) || dobDate > currentDate) {
        /* alert('Invalid date of birth.'); */
        dobInput.classList.add("required");
        errorDob.classList.add("count");

        if(isNaN(dobDate)){
            errorDob.textContent = "Date of Birth required";
            return false;
        }else if(dobDate > currentDate){
            errorDob.textContent = "Invalid Date of Birth";
            return false;
        }
        
    } 
    return true;
}

// Function to handle submit GENDER events
function validateGenderSubmit(maleInput, femaleInput) {

    if (!maleInput.checked && !femaleInput.checked) {
        alert("check Gender");
        return false;
    } 
    return true;
}

// Function to handle submit NUMBER events
function validateNumberSubmit(numberInput, errorNumber) {

    if (numberInput.value == '' || numberInput.value <= 0) {
        numberInput.classList.add("required");
        errorNumber.textContent = "Number required";
        return false;
    } 
    return true;
}

// Function to handle submit TIME events
function validateTimeSubmit(timeInput, errorTime) {

    if (timeInput.value == '') {
        timeInput.classList.add("required");
        errorTime.classList.add("count");
        errorTime.textContent = "Time required";
        return false;
    } 
    return true;
}

// Function to validate file
function validateFile() {
    var fileInput = document.getElementById('clinicImg');
    var errorElement = document.getElementById('clinicImgError');

    if (fileInput.files.length <= 0) {
        fileInput.classList.add("required");
        errorElement.classList.add("count");
        errorElement.textContent = 'image required';
        return false;
    } else if (fileInput.files.length > 0) {
        var allowedTypes = ['image/jpeg', 'image/png'];
        var fileType = fileInput.files[0].type;

        if (allowedTypes.indexOf(fileType) === -1) {
            fileInput.classList.add("required");
            errorElement.classList.add("count");
            errorElement.textContent = 'Invalid file type. Please choose a valid image file.';
            return false;
        }
    }
    errorElement.textContent = '';
    fileInput.classList.remove("required");
    errorElement.classList.remove("count");
    return true;
}

// Function to validate Edit file 
function validateFileEdit() {
    var fileInput = document.getElementById('editClinicImg');
    var errorElement = document.getElementById('editClinicImgError');

    if (fileInput.files.length > 0) {
        var allowedTypes = ['image/jpeg', 'image/png'];
        var fileType = fileInput.files[0].type;

        if (allowedTypes.indexOf(fileType) === -1) {
            fileInput.classList.add("required");
            errorElement.classList.add("count");
            errorElement.textContent = 'Invalid file type. Please choose a valid image file.';
            return false;
        }
    }
    errorElement.textContent = '';
    fileInput.classList.remove("required");
    errorElement.classList.remove("count");
    return true;
}

// Function to handle input NAME events
function handleInputNameEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '' || !validateName(inputElement.value)) {
        inputElement.classList.add("required");

        if (inputElement.value == '') {
            errorElement.textContent = errorElement.className +' required';
        } else if (!validateName(inputElement.value)) {
            errorElement.textContent = 'Only letters are allowed.';
        }

    } else {
        inputElement.classList.remove("required");
        errorElement.textContent = errorElement.className;
    }
}

// Function to handle input EMAIL events
function handleInputEmailEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '' || !validateEmail(inputElement.value)) {
        inputElement.classList.add("required");

        if (inputElement.value == '') {
            errorElement.textContent = 'Email required';
        } else if (!validateEmail(inputElement.value)) {
            errorElement.textContent = 'Invalid email';
        }

    } else {
        inputElement.classList.remove("required");
        errorElement.textContent = 'Email';
    }
}

// Function to handle input PHONE events
function handleInputPhoneEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '' || !validatePhone(inputElement.value)) {
        inputElement.classList.add("required");

        if (inputElement.value == '') {
            errorElement.textContent = 'Phone required';
        } else if (!validatePhone(inputElement.value)) {
            errorElement.textContent = 'Invalid Phone';
        }

    } else {
        inputElement.classList.remove("required");
        errorElement.textContent = 'Phone';
    }
}

// Function to handle input PASSWORD events
function handleInputPassEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '' || !validatePass(inputElement.value)) {
        inputElement.classList.add("required");

        if (inputElement.value == '') {
            errorElement.textContent = 'Password required';
        } else if (!validatePass(inputElement.value)) {
            errorElement.textContent = 'Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, and one digit.';
        }

    } else {
        inputElement.classList.remove("required");
        errorElement.textContent = 'Password';
    }
}

// Function to handle input CONFPASS events
function handleInputConfPassEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);
    let passdId = inputElement.id;
    let confirm = "Confirm";
    let n = passdId.length - confirm.length;
    let string = passdId.substring(0, n);
    var passElement = document.getElementById(string);
    let pass = passElement.value;

    if(pass == ''){
        var errorPassElement = document.getElementById(string + "Error");
        passElement.classList.add("required");
        errorPassElement.textContent = 'Password required';
        inputElement.classList.add("required");
        errorElement.textContent = 'Enter Password First';
    }else{
        if (inputElement.value == '' || inputElement.value != pass) {
            inputElement.classList.add("required");
    
            if (inputElement.value == '') {
                errorElement.textContent = 'Confirm Password';
            } else if (inputElement.value != pass) {
                errorElement.textContent = 'Password Confirmation Incorrect';
            }
    
        } else {
            inputElement.classList.remove("required");
            errorElement.textContent = 'Confirm Password';
        }
    }
}

// Function to handle input DESC events
function handleInputDescEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '' || !validateDesc(inputElement.value) || inputElement.value.length < 5 || inputElement.value.length >= 50) {
        inputElement.classList.add("required");
        errorElement.classList.add("count");

        if (inputElement.value == '') {
            errorElement.textContent = 'description required';
        } else if (!validateDesc(inputElement.value)) {
            errorElement.textContent = 'Invalid description. Only letters are allowed.';
        } else if (inputElement.value.length < 5) {
            errorElement.textContent = "min length: 5";
        }
        else if (inputElement.value.length >= 50) {
            errorElement.textContent = "max length: 50";
        }

    } else if (inputElement.value.length < 50 && (inputElement.value.length) > 5) {
        errorElement.classList.add("count");
        errorElement.textContent = " counter:" + inputElement.value.length;
    }
    else {
        inputElement.classList.remove("required");
        errorElement.classList.remove("count");
    }

}

// Function to handle CHANGE SELECTBOX events
function handleSelectEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    var selectedOption = inputElement.options[0];
    var selectedValue = selectedOption.value;

    if (inputElement.value == '' || inputElement.value == selectedValue) {
        inputElement.classList.add("required");
        errorElement.textContent = selectedValue +' required';

    } else {
        inputElement.classList.remove("required");
        errorElement.textContent = selectedValue;
    }
}

// Function to handle input DOB events
function handleDOBEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    var dobDate = new Date(inputElement.value);
    var currentDate = new Date();

    if (isNaN(dobDate) || dobDate > currentDate) {
        inputElement.classList.add("required");
        errorElement.classList.add("count");
        errorElement.textContent = 'Date of Birth required';

        if(isNaN(dobDate)){
            errorElement.textContent = "Date of Birth required";
        }else if(dobDate > currentDate){
            errorElement.textContent = "Invalid Date of Birth";
        }

    } else {
        inputElement.classList.remove("required");
        errorElement.classList.remove("count");
        errorElement.textContent = 'DOB';
    }
}

// Function to handle input URGENT BT events
function handleInputNumberUrgentBTEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '' || inputElement.value <= 0) {
        inputElement.classList.add("required");
        errorElement.textContent = 'Number required';

    } else {
        inputElement.classList.remove("required");
        errorElement.textContent = 'Number Needed';
    }
}

// Function to handle input TIME events
function handleInputTimeEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '') {
        inputElement.classList.add("required");
        errorElement.classList.add("count");
        errorElement.textContent = 'Time required';

    } else {
        errorElement.classList.remove("count");
        inputElement.classList.remove("required");
        errorElement.textContent = 'Time';
    }
}

// Function to handle input Acount CHECk events
function handleAccountCheckEvent(event) {
    var inputElement = event.target;

    if(!inputElement.checked){
        patientEmailInput.classList.remove("required"); 
        document.getElementById(patientEmailInput.id + 'Error').textContent = "Email";

        patientPhoneInput.classList.remove("required");
        document.getElementById(patientPhoneInput.id + 'Error').textContent = "Phone";

        patientPassInput.classList.remove("required");
         document.getElementById(patientPassInput.id + 'Error').textContent = "Password";

        patientPassConfirmInput.classList.remove("required");
        document.getElementById(patientPassConfirmInput.id + 'Error').textContent = "Confirm password";
    }
}

// Function to handle input Acount CHECk events
function handleClosedCheckEvent(event) {
    var inputElement = event.target;

    if(inputElement.checked){
        WHFromInput.classList.remove("required");
        document.getElementById("WHFromError").classList.remove("count");
        document.getElementById("WHFromError").textContent = "From";

        WHTOInput.classList.remove("required");
        document.getElementById("WHTOError").classList.remove("count");
        document.getElementById("WHTOError").textContent = "To";
    }
}

// Function to handle input Acount CHECk events
function handleAvailableCheckEvent(event) {
    var inputElement = event.target;

    if(inputElement.checked){
        DWHFromInput.classList.remove("required");
        document.getElementById("DWHFromError").classList.remove("count");
        document.getElementById("DWHFromError").textContent = "From";

        DWHTOInput.classList.remove("required");
        document.getElementById("DWHTOError").classList.remove("count");
        document.getElementById("DWHTOError").textContent = "To";
    }
}



// Add event listeners to input fields
//add clinic form
var clinicNameInput = document.getElementById('clinicName');
clinicNameInput?.addEventListener('input', handleInputNameEvent);

var clinicDescInput = document.getElementById('clinicDesc');
clinicDescInput?.addEventListener('input', handleInputDescEvent);

var clinicImgInput = document.getElementById('clinicImg');
var errorImg = document.getElementById('clinicImgError');
clinicImgInput?.addEventListener("change", validateFile);

//edit clinic form
var editClinicNameInput = document.getElementById('editClinicName');
editClinicNameInput?.addEventListener('input', handleInputNameEvent);

var editClinicDescInput = document.getElementById('editClinicDesc');
editClinicDescInput?.addEventListener('input', handleInputDescEvent);

var editClinicImgInput = document.getElementById('editClinicImg');
var errorImg = document.getElementById('editClinicImgError');
editClinicImgInput?.addEventListener("change", validateFileEdit);

//add doctor form
var doctorFNInput = document.getElementById('doctorFN');
doctorFNInput?.addEventListener('input', handleInputNameEvent);

var doctorLNInput = document.getElementById('doctorLN');
doctorLNInput?.addEventListener('input', handleInputNameEvent);

var doctorEmailInput = document.getElementById('doctorEmail');
doctorEmailInput?.addEventListener('input', handleInputEmailEvent);

var doctorClinicInput = document.getElementById('doctorClinic');
doctorClinicInput?.addEventListener('change', handleSelectEvent);

var doctorPassInput = document.getElementById('doctorPass');
doctorPassInput?.addEventListener('input', handleInputPassEvent);

var doctorPassConfirmInput = document.getElementById('doctorPassConfirm');
doctorPassConfirmInput?.addEventListener('input', handleInputConfPassEvent);

//Edit doctor form
var editDoctorFNInput = document.getElementById('editDoctorFN');
editDoctorFNInput?.addEventListener('input', handleInputNameEvent);

var editDoctorLNInput = document.getElementById('editDoctorLN');
editDoctorLNInput?.addEventListener('input', handleInputNameEvent);

var editDoctorEmailInput = document.getElementById('editDoctorEmail');
editDoctorEmailInput?.addEventListener('input', handleInputEmailEvent);

var editDoctorClinicInput = document.getElementById('editDoctorClinic');
editDoctorClinicInput?.addEventListener('change', handleSelectEvent);

var editDoctorPassInput = document.getElementById('editDoctorPass');
editDoctorPassInput?.addEventListener('input', handleInputPassEvent);

var editDoctorPassConfirmInput = document.getElementById('editDoctorPassConfirm');
editDoctorPassConfirmInput?.addEventListener('input', handleInputConfPassEvent);

//add patient form
var patientFNInput = document.getElementById('patientFN');
patientFNInput?.addEventListener('input', handleInputNameEvent);

var patientLNInput = document.getElementById('patientLN');
patientLNInput?.addEventListener('input', handleInputNameEvent);

var patientMaleCheck = document.getElementById('male');
var patientFemaleCheck = document.getElementById('female');

var patientAccountCheck = document.getElementById('account');
patientAccountCheck?.addEventListener("change",handleAccountCheckEvent);

var patientDOBInput = document.getElementById('patientDOB');
patientDOBInput?.addEventListener('input', handleDOBEvent);

var patientBloodTypeInput = document.getElementById('patientBT');
patientBloodTypeInput?.addEventListener('change', handleSelectEvent);

var patientEmailInput = document.getElementById('patientEmail');
patientEmailInput?.addEventListener('input', handleInputEmailEvent);

var patientPhoneInput = document.getElementById('patientPhone');
patientPhoneInput?.addEventListener('input', handleInputPhoneEvent);

var patientPassInput = document.getElementById('patientPass');
patientPassInput?.addEventListener('input', handleInputPassEvent);

var patientPassConfirmInput = document.getElementById('patientPassConfirm');
patientPassConfirmInput?.addEventListener('input', handleInputConfPassEvent);

//add Urgent bloodType form
var urgentBTInput = document.getElementById('urgentBT');
urgentBTInput?.addEventListener('change', handleSelectEvent);

var urgentBTNInput = document.getElementById('urgentBTN');
urgentBTNInput?.addEventListener('input', handleInputNumberUrgentBTEvent);

//admin settings form
var adminNameInput = document.getElementById('signup-name');
adminNameInput?.addEventListener('input', handleInputNameEvent);

var adminEmailInput = document.getElementById('signup-email');
adminEmailInput?.addEventListener('input', handleInputEmailEvent);

var adminPassInput = document.getElementById('signup-password');
adminPassInput?.addEventListener('input', handleInputPassEvent);

var adminPassConfirmInput = document.getElementById('signup-passwordConfirm');
adminPassConfirmInput?.addEventListener('input', handleInputConfPassEvent);

//add center working hours form
var WHDayInput = document.getElementById('WHDay');
WHDayInput?.addEventListener('change', handleSelectEvent);

var WHFromInput = document.getElementById('WHFrom');
WHFromInput?.addEventListener('input', handleInputTimeEvent);

var WHTOInput = document.getElementById('WHTO');
WHTOInput?.addEventListener('input', handleInputTimeEvent);

var WHClosedCheck = document.getElementById('closed');
WHClosedCheck?.addEventListener("change",handleClosedCheckEvent);

//add doctor working hours form
var docNameInput = document.getElementById('docName');
docNameInput?.addEventListener('input', handleInputNameEvent);

var DWHDayInput = document.getElementById('DWHDay');
DWHDayInput?.addEventListener('change', handleSelectEvent);

var DWHFromInput = document.getElementById('DWHFrom');
DWHFromInput?.addEventListener('input', handleInputTimeEvent);

var DWHTOInput = document.getElementById('DWHTO');
DWHTOInput?.addEventListener('input', handleInputTimeEvent);

var DWHAvailableCheck = document.getElementById('available');
DWHAvailableCheck?.addEventListener("change",handleAvailableCheckEvent);

// event lister on Form Buttons
let addClinicFormBtn = document.getElementById("addClinicFormBtn");
addClinicFormBtn?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");

    }else{
        let name = clinicNameInput.value;
        let desc = clinicDescInput.value;

        let errorName = document.getElementById("clinicNameError");
        let errorDesc = document.getElementById("clinicDescError");

        validateNameSubmit(name, clinicNameInput, errorName);
        validateDescSubmit(desc, clinicDescInput, errorDesc);
        validateFile();

        if (!validateNameSubmit(name, clinicNameInput, errorName) || !validateDescSubmit(desc, clinicDescInput, errorDesc) || !validateFile()) {
            /* alert("invalid form"); */
        } else {
            document.getElementById('addClinicForm').submit();
        }
    }
});

let editClinicFormBtn = document.getElementById("editClinicFormBtn");
editClinicFormBtn?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");

    }else{
        let name = editClinicNameInput.value;
        let desc = editClinicDescInput.value;
    
        let errorName = document.getElementById("editClinicNameError");
        let errorDesc = document.getElementById("editClinicDescError");
    
        validateNameSubmit(name, editClinicNameInput, errorName);
        validateDescSubmit(desc, editClinicDescInput, errorDesc);
        validateFile();
    
        if (!validateNameSubmit(name, editClinicNameInput, errorName) || !validateDescSubmit(desc, editClinicDescInput, errorDesc) || !validateFileEdit()) {
            /* alert("invalid form"); */
        } else {
            document.getElementById('editClinicForm').submit();
        }
    }
});

let addDoctorFormBtn = document.getElementById("addDoctorFormBtn");
addDoctorFormBtn?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");

    }else{
        let firstName= doctorFNInput.value;
        let lastName= doctorLNInput.value;
        let email = doctorEmailInput.value;
        /* let clinic = doctorClinicInput.value; */
        let password = doctorPassInput.value;
        let confirm = doctorPassConfirmInput.value;
    
        let errorFN = document.getElementById("doctorFNError");
        let errorLN = document.getElementById("doctorLNError");
        let errorEmail = document.getElementById("doctorEmailError");
        let errorClinic = document.getElementById("doctorClinicError");
        let errorPass = document.getElementById("doctorPassError");
        let errorPassConfirm = document.getElementById("doctorPassConfirmError");
    
        validateNameSubmit(firstName, doctorFNInput, errorFN);
        validateNameSubmit(lastName, doctorLNInput, errorLN);
        validateEmailSubmit(email, doctorEmailInput, errorEmail);
        validatePassSubmit(password, doctorPassInput, errorPass);
        ConfirmPassSubmit(confirm, doctorPassConfirmInput,password, errorPassConfirm);
        validateSelectSubmit(doctorClinicInput, errorClinic);
    
        if (!validateNameSubmit(firstName, doctorFNInput, errorFN) || !validateNameSubmit(lastName, doctorLNInput, errorLN) || !validateEmailSubmit(email, doctorEmailInput, errorEmail) || !validatePassSubmit(password, doctorPassInput, errorPass) || !ConfirmPassSubmit(confirm, doctorPassConfirmInput,password, errorPassConfirm) || !validateSelectSubmit(doctorClinicInput, errorClinic)) {
            /* alert("invalid form"); */
        } else {
           /*  alert("done"); */
            document.getElementById('addDoctorForm').submit();
            
        }
    }
});

let editDoctorFormBtn = document.getElementById("editDoctorFormBtn");
editDoctorFormBtn?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");

    }else{
        let firstName= editDoctorFNInput.value;
        let lastName= editDoctorLNInput.value;
        let email = editDoctorEmailInput.value;
        /* let clinic = editDoctorClinicInput.value; */
        let password = editDoctorPassInput.value;
        let confirm = editDoctorPassConfirmInput.value;
    
        let errorFN = document.getElementById("editDoctorFNError");
        let errorLN = document.getElementById("editDoctorLNError");
        let errorEmail = document.getElementById("editDoctorEmailError");
        let errorClinic = document.getElementById("editDoctorClinicError");
        let errorPass = document.getElementById("editDoctorPassError");
        let errorPassConfirm = document.getElementById("editDoctorPassConfirmError");
    
        validateNameSubmit(firstName, editDoctorFNInput, errorFN);
        validateNameSubmit(lastName, editDoctorLNInput, errorLN);
        validateEmailSubmit(email, editDoctorEmailInput, errorEmail);
        validatePassSubmit(password, editDoctorPassInput, errorPass);
        ConfirmPassSubmit(confirm, editDoctorPassConfirmInput,password, errorPassConfirm);
        validateSelectSubmit(editDoctorClinicInput, errorClinic);
    
        if (!validateNameSubmit(firstName, editDoctorFNInput, errorFN) || !validateNameSubmit(lastName, editDoctorLNInput, errorLN) || !validateEmailSubmit(email, editDoctorEmailInput, errorEmail) || !validatePassSubmit(password, editDoctorPassInput, errorPass) || !ConfirmPassSubmit(confirm, editDoctorPassConfirmInput,password, errorPassConfirm) || !validateSelectSubmit(editDoctorClinicInput, errorClinic)) {
            /* alert("invalid form"); */
        } else {
           /*  alert("done"); */
            document.getElementById('editDoctorForm').submit();
            
        }
    }

});

let addPatientFormBtn = document.getElementById("addPatientFormBtn");
addPatientFormBtn?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");

    }else{
        let firstName= patientFNInput.value;
        let lastName= patientLNInput.value;
        /* let dateOfBirth = patientDOBInput.value; */
        let email = patientEmailInput.value;
        let phone = patientPhoneInput.value;
        let password = patientPassInput.value;
        let confirm = patientPassConfirmInput.value;
    
        let errorFN = document.getElementById("patientFNError");
        let errorLN = document.getElementById("patientLNError");
        let errorDOB = document.getElementById("patientDOBError");
        let errorEmail = document.getElementById("patientEmailError");
        let errorPhone = document.getElementById("patientPhoneError");
        let errorBT = document.getElementById("patientBTError");
        let errorPass = document.getElementById("patientPassError");
        let errorPassConfirm = document.getElementById("patientPassConfirmError");
    
        validateNameSubmit(firstName, patientFNInput, errorFN);
        validateNameSubmit(lastName, patientLNInput, errorLN);
        validateGenderSubmit(patientMaleCheck,patientFemaleCheck);
        validateDOBSubmit(patientDOBInput, errorDOB);
        validateSelectSubmit(patientBloodTypeInput, errorBT);
        if(patientAccountCheck.checked){
            validateEmailSubmit(email, patientEmailInput, errorEmail);
            validatePhoneSubmit(phone, patientPhoneInput, errorPhone);
            validatePassSubmit(password, patientPassInput, errorPass);
            ConfirmPassSubmit(confirm, patientPassConfirmInput,password, errorPassConfirm);
        }
    
        if (!validateNameSubmit(firstName, patientFNInput, errorFN) || !validateNameSubmit(lastName, patientLNInput, errorLN) || !validateGenderSubmit(patientMaleCheck,patientFemaleCheck) || !validateDOBSubmit(patientDOBInput, errorDOB) || !validateSelectSubmit(patientBloodTypeInput, errorBT) 
            || (patientAccountCheck.checked && (
                !validateEmailSubmit(email, patientEmailInput, errorEmail) 
            || !validatePhoneSubmit(phone, patientPhoneInput, errorPhone) 
            || !validatePassSubmit(password, patientPassInput, errorPass) 
            || !ConfirmPassSubmit(confirm, patientPassConfirmInput,password, errorPassConfirm) ))
            ) {
            /* alert("invalid form"); */
        } else {
            /* alert("done"); */
            document.getElementById('addPatientForm').submit();
            
        }
    }

});

let urgentBloodTypeFormBtn = document.getElementById("urgentBloodTypeFormBtn");
urgentBloodTypeFormBtn?.addEventListener("click",  function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");

    }else{
        let bloodType= urgentBTInput.value;
        let number= urgentBTNInput.value;
    
        let errorBT= document.getElementById("urgentBTError");
        let errorBTN = document.getElementById("urgentBTNError");
    
        validateSelectSubmit(urgentBTInput, errorBT);
        validateNumberSubmit(urgentBTNInput, errorBTN);
    
        if (!validateSelectSubmit(urgentBTInput, errorBT) || !validateNumberSubmit(urgentBTNInput, errorBTN)) {
            /* alert("invalid form"); */
        } else {
            /* alert("done"); */
            document.getElementById('urgentBloodTypeForm').submit();
            
        }
    }

});

let adminFormBtn = document.getElementById("adminFormBtn");
adminFormBtn?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");

    }else{
        let name= adminNameInput.value;
        let email = adminEmailInput.value;
        let password = adminPassInput.value;
        let confirm = adminPassConfirmInput.value;
    
        let errorName= document.getElementById("signup-nameError");
        let errorEmail = document.getElementById("signup-emailError");
        let errorPass = document.getElementById("signup-passwordError");
        let errorPassConfirm = document.getElementById("signup-passwordConfirmError");
    
        validateNameSubmit(name, adminNameInput, errorName);
        validateEmailSubmit(email, adminEmailInput, errorEmail);
        validatePassSubmit(password, adminPassInput, errorPass);
        ConfirmPassSubmit(confirm, adminPassConfirmInput,password, errorPassConfirm);
    
        if (!validateNameSubmit(name, adminNameInput, errorName) || !validateEmailSubmit(email, adminEmailInput, errorEmail) || !validatePassSubmit(password, adminPassInput, errorPass) || !ConfirmPassSubmit(confirm, adminPassConfirmInput,password, errorPassConfirm) ) {
            /* alert("invalid form"); */
        } else {
           /*  alert("done"); */
            document.getElementById('adminForm').submit();
            
        }
    }

});

let manageWHFormBtn = document.getElementById("manageWHFormBtn");
manageWHFormBtn?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");

    }else{
        let day= WHDayInput.value;
        let TFrom= WHFromInput.value;
        let TTo= WHTOInput.value;
    
        let errorDay= document.getElementById("WHDayError");
        let errorTFrom= document.getElementById("WHFromError");
        let errorTTo= document.getElementById("WHTOError");
    
        validateSelectSubmit(WHDayInput, errorDay);
        if(!WHClosedCheck.checked){
            validateTimeSubmit(WHFromInput, errorTFrom);
            validateTimeSubmit(WHTOInput, errorTTo);
        }
    
        if (!validateSelectSubmit(WHDayInput, errorDay)  || (!WHClosedCheck.checked && ( !validateTimeSubmit(WHFromInput, errorTFrom) || !validateTimeSubmit(WHTOInput, errorTTo)))) {
            /* alert("invalid form"); */
        } else {
            /* alert("done"); */
            document.getElementById('manageWHForm').submit();
            
        }
    }

});

let manageDWHFormBtn = document.getElementById("manageDWHFormBtn");
manageDWHFormBtn?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");

    }else{
        let docName= docNameInput.value;
    
        let errorDay= document.getElementById("DWHDayError");
        let errorTFrom= document.getElementById("DWHFromError");
        let errorTTo= document.getElementById("DWHTOError");
        let errorName = document.getElementById("docNameError");
    
        validateNameSubmit(docName, docNameInput, errorName);
        validateSelectSubmit(DWHDayInput, errorDay);
        if(!DWHAvailableCheck.checked){
            validateTimeSubmit(DWHFromInput, errorTFrom);
            validateTimeSubmit(DWHTOInput, errorTTo);
        }
    
        if (!validateNameSubmit(docName, docNameInput, errorName) || !validateSelectSubmit(DWHDayInput, errorDay) || (!DWHAvailableCheck.checked && ( !validateTimeSubmit(DWHFromInput, errorTFrom) || !validateTimeSubmit(DWHTOInput, errorTTo)))) {
            /* alert("invalid form"); */
        } else {
            /* alert("done"); */
            document.getElementById('manageDWHForm').submit();
            
        }
    }

});