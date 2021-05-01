<div id="single-page" class="container pt-3">
  <div class="row">
    <div class="col-md-8">
      <?php while (have_posts()) : the_post();
        $poslug  = $post->post_name;
        $posurl  = $siteurl.'/'.$poslug.'/';

        /*========== HARGA PERWILAYAH ============*/
        $hw1= get_post_meta($post->ID,'hargawil1',TRUE);
        $hw2= get_post_meta($post->ID,'hargawil2',TRUE);
        $hw3= get_post_meta($post->ID,'hargawil3',TRUE);

        /*================ RATING ================*/
            $rdate = $post->post_date;
            $udate = strtotime($rdate);
            $rr    = $udate+$post->ID;
            $rawr  = substr($rr,-2);
            if($rawr < 65) {
              $rating = 99-$rawr;
            } else {
              $rating = $rawr;
            }
            $raval = number_format($rating * 0.05,1);
            if ($raval < 3) {
              $raval = "3.1";
            }
            $ru = substr($rr,-4,-1);
            if($ru < 117) {
              $users = 978-$ru;
            } else {
              $users = $ru;
            }
        ?>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php # featured image galleries #
            $args = array(
              'numberposts' => -1,
              'orderby' => 'date',
              'post_mime_type' => 'image',
              'post_parent' => $post->ID,
              'post_status' => null,
              'post_type' => 'attachment',
            );
            $atts = get_children($args);
            ### IMAGE ###
            $ai = 1;
            shuffle($atts);
            foreach($atts as $att) {
              if($ai > 3) {
                break;
              } else {
                $atitle = ucwords(str_replace(array('-','_','+'),' ',$att->post_title));
                $aturl  = $posurl.$att->post_name.'/';
                $mimg   = wp_get_attachment_image_src($att->ID,'large');
                $murl   = $mimg[0];
                echo'<div class="swiper-slide"><a href="'.$aturl.'"><img class="img-fluid" src="'.$murl.'" alt="'.$atitle.'"></a></div>';
              }
              $ai++;
            }?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <h1 class="col-12 text-center font-weight-bold mt-3 mb-3"><?php the_title(); ?></h1>
        <div class="col-12 mt-2"><?php the_content(); ?></div>
        <div class="col-12 hg mb-2">
          <span>Rp.</span>
          <span><?php if ($hw1){echo number_format($hw1,0,',','.');} else {echo "-";} ?></span>
          <span class="hinfo">Info Harga Wilayah</span>
          <span id="users" class="star love"><img class="img-fluid"src="<?php echo $themeurl ?>/img/love0.svg"></span>
          <span class="users float-right ml-2 text-muted"><?php echo $users; ?></span>
          <span id="star" class="star"><img class="img-fluid"src="<?php echo $themeurl ?>/img/star.svg"></span>
          <span class="rating"><?php echo $raval; ?></span>
        </div>
        <!-- Toast Info Harga -->
        <div id="info-harga" class="toast fade hide position-absolute col-12" data-autohide="false" style="width: 87vw;bottom: 30vh;background-color: white;z-index: 9;right: 50%;transform: translate(50%, 13%);box-shadow: 2px 5px 59px 25px rgb(0 0 0 / 39%);">
          <div class="toast-header">
            <strong class="mr-auto text-primary">Harga</strong>
            <a class="tAng" href="<?php echo $siteurl; ?>/info-wilayah-panties-pizza-indonesia/">
              <small>Info Wilayah</small>
            </a>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
          </div>
          <div class="toast-body position-relative">
            <p>Harga Wilayah 1 : 
              <span class="hg">Rp. <?php if ($hw1){echo number_format($hw1,0,',','.');} else {echo "-";} ?></span>
            </p>
            <p>Harga Wilayah 2 : <span class="hg">Rp. <?php if ($hw1){echo number_format($hw2,0,',','.');} else {echo "-";} ?></span></p>
            <p>Harga Wilayah 3 : <span class="hg">Rp. <?php if ($hw1){echo number_format($hw3,0,',','.');} else {echo "-";} ?></span></p>
          </div>
        </div>
        <!-- Toast Rating Star -->
        <div id="rating-star" class="toast fade hide position-absolute" data-autohide="false" style="width: 70vw;bottom: 30vh;background-color: white;z-index: 9;right: 50%;transform: translate(50%, 0);box-shadow: 2px 5px 59px 25px rgb(0 0 0 / 39%);">
          <div class="toast-header">
            <strong class="mr-auto text-primary">5 star if you like it</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
          </div>
          <div class="toast-body position-relative">
            <div class="stars d-flex justify-content-center">
              <input type="radio" id="star1" name="rating" value="1" /><input type="radio" id="star2" name="rating" value="2" /><input type="radio" id="star3" name="rating" value="3" /><input type="radio" id="star4" name="rating" value="4" /><input type="radio" id="star5" name="rating" value="5" />
              
              <label for="star1" aria-label="Banana">1 star</label><label for="star2">2 stars</label><label for="star3">3 stars</label><label for="star4">4 stars</label><label for="star5">5 stars</label>
            </div>
          </div>
        </div>
        <div class="col-12 d-flex justify-content-between align-items-center mb-2" style="font-size:x-small;font-weight:bold;">
          <span>Categories:
            <?php
            $i = 1;
            $cats = get_the_category();
            $catname = '';
            $catlink = '';
            foreach ($cats as $cat) {
              if ($i > 3) {
                break;
              } else {
                $catname = $cat->name;
                $catlink = get_category_link($cat->term_id); ?>
                <a href="<?php echo $catlink; ?>" style="color: #8e8e8e;"><?php echo $catname; ?>, </a>
                <?php
              } 
              $i++;
            }?>
          </span>
          <a href="<?php echo $siteurl.'/product/'.$poslug ?>"><button type="button" class="woofeature btn btn-success btn-size">Order Now</button></a>
        </div>
        <?php
        include(TEMPLATEPATH.'/inc/schema.php');
      endwhile;
      ?>
    </div>
      <div class="col-md-4">
        <?php include(TEMPLATEPATH.'/sidebar-menu.php');?>
      </div>
  </div>
  <hr>
  <?php
  ########### BREADCRUMB ##########
  #current url
  global $wp;
  $cPostUrl = home_url(add_query_arg(array(), $wp->request));
  //Get post type    
  $post_type_obj = get_post_type_object( get_post_type() );
  //Get post type's label
  $artitle       = apply_filters('post_type_archive_title', $post_type_obj->labels->name );        
  $archive_title = apply_filters('post_type_archive_title', $post_type_obj->labels->all_items);
  ?>
  <div class="bc text-body mb-2">
    <ul class="pl-0" vocab="https://schema.org/" typeof="BreadcrumbList">
      <li><a href="<?php echo $siteurl; ?>"><span>Home</span> &rsaquo;</a></li>
      <li property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="<?php echo get_post_type_archive_link('menu') ?>">
         <span property="name"><?php echo $artitle; ?></span> &rsaquo;</a>
         <meta property="position" content="1">
      </li>
      <li property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="<?php echo $cPostUrl;?>">
        <span property="name"><?php the_title();?></span></a>
        <meta property="position" content="2">
      </li>
    </ul>
  </div>
</div>