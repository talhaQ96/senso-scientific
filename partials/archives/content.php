<?php
/**
 * The template-part for displaying Blog Post in Archive Pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */
?>

<?php if(is_search()): ?>
			<div class="col-md-6">
				<div class="post-wrapper">
					<a href="<?php the_permalink(); ?>" class="featured-image">
						<?php the_post_thumbnail(); ?>
					</a>
					<div class="post-inner">
						<p class="post-date"><?php echo get_the_date(); ?></p>
						<a href="<?php the_permalink(); ?>" class="d-block">
							<h3 class="my-3"><?php the_title(); ?></h3>
						</a>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="button hover-white-with-border">Read More</a>
					</div>
				</div>
			</div> 

<?php else: ?>
			<div class="row">
			    <?php while(have_posts()) : the_post(); ?>
					<div class="col-md-6">
						<div class="post-wrapper">
							<a href="<?php the_permalink(); ?>" class="featured-image">
								<?php the_post_thumbnail(); ?>
							</a>
							<div class="post-inner">
								<p class="post-date"><?php echo get_the_date(); ?></p>
								<a href="<?php the_permalink(); ?>" class="d-block">
									<h3 class="my-3"><?php the_title(); ?></h3>
								</a>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="button hover-white-with-border">Read More</a>
							</div>
						</div>
					</div>   
				<?php endwhile; ?>
			</div>
			
			<div class="pagination-wrapper">
				<?php the_posts_pagination(); ?>
			
			    <nav class="mobile pagination">
			       <?php posts_nav_link(' ', '<i class="fas fa-angle-double-left"></i>', '<i class="fas fa-angle-double-right"></i>' ); ?>
			    </nav>
			</div>

<?php endif; ?> 