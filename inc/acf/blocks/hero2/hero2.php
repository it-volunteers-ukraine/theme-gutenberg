<?php

$block_css_classes = [
    'hero1'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: HERO2</p>' : '' ;


$title = get_field('title');
$subtitle = get_field('subtitle');
$button1 = get_field('button1');
$button2 = get_field('button2');
$cards = get_field('cards');
$logos = get_field('logos');

?>

    <section class="hero2">
        <div class="container">
            <div class="hero2-inner">
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
                <?php if ( $cards ) : ?>
                    <div class="img-accordeon">
                    <?php $first = true; // Установим переменную для определения первой итерации ?>
                        <?php foreach ($cards as $card){ ?>
                            <div class="tab <?php if ($first) { echo 'active'; $first = false; } ?>">
                                <label>
                                    <input type="radio" name="cards">
                                    <img src="<?php echo  $card['image']['url']?>" alt="">
                                    <div class="text">
                                        <p><?php  echo $card['title'] ?></p>
                                    </div>
                                </label>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif; ?>
                <?php if ( $logos ) : ?>
                    <div class='marquee'>
                        <div class="marquee-logos">
                            <?php foreach ($logos as $logo){ ?>
                                <img src="<?php echo  $logo['logo']['url']?>" alt="">
                            <?php } ?>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </section>
<?php
echo $is_preview ? '</div>' : '';
