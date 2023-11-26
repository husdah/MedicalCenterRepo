/* For donation section */
$(document).ready(function () {
  $(document).on('click','.click-to-donate', function (e) {
      e.preventDefault();
      var id = $(this).val();

      document.getElementById('donatPanel').classList.remove('view');
      document.getElementById('donatPanel').classList.add('hide');
      document.getElementById('donateForm').classList.remove('hide');
      document.getElementById('donateForm').classList.add('view');
 }); 
});
$(document).ready(function () {
  $(document).on('click','.fa-solid.fa-xmark', function (e) {
      e.preventDefault();
      var id = $(this).val();
      document.getElementById('donatPanel').classList.remove('hide');
      document.getElementById('donatPanel').classList.add('view');
      document.getElementById('donateForm').classList.remove('view');
      document.getElementById('donateForm').classList.add('hide');
 }); 
});
/* click send button */
let btn_click = document.getElementById("click_donate");
btn_click.addEventListener('click', function() {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Something went wrong!",
    footer: '<a href="#">Why do I have this issue?</a>'
  });
});