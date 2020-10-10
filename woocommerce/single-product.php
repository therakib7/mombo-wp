<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>

<!-- Page Title -->
<section class="section bg-center bg-cover bg-fixed effect-section" style="background-image: url(<?php echo esc_url(  mombo_get_options( array('header_img') ) ); ?>);">
	<div class="mask theme-bg opacity-9"></div>
	<div class="container">
		<div class="row justify-content-center p-50px-t">
			<div class="col-lg-8 text-center"> 
				<h2 class="white-color h1 m-20px-b"><?php esc_html_e( 'Product Details', 'mombo' ); ?></h2>
				<ol class="breadcrumb white justify-content-center">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'mombo'); ?></a></li>
					<li class="active"><?php the_title(); ?></li>
				</ol>
			</div>
		</div>
	</div>
</section>
	<!-- En Page Title -->
	
<!-- Product Single Page
================================================== -->
<div class="container section">
	<div class="row">
		<div class="col-md-10 ">
			<div class="woocommerce-single-product">
				<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>
			</div><!--  /.woocommerce-single-product -->	
		</div><!-- /.col-md-10 -->
	</div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer( 'shop' );
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */