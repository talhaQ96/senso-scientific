<?php
/**
 * This is the file for Product Details ACF block type
 */
 
global $ctblock;
$ctblock = $block;
?>

<div class="acf-product-details d-none d-lg-block">
    <?php if(have_rows('product-details')): ?>
        <ul>
            <?php
                while(have_rows('product-details')): the_row();
                    $title = get_sub_field('title');
            ?>
                <li><?php echo $title; ?></li>
            <?php endwhile; ?>
        </ul>
        <?php
            while(have_rows('product-details')): the_row();
                $description = get_sub_field('description');
        ?>
            <div class="description">
                <?php echo $description; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<div class="acf-product-details-mobile d-block d-lg-none">
    <?php
        if(have_rows('product-details')):
        while(have_rows('product-details')): the_row();
            $title = get_sub_field('title');
            $description = get_sub_field('description');
    ?>
        <div>
            <h4><?php echo $title; ?></h4>
            <div class="content"><?php echo $description; ?></div>
        </div>
    <?php endwhile; endif; ?>
</div>