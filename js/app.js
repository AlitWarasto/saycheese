/*
	app js for pantiespizza.com
	version 1.0
*/

/*loader jquery*/
$(window).on('load',function(){
  $(".loader").fadeOut(1000);
});

/*Initialize Swiper*/
var swiper = new Swiper('.swiper-container', {
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});

/* pure js loader
window.addEventListener('load',function(){
	var fadeTarget = document.getElementById("loader");
    var fadeEffect = setInterval(function () {
        if (!fadeTarget.style.opacity) {
            fadeTarget.style.opacity = 1;
        }
        if (fadeTarget.style.opacity > 0) {
            fadeTarget.style.opacity -= 0.1;
            fadeTarget.style.zIndex = -99;
        } else {
            clearInterval(fadeEffect);
        }
    }, 1000);
});*/