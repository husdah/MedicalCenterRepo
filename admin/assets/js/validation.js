/* function validateForm(event) {
    event.preventDefault();

    const name = document.getElementById('clinicName').value;
    const desc = document.getElementById('DescriptionInput').value;
    const image = document.getElementById('clinicImg').value;

    const nameRegex = /^[a-zA-Z ]+$/;

    if (name === '' || !nameRegex.test(name)) {
        document.getElementById('clinicName').classList.add("required");
    } else if (desc === '' || !nameRegex.test(name)) {
        document.getElementById('DescriptionInput').classList.add("required");
    } else if (image === '') {
        document.getElementById('clinicImg').classList.add("required");
    }
} */

  // Function to validate name
  function validateName(name) {
    // Regular expression for a valid name (letters only)
    var nameRegex = /^[a-zA-Z]+$/;
    return nameRegex.test(name);
  }

  function validateNameSubmit(name,nameInput,errorName) {
    if (name == '' || !validateName(name)) {
        nameInput.classList.add("required");

        if (name == '') {
            errorName.textContent = 'name required'; 
        }else if (!validateName(name)) {
            errorName.textContent = 'Invalid name. Only letters are allowed.'; 
        }

    } else {
        nameInput.classList.remove("required");
        errorName.textContent = 'name'; 
    }
  }

  function validateDescSubmit(name,nameInput,errorName) {
    if (name == '' || !validateName(name) || name.length < 5 || name.length > 50) {
        nameInput.classList.add("required");
        errorName.classList.add("count");
        if (name == '') {
            errorName.textContent = 'description required'; 
        }else if (!validateName(name)) {
            errorName.textContent = 'Invalid description. Only letters are allowed.'; 
        }else if(name.length < 5){
            errorName.textContent = "min length: 5";
        }
        else if(name.length > 50){
            errorElement.textContent = "max length: 50";
        }
    }
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
        }else if (!validateName(inputElement.value)) {
            errorElement.textContent = 'Invalid name. Only letters are allowed.'; 
        }

    } else {
        inputElement.classList.remove("required");
        errorElement.textContent = 'name'; 
    }
  }

  function handleInputDescEvent(event) {
    var inputElement = event.target;
    var errorElementId = inputElement.id + 'Error';
    var errorElement = document.getElementById(errorElementId);

    if (inputElement.value == '' || !validateName(inputElement.value) || inputElement.value.length < 5 || inputElement.value.length >= 50) {
        inputElement.classList.add("required");
        errorElement.classList.add("count");
      
        if (inputElement.value == '') {
            errorElement.textContent = 'description required'; 
        }else if (!validateName(inputElement.value)) {
            errorElement.textContent = 'Invalid description. Only letters are allowed.'; 
        }else if(inputElement.value.length < 5){
            errorElement.textContent = "min length: 5";
        }
        else if(inputElement.value.length >= 50){
            errorElement.textContent = "max length: 50";
        }

    }else if(inputElement.value.length < 50 &&  (inputElement.value.length) > 5){
        errorElement.classList.add("count");
        errorElement.textContent = " counter:" +inputElement.value.length;
    }
     else {
        inputElement.classList.remove("required");
        errorElement.classList.remove("count");
    }

  }

  function validateFile() {
    var fileInput = document.getElementById('clinicImg');
    var errorElement = document.getElementById('clinicImgError');

    if (fileInput.files.length > 0) {
      var allowedTypes = ['image/jpeg', 'image/png'];
      var fileType = fileInput.files[0].type;

      if (allowedTypes.indexOf(fileType) === -1) {
        errorElement.classList.add("count");
        errorElement.textContent = 'Invalid file type. Please choose a valid image file.';
        /* return false; */
      }
    }

/*     errorElement.textContent = ''; // Clear error message
    return true; */
  }

  // Add event listeners to input fields
  var clinicNameInput = document.getElementById('clinicName');
  clinicNameInput.addEventListener('input', handleInputNameEvent);

  var clinicDescInput = document.getElementById('clinicDesc');
  clinicDescInput.addEventListener('input', handleInputDescEvent);

  var clinicImgInput = document.getElementById('clinicImg').value;

/*   let clinicFormBtn = document.getElementById("clinicFormBtn");
clinicFormBtn.addEventListener("click", () =>{
    let name = clinicNameInput.value;
    let desc = clinicDescInput.value;
    let image = clinicImgInput.value;

    let errorName = document.getElementById("clinicNameError");
    let errorDesc = document.getElementById("clinicDescError");

    validateNameSubmit(name,clinicNameInput,errorName);
    validateDescSubmit(desc,clinicDescInput,errorDesc);
    validateFile();
   
}); */


document.getElementById('myForm').addEventListener('submit', function(event) {
    let name = clinicNameInput.value;
    let desc = clinicDescInput.value;
    let image = clinicImgInput.value;

     let errorName = document.getElementById("clinicNameError");
    let errorDesc = document.getElementById("clinicDescError");
    clinicNameInput.classList.add("required");
    errorName.textContent = 'name required'; 
   /* validateNameSubmit(name,clinicNameInput,errorName);
    validateDescSubmit(desc,clinicDescInput,errorDesc);
    validateFile(); */

    // Perform your custom validation here
    if (name == '' || desc == '') {
      // Prevent form submission
      event.preventDefault();
      // Additional actions or error messages can be added here
      clinicNameInput.classList.add("required");
        errorName.textContent = 'name required'; 
    
    } else {
      // Continue with form submission
      // (by default, the form will submit if event.preventDefault() is not called)
    }
  });