<?php
/**
 * The default template for displaying content style three
 *
 * Used for both single and index/archive/search.
 *
 * @package Mombo
 * @since 1.0
 */

$mombo_col = get_query_var( 'mombo_col' );
$class = ( $mombo_col ) ? 'col-lg-4' : 'col-lg-6';
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
            <div class="border-style top light m-20px-t"></div>
            <div class="media">
                <div class="avatar-40 border-radius-50">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                </div>
                <div class="media-body p-10px-l align-self-center">
                    <span class="white-color"><?php the_author_meta('display_name'); ?></span>
                </div>
            </div>
        </div>
    </div>
</article>
