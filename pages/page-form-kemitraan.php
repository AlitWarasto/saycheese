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
  @import url('https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap');
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
    width: 100%;
    height: 100px;
    position: relative;
    overflow: hidden;
    background-color: khaki;
    border: 3px solid khaki;
    border-radius: 50px;
	}
  .colImgWrap{
    width: 33%;
  }
  .colImgWrap h6{
    font-size: small;
    text-align: center;
    margin-top: 5px;
  }
  .colImgWrap p{
    font-size: x-small !important;
    text-align: center;
    line-height: 10px;
    font-style: italic;
  }
	.colImg img{
		width: 87%;
    position: absolute;
    transform: translate(10px, 10px);
	}
  .testi P{
    font-size: inherit !important;
    text-align: justify;
  }
	p{
		margin: 0;
	}
  .colKata > p{
    animation: shake 1s;
    animation-iteration-count: 3;
    animation-delay: 1s;
    padding: 10px;
    border: 1px solid orange;
    border-radius: 5px;
    text-align: center;
    font-weight: 600 !important;
    box-shadow: 3px 3px 7px 1px rgb(0 0 0 / 15%);
  }
  .colKata p span:nth-child(2){
    font-family: 'Racing Sans One', cursive;
  }
  .colKata p span:nth-child(odd){
    font-size: medium !important;
  }
  @keyframes shake {
    0% { transform: translate(1px, -3px) rotate(0deg); }
    10% { transform: translate(-1px, -2px) rotate(-1deg); }
    20% { transform: translate(-3px, 0px) rotate(1deg); }
    30% { transform: translate(3px, 2px) rotate(0deg); }
    40% { transform: translate(1px, -1px) rotate(1deg); }
    50% { transform: translate(-1px, 2px) rotate(-1deg); }
    60% { transform: translate(-3px, 1px) rotate(0deg); }
    70% { transform: translate(0px, 0px) rotate(0deg); }
    80% { transform: translate(0px, 0px) rotate(0deg); }
    90% { transform: translate(0px, 0px) rotate(0deg); }
    100% { transform: translate(0px, 0px) rotate(0deg); }
  }
	.colBG{
		background-image: url("<?php echo $siteurl ?>/wp-content/uploads/2021/09/mendatangkan-banyak-pelanggan-di-panties-pizza-sehingga-mendapatakan-profit-berlipat.png");
    background-repeat: no-repeat;
    width: 100vw;
    height: 270px;
    position: absolute;
    bottom: 0;
    z-index: -1;
	}
</style>
<div class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>
<div id="page" class="container">
  <div class="row justify-content-center pt-3 position-relative">    
    <?php 
    while (have_posts()) : the_post();
    	$poslug  = $post->post_name;
      $posurl  = $siteurl.'/'.$poslug.'/';
      ?>
      <h1 class="h2"><?php the_title(); ?></h1>
      <hr class="col-md-12">
    <div class="colTesti">
      <div class="colImgWrap">
  	  	<div class="colImg">
  	    	<img class="" src="<?php echo $siteurl ?>/wp-content/uploads/2021/09/testimoni-kemitraan-franchise-panties-pizza-dari-pak-firman.png">
  	    </div>
        <h6 class="font-weight-bold">Firman A.B</h6>
        <p>Owner Panties Pizza Purwakarta</p>
      </div>
	    <div class="col testi">
	    	<p>Semenjak bergabung menjadi Mitra Panties Pizza di Kota Purwokerto. Alhamdulillah bisnis ini berkembang pesat dan dapat diterima oleh semua kalangan.</p>
	    </div>
  	</div>
  	<div class="col-12 colKata">
  		<blockquote class="blockquote">
  			<p class="font-italic" style="font-size:small;">Omset ratusan juta itu bukan isapan jempol belaka. Ragu-ragu bukan sifat Enterpreneur Sejati!!</p>
  			<div class="blockquote-footer">Quote of the day</div>
  		</blockquote>
  		<p class="d-flex flex-column">
        <span>Dapatkan Harga Khusus </span>
        <span>Terbatas 5 Calon Mitra </span> <span>-Tersisa 3 slot- </span>
        <span>dibulan <?php echo date("F"); ?></span>
      </p>
  	</div>
 		<div class="col mt-3">
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
} else { //Desktop
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