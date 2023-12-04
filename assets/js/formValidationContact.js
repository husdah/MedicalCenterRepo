const form  = document.getElementById('form2');

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

const btnsend       = document.getElementById('btnSend');
var errorDisplayed = false;

form?.addEventListener('submit', e => { 
    e.preventDefault();
    validateForm();
});

function validateForm(){
    if(checkFirstname() && checkLastname() && checkEmail() && checkSubject() && checkMessage() && validateFirstname() && validateLastname() && validateEmail() && validateSubject() && validateMessage()){
        alert('Submit Done');
    }
    else{
        checkFirstname();
        checkLastname();
        checkEmail();
        checkSubject();
        checkMessage();
        
    }
}


// Function to validate name
const validateNameStructure = (name) => {
    return name.match(/^[a-zA-Z]{3,}$/);
};

// Function to validate email
const validateEmailStructure = (email) => {
    return email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
};

// Function to validate subject
const validateSubjectStructure = (subject) => {
    return subject.match(/^.{1,}$/);
};


//Validation on Focusout Event For Empty Input
const checkFirstname = () => {
    if(fname_input.value === ''){
        fnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
fname_input?.addEventListener('focusout', checkFirstname);

const checkLastname = () => {
    if(lname_input.value === ''){
        lnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
lname_input?.addEventListener('focusout', checkLastname);

const checkEmail = () => {
    if(email_input.value === ''){
        emailError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
email_input?.addEventListener('focusout', checkEmail);

const checkSubject = () => {
    if(subject_input.value === ''){
        subjectError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
subject_input?.addEventListener('focusout', checkSubject);

const checkMessage = () => {
    if(message_input.value === ''){
        messageError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
message_input?.addEventListener('focusout', checkMessage);

//Validation on Input Event For Format
const validateFirstname = () => {
    const fnameValue   = fname_input.value;
    if(!validateNameStructure(fnameValue)){
        fnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Must contain only and at least 3 Letters.';
        return false;
    }
    else{
        fnameError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }    
}
fname_input?.addEventListener('input', validateFirstname);

const validateLastname = () => {
    const lnameValue   = lname_input.value;
    if(!validateNameStructure(lnameValue)){
        lnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Must contain only and at least 3 Letters.';
        return false;
    }
    else{
        lnameError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }
}
lname_input?.addEventListener('input', validateLastname);

const validateEmail = () => {
    const emailValue   = email_input.value;
    if(!validateEmailStructure(emailValue)){
        emailError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Exapmle: example@hotmail.com';
        return false;
    }
    else{
        emailError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }
}
email_input?.addEventListener('input', validateEmail);

const validateSubject = () => {
    const subjectValue   = subject_input.value;
    if(!validateSubjectStructure(subjectValue)){
        subjectError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Subject must be clear.';
        return false;
    }
    else{
        subjectError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }
}
subject_input?.addEventListener('input', validateSubject);

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
message_input?.addEventListener('input', validateMessage);
