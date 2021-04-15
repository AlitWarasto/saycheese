<?php
#image.php for pantiespizza.com
#saycheese theme wp
#version 1.0

$atitle = ucwords(str_replace(array('-','_','+'),' ',$post->post_title));
$aslug  = $post->post_name;
$date   = date('l, F dS Y H:i:s A',strtotime($post->post_date));
$parid  = $post->post_parent;
/* PARENT */
$par    = get_post($parid);
$title  = $par->post_title;
$poslug = $par->post_name;
$posurl = $siteurl.'/'.$poslug.'/';
$aurl   = $posurl.$aslug.'/';

/* ATTACHMENTS */
$args = array(
  'numberposts' => -1,
  'order' => 'ASC',
  'post_mime_type' => 'image',
  'post_parent' => $parid,
  'post_status' => null,
  'post_type' => 'attachment',
);
$atts = get_children($args);

include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect
if ( $detect->isMobile() && !$detect->isTablet() ){
?>
<div class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>
<div id="image">
  <div class="mb-2">
    <?php
    while (have_posts()) : the_post();?>
      <h1 class="col-12 pt-2 text-center"><?php echo $atitle; ?></h1>
      <?php
      $limg = wp_get_attachment_image_src($post->ID,'large');
      $lurl = $limg[0];
      $lw   = $limg[1];
      $lh   = $limg[2];
      $lalt = $atitle.' '.$title;
      ?>
      <img src="<?php echo $lurl; ?>" title="<?php echo $atitle; ?>" alt="<?php echo $lalt; ?>" class="img-fluid mb-2"/>
    <?php endwhile; ?>
    </div>
    <hr>
    <div class="container">
      <div class="d-flex row">
        <h2 class="col-12 h4 mb-3">Pick an Image</h2>
        <?php
        while (have_posts()) : the_post();
          foreach($atts as $att) {
            $atitle = ucwords(str_replace(array('-','_','+'),' ',$att->post_title));
            $aturl  = $posurl.$att->post_name.'/';
            $malt   = $atitle.' '.$title.' '.$katname;
            $mimg   = wp_get_attachment_image_src($att->ID,'thumbnail');
            $murl   = $mimg[0];
            echo '<a class="col-4 mb-2" href="'.$aturl.'"><img class="img-fluid" src="'.$murl.'" alt="'.$malt.'" /></a>';
          }
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