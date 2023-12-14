var form= document.getElementById('yourFB');
var errmsg=document.getElementById('errmsg');
var description=document.getElementById('description');

form.addEventListener('submit',(e)=>{
    if(description.value==="")
    {
        e.preventDefault();
        errmsg.innerHTML="<i class='fa-solid fa-triangle-exclamation'></i> This field is required";
        errmsg.style.color="red";
        errmsg.style.display="block";
    }
    else
    {
        form.submit();
    }
})
description.addEventListener('input',(e)=>{
    errmsg.style.display="none";
});