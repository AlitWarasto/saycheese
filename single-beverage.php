<?php
#single-beverage.php for pantiespizza.com
#saycheese theme wp
#version 1.0
?>

<?php
include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
  include(TEMPLATEPATH.'/inc/mobile/singleBeverageM.php');
} else {
  include(TEMPLATEPATH.'/inc/desktop/singleBeverageD.php');
}
get_footer();
?>