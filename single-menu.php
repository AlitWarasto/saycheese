<?php
#single-menu.php for pantiespizza.com
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
      $poslug  = $post->post_name;
      /*========== HARGA PERWILAYAH ============*/
      $hw1= get_post_meta($post->ID,'hargawil1',TRUE);
      $hw2= get_post_meta($post->ID,'hargawil2',TRUE);
      $hw3= get_post_meta($post->ID,'hargawil3',TRUE);

      /*================ RATING ================*/
          $rdate = $post->post_date;
          $udate = strtotime($rdate);
          $rr    = $udate+$post->ID;
          $rawr  = substr($rr,-2);
          if($rawr < 65) {
            $rating = 99-$rawr;
          } else {
            $rating = $rawr;
          }
          $raval = number_format($rating * 0.05,1);
          if ($raval < 3) {
            $raval = "3.1";
          }
          $ru = substr($rr,-4,-1);
          if($ru < 117) {
            $users = 978-$ru;
          } else {
            $users = $ru;
          }
      ?>
      <h1 class="col-12 text-center"><?php the_title(); ?></h1>
      <hr>
      <?php #featured image
      if ( has_post_thumbnail()) { ?>
        <a href="#"><?php the_post_thumbnail('large', array( 'class' => 'img-fluid text-center' )); ?></a>
      <?php } ?>
      <div class="col-12 mt-2"><?php the_content(); ?></div>
      <div class="col-12 hg mb-2">
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
        <span class="hinfo">Info Harga Wilayah</span>
        <span id="users" class="star love"><img class="img-fluid"src="<?php echo $themeurl ?>/img/love0.SVG"></span>
        <span class="users float-right ml-2 text-muted"><?php echo $users; ?></span>
        <span id="star" class="star"><img class="img-fluid"src="<?php echo $themeurl ?>/img/star.SVG"></span>
        <span class="rating"><?php echo $raval; ?></span>
      </div>
      <!-- Toast Info Harga -->
      <div id="info-harga" class="toast fade hide position-absolute col-12" data-autohide="false" style="width: 87vw;bottom: 30vh;background-color: white;z-index: 9;right: 50%;transform: translate(50%, 13%);box-shadow: 2px 5px 59px 25px rgb(0 0 0 / 39%);">
        <div class="toast-header">
          <strong class="mr-auto text-primary">Harga</strong>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body position-relative">
          <p>Harga Wilayah 1 : 
            <span class="hg">Rp. <?php echo $hw1; ?></span>
            <a class="tAng" href="<?php echo $siteurl; ?>/info-wilayah-panties-pizza-indonesia/">
              <span>Info Wilayah</span>
            </a>
          </p>
          <p>Harga Wilayah 2 : <span class="hg">Rp. <?php echo $hw2; ?></span></p>
          <p>Harga Wilayah 3 : <span class="hg">Rp. <?php echo $hw3; ?></span></p>
        </div>
      </div>
      <!-- Toast Rating Star -->
      <div id="rating-star" class="toast fade hide position-absolute" data-autohide="false" style="width: 70vw;bottom: 30vh;background-color: white;z-index: 9;right: 50%;transform: translate(50%, 0);box-shadow: 2px 5px 59px 25px rgb(0 0 0 / 39%);">
        <div class="toast-header">
          <strong class="mr-auto text-primary">5 star if you like it</strong>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body position-relative">
          <div class="stars d-flex justify-content-center">
            <input type="radio" id="star1" name="rating" value="1" /><input type="radio" id="star2" name="rating" value="2" /><input type="radio" id="star3" name="rating" value="3" /><input type="radio" id="star4" name="rating" value="4" /><input type="radio" id="star5" name="rating" value="5" />
            
            <label for="star1" aria-label="Banana">1 star</label><label for="star2">2 stars</label><label for="star3">3 stars</label><label for="star4">4 stars</label><label for="star5">5 stars</label>
          </div>
        </div>
      </div>
      <div class="col-12 d-flex justify-content-between align-items-center mb-2" style="font-size:x-small;font-weight:bold;">
        <span>Categories:
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
        </span>
        <a href="<?php echo $siteurl.'/product/'.$poslug ?>"><button type="button" class="woofeature btn btn-success btn-size">Order Now</button></a>
      </div>
      <?php
    endwhile;
    ?>

  </div>
  <?php
  ########### BREADCRUMB ##########
  /* CATEGORY */
  $cats    = get_the_category();
  $catname = $cats[0]->name;
  $catslug = $cats[0]->slug;
  ?>
  <hr>
  <div class="bc text-body mb-2">
    <a href="<?php echo $siteurl; ?>" rel="nofollow">Home</a><span>&rsaquo;</span>
    <a href="<?php echo $siteurl.'/category/'.$catslug.'/' ?>" rel="nofollow"><?php echo $catname; ?></a><span>&rsaquo;</span>
    <a rel="nofollow"><?php the_title();?></a>
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