<?php

$block_css_classes = [
    'hero1'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: HERO1</p>' : '' ;


$title = get_field('title');
$subtitle = get_field('subtitle');
$button1 = get_field('button1');
$button2 = get_field('button2');
$benefits = get_field('benefits');
$video = get_field('video');


?>
    <section class="hero1">
        <div class="container">
            <div class="hero1-inner">
                <?php if ( $title ) : ?>
                    <h1 class="title"><?php echo $title ?></h1>
                <?php endif; ?>
                <?php if ( $subtitle ) : ?>
                    <p class="subtitle"><?php echo $subtitle ?></p>
                <?php endif; ?>
                <?php if ( $button1 || $button2) : ?>
                    <div class="buttons">
                        <?php if ( $button1) :
                            $link_url = $button1['url'];
                            $link_title = $button1['title'];
                            $link_target = $button1['target'] ? $button1['target'] : '_self';
                        ?>
                            <div class="button1">
                                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ( $button2) :
                            $link_url = $button2['url'];
                            $link_title = $button2['title'];
                            $link_target = $button2['target'] ? $button2['target'] : '_self';
                        ?>
                            <div class="button2">
                                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ( $benefits ) : ?>
                    <ul>
                        <?php foreach ($benefits as $benefits_item){ ?>
                            <li><?php echo $benefits_item['item'] ?><li>
                        <?php } ?>
                    </ul>
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
