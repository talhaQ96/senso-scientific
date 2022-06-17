<?php
/**
 * This is the file for Button ACF block type
 */
 
global $ctblock;
$ctblock = $block;

$button = get_field('button');
$link = $button['link'];
$file = $button['file-path'];
$downloadable = $button['downloadable'];
$alignment =  $button['alignment'];
$css_class = $button['css-class'];

if($alignment == 'Center'){
    $alignment = 'justify-content-center';
}

elseif($alignment == 'Left'){
    $alignment = 'justify-content-end';
}

else{
    $alignment = 'justify-content-start';
}
?>

<?php
    if($downloadable && $file):
        $url  = $file;
        $text = $button['text'];
?>

        <div class="acf-button-block my-4 d-flex <?php echo $alignment; ?>">
            <a class="button button-download <?php echo $css_class; ?>"
               href="#"
               rel="<?php echo $url; ?>"
            >
               <?php echo $text; ?>
            </a>
        </div>

<?php 
    elseif(!$downloadable && $link):
        $url  = $link['url'];
        $text = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
?>

        <div class="acf-button-block my-4 d-flex <?php echo $alignment; ?>">
            <a class="button <?php echo $css_class; ?>"
               href="<?php echo $url; ?>"
               target="<?php echo $link_target; ?>"
            >
               <?php echo $text; ?>
            </a>
        </div>

<?php endif; ?>
