<?php 
if ( ! defined( 'ABSPATH' ) ) die( esc_html__( 'Direct access forbidden.', 'mombo' ) );

/*
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 * If you're building a theme based on Mombo, use a find and replace
 * to change 'mombo' to the name of your theme in all the template files
 */
load_theme_textdomain( 'mombo', get_template_directory() . '/languages' );

/**
 * Add default posts and comments RSS feed links to head.
 * @package Mombo
 * @since 1.0
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 * @package Mombo
 * @since 1.0
 */
add_theme_support( 'title-tag' );

/**
 * Enable support for Post Thumbnails on posts and pages.
 * @package Mombo
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 * @since 1.0
 */
add_theme_support( 'post-thumbnails' );

/**
 * Enable support for register menu
 * @package Mombo
 * @since 1.0
 */
register_nav_menus( 
    array(
        'header-menu' => esc_html__( 'Header Menu', 'mombo' ),
        'footer-menu' => esc_html__( 'Footer Menu', 'mombo' ),
    ) 
);

$menu_lists = [];
$wp_nav_menus = wp_get_nav_menus();
if ( $wp_nav_menus ) {
    foreach( $wp_nav_menus as $menu ) {
        $menu_lists[$menu->slug] = $menu->name;
    } 
    register_nav_menus( $menu_lists );
}


/**
 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
 * @package Mombo
 * @since 1.0
 */
add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) 
);

/**
 * Enable support for custom background.
 * @package Mombo
 * @since 1.0
 */
add_theme_support( 'custom-background', apply_filters( 'mombo_custom_background_args', array (
    'default-color' => 'fff',
    'default-image' => '',
) ) );

/**
 * Enable support for custom Header Image.
 * @package Mombo
 * @since 1.0
 */
$args = array(
    'flex-width'    => true,
    'width'         => 1920,
    'flex-height'    => true,
    'height'        => 932,
);
add_theme_support( 'custom-header', $args );

/** 
 * Enable selective refresh for widgets.
 *
 * @since 1.0
 */
add_theme_support( 'customize-selective-refresh-widgets' );

/**
 * Enable support for custom Editor Style.
 *
 * @since 1.0
 */
add_editor_style( 'assets/css/custom-editor-style.css' );

/** 
 * Enable WP Gutenberg Block Style
 *
 * @since 1.0
 */
add_theme_support( 'wp-block-styles' );

/** 
 * Enable WP Gutenberg Align Wide
 *
 * @since 1.0
 */
add_theme_support( 'align-wide' );

/** 
 * Enable Custom Color Scheme For Block Style
 *
 * @since 1.0
 */
add_theme_support( 'editor-color-palette', array(
    array(
        'name'  => 'strong blue',
        'slug'  => 'strong-blue',
        'color' => '#0073aa',
    ),
    array(
        'name'  => 'lighter blue',
        'slug'  => 'lighter-blue',
        'color' => '#229fd8',
    ),
    array(
        'name'  => 'very light gray',
        'slug'  => 'very-light-gray',
        'color' => '#eee',
    ),
    array(
        'name'  => 'very dark gray',
        'slug'  => 'very-dark-gray',
        'color' => '#444',
    )
) );