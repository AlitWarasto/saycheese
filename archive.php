<?php
#archive.php for pantiespizza.com
#saycheese theme wp
#version 1.0

if(is_category()) {
  $postTitle = $wp_query->queried_object->name;
  $pageLink  = $siteurl.'/category/'.$wp_query->queried_object->slug .'/';
} elseif(is_tag()) {
  $postTitle = ucwords($wp_query->queried_object->name);
  $pageLink  = $siteurl.'/tag/'.$wp_query->queried_object->slug .'/';
} elseif(is_day()) {
  $postTitle = date('F', mktime(0,0,0,$wp_query->query_vars['monthnum'],1,$wp_query->query_vars['year'])).' '.$wp_query->query_vars['day'].', '.$wp_query->query_vars['year'].' Archive';
  $pageLink  = $siteurl.'/'.$wp_query->query_vars['year'].'/'.$wp_query->query_vars['monthnum'].'/'.$wp_query->query_vars['day'].'/';
} elseif(is_month()) {
  $postTitle = date('F', mktime(0,0,0,$wp_query->query_vars['monthnum'],1,$wp_query->query_vars['year'])).', '.$wp_query->query_vars['year'].' Archive';
  $pageLink  = $siteurl.'/'.$wp_query->query_vars['year'].'/'.$wp_query->query_vars['monthnum'].'/';
} elseif(is_year()) {
  $postTitle = $wp_query->query_vars['year'].' Archive';
  $pageLink  = $siteurl.'/'.$wp_query->query_vars['year'].'/';
} elseif(is_author()) {
  $authname = $wp_query->queried_object->data->display_name;
  $postTitle   = $wp_query->queried_object->data->display_name.'&#8217;s Articles';
  $pageLink    = $siteurl.'/author/'.$wp_query->query_vars['author_name'].'/';
} else {
  $postTitle = '';
  $pageLink  = '';
}

/* PAGE NUMBER  */
if($paged) {
  $pnum = ' Page '.$paged.'';
} else {
  $pnum = '';
}

/* Random Query 
$offset = mt_rand(1,($allposts-7));
$rq     = new WP_Query('posts_per_page=7');*/
?>

<?php
include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
  include(TEMPLATEPATH.'/inc/mobile/archiveM.php');
} else {
  include(TEMPLATEPATH.'/inc/desktop/archiveD.php');
}
get_footer();
?>