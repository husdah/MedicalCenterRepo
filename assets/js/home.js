


/* For counters in count section */

var count = document.querySelectorAll('.count');
var inc = [];
function counterFunc(){
  for(let i=0; i<count.length; i++){
    inc.push(0);
    let interval = setInterval(() =>{
      if(inc[i] != count[i].getAttribute("data-purecounter-end")){
        inc[i]++;
        count[i].innerHTML = inc[i];
      }
      else{
        clearInterval(interval);
      }
    }, 1000);
  }
}
var countsID = document.getElementById("countsID");
window.onscroll = function (){
  var timer = setInterval(() =>{
    var topElem = countsID.offsetTop;
    var btmElem = countsID.offsetTop + countsID.clientHeight;
    var topScreen = window.pageYOffset;
    console.log("ts: " + topScreen);
    var btmScreen = window.pageYOffset + window.innerHeight;
    console.log("bs: " + btmScreen);
    if(btmScreen > topElem && topScreen < btmElem){
      counterFunc();
    }else{
      clearInterval(timer); 
    }
  }, 1000);
}


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
      slidesPerView: 5,
  },
  1000: {
    slidesPerView: 5,
  },
  1024: {
      slidesPerView: 5,
  }
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

