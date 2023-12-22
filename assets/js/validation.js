//variables for contact page
const contactForm   = document.getElementById('form2');
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

//variables for donation section on homepage
var donateForm   = document.getElementById('donateform');
var emailText    = document.getElementById('email');
var errorDisplay = document.getElementById('errorInput');
var bloodType    = document.getElementById('mySelect');
var btn_send     = document.getElementById('click_donate');


//Forms Validation Functions
contactForm?.addEventListener('submit', (e) => { 
    //prevents the default form submission behavior 
    const isValid = validateContactForm();

    // If validation fails, prevent the default form submission
    if (!isValid) {
        e.preventDefault();
    }
});
donateForm?.addEventListener('submit', (e) => { 
    //prevents the default form submission behavior 
    const isValid = validateDonateForm();

    // If validation fails, prevent the default form submission
    if (!isValid) {
        e.preventDefault();
    }
});

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
        fnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
const checkLastname = () => {
    if(lname_input.value === ''){
        lnameError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
const checkEmail = () => {
    if(email_input.value === ''){
        emailError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
const checkSubject = () => {
    if(subject_input.value === ''){
        subjectError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
const checkMessage = () => {
    if(message_input.value === ''){
        messageError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
const checkEmail2 = () => {
    if(emailText.value == ''){
        errorDisplay.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}

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
const validateEmail = () => {
    const emailValue   = email_input.value;
    if(!validateEmailStructure(emailValue)){
        emailError.innerHTML   = '<i class="fa-solid fa-triangle-exclamation"></i> example@hotmail.com';
        return false;
    }
    else{
        emailError.innerHTML   = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }
}
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
        errorDisplay.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Phone or Email';
        return false;
    }
    else{
        errorDisplay.innerHTML = '<i class="fa-regular fa-circle-check"></i>'
        return true;
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


//validates Form 
function validateContactForm(){
    if(checkFirstname() && checkLastname() && checkEmail() && checkSubject() && checkMessage() && validateFirstname() && validateLastname() && validateEmail() && validateSubject() && validateMessage()){
        //alert('Submit Done');
        console.log('Submit Successfully');
        return true;
    }
    else{
        checkFirstname();
        checkLastname();
        checkEmail();
        checkSubject();
        checkMessage();
        //alert('something wrong'); 
        console.log('something wrong');
        return false;
    }
}
function validateDonateForm(){
    if(validateSelect() && checkEmail2() && validateEmail2()){
        //alert('Submit Done');
        console.log('Submit Successfully');
        return true;
    }
    else{
        validateSelect();
        checkEmail2();
        //alert('something wrong'); 
        console.log('something wrong');
        return false;
    }
}




