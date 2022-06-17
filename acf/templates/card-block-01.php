<?php
/**
 * This is the file for Card Block 01 ACF block type
 */
 
global $ctblock;
$ctblock = $block;

$image = get_field('image');
$title = get_field('title');
$text  = get_field('text');
$link  = get_field('link');

if($link):
    $link_url = $link['url'];
    $link_target = $link['target'];
?>
    <a href="<?php echo esc_url($link['url']);?>" target="<?php echo esc_attr($link_target); ?>" class="acf-card-block-01 card-with-hover" style="border: 2px solid #3892df;">
        <div>
            <div class="icon-wrapper"><?php echo wp_get_attachment_image($image); ?></div>
            <div>
                <h4><?php echo $title ?></h4>
                <p><?php echo $text ?></p>
            </div>
        </div> 
    </a>

<?php else: ?>
    <div class="acf-card-block-01 card-with-hover">
        <div class="icon-wrapper"><?php echo wp_get_attachment_image($image); ?></div>
        <div>
            <h4><?php echo $title ?></h4>
            <p><?php echo $text ?></p>
        </div>
    </div>
<?php endif; ?> 
