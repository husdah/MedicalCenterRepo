const form          = document.getElementById('form2');
const  nameError    = document.getElementById('name-error');
const  emailError   = document.getElementById('email-error');
const  subjectError = document.getElementById('subject-error');
const  messageError = document.getElementById('message-error');



form.addEventListener('submit', e => { 
    //prevents the default form submission behavior 
    e.preventDefault();
    validateForm();
});

const name_input    = document.getElementById('name');
const email_input   = document.getElementById('email');
const subject_input = document.getElementById('subject');
const message_input = document.getElementById('message');
const btnsend       = document.getElementById('btnSend');

name_input.addEventListener('input',validateName);
email_input.addEventListener('keyup', validateEmail);
message_input.addEventListener('keyup', validateMessage);
subject_input.addEventListener('keyup', validateSubject);



function validateName(){
    const name = name_input.value;
    if(name.length == 0){
        nameError.innerHTML = 'Name is required';
        return false;
    }
    if(!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)){
        nameError.innerHTML = 'Please, Enter Your Full Name';
        return false;
    }
    nameError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
}
function validateEmail(){
    const email = email_input.value;
    if(email.length == 0){
        emailError.innerHTML = 'Email is required';
        return false;
    }
    if(!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)){
        emailError.innerHTML = 'Email Invalid';
        return false;
    }
    emailError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
}
function validateSubject(){
    const subject = subject_input.value;
    if(subject.length == 0){
        subjectError.innerHTML = 'Name is required';
        return false;
    }
    if(!subject.match(/^[A-Za-z]+$/)){
        emailError.innerHTML = 'Email Invalid';
        return false;
    }
    subjectError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
}
function validateMessage(){
    const message = message_input.value;
    const required = 30;
    const left = required - message.length;

    if(left>0){
        messageError.innerHTML = left + ' more characters required';
        return false;
    }
    messageError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
}

function validateForm(){
    const name    = name_input.value;
    const email   = email_input.value;
    const subject = subject_input.value;
    const message = message_input.value;
    var errorMessage = "";

    /*if(name == 0 || email == 0 || subject == 0 || message == 0){
        errorMessage += "Please Fill the form";
    }
    else */if(name == 0){
        errorMessage += "Please enter your name.";
    }
    else if(!validateName()){
        errorMessage += "Invalid Name Format.";
    }
    else if(email == 0){
        errorMessage += "Please enter your email.";
    }
    else if(!validateEmail()){
        errorMessage += "Invalid Email Format.";
    }
    else if(subject == 0){
        errorMessage += "Please enter your subject.";
    }
    else if(!validateSubject()){
        errorMessage += "Invalid Subject Format.";
    }
    else if(message == 0){
        errorMessage += "Please enter your message.";
    }
    else if(!validateMessage()){
        errorMessage += "Invalid Message Format.";
    }


    if (errorMessage !== "") {
        alert(errorMessage);
    } 
    else{
        // Both fields are filled, you can proceed with further actions (e.g., form submission)
        alert("Form submitted successfully!");
    }
}