<?php
#home.php for pantiespizza.com
#saycheese theme wp
#version 1.0
?>

<?php
get_header(); 
$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
?>

<style type="text/css">
  #aksen{
    background-image: url("<?php echo $themeurl ?>/img/aksen.SVG");
    background-repeat: no-repeat;
    background-size: cover;
  }
  #section-3-aksen-1{
  	background-image: url("<?php echo $themeurl ?>/img/section-3-aksen-1.SVG");
    background-repeat: no-repeat;
    background-size: cover;
  }
  #section-3-aksen-2{
  	background-image: url("<?php echo $themeurl ?>/img/section-3-aksen-2.SVG");
  	background-repeat: no-repeat;
    background-size: 100%;
    background-position: center;
  }
</style>
<div id="loader" class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>
<!-- -->
<section id="section1">
  <div class="swiper-container">
    <div id="aksen" class="aksen"></div>
    <div class="swiper-wrapper">
    <?php
      $shn = new WP_Query(array(
      'orderby' => 'date',
      'order' => 'DESC',
      'posts_per_page' => 3, 
      'offset' => 0
      ));
        /*=== WP LOOP === */
        if($shn->have_posts()) :
          while($shn->have_posts()) :
            $shn->the_post();
            if ( has_post_thumbnail()) { ?>
              <div class="swiper-slide"><?php the_post_thumbnail('landing-thumb', array( 'class' => 'img-fluid' )); ?></div>
            <?php
            }
          endwhile; 
          wp_reset_postdata();
        endif;
      ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    </div>
  </section>

  <section id="section2" class="container-fluid">
    <div class="row d-flex justify-content-center">
      <h5 class="col-md-12 pt-3 text-center">Panties Pizza Adalah "Calzone" yang berasal dari Naples, Italia</h5>
      <p class="col-md-12 text-center">Di Italia, Calzone biasa disebut dengan Pizza Celana atau Pizza Lipat dengan filling yang variatif. Panties Pizza adalah warung “pizza lipat” pertama di kota Solo, berdiri sejak 2013. Dengan harga mulai dari Rp 19.000 saja, kita bisa menikmati pizza lipat yang sangat lezat . Saat ini Panties Pizza menjadi tempat makan dan tempat nongkrong favorite baik dari remaja maupun keluarga di kota Indonesia</p>
      <h2 class="col-md-12 text-center">Harga mulai dari</h2>
      <h1 class="col-md-12 text-center d-flex justify-content-center">19.000</h1>
      <h5 class="col-md-6 text-center" style="padding:0 7em;">Selalu menggunakan keju yang berkualitas dan berserfikat HALAL dari MUI, serta memiliki 20 lebih varian rasa</h5>
    </div>
  </section>
  <section id="section3">
  	<div id="section-3-aksen-1"></div>
  	<?php
  	$limg = wp_get_attachment_image_src(1922,'landing-thumb');
    $limgurl = $limg[0];
  	?>
  	<img class="img-fluid" src="<?php echo $limgurl; ?>">
  	<div id="section-3-aksen-2"></div>
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="var-menu col-3">
            <h5>Mixzone</h5>
            <div class="vm-bg">
              <div class="ov-con">
                <img src="http://localhost/coba/wp-content/uploads/2021/03/btn-mixzone.png">
              </div>
            </div>
        </div>
        <div class="var-menu col-3">
            <h5>In & Out</h5>
            <div class="vm-bg">
              <div class="ov-con">
                <img src="http://localhost/coba/wp-content/uploads/2021/03/btn-inout.png">
              </div>
            </div>
        </div>
        <div class="var-menu col-3">
            <h5>Pizza Slice</h5>
            <div class="vm-bg">
              <div class="ov-con">
                <img src="http://localhost/coba/wp-content/uploads/2021/03/btn-slice.png">
              </div>
            </div>
        </div>
        <div class="var-menu col-3">
            <h5>Calzone</h5>
            <div class="vm-bg">
              <div class="ov-con">
                <img src="http://localhost/coba/wp-content/uploads/2021/03/btn-calzone.png">
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <section id="section4">
  	<img class="img-fluid" src="http://localhost/coba/wp-content/uploads/2021/03/presieden-vs-reality-mixzone.png"></img>
  	<img class="img-fluid" src="http://localhost/coba/wp-content/uploads/2021/03/pizza-slice-beauty-and-the-beef.png"></img>
  	<img class="img-fluid" src="http://localhost/coba/wp-content/uploads/2021/03/in-and-out-pizza-to-remember.png"></img>
  	<img class="img-fluid" src="http://localhost/coba/wp-content/uploads/2021/03/13.-SAY-CHEESE.png"></img>
  </section>
<?php
get_footer();
} else {
  ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center align-items-center" style="width: 100vw;height: 100vh;font-family: 'Roboto', sans-serif;font-size: 5em;font-weight: 900;">
          <h1>ONLY AVAILABLE ON MOBILE DEVICE</h1>
        </div>
      </div>
    </div>
  <?php
}
?>