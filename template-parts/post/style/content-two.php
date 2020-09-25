<?php
/**
 * The default template for displaying content style two
 *
 * Used for both single and index/archive/search.
 *
 * @package Mombo
 * @since 1.0
 */

$mombo_col = get_query_var( 'mombo_col' );
$class = ( $mombo_col ) ? 'col-md-6 col-lg-3' : 'col-md-6 col-lg-3';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class .' m-15px-tb'); ?>>
    <div class="blog-grid">
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="blog-grid-img">
            <a href="<?php the_permalink(); ?>">
                <?php mombo_post_featured_image(348, 232, true, false); ?> 
            </a>
        </div>
        <?php } ?>
        <div class="blog-gird-info">
            <div class="b-meta">
                <span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span> 
            </div>
            <h5><a class="dark-color" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <?php the_excerpt(); ?>
            <div class="btn-grid">
                <a class="m-btn m-btn-theme m-btn-radius m-btn-sm" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'mombo' )?></a>
            </div>
        </div>
    </div>
</article>