<?php
/**
 * The template-part for displaying Products in Archive Pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */
?>

<?php if(is_search()): ?>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="product-wrapper">
                <?php the_post_thumbnail(); ?>
                <a href="<?php the_permalink() ?>" class="d-block">
                    <h4 class="my-4"><?php the_title(); ?></h4>
                </a> 
                <a href="<?php the_permalink() ?>" class="button hover-white-with-border">Buy Now</a>    
            </div>
        </div>

<?php else: ?>
        <div class="row">
            <?php while(have_posts()) : the_post(); ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="product-wrapper">
                        <?php the_post_thumbnail(); ?>
                        <a href="<?php the_permalink() ?>" class="d-block">
                            <h4 class="my-4"><?php the_title(); ?></h4>
                        </a> 
                        <a href="<?php the_permalink() ?>" class="button hover-white-with-border">Buy Now</a>    
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