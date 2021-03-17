<?php
#archive.php for pantiespizza.com
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
  $ptitle = '';
  $plink  = '';
}

/* Random Query 
$offset = mt_rand(1,($allposts-7));
$rq     = new WP_Query('posts_per_page=7');*/
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
  <div class="row">
    <div class="col-lg-12 mt-5">
      <?php
      if(have_posts()) :
        while (have_posts()) : the_post();
        	$poslug  = $post->post_name;
          $posurl  = $siteurl.'/'.$poslug.'/';
          ?>
          <h1><?php the_title(); ?></h1>
          <?php
          if ( has_post_thumbnail()) {
          the_post_thumbnail('Lthumb', array( 'class' => 'img-fluid mb-2' ));
        	}
        endwhile;
        wp_reset_postdata();
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