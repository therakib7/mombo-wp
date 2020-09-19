<?php 
if ( ! defined( 'ABSPATH' ) ) die( esc_html__( 'Direct access forbidden.', 'mombo' ) );

// enqueue styles
wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/fontawesome.min.css' ) );
wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.css' ) );
wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ) ); 
wp_enqueue_style( 'swiper', get_theme_file_uri( '/assets/css/swiper.min.css' ) );
wp_enqueue_style( 'mombo-icon', get_theme_file_uri( '/assets/css/mombo-icon.css' ) );
wp_enqueue_style( 'mombo-style', get_theme_file_uri( '/assets/css/style.css' ) ); 
wp_enqueue_style( 'mombo-main-style', get_stylesheet_uri() ); 

// enqueue scripts
wp_enqueue_script( 'modernizr', get_theme_file_uri( '/assets/js/modernizr.min.js' ), array('jquery'), false, false);
wp_enqueue_script( 'popper', get_theme_file_uri( '/assets/js/popper.min.js' ), array('jquery'), false, true);
wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array('jquery'), false, true);
wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/assets/js/owl.carousel.min.js' ), array('jquery'), false, true);
wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array('jquery'), false, true);
wp_enqueue_script( 'fitvids', get_theme_file_uri( '/assets/js/jquery.fitvids.js' ), array('jquery'), false, true);
wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array('jquery'), false, true);
wp_enqueue_script( 'swiper', get_theme_file_uri( '/assets/js/swiper.min.js' ), array('jquery'), false, true);
wp_enqueue_script( 'ajaxchimp', get_theme_file_uri( '/assets/js/ajaxchimp.js' ), array('jquery'), false, true);
wp_enqueue_script( 'mombo-main', get_theme_file_uri( '/assets/js/main.js' ), array('jquery'), false, true);

wp_enqueue_script( 'masonry' );

wp_enqueue_script('mombo-custom-js', get_theme_file_uri( '/assets/custom/custom.js' ), array('jquery'), false, true);

wp_localize_script('mombo-custom-js', 'mombo', array (
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'scroll_top' => mombo_get_options('scroll_top_btn'),
        'sticky_contact' => mombo_get_options('sticky_contact_btn'),
        'sticky_contact_url' => mombo_get_options(array('sticky_contact_url','#')),
    )
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}
