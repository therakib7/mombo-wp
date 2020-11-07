<?php
/**
 * The default template for displaying content style four
 *
 * Used for both single and index/archive/search.
 *
 * @package Mombo
 * @since 1.0
 */

$mombo_col = get_query_var( 'mombo_col' );
$class = ( $mombo_col ) ? 'col-md-4' : 'col-md-6';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class .' m-15px-tb'); ?>>
    <div class="hover-top transition blog-grid-overlay" style="background-image: url(<?php echo esc_url( mombo_get_image_crop_size_by_id( get_the_ID(), 348, 232, true) ); ?>); ">
        <div class="blog-gird-info">
            <a class="overlay-link" href="<?php the_permalink(); ?>"></a>
            <div class="b-meta">
                <span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span> 
            </div>
            <h5 class="post-title"><?php the_title(); ?></h5>
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>
