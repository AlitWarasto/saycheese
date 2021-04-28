<?php
#archive-pizza-slice.php for pantiespizza.com
#saycheese theme wp
#version 1.0

include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
  include(TEMPLATEPATH.'/inc/mobile/archivePizzaSliceM.php');
} else {
  include(TEMPLATEPATH.'/inc/desktop/archivePizzaSliceD.php');
}
get_footer();
?>