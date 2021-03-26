/*
	app js for pantiespizza.com
	version 1.0
*/

/*loader jquery*/
$(window).on('load',function(){
  $(".loader").fadeOut(1000);
});

/*inject class and styles swiper buttom for ig social feed*/
$(document).ready(function(){
  $("#sb_instagram").addClass("swiper-btm").css("height","50vw");
  $("#sbi_images").addClass("swiper-wrapper");
  $(".sbi_item").addClass("swiper-slide");
  $(".sbi_photo").css({"background-image": "none","display": "unset"});
  setTimeout(
  	function(){
  		$(".sbi_photo > img").css({"min-width": "100%", "max-width": "100%","height":"auto","display":"block","tarnsition":"0.3s"});
  	},300
	);

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
	var swiperbtm = new Swiper('.swiper-btm', {
			slidesPerView: 2,
			autoHeight: false,
			loop: true,
		  centeredSlides: true,
		  freeMode: true,
		  autoplay: false,
		});
	var swiperbtm = new Swiper('#woo-container', {
			slidesPerView: 3,
			spaceBetween: 5,
			autoHeight: true,
			loop: true,
		  centeredSlides: true,
		  freeMode: false,
		  autoplay: {
		    delay: 2500,
		    disableOnInteraction: true,
		  },
		});
	/*Add margin bottom to footer as navbar height*/
	var navheight = parseInt($('.navbar').height()) + parseInt($('.navbar').css('padding-top')) + parseInt($('.navbar').css('padding-bottom'));
	$('#fs2').css({"margin-bottom": navheight + "px"});
	console.log(navheight);
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