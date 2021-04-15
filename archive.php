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
<div id="archive" class="container pt-3">
  <div class="row">
    <h1 class="col-12 text-center"><?php echo $ptitle.$pnum; ?></h1>
    <hr>
      <?php
      if(have_posts()) :
        while (have_posts()) : the_post();?>
          <div class="archive-list mb-2">
            <?php
          	$poslug  = $post->post_name;
            $posurl  = $siteurl.'/'.$poslug.'/';
            #EXCERPT
            $wl = 15;
            $xcont = explode(' ',str_replace(array("\n","\r","\t"),'',strip_tags($post->post_content)));
            if (count($xcont) >= $wl){
              $titik = '<a href="'.$posurl.'" style="color: #8e8e8e;">... more</a>';
            } else {
              $titik = '<a href="'.$posurl.'" style="color: #8e8e8e;">... more</a>';
            }
            $excerpt = implode(" ",array_splice($xcont,0,$wl)).$titik;
            #featured image
            if ( has_post_thumbnail()) { ?>
              <a href="<?php echo $posurl; ?>"><?php the_post_thumbnail('medium', array( 'class' => 'img-fluid' )); ?></a>
            <?php
          	}
            ?>
            <a href="<?php echo $posurl; ?>">
              <h5 class="col mt-2" ><?php the_title(); ?></h5>
            </a>
            <p class="col"><?php echo $excerpt; ?></p>
            <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>" class="col mt-2" style="color: #8e8e8e;font-size: x-small;"><?php the_time('F j, Y') ?></a>
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      endif;
       ?>
  </div>
  <?php
  ######## PAGINATION ########
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
  <div class="bc text-body mb-2">
    <a href="<?php echo $siteurl; ?>" rel="nofollow">Home</a><span>&rsaquo;</span>
    <a rel="nofollow"><?php echo $ptitle.$pnum;?></a>
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