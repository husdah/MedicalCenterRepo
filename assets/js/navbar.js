let menu = document.getElementById('menu-icon');
let navbar = document.getElementById('navbar');

menu.addEventListener("click", function() {
    navbar.classList.toggle('active');
  });

window.onscroll = () =>{
    navbar.classList.toggle('active');
}
