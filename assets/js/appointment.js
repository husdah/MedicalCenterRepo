var email = document.getElementById('email');
var phone = document.getElementById('phnum');
var firstname=document.getElementById('fname');
var lastname=document.getElementById('lname');
var foremail = document.getElementById('foremail');
var forphone = document.getElementById('forphone');
var forfirstname = document.getElementById('forfirstname');
var forlastname = document.getElementById('forlastname');
var errorDisplayed = false;
var errorphoneDisplayed=false;
var suc1=false;
var suc2=false;
var sub1=false;
var sub2=false;
var sub3=false;
var sub4=false;

const validateEmail = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

const validatePhone = (phone) => {
    return phone.match(
        /^(76|03|71|70)\d{6}$/
    );
};

//validate the email
email.addEventListener('focusout', () => {
    if (!validateEmail(email.value) && !errorDisplayed) {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'email-error';
        errorDiv.style.color = 'red';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' Enter a valid email';
        
        foremail.insertAdjacentElement('afterend', errorDiv);
        errorDisplayed = true;
    }
    if (validateEmail(email.value) && !suc1) {
        const icon = document.createElement('i');
        icon.className = 'fa-regular fa-circle-check';
        icon.id='suc1';
        icon.style.color = '#049f0e';
        icon.style.marginLeft='-40px';
        icon.style.paddingBottom='14px';
        foremail.appendChild(icon);
        suc1=true;
    }
    
});

email.addEventListener('input', () => {
    if (errorDisplayed) {
        const errorDiv = document.getElementById('email-error');
        if (errorDiv) {
            errorDiv.remove();
            errorDisplayed = false;
        }
    }
    if(suc1)
    {
        const suc = document.getElementById('suc1');
        if (suc) {
            suc.remove();
            suc1 = false;
        }   
    }
   
});
//validate the phone number

phone.addEventListener('focusout', () => {
    if (!validatePhone(phone.value) && !errorphoneDisplayed) {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'phone-error';
        errorDiv.style.color = 'red';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' Enter a valid phone number';
        
        forphone.insertAdjacentElement('afterend', errorDiv);
        errorphoneDisplayed = true;
    }
    if (validatePhone(phone.value) && !suc2) {
        const icon = document.createElement('i');
        icon.className = 'fa-regular fa-circle-check';
        icon.id='suc2';
        icon.style.color = '#049f0e';
        icon.style.marginLeft='-40px';
        icon.style.paddingBottom='14px';
        forphone.appendChild(icon);
        suc2=true;
    }
});
//test when submit the form
document.getElementById('btn').addEventListener('click',(e)=>
{ 
    e.preventDefault();
    if(!errorDisplayed && !errorphoneDisplayed)
    {
    if(phone.value==="" && !sub1)
    {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'phone-error2';
        errorDiv.style.color = 'red';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' Enter your phone number';
        
        forphone.insertAdjacentElement('afterend', errorDiv);
        sub1=true;
    }
    if(email.value==="" && !sub2)
    {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'email-error2';
        errorDiv.style.color = 'red';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' Enter your email';
        
        foremail.insertAdjacentElement('afterend', errorDiv);
        sub2=true;
    }
    if(lastname.value==="" && !sub3)
    {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'l-error2';
        errorDiv.style.color = 'red';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' Enter your last name';
        
        forlastname.insertAdjacentElement('afterend', errorDiv);
        sub3=true;
    }
     if(firstname.value==="" && !sub4)
    {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'f-error2';
        errorDiv.style.color = 'red';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' Enter your first name';
        
        forfirstname.insertAdjacentElement('afterend', errorDiv);
        sub4=true;
    }
}
});
phone.addEventListener('input', () => {
    if (errorphoneDisplayed) {
        const errorDiv = document.getElementById('phone-error');
        if (errorDiv) {
            errorDiv.remove();
            errorphoneDisplayed = false;
        }
    }
    const errorDiv2 = document.getElementById('phone-error2');
    if(errorDiv2)
    {
        errorDiv2.remove();
        sub1=false;
    }
    if(suc2)
    {
        const suc = document.getElementById('suc2');
        if (suc) {
            suc.remove();
            suc2 = false;
        }   
    }
});
phone.addEventListener('focus', () => {
    
    const errorDiv2 = document.getElementById('phone-error2');
    if(errorDiv2)
    {
        errorDiv2.remove();
        sub1=false;
    }
});
email.addEventListener('focus', () => {
    
    const errorDiv2 = document.getElementById('email-error2');
    if(errorDiv2)
    {
        errorDiv2.remove();
        sub2=false;
    }
});
firstname.addEventListener('focus', () => {
    
    const errorDiv2 = document.getElementById('f-error2');
    if(errorDiv2)
    {
        errorDiv2.remove();
        sub4=false;
    }
});
lastname.addEventListener('focus', () => {
    
    const errorDiv2 = document.getElementById('l-error2');
    if(errorDiv2)
    {
        errorDiv2.remove();
        sub3=false;
    }
});

