<?php
#archive-drinks.php for pantiespizza.com
#saycheese theme wp
#version 1.0

if(is_category()) {
  $ptitle = $wp_query->queried_object->name;
  $plink  = $siteurl.'/category/'.$wp_query->queried_object->slug .'/';
} elseif(is_tag()) {
  $ptitle = ucwords($wp_query->queried_object->name);
  $plink  = $siteurl.'/tag/'.$wp_query->queried_object->slug .'/';
} elseif(is_day()) {
  $ptitle = date('F', mktime(0,0,0,$wp_query->query_vars['monthnum'],1,$wp_query->query_vars['year'])).' '.$wp_query->query_vars['day'].', '.$wp_query->query_vars['year'].' Archive';
  $plink  = $siteurl.'/'.$wp_query->query_vars['year'].'/'.$wp_query->query_vars['monthnum'].'/'.$wp_query->query_vars['day'].'/';
} elseif(is_month()) {
  $ptitle = date('F', mktime(0,0,0,$wp_query->query_vars['monthnum'],1,$wp_query->query_vars['year'])).', '.$wp_query->query_vars['year'].' Archive';
  $plink  = $siteurl.'/'.$wp_query->query_vars['year'].'/'.$wp_query->query_vars['monthnum'].'/';
} elseif(is_year()) {
  $ptitle = $wp_query->query_vars['year'].' Archive';
  $plink  = $siteurl.'/'.$wp_query->query_vars['year'].'/';
} elseif(is_author()) {
  $authname = $wp_query->queried_object->data->display_name;
  $ptitle   = $wp_query->queried_object->data->display_name.'&#8217;s Articles';
  $plink    = $siteurl.'/author/'.$wp_query->query_vars['author_name'].'/';
} else {
  $ptitle = get_the_archive_title();
  $plink  = '';
}

include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
?>
<div class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>
<div id="archive" class="container pt-3 menus">
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
          ?>
          <div class="col-6 d-flex flex-column mitem">
            <?php
          	$poslug  = $post->post_name;
            $arcurl  = get_post_type_archive_link( 'beverage' );
            $posurl  = $arcurl.$poslug.'/';
            #featured image
            if ( has_post_thumbnail()) { ?>
              <a href="<?php echo $posurl; ?>"><?php the_post_thumbnail('thumbnail', array( 'class' => 'img-fluid' )); ?></a>
            <?php
          	}
            ?>
            <div class="col-12 mt-2 mb-2 overflow-hidden">
              <a href="<?php echo $posurl; ?>">
                <h2 class="ww" ><?php the_title(); ?></h2>
              </a>
            </div>
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
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      endif;
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