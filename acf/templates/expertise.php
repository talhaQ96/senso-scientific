<?php
/**
 * This is the file for Expertise ACF block type
 */
 
global $ctblock;
$ctblock = $block;

$image = get_field('image');
$title = get_field('title');
$text  = get_field('text');
$link  = get_field('link');
?>

<div class="acf-expertise-block">
    <?php if($image): ?>
        <div class="img-wrap">
            <?php echo wp_get_attachment_image($image); ?>
        </div>
    <?php endif;  ?>
    <div>
        <?php if($link):
            $link_url = $link['url'];
            $link_target = $link['target'];
        ?>
            <a href="<?php echo esc_url($link['url']);?>" target="<?php echo esc_attr($link_target); ?>">
                <h4><?php echo $title ?></h4>
            </a>
        <?php else: ?>
            <h4><?php echo $title ?></h4>  
        <?php endif; ?>
        <p><?php echo $text ?></p>
    </div>
</div>