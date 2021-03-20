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
<div id="single-page" class="container">
  <div class="row">
    <div class="mt-3">
      <?php while (have_posts()) : the_post();?>
        <h1 class="col-12 text-center"><?php the_title(); ?></h1>
        <?php
        $args = array(
              'numberposts' => -1,
              'orderby' => 'date',
              'post_mime_type' => 'image',
              'post_parent' => $post->ID,
              'post_status' => null,
              'post_type' => 'attachment',
            );
        $atts = get_children($args);
        foreach ($atts as $att) {
        $posurl  = $siteurl.'/'.$post->post_name.'/';
        $aturl  = $posurl.$att->post_name.'/';
        }
        $mfi = kdmfi_get_featured_image_id('mfi');
        $imfi = wp_get_attachment_image_src($mfi, 'Lthumb');
        ?>
        <a href="<?php echo $aturl; ?>"><img src="<?php echo $imfi[0]; ?>" alt="<?php the_title(); ?>" class="img-fluid mb-2"/></a>
        <div class="col-12"><?php the_content(); ?></div>
        <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>">
          <div class="col-12" style="font-size:x-small;color: #8e8e8e;">Publised <?php the_time('F j, Y') ?></div>
        </a>
        <div class="col-12 mb-2" style="font-size:x-small;font-weight:bold;">Category: 
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