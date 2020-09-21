<?php
/**
 * This template for displaying footer part
 *
 * @package Mombo
 * @since 1.0
 */

/**
 * Footer Part show/hide condition
 *
 * @since 1.0
 */
if ( get_post_meta(get_the_ID(), 'mombo_mb_footer_part', true) == 'hide' ) return; ?>

<!-- Footer-->
<footer class="dark-bg footer">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-12 m-15px-tb mr-auto">
					<div class="m-20px-b">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-light.svg" title="" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 m-15px-tb">
					<h6 class="white-color">
						Useful
					</h6>
					<ul class="list-unstyled links-white footer-link-1">
						<li>
							<a href="#">Web Design</a>
						</li>
						<li>
							<a href="#">Development</a>
						</li>
						<li>
							<a href="#">Wordpress</a>
						</li>
						<li>
							<a href="#">Online Marketing</a>
						</li>
						<li>
							<a href="#">SEO Marketing</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-sm-6 m-15px-tb">
					<h6 class="white-color">
						About Us
					</h6>
					<ul class="list-unstyled links-white footer-link-1">
						<li>
							<a href="#">Support Center</a>
						</li>
						<li>
							<a href="#">Customer Support</a>
						</li>
						<li>
							<a href="#">About Us</a>
						</li>
						<li>
							<a href="#">Copyright</a>
						</li>
						<li>
							<a href="#">Popular Campaign</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-sm-6 m-15px-tb">
					<h6 class="white-color">
						Information
					</h6>
					<address>
						<p class="white-color-light m-5px-b">301 The Greenhouse London,<br> E2 8DY UK</p>
						<p class="m-5px-b"><a class="theme2nd-color border-bottom-1 border-color-theme2nd" href="mailto:support@domain.com">support@domain.com</a></p>
						<p class="m-5px-b"><a class="theme2nd-color border-bottom-1 border-color-theme2nd" href="tel:820-885-3321">820-885-3321</a></p>
					</address>
					<div class="social-icon si-30 theme2nd nav">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-linkedin-in"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom footer-border-light">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center text-md-right">
					<ul class="nav justify-content-center justify-content-md-start m-5px-tb links-white font-small footer-link-1">
						<li><a href="#">Privace &amp; Policy</a></li>
						<li><a href="#">Faq's</a></li>
						<li><a href="#">Get a Quote</a></li>
					</ul>
				</div>
				<div class="col-md-6 text-center text-md-right">
					<p class="m-0px font-small white-color-light">© 2019 copyright all right reserved</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- footer End -->