<?php
/**
 * This is the file for Icons Grid ACF block type
 */
 
global $ctblock;
$ctblock = $block;

$icons = get_field('icons-grid');
?>

<div class="acf-icons-grid-block">
    <?php if($icons): ?>
        <ul>
            <?php foreach($icons as $icon ): ?>
                <li><?php echo wp_get_attachment_image($icon); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>