<?php

function acf_theme_blocks_path($path) {
    return get_template_directory() . '/inc/acf/blocks/' . $path;
}

function gt_block_category_init( $categories, $post ) {
    return array_merge([
            [
                'slug' => 'custom-blocks',
                'title' => __('Custom Blocks', '_themedomain'),
            ],
        ],
        $categories
    );
}
add_filter( 'block_categories', 'gt_block_category_init', 10, 2 );

function _themeprefix_acf_init_block_types() {
    if(function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'  =>  'hero1',
            'title' =>  __('Hero1', '_themedomain'),
            'description'   =>  __('Block Hero1', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('hero1/hero1.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
        ));

        acf_register_block_type(array(
            'name'  =>  'hero2',
            'title' =>  __('Hero2', '_themedomain'),
            'description'   =>  __('Block Hero2', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('hero2/hero2.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/hero2.js',
        ));

        acf_register_block_type(array(
            'name'  =>  'hero3',
            'title' =>  __('Hero3', '_themedomain'),
            'description'   =>  __('Block Hero3', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('hero3/hero3.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
        ));

        acf_register_block_type(array(
            'name'  =>  'counter1',
            'title' =>  __('counter1', '_themedomain'),
            'description'   =>  __('Block counter1', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('counter1/counter1.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/counter1.js',
        ));

        acf_register_block_type(array(
            'name'  =>  'counter2',
            'title' =>  __('counter2', '_themedomain'),
            'description'   =>  __('Block counter2', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('counter2/counter2.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/counter2.js',
        ));

        acf_register_block_type(array(
            'name'  =>  'counter3',
            'title' =>  __('counter3', '_themedomain'),
            'description'   =>  __('Block counter3', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('counter3/counter3.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/counter3.js',
        ));

        acf_register_block_type(array(
            'name'  =>  'testimonials1',
            'title' =>  __('testimonials1', '_themedomain'),
            'description'   =>  __('Block testimonials1', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('testimonials1/testimonials1.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/testimonials1.js',
        ));

        acf_register_block_type(array(
            'name'  =>  'gallery1',
            'title' =>  __('gallery1', '_themedomain'),
            'description'   =>  __('Block gallery1', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('gallery1/gallery1.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/gallery1.js',
        ));

        acf_register_block_type(array(
            'name'  =>  'faq',
            'title' =>  __('faq', '_themedomain'),
            'description'   =>  __('Block faq', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('faq/faq.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/faq.js',
        ));

        acf_register_block_type(array(
            'name'  =>  'google-maps1',
            'title' =>  __('google-maps1', '_themedomain'),
            'description'   =>  __('Block google-maps1', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('google-maps1/google-maps1.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/google-maps1.js',
        ));

        acf_register_block_type(array(
            'name'  =>  'google-maps2',
            'title' =>  __('google-maps2', '_themedomain'),
            'description'   =>  __('Block google-maps2', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('google-maps2/google-maps2.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/google-maps2.js',
        ));

        acf_register_block_type(array(
            'name'  =>  'google-maps3',
            'title' =>  __('google-maps3', '_themedomain'),
            'description'   =>  __('Block google-maps3', '_themedomain'),
            'render_template'   =>  acf_theme_blocks_path('google-maps3/google-maps3.php'),
            'category'  =>  'ccc-blocks',
            'icon'  =>  'format-image',
            'supports'  =>  ['jsx'  =>  true],
            'enqueue_script' => get_template_directory_uri() . '/assets/js/google-maps3.js',
        ));
    }
}
add_action( 'acf/init', '_themeprefix_acf_init_block_types' );
