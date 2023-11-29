// Function to validate name
function validateName(name) {
    /* var nameRegex = /^[a-zA-Z]+$/; */
    var nameRegex = /^[a-zA-Z\s]+$/;
    return nameRegex.test(name);
}

// Function to handle submit events
function validateNameSubmit(name, nameInput, errorName) {
    if (name == '' || !validateName(name)) {
        nameInput.classList.add("required");

        if (name == '') {
            errorName.textContent = 'name required';
            return false;
        } else if (!validateName(name)) {
            errorName.textContent = 'Invalid name. Only letters are allowed.';
            return false;
        }
    }
    return true;
}

// Function to handle submit events
function validateDescSubmit(name, nameInput, errorName) {
    if (name == '' || !validateName(name) || name.length < 5 || name.length > 50) {
        nameInput.classList.add("required");
        errorName.classList.add("count");
        if (name == '') {
            errorName.textContent = 'description required';
            return false;
        } else if (!validateName(name)) {
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

// Function to validate file
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

// Function to handle input events
function handleInputNameEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '' || !validateName(inputElement.value)) {
        inputElement.classList.add("required");

        if (inputElement.value == '') {
            errorElement.textContent = 'name required';
        } else if (!validateName(inputElement.value)) {
            errorElement.textContent = 'Invalid name. Only letters are allowed.';
        }

    } else {
        inputElement.classList.remove("required");
        errorElement.textContent = 'name';
    }
}

// Function to handle input events
function handleInputDescEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '' || !validateName(inputElement.value) || inputElement.value.length < 5 || inputElement.value.length >= 50) {
        inputElement.classList.add("required");
        errorElement.classList.add("count");

        if (inputElement.value == '') {
            errorElement.textContent = 'description required';
        } else if (!validateName(inputElement.value)) {
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

// Add event listeners to input fields
//add clinic form
var clinicNameInput = document.getElementById('clinicName');
clinicNameInput.addEventListener('input', handleInputNameEvent);

var clinicDescInput = document.getElementById('clinicDesc');
clinicDescInput.addEventListener('input', handleInputDescEvent);

var clinicImgInput = document.getElementById('clinicImg');
var errorImg = document.getElementById('clinicImgError');
clinicImgInput.addEventListener("change", validateFile);

//edit clinic form
var editClinicNameInput = document.getElementById('editClinicName');
editClinicNameInput.addEventListener('input', handleInputNameEvent);

var editClinicDescInput = document.getElementById('editClinicDesc');
editClinicDescInput.addEventListener('input', handleInputDescEvent);

var editClinicImgInput = document.getElementById('editClinicImg');
var errorImg = document.getElementById('editClinicImgError');
editClinicImgInput.addEventListener("change", validateFileEdit);


// event lister on Form Buttons
let addClinicFormBtn = document.getElementById("addClinicFormBtn");
addClinicFormBtn.addEventListener("click", () => {
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

});

let editClinicFormBtn = document.getElementById("editClinicFormBtn");
editClinicFormBtn.addEventListener("click", () => {
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

});