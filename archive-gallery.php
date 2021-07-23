<?php
#archive-gallery.php for pantiespizza.com
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
<div id="archive" class="container pt-3 pb-1">
  <div class="row">
    <?php the_archive_title( '<h1 class="col-12 text-center">', '</h1>' ); ?>
    <hr>
      <?php
      if(have_posts()) :
        while (have_posts()) : the_post();?>
          <div class="archive-list mb-3 col-6">
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
            ### Random Image ###
            $args = array(
              'numberposts' => -1,
              'orderby' => 'date',
              'post_mime_type' => 'image',
              'post_parent' => $post->ID,
              'post_status' => null,
              'post_type' => 'attachment',
            );
            $atts = get_children($args);
            ### IMAGE ###
            $ai = 1;
            shuffle($atts);
            foreach($atts as $att) {
              if($ai > 1) {
                break;
              } else {
                $atitle = ucwords(str_replace(array('-','_','+'),' ',$att->post_title));
                $aturl  = $posurl.$att->post_name.'/';
                $mimg   = wp_get_attachment_image_src($att->ID,'medium');
                $murl   = $mimg[0];
                echo'<a href="'.$aturl.'"><img class="img-fluid" src="'.$murl.'" alt="'.$atitle.'"></a>';
              }
              $ai++;
            } ?>
            <a href="<?php echo $posurl; ?>">
              <h5 class="col mt-1 mb-1 pl-0" ><?php the_title(); ?></h5>
            </a>
            <p class="col mb-0 pl-0"><?php echo $excerpt; ?></p>
            <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>" class="col pl-0" style="color: #8e8e8e;font-size: x-small;"><?php the_time('F j, Y') ?></a>
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      endif;
       ?>
  </div>
  <?php ########### BREADCRUMB ########## ?>
  <hr>
  <div class="bc text-body">
    <ul class="pl-0 mb-2" vocab="https://schema.org/" typeof="BreadcrumbList">
      <li><a href="<?php echo $siteurl; ?>"><span>Home</span> &rsaquo;</a></li>
      <li property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="<?php echo get_post_type_archive_link('gallery') ?>">
        <span property="name"><?php the_archive_title();?></span></a>
        <meta property="position" content="1">
      </li>
    </ul>
  </div>
</div>
<?php
get_footer();
} else {
  ## DESKTOP VIEW GALLERIES ARCHIVES ##
?>
<div id="archive" class="container pt-3 pb-1">
  <div class="row">
    <h1 class="col-12 text-center mb-3"><?php echo $postTitle.$pnum; ?></h1>
    <hr>
      <?php
      if(have_posts()) :
        while (have_posts()) : the_post();?>
          <div class="col-md-3 archive-list mb-2">
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
            <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>" class="col" style="color: #8e8e8e;font-size: x-small;bottom: 15px;font-style: italic;"><?php the_time('F j, Y') ?></a>
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
      $nexlink = '<a href="'.$pageLink.'page/'.($paged+2).'/"><button class="btn btn-info btn-size ml-1">Next &#x0203A;</button></a>';
    } elseif($paged == $maxp) {
      if($paged == 2) {
        $prelink = '<a href="'.$pageLink.'"><button class="btn btn-info btn-size ml-1">&#x02039; Prev</button></a>';
      } else {
        $prelink = '<a href="'.$pageLink.'page/'.($paged-1).'/"><button class="btn btn-info btn-size ml-1">&#x02039; Prev</button></a>';
      }
      $nexlink = '';
    } else {
      if($paged == 2) {
        $prelink = '<a href="'.$pageLink.'"><button class="btn btn-info btn-size ml-1">&#x02039; Prev</button></a>';
      } else {
        $prelink = '<a href="'.$pageLink.'page/'.($paged-1).'/"><button class="btn btn-info btn-size ml-1">&#x02039; Prev</button></a>';
      }
      $nexlink = '<a href="'.$pageLink.'page/'.($paged+1).'/"><button class="btn btn-info btn-size ml-1">Next &#x0203A;</button></a>';
    }
    echo '<div class="d-flex justify-content-end mt-3">'.$prelink.$nexlink.'</div>';
  }
  ?>
  <?php
  ########### BREADCRUMB ##########
  global $wp;
  $cPostUrl = home_url(add_query_arg(array(), $wp->request));
  ?>
  <hr>
  <div class="bc text-body">
    <ul class="pl-0 mb-2" vocab="https://schema.org/" typeof="BreadcrumbList">
      <li><a href="<?php echo $siteurl; ?>"><span>Home</span> &rsaquo;</a></li>
      <li property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="<?php echo $cPostUrl?>">
        <span property="name"><?php the_archive_title();?></span></a>
        <meta property="position" content="1">
      </li>
    </ul>
  </div>
</div>
  <?php
}
get_footer();
?>