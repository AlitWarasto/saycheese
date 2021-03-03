<?php
function load_stylesheets(){
	wp_register_style('stylesheet', get_template_directory_uri(). '/css/style.css', '',0.1,'all');
	wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts','load_stylesheets');

function load_javascript(){
	wp_register_script('custom', get_template_directory_uri(). '/js/app.js','jquery', 0.1, true);
	wp_enqueue_script('custom');
}
add_action('wp_enqueue_scripts', 'load_javascript');

?>