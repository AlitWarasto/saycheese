<?php
$detect = new Mobile_Detect; #mobile detect#
if ( $detect->isMobile() && !$detect->isTablet() ){ #mobile only
	include(TEMPLATEPATH.'/inc/mobile/headerM.php');
} else { #desktop
	include(TEMPLATEPATH.'/inc/desktop/headerD.php');
}
?>