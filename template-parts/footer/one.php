<?php
/**
 * This template for displaying footer part
 *
 * @package Mombo
 * @since 1.0
 */

/**
 * Footer Part show/hide condition
 *
 * @since 1.0
 */
if ( get_post_meta(get_the_ID(), 'mombo_mb_footer_part', true) == 'hide' ) return; ?>

<!-- Footer-->
<footer class="gray-bg footer">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<?php
					// show footer widget with condition
					$columns = intval( mombo_get_options( array('footer_widget_columns', 4) ) );
					$col_class = 12 / max( 1, $columns );
					$col_class_sm = 12 / max( 1, $columns );
					if ( $columns == 4 ) {
						$col_class_sm = 6;
					} 
					$col_class = "col-sm-$col_class_sm col-md-$col_class";
					for ( $i = 1; $i <= $columns ; $i++ ) {
						if ( $columns == 3 ) :
							if ( $i == 3 ) {
								$col_class = "col-sm-12 col-md-$col_class";
							} else {
								$col_class = "col-sm-6 col-md-$col_class";
							} 
						endif; 
					?>
						<div class="footer-sidebar-<?php echo esc_attr($i) ?> <?php echo esc_attr( $col_class ) ?> m-15px-tb">
							<?php dynamic_sidebar( esc_html__( 'Sidebar Footer ', 'ramble' ) . $i ) ?>
						</div>
					<?php
					}
				?>
			</div>
		</div>
	</div>
	<div class="footer-bottom footer-border-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center text-md-right"> 
					<?php 
                        wp_nav_menu ( array(
                            'menu_class' => 'nav justify-content-center justify-content-md-start m-5px-tb links-dark font-small footer-link-1',
                            'container'=> 'ul',
							'theme_location' => 'footer-menu', 
							'depth' 		=> 1,
                            'walker' => new Mombo_Custom_Walker() ,
                            'fallback_cb'       => 'Mombo_Custom_Walker::fallback_footer_menu', 
                        )); 
                    ?>
				</div>
				<div class="col-md-6 text-center text-md-right">
					<p class="m-0px font-small copyright-text"><?php echo mombo_get_options('footer_copyright_info'); ?></p>
				</div>
			</div>
		</div>
	</div>
</footer>