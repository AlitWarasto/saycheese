<!DOCTYPE html>
<html>
<head>
	<title><?php echo $post->post_title. " | " . $sitename ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	 wp_head();
	 get_header();?>
	 	<style type="text/css">
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
	<header>
		<?php
		if ( function_exists( 'the_custom_logo' ) ) {
	    the_custom_logo();
		}
  	?>
  </header>