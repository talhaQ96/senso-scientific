<?php
/**
 * This is the file for Brochure ACF block type
 */
 
global $ctblock;
$ctblock = $block;

// fetching brochure fields value

$image = get_field('brochure-image');
$name = get_field('brochure-name');
$description = get_field('brochure-description');
$file = get_field('file-path');
?>

<div class="acf-brochure-block">
    <div class="row justify-content-around align-items-center">
        <?php if($name): ?>
            <h2 class="d-block d-md-none text-center"><?php echo $name; ?></h2>
        <?php endif; ?>

        <?php if($image): ?>
            <div class="col-8 col-sm-6 col-md-4">
                <?php echo wp_get_attachment_image($image, 'full'); ?>
            </div>
        <?php endif; ?>

        <div class="col-md-7 col-xl-5 text-center text-md-start mt-4 mt-md-0">
            <?php if($name): ?>
                <h2 class="d-none d-md-block"><?php echo $name; ?></h2>
            <?php endif; ?>

            <?php if($description): ?>
                <p><?php echo $description; ?></p>
            <?php endif; ?>

            <?php if($file): ?>
                <a class="button button-download hover-white"
                   href="#"
                   rel="<?php echo $file ?>"
                >
                    <span class="me-2"><i class="fas fa-file-download"></i></span>
                    <span>Download Brochure</span>
                </a>
            <?php endif; ?>
        </div>
    </div>  
</div>
