<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Coalition_Technologies
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="error-404 not-found content">
		<div class="container text-center">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<header class="page-header">
						<h1 class="mb-4"><?php esc_html_e('404 Oops', 'ct' ); ?></h1>
					</header>
	
					<div class="page-content">
						<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ct'); ?></p>
						<?php get_search_form(); ?>
						<a href="<?php echo get_site_url(); ?>" class="button">Go Back To Home</a>
					</div>	
				</div>		
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
