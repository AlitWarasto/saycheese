<?php get_header(); ?>

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
            /* TITLE + DATE + AUTHOR */
            $title   = $post->post_title;
            $poslug  = $post->post_name;
            $posurl  = $siteurl.'/'.$poslug.'/';
            $args = array(
              'numberposts' => -1,
              'orderby' => 'date',
              'post_mime_type' => 'image',
              'post_parent' => $post->ID,
              'post_status' => null,
              'post_type' => 'attachment',
            );
            $atts = get_children($args);
            if ( $detect->isMobile() && !$detect->isTablet() ){
              /*=== IMAGE MOBILE ===*/
              $ai = 1;
                foreach($atts as $att) {
                if($ai > 3) {
                  break;
                } elseif ($ai > 0) {
                  $atitle = ucwords(str_replace(array('-','_','+'),' ',$atts->post_title));
                  $aturl  = $posurl.$att->post_name.'/';
                  $malt   = $atitle.' '.$title.' '.$katname;
                  $mimg   = wp_get_attachment_image_src($att->ID,'mobile');
                  $murl   = $mimg[0];
                  echo '
                  <div class="swiper-slide"><img class="img-mobile" src="'.$murl.'" alt="'.$malt.'"></div>
                  ';
                } else {}
                  $ai++;
                }
              } else {
                /*=== IMAGE DESKTOP ===*/
                $ai = 1;
                foreach($atts as $att) {
                if($ai > 3) {
                  break;
                } elseif ($ai > 0) {
                  $atitle = ucwords(str_replace(array('-','_','+'),' ',$atts->post_title));
                  $aturl  = $posurl.$att->post_name.'/';
                  $malt   = $atitle.' '.$title.' '.$katname;
                  $mimg   = wp_get_attachment_image_src($att->ID,'full');
                  $murl   = $mimg[0];
                  echo'
                  <div class="swiper-slide"><img class="img-full" src="'.$murl.'" alt="'.$malt.'"></div>';
                } else {}
                $ai++;
              }
            }
          endwhile; 
          wp_reset_postdata();
        endif;
      ?>
    </div>
  	
  </div>

<?php get_footer(); ?>