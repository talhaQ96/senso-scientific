<?php
/**
 * The template for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Coalition_Technologies
 */

get_header();

global $query;
$search_term = get_search_query();
$types = array('post', 'products', 'applications');
?>

<main id="primary" class="site-main archive">
	<?php if(have_posts()): ?>
		<section class="content pt-0">
			<div class="container">
				<?php the_breadcrumb($search_term); ?>
				<h2>Search Results for: <?php echo $search_term; ?></h2>

				<ul class="filter-buttons"> 
					<?php
						foreach($types as $type):
							
							// $postTypeExist = 0 indicates button haven't rendered for particular post type
							// 1 indicates button is rendered

							$postTypeExist = 0;

							if($type == 'post'):
								$buttonText = "Blog Posts";
		
							else:
								$buttonText = $type;
	
							endif;

							while(have_posts()) : the_post();

								if($type == get_post_type() && $postTypeExist == 0):
					?>
									<li class="button small"><?php echo $buttonText; ?></li>
					<?php
									$postTypeExist = 1;
								endif;
							endwhile;
						endforeach;
					?>
				</ul> 

				<!-- Search Results -->
				<?php
					foreach ($types as $type):

						if($type == 'products'):
							$class = "products-grid";
	
						else:
							$class = "post-grid";

						endif;
				?>
					<div class="search-results-wrapper <?php echo $class ?> mt-5 mt-sm-0">
						<div class="row">
							<?php
								while(have_posts()) : the_post();
									if($type == get_post_type()):
										get_template_part('partials/archives/content', $type);
									endif;
								endwhile;
							?>
						</div>
					</div>
				<?php
					endforeach;
				?>
				<!-- Search Results End -->
			</div>	
		</section>

	<?php
		else:
			get_template_part('partials/content', 'none');
		endif
	?>
</main>

<?php get_footer(); ?>