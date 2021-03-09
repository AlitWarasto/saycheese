/*
	app js for pantiespizza.com
	version 1.0
*/

/*loader jquery*/
$(window).on('load',function(){
  $(".loader").fadeOut(1000);
});

/*inject class*/
$(document).ready(function(){
    $(".sbi_item").addClass("swiper-slide");

	/*Initialize Swiper*/
	var swiper = new Swiper('.swiper-container', {
		autoHeight: true,
		loop: true,
	  centeredSlides: true,
	  autoplay: {
	    delay: 2500,
	    disableOnInteraction: false,
	  },
	});
	/*var swiperbtm = new Swiper('#swiper-btm', {
		slidesPerView: 2,
		autoHeight: true,
		loop: true,
	  centeredSlides: true,
	  freeMode: true,
	  autoplay: false,
	});*/
	var swiperbtm = new Swiper('#swiper-btm', {
			slidesPerView: 2,
			autoHeight: true,
			loop: true,
		  centeredSlides: true,
		  freeMode: true,
		  autoplay: false,
		});

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