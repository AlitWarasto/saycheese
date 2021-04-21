<?php
/*
 * The Functions for saycheese Theme
 *
 * email info@pantiespizza.com
 * https://pantiespizza.com
 * @version 2.1.03.03
 */

$siteurl  = get_option('siteurl');
$sitename = get_option('blogname');
$sitedesc = get_option('blogdescription');
$themeurl = get_bloginfo('template_url');

/*=== Mobile View Detection ===*/
require get_template_directory().'/md/Mobile_Detect.php';

function load_stylesheets(){
	wp_register_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', '',4.0,'all');
	wp_register_style('swiper', get_template_directory_uri(). '/css/swiper-bundle.min.css', '',3.0,'all');
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('swiper');
    $detect = new Mobile_Detect; #mobile detect#
    if ( $detect->isMobile() && !$detect->isTablet() ){ 
    	wp_register_style('appcss', get_template_directory_uri(). '/css/app.css', '',0.1,'all');
    	wp_enqueue_style('appcss');
    } else {
        wp_register_style('appcssd', get_template_directory_uri(). '/css/appd.css', '',0.1,'all');
        wp_enqueue_style('appcssd');
    }
}
add_action('wp_enqueue_scripts','load_stylesheets',1);

function load_javascript(){
    wp_register_script('jquery351', get_template_directory_uri(). '/js/jquery351.js','', 3.5, true);
    wp_register_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js','', 4.0, true);
    wp_register_script('popper', get_template_directory_uri(). '/js/popper.js','', 1.6, true);
	wp_register_script('swiper', get_template_directory_uri(). '/js/swiper-bundle.min.js','jquery', 3, true);
    wp_enqueue_script('jquery351');
    wp_enqueue_script('swiper');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('popper');
    $detect = new Mobile_Detect; #mobile detect#
    if ( $detect->isMobile() && !$detect->isTablet() ){ 
        $transarr = array( 'templateUrl' => get_stylesheet_directory_uri() );
        wp_localize_script( 'appjs', 'jturl', $transarr );
        wp_register_script('appjs', get_template_directory_uri(). '/js/app.js','',0.1, true);
    	wp_enqueue_script('appjs');
    } else {
        $transarr = array( 'templateUrl' => get_stylesheet_directory_uri() );
        wp_localize_script( 'appjsd', 'jturl', $transarr );
        wp_register_script('appjsd', get_template_directory_uri(). '/js/appd.js','',0.1, true);
        wp_enqueue_script('appjsd');
    }
}
add_action('wp_enqueue_scripts', 'load_javascript');

function saycheese_logo() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'saycheese_logo' );

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); #default Featured Image dimensions (cropped)
 
    #additional image sizes
    add_image_size( 'Lthumb', 512, 512, true ); #unlimited wide(9999) and unlimited height(9999)
 }

#remove width & height attributes from images
function remove_img_attr ($html)
{
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
add_filter( 'post_thumbnail_html', 'remove_img_attr' );
add_filter( 'image_send_to_editor', 'remove_img_attr' );
add_filter( 'the_content', 'remove_img_attr', 10 );

#disable srcset on frontend
function disable_wp_responsive_images() {
    return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');

#multiple featured images
add_filter( 'kdmfi_featured_images', function( $featured_images ) {
  $mfi = array(
    'id' => 'mfi',
    'desc' => 'Mobile View Featured Image, Pick image that fit resolution for mobile display',
    'label_name' => 'Mobile Featured Image',
    'label_set' => 'Set Mobile Featured Image',
    'label_remove' => 'Remove Mobile Featured Image',
    'label_use' => 'Set Mobile Featured Image',
    'post_type' => array( 'post' ),
  );
  $dfi = array(
    'id' => 'dfi',
    'desc' => 'Desktop View Featured Image, Pick image that fit resolution for desktop display',
    'label_name' => 'Desktop Featured Image',
    'label_set' => 'Set Desktop Featured Image',
    'label_remove' => 'Remove Desktop Featured Image',
    'label_use' => 'Set Desktop Featured Image',
    'post_type' => array( 'post' ),
  );

  $featured_images[] = $mfi;
  $featured_images[] = $dfi;

  return $featured_images;
});

#woocommerce hook
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

#Show cart contents / total Ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <a id="say-bag" class="say-cart woofeature" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'saycheese'); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/navbar/shopping-bag.SVG" class="img-fluid"><span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'saycheese'), $woocommerce->cart->cart_contents_count);?></span></a>
    <?php
    $fragments['a#say-bag'] = ob_get_clean();
    return $fragments;
}

/*============================
        Custom Post Type
=============================*/

function ppcpt_post_type() {

require get_template_directory().'/cpt/menu.php';
require get_template_directory().'/cpt/bvg.php';
require get_template_directory().'/cpt/rice.php';
require get_template_directory().'/cpt/pasta.php';
require get_template_directory().'/cpt/galleries.php';
require get_template_directory().'/cpt/slice.php';

}
add_action( 'init', 'ppcpt_post_type', 0 );

/*===== add metabox to CPT ======*/
require get_template_directory().'/cpt/metabox.php';

#remove archive label
function remove_label( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } elseif ( is_home() ) {
        $title = single_post_title( '', false );
    }

    return $title;
}
add_filter( 'get_the_archive_title', 'remove_label' );

## Say Cheese Settings Admin Panel ##
include(TEMPLATEPATH.'/inc/landing-settings.php');