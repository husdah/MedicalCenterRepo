const TableData = document.getElementById('patient-app');

const updatePhone     = document.getElementById('phone2');
const updateGenderF   = document.getElementById('female');
const updateGenderM   = document.getElementById('male');
const updateDOB       = document.getElementById('update-date');
const updateBloodType = document.getElementById('mySelect');

const currentPass = document.getElementById('current-pwd');
const newPass     = document.getElementById('new-pwd');
const confirmPass = document.getElementById('c-pwd');

const patientForm  = document.getElementById('update-form');

const btn_update = document.getElementById('updateBtn');
const btn_change = document.getElementById('changeBtn');


/*const getPatientProfile = async(id) => {
    const response  = await fetch('././getPatientData.php');
    const data = await response.json();

    //console.log(received_data);
    patient => {
        fnameInput.value      = patient.firstName;
        lnameInput.value      = patient.lastName;
        emailInput1.value     = patient.email;
        updatePhone.value     = patient.phoneNumber;
        updateDOB.value       = patient.DOB;
        //updateGenderF.value   = patient.gender
        //updateGenderM.value   =
        updateBloodType.value = patient.bloodType;
    };
}*/

const getPatientApp = async() => {
    const res = await fetch('././getPatientData.php');
    const received_data = await res.json();
    TableData.innerHTML = "";
    //console.log(received_data);
    received_data.forEach(user => {
        TableData.innerHTML += `<tr>
                                    <td>${user.doctor}</td>
                                    <td>${user.date}</td>
                                    <td>${user.time}</td>
                                    <td><button id="cancel-btn" onclick ='del(${user.id})'>Cancel</button></td>
                                </tr>`
    });
}

function del(id){
    fetch('././deleteAppointmentByPatient.php',{
        method: 'POST',
        body: JSON.stringify({
            id:id
        }),
        headers:{
            'Content-type': 'application/json, charset=UTF-8'
        }
    }) 
    
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                if(data.response == 200){
                    swal("Success!", "Appointment deleted Successfully!", "success");
                }
                else if(data.response == 300){
                    swal("Error!", "Something Went Wrong!", "error");
                }
                console.log(data);
                getPatientApp();
        
            }
        });
    })
    .catch(function(error){
        console.log('something went wrong.', error);
    });
}

const updatePatient = () => {
    //alert('update Btn');
    fetch('././updatePatientInfo.php',{
        method:'POST',
        body: JSON.stringify({
            updateFname: updateFname.value,
            updateLname: updateLname.value,
            updateEmail: updateEmail.value,
            updatePhone: updatePhone.value,
            updateDate: updateDate.value,
            updateGenderF: updateGenderF.value,
            updateGenderM: updateGenderM.value,
            updateBloodType: updateBloodType.value
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    })
    .then((response) => {
        return response.json();
    })
    .then((result) => {
      console.log(result);

    })
    .catch(function(error){
        console.log('something went wrong.', error);
    });
    patientForm.reset();
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
