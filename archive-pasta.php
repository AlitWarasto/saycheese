<?php
#archive-pasta.php for pantiespizza.com
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
<section class="say-body position-relative">
  <div class="cw">
    <h5>Hot Promo</h5>
    <span class="btn-size">Potongan harga dan cozy event</span>
  </div>
  <div id="woo-container" class="overflow-hidden pt-3 pb-3">  
    <div class="swiper-wrapper">
    <?php
      $shn = new WP_Query(array(
        'category_name' => 'Promo',
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
              <div class="swiper-slide"><a href="<?php echo $posurl; ?>"><?php the_post_thumbnail('medium', array( 'class' => 'promo-slide' )); ?></a></div>
            <?php
            }
          endwhile; 
          wp_reset_postdata();
        endif;
      ?>
    </div>
  </div>
</section>
<div id="archive" class="container pt-3 menus pb-1">
  <div class="row">
    <?php
    the_archive_title( '<h1 class="col-12 text-center">', '</h1>' );
    #LOOP
      if(have_posts()) :
        while (have_posts()) : the_post();
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
              $arcurl  = get_post_type_archive_link( 'pasta' );
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
                <span class="star"><img class="img-fluid"src="<?php echo $themeurl ?>/img/star.SVG"></span>
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
  <?php
  ######## PAGINATION ########
  if(is_archive('pasta')) {
    $ptitle = get_the_archive_title();
    $plink  = $siteurl.'/pasta/';
  } else {
    $ptitle = get_the_archive_title();
    $plink  = '';
  }
  if($wp_query->found_posts <= $wp_query->query_vars['posts_per_page']) {} else {
    $maxp = $wp_query->max_num_pages;
    if($paged == 0 || $paged < 1) {
      $prelink = '';
      $nexlink = '<a href="'.$plink.'page/'.($paged+2).'/"><button class="btn btn-info btn-size ml-1">Next &#x0203A;</button></a>';
    } elseif($paged == $maxp) {
      if($paged == 2) {
        $prelink = '<a href="'.$plink.'"><button class="btn btn-info btn-size ml-1">&#x02039; Prev</button></a>';
      } else {
        $prelink = '<a href="'.$plink.'page/'.($paged-1).'/"><button class="btn btn-info btn-size ml-1">&#x02039; Prev</button></a>';
      }
      $nexlink = '';
    } else {
      if($paged == 2) {
        $prelink = '<a href="'.$plink.'"><button class="btn btn-info btn-size ml-1">&#x02039; Prev</button></a>';
      } else {
        $prelink = '<a href="'.$plink.'page/'.($paged-1).'/"><button class="btn btn-info btn-size ml-1">&#x02039; Prev</button></a>';
      }
      $nexlink = '<a href="'.$plink.'page/'.($paged+1).'/"><button class="btn btn-info btn-size ml-1">Next &#x0203A;</button></a>';
    }
    echo '<div class="d-flex justify-content-end mt-3">'.$prelink.$nexlink.'</div>';
  }
  ?>
  <?php ########### BREADCRUMB ########## ?>
  <hr>
  <div class="bc text-body">
    <ul class="pl-0 mb-2" vocab="https://schema.org/" typeof="BreadcrumbList">
      <li><a href="<?php echo $siteurl; ?>"><span>Home</span> &rsaquo;</a></li>
      <li property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="<?php echo get_post_type_archive_link('pasta') ?>">
        <span property="name"><?php the_archive_title();?></span></a>
        <meta property="position" content="1">
      </li>
    </ul>
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