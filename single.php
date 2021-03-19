<?php
#single.php for pantiespizza.com
#saycheese theme wp
#version 1.0
?>

<?php
include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
?>
<div class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>
<div id="single-page" class="container">
  <div class="row">
    <div class="col-lg-12 mt-5">
      <?php 
      while (have_posts()) : the_post();
        $date = date('l, F dS Y',strtotime($post->post_date));
        ?>
        <h1><?php the_title(); ?></h1>
        <?php
        $mfi = kdmfi_get_featured_image_id('mfi');
        $imfi = wp_get_attachment_image_src($mfi, 'Lthumb');
        ?>
        <img src="<?php echo $imfi[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid mb-2"/>
        <?php
        the_content(); ?>
        <div>Publised <?php echo $date; ?></div>
        <?php
      endwhile;
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