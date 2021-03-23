<?php
#woocommerce.php for pantiespizza.com
#saycheese theme wp
#version 1.0
?>

<?php
include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
?>
<div class="loader"></div>
  <section class="say-body">
    <div id="woo-container" class="overflow-hidden">
      <a class="say-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> – <?php echo WC()->cart->get_cart_total(); ?></a>
      <div class="swiper-wrapper">
      <?php
        $shn = new WP_Query(array(
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3,
        'offset' => 0
        ));
          /*=== WP LOOP === */
          if($shn->have_posts()) :
            while($shn->have_posts()) :
              $shn->the_post();
              $poslug  = $post->post_name;
              $posurl  = $siteurl.'/'.$poslug.'/';
              if ( has_post_thumbnail()) { ?>
                <div class="swiper-slide"><a href="<?php echo $posurl; ?>"><?php the_post_thumbnail('thumbnail', array( 'class' => 'img-fluid' )); ?></a></div>
              <?php
              }
            endwhile; 
            wp_reset_postdata();
          endif;
        ?>
      </div>
    </div>
  </section>
<div id="woocommerce" class="container say-body">
  <div class="row pt-3">
    <div class="col-12">
      <?php
      if ( have_posts() ) :
      	woocommerce_content();
      endif;
       ?>
    </div>
  </div>
</div>
<?php
get_footer();
} else {
  ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center align-items-center" style="width: 100vw;height: 100vh;font-family: 'Roboto', sans-serif;font-size: 5vw;font-weight: 900;color: black;">
          <h1>ONLY AVAILABLE ON MOBILE DEVICE (PHONE)</h1>
        </div>
      </div>
    </div>
  <?php
}
get_footer();
?>