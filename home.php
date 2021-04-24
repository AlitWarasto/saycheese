<?php
#landing-settings.php for pantiespizza.com
#admin page settings for landing page
#saycheese theme wp
#version 1.0
?>

<?php
include(TEMPLATEPATH.'/header.php');

$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){
  include(TEMPLATEPATH.'/inc/mobile/homeM.php');
  get_footer();
} else {
  include(TEMPLATEPATH.'/inc/desktop/homeD.php');
  get_footer();
} ?>