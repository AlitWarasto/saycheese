<!DOCTYPE html>
<html>
<head>
	<title><?php echo $post->post_title. " | " . $sitename ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	wp_head();
	get_header();?>
 	<style type="text/css">
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
			  <a class="navbar-brand" href="<?php echo $siteurl ?>"><img width="30px" height="auto" src="<?php echo get_template_directory_uri() ?>/img/logo-sm.png" alt="logo panties pizza terbaru kecil bulat"></a>
			  <a class="say-cart"href="<?php echo $siteurl ?>/shop"><img src="<?php echo get_template_directory_uri() ?>/img/pizza.SVG" alt="panties pizza kecil"></a>
			  <a id="say-bag" class="say-cart navbar-brand"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto d-flex flex-row justify-content-around mt-2">
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo $siteurl ?>">Home<span class="sr-only">(current)</span>
			        </a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link <?php if(is_page('menu')){echo 'active';}; ?>" href="<?php echo $siteurl ?>/menu">Menu<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link <?php if(is_page('beverage')){echo 'active';}; ?>" href="<?php echo $siteurl ?>/beverage">Drinks<span class="sr-only">(current)</span></a>
			      </li>
			    </ul>
			  </div>
			</nav>
  	</header>
	<?php } ?>