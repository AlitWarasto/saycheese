		<?php
		$detect = new Mobile_Detect; #mobile detect#
		if ( $detect->isMobile() && !$detect->isTablet() ){ ?>
			<footer class="pt-3">
				<div class="container-fluid">
					<section class="row">
						<div class="col-7">
							<h6>Panties Pizza Indonesia</h6>
							<ul class="list-unstyled">
								<li><a href="<?php echo get_site_url(); ?>/contact/">Hubungi Kami</a></li>
								<li><a href="<?php echo get_site_url(); ?>/about/">Tentang Kami</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="<?php echo get_site_url(); ?>/branch/">Cabang</a></li>
								<li><a href="<?php echo get_site_url(); ?>/program-kemitran-panties-pizza/">Kemitraan</a></li>
							</ul>
						</div>
						<div class="col-5">
							<h6>Social Media</h6>
							<ul class="sm list-unstyled d-flex justify-content-around">
								<a href="#"><li class="ig"></li></a>
								<a href="#"><li class="tk"></li></a>
								<a href="#"><li class="tw"></li></a>
								<a href="#"><li class="fb"></li></a>
							</ul>
							<ul class="sm list-unstyled d-flex justify-content-around">
								<a href="#"><li class=""></li></a>
								<a href="#"><li class="ln">@pantiespizzaid</li></a>
							</ul>
						</div>
					</section>
					<section id="fs2" class="row pt-3 pb-3">
						<div class="col-6"> &#169; 2021 Panties Pizza Indonesia</div>
						<div class="col-6 d-flex flex-column align-items-end">
							<a href="<?php echo get_site_url(); ?>/privacy-policy/">Kebijakan Privasi</a>
							<a href="#">Credit</a>
						</div>
					</section>
				</div>
			</footer>
		<?php } else { ?>
		<footer class="container">
			<div class="row">
				<div class="col-md-12 bgGrey pt-3">
					<section class="">
						<div class="col-7">
							<h6>Panties Pizza Indonesia</h6>
							<ul class="list-unstyled">
								<li><a href="<?php echo get_site_url(); ?>/contact/">Hubungi Kami</a></li>
								<li><a href="<?php echo get_site_url(); ?>/about/">Tentang Kami</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="<?php echo get_site_url(); ?>/branch/">Cabang</a></li>
								<li><a href="<?php echo get_site_url(); ?>/program-kemitran-panties-pizza/">Kemitraan</a></li>
							</ul>
							
						</div>
						<div class="col-5">
							<h6>Social Media</h6>
							<ul class="sm list-unstyled d-flex justify-content-around">
								<a href="#"><li class="ig"></li></a>
								<a href="#"><li class="tk"></li></a>
								<a href="#"><li class="tw"></li></a>
								<a href="#"><li class="fb"></li></a>
							</ul>
							<ul class="sm list-unstyled d-flex justify-content-around">
								<a href="#"><li class=""></li></a>
								<a href="#"><li class="ln">@pantiespizzaid</li></a>
							</ul>
						</div>
					</section>
					<section id="fs2" class="row pt-3 pb-3">
						<div class="col-6"> &#169; 2021 Panties Pizza Indonesia</div>
						<div class="col-6 d-flex flex-column align-items-end">
							<a href="<?php echo get_site_url(); ?>/privacy-policy/">Kebijakan Privasi</a>
							<a href="#">Credit</a>
						</div>
					</section>
				</div>
			</div>
		</footer>
		<?php } wp_footer(); ?>
	</body>
</html>