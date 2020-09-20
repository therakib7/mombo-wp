<?php
/**
 * The template for displaying all single posts.
 *
 * @package Mombo
 * @since 1.0
 */
get_header(); ?>

<!-- Blog Block
================================================== -->
<?php 
if (function_exists('the_gutenberg_project') && gutenberg_post_has_blocks( get_the_ID() ) ) {
    ?>
    <section class="blog-page-block pd-t-150 pd-b-135">
        <div class="container-fluid gutenburg-blog">
            <div class="row">
                <div class="col-md-12">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                            <header class="entry-header">
                                <?php
                                if ( is_singular() ) :
                                    the_title( '<h1 class="entry-title">', '</h1>' );
                                else :
                                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                endif; ?>
                            </header><!-- .entry-header -->
                            <div class="entry-meta">
                                <ul class="meta-list remove-broswer-defult">
                                    <li class="entry-date"><i class="fa fa-calendar"></i> <?php the_time( get_option( 'date_format' ) ); ?></li>
                                    <li class="time-need"><i class="fa fa-clock-o"></i> <?php echo wp_kses_post(mombo_estimated_reading_time( get_the_content() ) ); ?> <?php esc_html_e('Minute to read', 'mombo'); ?></li>
                                    <li class="entry-category"><i class="fa fa-sitemap"></i> <?php the_category(', ' ); ?></li>
                                </ul><!-- /.meta-list -->
                            </div><!-- /.entry-meta -->
                            <?php if ( has_post_thumbnail() ) { ?>
                                <figure class="entry-thumb">           
                                    <?php mombo_post_featured_image(1920, 750, true, false); ?>  
                                </figure><!-- /.entry-thumb -->
                            <?php } ?>
                            <div class="entry-content"> 
                                <?php 
                                    the_content();
                                    mombo_wp_link_pages(); 
                                ?>
                            </div><!-- /.entry-content -->
                        </article><!-- /.post -->
                        <?php 
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
                    <?php endwhile; ?>
                </div><!--  /.col-md-12 -->
            </div><!--  /.row -->
        </div>
    </section>
<?php } else { ?>
    <section class="blog-page-block pd-t-220 pd-b-135">
        <div class="container blog-container">
            <div class="row">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-lg-8">
                    <div class="blog-page-content blog-single-page">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                            <?php if ( has_post_thumbnail() ) { ?>
                                <figure class="entry-thumb">           
                                    <?php mombo_post_featured_image(652, 418, true, false); ?> 
                                </figure><!-- /.entry-thumb -->
                            <?php } ?>

                            <div class="entry-meta">
                                <ul class="meta-list remove-broswer-defult">
                                    <li class="entry-date"><i class="fa fa-calendar"></i> <?php the_time( get_option( 'date_format' ) ); ?></li>
                                    <li class="time-need"><i class="fa fa-clock-o"></i> <?php echo wp_kses_post(mombo_estimated_reading_time( get_the_content() ) ); ?> <?php esc_html_e('Minute to read', 'mombo'); ?></li>
                                    <li class="entry-category"><i class="fa fa-sitemap"></i> <?php the_category(', ' ); ?></li>
                                </ul><!-- /.meta-list -->
                            </div><!-- /.entry-meta -->
                            <div class="entry-content"> 
                                <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?> 
                                <?php 
                                    the_content(); 
                                    mombo_wp_link_pages(); 
                                ?>
                            </div><!-- /.entry-content -->
                        </article><!-- /.post -->

                        <div class="single-post-footer text-center">
                           
                            <?php if( has_tag() ): ?>
                            <div class="entry-tag">
                                <?php the_tags(' ', ' ', ' '); ?>
                            </div><!-- /.entry-tag -->
                            <?php endif; ?>

                            <?php if ( function_exists( 'mombo_social_share_link' ) ) {
                                mombo_social_share_link( esc_html__('Share:', 'mombo') ); 
                            } ?> 

                            <div class="post-navigation">
                                <?php 
                                $prev_post = get_previous_post(); 
                                if ($prev_post): ?> 
                                    <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" title="<?php echo esc_attr($prev_post->post_title); ?>" class="older-posts"><i class="gra-arrow-left"></i><span class="navigation-text">Older Posts</span></a>
                                <?php endif; ?>

                                <?php
                                $next_post = get_next_post();
                                if ($next_post): ?>
                                    <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo esc_attr($next_post->post_title); ?>" class="newer-posts"><span class="navigation-text"><?php esc_html_e('Newer Posts', 'mombo'); ?></span> <i class="gra-arrow-right"></i></a> 
                                <?php endif; ?> 
                            </div><!-- /.post-navigation -->

                        </div><!-- /.single-post-footer -->
                    </div><!-- /.blog-page-content -->
                    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) :
                          comments_template();
                        endif;
                    ?>
                </div><!-- /.col-lg-8 -->
                <?php endwhile; ?>

                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-block -->
<?php } ?>

<?php get_footer(); ?>