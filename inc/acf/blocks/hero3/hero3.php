<?php

$block_css_classes = [
    'hero1'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: HERO3</p>' : '' ;


$title = get_field('title');
$subtitle = get_field('subtitle');
$button = get_field('button');
$video = get_field('video');


?>
    <section class="hero3">
        <div class="container">
            <div class="hero3-inner">
                <?php if ( $title ) : ?>
                    <h1 class="title"><?php echo $title ?></h1>
                <?php endif; ?>
                <?php if ( $subtitle ) : ?>
                    <p class="subtitle"><?php echo $subtitle ?></p>
                <?php endif; ?>
                
                <?php if ( $button) :
                    $link_url = $button['url'];
                    $link_title = $button['title'];
                    $link_target = $button['target'] ? $button['target'] : '_self';
                ?>
                    <div class="button1">
                        <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
                <?php endif; ?>
                    
                <?php if ( $video ) : ?>
                    <iframe width="100%" height="660"
                        src="<?php echo $video['url'] ?>">
                    </iframe>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
echo $is_preview ? '</div>' : '';
