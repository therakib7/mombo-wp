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
        <?php while( have_posts() ): the_post(); ?>
        <!-- Page Title -->
        <section class="section bg-center bg-cover effect-section" style="background-image: url(<?php echo esc_url(  mombo_get_options( array('job_header_img', '') ) ); ?>);">
            <div class="mask theme-bg opacity-8"></div>
            <div class="container">
                <div class="row justify-content-center p-30px-t">
                    <div class="col-lg-8 text-center">
                        <h1 class="h1 white-color"><?php the_title(); ?></h1>
                        <p class="lead white-color-light">
                            <?php 
                                $terms = get_the_terms( get_the_ID(), 'job-location' );  
                                foreach ($terms as $term) {  
                            ?> 
                            <?php echo esc_html($term->name); ?>, 
                            <?php } ?>
                        
                            <?php echo esc_html( mombo_meta_options('job_type') ); ?>
                        </p>
                        <div class="nav justify-content-center"> 
                            <?php 
                                $terms = get_the_terms( get_the_ID(), 'job-tag' );  
                                foreach ($terms as $term) {  
                            ?>
                            <span class="yellow-bg dark-color p-5px-tb p-10px-lr border-radius-15 font-small font-w-700 m-5px">
                                <?php echo esc_html($term->name); ?>
                            </span> 
                            <?php } ?>
                        </div>
                        <div class="row p-20px-t">
                            <div class="col-sm-4 m-15px-tb">
                                <div class="card box-shadow-lg">
                                    <div class="card-body">
                                        <p class="m-10px-b"><?php esc_html_e( 'Experience', 'mombo' ); ?></p>
                                        <h5><?php echo esc_html( mombo_meta_options('experiance') ); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 m-15px-tb">
                                <div class="card box-shadow-lg">
                                    <div class="card-body">
                                        <p class="m-10px-b"><?php esc_html_e( 'Seniority level', 'mombo' ); ?></p>
                                        <h5><?php echo esc_html( mombo_meta_options('seniority_level') ); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 m-15px-tb">
                                <div class="card box-shadow-lg">
                                    <div class="card-body">
                                        <p class="m-10px-b"><?php esc_html_e( 'Employment type', 'mombo' ); ?></p>
                                        <h5><?php echo esc_html( mombo_meta_options('employment_type') ); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- Section -->
        <section class="section gray-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="p-30px md-p-25px box-shadow white-bg border-radius-5 m-30px-b">
                            <?php the_content(); ?>
                        </div> 
                    </div>
                    <?php 
                        $galleries = mombo_meta_options('gallery');  
                        if ( $galleries ) {   
                        $galleries = explode(",", $galleries);
                    ?>  
                    <div class="col-12 m-30px-t">
                        <div class="owl-carousel" data-center="true" data-items="2" data-nav-dots="true" data-space="30" data-autoplay="true">
                            <?php foreach ($galleries as $gallery) {   ?>
                            <div class="m-20px-b box-shadow">
                                <img class="rounded" src="<?php echo esc_url(mombo_get_image_size_by_img_id($gallery, 540, 360, true)); ?>" alt="">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- End Section -->
        <?php endwhile; ?>

        <!-- Section -->
        <section class="section" id="applynow">
            <div class="container">
                <div class="row section-title justify-content-center text-center md-m-25px-b m-45px-b">
                    <div class="col-lg-7">
                        <?php if ( mombo_get_options( 'job_single_form_title_top' ) ) { ?> 
                        <label class="theme-bg-alt p-15px-lr p-5px-tb font-small border-radius-15 theme-color">
                            <?php echo esc_html( mombo_get_options( 'job_single_form_title_top' ) ); ?>
                        </label>
                        <?php } ?> 

                        <h3 class="h1 m-10px-b"><?php echo esc_html( mombo_get_options( 'job_single_form_title' ) ); ?></h3>
                        <p class="font-2"><?php echo wp_kses_post( mombo_get_options( 'job_single_form_desc' ) ); ?></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-11 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <?php echo do_shortcode( mombo_get_options( 'job_single_form_shortcode' ) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section -->
    </main>
    <!-- main end -->
<?php endif; ?>
<?php get_footer(); ?>