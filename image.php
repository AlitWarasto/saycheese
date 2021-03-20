<?php
#image.php for pantiespizza.com
#saycheese theme wp
#version 1.0

include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
?>
<div class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>
<div id="image">
  <?php
  while (have_posts()) : the_post();?>
    <h1 class="col-12 pt-2 text-center"><?php the_title(); ?> images</h1>
    <?php
    $mfi = kdmfi_get_featured_image_id('mfi');
    $imfi = wp_get_attachment_image_src($mfi, 'large');
    ?>
    <div class="swiper-container mb-2">
      <div class="swiper-wrapper">
        <img src="<?php echo $imfi[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid mb-2"/>
      </div>
    </div>
  <?php
  endwhile;
  ?>
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