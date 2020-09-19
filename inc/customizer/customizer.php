<?php
/**
 * Customizer functionality for the theme.
 *
 * @package Mombo
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(! class_exists( 'Mombo_Customizer' ) ) {
	/**
	 * The Mombo Customizer Settings
	 */
	class Mombo_Customizer  {
		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			//add customizer settings control
			add_filter( 'mombo_filter_features', array( $this, 'mombo_filter_features') );

			//includes all files of controls
			add_action( 'after_setup_theme', array($this, 'mombo_include_features'), 0 );

			//Include JS Controls Types
			add_action( 'customize_register', array($this, 'mombo_register_control_types'), 0 );

			//Include Preview Unit JS
			add_action( 'customize_preview_init', array($this, 'mombo_customize_preview_js') );

			//Include Controls Scripts
			add_action( 'customize_controls_enqueue_scripts', array($this, 'mombo_panels_js') );
		}

		/**
		 * Filter The customizer Panel.
		 * @since 1.0
		 */
		public function mombo_filter_features( $array ) {
			$files_to_load = array(
				'typography/typography-settings',
				'customizer-toggle-control/class-customizer-toggle-control',
				'customizer-radio-image/class/class-customize-control-radio-image',
				'customizer-alpha-color-picker/class-customize-alpha-color-control',
				'customizer-repeater/class/class-customizer-repeater-control',
			);
			
			return array_merge(
				$array, $files_to_load
			);
		}

		/**
		 * Include All files.
		 *
		 * @since Mombo 1.0
		 */
		public function mombo_include_features() {
			$mombo_allowed_phps = array();
			$mombo_allowed_phps = apply_filters( 'mombo_filter_features', $mombo_allowed_phps );
			foreach ( $mombo_allowed_phps as $file ) {
				$mombo_file_to_include = get_template_part('/inc/customizer/'. $file );
			}
		}

		/**
		 * Register JS control types.
		 *
		 * @since  1.0
		 * @access public
		 * @return void
		 */
		public function mombo_register_control_types( $wp_customize ) {
			get_template_part('inc/customizer/customizer-range-value/class/class-customizer-range-value-control');
			get_template_part('inc/customizer/customizer-select-multiple/class/class-select-multiple');
			get_template_part('inc/customizer/customizer-dimensions/class-control-dimensions');

			// Register JS control types.
			$wp_customize->register_control_type( 'Mombo_Select_Multiple' );
			$wp_customize->register_control_type( 'Mombo_Customizer_Dimensions_Control' );
			$wp_customize->register_control_type( 'Mombo_Customizer_Range_Value_Control' );
		}

		/**
		 * Customizer Preview Unit JS.
		 *
		 * @since  1.0
		 * @access public
		 * @return void
		 */
		public function mombo_customize_preview_js() {
		    wp_enqueue_script('mombo-customize-preview', get_theme_file_uri( '/assets/custom/customize-preview.js' ), array("jquery"), '1.0', true);
		}

		/**
		 * Customizer Controls JS.
		 *
		 * @since  1.0
		 * @access public
		 * @return void
		 */
		public function mombo_panels_js() {
		    wp_enqueue_script('mombo-customize-controls', get_theme_file_uri( '/assets/custom/customize-controls.js' ), array("jquery"), '1.0', true);
		    wp_enqueue_style('mombo-customize-controls', get_theme_file_uri( '/assets/custom/customize-control.css' ), null );
		}
	}
}
new Mombo_Customizer;