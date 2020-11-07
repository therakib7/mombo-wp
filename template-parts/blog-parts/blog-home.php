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
    <section class="section bg-center bg-cover bg-fixed effect-section" style="background-image: url(<?php echo esc_url(  mombo_get_options( array('header_img') ) ); ?>);">
        <div class="mask theme-bg opacity-9"></div>
        <div class="container">
            <div class="row justify-content-center p-30px-t">
                <div class="col-lg-8 text-center"> 
                    <?php if ( is_archive() ) {
                        mombo_archive_title( '<h2 class="white-color h1 m-20px-b">', '</h2>' ); 
                    } elseif ( is_search() ) { ?>
                        <h2 class="white-color h1 m-20px-b"><span><?php esc_html_e( 'Search Results for', 'mombo' ) ?></span><?php echo get_search_query(); ?></h2>
                    <?php } else { ?>
                        <h2 class="white-color h1 m-20px-b"><?php echo esc_html( mombo_get_options( array('blog_title', 'Latest Article')) ); ?></h2>
                        <ol class="breadcrumb white justify-content-center">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'mombo'); ?></a></li>
                            <li class="active"><?php echo esc_html( mombo_get_options( array('blog_title', 'Latest Article')) ); ?></li>
                        </ol>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- En Page Title --> 
    
    <!-- Section -->
    <div class="section">
        <div class="container">
            <div class="row">
                <?php 
                    $sidebar_position = mombo_get_options('blog_layout');
                    if ( $sidebar_position == 'no_side' ) {
                        $post_columns_class = 'col-lg-12 full-content';
                        $sidebar_columns_class = '';
                    } elseif ( $sidebar_position == 'left_side' ) {
                        $post_columns_class = 'col-lg-8 order-last';
                        $sidebar_columns_class = 'col-lg-4 order-first md-m-15px-tb';
                    } else {
                        $post_columns_class = 'col-lg-8';
                        $sidebar_columns_class = 'col-lg-4 md-m-15px-tb';
                    }
                ?>
                <div class="<?php echo esc_attr( $post_columns_class ); ?>"> 
                    <div class="row <?php echo ( mombo_get_options( 'is_masonry' ) ) ? esc_attr('masonry-post') : ''; ?>">
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
                
               
                <?php if ( $sidebar_position != 'no_side' ) { ?>
                <div class="<?php echo esc_attr( $sidebar_columns_class ); ?>">
                    <?php get_sidebar(); ?>
                </div><!-- /.col-lg-4 -->
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Section -->
</main>
<!-- main end -->