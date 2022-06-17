<?php
/**
 * This is the file for Card Slider ACF block type
 */
 
global $ctblock;
$ctblock = $block;
?>

<div class="acf-cards-slider">
    <?php if(have_rows('cards-slider')): ?>
        <div class="card-slider slick-carousel">
            <?php
                while(have_rows('cards-slider')): the_row();
                    $image = get_sub_field('image');
                    $link  = get_sub_field('link');

                    if($link):
                        $link_url = $link['url'];
                        $link_target = $link['target'];
            ?>
                        <div>
                            <a href="<?php echo esc_url($link['url']);?>" target="<?php echo esc_attr($link_target); ?>" class="wrapper card-with-hover">
                                <div class="icon-wrapper"><?php echo wp_get_attachment_image($image); ?></div>
                                <div>
                                    <h4><?php the_sub_field('title'); ?></h4>
                                    <p><?php the_sub_field('text') ?></p>
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
                                    <p><?php the_sub_field('text') ?></p>
                                </div>
                            </div>
                        </div>
            <?php   
                    endif;
                endwhile;
            ?>
        </div>
    <?php endif; ?>
</div>