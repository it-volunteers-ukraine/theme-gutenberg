<?php

$block_css_classes = [
    'hero1'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: testimonials1</p>' : '' ;


$title = get_field('title');
$suptitle = get_field('suptitle');
$subtitle = get_field('subtitle');
$cards = get_field('cards');


?>

    <section class="testimonials1">
        <div class="container">
            <div class="testimonials1-inner">
                <?php if ( $suptitle ) : ?>
                    <p class="suptitle"><?php echo $suptitle ?></p>
                <?php endif; ?>
                <?php if ( $title ) : ?>
                    <h1 class="title"><?php echo $title ?></h1>
                <?php endif; ?>
                <?php if ( $subtitle ) : ?>
                    <p class="subtitle"><?php echo $subtitle ?></p>
                <?php endif; ?>
                
                
                <?php if ( $cards ) : ?>
                    <div class="swiper testimonials1">
                        <div class="swiper-wrapper">
                            <?php foreach ($cards as $card){ ?>
                                <div class="swiper-slide">
                                    
                                    <?php if ( $card['title'] ) : ?>
                                        <p><?php echo  $card['title']?></p>
                                    <?php endif; ?>

                                    <?php if ( $card['text'] ) : ?>
                                        <p><?php echo  $card['text']?></p>
                                    <?php endif; ?>

                                    <?php if ( $card['name'] ) : ?>
                                        <p><?php echo  $card['name']?></p>
                                    <?php endif; ?>

                                    <?php if ( $card['position'] ) : ?>
                                        <p><?php echo  $card['position']?></p>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                <?php endif; ?>
                

            </div>
        </div>
    </section>
<?php
echo $is_preview ? '</div>' : '';
