function validateForm(event) {
    event.preventDefault();

    const name = document.getElementById('clinicName').value;
    /* const email = document.getElementById('email').value;
    const password = document.getElementById('password').value; */
    const image = document.getElementById('clinicImg').value;

    const nameRegex = /^[a-zA-Z ]+$/;

    if (name === '' || image === '') {
        /* alert('All fields are required.'); */
        document.getElementById('clinicName').classList.add("required");
    } else if (!nameRegex.test(name)) {
        alert('Name should only contain letters and spaces.');
    } else {
        // Perform additional validation if needed
        alert('Form submitted successfully!');
        // You can also submit the form to a server using AJAX or other methods.
    }
}

let nameInput = document.getElementById('clinicName');
nameInput.addEventListener("input", () =>{
    const nameRegex = /^[a-zA-Z ]+$/;
    let name = nameInput.value;
    if (name === '' || !nameRegex.test(name)) {
        document.getElementById('clinicName').classList.add("required");
    }else{
        document.getElementById('clinicName').classList.remove("required");
    }
});