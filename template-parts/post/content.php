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
            <label class="font-small">Nancy Bayers – 10 hours ago</label>
            <h5 class="m-10px-b font-w-600"><a class="dark-color" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
            <div class="nav font-small border-top-1 border-color-dark-gray p-15px-t">
                <a class="m-15px-r body-color font-w-500" href="#"><i class="fas fa-calendar-alt "></i> 30 Aug, 2019</a>
                <a class="body-color font-w-500" href="#"><i class="fas fa-comments"></i> 8</a>
                <a class="body-color font-w-500 ml-auto" href="#">Read More <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</article>