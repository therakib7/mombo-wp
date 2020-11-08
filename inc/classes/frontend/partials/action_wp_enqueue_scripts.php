<?php 
if ( ! defined( 'ABSPATH' ) ) die( esc_html__( 'Direct access forbidden.', 'mombo' ) );

// enqueue styles
wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/plugin/bootstrap/css/bootstrap.min.css' ) );
wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/plugin/font-awesome/css/all.min.css' ) );
wp_enqueue_style( 'et-line', get_theme_file_uri( '/assets/plugin/et-line/et-line.min.css' ) );
wp_enqueue_style( 'themify-icons', get_theme_file_uri( '/assets/plugin/themify-icons/themify-icons.min.css' ) ); 
wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/assets/plugin/owl-carousel/css/owl.carousel.min.css' ) );
wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/plugin/magnific/magnific-popup.min.css' ) );
wp_enqueue_style( 'mombo-master', get_theme_file_uri( '/assets/style/master.min.css' ) ); 
wp_enqueue_style( 'mombo-main-style', get_stylesheet_uri() ); 

// enqueue scripts
wp_enqueue_script( 'appear', get_theme_file_uri( '/assets/plugin/appear/jquery.appear.min.js' ), array('jquery'), false, true);
wp_enqueue_script( 'popper', get_theme_file_uri( '/assets/plugin/bootstrap/js/popper.min.js' ), array('jquery'), false, true);
wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/plugin/bootstrap/js/bootstrap.min.js' ), array('jquery'), false, true);
wp_enqueue_script( 'masonry' );
wp_enqueue_script( 'mombo-custom', get_theme_file_uri( '/assets/js/custom.min.js' ), array('jquery'), false, true);  

wp_localize_script('mombo-custom', 'mombo', array (
        'ajaxurl' => admin_url( 'admin-ajax.php' ),  
        'directory_uri' => get_template_directory_uri(),
        'loading_text' => esc_html__( 'Loading...', 'mombo' ), 
        'underconstruction_time_to' => mombo_get_options( array('underconstruction_time_to', '2021/10/11') ), 
        'scroll_top_btn' => mombo_get_options( 'scroll_top_btn' ) 
    )
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}
