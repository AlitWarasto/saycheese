<?php get_header(); ?>

<div class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>

<div class="swiper-container">
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
            } else {}
          endwhile; 
          wp_reset_postdata();
        endif;
      ?>
    </div>
  	<!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
    <!-- Swiper JS -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
            pagination: {
              el: '.swiper-pagination',
              dynamicBullets: true,
            },
        });
  </script>
  </div>

<?php get_footer(); ?>