<?php

$block_css_classes = [
    'counter'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: counter1</p>' : '' ;


$title = get_field('title');
$suptitle = get_field('suptitle');
$benefits = get_field('benefits');
$image = get_field('image');


?>

    <section class="counter1">
        <div class="container">
            <div class="counter1-inner">
                <?php if ( $suptitle ) : ?>
                    <p class="suptitle"><?php echo $suptitle ?></p>
                <?php endif; ?>
                <?php if ( $title ) : ?>
                    <h1 class="title"><?php echo $title ?></h1>
                <?php endif; ?>
                
                
                <?php if ( $benefits ) : ?>
                    <div class="benefits" id="counter">
                        <?php foreach ($benefits as $benefit){ ?>
                            <div class="benefit counter1-item">
                                <div class="benefit-icon">
                                    <img src="<?php echo  $benefit['icon']['url']?>" alt="">
                                </div>
                                <div class="benefit-count number">
                                    <p class="cn" data-num="<?php echo  $benefit['number']?>"><?php echo  $benefit['number']?></p>
                                </div>
                                <div class="benefit-text">
                                    <p><?php echo  $benefit['text']?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif; ?>
                <?php if ( $image ) : ?>
                    <div class="">
                        <img src="<?php echo  $image['url']?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
echo $is_preview ? '</div>' : '';
