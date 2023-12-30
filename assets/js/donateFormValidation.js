// Form variable
const donateForm   = document.getElementById('donateform');

// Form Input variable
const emailText    = document.getElementById('email');
const errorDisplay = document.getElementById('errorInput');
const bloodType    = document.getElementById('mySelect');

// Form Button variable
const btn_donate   = document.getElementById('click_donate');

// Function to handle submit email and phone events
function validateInput(input) {
    var lebanesePhoneRegex = /^(03|71|70|76|78|79|81)\d{6}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (lebanesePhoneRegex.test(input)) {
      return input.match(lebanesePhoneRegex);
    }
    if (emailRegex.test(input)) {
        return input.match(emailRegex);
    }
}

const translations2 = {
    en: {
      required: "This field is required.",
      error: "Phone or Email",
      success: "Your data has been submitted successfully!",
      success1: "But you donated to us.",
      thank: "Thank you",
      failed: "Error!",
    },
    ar: {
      required: "هذا الحقل مطلوب.",
      error:'الهاتف او بريد إلكتروني',
      success: "لقد تم حفظ بياناتك بنجاح!",
      success1: "لكنك تبرعت لنا.",
      thank: "شكرًا لك",
      failed: "خطأ!",
    },
};

//Validation on Focusout Event For Empty Input
const checkEmailOrPhone = () => {
    if(emailText.value == ''){
        if(errorDisplay){
            errorDisplay.innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations2[currentLanguage].required}`;
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
const validateEmailOrPhone = () => {
    if(!validateInput(emailText.value)){
        if(errorDisplay){
            errorDisplay.innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i> ${translations2[currentLanguage].error}`;
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
emailText?.addEventListener('focusout', checkEmailOrPhone);
emailText?.addEventListener('input', validateEmailOrPhone);
bloodType?.addEventListener('change', validateSelect);

// Click button
btn_donate?.addEventListener("click", function(event) {
    if (event.target.type === 'submit') {
        event.preventDefault();
        alert("stop submit");
    } else {
        if(!validateSelect() || !checkEmailOrPhone() || !validateEmailOrPhone()){
            validateSelect();
            checkEmailOrPhone();
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
                        swal(`${translations2[currentLanguage].thank}`, `${translations2[currentLanguage].success1}`, "success");
                        console.log('message', data);
                    }  
                    else if(data.response === '300') {
                        swal(`${translations2[currentLanguage].thank}`, `${translations2[currentLanguage].success}`, "success");
                        donateForm.reset();
                        errorDisplay.innerHTML = "";
                        console.log('message', data);
                    }  
                    else if(data.response === '400') {
                        swal(`${translations2[currentLanguage].failed}`, "All fields must be validated", "error");
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