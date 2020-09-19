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
if(get_post_meta(get_the_ID(), 'mombo_mb_header_part') == 'hide') return; ?>

<!-- Header
================================================== --> 
<header class="site-header sticky-header bg-lavender" id="site-header">
    <?php 
    $header_layout = mombo_get_options(array('header_layout_dispay','header_one'));
    if( $header_layout == 'header_one' ) { ?>
    <div class="header-ver-one">
        <div class="container">
            <div class="row">
                <div class="col-8 col-sm-6 col-lg-2 col-xl-2">
                    <div class="header-left">                    
                        <div class="site-logo">
                            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                                the_custom_logo();
                            } else { 
                                if ( function_exists( 'display_header_text' ) ) { 
                                    if( display_header_text() == true ) { ?>
                                    <div class="site-branding-text">
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

                                        <?php $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) : ?>
                                        <p class="site-description"><?php echo esc_html($description); ?></p>
                                        <?php endif; ?>
                                    </div><!-- .site-branding-text -->
                                    <?php }
                                }
                            } ?>
                        </div><!-- /.site-logo -->
                    </div><!-- /.header-left -->
                </div><!-- /.col-md-6 -->

                <div class="col-4 col-sm-6 col-lg-10 col-xl-10">
                    <div class="header-right header-one-right">
                        <?php if( mombo_get_options('header_right_settings') == 'button' ): ?>
                            <div class="right-area float-right mrt-30 mrl-15">
                                <a href="<?php echo esc_url( mombo_get_options(array('header_right_button_url','#')) ); ?>" class="btn btn-gf btn-md bg-blue-violet w-600 color-white"><?php echo esc_html( mombo_get_options(array('header_right_button_title', esc_html__('Hire Me', 'mombo') )) ); ?></a>
                            </div><!-- /.right-area --> 
                        <?php elseif(mombo_get_options('header_right_settings') == 'social'): ?>   
                            <nav class="social-nav float-right mrt-35 mrl-30">
                                <ul class="social-item">
                                    <?php 
                                        $social_url_field = mombo_get_options('social_url');
                                        $item_json_decode = json_decode($social_url_field);
                                        $item_open = mombo_get_options(array('social_profile_target','_blank'));
                                        if( !empty($social_url_field) ) :
                                        foreach ($item_json_decode as $key ) { ?>
                                            <li><a href="<?php echo esc_url($key->link); ?>" target="<?php echo esc_attr( $item_open ); ?>" class="social-btn-lg rd-p-50 bg-blue-violet color-white">
                                                <?php if( !empty( $key->icon_value )  ) :?>
                                                    <i class="fa <?php echo esc_attr($key->icon_value); ?>"></i>
                                                <?php elseif( !empty( $key->image_url ) ) : ?>
                                                    <img src="<?php echo esc_attr( mombo_get_image_crop_size_by_url( $key->image_url, 45, 45) ); ?>" width="45" height="45" alt="<?php esc_attr_e('Social Profile','mombo'); ?>">
                                                <?php endif; ?>
                                            </a></li>
                                        <?php }
                                        endif;
                                    ?>
                                </ul>
                            </nav><!-- /.social-nav -->  
                        <?php endif; ?>

                        <a href="#" class="hamburger-btn-wrap mrt-15">
                            <div class="hamburger-btn">
                                <span class="hamburger-content"></span>    
                            </div>
                        </a>   

                        <nav class="navigation float-right mrt-15">
                            <!-- Main Menu -->
                            <div class="menu-wrapper">
                                <div class="menu-content">
                                    <?php 
                                        wp_nav_menu ( array(
                                            'menu_class' => 'mainmenu',
                                            'container'=> 'ul',
                                            'theme_location' => 'main-menu',  
                                        )); 
                                    ?> 
                                </div> <!-- /.hours-content-->
                            </div><!-- /.menu-wrapper --> 
                        </nav><!-- /.site-navigation -->
                    </div><!-- /.header-right -->
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div> <!-- /.header-ver-one -->
    <?php } else { ?>
    <div class="header-ver-one">
        <div class="container">
            <div class="row">
                <div class="col-8 col-sm-6 col-lg-2 col-xl-2">
                    <div class="header-left">                    
                        <div class="site-logo main-logo">
                            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                                the_custom_logo();
                            } else { 
                                if ( function_exists( 'display_header_text' ) ) { 
                                    if( display_header_text() == true ) { ?>
                                    <div class="site-branding-text">
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

                                        <?php $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) : ?>
                                        <p class="site-description"><?php echo esc_html($description); ?></p>
                                        <?php endif; ?>
                                    </div><!-- .site-branding-text -->
                                    <?php }
                                }
                            } ?>
                        </div><!-- /.site-logo -->
                        <div class="site-logo sticky-logo">
                            <?php if(mombo_get_options('sticky_menu_logo')) : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link">
                                <img src="<?php echo esc_url(mombo_get_options('sticky_menu_logo')); ?>" alt="<?php echo esc_attr__('Site Logo', 'mombo'); ?>" />
                            </a>
                            <?php endif; ?>
                        </div><!-- /.site-logo -->
                    </div><!-- /.header-left -->
                </div><!-- /.col-md-6 -->
    
                <div class="col-4 col-sm-6 col-lg-10 col-xl-10 humberger-menu-warp">
                    <div class="header-right float-right">
                        <a href="#" class="hamburger-btn-wrap mrt-15">
                            <div class="hamburger-btn">
                                <span class="hamburger-content"></span>    
                            </div>
                        </a>
                        <!-- Hamburger Block
                        ================================================== -->
                        <div class="hamburger-block">
                            <nav class="navigation">
                                <!-- Main Menu -->
                                <div class="menu-wrapper">
                                    <div class="menu-content">
                                        <?php 
                                            wp_nav_menu ( array(
                                                'menu_class' => 'mainmenu',
                                                'container'=> 'ul',
                                                'theme_location' => 'main-menu',  
                                            )); 
                                        ?>
                                    </div> <!-- /.hours-content-->
                                </div><!-- /.menu-wrapper --> 
                            </nav><!-- /.site-navigation -->
                        </div><!-- /.hamburger-block -->
                    </div><!-- /.header-right -->
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div> <!-- /.header-ver-one -->
    <?php } ?>
</header><!-- /.site-header -->