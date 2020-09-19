<?php 
if ( ! defined( 'ABSPATH' ) ) die( esc_html__( 'Direct access forbidden.', 'mombo' ) );

wp_enqueue_style( 'mombo-admin-css', get_theme_file_uri( '/assets/custom/admin.css') );

// enqueue scripts
wp_enqueue_script( 'mombo-backend-js', get_theme_file_uri( '/assets/custom/admin.js' ), array('jquery'), false, true );
wp_localize_script( 
	'mombo-backend-js', 
	'mombo', array (
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'root' => esc_url_raw( rest_url() ),
        'home_uri' => esc_url( home_url( '/' ) ), 
    )
);
