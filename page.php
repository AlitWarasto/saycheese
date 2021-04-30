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
        <h1 class="h2"><?php the_title(); ?></h1>
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
} else {
  ?>
<div id="page" class="container">
  <div class="row pt-3">
    <div class="col">
      <?php 
      while (have_posts()) : the_post();
        $poslug  = $post->post_name;
        $posurl  = $siteurl.'/'.$poslug.'/';
        ?>
        <h1 class="text-center h2"><?php the_title(); ?></h1>
        <hr>
        <div class="d-flex justify-content-center">
          <?php
          if ( has_post_thumbnail()) {
          the_post_thumbnail('full', array( 'class' => 'img-fluid mb-2' ));
          }?>
        </div>
        <?php
        the_content();
      endwhile;
       ?>
    </div>
  </div>
  <?php
  ########### BREADCRUMB ##########
  /* CATEGORY */
  $cats    = get_the_category();
  $catname = $cats[0]->name;
  $catslug = $cats[0]->slug;
  /* Current Url */
  global $wp;
  $cPostUrl = home_url(add_query_arg(array(), $wp->request));
  ?>
  <hr>
  <div class="bc text-body mb-2">
    <ul class="pl-0" vocab="https://schema.org/" typeof="BreadcrumbList">
      <li><a href="<?php echo $siteurl; ?>"><span>Home</span> &rsaquo;</a></li>
      <li property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="<?php echo $cPostUrl; ?>">
        <span property="name"><?php the_title();?></span></a>
        <meta property="position" content="1">
      </li>
    </ul>
  </div>
</div>
  <?php
}
get_footer();
?>