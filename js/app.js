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
    $("#sb_instagram").addClass("swiper-btm");
    $("#sb_instagram").css("height","50vw");
    $("#sbi_images").addClass("swiper-wrapper");
    $(".sbi_item").addClass("swiper-slide");
    /*$(".sbi_photo > img").addClass("img-fluid");*/
    $(".sbi_photo").css({"background-image": "none","display": "unset"});
    $(".sbi_photo > img").css({"min-width": "100%", "max-width": "100%","height":"auto","display":"block"});

	/*Initialize Swiper*/
	var swiper = new Swiper('.swiper-container', {
		autoHeight: true,
		loop: true,
	  centeredSlides: true,
	  autoplay: {
	    delay: 2500,
	    disableOnInteraction: true,
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
	var swiperbtm = new Swiper('.swiper-btm', {
			slidesPerView: 2,
			autoHeight: false,
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