<?php
/**
 * This template for displaying default layout
 *
 * @package Mombo
 * @since 1.0
 */
?>
<!-- Blog Block
================================================== -->
<section class="blog-page-block pd-t-195 pd-b-135">
    <?php if ( is_archive() || is_search() ): ?>
    <!-- Page Header
    ================================================== --> 
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">            
                <?php if ( is_archive() ) {
                    mombo_archive_title( '<h2 class="header-page-title mrb-75">', '</h2>' );
                } elseif ( is_search() ) { ?>
                    <h2 class="header-page-title mrb-75"><?php printf( '<span>'.esc_html__( 'Search Results for', 'mombo' ).'</span>%s', get_search_query() ); ?></h2>
                <?php } ?>  
            </div><!-- /.col-md-12 -->
        </div><!-- /.row-->
    </div><!-- /.container -->
    <?php endif; ?>
    <div class="container blog-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-page-content">
                    <?php 
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post(); 
                                get_template_part( 'template-parts/post/content', get_post_format() );
                            endwhile;  
                        else :  
                            get_template_part( 'template-parts/post/content', 'none' ); 
                        endif; 
                    ?> 
                    
                    <?php mombo_posts_pagination_nav(); ?>

                </div><!-- /.blog-page-content -->
            </div><!-- /.col-lg-8 -->

            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.blog-block -->