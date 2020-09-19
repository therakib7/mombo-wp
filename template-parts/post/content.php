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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

    <?php if ( has_post_thumbnail() ) { ?>
        <figure class="entry-thumb">          
            <a href="<?php the_permalink(); ?>">
                <?php mombo_post_featured_image(652, 418, true, false); ?>            
            </a> 
        </figure><!-- /.entry-thumb -->
    <?php } ?>

    <div class="entry-content"> 
        <?php 
            /* translators: %s: Permalinks of Posts */
            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
        ?>
        <?php 
            the_excerpt();
        ?>
    </div><!-- /.entry-content -->
</article><!-- /.post -->