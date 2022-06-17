<?php
/**
 * This is the file for Product Slider ACF block type
 */
 
global $ctblock;
$ctblock = $block;

$images = get_field('product-slider');
?>

<div class="acf-product-slider">
    <?php if($images): ?>
        <div class="product-slider">
            <?php foreach($images as $image_id): ?>
                <div><?php echo wp_get_attachment_image($image_id, 'full'); ?></div>
            <?php endforeach; ?>
        </div>

        <ul class="product-thumb-slider">
            <?php foreach($images as $image_id): ?>
                <li><?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>    
</div>