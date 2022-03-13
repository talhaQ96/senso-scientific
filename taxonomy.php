<?php
/**
 * The template for displaying Posts filtered by Custom Taxonomy
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */

get_header();
?>
    
<main id="primary" class="site-main taxonomy">

    <?php 
        if(get_post_type() == 'products'):
            get_template_part('partials/archives/content', 'banner');

            if(have_posts()):
    ?>
                <section class="products-grid content">
                    <div class="container">
                        <div class="row">
                            <?php get_template_part('partials/archives/content', 'products'); ?>
                        </div>
                    </div>
                </section>
    <?php   
            endif;

        elseif(get_post_type() == 'applications'):
            get_template_part('partials/archives/content', 'application-category');

        else:
            get_template_part('partials/content', 'none');

        endif;
    ?>
</main> 
<?php get_footer(); ?>