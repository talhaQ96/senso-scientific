<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coalition_Technologies
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<?php wp_head(); ?>
	<?php the_field('header_code', 'option'); ?>
</head>
<body>
	<?php wp_body_open(); ?>
	<div id="page">
		<div id="site-wrapper" <?php body_class('site'); ?>>
			<!-- Top Blue Bar -->
			<div class="top-nav">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-5 m-0 d-none d-lg-block">
							<ul>
								<?php if(get_field('email-address', 'option')): ?>
									<li>
										<span><i class="fas fa-envelope"></i></span>
										<span>
											<a href="mailto:<?php the_field('email-address', 'option'); ?>">
												<?php the_field('email-address', 'option'); ?>
											</a>
										</span>
									</li>
								<?php endif; ?>

								<?php if(get_field('phone-number', 'option')): ?>
									<li class="ms-4">
										<span><i class="fas fa-phone-alt"></i></span>
										<span>
											<a href="tel:<?php the_field('phone-number', 'option'); ?>">
												<?php the_field('phone-number', 'option'); ?>
											</a>
										</span>
									</li>
								<?php endif; ?>
							</ul>
						</div>

						<div class="col-12 col-lg-7 m-0 d-flex justify-content-center justify-content-lg-end align-items-center ct-widget">
							<?php if(is_active_sidebar('top-nav-bar')): ?>
								<?php dynamic_sidebar( 'top-nav-bar'); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Top Blue Bar End -->

			<!-- Header -->
			<header id="masthead" class="site-header">
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<!-- Display logo if selected in CT Settings -->
						<?php 
							if(get_field('header-logo', 'option')):
								$header_logo = get_field('header-logo', 'option');
						?>
								<div class="col-7 col-sm-6 col-md-5 col-lg-4">
									<a href="<?php echo get_site_url(); ?>" class="d-block">
										<?php echo wp_get_attachment_image($header_logo); ?>
									</a>
								</div>
						<?php endif; ?>

						<!-- Navigation Menu-->
						<div class="col-5 col-lg-8">
							<nav id="site-navigation" class="main-navigation">
								<?php
									$primary_menu = array('theme_location' => 'primary');
									wp_nav_menu($primary_menu);
								?>
							</nav>
						</div>
					</div>
				</div>
			</header>
			<!-- Header End-->


			<div id="content" class="site-content">
