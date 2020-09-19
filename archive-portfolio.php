<?php
/**
 * The template for displaying all portfolio single posts.
 *
 * @package Mombo
 * @since 1.0
 */
get_header(); ?>
<!-- Portfolio Block
================================================== -->
<section class="portfolio-block bg-snow pd-t-220 pd-b-135">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="text-uppercase w-700 color-blue-violet text-center"><?php esc_html_e('Portfolio', 'mombo'); ?></h2>
            </div>
        </div><!-- /.row -->

        <div class="row mrt-30">
            <div class="col-12 pd-l-30 pd-r-30">
                <div class="portfolio-var-two">
                    <ul class="portfolio-filter-menu text-center">
                        <li><a href="#" data-filter="*" class="active"><?php esc_html_e('All Works', 'mombo'); ?></a></li> 
                        <?php 
                            $terms = get_terms( array(
                                'taxonomy' => 'portfolio-category',
                                'hide_empty' => false,
                            ) );
                            $port_cat_slugs = array();
                            foreach ($terms as $term) { 
                            $port_cat_slugs[] = $term->slug;
                        ?>
                        <li><a href="#" data-filter=".<?php echo esc_html($term->slug); ?>" class=""><?php echo esc_html($term->name); ?></a></li> 
                        <?php } ?>
                    </ul><!-- /.portfolio-filter-menu -->

                        <div class="row portfolio-grid">
                            <?php 
                            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                            $portfolio_query = new WP_Query(
                                array(
                                    'post_type' => 'portfolio', 
                                    'posts_per_page' => 20,
                                    'paged'          => $paged,
                                    'tax_query' => array(
                                        array (
                                            'taxonomy' => 'portfolio-category',
                                            'field' => 'slug',
                                            'terms' => $port_cat_slugs,
                                        )
                                    ),  
                                )
                            ); 
                            while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); 

                            $portfilio_cats = get_the_terms( get_the_ID(), 'portfolio-category' ); 
                            $cats_name = "";
                            foreach($portfilio_cats as $cat_name) {    
                                $cats_name .= $cat_name->slug.' '; 
                            }
                            ?> 
                            <div class="col-md-4 <?php echo esc_attr($cats_name); ?> item">
                                <?php if ( has_post_thumbnail() ) { ?> 
                                <figure class="portfolio-thumb">
                                    <?php mombo_post_featured_image(583, 417, true); ?>
                                    <div class="portfolio-hover">
                                        <a href="<?php the_permalink(); ?>"><i class="fa fa-eye"></i></a>
                                    </div><!-- /.portfolio-hover -->
                                </figure><!-- /.portfolio-thumb -->
                                <?php } ?>
                            </div><!-- /.col-md-4 -->
                            <?php endwhile; ?> <?php wp_reset_postdata(); ?> 
                        </div><!-- /.row -->

                    <div class="row"> 
                        <div class="col-12 text-center mrt-30"> 
                            <?php mombo_posts_pagination_nav($portfolio_query); ?>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.portfolio-var-two -->
            </div><!-- /.col-12 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section><!-- /.portfolio-block -->
<?php get_footer(); ?>