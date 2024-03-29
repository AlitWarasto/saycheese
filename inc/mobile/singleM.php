<div class="loader">
  <div class="spinner-border text-warning"></div>
  <div class="lo">Loading..</div>
</div>
<div id="single-page" class="container pt-3">
  <div class="row">
    <?php
    while (have_posts()) : the_post();
    ?>
      <h1 class="col text-center"><?php the_title(); ?></h1>
      <hr>
      <?php 
      #featured image
      if ( has_post_thumbnail() and in_category('Expired Promo')) { ?>
        <a class="position-relative overflow-hidden" href="<?php echo $posurl; ?>"><?php the_post_thumbnail('large', array( 'class' => 'img-fluid' )); ?>
          <div class="expromo-sg">
            <p>Promo Berakhir</p>
          </div>
        </a>
      <?php } else { ?>
        <a href="<?php echo $posurl; ?>"><?php the_post_thumbnail('large', array( 'class' => 'img-fluid' )); ?></a>
      <?php
      }
      ?>
      <div class="col-12 mt-2"><?php the_content(); ?></div>
      <div class="col-12 d-flex flex-row justify-content-between mb-2">
        <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>">
          <div style="font-size:x-small;color: #8e8e8e;">Publised <?php the_time('F j, Y') ?></div>
        </a>
        <div style="font-size:x-small;font-weight:bold;">Category: 
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
        </div>
      </div>
      <?php
    endwhile;
     ?>
  </div>
  <?php include(TEMPLATEPATH.'/sidebar.php'); ?>
  <?php 
  ########### BREADCRUMB ##########
  /* CATEGORY */
  $cats    = get_the_category();
  $catname = $cats[0]->name;
  $catslug = $cats[0]->slug;
  global $wp;
  $cPostUrl = home_url(add_query_arg(array(), $wp->request));
  ?>
  <hr>
  <div class="bc text-body mb-2">
    <ul class="pl-0" vocab="https://schema.org/" typeof="BreadcrumbList">
      <li><a href="<?php echo $siteurl; ?>"><span>Home</span> &rsaquo;</a></li>
      <li property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="<?php echo $siteurl.'/category/'.$catslug.'/' ?>">
         <span property="name"><?php echo $catname; ?></span> &rsaquo;</a>
         <meta property="position" content="1">
      </li>
      <li property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="<?php echo $cPostUrl; ?>">
        <span property="name"><?php the_title();?></span></a>
        <meta property="position" content="2">
      </li>
    </ul>
  </div>
</div>