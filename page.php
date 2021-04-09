<?php
#page.php for pantiespizza.com
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
<div id="page" class="container">
  <div class="row pt-3">
    <div class="col">
      <?php 
      while (have_posts()) : the_post();
      	$poslug  = $post->post_name;
        $posurl  = $siteurl.'/'.$poslug.'/';
        ?>
        <h1><?php the_title(); ?></h1>
        <hr>
        <?php
        if ( has_post_thumbnail()) {
        the_post_thumbnail('Lthumb', array( 'class' => 'img-fluid mb-2' ));
      	}
        the_content();
      endwhile;
       ?>
    </div>
  </div>
   <?php ########### BREADCRUMB ########## 
   /* Constructing URI */
    $srequri   = urldecode($_SERVER['REQUEST_URI']);
    $ismap     = strpos($srequri, 'map-');
    $isgallery = strpos($srequri, 'gallery-');
    $istag     = strpos($srequri, 'label-');
    $firstchar = basename($srequri);
    if ($ismap) {
      $firstchar = str_replace('map-','',$firstchar);
      $whichis = 'Articles';
    } elseif($isgallery) {
      $firstchar = str_replace('gallery-','',$firstchar);
      $whichis = 'Gallery';
    } elseif($istag) {
      $firstchar = str_replace('label-','',$firstchar);
      $whichis = 'Label';
    } else {
      $firstchar = $firstchar;
      $whichis = '';
    }
   ?>
  <hr>
  <div class="bc text-body mb-2">
    <a href="<?php echo $siteurl; ?>" rel="nofollow">Home</a><span>&rsaquo;</span>
    <a rel="nofollow"><?php echo $whichis.' '.strtoupper($firstchar);?></a>
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