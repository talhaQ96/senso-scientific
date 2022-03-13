<?php
/**
 * Template for displaying blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */

get_header();
?>

	<main id="primary" class="site-main archive">
		<?php
			if(have_posts()):
				if(is_home() && !is_front_page()):
		?>
					<section class="post-grid content pt-0">
						<div class="container">
							<?php the_breadcrumb(); ?>

							<div class="mt-4">
								<?php get_template_part('partials/archives/content'); ?>
							</div>
						</div>
					</section>
		<?php
				endif;

			else:
				get_template_part('partials/content', 'none');
				
			endif;
		?>
	</main>

<?php get_footer(); ?>
