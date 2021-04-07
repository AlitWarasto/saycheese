<?php
#sidebar.php for pantiespizza.com
#saycheese theme wp
#version 1.0

/* Random Query 
$offset = mt_rand(1,($allposts-4));
$rq     = new WP_Query('posts_per_page=4');
print_r($allposts);*/
?>

<?php
$sbpost = new WP_Query('posts_per_page=5');
?>
<hr>
<div id="sidebar" class="row">
  <h2 class="col-12 text-center">Latest News</h2>
    <?php
    if($sbpost->have_posts()) :
      while ($sbpost->have_posts()) : $sbpost->the_post();?>
        <div class="sidebar-list col-6 mb-2">
          <?php
        	$poslug  = $post->post_name;
          $posurl  = $siteurl.'/'.$poslug.'/';
          #featured image
          if ( has_post_thumbnail()) { ?>
            <a href="<?php echo $posurl; ?>"><?php the_post_thumbnail('thumbnail', array( 'class' => 'img-fluid' )); ?></a>
          <?php
        	}
          ?>
          <a href="<?php echo $posurl; ?>">
            <h3 class="mt-2 mb-0 ww overflow-hidden" ><?php the_title(); ?></h3>
          </a>
          <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>" class="" style="color: #8e8e8e;font-size: x-small;"><?php the_time('F j, Y') ?></a>
        </div>
        <?php
      endwhile;
      wp_reset_postdata();
    endif;
     ?>
</div>