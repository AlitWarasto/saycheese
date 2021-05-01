<?php
#sidebar-menu.php for pantiespizza.com
#saycheese theme wp
#version 1.0

/* Random Post Query 
$postCount    = wp_count_posts('menu')->publish;
$offset       = mt_rand(0,($postCount-6));
$randomQuery  = new WP_Query(array(
	'post_type' =>'menu',
	'posts_per_page'=>6,
	'offset'=> $offset,
	'orderby' => 'date',
  'order' => 'ASC',
));
*/
if (is_singular('menu')) {
  $postType = 'menu';
} elseif (is_singular('beverage')) {
  $postType = 'beverage';
} elseif (is_singular('rice')) {
  $postType = 'rice';
} elseif (is_singular('pasta')) {
  $postType = 'pasta';
} elseif (is_singular('pizza-slice')) {
  $postType = 'pizza-slice';
} else {}

$sbm = new WP_Query(array(
  'post_type' => $postType,
  'orderby' => 'date',
  'order' => 'ASC',
  'posts_per_page' => 6, 
  'offset' => 0
));

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){ ?>
<div class="col-12"><hr></div>
<?php }else{} ?>
<div id="sidebar" class="row">
  <h2 class="h4 col-12 text-center">Other Menu</h2>
    <?php
    if($sbm->have_posts()) :
      while ($sbm->have_posts()) : $sbm->the_post();?>
        <?php
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
      	<div class="col-6">
          <div class="mitem d-flex flex-column">
            <?php
          	$poslug  = $post->post_name;
            $arcurl  = get_post_type_archive_link( 'menu' );
            $posurl  = $arcurl.$poslug.'/';
            ### featured image ###
            if ( has_post_thumbnail()) { ?>
              <a href="<?php echo $posurl; ?>"><?php the_post_thumbnail('thumbnail', array( 'class' => 'img-fluid' )); ?></a>
            <?php
          	}
            ?>
            <div class="mt-2">
              <a href="<?php echo $posurl; ?>">
                <h2 class="ww overflow-hidden" ><?php the_title(); ?></h2>
              </a>
            </div>
            <!-- Harga -->
            <div class="hg">
              <span>Rp.</span>
              <span>
                <?php
                if ($hw1 != ""){
                echo number_format($hw1,0,',','.');
                } else {
                echo "-";
                }
                ?>
              </span>
              <!-- Star Rating -->
              <span class="star"><img class="img-fluid"src="<?php echo $themeurl ?>/img/star.svg"></span>
              <span class="rating"><?php echo $raval; ?></span>
            </div>
            <!-- Button Feature -->
            <div class="d-flex flex-row justify-content-between mt-2 mb-2">
              <a href="<?php echo $siteurl.'/product/'.$poslug ?>"><button class="woofeature btn btn-success btn-size">Order</button></a>
              <a href="<?php echo $posurl; ?>"><button class="btn btn-primary btn-size">View</button></a>
            </div>
          </div>
        </div>
      	<?php
      endwhile;
      wp_reset_postdata();
    endif;
     ?>
</div>