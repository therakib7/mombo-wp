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

    $wp_customize->add_setting( 'mombo_options[home_page_logo]' , array(
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'mombo_sanitize_url',
       'type'  =>  'theme_mod',
       'transport'   => 'postMessage',
    )); 

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        'mombo_options[home_page_logo]', array(
            'label'   => esc_html__('Home page Logo','mombo'),
            'section' => 'title_tagline',
            'priority' => 20,
    ) ) );    

    $wp_customize->add_setting( 'mombo_options[sticky_menu_logo]' , array(
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'mombo_sanitize_url',
       'type'  =>  'theme_mod',
       'transport'   => 'postMessage',
    )); 

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        'mombo_options[sticky_menu_logo]', array(
            'label'   => esc_html__('Sticky Header Logo','mombo'),
            'section' => 'title_tagline',
            'priority' => 20,
    ) ) );

    if( class_exists('Mombo_Customizer_Dimensions_Control') ) {
        /**
         * Blog Padding
         */
        $wp_customize->add_setting( 'mombo_options[logo_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number',
            'default'               => 20,
        ) );
        $wp_customize->add_setting( 'mombo_options[logo_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number',
            'default'               => 20,
        ) );

        $wp_customize->add_setting( 'mombo_options[logo_tablet_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number_blank',
            'default'               => 20,
        ) );
        $wp_customize->add_setting( 'mombo_options[logo_tablet_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number_blank',
            'default'               => 20,
        ) );

        $wp_customize->add_setting( 'mombo_options[logo_mobile_top_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number_blank',
            'default'               => 20,
        ) );
        $wp_customize->add_setting( 'mombo_options[logo_mobile_bottom_padding]', array(
            'transport'             => 'postMessage',
            'sanitize_callback'     => 'mombo_sanitize_number_blank',
            'default'               => 20,
        ) );

        $wp_customize->add_control( new Mombo_Customizer_Dimensions_Control( $wp_customize, 'mombo_options[logo_padding]', array(
            'label'                 => esc_html__( 'Logo Padding (px)', 'mombo' ),
            'section'               => 'title_tagline',             
            'settings'   => array(
                'desktop_top'       => 'mombo_options[logo_top_padding]',
                'desktop_bottom'    => 'mombo_options[logo_bottom_padding]',
                'tablet_top'        => 'mombo_options[logo_tablet_top_padding]',
                'tablet_bottom'     => 'mombo_options[logo_tablet_bottom_padding]',
                'mobile_top'        => 'mombo_options[logo_mobile_top_padding]',
                'mobile_bottom'     => 'mombo_options[logo_mobile_bottom_padding]',
            ),
            'priority'              => 20,
            'input_attrs'           => array(
                'min'   => 0,
                'max'   => 100,
                'step'  => 1,
            ),
        ) ) );
    }

    $wp_customize->add_setting( 'mombo_options[theme_color]' , array(
       'default'   => '#7540ee',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_hex_color',
       'type'      =>  'theme_mod',
       'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'mombo_options[theme_color]', array(
           'label'    => esc_html__( 'Theme Color', 'mombo' ),
           'section'  => 'colors',
        ) 
    ));    

    $wp_customize->add_setting( 'mombo_options[menu_color]' , array(
       'default'   => '#4a4a4a',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_hex_color',
       'type'      =>  'theme_mod',
       'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'mombo_options[menu_color]', array(
           'label'    => esc_html__( 'Menu Color', 'mombo' ),
           'section'  => 'colors',
        ) 
    ));      

    $wp_customize->add_setting( 'mombo_options[dropdown_menu_bg]' , array(
       'default'   => '#232323',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_hex_color',
       'type'      =>  'theme_mod',
       'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'mombo_options[dropdown_menu_bg]', array(
           'label'    => esc_html__( 'Dropdown Menu Background', 'mombo' ),
           'section'  => 'colors',
        ) 
    ));    

    $wp_customize->add_setting( 'mombo_options[dropdown_menu_color]' , array(
       'default'   => '#f7f7f7',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'sanitize_hex_color',
       'type'      =>  'theme_mod',
       'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'mombo_options[dropdown_menu_color]', array(
           'label'    => esc_html__( 'Dropdown Menu Color', 'mombo' ),
           'section'  => 'colors',
        ) 
    ));

    $wp_customize->add_setting( 'mombo_options[footer_background]' , array(
        'default'     => '#7540ee',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'type'      =>  'theme_mod',
        'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'mombo_options[footer_background]', array(
           'label'    => esc_html__( 'Footer Background Color: ', 'mombo' ),
           'section'  => 'colors',
        ) 
    ));

    $wp_customize->add_setting( 'mombo_options[footer_color]' , array(
        'default'     => '#dedede',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'type'      =>  'theme_mod',
        'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'mombo_options[footer_color]', array(
           'label'    => esc_html__( 'Footer Text Color: ', 'mombo' ),
           'section'  => 'colors',
        ) 
    ));    

    $wp_customize->add_setting( 'mombo_options[footer_link_color]' , array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'type'      =>  'theme_mod',
        'transport'   => 'postMessage',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( $wp_customize, 'mombo_options[footer_link_color]', array(
           'label'    => esc_html__( 'Footer Link Color: ', 'mombo' ),
           'section'  => 'colors',
        ) 
    ));

    /**
     * Mombo WordPress Theme Header Settings
     */  
    $wp_customize->add_section( 'mombo_header_settings' , array(
        'title'      => esc_html__( 'Header Settings', 'mombo' ),
        'priority'   => 28,
    ) ); 


    if ( class_exists( 'Mombo_Customize_Control_Radio_Image' ) ) { 
        $sidebar_choices = array(
            'header_one'    => array(
                'url'   =>  get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/header-one.png' ),
                'label' => esc_html__( 'Header One', 'mombo' ),
            ),
            'header_two'  => array(
                'url'   => get_theme_file_uri( '/inc/customizer/customizer-radio-image/img/header-two.png' ),
                'label' => esc_html__( 'Header Two', 'mombo' ),
            ),
        );

        $wp_customize->add_setting( 'mombo_options[header_layout_dispay]' , array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_key',
            'type'      =>  'theme_mod',
            'default' => 'header_one',
        ));

        $wp_customize->add_control(
            new Mombo_Customize_Control_Radio_Image(
                $wp_customize, 'mombo_options[header_layout_dispay]', array(
                    'label'    => esc_html__( 'Header Layout', 'mombo' ),
                    'section'  => 'mombo_header_settings',
                    'priority' => 10,
                    'choices'  => $sidebar_choices,
                )
            )
        );
    }


    $wp_customize->add_setting( 'mombo_options[header_right_settings]', array(
        'default'     => 'button',
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'mombo_sanitize_select',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
        'mombo_options[header_right_settings]', 
        array(
            'label'                 => esc_html__( 'Header Menu Right', 'mombo' ),
            'type'                  => 'select',
            'section'               => 'mombo_header_settings',
            'priority'              => 12, 
            'choices'               => array(
                'button' => esc_html__( 'Button', 'mombo' ),
                'social'  => esc_html__( 'Social URL', 'mombo' ),
                'none'  => esc_html__( 'None', 'mombo' ),
            ),
        ) 
    ) );

    $wp_customize->add_setting( 'mombo_options[header_right_button_title]', array(
        'sanitize_callback' => 'mombo_sanitize_text_or_array_field',
        'default'     => 'Hire Me',
        'transport'   => 'postMessage', 
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'mombo_options[header_right_button_title]', 
        array(
            'label'                 => esc_html__( 'Header Menu Button Title', 'mombo' ),
            'type'                  => 'text',
            'section'               => 'mombo_header_settings',
            'priority'              => 12,
        ) 
    ) );

    $wp_customize->add_setting( 'mombo_options[header_right_button_url]', array(
        'sanitize_callback' => 'esc_url_raw',
        'default'     => '#',
        'transport'   => 'postMessage', 
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'mombo_options[header_right_button_url]', 
        array(
            'label'                 => esc_html__( 'Header Menu Button URL', 'mombo' ),
            'type'                  => 'text',
            'section'               => 'mombo_header_settings',
            'priority'              => 12,
        ) 
    ) );

    $wp_customize->add_setting( 'mombo_options[social_profile_target]', array(
        'default'     => '_blank',
        'capability' => 'edit_theme_options',
        'type' =>  'theme_mod',
        'transport'   => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
        'mombo_options[social_profile_target]', 
        array(
            'label'                 => esc_html__( 'Social Link Target', 'mombo' ),
            'type'                  => 'select',
            'section'               => 'mombo_header_settings',
            'priority'              => 12, 
            'choices'               => array(
                '_blank' => esc_html__( 'New Window', 'mombo' ),
                '_self'  => esc_html__( 'Same Window', 'mombo' ),
            ),
        ) 
    ) );

    if ( class_exists( 'Mombo_Customizer_Repeater_Control' ) ) { 
        $wp_customize->add_setting( 'mombo_options[social_url]', array(
            'sanitize_callback' => 'mombo_customizer_repeater_sanitize',
            'capability' => 'edit_theme_options',
            'transport'   => 'postMessage',
        )); 
    
        $wp_customize->add_control( new Mombo_Customizer_Repeater_Control( $wp_customize, 'mombo_options[social_url]', array(
            'label'   => esc_html__('Social URL','mombo'),
            'section' => 'mombo_header_settings',
            'priority' => 12,
            'customizer_repeater_image_control' => true,
            'customizer_repeater_icon_control' => true,
            'customizer_repeater_link_control' => true,
        ) ) );
    }

    /**
     * Mombo WordPress Theme General Settings
     */  
    $wp_customize->add_section( 'mombo_general_settings' , array(
        'title'      => esc_html__( 'General Settings', 'mombo' ),
        'priority'   => 28,
    ) ); 

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
                'label'  => esc_html__( 'Preloader:', 'mombo' ),
                'type'   => 'ios',
                'section'  => 'mombo_general_settings',
                'priority' => 10, 
                
            ) 
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
                'label'  => esc_html__( 'Scroll Top:', 'mombo' ),
                'type'   => 'ios',
                'section'  => 'mombo_general_settings',
                'priority' => 10, 
                
            ) 
        ));        

        $wp_customize->add_setting( 'mombo_options[sticky_contact_btn]', array(
            'default'     => false,
            'transport'   => 'postMessage', 
            'sanitize_callback' => 'mombo_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));

        $wp_customize->add_control( new Mombo_Toggle_Control( $wp_customize, 
            'mombo_options[sticky_contact_btn]', 
            array(
                'label'  => esc_html__( 'Sticky Contact Button:', 'mombo' ),
                'type'   => 'ios',
                'section'  => 'mombo_general_settings',
                'priority' => 10, 
                
            ) 
        ));        
    }   
    $wp_customize->add_setting( 'mombo_options[sticky_contact_url]', array(
        'default'     => '#',
        'transport'   => 'postMessage', 
        'sanitize_callback' => 'mombo_sanitize_url',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
        'mombo_options[sticky_contact_url]', array(
            'label' => esc_html__( 'Contact URL:', 'mombo' ),
            'type' => 'text',
            'section' => 'mombo_general_settings',
        )
    );

     /**
     * Mombo WordPress Theme Blog Settings
     */ 
    $wp_customize->add_section( 'mombo_blog_settings' , array(
        'title'      => esc_html__( 'Blog Settings', 'mombo' ),
        'priority'   => 90,   
    ));

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
            'section'               => 'mombo_blog_settings',             
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

        $wp_customize->add_setting( 'mombo_options[blog_sidebar_dispay]' , array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_key',
            'type'      =>  'theme_mod',
            'default' => 'sidebar-right',
        ));

        $wp_customize->add_control(
            new Mombo_Customize_Control_Radio_Image(
                $wp_customize, 'mombo_options[blog_sidebar_dispay]', array(
                    'label'    => esc_html__( 'Blog Sidebar Layout', 'mombo' ),
                    'section'  => 'mombo_blog_settings',
                    'priority' => 10,
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
        'label' => esc_html__( 'Excerpt Length: ', 'mombo' ),
        'description' => esc_html__( 'How many words want to show per page?', 'mombo' ),
        'section' => 'mombo_blog_settings',
        'type'        => 'number',
        'priority' => 20,
        'input_attrs' => array(
            'min'  => 1,
            'max'   => 100,
            'step' => 1,
        ),
    ));


    /**
     * End Mombo WordPress Theme Footer Control Panel
     */
    $wp_customize->add_section( 'mombo_footer' , array(
        'title'      => esc_html__( 'Footer Settings', 'mombo' ),
        'priority'   => 100,   
    ));

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
            'label' => esc_html__( 'Footer Copyright Text:', 'mombo' ),
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