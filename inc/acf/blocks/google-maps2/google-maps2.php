<?php

$block_css_classes = [
    'hero1'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: google-maps2</p>' : '' ;


$title = get_field('title');
$text = get_field('text');
$map = get_field('map');
$info = get_field('info');
$socials = get_field('socials');



?>

    <section class="google-maps2">
        <div class="container">
            <div class="google-maps2-inner">
               
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

                <?php if ( $info) : ?>
                    <div class="info">
                        <?php foreach ($info as $infoitem){ ?>
                            <div class="accordion-item">
                                <p><?php echo $infoitem['title']?></p>
                                <div><?php echo $infoitem['text']?></div>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( $socials) : ?>
                    <div class="socials">
                        <?php foreach ($socials as $social){ ?>
                            <a href="<?php echo $social['link'] ?>">
                                <img src="<?php echo $social['icon']['url'] ?>" alt="">
                            </a>
                        <?php } ?>
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </section>
<?php
echo $is_preview ? '</div>' : '';
