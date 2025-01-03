<?php

$block_css_classes = [
    'hero1'
];

echo $is_preview ? '<div class="gt-block-preview"><p style="font-style: italic;">BLOCK: faq</p>' : '' ;


$title = get_field('title');
$suptitle = get_field('suptitle');
$text = get_field('text');
$questions = get_field('questions');


?>

    <section class="faq">
        <div class="container">
            <div class="faq-inner">
                <?php if ( $suptitle ) : ?>
                    <p class="suptitle"><?php echo $suptitle ?></p>
                <?php endif; ?>
                <?php if ( $title ) : ?>
                    <h1 class="title"><?php echo $title ?></h1>
                <?php endif; ?>
                <?php if ( $text ) : ?>
                    <p class="text"><?php echo $text ?></p>
                <?php endif; ?>
                
                <?php if ( $questions) : ?>
                    <div class="accordion">
                        <?php foreach ($questions as $question){ ?>
                            <div class="accordion-item">
                                <div class="accordion-item-header">
                                    <span class="accordion-item-header-title"><?php echo $question['question'] ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down accordion-item-header-icon">
                                    <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </div>
                                <div class="accordion-item-description-wrapper">
                                    <div class="accordion-item-description">
                                    <hr>
                                    <p><?php echo $question['answer'] ?></p>
                                    </div>
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
