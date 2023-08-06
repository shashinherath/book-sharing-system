$(document).ready(function () {
  $(".counter").counterUp({
    delay: 10,
    time: 1200,
  });
});

$(".carousel").owlCarousel({
  margin: 20,
  loop: true,
  autoplay: true,
  autoplayTimeout: 2000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
      nav: false,
    },
    600: {
      items: 2,
      nav: false,
    },
    1000: {
      items: 3,
      nav: false,
    },
  },
});

var cartcount = 0;
function cartadd(){
  cartcount++;
  document.getElementById('cartcount').innerHTML = cartcount;
  document.cookie = "jscartcount = " + cartcount;
}