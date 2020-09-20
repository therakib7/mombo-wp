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
                    <h2 class="white-color h1 m-20px-b">Blog Sidedar</h2>
                    <ol class="breadcrumb white justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Blog Sidedar</li>
                    </ol>
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
                    <div class="row">
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
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
    <!-- End Section -->
</main>
<!-- main end -->