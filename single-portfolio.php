<?php
/**
 * The template for displaying all portfolio single posts.
 *
 * @package Mombo
 * @since 1.0
 */
get_header(); ?>
<!-- Portfolio Single Block
================================================== -->
<section class="portfolio-page-block pd-t-220 pd-b-135">
    <div class="container portfolio-single-page">
        <div class="row">
        	<?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-12">        
                <div class="sh-elementor-content clearfix">
                    <?php the_content(); ?>
                </div>
            </div><!-- /col-md-12 -->
    	    <?php endwhile; ?>
        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container portfolio-pagination">
        <div class="row align-items-center">
        	<?php 
        	$prev_post = get_previous_post();
        	if($prev_post) {
        	   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title)); ?>
				<div class="col text-left">
				    <a href="<?php echo esc_url( get_permalink($prev_post->ID) ); ?>" class="older-posts" title="<?php echo esc_attr( $prev_title ); ?>"><i class="gra-arrow-left"></i><span class="navigation-text"><?php esc_html_e('Older Posts', 'mombo'); ?></span></a>
				</div>
        	<?php } ?>
            
            <div class="col text-center">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ) ); ?>" class="portfolio-archive-link"><i class="fa fa-braille"></i></a>
            </div>

            <?php 
            $next_post = get_next_post();
            if($next_post) {
               $next_title = strip_tags(str_replace('"', '', $next_post->post_title)); ?>
	            <div class="col text-right">
	                <a href="<?php echo esc_url( get_permalink($next_post->ID) ); ?>" class="newer-posts" title="<?php echo esc_attr($next_title); ?>"><span class="navigation-text"><?php esc_html_e('Newer Posts', 'mombo'); ?></span> <i class="gra-arrow-right"></i></a>
	            </div>
            <?php } ?>
        </div>
    </div><!-- /.container -->
</section><!-- /.blog-block -->
<?php get_footer(); ?>