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
		get_header(); ?>

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
			.wa::before{
				content: url("<?php echo $themeurl ?>/img/whatsapp.svg");
			}
			.ig::before {
				content: url("<?php echo $themeurl ?>/img/instagram.svg");
			}
			.fb::before {
				content: url("<?php echo $themeurl ?>/img/facebook.svg");
			}
			.tk::before {
				content: url("<?php echo $themeurl ?>/img/tiktok.svg");
			}
			.tw::before {
				content: url("<?php echo $themeurl ?>/img/twitter.svg");
			}
			.ln::before {
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
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '206497110181756');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=206497110181756&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
	</head>
<body <?php body_class();?>>
	<script>/**/
    fbq('track', 'Lead');
    fbq('track', 'Search');
    fbq('track', 'ViewContent');
  </script>
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
			  <div id="hmenus" class="say-cart"><img src="<?php echo get_template_directory_uri() ?>/img/menus.svg" alt="panties pizza menus"></div>
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
							<a class="col-3" href="<?php echo $siteurl ?>/menu"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/calzone.svg" alt="panties pizza kecil"></a>
							<a class="col-3" href="<?php echo $siteurl ?>/mix-zone-pizza-satu-pizza-dengan-dua-rasa"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/mixzone.svg" alt="panties pizza mixzone"></a>
							<a class="col-3" href="<?php echo $siteurl ?>/lets-upgrade-your-mood-with-in-and-out-topping"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/inout.svg" alt="panties pizza in and out"></a>
							<a class="col-3" href="<?php echo $siteurl ?>/pizza-slice"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/slice.svg" alt="panties pizza slice"></a>
	          </div>
	          <hr>
	          <div class="d-flex justify-content-center">
							<a class="col-3" href="<?php echo $siteurl ?>/beverage"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/drink.svg" alt="drinks pizza panties"></a>
							<a class="col-3" href="<?php echo $siteurl ?>/pasta"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/pasta.svg" alt="pasta panties pizza"></a>
							<a class="col-3" href="<?php echo $siteurl ?>/rice"><img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/navbar/rice.svg" alt="panties pizza rice"></a>
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
							<a class="col-4" href="<?php echo $siteurl ?>/program-kemitraan-panties-pizza/">Kemitraan</a>
							<a class="col-4" href="<?php echo $siteurl ?>/branch/">Cabang</a>
	          </div>
	        </div>
	      </div>
			</nav>
  	</header>
	<?php
 	}?>