<!DOCTYPE html>
<html>
<head>
	<title><?php echo $post->post_title. " | " . $sitename ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	wp_head();
	get_header();

	$detect = new Mobile_Detect; #mobile detect#
	if ( $detect->isMobile() && !$detect->isTablet() ){ #mobile only ?>

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
	<?php } else { #desktop ?>
		<style type="text/css">
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
			.wa{
				content: url("<?php echo $themeurl ?>/img/whatsapp.SVG");
			}
			.ig {
				content: url("<?php echo $themeurl ?>/img/instagram.SVG");
			}
			.fb {
				content: url("<?php echo $themeurl ?>/img/facebook.SVG");
			}
			.tk {
				content: url("<?php echo $themeurl ?>/img/tiktok.SVG");
			}
			.tw {
				content: url("<?php echo $themeurl ?>/img/twitter.SVG");
			}
			.ln span:nth-child(1) {
				content: url("<?php echo $themeurl ?>/img/line.SVG");
			}
		</style>
	<?php } ?>
</head>
<body <?php body_class();?>>
	<?php
	$detect = new Mobile_Detect; #mobile detect#
	if ( $detect->isMobile() && !$detect->isTablet() ){ ?>
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
					  <div id="hhome" class="say-cart"><img height="auto" src="<?php echo get_template_directory_uri() ?>/img/home.svg" alt="logo panties pizza terbaru kecil bulat"></div>
					  <div id="hmenus" class="say-cart"><img src="<?php echo get_template_directory_uri() ?>/img/menus.SVG" alt="panties pizza menus"></div>
					  <a class="woofeature say-cart"href="<?php echo $siteurl ?>/shop"><img src="<?php echo get_template_directory_uri() ?>/img/navbar/shop.svg" alt="shop panties pizza"></a>
					  <a id="say-bag" class="woofeature say-cart navbar-brand"></a>
						<!-- Toast Menus -->
			      <div id="tmenus" class="toast fade hide position-absolute" data-autohide="false" style="width: 85vw;bottom: 1rem;background-color: white;z-index: 9;right: 50%;transform: translate(50%, 0);box-shadow: 2px 5px 59px 25px rgb(0 0 0 / 39%);">
			        <div class="toast-header">
			          <strong class="mr-auto text-primary">Pick Our Menus</strong>
			          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			        </div>
			        <div class="toast-body">
			        	<div class="d-flex justify-content-center">
									<a class="col-3" href="<?php echo $siteurl ?>/menu"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/calzone.SVG" alt="panties pizza kecil"></a>
									<a class="col-3" href="<?php echo $siteurl ?>/mix-zone-pizza-satu-pizza-dengan-dua-rasa"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/mixzone.SVG" alt="panties pizza mixzone"></a>
									<a class="col-3" href="<?php echo $siteurl ?>/lets-upgrade-your-mood-with-in-and-out-topping"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/inout.SVG" alt="panties pizza in and out"></a>
									<a class="col-3" href="<?php echo $siteurl ?>/pizza-slice"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/slice.SVG" alt="panties pizza slice"></a>
			          </div>
			          <hr>
			          <div class="d-flex justify-content-center">
									<a class="col-3" href="<?php echo $siteurl ?>/beverage"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/drink.SVG" alt="drinks pizza panties"></a>
									<a class="col-3" href="<?php echo $siteurl ?>/pasta"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/pasta.SVG" alt="pasta panties pizza"></a>
									<a class="col-3" href="<?php echo $siteurl ?>/rice"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/rice.SVG" alt="panties pizza rice"></a>
			          </div>
			        </div>
			      </div>
			      <!-- Toast Home -->
			      <div id="thome" class="toast fade hide position-absolute" data-autohide="false" style="width: 85vw;bottom: 1rem;background-color: white;z-index: 9;right: 50%;transform: translate(50%, 0);box-shadow: 2px 5px 59px 25px rgb(0 0 0 / 39%);">
			        <div class="toast-header">
			          <strong class="mr-auto text-primary">Pick a Link</strong>
			          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			        </div>
			        <div class="toast-body">
			        	<div class="d-flex justify-content-center">
									<a class="col-3" href="<?php echo $siteurl ?>/">Home</a>
									<a class="col-3" href="<?php echo $siteurl ?>/contact/">Contact</a>
									<a class="col-3" href="<?php echo $siteurl ?>/about/">About</a>
			          </div>
			          <hr>
			          <div class="d-flex justify-content-center">
									<a class="col-4" href="<?php echo $siteurl ?>/kemitraan/">Kemitraan</a>
									<a class="col-4" href="<?php echo $siteurl ?>/branch/">Cabang</a>
			          </div>
			        </div>
			      </div>
					</nav>
		  	</header>
			<?php
		 	}
	} else{ ?>
		<header class="container position-absolute">
			<nav class=" navbar navbar-expand-md navbar-light">
			  <a class="navbar-brand" href="<?php echo $siteurl; ?>"><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item active">
			        <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-light" href="#">Promo</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link text-light" href="#">Latest News</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Menus
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Pizza Panties</a>
			          <a class="dropdown-item" href="#">Pizza Slice</a>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Drinks</a>
			        </div>
			      </li>
			      <li class="nav-item">
			        <span class="nav-link text-light"> | </span>
			      </li><li class="nav-item">
			        <a class="nav-link text-light" href="#">Location</a>
			      </li>
			    </ul>
			  </div>
			</nav>
			
	  </header>
<?php	} ?>