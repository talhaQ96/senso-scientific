<?php
/**
 * This is the file for Slider Grid ACF block type
 */
 
global $ctblock;
$ctblock = $block;

$icons = get_field('icons-grid');
?>

<div class="acf-slider-block pt-4">
    <div class="container">
        <?php if($icons): ?>
            <ul class= "acf-slick-slider">
                <?php foreach($icons as $icon): ?>
                    <li><?php echo wp_get_attachment_image($icon); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

