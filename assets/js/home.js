/* For counters in count section */

let valueDisplays = document.querySelectorAll(".purecounter");
let interval = 3500;
valueDisplays.forEach((valueDisplay) =>{
    let startValue = 0;
    let endValue = parseInt(valueDisplay.getAttribute("data-purecounter-end"));
    let duration = Math.floor(interval / endValue);
    let counter = setInterval(function(){
      startValue += 1;
      valueDisplay.textContent = startValue;
      if(startValue == endValue){
        clearInterval(counter);
      }
    }, duration);
});

/* For Swiper in clinic section */

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    loop:true,
    spaceBetween: 30,
    freeMode: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    breakpoints: {
  0: {
      slidesPerView: 1,
  },
  768: {
      slidesPerView: 4,
  },
  991: {
      slidesPerView: 5,
  },
  },
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

  });

/* For donation section */
$(document).ready(function () {
  $(document).on('click','.click-to-donate', function (e) {
      e.preventDefault();
      var id = $(this).val();
      document.getElementById('donatPanel').classList.add('hide');
      document.getElementById('donateForm').classList.add('view');
 }); 
});