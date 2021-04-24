		<?php
		$detect = new Mobile_Detect; #mobile detect#
		if ( $detect->isMobile() && !$detect->isTablet() ){ 
			include(TEMPLATEPATH.'/inc/mobile/footerM.php');
		} else {
			include(TEMPLATEPATH.'/inc/desktop/footerD.php');
		}
		wp_footer();
		?>
	</body>
</html>