<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coalition_Technologies
 */

?>

</div><!-- #content -->

<section id="light-box">
	<div class="container">
		<div class="content-wrapper">
			<span id="close">
				<i class="fas fa-times-circle fa-2x"></i>
			</span>
			<?php echo do_shortcode('[gravityform id="3" ajax="true" tabindex="49"]', false ); ?>
		</div>
	</div>
</section>

<footer id="colophon" class="site-footer">
	<div class="main-footer">

		<!-- Navigations & Contact Details -->
		<div class="container py-5">
			<div class="row justify-content-between">

				<!-- Logo, Contact Details & Social Icons -->
				<div class="col-md-5 col-lg-3">
					<div class="info-wrapper">
						<!-- LOGO -->
						<?php 
							if(get_field('footer-logo', 'option')):
							 $footer_logo = get_field('footer-logo', 'option');	
						?>
							<div class="logo-wrapper">
								<?php echo wp_get_attachment_image($footer_logo); ?>
							</div>
						<?php endif; ?>
						<!-- LOGO End -->

						<div class="mt-4">
							<!-- Contact Details -->
							<ul class="contact-details">
								<?php if(get_field('email-address', 'option')): ?>
									<li class= "d-flex">
										<span><i class="fas fa-envelope"></i></span>
										<span class="ms-2">
											<a href="mailto:<?php the_field('email-address', 'option'); ?>">
												<?php the_field('email-address', 'option'); ?>
											</a>
										</span>
									</li>
								<?php endif; ?>

								<?php if(get_field('phone-number', 'option')): ?>
									<li class= "d-flex">
										<span><i class="fas fa-phone-alt"></i></span>
										<span class="ms-2">
											<a href="tel:<?php the_field('phone-number', 'option'); ?>">
												<?php the_field('phone-number', 'option'); ?>
											</a>
										</span>
									</li>
								<?php endif; ?>

								<?php if(get_field('postal-address', 'option')): ?>
									<li class= "d-flex">
										<span><i class="fas fa-map-marker-alt"></i></span>
										<span class="ms-2"><?php the_field('postal-address', 'option'); ?></span>
									</li>
								<?php endif; ?>
							</ul>
							<!-- Contact Details End -->

							<!-- Social Icons -->
							<?php if(have_rows('social-media-profiles', 'option')): ?>
								<ul class="social-icons mt-4">
									<?php while(have_rows('social-media-profiles', 'option')): the_row();
										if (get_sub_field('visibility') == true):
									?>
										<li>
											<a href="<?php the_sub_field('url'); ?>" target="_blank">
												<?php the_sub_field('icon'); ?>
											</a>
										</li>
									<?php endif; endwhile; ?>
								</ul>
							<?php endif; ?>
							<!-- Social Icons End-->
						</div>
					</div>
				</div>
				<!-- Logo, Contact Details & Social Icons End -->

				<!-- Navigations-->
				<div class="col-md-6 col-lg-7 col-xl-8">
					<div class="masonry-layout">
						<?php
							if(is_active_sidebar('footer-1')){
								dynamic_sidebar( 'footer-1' );
							}

							if(is_active_sidebar('footer-2')){
								dynamic_sidebar( 'footer-2' );
							}

							if(is_active_sidebar('footer-3')){
								dynamic_sidebar( 'footer-3' );
							}

							if(is_active_sidebar('footer-4')){
								dynamic_sidebar( 'footer-4' );
							}

							if(is_active_sidebar('footer-5')){
								dynamic_sidebar( 'footer-5' );
							}
						?>
					</div>
				</div>
				<!-- Navigations End-->
			</div>
		</div>
		<!-- Navigations & Contact Details End -->

		<!-- Certficate Icons -->
		<?php if(have_rows('certificates', 'option')): ?>
			<div class="c-icons">
				<div class="container">
					<div>
						<ul>
							<?php
								while(have_rows('certificates', 'option')): the_row();
									if (get_sub_field('visibility') == true):
										$icon = get_sub_field('certificate-icon');
								?>
									<li><?php echo wp_get_attachment_image($icon); ?></li>
							<?php endif; endwhile; ?>
						</ul>
					</div>
				</div>
			</div>	
		<?php endif; ?>
		<!-- Certficate Icons End-->

		<!-- Copyrights -->
		<?php if(get_field('copyright', 'option')): ?>
			<div class="copy-right">
				<div class="container">
					<?php $copyright = get_field('copyright', 'option'); ?>
					<p>&copy; 2015 - <?php echo date('Y') . ' ' . $copyright; ?><p>
				</div>
			</div>	
		<?php endif; ?>
		<!-- Copyrights End-->
	</div>
</footer>

<!-- Back to Top -->
<div class="back-to-top">
	<div>
		<svg class="Icon Icon--arrow-top" role="presentation" viewBox="0 0 21 11">
     		<polyline fill="none" stroke="currentColor" points="20.5 10.5 10.5 0.5 0.5 10.5" stroke-width="1.25"></polyline>
   		</svg>
	</div>
	<div>
		<p>Top</p>
	</div>
</div>

</div><!-- #site-wrapper -->
</div><!-- #page -->
<?php wp_footer(); ?>
<?php the_field('footer_code', 'option'); ?>
<script src="//instant.page/5.1.0" type="module" integrity="sha384-by67kQnR+pyfy8yWP4kPO12fHKRLHZPfEsiSXR8u2IKcTdxD805MGUXBzVPnkLHw"></script>
</body>
</html>


