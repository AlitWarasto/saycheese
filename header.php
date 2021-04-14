<!DOCTYPE html>
<html>
<head>
	<title><?php echo $post->post_title. " | " . $sitename ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	wp_head();
	get_header();?>
 	<style type="text/css">/*
 		@font-face {
		font-family: "Roboto";
		src: url("<?php echo $themeurl; ?>/fonts/roboto/Roboto-Regular.ttf");
		src: url("<?php echo $themeurl; ?>/fonts/roboto/Roboto-Regular.ttf") format("woff"),
		url("<?php echo $themeurl; ?>/fonts/roboto/Roboto-Regular.ttf") format("opentype"),
		url("<?php echo $themeurl; ?>/fonts/roboto/Roboto-Regular.ttf") format("svg");
		}*/
 		<?php 
 		if (is_page('checkout')) { ?>
 			.col-1,.col-2,.col-3{max-width: 100%;}
 			.form-row{display: flex;flex-direction: column;}
 		<?php }	?>
 		<?php if (get_option('woofeature')=="1") { ?>
 			.woofeature{display: block;}
 		<?php } else { ?>
 			.woofeature{display: none;}
 		<?php }	?>
 		#woocommerce,.menus{
 			background-image: url("<?php echo $themeurl ?>/img/pattern.png");
 		}
		.wa::before{
			content: url("<?php echo $themeurl ?>/img/whatsapp.SVG");
		}
		.ig::before {
			content: url("<?php echo $themeurl ?>/img/instagram.SVG");
		}
		.fb::before {
			content: url("<?php echo $themeurl ?>/img/facebook.SVG");
		}
		.tk::before {
			content: url("<?php echo $themeurl ?>/img/tiktok.SVG");
		}
		.tw::before {
			content: url("<?php echo $themeurl ?>/img/twitter.SVG");
		}
		.ln::before {
			content: url("<?php echo $themeurl ?>/img/line.SVG");
		}
	</style>
</head>
<body <?php body_class();?>>
  <?php if (is_home()) { ?>
  	<header>
			<?php
			if ( function_exists( 'the_custom_logo' ) ) {
		    the_custom_logo();
			}
	  	?>
	  </header>
  <?php } else { ?>
  	<header>
	  	<nav class="navbar fixed-bottom navbar-light bg-light">
	  		<div class="bk text-muted" type="button" onclick="history.back();"><span>&lsaquo;</span></div>
			  <a class="say-cart" href="<?php echo $siteurl ?>"><img height="auto" src="<?php echo get_template_directory_uri() ?>/img/home.svg" alt="logo panties pizza terbaru kecil bulat"></a>
			  <div id="hmenus" class="say-cart"><img src="<?php echo get_template_directory_uri() ?>/img/menus.SVG" alt="panties pizza menus"></div>
			  <a class="woofeature say-cart"href="<?php echo $siteurl ?>/shop"><img src="<?php echo get_template_directory_uri() ?>/img/shop.svg" alt="shop panties pizza"></a>
			  <a id="say-bag" class="woofeature say-cart navbar-brand"></a>
				<!-- Toast Menus -->
	      <div id="tmenus" class="toast fade hide position-absolute" data-autohide="false" style="width: 85vw;bottom: 1rem;background-color: white;z-index: 9;right: 50%;transform: translate(50%, 0);box-shadow: 2px 5px 59px 25px rgb(0 0 0 / 39%);">
	        <div class="toast-header">
	          <strong class="mr-auto text-primary">Pick Our Menus</strong>
	          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
	        </div>
	        <div class="toast-body">
	        	<div class="d-flex justify-content-center">
							<a class="col-3" href="<?php echo $siteurl ?>/menu"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/pizza.SVG" alt="panties pizza kecil"></a>
							<a class="col-3" href="<?php echo $siteurl ?>/mix-zone-pizza-satu-pizza-dengan-dua-rasa"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/pizza.SVG" alt="panties pizza mixzone"></a>
							<a class="col-3" href="<?php echo $siteurl ?>/lets-upgrade-your-mood-with-in-and-out-topping"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/pizza.SVG" alt="panties pizza in and out"></a>
							<a class="col-3" href="<?php echo $siteurl ?>/pizza-slice"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/pizza.SVG" alt="panties pizza slice"></a>
	          </div>
	          <hr>
	          <div class="d-flex justify-content-center">
							<a class="col-3" href="<?php echo $siteurl ?>/beverage">Drinks</a>
							<a class="col-3" href="<?php echo $siteurl ?>/pasta">Pasta</a>
							<a class="col-3" href="<?php echo $siteurl ?>/rice">Rice</a>
	          </div>
	        </div>
	      </div>
			</nav>
  	</header>
	<?php } ?>