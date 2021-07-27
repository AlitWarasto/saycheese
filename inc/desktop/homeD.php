  <style type="text/css">
    #section4 #bgYL{
      background-image: url("<?php echo $themeurl ?>/img/desktop/yellowwave.svg");
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <section id="section1" class="container position-relative pl-0 pr-0">
    <div id="aksen" class="aksen col-md-12 pl-0 pr-0">
      <img class="img-fluid" src="<?php echo $themeurl ?>/img/desktop/aksen.svg">
    </div>
    <div class="swiper-container">
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
                <div class="swiper-slide"><a href="<?php echo $posurl; ?>"><?php the_post_thumbnail('full', array( 'class' => 'img-fluid' )); ?></a></div>
              <?php
              }
            endwhile; 
            wp_reset_postdata();
          endif;
          ?>
      </div>
    </div>
  </section>
  <section id="section2" class="container pl-0 pr-0">
    <div class="row prl15">
      <div class="col-md-12 bgRed d-flex flex-column align-items-center mt-auto mb-auto  pt-3 pb-3">
        <h5 class="h2 col-md-8 text-center text-light">Harga mulai dari</h5>
        <h4 class="h1 col-md-6 text-light text-center">19.000</h4>
        <div class="col-md-12 row justify-content-center">
          <h6 class="col-md-5 text-center text-light">Selalu menggunakan keju yang berkualitas dan berserfikat HALAL dari MUI, serta memiliki 20 lebih varian rasa</h6>
        </div>
      </div>
    </div>
  </section>
  <section id="section3" class="container pl-0 pr-0">
    <div class="row prl15">
      <div class="col-md-12 bgRedOld pt-3 pb-5">
        <div class="d-flex flex-column align-items-center">
          <h3 class="h1 text-light font-weight-bolder mb-3">Our Special Menu</h3>
        </div>
        <div class="col-md-12 bgRedOld d-flex flex-row justify-content-center">
          <div class="btnMenu">
            <div class="col bg-light">
              <a href="<?php echo $siteurl ?>/menu/"><img class="img-fluid" src="<?php echo get_option('btn_mixzone'); ?>"></a>
            </div>
            <p class="text-light text-center font-weight-bold mt-3">MixZone</p>
          </div>
          <div class="btnMenu">
            <div class="col bg-light">
              <a href="<?php echo $siteurl ?>/menu/"><img class="img-fluid" src="<?php echo get_option('btn_inout'); ?>"></a>
            </div>
            <p class="text-light text-center font-weight-bold mt-3">In and Out</p>
          </div>
          <div class="btnMenu">
            <div class="col bg-light">
              <a href="<?php echo $siteurl ?>/pizza-slice/"><img class="img-fluid" src="<?php echo get_option('btn_slice'); ?>"></a>
            </div>
            <p class="text-light text-center font-weight-bold mt-3">Pizza Slice</p>
          </div>
          <div class="btnMenu">
            <div class="col bg-light">
              <a href="<?php echo $siteurl ?>/menu/"><img class="img-fluid" src="<?php echo get_option('btn_calzone'); ?>"></a>
            </div>
            <p class="text-light text-center font-weight-bold mt-3">Calzone</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="section4" class="container pl-0 pr-0">
    <div class="row prl15">
      <div id="bgYL"class="col-md-12 pt-3 pb-5">
        <div id="bgRedOld"class="bgRedOld"></div>
        <div class="col-md-10 mr-auto ml-auto mt-5">
          <h3 class="h5 text-left font-weight-bolder">VIDEO</h3>
        </div>
        <div class="col-md-10 mr-auto ml-auto mt-3 d-flex justify-content-between">
          <div class="col-md-6 embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item pr-2 pl-1" src="https://www.youtube.com/embed/_eUozyB3HVM" title="Panties Pizza Review by Nex Carlos" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="col-md-6 embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item pr-1 pl-2" src="https://www.youtube.com/embed/GJNRQerkC3U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="section5" class="container pl-0 pr-0">
    <div class="row">
      <div class="col-md-12">
        <div class="bgYL col-md-12 pt-4 pb-4"></div>
        <div class="d-flex justify-content-center pb-5">
          <div class="col-md-5">
            <img id="img_phone" class="img-fluid" src="<?php echo get_option('img_phone'); ?>">
          </div>
          <div class="col-md-7 mt-4">
            <h4 class="h1 font-weight-bolder cRed">Temukan Promo <br>Khusus Followers !</h4>
            <a href=""><button class="btn btn-warning font-weight-bold">Follow @pantiespizzaindonesia</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="section6" class="container pl-0 pr-0">
    <div class="row">
      <div class="overflow-hidden">
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
    </div>
  </section>