const TableData = document.getElementById('patient-app');

const updatePhone     = document.getElementById('phone2');
const updateGenderF   = document.getElementById('female');
const updateGenderM   = document.getElementById('male');
const updateBloodType = document.getElementById('mySelect');

const currentPass = document.getElementById('current-pwd');
const newPass     = document.getElementById('new-pwd');
const confirmPass = document.getElementById('c-pwd');

const patientForm  = document.getElementById('update-form');

const btn_update = document.getElementById('updateBtn');
const btn_change = document.getElementById('changeBtn');


const getPatientProfile = async() => {
    const response      = await fetch('././getPatientInfo.php');
    const res = await response.json();
    console.log('patient info record:', res);
    if (res.length > 0) {
        res.forEach( patient => {
            updateFname.value = patient.firstName;
            updateLname.value = patient.lastName;
            updateEmail.value = patient.email;
            updateDate.value  = patient.date;
            updatePhone.value= patient.phoneNumber;
            if (patient.gender === "male") {
                updateGenderM.checked = true;
            } else {
                updateGenderF.checked = true;
            }
            updateBloodType.value = patient.bloodType;
        });
    } else {
        console.log('No patient data received.');
    }
}

const updatePatient = () => {
    //alert('update Btn');
    const genderRadio = document.querySelector('input[name="gender"]:checked');
    const updateGender = genderRadio ? genderRadio.value : null;

    const requestBody = {
        updateFname: updateFname.value,
        updateLname: updateLname.value,
        updateEmail: updateEmail.value,
        updatePhone: updatePhone.value,
        updateDate: updateDate.value,
        updateGender: updateGender,
        updateBloodType: updateBloodType.value
    };
    fetch('././updatePatientInfo.php', {
        method: 'POST',
        body: JSON.stringify(requestBody),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    })
    .then((response) => response.json())
    .then((data) => {
        if(data.response == 200){
            swal("Error!", "All fields are required.", "error");
        }
        /*else if(data.response == 300){
            swal("Error!", "All fields must be validated.", "error");
        }*/
        else if(data.response == 500){
            swal("Updated!", "Your informations are updated successfully.", "success");
            passwordForm.reset();
        }
    })
    .catch(error => {
        console.error('Something went wrong:', error);
    })
    //patientForm.reset();
}

const getPatientApp = async() => {
    const res = await fetch('././getPatientData.php');
    const received_data = await res.json();
    TableData.innerHTML = "";
    console.log('App records:',received_data);
    received_data.forEach(user => {
        TableData.innerHTML += `<tr>
                                    <td>${user.doctor}</td>
                                    <td>${user.date}</td>
                                    <td>${user.time}</td>
                                    <td><button id="cancel-btn" onclick ='del(${user.id})'>Cancel</button></td>
                                </tr>`

    });
}

function del(id) {
    fetch('././deleteAppointmentByPatient.php', {
        method: 'POST',
        body: JSON.stringify({
            id: id
        }),
        headers: {
            'Content-type': 'application/json, charset=UTF-8'
        }
    })
    .then((response) => response.json())
    .then((data) => {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete && data.response == 200) {
                swal("Success!", "Appointment deleted Successfully!", "success");
                getPatientApp();
            } else {
                swal("Error!", "Something Went Wrong!", "error");
            }
        });
    })
    .catch(function (error) {
        console.log('something went wrong.', error);
    });
}

const changePassword = () => {
    //alert('change Btn');
    fetch('././changePatientPassword.php', {
        method: 'POST',
        body: JSON.stringify({
            currentPassword: currentPass.value,
            newPassword: newPass.value,
            confirmPassword: confirmPass.value
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    })
    .then((response) => response.json())
    .then((data) => {
        if(data.response == 200){
            swal("Error!", "All fields are required.", "error");
        }
        else if(data.response == 300){
            swal("Error!", "All fields must be validated.", "error");
        }
        else if(data.response == 400){
            swal("Error!", "New password and confirm password do not match.", "error");
        }
        else if(data.response == 500){
            swal("Updated!", "Password updated successfully.", "success");
            passwordForm.reset();
        }
        else if(data.response == 600){
            swal("Error!", "Please enter the old password correct.", "error");
        }
    })
    .catch(error => {
        console.error('Something went wrong:', error);
    })
}


btn_update.addEventListener('click', updatePatient);
btn_change.addEventListener('click', changePassword);
document.addEventListener("DOMContentLoaded", function() {
    getPatientApp();
    getPatientProfile();
});
