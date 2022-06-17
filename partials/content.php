<?php
/**
 * Template-Part for displaying Blog Post in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Entry Content -->
	<div class="entry-content">
		<section class="sec-blog">
			<div class="container">
				<?php the_breadcrumb(); ?>

				<!-- Sidebar Toggle Button -->
				<div class="mobile-sidebar-button d-block d-xl-none">
					<a href="javascript:;">
						<div>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
						<label>Sidebar</label>
					</a>
				</div>
				<!-- Button End-->

				<div class="row justify-content-between">
					<!-- Content -->
					<div class="col-12 col-xl-8">
						<?php the_post_thumbnail(); ?>

						<div class="blog-details">
							<?php echo sharethis_inline_buttons(); ?>
							<p><?php the_date(); ?></p>
							<h2 class="my-4"><?php the_title(); ?></h2>
							<?php the_category(); ?>
						</div>

						<div class="blog-content">
							<?php
								the_content(
									sprintf(
										wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
											__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ct' ),
											array(
												'span' => array(
													'class' => array(),
												),
											)
										),
										wp_kses_post( get_the_title() )
									)
								);

								wp_link_pages(
									array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ct' ),
										'after'  => '</div>',
									)
								);
							?>
						</div>
					</div>
					<!-- Content End -->

					<!-- Desktop Siderbar -->
						<div class="col-3 desktop-sidebar d-none d-xl-block">
							<?php get_sidebar(); ?>
						</div>
					<!-- Desktop Sidebar End-->
				</div>

				<!-- Mobile Sidebar -->
					<div class="mobile-sidebar d-block d-xl-none">
						<?php get_template_part('sidebar'); ?>
					</div>
				<!-- Mobile Sidebar End-->
			</div>			
		</section>
	</div>
	<!-- Entry Content End -->
</article>
