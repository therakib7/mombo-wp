<?php
/**
 * The template for displaying all single posts.
 *
 * @package Mombo
 * @since 1.0
 */
get_header(); 

$elemetor = get_post_meta( get_the_ID(), '_elementor_edit_mode');
if( $elemetor ) : 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); ?> 
        <div class="mombo-page-builder clearfix">
            <?php the_content(); ?>
        </div>
        <?php 
        endwhile; 
    endif; 
else: ?>
<!-- Main -->
<main>
    <?php while ( have_posts() ) : the_post(); ?>
    <!-- Page Title -->
    <section class="section bg-center section-single bg-cover bg-fixed effect-section" style="background-image: url(<?php echo esc_url(  mombo_get_options( array('header_img') ) ); ?>);">
        <div class="mask theme-bg opacity-9"></div>
        <div class="container">
            <div class="row justify-content-center p-30px-t">
                <div class="col-lg-8 text-center"> 
                    <h2 class="white-color h1 m-20px-b"><?php the_title(); ?></h2> 
                </div>
            </div>
        </div>
    </section>
    <!-- En Page Title -->

    <!-- Section -->
    <section class="section">
        <div class="container">
            <div class="row <?php if ( mombo_get_options('blog_single_layout') == 'no_side' ) echo esc_attr('justify-content-center'); ?>"> 
                <?php 
                    $sidebar_position = mombo_get_options('blog_single_layout');
                    if ( $sidebar_position == 'no_side' ) {
                        $post_columns_class = 'col-lg-8';
                        $sidebar_columns_class = '';
                    } elseif ( $sidebar_position == 'left_side' ) {
                        $post_columns_class = 'col-lg-8 order-last';
                        $sidebar_columns_class = 'col-lg-4 order-first md-m-15px-tb';
                    } else {
                        $post_columns_class = 'col-lg-8';
                        $sidebar_columns_class = 'col-lg-4 md-m-15px-tb';
                    }
                ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class($post_columns_class . ' post'); ?>> 
                    <div class="nav p-25px-b">
                        <span class="dark-color font-w-600"><i class="fas fa-calendar-alt "></i> <?php the_time( get_option( 'date_format' ) ); ?>
                        </span>
                          
                        <?php 
                            $categories = ( is_singular('faq') ) ? get_terms( array('taxonomy' => 'faq-category' ) ) : get_the_category();
                            if ( $categories ) {
                                echo '<span class="dark-color font-w-600 m-15px-l"><i class="fas fa-folder-open "></i> ';
                            }
                            foreach( $categories as $category ) {
                                echo '<a class="dark-color" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                            } 
                        ?>
                        </span> 
                    </div>

                    <?php if ( has_post_thumbnail() ) { ?>
                    <div class="featured-img"> 
                        <?php mombo_post_featured_image(730, 516, true, false); ?>  
                    </div>
                    <?php } ?>

                    <div class="entry-content"> 
                        <?php 
                            the_content();
                            mombo_wp_link_pages(); 
                        ?>
                    </div><!-- /.entry-content -->

                    <?php if( has_tag() ): ?>
                    <div class="nav tag-cloud p-25px-t">
                        <?php the_tags(' ', ' ', ' '); ?> 
                    </div>
                    <?php endif; ?>

                    <?php if ( function_exists( 'mombo_social_share_link' ) ) {
                        mombo_social_share_link( esc_html__('Share Post', 'mombo') ); 
                    } ?> 

                    <div class="media gray-bg p-20px">
                        <div class="avatar-80 border-radius-50">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                        </div>
                        <div class="media-body p-20px-l">
                            <h5 class="m-10px-b"><?php the_author_meta('display_name'); ?></h5>
                            <p class="m-0px"><?php the_author_meta('description'); ?></p>
                        </div>
                    </div>
                    <?php 
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?> 
                </div> 
                
                <?php if ( $sidebar_position != 'no_side' ) { ?>
                <div class="<?php echo esc_attr( $sidebar_columns_class ); ?>">
                    <?php get_sidebar(); ?>
                </div><!-- /.col-lg-4 -->
                <?php } ?> 
            </div>
        </div>
    </section>
    <!-- End Section -->
    <?php endwhile; ?>
</main>
<!-- main end -->
<?php endif; ?>
<?php get_footer(); ?>