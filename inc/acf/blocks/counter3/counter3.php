<?php

$block_css_classes = [
    'hero1'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: counter3</p>' : '' ;



$benefits = get_field('benefits');



?>

    <section class="counter1">
        <div class="container">
            <div class="counter1-inner">
               
                
                
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
            </div>
        </div>
    </section>
<?php
echo $is_preview ? '</div>' : '';
