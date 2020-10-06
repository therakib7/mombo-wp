<?php
/**
 * This template for displaying default layout
 *
 * @package Mombo
 * @since 1.0
 */
?>
<!-- Main -->
<main>
    <!-- Page Title -->
    <section class="section bg-center bg-cover bg-fixed effect-section" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/banner-bg-5.jpg);">
        <div class="mask theme-bg opacity-9"></div>
        <div class="container">
            <div class="row justify-content-center p-50px-t">
                <div class="col-lg-8 text-center"> 
                    <?php if ( is_archive() ) {
                        mombo_archive_title( '<h2 class="white-color h1 m-20px-b">', '</h2>' ); 
                    } elseif ( is_search() ) { ?>
                        <h2 class="white-color h1 m-20px-b"><span><?php esc_html_e( 'Search Results for : ', 'mombo' ) ?></span><?php echo get_search_query(); ?></h2>
                    <?php } else { ?>
                        <h2 class="white-color h1 m-20px-b"><?php esc_html_e( 'Latest Articles', 'mombo' ) ?></h2>
                        <ol class="breadcrumb white justify-content-center">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'mombo'); ?></a></li>
                            <li class="active"><?php esc_html_e( 'Latest Articles', 'mombo' ) ?></li>
                        </ol>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- En Page Title -->

    <!-- Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row masonry-post">
                    <?php 
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                if( get_post_type( get_the_ID() ) == 'portfolio' ) {
                                    get_template_part( 'template-parts/post/content', 'portfolio' );
                                } else {
                                    get_template_part( 'template-parts/post/content', get_post_format() );
                                }
                            endwhile;  
                        else :  
                            get_template_part( 'template-parts/post/content', 'none' ); 
                        endif; 
                    ?>  
                    </div>
                    
                    <div class="row">
                        <?php mombo_posts_pagination_nav(); ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
    <!-- End Section -->
</main>
<!-- main end -->