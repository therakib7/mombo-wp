<?php
/**
 * Typography settings for both Mombo
 *
 * @package Mombo
 * @since 1.0
 */

/**
 * Include functions file for Font Family controls.
 */
get_template_part('inc/customizer/customizer-font-selector/font-functions');
get_template_part('inc/customizer/customizer-font-selector/class/class-font-selector');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0
 */
function mombo_customize_preview() {
	wp_enqueue_script( 'mombo-typo-customizer', get_theme_file_uri( '/inc/customizer/typography/js/typo-customizer.js' ), array( 'customize-preview' ), '1.0', true );
}

add_action( 'customize_preview_init', 'mombo_customize_preview' );

/**
 * Customizer controls for typography settings.
 *
 * @param WP_Customize_Manager $wp_customize Customize manager.
 *
 * @since 1.0
 */
function mombo_typography_settings( $wp_customize ) {
	/**
	 * Main typography panel
	 */
	$wp_customize->add_panel(
		'mombo_typography_settings', array(
			'priority' => 25,
			'title'    => esc_html__( 'Typography Settings', 'mombo' ),
		)
	);

	$wp_customize->add_section(
		'mombo_typography', array(
			'title'    => esc_html__( 'Font Family', 'mombo' ),
			'panel'    => 'mombo_typography_settings',
			'priority' => 25,
		)
	);	

	/**
	 * Main typography Size
	 */
	$wp_customize->add_section(
		'mombo_typography_size', array(
			'title'    => esc_html__( 'Font Size', 'mombo' ),
			'panel'    => 'mombo_typography_settings',
			'priority' => 25,
		)
	);

	/**
	 * Main typography Colors
	 */
	$wp_customize->add_section(
		'mombo_typography_color', array(
			'title'    => esc_html__( 'Font Color', 'mombo' ),
			'panel'    => 'mombo_typography_settings',
			'priority' => 25,
		)
	);	

	$wp_customize->add_setting(
	    'mombo_options[body_font_color]', array(
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'sanitize_hex_color',
	        'type'      =>  'theme_mod',
	        'transport'   => 'postMessage',
	        'default' => '#718096',
	    )
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'mombo_options[body_font_color]', array(
	        	'label' => esc_html__('Body Font Color','mombo'), 
	            'section' => 'mombo_typography_color',
	        )
	    )
	);	
	$wp_customize->add_setting(
	    'mombo_options[heading_font_color]', array(
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'sanitize_hex_color',
	        'type'      =>  'theme_mod',
	        'transport'   => 'postMessage',
	        'default' => '#171347',
	    )
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( $wp_customize, 'mombo_options[heading_font_color]', array(
	        	'label' => esc_html__('Headings Font Color','mombo'), 
	            'section' => 'mombo_typography_color',
	        )
	    )
	);

	/* $wp_customize->add_setting( 'mombo_options[site_title_color]' , array(
	   'default'   => '#000000',
	   'capability' => 'edit_theme_options',
	   'sanitize_callback' => 'sanitize_hex_color',
	   'type'      =>  'theme_mod',
	   'transport'   => 'postMessage',
	));

	$wp_customize->add_control( 
	    new WP_Customize_Color_Control( $wp_customize, 'mombo_options[site_title_color]', array(
	       'label'    => esc_html__( 'Site Title', 'mombo' ),
	       'section'  => 'mombo_typography_color',
	    ) 
	));     */

	/* $wp_customize->add_setting( 'mombo_options[description_title_color]' , array(
	   'default'   => '#1d1d1f',
	   'capability' => 'edit_theme_options',
	   'sanitize_callback' => 'sanitize_hex_color',
	   'type'      =>  'theme_mod',
	   'transport'   => 'postMessage',
	));

	$wp_customize->add_control( 
	    new WP_Customize_Color_Control( $wp_customize, 'mombo_options[description_title_color]', array(
	       'label'    => esc_html__( 'Site Description', 'mombo' ),
	       'section'  => 'mombo_typography_color',
	    ) 
	));    */ 


	/**
	 * ------------------
	 * 1. Font Family tab
	 * ------------------
	 */
	if ( class_exists( 'Mombo_Font_Selector' ) ) {
		/**
		 * ---------------------------------
		 * 1.a. Headings font family control
		 * This control allows the user to choose a font family for all Headings used in the theme ( h1 - h6 )
		 * --------------------------------
		 */
		$wp_customize->add_setting(
			'mombo_options[headings_font]', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'default' => 'Nunito Sans',
			)
		);
		$wp_customize->add_control(
			new Mombo_Font_Selector(
				$wp_customize, 'mombo_options[headings_font]', array(
					'label'    => esc_html__( 'Headings font family', 'mombo' ),
					'section'  => 'mombo_typography',
					'priority' => 5,
					'type'     => 'select',
				)
			)
		);

		/**
		 * ---------------------------------
		 * 1.b. Body font family control
		 * This control allows the user to choose a font family for all elements in the body tag
		 * --------------------------------
		 */
		$wp_customize->add_setting(
			'mombo_options[body_font]', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'default' => 'Nunito Sans',
			)
		);

		$wp_customize->add_control(
			new Mombo_Font_Selector(
				$wp_customize, 'mombo_options[body_font]', array(
					'label'    => esc_html__( 'Body font family', 'mombo' ),
					'section'  => 'mombo_typography',
					'priority' => 10,
					'type'     => 'select',
				)
			)
		);

		/**
		 * ---------------------------------
		 * 1.b. Body font family control
		 * This control allows the user to choose a font family for all elements in the body tag
		 * --------------------------------
		 */
		/* $wp_customize->add_setting(
			'mombo_options[site_title_font]', array(
				'type' => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'default' => 'Nunito Sans',
			)
		);

		$wp_customize->add_control(
			new Mombo_Font_Selector(
				$wp_customize, 'mombo_options[site_title_font]', array(
					'label'    => esc_html__( 'Site Title/Logo Font Family', 'mombo' ),
					'section'  => 'mombo_typography',
					'priority' => 10,
					'type'     => 'select',
				)
			)
		); */
	} // End if().

	if ( class_exists( 'Mombo_Select_Multiple' ) ) {
		/**
		 * --------------------
		 * 1.c. Font Subsets control
		 * This control allows the user to choose a subset for the font family ( for e.g. lating, cyrillic etc )
		 * --------------------
		 */
		$wp_customize->add_setting(
			'mombo_options[font_subsets]', array(
				'sanitize_callback' => 'mombo_sanitize_multiselect',
				'default'           => array( 'latin' ),
			)
		);

		$wp_customize->add_control(
			new Mombo_Select_Multiple(
				$wp_customize, 'mombo_options[font_subsets]', array(
					'section'  => 'mombo_typography',
					'label'    => esc_html__( 'Font Subsets', 'mombo' ),
					'choices'  => array(
						'latin'        => 'latin',
						'latin-ext'    => 'latin-ext',
						'cyrillic'     => 'cyrillic',
						'cyrillic-ext' => 'cyrillic-ext',
						'greek'        => 'greek',
						'greek-ext'    => 'greek-ext',
						'vietnamese'   => 'vietnamese',
					),
					'priority' => 45,
				)
			)
		);
	} // End if().

	/**
	 * ------------------
	 * 2. Font Size tab
	 * ------------------
	 */
	if ( class_exists( 'Mombo_Customizer_Range_Value_Control' ) ) {
		/**
		 * --------------------------------------------------------------------------
		 * 2.b. Font size controls for Posts & Pages
		 * --------------------------------------------------------------------------
		 *
		 * Title control [Posts & Pages]
		 * This control allows the user to choose a font size for the main titles
		 * that appear in the header for pages and posts.
		 *
		 * The values area between 0 and 60 px.
		 * --------------------------------------------------------------------------
		 */
		$wp_customize->add_setting(
			'mombo_options[body_font_size]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 1,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[body_font_size]', array(
					'label'       => esc_html__( 'Body Font Size:', 'mombo' ),
					'section'     => 'mombo_typography_size',
					'type'        => 'range-value',
					'input_attr'  => array(
						'min'  => 0,
						'max'  => 60,
						'step' => 0,
					),
					'priority'    => 110,
					'sum_type'    => false,
				)
			)
		);

		/**
		 * --------------------------------------------------------------------------
		 * Headings control [Posts & Pages]
		 *
		 * This control allows the user to choose a font size for all headings
		 * ( h1 - h6 ) from pages and posts.
		 *
		 * The values area between 0 and 60 px.
		 * --------------------------------------------------------------------------
		 */
		/* $wp_customize->add_setting(
			'mombo_options[site_title_font_size]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 25,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[site_title_font_size]', array(
					'label'      => esc_html__( 'Site Logo/Title:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 60,
						'step' => 1,
					),
					'priority'   => 112,
					'sum_type'    => false,
				)
			)
		);	 */	

		/**
		 * --------------------------------------------------------------------------
		 * Headings control [Posts & Pages]
		 *
		 * This control allows the user to choose a font size for all headings
		 * ( h1 - h6 ) from pages and posts.
		 *
		 * The values area between 0 and 60 px.
		 * --------------------------------------------------------------------------
		 */
		/* $wp_customize->add_setting(
			'mombo_options[menu_font_size]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 14,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[menu_font_size]', array(
					'label'      => esc_html__( 'Menu Font Size:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 60,
						'step' => 1,
					),
					'priority'   => 115,
					'sum_type'    => false,
				)
			)
		); */

		/**
		 * --------------------------------------------------------------------------
		 * Content control [Posts & Pages]
		 *
		 * This control allows the user to choose a font size for the main content
		 * area in pages and posts.
		 *
		 * The values area between 0 and +90 px.
		 * --------------------------------------------------------------------------
		 */
		/* $wp_customize->add_setting(
			'mombo_options[post_blockquote_content]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 18,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[post_blockquote_content]', array(
					'label'      => esc_html__( 'Block-Quote Font Size:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 90,
						'step' => 1,
					),
					'priority'   => 120,
					'sum_type'    => false,
				)
			)
		); */

		/**
		 * --------------------------------------------------------------------------
		 * Content control [Posts & Pages]
		 *
		 * This control allows the user to choose a font size for the main content
		 * area in pages and posts.
		 *
		 * The values area between -25 and +25 px.
		 * --------------------------------------------------------------------------
		 */
		$wp_customize->add_setting(
			'mombo_options[post_title_content]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 1.25,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[post_title_content]', array(
					'label'      => esc_html__( 'Post Title Font Size:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 90,
						'step' => 1,
					),
					'priority'   => 120,
					'sum_type'    => false,
				)
			)
		);

		/**
		 * --------------------------------------------------------------------------
		 * 2.c. Font size controls for Frontpage
		 * --------------------------------------------------------------------------
		 * Big Title Section / Header Slider font size control. [Frontpage Sections]
		 *
		 * This is changing the big title/slider titles, the
		 * subtitle and the button in the big title section.
		 *
		 * The values are between 0 and 120 px.
		 * --------------------------------------------------------------------------
		 */
		$wp_customize->add_setting(
			'mombo_options[heading_one_content]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 2.2,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[heading_one_content]', array(
					'label'      =>  esc_html__( 'H1:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 120,
						'step' => 1,
					),
					'priority'   => 210,
					'sum_type'    => false,
				)
			)
		);

		/**
		 * --------------------------------------------------------------------------
		 * Section Title [Frontpage Sections]
		 *
		 * This control is changing sections titles and card titles
		 * The values are between 0 and 120 px.
		 * --------------------------------------------------------------------------
		 */
		$wp_customize->add_setting(
			'mombo_options[heading_two_content]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 2,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[heading_two_content]', array(
					'label'      => esc_html__( 'H2:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 120,
						'step' => 1,
					),
					'priority'   => 215,
					'sum_type'    => false,
				)
			)
		);

		/**
		 * -----------------------------------------------------
		 * Subtitles control [Frontpage Sections]
		 * This control allows the user to choose a font size
		 * for all Subtitles on Frontpage sections.
		 * The values area between 0 and 105 px.
		 * -----------------------------------------------------
		 */
		$wp_customize->add_setting(
			'mombo_options[heading_three_content]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 1.9,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[heading_three_content]', array(
					'label'      => esc_html__( 'H3:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 105,
						'step' => 1,
					),
					'priority'   => 220,
					'sum_type'    => false,
				)
			)
		);

		/**
		 * -----------------------------------------------------
		 * Content control [Frontpage Sections]
		 * This control allows the user to choose a font size
		 * for the Main content for Frontpage Sections
		 * The values area between 0 and 90 px.
		 * -----------------------------------------------------
		 */
		$wp_customize->add_setting(
			'mombo_options[heading_four_content]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 1.5,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[heading_four_content]', array(
					'label'      => esc_html__( 'H4:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 90,
						'step' => 1,
					),
					'priority'   => 225,
					'sum_type'    => false,
				)
			)
		);

		$wp_customize->add_setting(
			'mombo_options[heading_five_content]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 1.7,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[heading_five_content]', array(
					'label'      => esc_html__( 'H5:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 75,
						'step' => 1,
					),
					'priority'   => 226,
					'sum_type'    => false,
				)
			)
		);

		$wp_customize->add_setting(
			'mombo_options[heading_six_content]', array(
				'sanitize_callback' => 'mombo_sanitize_number_range',
				'default'           => 1.2,
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Mombo_Customizer_Range_Value_Control(
				$wp_customize, 'mombo_options[heading_six_content]', array(
					'label'      => esc_html__( 'H6:', 'mombo' ),
					'section'    => 'mombo_typography_size',
					'type'       => 'range-value',
					'input_attr' => array(
						'min'  => 0,
						'max'  => 60,
						'step' => 1,
					),
					'priority'   => 227,
					'sum_type'    => false,
				)
			)
		);
	} // End if().
}

add_action( 'customize_register', 'mombo_typography_settings', 20 );

if ( ! function_exists( 'mombofonts_inline_style' ) ) {
	/**
	 * Add inline style for custom fonts.
	 *
	 * @since 1.0
	 */

	function tc_all_typo_header_scripts_css() {	
		// Custom CSS
		$custom_css = '';
		/**
		 * Body font family.
		 */ 

		$body_font = mombo_get_options( array('body_font', 'Nunito Sans' ) );
		$body_font_color = mombo_get_options( array('body_font_color', '#718096' ) );

		if ( ! empty( $body_font ) ) {
			mombo_enqueue_google_font( $body_font );
			$custom_css .= 'body {font-family: ' . $body_font . '; }';
		}
		$custom_css .= 'body,
		.wp-block-latest-comments__comment-meta a,
		.main-menu ul .sub-menu .fa-angle-right,
		.main-menu ul ul li a,
		.woocommerce-MyAccount-navigation ul li a,
		select,
		.post .nav .dark-color,
		.wp-block-rss .wp-block-rss__item-title a,
		.woocommerce-widget-layered-nav ul li a,
		.widget_product_categories ul li a,
		.main-menu ul ul li a,
		.select2-selection--single .select2-selection__rendered,
		.price,
		.widget_recent_entries ul li a,
		.widget_calendar nav a,
		.wp-block-calendar table td,
		.wp-block-calendar table td a,
		.widget_calendar tr td a,
		.wp-calendar-nav a,
		.widget_recent_comments ul a,
		.wp-block-archives.wp-block-archives-list li a,
		.widget_nav_menu ul > li > a,
		.widget_pages ul > li > a,
		.widget_archive ul > li > a,
		.widget_meta ul > li > a,
		.widget_categories ul > li > a { color: '.$body_font_color.' !important; }';
		/**
		 * Heading font family.
		 * All Font Size
		 */
		$headings_font = mombo_get_options( array('headings_font', 'Nunito Sans' ) );

		if ( ! empty( $headings_font ) ) {
			mombo_enqueue_google_font( $headings_font );
			$custom_css .= '.entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6 { font-family: ' . $headings_font . '; color: '. mombo_get_options( array('heading_font_color', '#171347' ) ) .';}';

			$custom_css .= 'body { font-size: ' . esc_attr( mombo_get_options( array('body_font_size', 1 ) ) ) .'rem;}';  
			$custom_css .= '.post .post-title { font-size: ' . esc_attr( mombo_get_options( array('post_title_content', 1.25 ) ) ) . 'rem;}';
			$custom_css .= '.entry-content h1 { font-size: ' . esc_attr( mombo_get_options( array('heading_one_content', 2.2 ) ) ) . 'rem;}';
			$custom_css .= '.entry-content h2 { font-size: ' . esc_attr( mombo_get_options( array('heading_two_content', 2 ) ) ) . 'rem;}';
			$custom_css .= '.entry-content h3 { font-size: ' . esc_attr( mombo_get_options( array('heading_three_content', 1.9 ) ) ) . 'rem;}';
			$custom_css .= '.entry-content h4 { font-size: ' . esc_attr( mombo_get_options( array('heading_four_content', 1.5 ) ) ) . 'rem;}';
			$custom_css .= '.entry-content h5 { font-size: ' . esc_attr( mombo_get_options( array('heading_five_content', 1.7 ) ) ) . 'rem;}';
			$custom_css .= '.entry-content h6 { font-size: ' . esc_attr( mombo_get_options( array('heading_six_content', 1.2 ) ) ) . 'rem;}';
		}

		/* $site_title_font = mombo_get_options( array('site_title_font', 'Nunito Sans' ) );
		$site_title_font_color = mombo_get_options( array('site_title_color', '#1d1d1f' ) );
		$site_description_font_color = mombo_get_options( array('description_title_color', '#718096' ) );
		if(!empty($site_title_font)) {
			mombo_enqueue_google_font( $site_title_font );

			$site_logo_font = mombo_get_options( array('site_title_font_size', 25 ) );
			$custom_css .= '.site-branding-text .site-title { font-family: ' . $site_title_font . '; font-size: '. esc_attr( $site_logo_font ) .'px; color: '. $site_title_font_color .';}';
			$custom_css .= '.site-branding-text .site-description { color: '. $site_description_font_color .';}';
		} */

		wp_add_inline_style( 'mombo-main-style', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'tc_all_typo_header_scripts_css', 300 );
}