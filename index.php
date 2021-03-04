<?php
#home.php for pantiespizza.com
#saycheese theme wp
#version 1.0
?>

<?php get_header(); ?>
<style type="text/css">
	.aksen{
		background-image: url("<?php echo $themeurl ?>/img/aksen.SVG");
		background-repeat: no-repeat;
		background-position: center; 
    background-size: cover;
	}
</style>
<div id="loader" class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>
<!-- -->
<section id="section1">
	<div class="swiper-container">
		<div class="aksen"></div>
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

	          $detect = new Mobile_Detect; #mobile detect#
	          if ( $detect->isMobile() && !$detect->isTablet() ){
	            if ( has_post_thumbnail()) { ?>
	              <div class="swiper-slide"><?php the_post_thumbnail('landing-thumb', array( 'class' => 'img-fluid' )); ?></div>
	            <?php
	            }
	          } else {
              ?>
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center align-item-center" style="width: 100vw;height: 100vh;font-family: 'Roboto', sans-serif;font-size: 5em;font-weight: 900;">
                      <h1>ONLY AVAILABLE ON MOBILE DEVICE</h1>
                    </div>
                  </div>
                </div>
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
<?php get_footer(); ?>
