<?php
/**
 * The template for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Coalition_Technologies
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php
			while (have_posts()): the_post();
				// if post-type products
				if(get_post_type() == 'products'):
					the_breadcrumb();
                	the_content();

                // if post-type applications
                elseif(get_post_type() == 'applications'):
                	get_template_part('partials/content-applications', get_post_type());

               // if post-type blog posts
                else:
					get_template_part('partials/content', get_post_type());

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()):
						comments_template();
					endif;
				endif;
			endwhile;
		?>
	</main>

<?php get_footer(); ?>
