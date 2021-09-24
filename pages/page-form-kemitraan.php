<?php
/*
Template Name: Form Kemitraan
Template Post Type: post, page, event
*/
?>
<?php
include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
?>
<style type="text/css">
	.colTesti{
    width: calc(100% - 30px);
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    border: 3px solid #e7e7e7;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 15px;
	}
	.colImg{
    width: 33%;
    height: 100px;
    position: relative;
    overflow: hidden;
    border: 3px solid khaki;
    border-radius: 50px;
	}
	.colImg img{
		width: 87%;
    position: absolute;
    transform: translate(10px, 10px);
	}
	p{
		margin: 0;
	}
	.colBG{
		background-image: url("<?php echo $siteurl ?>/wp-content/uploads/2021/09/mendatangkan-banyak-pelanggan-di-panties-pizza-sehingga-mendapatakan-profit-berlipat.png");
	}
</style>
<div class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>
<div id="page" class="container">
  <div class="row justify-content-center pt-3">    
    <?php 
    while (have_posts()) : the_post();
    	$poslug  = $post->post_name;
      $posurl  = $siteurl.'/'.$poslug.'/';
      ?>
      <h1 class="h2"><?php the_title(); ?></h1>
      <hr class="col-md-12">
    <div class="colTesti">
	  	<div class="colImg">
	    	<img class="" src="<?php echo $siteurl ?>/wp-content/uploads/2021/09/testimoni-kemitraan-franchise-panties-pizza-dari-pak-firman.png">
	    </div>
	    <div class="col">
	    	<p style="font-size: inherit;">Semenjak bergabung menjadi Mitra Panties Pizza di Kota Purwokerto. Alhamdulillah bisnis ini berkembang pesat dan dapat diterima oleh semua kalangan customer di kota ini.</p>
	    </div>
  	</div>
  	<div class="col-12">
  		<blockquote class="blockquote">
  			<p class="font-italic" style="font-size:small;">Omset ratusan juta itu bukanlah isapan jempol belaka. Ragu-ragu bukanlah sifat Enterpreneur Sejati!!</p>
  			<div class="blockquote-footer">Quote of the day</div>
  		</blockquote>
  		<p>Dapatkan Harga Khusus Terbatas 5 Calon Mitra dibulan <?php echo date("F"); ?>.</p>
  	</div>
 		<div class="col">
      <?php the_content(); ?>
  	</div>
  	<div class="colBG"></div>
    <?php endwhile; ?>
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