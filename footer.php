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
				<div class="col-md-12 d-flex bgGrey pt-3">
					<div class="col-md-8">
						<h6 class="h4 font-weight-bold">Panties Pizza Indonesia</h6>
						<ul class="list-unstyled">
							<li><a href="<?php echo get_site_url(); ?>/contact/">Hubungi Kami</a></li>
							<li><a href="<?php echo get_site_url(); ?>/about/">Tentang Kami</a></li>
						</ul>
						<ul class="list-unstyled">
							<li><a href="<?php echo get_site_url(); ?>/branch/">Cabang</a></li>
							<li><a href="<?php echo get_site_url(); ?>/program-kemitran-panties-pizza/">Kemitraan</a></li>
						</ul>
					</div>
					<div class="col-md-4 d-flex align-items-center justify-content-center">
						<img class="img-fluid col-md-8" src="<?php echo get_template_directory_uri(); ?>/img/desktop/logo-panties-pizza.png">
					</div>
				</div>
				<div class="col-md-12 d-flex bgGrey pt-3">
					<div class="col-md-8">
						<ul class="sm list-unstyled d-flex justify-content-start">
							<li class="mr-3"><a href="#"><span class="ig "></span></a></li>
							<li class="mr-3"><a href="#"><span class="tk "></span></a></li>
							<li class="mr-3"><a href="#"><span class="tw "></span></a></li>
							<li class="mr-3"><a href="#"><span class="fb "></span></a></li>
						</ul>
					</div>
					<div class="sm col-md-4">
						<ul class="list-unstyled d-flex justify-content-start">
							<li class="mr-3"><a href="#"><span></span><span>pantiespizza.com</span></a></li>
							<li class="ln pl-0 position-relative"><a href="#"><span></span><span>@pantiespizzaid</span></a></li>
						</ul>
					</div>
				</div>
				<div id="fs2" class="col-md-12 d-flex justify-content-between pt-3 pb-3">
					<div class="col-6 text-light"> &#169; 2021 Panties Pizza Indonesia</div>
					<div class="col-6 d-flex flex-column align-items-end">
						<a href="<?php echo get_site_url(); ?>/privacy-policy/">Kebijakan Privasi</a>
						<a href="#">Credit</a>
					</div>
				</div>
		</footer>
		<?php } wp_footer(); ?>
	</body>
</html>