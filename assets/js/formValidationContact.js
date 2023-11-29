const form          = document.getElementById('form2');

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

form.addEventListener('submit', e => { 
    e.preventDefault();
    validateForm();
});

    /*if(fnameValue === '' && lnameValue === '' && emailValue === '' && subjectValue === '' && messageValue === ''){
        fnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your First Name.';
        lnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your Last Name.';
        emailError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your Email.';
        subjectError.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your Subject.';
        messageError.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your Message.';
    }*/
function validateForm(){
    const fnameValue   = fname_input.value;
    const lnameValue   = lname_input.value;
    const emailValue   = email_input.value;
    const subjectValue = subject_input.value;
    const messageValue = message_input.value;
    const message = '';

        if(fnameValue === ''){
            fnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your First Name.';
            
        }
        else{
            if(validateFirstname){
                const message = 'true';
            }
        }
        if(lnameValue === ''){
            lnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your Last Name.';
        }
        if(emailValue === ''){
            emailError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your Email.';
        }
        if(subjectValue === ''){
             subjectError.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your Subject.';
        }
        if(messageValue === ''){
            messageError.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Please Enter Your Message.';
        }
    /*if(fnameValue === '' && lnameValue === '' && emailValue === '' && subjectValue === '' && messageValue === ''){
    }
    else if(fnameValue === '' || lnameValue === '' || emailValue === '' || subjectValue === '' || messageValue === ''){
            alert('Fill the empty field(s).');
    }*/
    /*else if(fnameValue != '' || lnameValue != '' || emailValue != '' || subjectValue != '' || messageValue != '') {
            if(validateFirstname() || validateLastname() || validateEmail() || validateSubject() || validateMessage()){
                alert('Successfully Submitted');
            }
    }*/
}
const validateNameStructure = (name) => {
    return name.match(/^[a-zA-Z]{3,}$/);
};
const validateEmailStructure = (email) => {
    return email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
};
const validateSubjectStructure = (subject) => {
    return subject.match(/^.{1,}$/);
};

const checkFirstname = () => {
    if(fname_input.value !== ''){
        fnameError.innerHTML   = "";
    }
}
fname_input.addEventListener('input', checkFirstname);

const checkLastname = () => {
    if(lname_input.value !== ''){
        lnameError.innerHTML   = "";
    }
}
lname_input.addEventListener('input', checkLastname);

const checkEmail = () => {
    if(email_input.value !== ''){
        emailError.innerHTML   = "";
    }
}
email_input.addEventListener('input', checkEmail);

const checkSubject = () => {
    if(subject_input.value !== ''){
        subjectError.innerHTML   = "";
    }
}
subject_input.addEventListener('input', checkSubject);

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
message_input.addEventListener('input', validateMessage);

const validateFirstname = () => {
    const fnameValue   = fname_input.value;
    if(!validateNameStructure(fnameValue)){
        fnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> The name must be at least 3 letters.';
        return false;
    }
    else{
        fnameError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }
}
fname_input.addEventListener('focusout', validateFirstname);

const validateLastname = () => {
    const lnameValue   = lname_input.value;
    if(!validateNameStructure(lnameValue)){
        lnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> The name must be at least 3 letters.';
        return false;
    }
    else{
        lnameError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }
}
lname_input.addEventListener('focusout', validateLastname);

const validateEmail = () => {
    const emailValue   = email_input.value;
    if(!validateEmailStructure(emailValue)){
        emailError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> Email must have such a structure: example@hotmail.com';
        return false;
    }
    else{
        emailError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }
}
email_input.addEventListener('focusout', validateEmail);

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
subject_input.addEventListener('focusout', validateSubject);