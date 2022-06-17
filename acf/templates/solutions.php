<?php
/**
 * This is the file for Platforms Solution ACF block type
 */
 
global $ctblock;
$ctblock = $block;

$bg = get_field('background-image');
$title = get_field('title');
$subtitle = get_field('subtitle');
$text = get_field('text');
$link  = get_field('link');
$overlay  = get_field('overlay-color');

if($link):
    $link_url = $link['url'];
    $link_target = $link['target'];
?>

<a href="<?php echo esc_url($link['url']);?>" target="<?php echo esc_attr($link_target); ?>" class="link-solutions">
    <div style="background-image: url('<?php echo $bg ?>');" class="acf-solutions-block">
        <div style="background-color: <?php echo $overlay; ?>" class="overlay"></div>
        <div>
            <?php
                echo $title;
                echo $subtitle;
                echo $text;
            ?>
        </div>
    </div>
</a>

<?php else: ?>

    <div style="background-image: url('<?php echo $bg ?>');" class="acf-solutions-block">
        <div style="background-color: <?php echo $overlay; ?>" class="overlay"></div>
        <div>
            <?php
                echo $title;
                echo $subtitle;
                echo $text;
            ?>
        </div>
    </div>

<?php endif; ?> 