<?php

$block_css_classes = [
    'hero1'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: google-maps3</p>' : '' ;


$suptitle = get_field('suptitle');
$title = get_field('title');
$text = get_field('text');
$maps = get_field('maps');



?>

    <section class="google-maps1">
        <div class="container">
            <div class="google-maps1-inner">
               
                <?php if ( $suptitle ) : ?>
                    <p class="suptitle"><?php echo $suptitle ?></p>
                <?php endif; ?>
                
                <?php if ( $title ) : ?>
                    <h1 class="title"><?php echo $title ?></h1>
                <?php endif; ?>
                
                <?php if ( $text ) : ?>
                    <p class="text"><?php echo $text ?></p>
                <?php endif; ?>

                
                <?php if ( $map ) : ?>
                    <div class="map">
                        <?php echo $map?>
                    </div>
                <?php endif; ?>



            </div>
        </div>
    </section>
<?php
echo $is_preview ? '</div>' : '';
