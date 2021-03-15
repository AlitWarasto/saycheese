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
	wp_register_style('appcss', get_template_directory_uri(). '/css/app.css', '',0.1,'all');
	wp_register_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', '',4.0,'all');
	wp_register_style('swiper', get_template_directory_uri(). '/css/swiper-bundle.min.css', '',3.0,'all');
    /**/
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('swiper');
	wp_enqueue_style('appcss');
}
add_action('wp_enqueue_scripts','load_stylesheets');

function load_javascript(){
    wp_register_script('jquery351', get_template_directory_uri(). '/js/jquery351.js','', 3.5, true);
    wp_register_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js','', 4.0, true);
	wp_register_script('swiper', get_template_directory_uri(). '/js/swiper-bundle.min.js','jquery', 3, true);
    wp_register_script('appjs', get_template_directory_uri(). '/js/app.js','',0.1, true);
    wp_enqueue_script('jquery351');
    wp_enqueue_script('swiper');
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

#disable srcset on frontend
function disable_wp_responsive_images() {
    return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');

#multiple featured images for variant menu button
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label'     => 'Mobile Featured Image',
            'id'        => 'mfi',
            'post_type' => 'post',
        )
    );
    new MultiPostThumbnails(
        array(
            'label'     => 'Desktop Featured Image',
            'id'        => 'dfi',
            'post_type' => 'post',
        )
    );
}

/*custom metabox for multi featured images
#init the meta box
add_action( 'after_setup_theme', 'custom_postimage_setup' );
function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
}

function custom_postimage_meta_box(){

    //on which post types should the box appear?
    $post_types = array('post','page');
    foreach($post_types as $pt){
        add_meta_box('custom_postimage_meta_box',__( 'More Featured Images', 'yourdomain'),'custom_postimage_meta_box_func',$pt,'side','low');
    }
}

function custom_postimage_meta_box_func($post){

    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
    $meta_keys = array('second_featured_image','third_featured_image');

    foreach($meta_keys as $meta_key){
        $image_meta_val=get_post_meta( $post->ID, $meta_key, true);
        ?>
        <div class="custom_postimage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img src="<?php echo ($image_meta_val!=''?wp_get_attachment_image_src( $image_meta_val)[0]:''); ?>" style="width:100%;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt="">
            <a class="addimage button" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('add image','yourdomain'); ?></a><br>
            <a class="removeimage" style="color:#a00;cursor:pointer;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('remove image','yourdomain'); ?></a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />
        </div>
    <?php } ?>
    <script>
    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('select image','yourdomain'); ?>',
            button: {
                text: '<?php _e('select image','yourdomain'); ?>'
            },
            multiple: false
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
            var img_url = attachment['url'];
            var img_id = attachment['id'];
            $wrapper.find('input#'+key).val(img_id);
            $wrapper.find('img').attr('src',img_url);
            $wrapper.find('img').show();
            $wrapper.find('a.removeimage').show();
        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.find('img').hide();
        $wrapper.find('a.removeimage').hide();
        return false;
    }
    </script>
    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}

function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

        //same array as in custom_postimage_meta_box_func($post)
        $meta_keys = array('second_featured_image','third_featured_image');
        foreach($meta_keys as $meta_key){
            if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
            }else{
                update_post_meta( $post_id, $meta_key, '');
            }
        }
    }
}*/