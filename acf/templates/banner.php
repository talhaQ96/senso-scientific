<?php
/**
 * This is the file for Banner ACF block type
 */
 
global $ctblock;
$ctblock = $block;

$content = get_field('content');
$heading_color =  $content['heading-color'];
$text_color =  $content['paragraph-color'];
$link = get_field('button-link');
?>

<?php if(have_rows('background')):
     while(have_rows('background')): the_row();
        $video = get_sub_field('video');
        $background_image = get_sub_field('image');
            if($video):
?>
                <div class="acf-video-banner-block">
                    <div class="video-container">
                        <video src="<?php echo $video ?>" muted loop autoplay></video>
                    </div>
            
                    <div class="container">
                        <div class="row justify-content-center justify-content-lg-start">
                            <div class="col-12 col-md-11 col-lg-8 text-center text-lg-start">
                                <h1 style="color: <?php echo $heading_color ?>"><?php echo $content['heading-text']; ?></h1>
                                <p style="color: <?php echo $text_color ?>"><?php  echo $content['paragraph-text']; ?></p>

                                <!-- Buttton -->
                                <?php if($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; 
                                ?>

                                        <div class="button-wrap d-flex flex-wrap justify-content-center justify-content-lg-start">
                                            <a  class="button hover-white"
                                                href="<?php echo esc_url($link_url); ?>"
                                                target="<?php echo esc_attr($link_target); ?>"
                                            >
                                                <?php echo esc_html($link_title); ?>
                                            </a>
                                        </div>
                                <?php endif; ?>
                                 <!-- Buttton End -->
                            </div>
                        </div>
                    </div>
                </div>

    <?php   elseif($background_image): ?>
                <div class="acf-banner-block" style="background-image: url('<?php echo $background_image ?>');">
                    <div class="container">
                        <div class="row justify-content-center justify-content-lg-start">
                            <div class="col-12 col-md-11 col-lg-8 col-xl-7 text-center text-lg-start">
                                <h1 style="color: <?php echo $heading_color ?>"><?php echo $content['heading-text']; ?></h1>
                                <p style="color: <?php echo $text_color ?>"><?php  echo $content['paragraph-text']; ?></p>

                                <!-- Buttton -->
                                <?php if($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; 
                                ?>

                                        <div class="button-wrap d-flex flex-wrap justify-content-center justify-content-lg-start">
                                            <a  class="button"
                                                href="<?php echo esc_url($link_url); ?>"
                                                target="<?php echo esc_attr($link_target); ?>"
                                            >
                                                <?php echo esc_html($link_title); ?>
                                            </a>
                                        </div>
                                <?php endif; ?>
                                 <!-- Buttton End -->
                            </div>
                        </div>
                    </div>
                </div>
<?php
            endif;
    endwhile;
endif; ?>