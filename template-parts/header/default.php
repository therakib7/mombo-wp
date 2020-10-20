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
if ( mombo_meta_options('header_part') == 'hide' || is_singular( 'template' ) ) return; 

if ( mombo_meta_options('header_part') == 'custom' && mombo_meta_options('header_custom_template') ):  
    $the_query = new WP_Query( 
        array(
            'p' => mombo_meta_options('header_custom_template'),   
            'post_type' => 'template',
        )
    ); 
    while ( $the_query->have_posts() ) : $the_query->the_post();
        the_content();
    endwhile; wp_reset_postdata();
else: ?> 
<!-- Header -->
<header class="header-nav header-white">
    <div class="fixed-header-bar">
        <?php $container_size = ( mombo_get_options( 'container_size' ) == 'large' ) ? '' : 'container'; ?>
        <div class="<?php echo esc_attr( $container_size ); ?> container-large">
            <div class="navbar navbar-default navbar-expand-lg main-navbar">
                <div class="navbar-brand">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php esc_attr( bloginfo( 'name' ) ); ?>" class="logo">
                        <img src="<?php echo esc_url(  mombo_get_options( array('logo', get_theme_file_uri('/assets/img/logo-light.svg')) ) ); ?>" class="light-logo" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>">
                        <img src="<?php echo esc_url(  mombo_get_options( array('logo_sticky_menu', get_theme_file_uri('/assets/img/logo.svg')) ) ); ?>" class="dark-logo" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>">
                    </a>
                </div> 

                <?php    
                    $menu_align_right = ( mombo_get_options( 'menu_align' ) == 'center' && mombo_get_options( 'menu_right_btn_txt' ) ) ? '' : ' menu-align-right'; 
                    wp_nav_menu ( array(
                        'container_class' => 'main-menu' . $menu_align_right,
                        'container'=> 'div',
                        'theme_location' => 'header-menu',  
                        'walker' => new Mombo_Custom_Walker() ,
                        'fallback_cb'  => 'Mombo_Custom_Walker::fallback_header_menu', 
                    )); 
                ?>  

                <div class="extra-menu d-flex align-items-center"> 
                    <?php if ( mombo_get_options( 'menu_right_btn_txt' ) ) { ?> 
                        <div class="d-none d-md-block h-btn m-35px-l">
                            <a class="m-btn m-btn-theme2nd m-btn-radius" href="<?php echo esc_url( mombo_get_options( 'menu_right_btn_url' ) ); ?>"><?php echo esc_html( mombo_get_options( 'menu_right_btn_txt' ) ); ?></a>
                        </div> 
                    <?php } ?> 

                    <button type="button" class="tc-toggle-menu d-lg-none">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End --> 
<?php endif; ?>