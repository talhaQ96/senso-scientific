<?php
/**
 * Template-Part for displaying CPT 'applications' in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
        if(has_post_thumbnail()):
        $feat_img = get_the_post_thumbnail_url(); 
    ?>
        <!-- Featured Image Banner -->
        <section class="featured-image-banner" style="background-image: url('<?php echo $feat_img ?>')">
            <div class="container">
                <?php the_breadcrumb(); ?>
                <h1><?php the_title(); ?></h1>
                <?php if(has_excerpt()): ?>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 col-xl-6">
                            <?php the_excerpt(); ?> 
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <!-- Featured Image Banner End-->
    <?php endif; ?>

    <!-- Entry Content -->
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <!-- Entry Content End-->
</article>	