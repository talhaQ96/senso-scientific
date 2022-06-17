<?php

/**
 * Template Name: Sitemap
 */
get_header();
?>
    <main id="primary" class="site-main">
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
        <?php
            else:
                the_breadcrumb();
        ?>
            <header class="entry-header">
                <h1><?php the_title(); ?></h1>
            </header>
        <?php       
            endif;
        ?>

        <section class="section-sitemap entry-content">
            <div class="container">

                <!-- 
                    Pages Sitemap
                    Query only for Parent Pages
                -->
                <div>
                    <h2>Pages</h2>

                    <?php
    
                        $page = array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent' => 0, // parent pages only
                            'order' => 'ASC'
                        );
    
                        $pageQuery = new WP_Query($page);
    
                        if($pageQuery->have_posts()):
                    ?>
                            <ul>
                                <?php while($pageQuery->have_posts()): $pageQuery->the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
    
                                        <!-- Query for Nested/Child Pages -->
                                        <?php
                                            $childPage = array(
                                                'post_type' => 'page',
                                                'post_parent' => $post->ID, // Select parent for this child
                                                'posts_per_page' => -1,
                                                'order' => 'ASC'
                                            );
    
                                            $childPageQuery = new WP_Query($childPage);
    
                                            if ($childPageQuery->have_posts()):
                                        ?>
                                                <ul>
                                                    <?php while($childPageQuery->have_posts()): $childPageQuery->the_post(); ?>
                                                        <li>
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>
                                                            </a> 
                                                        </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                        <?php endif; ?>
                                        <!-- Query for Nested/Child Pages END -->
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                <?php   endif; ?>
                </div>
                <!-- Pages Sitemap END -->



                <!-- Blogs Sitemap -->
                <div>
                    <h2>Blogs</h2>

                    <?php
                        $categories = get_categories();

                        foreach($categories as $category):
                            $catId = $category->term_id;
                            $catName = $category->name;

                            $blog = array(
                                'post_type'      => 'post',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                                'cat' => $catId
                            );

                            $blogQuery = new WP_Query($blog);

                            if($blogQuery->have_posts()):
                    ?>
                            <h4><?php echo $catName; ?></h4>
                            <ul>
                                <?php while($blogQuery->have_posts()): $blogQuery->the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                    <?php
                            endif;
                        endforeach
                    ?>
                </div>
                <!-- Blogs Sitemap END -->



                <!-- 
                    Products Sitemap
                    Query only for Parent Products
                -->
                <div>
                    <h2>Products</h2>

                    <?php
                        $productCategories = get_terms(['taxonomy' => 'product_category']);

                        foreach($productCategories as $productCategory):

                            $catId   = $productCategory->term_id;
                            $catName = $productCategory->name;

                            $product = array(
                                'post_type'      => 'products',
                                'posts_per_page' => -1,
                                'post_parent' => 0, // parent products only
                                'order' => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_category',
                                        'terms' => $catId,
                                        'field' => 'id'
                                    )
                                ),
                            );

                            $productQuery = new WP_Query($product);

                            if($productQuery->have_posts()):
                    ?>
                                <h4><?php echo $catName; ?></h4>

                                <ul>
                                    <?php while($productQuery->have_posts()): $productQuery->the_post(); ?>
                                        <li>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
        
                                            <!-- Query for Nested/Child Products -->
                                            <?php
                                                $childProduct = array(
                                                    'post_type' => 'products',
                                                    'post_parent' => $post->ID, // Select parent for this child
                                                    'posts_per_page' => -1,
                                                    'order' => 'ASC'
                                                );
        
                                                $childProductQuery = new WP_Query($childProduct);
        
                                                if ($childProductQuery->have_posts()):
                                            ?>
                                                    <ul>
                                                        <?php while($childProductQuery->have_posts()): $childProductQuery->the_post(); ?>
                                                            <li>
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php the_title(); ?>
                                                                </a> 
                                                            </li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                            <?php endif; ?>
                                            <!-- Query for Nested/Child Products END -->
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                    <?php
                            endif;
                        endforeach;
                    ?>
                </div>
                <!-- Products Sitemap END -->



                <!-- Applications Sitemap -->
                <div>
                    <h2>Applications</h2>

                    <?php
                        $appCategories = get_terms(['taxonomy' => 'application_category']);

                         foreach($appCategories as $appCategory):

                            $catId   = $appCategory->term_id;
                            $catName = $appCategory->name;

                            $application = array(
                                'post_type'      => 'applications',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'application_category',
                                        'terms' => $catId,
                                        'field' => 'id'
                                    )
                                ),
                            );

                            $appQuery = new WP_Query($application);

                            if($appQuery->have_posts()):

                    ?>
                            <h4><?php echo $catName; ?></h4>
                            <ul>
                                <?php while($appQuery->have_posts()): $appQuery->the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                    <?php
                            endif;
                        endforeach;
                    ?>
                </div>
                <!-- Applications Sitemap END -->
                
            </div>
        </section>
    </main>
<?php get_footer(); ?>