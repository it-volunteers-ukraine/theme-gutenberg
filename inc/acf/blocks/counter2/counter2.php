<?php

$block_css_classes = [
    'hero1'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: counter2</p>' : '' ;


$title = get_field('title');
$suptitle = get_field('suptitle');
$subtitle = get_field('subtitle');
$benefits = get_field('benefits');
$counters = get_field('counters');


?>

    <section class="counter2" id="counter2">
        <div class="container">
            <div class="counter2-inner">
                <?php if ( $suptitle ) : ?>
                    <p class="suptitle"><?php echo $suptitle ?></p>
                <?php endif; ?>
                <?php if ( $title ) : ?>
                    <h1 class="title"><?php echo $title ?></h1>
                <?php endif; ?>
                <?php if ( $subtitle ) : ?>
                    <p class="subtitle"><?php echo $subtitle ?></p>
                <?php endif; ?>
                
                
                <?php if ( $benefits ) : ?>
                    <ul>
                        <?php foreach ($benefits as $benefits_item){ ?>
                            <li><?php echo $benefits_item['item'] ?><li>
                        <?php } ?>
                    </ul>
                <?php endif; ?>
                <?php if ( $counters ) : ?>
                    <div class="">
                        <?php foreach ($counters as $counter){ ?>
                                <div class="counter2-item"> 
                                    <p><span class="odometer od" data-num="<?php echo $counter['number'] ?>">0</span><?php echo $counter['after_number'] ?></p>
                                    <p><?php echo $counter['text'] ?></p>
                                </div>
                        <?php } ?>
                        



                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
echo $is_preview ? '</div>' : '';
