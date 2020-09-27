<?php
/**
 * The template for single portfolio 
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
        <!-- Page Title -->
        <section class="section bg-center bg-cover bg-fixed effect-section" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/banner-bg-5.jpg);">
            <div class="mask theme-bg opacity-9"></div>
            <div class="container">
                <div class="row justify-content-center p-50px-t">
                    <div class="col-lg-8 text-center"> 
                        <?php the_title( '<h2 class="white-color h1 m-20px-b">', '</h2>' ); ?> 
                        <ol class="breadcrumb white justify-content-center">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'mombo'); ?></a></li>
                            <li class="active"><?php the_title(); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- Section -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <?php while ( have_posts() ) : the_post(); ?>
                        <div class="card">
                            <div class="card-body"> 
                                <?php 
                                    the_content(); 
                                    mombo_wp_link_pages(); 
                                ?>
                            </div>
                            <?php 
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                            ?> 
                        </div>
                            <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section -->
    </main>
    <!-- End Main -->
<?php endif; ?>
<?php get_footer(); ?>