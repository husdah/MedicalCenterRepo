var oldpass=document.getElementById('cpass');
var newpass=document.getElementById('npass');
var renewpass=document.getElementById('rnpass');
var forpass2=document.getElementById('forpass2');
var divpass2=document.getElementById('div2');
var divpass3=document.getElementById('div3');
var forpass3=document.getElementById('forpass3');
var errorDisplayed=false;
var errorDisplayed2=false;
var suc1=false;
var suc2=false;
var sub1=false;
var sub2=false;

const validatePassword = (password) => {
    return password.match(
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+{};:'",<.>\/?\\[\]`~])(.{8,})$/
    );
};
//validation for new password
newpass.addEventListener('focusout', () => {
    if (newpass.value==="" && !errorDisplayed) {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'newpass-error';
        errorDiv.style.color = 'red';
        errorDiv.className='error';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' This field is required';
        
        forpass2.appendChild(errorDiv);
        errorDisplayed = true;
    }
    else if (!validatePassword(newpass.value) && !errorDisplayed) {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'newpass-error';
        errorDiv.style.color = 'red';
        errorDiv.className='error';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += 'Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, and one digit.';
        
        forpass2.appendChild(errorDiv);
        errorDisplayed = true;
    }
    
});

newpass.addEventListener('input', () => {
    if (errorDisplayed) {
        const errorDiv = document.getElementById('newpass-error');
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
    const errorDiv2 = document.getElementById('newpass-error2');
    if(errorDiv2)
    {
        errorDiv2.remove();
        sub1=false;
    }
    if (validatePassword(newpass.value) && !suc1) {
        const icon = document.createElement('i');
        icon.className = 'fa-regular fa-circle-check';
        icon.id='suc1';
        icon.style.color = '#049f0e';
        icon.style.marginLeft='-33px';
        icon.style.paddingBottom='0px';
        icon.style.paddingTop='7px';
        divpass2.appendChild(icon);
        suc1=true;
    }

   
});
//validation for re-type new password
renewpass.addEventListener('focusout', () => {
    if (renewpass.value==="" && !errorDisplayed2) {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'renewpass-error';
        errorDiv.className='error';
        errorDiv.style.color = 'red';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' This field is required';
        
        forpass3.appendChild(errorDiv);
        errorDisplayed2 = true;
    }
    else if (renewpass.value!==newpass.value && !errorDisplayed2) {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'renewpass-error';
        errorDiv.style.color = 'red';
        errorDiv.className='error';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += 'Password confirmation is incorrect';
        
        forpass3.appendChild(errorDiv);
        errorDisplayed2 = true;
    }
    
});

renewpass.addEventListener('input', () => {
    if (errorDisplayed2) {
        const errorDiv = document.getElementById('renewpass-error');
        if (errorDiv) {
            errorDiv.remove();
            errorDisplayed2 = false;
        }
    }
    if(suc2)
    {
        const suc = document.getElementById('suc2');
        if (suc) {
            suc.remove();
            suc2 = false;
        }   
    }
    const errorDiv2 = document.getElementById('renewpass-error2');
    if(errorDiv2)
    {
        errorDiv2.remove();
        sub2=false;
    }
    if (renewpass.value!=="" && renewpass.value===newpass.value && validatePassword(newpass.value)&& !suc2) {
        const icon = document.createElement('i');
        icon.className = 'fa-regular fa-circle-check';
        icon.id='suc2';
        icon.style.color = '#049f0e';
        icon.style.marginLeft='-33px';
        icon.style.paddingBottom='0px';
        icon.style.paddingTop='7px';
        divpass3.appendChild(icon);
        suc2=true;
    }

   
});
//when submit the form
document.getElementById('btn').addEventListener('click',(e)=>
{ 
    e.preventDefault();
    if(!errorDisplayed && !errorDisplayed2)
    {
    if(newpass.value==="" && !sub1)
    {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'newpass-error2';
        errorDiv.className="error";
        errorDiv.style.color = 'red';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' This field is required';
        
        forpass2.appendChild(errorDiv);
        sub1=true;
    }
    if(renewpass.value==="" && !sub2)
    {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'renewpass-error2';
        errorDiv.className="error";
        errorDiv.style.color = 'red';
        
        
        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-triangle-exclamation';
        errorDiv.appendChild(icon);

        errorDiv.innerHTML += ' This field is required';
        
        forpass3.appendChild(errorDiv);
        sub2=true;
    }
     
    if(suc1 && suc2)
    {
        document.getElementById('form').submit();
    }
}
});