<?php
#archive-beverage.php for pantiespizza.com
#saycheese theme wp
#version 1.0

include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
  include(TEMPLATEPATH.'/inc/mobile/archiveBeverageM.php');
} else {
  include(TEMPLATEPATH.'/inc/desktop/archiveBeverageD.php');
}
get_footer();
?>