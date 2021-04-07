<?php
#page.php for pantiespizza.com
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
<div id="page" class="container">
  <div class="row pt-3">
    <div class="col">
      <?php 
      while (have_posts()) : the_post();
      	$poslug  = $post->post_name;
        $posurl  = $siteurl.'/'.$poslug.'/';
        ?>
        <h1><?php the_title(); ?></h1>
        <?php
        if ( has_post_thumbnail()) {
        the_post_thumbnail('Lthumb', array( 'class' => 'img-fluid mb-2' ));
      	}
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