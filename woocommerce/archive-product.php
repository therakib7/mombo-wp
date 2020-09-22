<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>
<!-- Page Title -->
<section class="section bg-center bg-cover bg-fixed effect-section" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/banner-bg-5.jpg);">
	<div class="mask theme-bg opacity-9"></div>
	<div class="container">
		<div class="row justify-content-center p-50px-t">
			<div class="col-lg-8 text-center">  
				<?php 
				if ( is_archive() ) {
					if ( is_shop() ) {
						if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<h2 class="white-color h1 m-20px-b"><?php woocommerce_page_title(); ?></h2>
						<?php endif;
					} else {
						mombo_archive_title( '<h2 class="white-color h1 m-20px-b">', '</h2>' ); 
					} 
				} ?>
			</div>
		</div>
	</div>
</section>
<!-- En Page Title -->

<!-- Shop Archive -->  
<div class="container section">
	<?php
		/**
		 * Hook: woocommerce_before_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' ); 
	?>
	
	
	<div class="row">
		<div class="col">
			<header class="woocommerce-products-header text-center">
				

				<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' ); ?>
			</header>
		</div><!--  /.col-md-12 -->
	</div><!--  /.row -->

	<div class="row"> 
		<div class="col-md-8">
			<div class="woocommerce-products">		    			
				<?php 
					if ( woocommerce_product_loop() ) {

						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked wc_print_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );

						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								/**
								 * Hook: woocommerce_shop_loop.
								 *
								 * @hooked WC_Structured_Data::generate_product_data() - 10
								 */
								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					} else {
						/**
						 * Hook: woocommerce_no_products_found.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
					}
				?>
			</div><!--  /.entry-content -->	
		</div><!-- /.col-md-8 -->
		<?php get_sidebar('shop'); ?>
	</div><!-- /.row -->
	<?php 
		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?> 
</div><!-- /.container --> 
<?php
get_footer( 'shop' );