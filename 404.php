<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Mombo
 * @since 1.0
 */
get_header(); ?> 

<!-- 404 block -->
<section class="dark-bg">
    <div class="container">
        <div class="row justify-content-center full-screen align-items-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-3 white-color m-15px-b"><?php esc_html_e('404 - Page Not Found..', 'mombo'); ?></h1>
                <p class="h4"><?php esc_html_e('Whoops, it looks like the page you request wasn\'t found.', 'mombo'); ?></p>
                <div class="m-30px-tb">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/effect/404-page.svg" title="" alt="">
                </div>
                <div>
                    <a class="m-btn m-btn-t-white m-btn-radius" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Back to Home', 'mombo'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end 404 block -->

<?php get_footer(); ?>