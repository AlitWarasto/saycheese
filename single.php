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
<div id="single-page" class="container">
  <div class="row">
    <div class="col-lg-12 mt-5">
      <?php 
      while (have_posts()) : the_post();
        ?>
        <h1><?php the_title(); ?></h1>
        <?php
        if (class_exists('MultiPostThumbnails')) :
          MultiPostThumbnails::the_post_thumbnail(
            get_post_type(),
            'mfi'
          );
        else:
          echo "raiso bro";
        endif;
        the_content();
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