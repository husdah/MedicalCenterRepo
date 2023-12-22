//variables for donation section on homepage
const donateForm   = document.getElementById('donateform');

const emailText    = document.getElementById('email');
const errorDisplay = document.getElementById('errorInput');
const bloodType    = document.getElementById('mySelect');

const btn_donate   = document.getElementById('click_donate');

//variables for contact page
const contactForm   = document.getElementById('contactForm');

const fname_input   = document.getElementById('fname');
const fnameError    = document.getElementById('fname-error');
const lname_input   = document.getElementById('lname');
const lnameError    = document.getElementById('lname-error');
const email_input   = document.getElementById('email');
const emailError    = document.getElementById('email-error');
const subject_input = document.getElementById('subject');
const subjectError  = document.getElementById('subject-error');
const message_input = document.getElementById('message');
const messageError  = document.getElementById('message-error');

const btn_sendEmail = document.getElementById('sendEmail');

//variables for user page
const TableData = document.getElementById('patient-app');

const patientForm        = document.getElementById('update-form'); 
const changePasswordForm = document.getElementById('change-password');

const updateFname     = document.getElementById('update-fname');
const updateLname     = document.getElementById('update-lname');
const updateEmail     = document.getElementById('update-email');
const updateDate      = document.getElementById('update-date');
const updatePhone     = document.getElementById('phone2');
const updateGenderF   = document.getElementById('female');
const updateGenderM   = document.getElementById('male');
const updateBloodType = document.getElementById('mySelect');
const currentPass     = document.getElementById('current-pwd');
const newPass         = document.getElementById('new-pwd');
const confirmPass     = document.getElementById('c-pwd');

const btn_update         = document.getElementById('updateBtn');
const btn_changePassword = document.getElementById('changeBtn');


// Function to validate name
const validateNameStructure = (name) => {
    return name.match(/^[a-zA-Z]{3,}$/);
};

// Function to validate email
const validateEmailStructure = (email) => {
    return email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/);
};

// Function to validate subject
const validateSubjectStructure = (subject) => {
    return subject.match(/^.{1,}$/);
};

// Function to handle submit email and phone events
function validateInput(input) {
    var lebanesePhoneRegex = /^\d{8}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (lebanesePhoneRegex.test(input)) {
      return input.match(lebanesePhoneRegex);
    }
    if (emailRegex.test(input)) {
        return input.match(emailRegex);
    }
}

//Validation on Focusout Event For Empty Input
const checkFirstname = () => {
    if(fname_input.value === ''){
        if(fnameError){
            fnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
            return false;
        }
    }
    else{
        if(fnameError){
            return true;
        }
    }
}
const checkLastname = () => {
    if(lname_input.value === ''){
        if(lnameError){
            lnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
            return false;
        }
    }
    else{
        if(lnameError){
            return true;
        }
    }
}
const checkEmail = () => {
    if(email_input.value === ''){
        if(emailError){    
            emailError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
            return false;
        }
    }
    else{
        if(emailError){  
            return true;
        }
    }
}
const checkSubject = () => {
    if(subject_input.value === ''){
        if(subjectError){
            subjectError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
            return false;
        }
    }
    else{
        if(subjectError){
            return true;
        }
    }
}
const checkMessage = () => {
    if(message_input.value === ''){
        if(messageError){
            messageError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
            return false;
        }
    }
    else{
        if(messageError){
            return true;
        }
    }
}
const checkEmail2 = () => {
    if(emailText.value == ''){
        if(errorDisplay){
            errorDisplay.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
            return false;
        }
    }
    else{
        if(errorDisplay){
            return true;
        }
    }
}

//Validation on Input Event For Format
const validateFirstname = () => {
    const fnameValue   = fname_input.value;
    if(!validateNameStructure(fnameValue)){
        if(fnameError){
            fnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Must contain only and at least 3 Letters.';
            return false;
        }
    }
    else{
        if(fnameError){
            fnameError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
            return true;
        }
    }    
}
const validateLastname = () => {
    const lnameValue   = lname_input.value;
    if(!validateNameStructure(lnameValue)){
        if(lnameError){
            lnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Must contain only and at least 3 Letters.';
            return false;
        }
    }
    else{
        if(lnameError){
            lnameError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
            return true;
        }
    }
}
const validateEmail = () => {
    const emailValue   = email_input.value;
    if(!validateEmailStructure(emailValue)){
        if(emailError){
            emailError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> example@hotmail.com';
            return false;
        }
    }
    else{
        if(emailError){
            emailError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
            return true;
        }
    }
}
const validateSubject = () => {
    const subjectValue   = subject_input.value;
    if(!validateSubjectStructure(subjectValue)){
        if(subjectError){
            subjectError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Subject must be clear.';
            return false;
        }
    }
    else{
        if(subjectError){
            subjectError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
            return true;
        }
    }
}
const validateMessage = () => {
    if(message_input.value !== ''){
        messageError.innerHTML   = "";
    }
    const message      = message_input.value;
    const required     = 30;
    const left         = required - message.length;
    messageError.innerHTML = '';
    if(left>0){
        messageError.innerHTML = left + ' more characters required. <br> Please the message must be clear.';
        return false;
    }
    else{
        messageError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }
}
const validateEmail2 = () => {
    if(!validateInput(emailText.value)){
        if(errorDisplay){
            errorDisplay.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Phone or Email';
            return false;
        }
    }
    else{
        if(errorDisplay){
            errorDisplay.innerHTML = '<i class="fa-regular fa-circle-check"></i>'
            return true;
        }
    }
}
const validateSelect = () => {
    var selectedOption = bloodType.options[bloodType.selectedIndex];
    var selectedValue  = selectedOption.value;
    if(selectedValue == 'Blood-Type'){
        bloodType.style.color = 'red';
        return false;
    }
    else{
        bloodType.style.color = '#0051a1';
        return true;
    }
}

// Add event listeners to input fields
fname_input?.addEventListener('focusout', checkFirstname);
lname_input?.addEventListener('focusout', checkLastname);
email_input?.addEventListener('focusout', checkEmail);
subject_input?.addEventListener('focusout', checkSubject);
message_input?.addEventListener('focusout', checkMessage);
emailText?.addEventListener('focusout', checkEmail2);
fname_input?.addEventListener('input', validateFirstname);
lname_input?.addEventListener('input', validateLastname);
email_input?.addEventListener('input', validateEmail);
subject_input?.addEventListener('input', validateSubject);
message_input?.addEventListener('input', validateMessage);
emailText?.addEventListener('input', validateEmail2);
bloodType?.addEventListener('change', validateSelect)


// event lister on Form Buttons
btn_donate?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");
    }else{
        if(!validateSelect() || !checkEmail2() || !validateEmail2()){
            validateSelect();
            checkEmail2();
            //alert("invalid form");
        } else {
            //alert("valid form");
            const addDonation = async() => {
                const data = {
                    email : emailText.value,
                    bloodtype : bloodType.value
                };
                await fetch('functions/donate.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json; charset=UTF-8',
                    },
                    body: JSON.stringify(data),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.response === '100') {
                        swal("Thank You", "But you donated to us.", "success");
                        console.log('message', data);
                    }  
                    else if(data.response === '300') {
                        swal("Thank you", "Your data has been submitted successfully!", "success");
                        donateForm.reset();
                        errorDisplay.innerHTML = "";
                        console.log('message', data);
                    }  
                    else if(data.response === '400') {
                        swal("Error", "All fields must be validated", "error");
                    }  
                    else if(data.response === '500') {
                        swal("Error", "Please fill the fields", "error");
                    }  
                })
                .catch((error) => {
                    console.error('Something went wrong:', error);
                });
            }
            addDonation();
        }
    }
});

btn_sendEmail?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");
    }else{
        if(!checkFirstname() || !checkLastname() || !checkEmail() || !checkSubject() || !checkMessage() || !validateFirstname() || !validateLastname() || !validateEmail() || !validateSubject() || !validateMessage()){
            checkFirstname();
            checkLastname();
            checkEmail();
            checkSubject();
            checkMessage();
            //alert("invalid form");
        } else {
            const sendEmail = async() => {
                const data = {
                    firstName : fname_input.value,
                    lastName : lname_input.value,
                    email: email_input.value,
                    subject: subject_input.value,
                    message: message_input.value
                };
                await fetch('functions/sendEmail.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json; charset=UTF-8',
                    },
                    body: JSON.stringify(data),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.response === '200') {
                        swal("Error", "Please fill the fields", "error");
                        console.log('message', data);
                    }  
                    else if(data.response === '300') {
                        swal("Error", "All fields must be validated", "error");
                        console.log('message', data);
                    }  
                    else if(data.response === '100') {
                        swal("Thank you", "Your data has been submitted successfully!", "success");
                        /*contactForm.reset();
                        fnameError.innerHTML   = "";
                        lnameError.innerHTML   = ""; 
                        emailError.innerHTML   = "";
                        subjectError.innerHTML = ""; 
                        messageError.innerHTML = ""; */
                        console.log('message', data);
                    }   
                })
                .catch((error) => {
                    console.error('Something went wrong:', error);
                });
            }
            sendEmail();
        }
    }
});








/*
const getPatientApp = async() => {
    const res = await fetch('././getPatientData.php');
    const received_data = await res.json();
    TableData.innerHTML = "";
    console.log('App records:',received_data);
    received_data.forEach(user => {
        TableData.innerHTML += `<tr>
                                    <td>${user.doctor}</td>
                                    <td>${user.date}</td>
                                    <td>${user.time}</td>
                                    <td><button id="cancel-btn" onclick ='del(${user.id})'>Cancel</button></td>
                                </tr>`

    });
}

function del(id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            fetch('././deleteAppointmentByPatient.php', {
                method: 'POST',
                body: JSON.stringify({
                    id: id
                }),
                headers: {
                    'Content-type': 'application/json, charset=UTF-8'
                }
            })
            .then((response) => response.json())
            .then((data) => {
                if(data.response == 200){
                    swal("Deleted", "Your appointment deleted successfully.", "success");
                }
                else if(data.response == 500){
                    swal("Error!", "could not delete from database.", "error");
                } 
                getPatientApp();
            })
        }
    });
}

const getPatientProfile = async() => {
    const response      = await fetch('././getPatientInfo.php');
    const res = await response.json();
    console.log('patient info record:', res);
    if (res.length > 0) {
        res.forEach( patient => {
            updateFname.value = patient.firstName;
            updateLname.value = patient.lastName;
            updateEmail.value = patient.email;
            updateDate.value  = patient.date;
            updatePhone.value= patient.phoneNumber;
            if (patient.gender === "male") {
                updateGenderM.checked = true;
            } else {
                updateGenderF.checked = true;
            }
            updateBloodType.value = patient.bloodType;
        });
    } else {
        console.log('No patient data received.');
    }
}

document.addEventListener("DOMContentLoaded", function() {
    getPatientApp();
    getPatientProfile();
});

const updatePatient = () => {
    //alert('update Btn');
    const genderRadio = document.querySelector('input[name="gender"]:checked');
    const updateGender = genderRadio ? genderRadio.value : null;

    const requestBody = {
        updateFname: updateFname.value,
        updateLname: updateLname.value,
        updateEmail: updateEmail.value,
        updatePhone: updatePhone.value,
        updateDate: updateDate.value,
        updateGender: updateGender,
        updateBloodType: updateBloodType.value
    };
    fetch('././updatePatientInfo.php', {
        method: 'POST',
        body: JSON.stringify(requestBody),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    })
    .then((response) => response.json())
    .then((data) => {
        if(data.response == 200){
            swal("Error!", "All fields are required.", "error");
        }
        else if(data.response == 500){
            swal("Updated!", "Your informations are updated successfully.", "success");
            passwordForm.reset();
        }
    })
    .catch(error => {
        console.error('Something went wrong:', error);
    })
    //patientForm.reset();
}

const changePassword = () => {
    //alert('change Btn');
    fetch('././changePatientPassword.php', {
        method: 'POST',
        body: JSON.stringify({
            currentPassword: currentPass.value,
            newPassword: newPass.value,
            confirmPassword: confirmPass.value
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    })
    .then((response) => response.json())
    .then((data) => {
        if(data.response == 200){
            swal("Error!", "All fields are required.", "error");
        }
        else if(data.response == 300){
            swal("Error!", "All fields must be validated.", "error");
        }
        else if(data.response == 400){
            swal("Error!", "New password and confirm password do not match.", "error");
        }
        else if(data.response == 500){
            swal("Updated!", "Password updated successfully.", "success");
            passwordForm.reset();
        }
        else if(data.response == 600){
            swal("Error!", "Please enter the old password correct.", "error");
        }
    })
    .catch(error => {
        console.error('Something went wrong:', error);
    })
}*/