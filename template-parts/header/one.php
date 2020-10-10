<?php
/**
 * This template for displaying header part
 *
 * @package Mombo
 * @since 1.0
 */
?>

<?php 
/**
 * Preloader
 * @package Mombo
 * @since 1.0
 */
mombo_preloader(); 

/**
 * Header Part show/hide condition
 * @package Mombo
 * @since 1.0
 */ 
if ( get_post_meta(get_the_ID(), 'mombo_mb_header_part', true) == 'hide' ) return; ?>

<!-- Header -->
<header class="header-nav header-white">
    <div class="fixed-header-bar">
        <div class="container container-large">
            <div class="navbar navbar-default navbar-expand-lg main-navbar">
                <div class="navbar-brand">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php esc_attr( bloginfo( 'name' ) ); ?>" class="logo">
                        <img src="<?php echo esc_url(  mombo_get_options( array('logo', get_theme_file_uri('/assets/img/logo-light.svg')) ) ); ?>" class="light-logo" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>">
                        <img src="<?php echo esc_url(  mombo_get_options( array('logo_sticky_menu', get_theme_file_uri('/assets/img/logo.svg')) ) ); ?>" class="dark-logo" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>">
                    </a>
                </div>
                <!-- <div class="navbar-collapse justify-content-end collapse" id="navbar-collapse-toggle">
                    <?php 
                        // wp_nav_menu ( array(
                        //     'menu_class' => 'nav navbar-nav m-auto',
                        //     'container'=> 'ul',
                        //     'theme_location' => 'header-menu', 
                        //     'walker' => new Mombo_Custom_Walker() ,
                        //     'fallback_cb'       => 'Mombo_Custom_Walker::fallback_header_menu', 
                        // )); 
                    ?>
                </div> -->
<<<<<<< HEAD
                <div class="overlay">
                    <div id="main-menu">
                        <?php 
                            wp_nav_menu ( array(
                                'container_class' => '',
                                'container'=> '',
                                'theme_location' => 'header-menu',  
                            )); 
                        ?> 
                    </div>
=======
                <div id="main-menu">
                    <?php 
                        wp_nav_menu ( array(
                            'container_class' => '',
                            'container'=> '',
                            'theme_location' => 'header-menu',  
                            'walker' => new Mombo_Custom_Walker() ,
                            'fallback_cb'       => 'Mombo_Custom_Walker::fallback_header_menu', 
                        )); 
                    ?>
>>>>>>> 1a38b44eaf6ed546dfb91f030c348834b5fd543b
                </div>
                <div class="extra-menu d-flex align-items-center">
                    <div class="d-none d-md-block h-btn m-35px-l">
                        <a class="m-btn m-btn-theme2nd m-btn-radius" href="#">Buy Now</a>
                    </div>
                    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-collapse-toggle" aria-expanded="false">
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->