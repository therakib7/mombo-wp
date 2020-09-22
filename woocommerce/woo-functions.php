<?php 
/**
 * WooCommerce Functions
 *
 * @package Mombo
 * @since 1.0
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	/* Declare WooCommerce support */
	add_action( 'after_setup_theme', 'mombo_woocommerce_support' );
	function mombo_woocommerce_support() {
		add_theme_support( 'woocommerce' );

		/* Gallery Support */
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/**
		 * Override theme default specification for product # per row
		 */
		function mombo_loop_columns() {
			return 2; // 2 products per row
		}
		add_filter('loop_shop_columns', 'mombo_loop_columns', 999);

		/* Remove default breadcrumb */
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20); 
	} 
}
