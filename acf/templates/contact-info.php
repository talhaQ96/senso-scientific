<?php
/**
 * This is the file for Contact Information ACF block type
 */
 
global $ctblock;
$ctblock = $block;
?>

<div class="acf-contact-block">
    <ul class="contact-info">
        <?php if(get_field('email-address')): ?>
            <li class= "d-flex">
                <span><i class="fas fa-envelope"></i></span>
                <span>
                    <a href="mailto:<?php the_field('email-address'); ?>">
                        <?php the_field('email-address'); ?>
                    </a>
                </span>
            </li>
        <?php endif; ?>

        <?php if(get_field('phone-number')): ?>
            <li class= "d-flex">
                <span><i class="fas fa-phone-alt"></i></span>
                <span>
                    <a href="tel:<?php the_field('phone-number'); ?>">
                        <?php the_field('phone-number'); ?>
                    </a>
                </span>
            </li>
        <?php endif; ?>

        <?php if(get_field('postal-address')): ?>
            <li class= "d-flex">
                <span><i class="fas fa-map-marker-alt"></i></span>
                <span><?php the_field('postal-address'); ?></span>
            </li>
        <?php endif; ?>
    </ul>
</div>