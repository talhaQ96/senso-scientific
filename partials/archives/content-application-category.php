<?php
/**
 * The template-part for displaying CPT "Applications" filtered by Application Category in taxonomy.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Coalition_Technologies
 */

$term = get_queried_object();
$feat_img = get_field('featured-image', $term);

    if($feat_img):
?>

        <!-- Featured Image Banner with Taxonomy Title & Description -->
        <section class="featured-image-banner" style="background-image: url('<?php echo $feat_img; ?>');">
            <div class="container">
                <?php the_breadcrumb(); ?>
                <h1><?php single_cat_title(); ?></h1>
                <?php if (category_description()): ?>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 col-xl-6">
                            <?php echo category_description(); ?> 
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <!-- Banner End -->
    <?php endif; ?>

    <?php
        $cards_layout_01 = get_field('cards-layout-01', $term);
        $visiblity = $cards_layout_01['visibility'];

        if($visiblity):
            $heading =  $cards_layout_01['section-heading'];
            $description = $cards_layout_01['section-description'];
            $cards = $cards_layout_01['cards'];
    ?>
            <!-- Section for Displaying Card Layout 01 -->
            <section class="sec-card-layout-01">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 text-center">
                            <?php if($heading): ?>
                                <h2><?php echo $heading; ?></h2>
                            <?php endif; ?>

                            <?php if($description): ?>
                                <p class="mb-5"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php
                        if(have_rows('cards-layout-01', $term)):
                            while(have_rows('cards-layout-01', $term)): the_row();
                                if(have_rows('cards')):
                    ?>
                                    <div class="card-slider slick-carousel">
                                        <?php
                                            while(have_rows('cards')): the_row();
                                                $image = get_sub_field('image');
                                                $link  = get_sub_field('link');

                                                if($link): 
                                        ?>
                                                    <div>
                                                        <a href="<?php echo esc_url($link['url']);?>" target="<?php echo esc_attr($link_target); ?>" class="wrapper card-with-hover">
                                                            <div class="icon-wrapper"><?php echo wp_get_attachment_image($image); ?></div>
                                                            <div>
                                                                <h4><?php the_sub_field('title'); ?></h4>
                                                                <p><?php the_sub_field('description') ?></p>
                                                            </div>
                                                        </a>
                                                    </div>

                                            <?php
                                                else: 
                                            ?>
                                                    <div>
                                                        <div class="wrapper card-with-hover">
                                                            <div class="icon-wrapper"><?php echo wp_get_attachment_image($image); ?></div>
                                                            <div>
                                                                <h4><?php the_sub_field('title'); ?></h4>
                                                                <p><?php the_sub_field('description') ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                endif;
                                            endwhile;
                                            ?>
                                    </div>
                    <?php       endif;
                            endwhile;
                        endif;
                    ?>
                </div>
            </section>
            <!-- Section End -->
        <?php endif; ?>

    <?php
        $applications_section = get_field('applications-section', $term);
        $visiblity = $applications_section['visibility'];

        if($visiblity):
            $heading =  $applications_section['section-heading'];
            $description = $applications_section['section-description'];
    ?>
            <!-- Section for Displaying Single Applications from current Application Category -->
            <section class="sec-applications">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 text-center">
                            <?php if($heading): ?>
                                <h2><?php echo $heading; ?></h2>
                            <?php endif; ?>

                            <?php if($description): ?>
                                <p class="mb-5"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if(have_posts()): ?>
                        <div class="row app-grid justify-content-center justify-content-lg-start">
                            <?php
                                while(have_posts()):the_post();
                                    setup_postdata($post);
                                    $image = get_field('thumbnail-image', get_the_ID());
                                    $cta   = get_field('cta-label');
                            ?>
                                <div class="col-12 col-sm-7 col-md-5 col-lg-4 col-xl-3">
                                    <div class="outer-wrapper">
                                        <div class="inner-wrapper">
                                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                                            <div class="slider">
                                                <div>
                                                    <h4><?php the_title(); ?></h4>
                                                    <?php the_excerpt(); ?>
                                                </div>
                                                <div><a href="<?php the_permalink(); ?>"><?php echo $cta; ?></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
            <!-- Section End-->
        <?php endif ?>

    <?php
        $brochure_section = get_field('brochure-section', $term);
        $visiblity = $brochure_section['visibility'];

        if($visiblity):
            $brochure_img =  $brochure_section['brochure-image'];
            $heading =  $brochure_section['section-heading'];
            $description =  $brochure_section['section-description'];
            $file_path =  $brochure_section['brochure-file-path'];
    ?>
            <!-- Download Brochure Section -->
            <section class="sec-brochure">
                <div class="container">
                    <div class="row justify-content-around align-items-center">
                        <?php if($heading): ?>
                            <h2 class="d-block d-md-none text-center"><?php echo $heading; ?></h2>
                        <?php endif; ?>

                        <?php if($brochure_img): ?>
                            <div class="col-8 col-sm-6 col-md-4">
                                <?php echo wp_get_attachment_image($brochure_img, 'full'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="col-md-7 col-xl-5 text-center text-md-start mt-4 mt-md-0">
                            <?php if($heading): ?>
                                <h2 class="d-none d-md-block"><?php echo $heading; ?></h2>
                            <?php endif; ?>

                            <?php if($description): ?>
                                <p><?php echo $description; ?></p>
                            <?php endif; ?>

                            <?php if($file_path): ?>
                                <a href="#" rel="<?php echo $file_path; ?>" class="button button-download hover-white">
                                    <span class="me-2"><i class="fas fa-file-download"></i></span>
                                    <span>Download Brochure</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Brochure Section End -->
        <?php endif ?>

    <?php
        $resources_section = get_field('resources-section', $term);
        $visiblity =  $resources_section['visibility'];

        if($visiblity):
            $heading =  $resources_section['section-heading'];
            $description =  $resources_section['section-description'];
            $resources = $resources_section['resources'];
    ?>
            <!-- Resources Section -->
            <section class="sec-resources">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-xl-3 text-center text-xl-start mt-xl-5">
                            <?php if($heading): ?>
                                <h2><?php echo $heading; ?></h2>
                            <?php endif; ?>

                            <?php if($description): ?>
                                <p class="mb-5 mb-xl-0"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if($resources): ?>
                            <div class="col-xl-9 mt-sm-5">
                                <div class="resource-slider">
                                    <?php
                                        foreach($resources as $post ):
                                            setup_postdata($post);
                                            $post_id = get_the_ID();
                                            $category = get_the_category($post_id);
                                            $category_id = $category[0]->cat_ID;
                                            $category_name= get_cat_name($category_id);
                                            $category_link = get_category_link($category_id);
                                    ?>
                                            <div class="resource">
                                                <?php the_post_thumbnail(); ?>
                                                <a href="<?php echo $category_link; ?>" class="cat-title"><?php echo $category_name; ?></a>
                                                <h4><?php the_title(); ?></h4>
                                                <a href="<?php the_permalink(); ?>" class="button small hover-white-with-border">View Resource</a>
                                            </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <!-- Resources Section End-->
        <?php endif; ?>

    <?php
        $demo_section = get_field('demo-section', $term);
        $visiblity =  $demo_section['visibility'];

        if($visiblity):
            $heading =  $demo_section['section-heading'];
            $description =  $demo_section['section-description'];
            $link =  $demo_section['link'];

    ?>
            <!-- Demo Section -->
            <section class="sec-demo">
                <div class="container">
                    <?php if($heading): ?>
                        <h2><?php echo $heading; ?></h2>
                    <?php endif; ?>

                    <?php if($description): ?>
                        <p><?php echo $description; ?></p>
                    <?php endif; ?>

                    <?php 
                        if($link):
                            $link_url    = $link['url'];
                            $link_title  = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($link_url); ?>"  target="<?php echo esc_attr( $link_target ); ?>" class="button white-button">
                            <?php echo esc_html( $link_title ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </section>
            <!-- Demo Section End-->
        <?php endif; ?>

    <!-- Section for Displaying Card Layout 02 -->
    <?php
        $cards_layout_02 = get_field('cards-layout-02', $term);
        $visiblity =  $cards_layout_02['visibility'];

        if($visiblity):    
            $heading =  $cards_layout_02['section-heading'];
            $description = $cards_layout_02['section-description'];
            $cards = $cards_layout_02['cards'];
    ?>
            <section class="sec-card-layout-02">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 text-center">
                            <?php if($heading): ?>
                                <h2><?php echo $heading; ?></h2>
                            <?php endif; ?>

                            <?php if($description): ?>
                                <p class="mb-5"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php
                        if(have_rows('cards-layout-02', $term)):
                            while(have_rows('cards-layout-02', $term)): the_row();
                                if(have_rows('cards')):
                    ?>
                                    <div class="row cards-grid">
                                        <?php
                                            while(have_rows('cards')): the_row();
                                                $image = get_sub_field('image');
                                                $link  = get_sub_field('link');

                                                if($link):
                                                    $link_url = $link['url'];
                                                    $link_target = $link['target'];
                                        ?>
                                                    <div class="col-6 col-xl-3">
                                                        <a href="<?php echo esc_url($link['url']);?>" target="<?php echo esc_attr($link_target); ?>" class="wrapper card-with-hover" style="border: 2px solid #3892df;">
                                                            <div class="icon-wrapper"><?php echo wp_get_attachment_image($image); ?></div>
                                                            <div>
                                                                <h4><?php the_sub_field('title'); ?></h4>
                                                                <p><?php the_sub_field('description') ?></p>
                                                            </div>
                                                        </a>
                                                    </div>
                                            <?php
                                                else:
                                            ?>
                                                    <div class="col-6 col-xl-3">
                                                        <div class="wrapper card-with-hover">
                                                            <div class="icon-wrapper"><?php echo wp_get_attachment_image($image); ?></div>
                                                            <div>
                                                                <h4><?php the_sub_field('title'); ?></h4>
                                                                <p><?php the_sub_field('description') ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php   
                                                endif;
                                            endwhile;
                                        ?>
                                    </div>
                    <?php       
                                endif;
                            endwhile;
                        endif;
                    ?>
                </div>
            </section>
            <!-- Section End -->
        <?php endif; ?>