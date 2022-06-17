<section class="featured-image-banner primary-banner">
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