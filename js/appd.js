/*
	app js for pantiespizza.com
	version 1.0
*/

/*loader jquery*/
$(window).on('load',function(){
  $(".loader").fadeOut(1000);
});

$(document).ready(function(){
	/*inject class and styles woocommerce checkout
  $(".form-row").addClass("d-flex flex-column");*/
	/*inject class and styles swiper buttom for ig social feed*/
  $("#sb_instagram").addClass("swiper-btm").css("height","190px");
  $("#sbi_images").addClass("swiper-wrapper");
  $(".sbi_item").addClass("swiper-slide");
  $(".sbi_photo").css({"background-image": "none","display": "unset"});
  setTimeout(
  	function(){
  		$(".sbi_photo > img").css({"min-width": "100%", "max-width": "100%","height":"auto","display":"block","tarnsition":"0.3s"});
  	},300
	);

	/*Initialize Swiper Landing Page*/
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 1,
		autoHeight: false,
		loop: true,
	  centeredSlides: true,
	  autoplay: {
	    delay: 2500,
	    disableOnInteraction: true,
	  },
	  pagination: {
      el: '.swiper-pagination',
    },
	});
	/*Initialize Swiper Social Feed*/
	var swiperbtm = new Swiper('.swiper-btm', {
			slidesPerView: 6,
			autoHeight: false,
			loop: true,
		  centeredSlides: true,
		  freeMode: false,
		  autoplay: {
	    delay: 2500,
	    disableOnInteraction: true,
	  },
		});
	/*Initialize Swiper Hot Promo Menu*/
	var swiperbtm = new Swiper('#woo-container', {
			slidesPerView: 2,
			spaceBetween: 5,
			autoHeight: false,
			loop: true,
		  centeredSlides: true,
		  freeMode: false,
		  autoplay: {
		    delay: 2500,
		    disableOnInteraction: true,
		  },
		  effect: 'coverflow',
      coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 40,
      modifier: 3,
      slideShadows : false,
    },
		});
	/*Star Click*/
	$('#users img').click(function(){
		var sImg0 = jturl.templateUrl +"/img/love0.SVG";
		var sImg1 = jturl.templateUrl +"/img/love.SVG";
		var users = parseInt($('.users').text());
		if($(this).attr('src')== sImg0){
			$(this).attr('src', sImg1);
			users += 1;
			$('.users').html(users);
		}else{
			$(this).attr('src', sImg0);
			users -= 1;
			$('.users').html(users);
		};
	});
	/* Toast Home Menu Header */
 	$("#hhome").click(function(){
  	$('#thome').toast('show');
  });
  /* Toast Menus Header */
 	$("#hmenus").click(function(){
  	$('#tmenus').toast('show');
  });
 	/*Toast Click on Info Harga Wilayah*/
 	$(".hinfo").click(function(){
    $('#info-harga').toast('show');
  });
 	/*Toast Click on Rating Star*/
 	$("#star").click(function(){
    $('#rating-star').toast('show');
  });
  $(window).click(function(){
  	$('#tmenus').toast('hide');
  	$('#home').toast('hide');
    $('#rating-star').toast('hide');
  	$('#info-harga').toast('hide');
  });
	/*Add margin bottom to section 5
	var mWidth = 1200;
	var dWidth = parseInt($('#section5').width());
	var s5mb   = mWidth - dWidth;
	var s5mbPlus = dWidth - (s5mb * 3.27);
	console.log(dWidth)
	console.log(s5mb)
	console.log(s5mbPlus)
	$('#section5').css({"margin-bottom": s5mb + "px"});*/
});