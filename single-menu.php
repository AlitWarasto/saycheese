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
<div id="single-page" class="container pt-3">
  <div class="row">
    <?php while (have_posts()) : the_post();
      /*========== HARGA PERWILAYAH ============*/
      $hw1= get_post_meta($post->ID,'hargawil1',TRUE);
      $hw2= get_post_meta($post->ID,'hargawil2',TRUE);
      $hw3= get_post_meta($post->ID,'hargawil3',TRUE);
      ?>
      <h1 class="col-12 text-center"><?php the_title(); ?></h1>
      <?php #featured image
      if ( has_post_thumbnail()) { ?>
        <a href="#"><?php the_post_thumbnail('large', array( 'class' => 'img-fluid text-center' )); ?></a>
      <?php } ?>
      <div class="col-12 mt-2"><?php the_content(); ?></div>
      <div class="col-12 hg">
        <span>Rp.</span>
        <span>
          <?php
          if ($hw1 != ""){
            echo number_format($hw1,0);
            } else {
            echo "-";
            }
          ?>
          
        </span>
      </div>
      <div class="col-6 mb-2" style="font-size:x-small;font-weight:bold;">Categories: 
        <?php
        $i = 1;
        $cats = get_the_category();
        $catname = '';
        $catlink = '';
        foreach ($cats as $cat) {
          if ($i > 3) {
            break;
          } else {
            $catname = $cat->name;
            $catlink = get_category_link($cat->term_id); ?>
            <a href="<?php echo $catlink; ?>" style="color: #8e8e8e;"><?php echo $catname; ?>, </a>
            <?php
          } 
          $i++;
        }?>
      </div>
      <?php
    endwhile;
     ?>
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