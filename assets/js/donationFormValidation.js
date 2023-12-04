var emailText    = document.getElementById('email');
var errorDisplay = document.getElementById('errorInput');
var btn_send     = document.getElementById('click_donate');

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
const checkEmail2 = () => {
    if(emailText.value == ''){
        errorDisplay.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> This field is required*';
        return false;
    }
    else{
        return true;
    }
}
emailText?.addEventListener('focusout', checkEmail2);

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
emailText?.addEventListener('input', validateEmail2);

var bloodType = document.getElementById('mySelect');
const validateSelect = () => {
    var selectedOption = bloodType.options[bloodType.selectedIndex];
    console.log(selectedOption);
    var selectedValue  = selectedOption.value;
    console.log(selectedValue);
    if(selectedValue == 'Blood-Type'){
        bloodType.style.color = 'red';
        return false;
    }
    else{
        bloodType.style.color = '#0051a1';
        return true;
    }
}
bloodType?.addEventListener('change', validateSelect)

const clickDonate = () => {
    
    if(validateSelect() && checkEmail2() && validateEmail2()){
        alert('Submit');
    }
    else{
        validateSelect();
        checkEmail2();
        //alert('something wrong');
    }

}
btn_send?.addEventListener('click', clickDonate);