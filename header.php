<!DOCTYPE html>
<html>
<head>
	<title><?php echo $post->post_title. " | " . $sitename ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); get_header();?>
</head>
<body <?php body_class();?>>
	<header>
		<?php
		if ( function_exists( 'the_custom_logo' ) ) {
	    the_custom_logo();
		}
  	?>
  </header>