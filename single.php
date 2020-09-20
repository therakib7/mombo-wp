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
    <section class="bg-center bg-cover bg-fiexd effect-section" style="background-image: url(<?php  echo get_template_directory_uri(); ?>/assets/img/bg-1.jpg);">
        <div class="mask dark-g-bg opacity-7"></div>
        <div class="container">
            <div class="row screen-65 justify-content-center align-items-center p-100px-tb">
                <div class="col-lg-10 text-center m-50px-t">
                    <h1 class="display-4 white-color m-25px-b"><?php the_title(); ?></h1>
                    <p class="lead m-0px white-color-light">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p>
                    <div class="d-flex align-items-center m-25px-t justify-content-center text-left">
                        <div>
                            <div class="avatar-50 border-radius-50">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/avatra-2.jpg" title="" alt="">
                            </div>
                        </div>
                        <div class="p-15px-l">
                            <p class="h6 white-color m-0px"><?php the_author_meta('display_name'); ?></p>
                            <small class="white-color-light">Co-Founder</small>
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
                    <div class="p-25px-tb m-35px-tb border-top-1 border-bottom-1 border-color-gray">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="m-0px">Share Post</h5>
                            </div>
                            <div>
                                <div class="nav justify-content-center justify-content-md-end social-icon si-30 gray">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media gray-bg p-20px">
                        <div class="avatar-80 border-radius-50">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/avatra-2.jpg" title="" alt="">
                        </div>
                        <div class="media-body p-20px-l">
                            <h5 class="m-10px-b">Nancy Bayers</h5>
                            <p class="m-0px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class="comments-area m-40px-t m-50px-b">
                        <div class="border-bottom-1 border-color-gray p-10px-b m-25px-b">
                            <h4 class="m-0px">3 Comments</h4>
                        </div>
                        <ul class="comment-list">
                            <li class="comment">
                                <article class="comment-body">
                                    <div class="comment-meta d-flex align-items-center">
                                        <div class="comment-author"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/avatra-2.jpg" title="" alt=""></div>
                                        <div class="comment-metadata">
                                            <div class="c-name">Nancy Bayer</div>
                                            <span class="c-date">May 15, 2019 at 5:50 PM</span>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                    <div class="comment-reply">
                                        <a class="m-btn m-btn-t-theme m-btn-radius m-btn-sm" href="#">Reply</a>
                                    </div>
                                </article>
                                <ul class="children">
                                    <li class="comment">
                                        <article class="comment-body">
                                            <div class="comment-meta d-flex align-items-center">
                                                <div class="comment-author"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/avatra-2.jpg" title="" alt=""></div>
                                                <div class="comment-metadata">
                                                    <div class="c-name">Nancy Bayer</div>
                                                    <span class="c-date">May 15, 2019 at 5:50 PM</span>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                            <div class="comment-reply">
                                                <a class="m-btn m-btn-t-theme m-btn-radius m-btn-sm" href="#">Reply</a>
                                            </div>
                                        </article>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment">
                                <article class="comment-body">
                                    <div class="comment-meta d-flex align-items-center">
                                        <div class="comment-author"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/avatra-2.jpg" title="" alt=""></div>
                                        <div class="comment-metadata">
                                            <div class="c-name">Nancy Bayer</div>
                                            <span class="c-date">May 15, 2019 at 5:50 PM</span>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                    <div class="comment-reply">
                                        <a class="m-btn m-btn-t-theme m-btn-radius m-btn-sm" href="#">Reply</a>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </div>
                    <div class="card gray-bg">
                        <div class="card-body">
                            <h4 class="m-30px-b">Leave a Reply</h4>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Full Name</label>
                                            <input type="text" class="form-control" placeholder="Martin Luthar">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Your Email</label>
                                            <input type="text" class="form-control" placeholder="info@domain.com">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Your Comment?</label>
                                            <textarea class="form-control" rows="6" name="answer" placeholder="Hello, There! " aria-label="How'd you hear about Front?" required="" data-msg="Please enter an answer." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" id="check-terms">
                                                <label class="custom-control-label" for="check-terms">Save my name, email, and website in this browser for the next time I comment.</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="m-btn m-btn-radius m-btn-theme">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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