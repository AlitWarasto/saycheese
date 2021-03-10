<?php 
get_header();

if (have_posts()) : 
  while (have_posts()) : the_post();
/*------------------------------------------ Content ----------------------------------*/
    echo "<h1 class='text-center'>".$post->post_title."</h1>";
    echo $post->post_content;
  endwhile; 
endif;



get_footer();
 ?>