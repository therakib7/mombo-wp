<?php
/**
 * This template for displaying header part
 *
 * @package Mombo
 * @since 1.0
 */
?>

<?php 
/**
 * Preloader
 * @package Mombo
 * @since 1.0
 */
mombo_preloader(); 

/**
 * Header Part show/hide condition
 * @package Mombo
 * @since 1.0
 */ 
if ( get_post_meta(get_the_ID(), 'mombo_mb_header_part', true) == 'hide' ) return; ?>

<!-- Header -->
<header class="header-nav header-white">
    <div class="fixed-header-bar">
        <div class="container container-large">
            <div class="navbar navbar-default navbar-expand-lg main-navbar">
                <div class="navbar-brand">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" title="Mombo" class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-light.svg" class="light-logo" alt="Mombo" title="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" class="dark-logo" alt="Mombo" title="">
                    </a>
                </div>
                <div class="navbar-collapse justify-content-end collapse" id="navbar-collapse-toggle">
                    <ul class="nav navbar-nav m-auto">
                        <li class="mm-in px-dropdown">
                            <a href="#home">Home</a>
                            <i class="fa fa-angle-down px-nav-toggle"></i>
                            <ul class="px-dropdown-menu mm-dorp-in">
                                <li><a href="index.html">Home Option 1</a></li>
                                <li><a href="index-01.html">Home Option 2</a></li>
                                <li><a href="index-02.html">Home Option 3</a></li>
                                <li><a href="index-03.html">Home Option 4</a></li>
                                <li><a href="index-04.html">Home Option 5</a></li>
                                <li><a href="index-05.html">Home Option 6</a></li>
                                <li><a href="index-06.html">Home Option 7</a></li>
                                <li><a href="index-07.html">Home Option 8</a></li>
                                <li><a href="index-08.html">Home Option 9</a></li>
                                <li><a href="index-09.html">Home Option 10</a></li>
                                <li><a href="index-10.html">Home Option 11</a></li>
                                <li><a href="index-11.html">Home Option 12</a></li>
                                <li><a href="index-12.html">Home Option 13</a></li>
                                <li><a href="index-13.html">Home Option 14</a></li>
                            </ul>
                        </li>
                        <li class="mm-in px-mega">
                            <a href="javascript:void(0)">Pages</a>
                            <i class="fa fa-angle-down px-nav-toggle"></i>
                            <div class="px-mega-menu mm-dorp-in">
                                <div class="row no-gutters">
                                    <div class="col-lg-4 d-none d-lg-block">
                                        <div class="h-100 px-mm-left" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/about-11.jpg); "></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="px-mm-right">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <h6 class="mm-title">Company</h6>
                                                    <ul class="mm-link">
                                                        <li><a href="about-us.html">About Us 1</a></li>
                                                        <li><a href="services.html">Services 1</a></li>
                                                        <li><a href="price.html">Pricing</a></li>
                                                        <li><a href="portfolio.html">Portfolio</a></li>
                                                        <li><a href="team.html">Our Team</a></li>
                                                        <li><a href="contact-us.html">Contact Us</a></li>
                                                        <li><a href="careers.html">Careers</a></li>
                                                        <li><a href="single-careers.html">Careers Single</a></li>
                                                    </ul>
                                                    <h6 class="mm-title">Helps Center</h6>
                                                    <ul class="mm-link">
                                                        <li><a href="support.html">Support</a></li>
                                                        <li><a href="support-topic.html">Support Topic</a></li>
                                                        <li><a href="faq.html">Faq's</a></li>
                                                        <li><a href="policy.html">Policy</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h6 class="mm-title">Blogs</h6>
                                                    <ul class="mm-link">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                                        <li><a href="blog-detail-2.html">Single Blog</a></li>
                                                        <li><a href="blog-detail.html">Single Blog Sidebar</a></li>
                                                    </ul>
                                                    <h6 class="mm-title">Others</h6>
                                                    <ul class="mm-link">
                                                        <li><a href="coming-soon-subscribe.html">Coming Soon Subscribe</a></li>
                                                        <li><a href="coming-soon-countdown.html">Coming Soon Countdown</a></li>
                                                        <li><a href="404.html">Error 404</a></li>
                                                    </ul>
                                                    <h6 class="mm-title">Account</h6>
                                                    <ul class="mm-link">
                                                        <li><a href="profile.html">Profile</a></li>
                                                        <li><a href="profile-edit.html">Edit Profile</a></li>
                                                        <li><a href="account-billing.html">Billing</a></li>
                                                        <li><a href="account-notifications.html">Notifications</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    
                                                    <h6 class="mm-title">Authentication</h6>
                                                    <ul class="mm-link">
                                                        <li><a href="login.html">Login</a></li>
                                                        <li><a href="sign-up.html">Sign Up</a></li>
                                                        <li><a href="recover-account.html">Recover Account</a></li>
                                                        <li><a href="login-basic.html">Login Basic</a></li>
                                                        <li><a href="sign-up-basic.html">Sign Up Basic</a></li>
                                                        <li><a href="recover-account-basic.html">Recover Account Basic</a></li>
                                                        <li><a href="login-overlay.html">Login Overlay</a></li>
                                                        <li><a href="sign-up-overlay.html">Sign Up Overlay</a></li>
                                                        <li><a href="recover-account-overlay.html">Recover Account Overlay</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- row -->
                            </div>
                        </li>
                        <li><a class="nav-link" href="about-us.html">About</a></li>
                        <li><a class="nav-link" href="services.html">Services</a></li>
                        <li><a class="nav-link" href="portfolio.html">Portfolio</a></li>
                        <li><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="extra-menu d-flex align-items-center">
                    <div class="d-none d-md-block h-btn m-35px-l">
                        <a class="m-btn m-btn-theme2nd m-btn-radius" href="#">Buy Now</a>
                    </div>
                    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-collapse-toggle" aria-expanded="false">
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->