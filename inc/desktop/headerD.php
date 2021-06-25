<?php
include(TEMPLATEPATH.'/inc/assets/error-log.php');
if(is_home()|| is_attachment() || is_single() || is_archive()){
  $rmeta = '<meta name="robots" content="index,follow"/>';
}elseif(is_404() || is_page('Privacy Policy') || is_page('Cookie Policy') || is_page('Copyright') || is_page('Terms') ) {
  $rmeta = '<meta name="robots" content="noindex,nofollow"/>';
} else {
  $rmeta = '<meta name="robots" content="index,nofollow"/>';
}
/* METAS */
if(empty($mt)) {$mt = '<title>'.wp_title('-',false,'right').$sitename.'</title>';} else {}
if(empty($md)) {$md = '';} else {}
if(empty($mk)) {$mk = '';} else {}
$metas = array($mt,$md,$mk,$rmeta);
$metas = implode('',$metas);
?>
<!DOCTYPE html>
<html>
	<head>
		<?php //include_once(TEMPLATEPATH."/analyticstracking.php"); ?>
		<?php echo $metas; ?>
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
			<?php if (get_option('woofeature')=="1") { ?>
				.woofeature{display: block;}
			<?php } else { ?>
				.woofeature{display: none;}
			<?php }	?>
			#woocommerce,.menus{
				background-image: url("<?php echo $themeurl ?>/img/pattern.png");
			}
			.wa{
				content: url("<?php echo $themeurl ?>/img/whatsapp.svg");
			}
			.ig {
				content: url("<?php echo $themeurl ?>/img/instagram.svg");
			}
			.fb {
				content: url("<?php echo $themeurl ?>/img/facebook.svg");
			}
			.tk {
				content: url("<?php echo $themeurl ?>/img/tiktok.svg");
			}
			.tw {
				content: url("<?php echo $themeurl ?>/img/twitter.svg");
			}
			.ln span:nth-child(1) {
				content: url("<?php echo $themeurl ?>/img/line.svg");
			}
		</style>
		<?php
    /*Logo Rich Card*/
    $loloc = get_template_directory_uri() ."/img/logo.png";
    if (is_page("about")){
      echo'
      <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "url": "'.$siteurl.'",
          "logo": "'.$loloc.'"
        }
    </script>';
    }
    /*Logo Rich Card End*/
    ?>
	</head>
<body <?php body_class();?>>
	<?php 
	if (is_home()) { ?>
		<style type="text/css">
			header{
				z-index: 4;
				right: 50%;
				transform: translateX(50%);
			}
		</style>
		<header class="container position-absolute pl-0 pr-0">
	<?php } else { ?>
		<header class="container pl-0 pr-0">
  <?php } ?>
		<nav class=" navbar navbar-expand-md">
		  <a class="navbar-brand" href="<?php echo $siteurl; ?>"><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link text-light" href="<?php echo $siteurl; ?>">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-light" href="<?php echo $siteurl; ?>/category/promo/">Promo</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link text-light" href="<?php echo $siteurl; ?>/category/latest-news-panties-pizza/">Latest News</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Menu
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="<?php echo $siteurl; ?>/menu">Pizza Panties</a>
		          <a class="dropdown-item" href="<?php echo $siteurl; ?>/pizza-slice">Pizza Slice</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="<?php echo $siteurl; ?>/beverage">Drinks</a>
		          <a class="dropdown-item" href="<?php echo $siteurl; ?>/rice">Nasi</a>
		          <a class="dropdown-item" href="<?php echo $siteurl; ?>/pasta">Pasta</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <span class="nav-link cRed"> | </span>
		      </li><li class="nav-item">
		        <a class="nav-link text-light" href="<?php echo $siteurl; ?>/branch/">Location</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Info
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="<?php echo $siteurl; ?>/about">About</a>
		          <a class="dropdown-item" href="<?php echo $siteurl; ?>/contact">Contact Us</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item text-warning" href="<?php echo $siteurl; ?>/program-kemitraan-panties-pizza">Kemitraan</a>
		        </div>
		      </li>
		    </ul>
		  </div>
		</nav>
  </header>