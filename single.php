<?php
/**
 * The template for displaying all single posts.
 *
 * @package Mombo
 * @since 1.0
 */
get_header(); ?>

<!-- Main -->
<main>
    <?php while ( have_posts() ) : the_post(); ?>
    <!-- Page Title -->
    <section class="bg-center bg-cover bg-fiexd effect-section" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg-1.jpg);">
        <div class="mask dark-g-bg opacity-7"></div>
        <div class="container">
            <div class="row screen-65 justify-content-center align-items-center p-100px-tb">
                <div class="col-lg-10 text-center m-50px-t">
                    <h1 class="display-4 white-color m-25px-b"><?php the_title(); ?></h1>
                    <p class="lead m-0px white-color-light">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p>
                    <div class="d-flex align-items-center m-25px-t justify-content-center text-left">
                        <div>
                            <div class="avatar-50 border-radius-50">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                            </div>
                        </div>
                        <div class="p-15px-l">
                            <p class="h6 white-color m-0px"><?php the_author_meta('display_name'); ?></p>
                            <?php if ( $author_pos = get_user_meta(get_the_author_meta( 'ID' ), 'author_position', true) ) { ?>
                            <small class="white-color-light"><?php echo esc_html( $author_pos ); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- Section -->
    <section class="section">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-8">
                    <div class="nav p-25px-b">
                        <span class="dark-color font-w-600"><i class="fas fa-calendar-alt "></i> <?php the_time( get_option( 'date_format' ) ); ?></span>
                        <span class="dark-color font-w-600 m-15px-l"><i class="fas fa-folder-open "></i>  
                        <?php
                            $categories = get_the_category(); 
                            foreach( $categories as $category ) {
                                echo '<a class="dark-color" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                            } 
                        ?>
                        </span> 
                    </div>

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
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
    <!-- End Section -->
    <?php endwhile; ?>
</main>
<!-- main end -->

<?php get_footer(); ?>