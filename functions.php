<?php

function _themeprefix_theme_setup() {

	load_theme_textdomain( wp_get_theme()->get( 'TextDomain' ), get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', '_themedomain' ),
			'menu-header' => esc_html__( 'Header', '_themedomain' ),
			'menu-footer' => esc_html__( 'Footer', '_themedomain' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', '_themeprefix_theme_setup' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Enqueue scripts and styles.
 */
function _themeprefix_theme_scripts() {
    $version = wp_get_theme()->get( 'Version' );

    //// styles
    wp_register_style( '_themeprefix-style', get_stylesheet_uri(), [], $version );
    wp_register_style('normalize-css', get_stylesheet_directory_uri() . '/assets/css/normalize.css');
    wp_register_style('swiper-css', get_stylesheet_directory_uri() . '/assets/css/swiper.min.css');
    wp_register_style('lightbox-css', get_stylesheet_directory_uri() . '/assets/css/lightbox.min.css');
    // common styles for all pages
    wp_register_style('app-css', get_stylesheet_directory_uri() . '/assets/css/app.css', [], $version, 'all');

    wp_enqueue_style( '_themeprefix-style' );
    wp_enqueue_style( 'normalize-css' );
    wp_enqueue_style( 'swiper-css' );
    wp_enqueue_style( 'lightbox-css' );
    wp_enqueue_style( 'app-css' );

    //// scripts
    wp_register_script( 'app-js', get_stylesheet_directory_uri() . '/assets/js/app.js', array('jquery'), $version, true );
    wp_register_script( 'swiper-js', get_stylesheet_directory_uri() . '/assets/swiper.min.js', array('jquery'), $version, true );
    wp_register_script( 'lightbox-js', get_stylesheet_directory_uri() . '/assets/lightbox.js', array('jquery'), $version, true );

    wp_enqueue_script( 'lightbox-js' );
    wp_enqueue_script( 'swiper-js' );
    wp_enqueue_script( 'app-js' );
}
add_action( 'wp_enqueue_scripts', '_themeprefix_theme_scripts' );


// Initializing aсf blocks for gutenberg
require_once get_template_directory() . '/inc/acf/blocks/blocks-init.php';

// add options page
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

}