// Set a default language (e.g., English)
let currentLanguage = 'ar';

// Function to change language
function changeLanguage(language) {
    currentLanguage = language;
    // Re-run validation functions to update error messages
    checkEmailOrPhone();
    validateEmailOrPhone();
    validateSelect();
}
// Function to get language from URL
function getLanguageFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('lang') || 'en'; // Default to English if not found
}

// Initialize currentLanguage based on URL
currentLanguage = getLanguageFromURL();

// Form variable
const contactForm   = document.getElementById('form2');

// Form Input variable
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

// Form Button variable
let sendBtn = document.getElementById("btnSend");

// Functions to validate Inputs
const validateNameStructure = (name) => {
    return name.match(/^[a-zA-Z]{3,}$/);
};

const validateEmailStructure = (email) => {
    return email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/);
};

const validateSubjectStructure = (subject) => {
    return subject.match(/^.{1,}$/);
};

const translations = {
    en: {
      required: "This field is required.",
      error: "Phone or Email",
      namestructure: "Must contain only and at least 3 Letters.",
      emailstructure: "example@hotmail.com",
      subjectStructure: "Subject must be clear.",
      messageStructure: "more characters required. <br> The message must be clear.",

    },
    ar: {
      required: "هذا الحقل مطلوب.",
      error:'الهاتف او بريد إلكتروني',
      namestructure: "يجب أن يحتوي على 3 أحرف فقط.",
      emailstructure: "example@hotmail.com",
      subjectStructure: "يجب أن يكون الموضوع واضحا.",
      messageStructure: "المزيد من الشخصيات المطلوبة. <br> يجب أن تكون الرسالة واضحة.",
    },
};


// Validation on Focusout Event For Empty Input
const checkFirstname = () => {
    if(fname_input.value === ''){
        if(fnameError){
            fnameError.innerHTML   = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations[currentLanguage].required}`;
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
            lnameError.innerHTML   = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations[currentLanguage].required}`;
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
            emailError.innerHTML   = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations[currentLanguage].required}`;
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
            subjectError.innerHTML   = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations[currentLanguage].required}`;
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
            messageError.innerHTML   = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations[currentLanguage].required}`;
            return false;
        }
    }
    else{
        if(messageError){
            return true;
        }
    }
}

// Validation on Input Event For Format
const validateFirstname = () => {
    const fnameValue   = fname_input.value;
    if(!validateNameStructure(fnameValue)){
        if(fnameError){
            fnameError.innerHTML   = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations[currentLanguage].namestructure}`;
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
            lnameError.innerHTML   = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations[currentLanguage].namestructure}`;
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
            emailError.innerHTML   = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations[currentLanguage].emailstructure}`;
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
            subjectError.innerHTML   = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations[currentLanguage].subjectStructure}`;
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
        messageError.innerHTML = left +  `${translations[currentLanguage].messageStructure}`;
        return false;
    }
    else{
        messageError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
        return true;
    }
}

// Add event listeners to input fields
fname_input?.addEventListener('focusout', checkFirstname);
lname_input?.addEventListener('focusout', checkLastname);
email_input?.addEventListener('focusout', checkEmail);
subject_input?.addEventListener('focusout', checkSubject);
message_input?.addEventListener('focusout', checkMessage);
fname_input?.addEventListener('input', validateFirstname);
lname_input?.addEventListener('input', validateLastname);
email_input?.addEventListener('input', validateEmail);
subject_input?.addEventListener('input', validateSubject);
message_input?.addEventListener('input', validateMessage);

// Validates Form 
function validateContactForm(){
    if(checkFirstname() && checkLastname() && checkEmail() && checkSubject() && checkMessage() 
    && validateFirstname() && validateLastname() && validateEmail() && validateSubject() && validateMessage()){
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

sendBtn?.addEventListener('click', (e) =>{
    if(e.target.type == "submit") {
        e.preventDefault();
    }
    else {
        /* validateContactForm(); */
        const valid = validateContactForm();
        console.log(valid);
        if(valid){
            const sendMail = async () => {
                const form = document.getElementById('form2');
                const formData = new FormData(form);
            
                await fetch('functions/sendMail.php', {
                        method: 'POST',
                        body: formData,
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.response == 200) {
                            swal("Thank You!", "Your data has been submitted successfully!", "success");
                            // Clear form inputs
                            form.reset();
                            document.getElementById('fname-error').innerHTML = '';
                            document.getElementById('lname-error').innerHTML = '';
                            document.getElementById('email-error').innerHTML = '';
                            document.getElementById('subject-error').innerHTML='';
                            document.getElementById('message-error').innerHTML='';
            
                        }else if(data.response == 500){
                            swal("Note!", data.message +"!", "warning");
                        }
                        else {
                            swal("Error!", "Failed: " + data.message, "error");
                        }
                        console.log('Success:', data);
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            }
            sendMail();
        }
    }

})