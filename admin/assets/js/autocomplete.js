let suggestions = [
    "patients",
    "patient registration",
    "doctors",
    "doctor registration",
    "recent appointments",
    "reminders",
    "clinics",
    "add clinic",
    "donors",
    "working hours",
    "settings",
];

// getting all required elements
const searchInput = document.querySelector(".searchInput");
const input = searchInput.querySelector("input");
const resultBox = searchInput.querySelector(".resultBox");
const icon = searchInput.querySelector(".icon");
let linkTag = searchInput.querySelector("a");
let webLink;

// if user press any key and release
input.onkeyup = (e)=>{
    let userData = e.target.value; //user enetered data
    let emptyArray = [];
    if(userData){
        emptyArray = suggestions.filter((data)=>{
            //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase()); 
        });
        emptyArray = emptyArray.map((data)=>{
            // passing return data inside li tag
            /* return data = '<li>'+ data +'</li>'; */

            if(data == 'patients' || data == 'patient registration'){
                return data = '<li><a href="patients.html">'+ data +'</a></li>';
            }
            else if(data == 'doctors' || data == 'doctor registration'){
                return data = '<li><a href="doctors.html">'+ data +'</a></li>';
            }
            else if(data == 'recent appointments' || data == 'reminders'){
                return data = '<li><a href="dashboard.html">'+ data +'</a></li>';
            }
            else if(data == 'clinics' || data == 'add clinic'){
                return data = '<li><a href="clinics.html">'+ data +'</a></li>';
            }
            else if(data == 'donors'){
                return data = '<li><a href="donors.html">'+ data +'</a></li>';
            }
            else if(data == 'working hours'){
                return data = '<li><a href="workingHours.html">'+ data +'</a></li>';
            }
            else if(data == 'settings'){
                return data = '<li><a href="settings.html">'+ data +'</a></li>';
            }else{
                return data = '<li>'+ data +'</li>';
            }
        });
        searchInput.classList.add("active"); //show autocomplete box
        showSuggestions(emptyArray);
/*         let allList = resultBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adding onclick attribute in all li tag
            allList[i].setAttribute("onclick", "window.location='patients.html';");
        } */
    }else{
        searchInput.classList.remove("active"); //hide autocomplete box
    }
}

function showSuggestions(list){
    let listData;
    if(!list.length){
        userValue = inputBox.value;
        listData = '<li>'+ userValue +'</li>';
        
    }else{
        listData = list.join('');
    }
    resultBox.innerHTML = listData;
}