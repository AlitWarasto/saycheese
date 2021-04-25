<?php
#home.php for pantiespizza.com
#landing page for pantiespizza.com
#saycheese theme wp
#version 1.0
?>

<?php
include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
  include(TEMPLATEPATH.'/inc/mobile/homeM.php');
} else {
  include(TEMPLATEPATH.'/inc/desktop/homeD.php');
} 
get_footer();
?>