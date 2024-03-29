<?php
/**
 *  Mombo Besic Theme Settings
 *
 * @since Mombo 1.0
 *
 * @return array mombo_customize_register
 *
*/
function mombo_customize_register( $wp_customize ) {
    //Basic Post Message Settings
    $wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'custom_logo' )->transport     = 'postMessage';

    // Changing for site Identity
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title a',
        'render_callback' => 'mombo_customize_partial_blogname',
    ));
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'mombo_customize_partial_blogdescription',
    ));

    $wp_customize->add_setting( 'mombo_options[logo]' , array(
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'mombo_sanitize_url',
       'type'  =>  'theme_mod',
       'transport'   => 'postMessage',
    )); 

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        'mombo_options[logo]', array(
            'label'   => esc_html__('Logo Normal','mombo'),
            'section' => 'title_tagline',
            'priority' => 20,
    ) ) );    

    $wp_customize->add_setting( 'mombo_options[logo_sticky_menu]' , array(
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'mombo_sanitize_url',
       'type'  =>  'theme_mod',
       'transport'   => 'postMessage',
    )); 

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        'mombo_options[logo_sticky_menu]', array(
            'label'   => esc_html__('Logo Sticky Menu ','mombo'),
            'section' => 'title_tagline',
            'priority' => 20,
    ) ) );
 
 
    if( class_exists('Mombo_Customize_Alpha_Color_Control') ) {
        $wp_customize->add_setting( 'mombo_options[theme_color_primary]' , array(
            'default'     => '#03c',
            'sanitize_callback' => 'mombo_sanitize_rgba',
            'capability' => 'edit_theme_options',
        )); 
        $wp_customize->add_control(
            new Mombo_Customize_Alpha_Color_Control(
                $wp_customize,
                'mombo_options[theme_color_primary]',
                array(
                    'label'     => esc_html__( 'Theme Color Primary', 'mombo' ),
                    'section'   => 'colors', 
                )
            )
        );    

        $wp_customize->add_setting( 'mombo_options[theme_color_primary_hover]' , array(
            'default'     => '#002080',
            'sanitize_callback' => 'mombo_sanitize_rgba',
            'capability' => 'edit_theme_options',
        )); 
        $wp_customize->add_control(
            new Mombo_Customize_Alpha_Color_Control(
                $wp_customize,
                'mombo_options[theme_color_primary_hover]',
                array(
                    'label'     => esc_html__( 'Theme Color Primary Hover', 'mombo' ),
                    'section'   => 'colors', 
                )
            )
        );   

        $wp_customize->add_setting( 'mombo_options[theme_color_primary_light]' , array(
            'default'     => 'rgba(0, 51, 204, 0.1)',
            'sanitize_callback' => 'mombo_sanitize_rgba',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control(
            new Mombo_Customize_Alpha_Color_Control(
                $wp_customize,
                'mombo_options[theme_color_primary_light]',
                array(
                    'label'     => esc_html__( 'Theme Color Primary Light', 'mombo' ),
                    'section'   => 'colors', 
                )
            )
        ); 

        $wp_customize->add_setting( 'mombo_options[theme_color_secondary]' , array(
            'default'     => '#15db95',
            'sanitize_callback' => 'mombo_sanitize_rgba',
            'capability' => 'edit_theme_options',
        )); 
        $wp_customize->add_control(
            new Mombo_Customize_Alpha_Color_Control(
                $wp_customize,
                'mombo_options[theme_color_secondary]',
                array(
                    'label'     => esc_html__( 'Theme Color Secondary', 'mombo' ),
                    'section'   => 'colors', 
                )
            )
        ); 

        $wp_customize->add_setting( 'mombo_options[theme_color_secondary_hover]' , array(
            'default'     => '#0e9566',
            'sanitize_callback' => 'mombo_sanitize_rgba',
            'capability' => 'edit_theme_options',
        )); 
        $wp_customize->add_control(
            new Mombo_Customize_Alpha_Color_Control(
                $wp_customize,
                'mombo_options[theme_color_secondary_hover]',
                array(
                    'label'     => esc_html__( 'Theme Color Secondary Hover', 'mombo' ),
                    'section'   => 'colors', 
                )
            )
        );  

        $wp_customize->add_setting( 'mombo_options[theme_color_secondary_light]' , array(
            'default'     => 'rgba(21, 219, 149, 0.1)',
            'sanitize_callback' => 'mombo_sanitize_rgba',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control(
            new Mombo_Customize_Alpha_Color_Control(
                $wp_customize,
                'mombo_options[theme_color_secondary_light]',
                array(
                    'label'     => esc_html__( 'Theme Color Secondary Light', 'mombo' ),
                    'section'   => 'colors', 
                )
            )
        );  
    } 

    /**
     * Mombo WordPress Theme General Settings
     */   

    $wp_customize->add_panel(
        'mombo_general_panel', array(
            'priority' => 45,
            'title'    => esc_html__( 'General Settings', 'mombo' ),
        )
    ); 

    $wp_customize->add_section( 'mombo_preloader_section' , array(
        'title'      => esc_html__( 'Preloader', 'mombo' ), 
        'panel'    => 'mombo_general_panel', 
    )); 

    if ( class_exists( 'Mombo_Toggle_Control' ) ) {
        $wp_customize->add_setting( 'mombo_options[preloader]', array(
            'default'     => false,
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'mombo_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control( new Mombo_Toggle_Control( $wp_customize, 
            'mombo_options[preloader]', 
            array(
                'label'  => esc_html__( 'Preloader', 'mombo' ),
                'type'   => 'ios',
                'section'  => 'mombo_preloader_section', 
            ) 
        ));         
        
        $wp_customize->add_setting( 'mombo_options[preloader_page_id]', array(
            'default'     => 0,
            'capability' => 'edit_theme_options',
            'type' =>  'theme_mod',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'mombo_sanitize_select',
        ) );

      
        $args = array(
            'posts_per_page' => -1,  
            'post_type' => 'template',
            'meta_key' => 'mombo_template_type',
            'meta_value'  => 'preloader',
            'meta_compare' => '==', 
        );
        $the_query = new WP_Query( $args ); 
        $preloader_pages = [ 0 => esc_html__( 'Default', 'mombo' )];
        while ( $the_query->have_posts() ) : $the_query->the_post(); 
            $preloader_pages[get_the_ID()] = get_the_title();
        endwhile; wp_reset_postdata(); 
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
            'mombo_options[preloader_page_id]', 
            array(
                'label'                 => esc_html__( 'Preloader Template', 'mombo' ),
                'type'                  => 'select',
                'section'               => 'mombo_preloader_section', 
                'choices'               => $preloader_pages,
            ) 
        ) ); 
        
        $wp_customize->add_section( 'mombo_scroll_to_top_section' , array(
            'title'      => esc_html__( 'Scroll To Top', 'mombo' ), 
            'panel'    => 'mombo_general_panel', 
        )); 

        $wp_customize->add_setting( 'mombo_options[scroll_top_btn]', array(
            'default'     => false,
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'mombo_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control( new Mombo_Toggle_Control( $wp_customize, 
            'mombo_options[scroll_top_btn]', 
            array(
                'label'  => esc_html__( 'Scroll Top', 'mombo' ),
                'type'   => 'ios',
                'section'  => 'mombo_scroll_to_top_section', 
            ) 
        ));   

        $wp_customize->add_section( 'mombo_header_section' , array(
            'title'      => esc_html__( 'Header', 'mombo' ), 
            'panel'    => 'mombo_general_panel', 
        )); 

        $wp_customize->add_setting( 'mombo_options[header_template]', array(
            'default'     => 0,
            'capability' => 'edit_theme_options',
            'type' =>  'theme_mod',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'mombo_sanitize_select',
        ) ); 
        $args = array(
            'posts_per_page' => -1,  
            'post_type' => 'template',
            'meta_key' => 'mombo_template_type',
            'meta_value'  => 'header',
            'meta_compare' => '==', 
        );
        $the_query = new WP_Query( $args ); 
        $header_templates = [ 0 => esc_html__( 'Default', 'mombo' )];
        while ( $the_query->have_posts() ) : $the_query->the_post(); 
            $header_templates[get_the_ID()] = get_the_title();
        endwhile; wp_reset_postdata(); 
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
            'mombo_options[header_template]', 
            array(
                'label'                 => esc_html__( 'Header Template', 'mombo' ),
                'type'                  => 'select',
                'section'               => 'mombo_header_section', 
                'choices'               => $header_templates,
            ) 
        ) ); 

        $wp_customize->add_section( 'mombo_menu_bar_section' , array(
            'title'      => esc_html__( 'Menu Bar', 'mombo' ), 
            'panel'    => 'mombo_general_panel', 
        )); 

        $wp_customize->add_setting( 'mombo_options[container_size]', array(
            'default'     => 'container',
            'capability' => 'edit_theme_options',
            'type' =>  'theme_mod',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'mombo_sanitize_select',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
            'mombo_options[container_size]', 
            array(
                'label'                 => esc_html__( 'Container Area Size', 'mombo' ),
                'type'                  => 'select',
                'section'               => 'mombo_menu_bar_section', 
                'choices'               => array( 
                    'container' => esc_html__( 'Container', 'mombo' ),
                    'large' => esc_html__( 'Container Large', 'mombo' ), 
                ),
            ) 
        ) ); 

        $wp_customize->add_setting( 'mombo_options[menu_align]', array(
            'default'     => 'right',
            'capability' => 'edit_theme_options',
            'type' =>  'theme_mod',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'mombo_sanitize_select',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
            'mombo_options[menu_align]', 
            array(
                'label'                 => esc_html__( 'Menu Align', 'mombo' ),
                'type'                  => 'select',
                'section'               => 'mombo_menu_bar_section', 
                'choices'               => array( 
                    'right' => esc_html__( 'Right', 'mombo' ),
                    'center' => esc_html__( 'Center', 'mombo' ), 
                ),
            ) 
        ) ); 

        $wp_customize->add_setting( 'mombo_options[menu_right_btn_txt]', array(
            'default'     => '',
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'wp_filter_nohtml_kses',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control(
            'mombo_options[menu_right_btn_txt]', array(
                'label' => esc_html__( 'Menu Right Button Text:', 'mombo' ),
                'type' => 'text',
                'section' => 'mombo_menu_bar_section',
            )
        );

        $wp_customize->add_setting( 'mombo_options[menu_right_btn_url]', array(
            'default'     => '#',
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control(
            'mombo_options[menu_right_btn_url]', array(
                'label' => esc_html__( 'Menu Right Button URL:', 'mombo' ),
                'type' => 'text',
                'section' => 'mombo_menu_bar_section',
            )
        );

        $wp_customize->add_section( 'mombo_underconstruction_section' , array(
            'title'      => esc_html__( 'Underconstruction', 'mombo' ), 
            'panel'    => 'mombo_general_panel', 
        ));
        
        $wp_customize->add_setting( 'mombo_options[underconstruction]', array(
            'default'     => false,
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'mombo_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control( new Mombo_Toggle_Control( $wp_customize, 
            'mombo_options[underconstruction]', 
            array(
                'label'  => esc_html__( 'Underconstruction', 'mombo' ),
                'type'   => 'ios',
                'section'  => 'mombo_underconstruction_section', 
                
            ) 
        )); 

        $wp_customize->add_setting( 'mombo_options[underconstruction_page_id]', array(
            'default'     => 0,
            'capability' => 'edit_theme_options',
            'type' =>  'theme_mod',
            'transport'   => 'postMessage',
            'sanitize_callback' => 'mombo_sanitize_select',
        ) );

      
        $args = array(
            'posts_per_page' => -1,  
            'post_type' => 'page', 
        );
        $the_query = new WP_Query( $args ); 
        $underconstruction_pages = [ 0 => esc_html__( 'Select Page', 'mombo' )];
        while ( $the_query->have_posts() ) : $the_query->the_post(); 
            $underconstruction_pages[get_the_ID()] = get_the_title();
        endwhile; wp_reset_postdata(); 
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
            'mombo_options[underconstruction_page_id]', 
            array(
                'label'                 => esc_html__( 'Underconstruction Page', 'mombo' ),
                'type'                  => 'select',
                'section'               => 'mombo_underconstruction_section', 
                'choices'               => $underconstruction_pages,
            ) 
        ) ); 
    }   

    $wp_customize->add_setting( 'mombo_options[underconstruction_time_to]', array(
        'default'     => '2021/10/11',
        'transport'   => 'postMessage', 
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'mombo_options[underconstruction_time_to]', array(
            'label' => esc_html__( 'Underconstruction Time To', 'mombo' ),
            'type' => 'text',
            'section' => 'mombo_underconstruction_section',
        )
    ); 

    /**
     * Mombo WordPress Theme Blog Settings
     */  
    $wp_customize->add_panel(
        'mombo_blog_settings', array(
            'priority' => 45,
            'title'    => esc_html__( 'Blog Settings', 'mombo' ),
        )
    ); 

    $wp_customize->add_section( 'mombo_blog_entries' , array(
        'title'      => esc_html__( 'Blog Entries', 'mombo' ), 
        'panel'    => 'mombo_blog_settings', 
    )); 

    if ( class_exists( 'Mombo_Toggle_Control' ) ) {
        $wp_customize->add_setting( 'mombo_options[is_masonry]', array(
            'default'     => true,
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'mombo_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control( new Mombo_Toggle_Control( $wp_customize, 
            'mombo_options[is_masonry]', 
            array(
                'label'  => esc_html__( 'Post Style Masonry', 'mombo' ),
                'description' => esc_html__( 'Post style grid or masonry', 'mombo' ),
                'type'   => 'ios',
                'section'  => 'mombo_blog_entries', 
            ) 
        ));  
    }

    $wp_customize->add_setting(
        'mombo_options[blog_title]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
            'type'      =>  'theme_mod',
            'default'   => esc_html__( 'Latest Articles', 'mombo' ),
        )
    );

    $wp_customize->add_control(
        'mombo_options[blog_title]', array(
            'label' => esc_html__( 'Blog Title', 'mombo' ),
            'type' => 'text', 
            'section' => 'mombo_blog_entries',
        )
    ); 

    if ( class_exists( 'Mombo_Customize_Control_Radio_Image' ) ) { 
        $sidebar_choices = array(
            'no_side'    => array(
                'url'   =>  get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/full-width.png' ),
                'label' => esc_html__( 'Full Width', 'mombo' ),
            ),
            'left_side'  => array(
                'url'   => get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/sidebar-left.png' ),
                'label' => esc_html__( 'Left Sidebar', 'mombo' ),
            ),
            'right_side' => array(
                'url'   => get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/sidebar-right.png' ),
                'label' => esc_html__( 'Right Sidebar', 'mombo' ),
            ),
        );

        $wp_customize->add_setting( 'mombo_options[blog_layout]' , array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_key',
            'type'      =>  'theme_mod',
            'default' => 'sidebar-right',
        ));

        $wp_customize->add_control(
            new Mombo_Customize_Control_Radio_Image(
                $wp_customize, 'mombo_options[blog_layout]', array(
                    'label'    => esc_html__( 'Blog Layout', 'mombo' ),
                    'section'  => 'mombo_blog_entries', 
                    'choices'  => $sidebar_choices,
                )
            )
        );
    }

    $wp_customize->add_setting( 'mombo_options[excerpt_length]' , array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'type'      =>  'theme_mod',
        'default' => 15,
        'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 'mombo_options[excerpt_length]', array(
        'label' => esc_html__( 'Blog Post Excerpt Length', 'mombo' ),
        'description' => esc_html__( 'How many words want to show in post?', 'mombo' ),
        'section' => 'mombo_blog_entries',
        'type'        => 'number', 
        'input_attrs' => array(
            'min'  => 1,
            'max'   => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_section( 'mombo_blog_single' , array(
        'title'      => esc_html__( 'Blog Single', 'mombo' ), 
        'panel'    => 'mombo_blog_settings', 
    )); 

    if ( class_exists( 'Mombo_Customize_Control_Radio_Image' ) ) { 
        $sidebar_choices = array(
            'no_side'    => array(
                'url'   =>  get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/full-width.png' ),
                'label' => esc_html__( 'Full Width', 'mombo' ),
            ),
            'left_side'  => array(
                'url'   => get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/sidebar-left.png' ),
                'label' => esc_html__( 'Left Sidebar', 'mombo' ),
            ),
            'right_side' => array(
                'url'   => get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/sidebar-right.png' ),
                'label' => esc_html__( 'Right Sidebar', 'mombo' ),
            ),
        );

        $wp_customize->add_setting( 'mombo_options[blog_single_layout]' , array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_key',
            'type'      =>  'theme_mod',
            'default' => 'no_side',
        ));

        $wp_customize->add_control(
            new Mombo_Customize_Control_Radio_Image(
                $wp_customize, 'mombo_options[blog_single_layout]', array(
                    'label'    => esc_html__( 'Blog Single Layout', 'mombo' ),
                    'section'  => 'mombo_blog_single', 
                    'choices'  => $sidebar_choices,
                )
            )
        );

        $wp_customize->add_setting(
            'mombo_options[blog_single_title]', array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'wp_filter_nohtml_kses',
                'type'      =>  'theme_mod',
                'default'   => esc_html__( 'Read the blog story', 'mombo' ),
            )
        );
    
        $wp_customize->add_control(
            'mombo_options[blog_single_title]', array(
                'label' => esc_html__( 'Blog Single Title', 'mombo' ),
                'type' => 'text', 
                'section' => 'mombo_blog_single',
            )
        ); 
    }

    $wp_customize->add_section( 'mombo_page_header' , array(
        'title'      => esc_html__( 'Page Header', 'mombo' ), 
        'panel'    => 'mombo_blog_settings', 
    ));  
               
    $wp_customize->add_setting( 
        'mombo_options[header_img]', 
        array(
            'sanitize_callback' => 'mombo_sanitize_image'
        )
    ); 
      
    $wp_customize->add_control( 
        new WP_Customize_Upload_Control( 
            $wp_customize, 
            'mombo_options[header_img]', 
            array(
                'label'      => esc_html__( 'Header Image', 'mombo' ),
                'section'    => 'mombo_page_header'                   
            )
        ) 
    ); 

    if( class_exists('Mombo_Customizer_Dimensions_Control') ) {
        /**
         * Blog Padding
         */
        $wp_customize->add_setting( 'mombo_options[top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number',
            'default'               => 195,
        ) );
        $wp_customize->add_setting( 'mombo_options[bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number',
            'default'               => 135,
        ) );

        $wp_customize->add_setting( 'mombo_options[tablet_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number_blank',
            'default'               => 195,
        ) );
        $wp_customize->add_setting( 'mombo_options[tablet_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number_blank',
            'default'               => 135,
        ) );

        $wp_customize->add_setting( 'mombo_options[mobile_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number_blank',
            'default'               => 175,
        ) );
        $wp_customize->add_setting( 'mombo_options[mobile_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number_blank',
            'default'               => 135,
        ) );

        $wp_customize->add_control( new Mombo_Customizer_Dimensions_Control( $wp_customize, 'mombo_options[blog_padding]', array(
            'label'                 => esc_html__( 'Blog Padding (px)', 'mombo' ),
            'section'               => 'mombo_page_header',             
            'settings'   => array(
                'desktop_top'       => 'mombo_options[top_padding]',
                'desktop_bottom'    => 'mombo_options[bottom_padding]',
                'tablet_top'        => 'mombo_options[tablet_top_padding]',
                'tablet_bottom'     => 'mombo_options[tablet_bottom_padding]',
                'mobile_top'        => 'mombo_options[mobile_top_padding]',
                'mobile_bottom'     => 'mombo_options[mobile_bottom_padding]',
            ),
            'priority'              => 10,
            'input_attrs'           => array(
                'min'   => 0,
                'max'   => 400,
                'step'  => 1,
            ),
        ) ) );
    }

    /**
     * Mombo WordPress Theme Inner Page Settings
     */  
    $wp_customize->add_panel(
        'mombo_inner_settings', array(
            'priority' => 45,
            'title'    => esc_html__( 'Inner Page Settings', 'mombo' ),
        )
    ); 

    $wp_customize->add_section( 'mombo_job_single' , array(
        'title'      => esc_html__( 'Job Single', 'mombo' ), 
        'panel'    => 'mombo_inner_settings', 
    )); 

    $wp_customize->add_setting( 
        'mombo_options[job_header_img]', 
        array(
            'sanitize_callback' => 'mombo_sanitize_image'
        )
    ); 
      
    $wp_customize->add_control( 
        new WP_Customize_Upload_Control( 
            $wp_customize, 
            'mombo_options[job_header_img]', 
            array(
                'label'      => esc_html__( 'Job Header Image', 'mombo' ),
                'section'    => 'mombo_job_single'                   
            )
        ) 
    ); 

    $wp_customize->add_setting(
        'mombo_options[job_single_form_title_top]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
            'type'      =>  'theme_mod',
            'default'   => esc_html__( 'Apply Now', 'mombo' ),
        )
    );

    $wp_customize->add_control(
        'mombo_options[job_single_form_title_top]', array(
            'label' => esc_html__( 'Form Title Top', 'mombo' ),
            'type' => 'text', 
            'section' => 'mombo_job_single',
        )
    ); 

    $wp_customize->add_setting(
        'mombo_options[job_single_form_title]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
            'type'      =>  'theme_mod',
            'default'   => esc_html__( 'Apply for this Job', 'mombo' ),
        )
    );

    $wp_customize->add_control(
        'mombo_options[job_single_form_title]', array(
            'label' => esc_html__( 'Form Title', 'mombo' ),
            'type' => 'text', 
            'section' => 'mombo_job_single',
        )
    ); 

    $wp_customize->add_setting(
        'mombo_options[job_single_form_desc]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
            'type'      =>  'theme_mod',
            'default'   => esc_html__( 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.', 'mombo' ),
        )
    );

    $wp_customize->add_control(
        'mombo_options[job_single_form_desc]', array(
            'label' => esc_html__( 'Form Description', 'mombo' ),
            'type' => 'text', 
            'section' => 'mombo_job_single',
        )
    ); 

    $wp_customize->add_setting(
        'mombo_options[job_single_form_shortcode]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mombo_sanitize_shortcode',
            'type'      =>  'theme_mod',
            'default'   => '',
        )
    );

    $wp_customize->add_control(
        'mombo_options[job_single_form_shortcode]', array(
            'label' => esc_html__( 'Form Shortcode', 'mombo' ),
            'type' => 'text', 
            'section' => 'mombo_job_single',
        )
    ); 

    /**
     * End Mombo WordPress Theme Footer Control Panel
     */
    $wp_customize->add_section( 'mombo_footer' , array(
        'title'      => esc_html__( 'Footer Settings', 'mombo' ),
        'priority'   => 100,   
    ));

    $wp_customize->add_setting( 'mombo_options[footer_template]', array(
        'default'     => 0,
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'mombo_sanitize_select',
    ) ); 
    $args = array(
        'posts_per_page' => -1,  
        'post_type' => 'template',
        'meta_key' => 'mombo_template_type',
        'meta_value'  => 'footer',
        'meta_compare' => '==', 
    );
    $the_query = new WP_Query( $args ); 
    $footer_templates = [ 0 => esc_html__( 'Default', 'mombo' )];
    while ( $the_query->have_posts() ) : $the_query->the_post(); 
        $footer_templates[get_the_ID()] = get_the_title();
    endwhile; wp_reset_postdata(); 

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
        'mombo_options[footer_template]', 
        array(
            'label'                 => esc_html__( 'Footer Template', 'mombo' ),
            'type'                  => 'select',
            'section'               => 'mombo_footer', 
            'choices'               => $footer_templates,
        ) 
    ) ); 

    $wp_customize->add_setting( 'mombo_options[footer_widget_columns]', array(
        'default'     => 4,
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'mombo_sanitize_select',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
        'mombo_options[footer_widget_columns]', 
        array(
            'label'                 => esc_html__( 'Footer Widget Columns', 'mombo' ),
            'type'                  => 'select',
            'section'               => 'mombo_footer', 
            'choices'               => array( 
                2 => esc_html__( 'Two', 'mombo' ),
                3 => esc_html__( 'Three', 'mombo' ),
                4 => esc_html__( 'Four', 'mombo' ), 
            ),
        ) 
    ) ); 

    $wp_customize->add_setting(
        'mombo_options[footer_copyright_info]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mombo_sanitize_advance_html',
            'type'      =>  'theme_mod',
            'transport' => 'postMessage',
            'default'   => 'Copyright &copy; 2020 Mombo All rights Reserved. Developed By - <a href="#">TechCandle</a>',
        )
    );

    $wp_customize->add_control(
        'mombo_options[footer_copyright_info]', array(
            'label' => esc_html__( 'Footer Copyright Text', 'mombo' ),
            'type' => 'text', 
            'section' => 'mombo_footer',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'mombo_options[footer_copyright_info]', array(
        'selector' => '.copyright-text', 
    ) );

    /**
     * End Mombo WordPress Theme Footer Control Panel
     */    
}
add_action( 'customize_register', 'mombo_customize_register' );

 