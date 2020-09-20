<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Mombo
 * @since 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 m-30px-b'); ?>>
    <div class="transition hover-top card box-shadow-only-hover overflow-hidden">
        <?php if ( has_post_thumbnail() ) { ?>
        <div>
            <a href="<?php the_permalink(); ?>">
                <?php mombo_post_featured_image(348, 232, true, false); ?> 
            </a>
        </div>
        <?php } ?>
        <div class="p-20px">
            <label class="font-small"><?php the_author_meta('display_name'); ?> – <?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ) . esc_html__(' ago', 'mombo'); ?></label>
            <h5 class="m-10px-b font-w-600"><a class="dark-color" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php the_excerpt(); ?></p>
            <div class="nav font-small border-top-1 border-color-dark-gray p-15px-t">
                <a class="m-15px-r body-color font-w-500" href="<?php the_permalink(); ?>"><i class="fas fa-calendar-alt "></i> <?php the_time( get_option( 'date_format' ) ); ?></a>
                <a class="body-color font-w-500" href="<?php the_permalink(); ?>"><i class="fas fa-comments"></i> <?php echo get_comments_number(); ?></a>
                <a class="body-color font-w-500 ml-auto" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'mombo' )?> <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</article>