<?php 
if ( ! defined( 'ABSPATH' ) ) die( esc_html__( 'Direct access forbidden.', 'mombo' ) );

register_sidebar(  array(
    'name'          => esc_html__( 'Sidebar Blog', 'mombo' ),
    'description'   => esc_html__( 'This sidebar will show in blog page', 'mombo' ),
    'id'            => 'sidebar-blog',
    'before_widget' => '<aside id="%1$s" class="card widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<div class="card-header bg-transparent"><span class="h5 m-0px font-w-600 dark-color">',
    'after_title'   => '</span></div>',
) );

register_sidebar(  array(
    'name'          => esc_html__( 'Sidebar Single', 'mombo' ),
    'description'   => esc_html__( 'This sidebar will show in blog single page', 'mombo' ),
    'id'            => 'sidebar-single',
    'before_widget' => '<aside id="%1$s" class="card widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<div class="card-header bg-transparent"><span class="h5 m-0px font-w-600 dark-color">',
    'after_title'   => '</span></div>',
) );

register_sidebar(  array(
    'name'          => esc_html__( 'Sidebar Faq', 'mombo' ),
    'description'   => esc_html__( 'This sidebar will show in faq single page', 'mombo' ),
    'id'            => 'sidebar-faq',
    'before_widget' => '<aside id="%1$s" class="card widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<div class="card-header bg-transparent"><span class="h5 m-0px font-w-600 dark-color">',
    'after_title'   => '</span></div>',
) );

register_sidebar(  array(
    'name'          => esc_html__( 'Sidebar WooCommerce', 'mombo' ),
    'description'   => esc_html__( 'This sidebar will show in WooCommerce page', 'mombo' ),
    'id'            => 'sidebar-woocommerce',
    'before_widget' => '<aside id="%1$s" class="card widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<div class="card-header bg-transparent"><span class="h5 m-0px font-w-600 dark-color">',
    'after_title'   => '</span></div>',
) );

register_sidebars( mombo_get_options( array('footer_widget_columns', 4) ), array(
    'name'          => esc_html__( 'Sidebar Footer %d', 'ramble' ),
    'id'            => 'sidebar-footer',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h6 class="widget-title">',
    'after_title'   => '</h6>',
) );
