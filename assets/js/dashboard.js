const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

const menuBar = document.querySelector('.sidebar .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});

document.addEventListener("DOMContentLoaded", function() {
    var currentDateElement = document.getElementById("currentDate");
    var currentDayElement = document.getElementById("currentDay");
    
    // Get the current date
    var currentDate = new Date();
    
    // Format the date as you desire
    var doptions = {weekday: 'long'}
    var options = { year: 'numeric', month: 'short', day: 'numeric' };
    var formattedDate = currentDate.toLocaleDateString('en-US', options);
    var formattedDay = currentDate.toLocaleDateString('en-US', doptions);

    formattedDate = formattedDate.replace(/,/g, '');
    
    // Set the formatted date inside the HTML element
    currentDateElement.textContent = formattedDate;
    currentDayElement.textContent = formattedDay;
});

let activeButton = null;

    function changeColor(button) {
        // Remove 'active' class from the previously active button
        if (activeButton) {
            activeButton.classList.remove('active');
        }

        // Add 'active' class to the clicked button
        button.classList.add('active');

        // Set the clicked button as the active button
        activeButton = button;
    }