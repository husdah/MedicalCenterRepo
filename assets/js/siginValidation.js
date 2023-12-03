//Form Variables

const signinForm = document.getElementById('sign-in');
const signupForm = document.getElementById('sign-up');
const updateForm = document.getElementById('update-form');
const passwordForm = document.getElementById('change-password');

//Input Variables

const fnameInput = document.getElementById('First-Name');
const lnameInput = document.getElementById('Last-Name');
const emailInput1 = document.getElementById('email');
const pwdInput1 = document.getElementById('password');
const emailInput2 = document.getElementById('email2');
const pwdInput2 = document.getElementById('pwd2');
const dateInput = document.getElementById('date');
const phoneInput = document.getElementById('phone');
const confirmInput = document.getElementById('confirm-pwd');
const updateFname = document.getElementById('update-fname');
const updateLname = document.getElementById('update-lname');
const updateEmail = document.getElementById('update-email');
const updateDate = document.getElementById('update-date');
const currentPasswordInput = document.getElementById('current-pwd');
const newPasswordInput = document.getElementById('new-pwd');
const cPasswordInput = document.getElementById('c-pwd');

//Message Variables
const emailMsg1 = document.getElementById('emailMsg');
const pwdMsg1 = document.getElementById('pwdMsg');
const emailMsg2 = document.getElementById('emailMsg2');
const pwdMsg2 = document.getElementById('pwdMsg2');
const nameMsg = document.getElementById('name');
const nameMsg2 = document.getElementById('name2');
const infoMsg = document.getElementById('infoMsg');
const phoneMsg = document.getElementById('pMsg');
const confirmMsg = document.getElementById('confirmMsg');
const firstMsg = document.getElementById('firstmsg');
const lastMsg = document.getElementById('lastmsg');
const emailMessage = document.getElementById('emailMessage');
const dateMessage = document.getElementById('dateMessage');
const currentMsg = document.getElementById('currentmsg');
const newMsg = document.getElementById('newmsg');
const cMsg = document.getElementById('cmsg');

//Buttons
const signinBtn = document.getElementById('signin-btn');
const signupBtn = document.getElementById('signup-btn');

//Forms Validation Functions
signinForm?.addEventListener('submit', (e) => { 
    //prevents the default form submission behavior 
    e.preventDefault();
    validateSigninForm();
});

signupForm?.addEventListener('submit', (e) => { 
    //prevents the default form submission behavior 
    e.preventDefault();
    validateSignupForm();
});

updateForm?.addEventListener('submit', (e) => { 
    //prevents the default form submission behavior 
    e.preventDefault();
    validateUpdateForm();
});

passwordForm?.addEventListener('submit', (e) => { 
    //prevents the default form submission behavior 
    e.preventDefault();
    validatePasswordForm();
});

//Check if the Email is Empty
function isEmailEmpty(emailInput,emailMsg){
    email = emailInput.value;
    if(email === ""){
        emailMsg.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required';
        return false;
    }else{
        return true;
    }
}

emailInput1?.addEventListener('focusout', function(){
    isEmailEmpty(emailInput1,emailMsg1);
});
emailInput2?.addEventListener('focusout',function(){
    isEmailEmpty(emailInput2,emailMsg2);
});
updateEmail?.addEventListener('focusout', function(){
    isEmailEmpty(updateEmail,emailMessage);
});

//Email Structure Validation

function validateEmail(emailInput,emailMsg){
    const email = emailInput.value;
    if(!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)){
        emailMsg.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Invalid Email';
        return false;
    }
    emailMsg.innerHTML = '';
    return true;
}

emailInput1?.addEventListener('input', function(){
    validateEmail(emailInput1,emailMsg1);
});
emailInput2?.addEventListener('input',function(){
    validateEmail(emailInput2,emailMsg2);
});
updateEmail?.addEventListener('input', function(){
    validateEmail(updateEmail,emailMessage);
});


//Check if the Password is Empty

function isPasswordEmpty(pwdInput,pwdMsg){
    const pwd = pwdInput.value;
    if(pwd === ""){
        pwdMsg.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required';
        return false;
    }else{
        return true;
    }
}

pwdInput1?.addEventListener('input',function(){
    const pwd = pwdInput1.value;
    if(pwd === ""){
        pwdMsg1.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required';
        return false;
    }else{
        pwdMsg1.innerHTML = '';
        return true;
    }
});
pwdInput2?.addEventListener('focusout',function(){
    isPasswordEmpty(pwdInput2,pwdMsg2);
});
confirmInput?.addEventListener('focusout',function(){
    isPasswordEmpty(confirmInput,confirmMsg);
});
currentPasswordInput?.addEventListener('input',function(){
    const pwd = currentPasswordInput.value;
    if(pwd === ""){
        currentMsg.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required';
        return false;
    }else{
        currentMsg.innerHTML = '';
        return true;
    }
});
newPasswordInput?.addEventListener('focusout',function(){
    isPasswordEmpty(newPasswordInput,newMsg);
});
cPasswordInput?.addEventListener('focusout',function(){
    isPasswordEmpty(cPasswordInput,cMsg);
});


//Password Structure Validation

function validatePwd(pwdInput,pwdMsg){
    const pwd = pwdInput.value;
    if(!pwd.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/)){
        pwdMsg.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, and one digit.';
        return false;
    }
    pwdMsg.innerHTML = '';
    return true;
}

/*pwdInput1?.addEventListener('input',function(){
    validatePwd(pwdInput1,pwdMsg1);
});*/
pwdInput2?.addEventListener('input',function(){
    validatePwd(pwdInput2,pwdMsg2);
});
/*confirmInput?.addEventListener('input',function(){
    validatePwd(confirmInput,confirmMsg);
});*/
/*currentPasswordInput?.addEventListener('input',function(){
    validatePwd(currentPasswordInput,currentMsg);
});*/
newPasswordInput?.addEventListener('input',function(){
    validatePwd(newPasswordInput,newMsg);
});
/*cPasswordInput?.addEventListener('input',function(){
    validatePwd(cPasswordInput,cMsg);
});*/

// Compare Password and Confirm password

function comparePasswords(firstPasswordInput,SecondPasswordInput,secondMsg){
    const firstPassword = firstPasswordInput.value;
    const secondPassword = SecondPasswordInput.value;

    if(firstPassword !== secondPassword){
        secondMsg.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password Confirmation is Incorrect.'
        return false;
    }else{
        secondMsg.innerHTML = '';
        return true;
    }
}

confirmInput?.addEventListener('input',function(){
    comparePasswords(pwdInput2,confirmInput,confirmMsg);
});
cPasswordInput?.addEventListener('input',function(){
    comparePasswords(newPasswordInput,cPasswordInput,cMsg);
});


//Check if the Name is Empty

function isNameEmpty(nameInput,nameMessage){
    const name = nameInput.value;
    if(name === ''){
        nameMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required';
        return false;
    }else{
        return true;
    }
}

fnameInput?.addEventListener('focusout',function(){
    isNameEmpty(fnameInput,nameMsg);
});
lnameInput?.addEventListener('focusout',function(){
    isNameEmpty(lnameInput,nameMsg2);
});
updateFname?.addEventListener('focusout',function(){
    isNameEmpty(updateFname,firstMsg);
});
updateLname?.addEventListener('focusout',function(){
    isNameEmpty(updateLname,lastMsg);
});

//Name Structure Validation

function validateName(nameInput,nameMessage){
    const name = nameInput.value;
    
    if(!name.match(/^[a-zA-Z]+$/) || name.length<=3){
        nameMessage.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Must contain only and at least 3 letters.';
        return false;
    }
    nameMessage.innerHTML = '';
    return true;
}

fnameInput?.addEventListener('input',function(){
    validateName(fnameInput,nameMsg);
});
lnameInput?.addEventListener('input',function(){
    validateName(lnameInput,nameMsg2);
});
updateFname?.addEventListener('input',function(){
    validateName(updateFname,firstMsg);
});
updateLname?.addEventListener('input',function(){
    validateName(updateLname,lastMsg);
});

//Phone Structure Validation

function validatePhone(phone,msg){
    const nb = phone.value;
    if(nb.length != 8){
        msg.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Phone number should be 8 characters';
        return false;
    }
    msg.innerHTML = '';
    return true;
}

phoneInput?.addEventListener('input',function(){
    validatePhone(phoneInput,phoneMsg);
});
phoneInput?.addEventListener('input',function(){
    if(phoneInput.value.length == 0){
        phoneMsg.innerHTML = '';
        return true;
    }
})

//Check if Gender and Date are Empty
var genderInputs = document.getElementsByName('gender');
const genderMsg = document.getElementById('radioMsg');

function isEmpty(radioInputs,msg){
    var genderSelected = false;

    for (var i = 0; i < radioInputs.length; i++) {
        if (radioInputs[i].checked) {
            genderSelected = true;
            break;
        }
    }
    if(!genderSelected){
        msg.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required';
        return false;
    }else{
        msg.innerHTML = '';
        return true;
    }
}

//genderInputs?.addEventListener('focusout',isEmpty(genderInputs,genderMsg));

//Check if date is empty

function isDateEmpty(datesInput,msg){
    const date = datesInput.value;
    if(date === ''){
        msg.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required';
        return false;
    }else{
        msg.innerHTML = '';
        return true;
    }
}

updateDate?.addEventListener('focusout',function(){
    isDateEmpty(updateDate,dateMessage);
});
dateInput?.addEventListener('input', function(){
    isDateEmpty(dateInput,infoMsg);
});

function validateSigninForm(){
    
    if(isEmailEmpty(emailInput1,emailMsg1) && isPasswordEmpty(pwdInput1,pwdMsg1) && validateEmail(emailInput1,emailMsg1)){
        alert('Submitted Successfully');
        signinForm.submit();
    }else{
        isEmailEmpty(emailInput1,emailMsg1);
        isPasswordEmpty(pwdInput1,pwdMsg1);
    }
    
}

function validateSignupForm(){
    
    if(validateEmail(emailInput2,emailMsg2) && validatePwd(pwdInput2,pwdMsg2) && validateName(lnameInput,nameMsg2) && validateName(fnameInput,nameMsg)
     && isEmailEmpty(emailInput2,emailMsg2) && isPasswordEmpty(pwdInput2,pwdMsg2) && isPasswordEmpty(confirmInput,confirmMsg) && isNameEmpty(lnameInput,nameMsg2)
     && isNameEmpty(fnameInput,nameMsg) && isEmpty(genderInputs,genderMsg) && comparePasswords(pwdInput2,confirmInput,confirmMsg)
     && isDateEmpty(dateInput,infoMsg)){

        alert('Submitted Successfully!');
        signupForm.submit();
    }else{
        isEmailEmpty(emailInput2,emailMsg2);
        isPasswordEmpty(pwdInput2,pwdMsg2);
        isPasswordEmpty(confirmInput,confirmMsg);
        isNameEmpty(lnameInput,nameMsg2);
        isNameEmpty(fnameInput,nameMsg);
        isEmpty(genderInputs,genderMsg);
        isDateEmpty(dateInput,infoMsg);
    }
}

function validateUpdateForm(){

    if(validateEmail(updateEmail,emailMessage) && isEmailEmpty(updateEmail,emailMessage) && validateName(updateFname,firstMsg)
    && validateName(updateLname,lastMsg) && isNameEmpty(updateFname,firstMsg) && isNameEmpty(updateLname,lastMsg) && isDateEmpty(updateDate,dateMessage)){
        
        alert('Submitted Successfully!');
        updateForm.submit();
    }else{
        isEmailEmpty(updateEmail,emailMessage);
        isNameEmpty(updateFname,firstMsg);
        isNameEmpty(updateLname,lastMsg);
        isDateEmpty(updateDate,dateMessage);
    }
}

function validatePasswordForm(){
    if(isPasswordEmpty(currentPasswordInput,currentMsg) && isPasswordEmpty(newPasswordInput,newMsg) && isPasswordEmpty(cPasswordInput,cMsg)
     && validatePwd(newPasswordInput,newMsg) && comparePasswords(newPasswordInput,cPasswordInput,cMsg)){

        alert('Submitted successfully!');
        passwordForm.submit();
    }else{
        isPasswordEmpty(currentPasswordInput,currentMsg);
        isPasswordEmpty(newPasswordInput,newMsg);
        isPasswordEmpty(cPasswordInput,cMsg);
    }
}