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
			  <a class="say-cart"href="<?php echo $siteurl ?>/menu"><img src="<?php echo get_template_directory_uri() ?>/img/pizza.SVG" alt="panties pizza kecil"></a>
			  <a class="say-cart"href="<?php echo $siteurl ?>/shop"><img src="<?php echo get_template_directory_uri() ?>/img/shop.svg" alt="shop panties pizza kecil"></a>
			  <a id="say-bag" class="say-cart navbar-brand"></a>
			</nav>
  	</header>
	<?php } ?>