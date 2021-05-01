<style type="text/css">
	  #aksen{
	    background-image: url("<?php echo $themeurl ?>/img/aksen.svg");
	    background-repeat: no-repeat;
	    background-size: cover;
	  }
	  #section-3-aksen-1{
	  	background-image: url("<?php echo $themeurl ?>/img/section-3-aksen-1.svg");
	    background-repeat: no-repeat;
	    background-size: cover;
	  }
	  #section-3-aksen-2{
	  	background-image: url("<?php echo $themeurl ?>/img/section-3-aksen-2.svg");
	  	background-repeat: no-repeat;
	    background-size: 100%;
	    background-position: center;
	  }
	  #section-6-mui{
	  	background-image: url("<?php echo $themeurl ?>/img/halal-mui.svg");
	  	background-repeat: no-repeat;
	  	background-size: 100%;
	    background-position: center;
	  }
	</style>
	<div class="loader">
	  <div class="spinner-border text-warning"></div>
	  <div class="lo">Loading..</div>
	</div>
	<section id="section1">
	  <div class="swiper-container">
	    <div id="aksen" class="aksen"></div>
	    <div class="swiper-wrapper">
	    <?php
	      $shn = new WP_Query(array(
          'category_name' => 'Latest News Panties Pizza, Promo',
  	      'orderby' => 'date',
  	      'order' => 'DESC',
  	      'posts_per_page' => 3,
  	      'offset' => 0
	      ));
	        /*=== WP LOOP === */
	        if($shn->have_posts()) :
	          while($shn->have_posts()) :
	            $shn->the_post();
              $poslug  = $post->post_name;
              $posurl  = $siteurl.'/'.$poslug.'/';
	            if ( has_post_thumbnail()) { ?>
	              <div class="swiper-slide"><a href="<?php echo $posurl; ?>"><?php the_post_thumbnail('Lthumb', array( 'class' => 'img-fluid' )); ?></a></div>
	            <?php
	            }
	          endwhile; 
	          wp_reset_postdata();
	        endif;
	      ?>
	    </div>
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
  	<img src="<?php echo get_option('img_pizza'); ?>" loading="lazy">
  	<div id="section-3-aksen-2"></div>
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="var-menu col-3">
            <h5>Mixzone</h5>
            <div class="vm-bg shadow">
              <div class="ov-con">
                <a href="<?php echo $siteurl; ?>/mix-zone-pizza-satu-pizza-dengan-dua-rasa/"><img src="<?php echo get_option('btn_mixzone'); ?>" loading="lazy" alt=""></a>
              </div>
            </div>
        </div>
        <div class="var-menu col-3">
            <h5>In & Out</h5>
            <div class="vm-bg shadow">
              <div class="ov-con">
                <a href="<?php echo $siteurl; ?>/lets-upgrade-your-mood-with-in-and-out-topping/"><img src="<?php echo get_option('btn_inout'); ?>" loading="lazy" alt=""></a>
              </div>
            </div>
        </div>
        <div class="var-menu col-3">
            <h5>Pizza Slice</h5>
            <div class="vm-bg shadow">
              <div class="ov-con">
                <a href="<?php echo $siteurl; ?>/pizza-slice/"><img src="<?php echo get_option('btn_slice'); ?>" loading="lazy" alt=""></a>
              </div>
            </div>
        </div>
        <div class="var-menu col-3">
            <h5>Calzone</h5>
            <div class="vm-bg shadow">
              <div class="ov-con">
                <a href="<?php echo $siteurl; ?>/menu"><img src="<?php echo get_option('btn_calzone'); ?>" loading="lazy" alt=""></a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <section id="section4">
  	<div>
	  	<img src="<?php echo get_option('img_mixzone'); ?>" loading="lazy">
	  	<a href="<?php echo $siteurl; ?>/mix-zone-pizza-satu-pizza-dengan-dua-rasa/"><button class="btn btn-danger shadow">Lihat Menu</button></a>
	  </div>
  	<div>
  		<img src="<?php echo get_option('img_inout'); ?>" loading="lazy">
	  	<a href="<?php echo $siteurl; ?>/lets-upgrade-your-mood-with-in-and-out-topping/"><button class="btn btn-danger shadow">Lihat Menu</button></a>
	  </div>
  	<div>
	  	<img src="<?php echo get_option('img_slice'); ?>" loading="lazy">
		  <a href="<?php echo $siteurl; ?>/pizza-slice/"><button class="btn btn-danger shadow">Lihat Menu</button></a>
	  </div>
  	<div>
  		<img src="<?php echo get_option('img_calzone'); ?>" loading="lazy">
		  <a href="<?php echo $siteurl; ?>/menu/"><button class="btn btn-danger shadow">Lihat Menu</button></a>
	  </div>
  </section>
  <section id="section5" class="container-fluid pb-5">
  	<div class="row ">
  		<div class="col-md-12 mt-5 d-flex flex-column align-items-center">
  			<h2 class="text-center mb-3 font-weight-bolder text-danger">Temukan Promo Khusus Followers!</h2>
  			<a href="https://www.instagram.com/pantiespizzaindonesia/"><button class="btn btn-danger shadow">Ikuti @pantiespizzaindonesia</button></a>
  		</div>
  		<img class="img-fluid d-block mx-auto mb-3 mt-5" src="<?php echo get_option('img_phone'); ?>" loading="lazy">
  	</div>
  </section>
  <section id="section6" class="pt-5">
    <div class="container-fluid">
    	<div class="row d-flex justify-content-center">
  	  	<h2 class="col-md-12 text-center">Harga mulai dari</h2>
  	    <h1 class="col-md-12 text-center d-flex justify-content-center">19.000</h1>
  	  </div>
  	  <div id="section-6-mui" class="mt-n2"></div>
    </div>
    <div class="pt-3 overflow-hidden">
      <?php
      #note : class for swiper controlled by app.js
        $swb = new WP_Query(array(
          'post_type' => 'page',
          'title' => 'instagram feed',
        ));
          /*=== WP LOOP === */
          if($swb->have_posts()) :
            while($swb->have_posts()) :
              $swb->the_post();
              the_content();
            endwhile; 
            wp_reset_postdata();
          endif;
        ?>
    </div>
  </section>