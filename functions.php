<?php
/*
 * The Functions for saycheese Theme
 *
 * email info@pantiespizza.com
 * https://psntiespizza.com
 * @version 2.1.03.03
 */

$siteurl  = get_option('siteurl');
$sitename = get_option('blogname');
$sitedesc = get_option('blogdescription');
$themeurl = get_bloginfo('template_url');
/*=== Mobile View Detection ===*/
require get_template_directory().'/md/Mobile_Detect.php';

function load_stylesheets(){
	wp_register_style('stylesheet', get_template_directory_uri(). '/css/app.css', '',0.1,'all');
	wp_register_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', '',4.0,'all');
	wp_register_style('swiper', get_template_directory_uri(). '/css/swiper-bundle.min.css', '',3.0,'all');
	wp_enqueue_style('stylesheet');
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('swiper');
}
add_action('wp_enqueue_scripts','load_stylesheets');

function load_javascript(){
    wp_register_script('jquery351', get_template_directory_uri(). '/js/jquery351.js','', 3.5, true);
    wp_register_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js','', 4.0, true);
	wp_register_script('appjs', get_template_directory_uri(). '/js/app.js','jquery', 0.1, true);
    wp_enqueue_script('jquery351');
    wp_enqueue_script('bootstrap');
	wp_enqueue_script('appjs');
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
    set_post_thumbnail_size( 150, 150, true ); // default Featured Image dimensions (cropped)
 
    // additional image sizes
    add_image_size( 'landing-thumb', 9999, 9999 ); // unlimited wide and unlimited height
 }