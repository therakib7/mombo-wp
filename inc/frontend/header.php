<?php
/**
 * Hooks for template header
 *
 * @package Mombo
 * Custom scripts and styles on header
 *
 * @since  1.0
 */
function mombo_header_scripts_css() {	
	ob_start();
	get_template_part('/inc/frontend/schema');	
	$custom_css_code = ob_get_clean(); 
	wp_add_inline_style( 'mombo-main-style', $custom_css_code );
}
add_action( 'wp_enqueue_scripts', 'mombo_header_scripts_css', 300 );
