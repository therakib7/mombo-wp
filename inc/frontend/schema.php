<?php
/**
 * Theme Helpers
 *
 * @package Mombo
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if(! class_exists( 'Mombo_Helpers' ) ) {
    /**
     * The Mombo Helpers
     */
    class Mombo_Helpers {
        
        public function __construct() {
            //Print Theme Colors
            $this->mombo_color();

            //Print Heading Colors
            //$this->mombo_main_headings_color();

            //Header Color Background and styles
            //$this->mombo_backgound_image_cover_bg();

            //Spacing Elements
            //$this->mombo_spaing_elements( );
        }
        /**
         * Hexa to RGBA Convector
         *
         * @package Mombo
         * @since 1.0
         */
        private function mombo_hex_2_rgba($color, $opacity = false) {
            $default = 'rgb(0,0,0)';
            //Return default if no color provided
            if(empty($color))
                return $default; 
         
            //Sanitize $color if "#" is provided 
            if ($color[0] == '#' ) {
                $color = substr( $color, 1 );
            }
         
            //Check if color has 6 or 3 characters and get values
            if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
            } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
            } else {
                return $default;
            }
         
            //Convert hexadec to rgb
            $rgb =  array_map('hexdec', $hex);
         
            //Check if opacity is set(rgba or rgb)
            if($opacity){
                if(abs($opacity) > 1)
                    $opacity = 1.0;
                $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
            } else {
                $output = 'rgb('.implode(",",$rgb).')';
            }
         
            //Return rgb(a) color string
            return $output;
        }

        /**
         * Theme Colors
         *
         * @package Mombo
         * @since 1.0
         */
        public function mombo_color() {  
            // $theme_primary_rgba = $this->mombo_hex_2_rgba($theme_color_primary, 0.8);

            $theme_color_primary = mombo_get_options(array('theme_color_primary', '#03c')); 
            $theme_color_primary_hover = mombo_get_options(array('theme_color_primary_hover', '#002080')); 
            $theme_color_primary_light = mombo_get_options(array('theme_color_primary_light', 'rgba(0, 51, 204, 0.1)')); 

            $theme_color_secondary = mombo_get_options(array('theme_color_secondary', '#15db95')); 
            $theme_color_secondary_hover = mombo_get_options(array('theme_color_secondary_hover', '#0e9566')); 
            $theme_color_secondary_light = mombo_get_options(array('theme_color_secondary_light', 'rgba(21, 219, 149, 0.1)')); 
            
            ?>
            a {
                color: <?php echo esc_attr($theme_color_primary); ?>;
            }
            a:hover {
                color: <?php echo esc_attr($theme_color_primary_hover); ?>;
            }
            .theme-color {
                color: <?php echo esc_attr($theme_color_primary); ?> !important;
            }
            .theme-bg {
                background: <?php echo esc_attr($theme_color_primary); ?> !important;
            }
            .theme-bg-alt {
                background: <?php echo esc_attr($theme_color_primary_light); ?> !important;
            }
            .m-btn-theme {
                background: <?php echo esc_attr($theme_color_primary); ?> !important;
            }

            .theme2nd-color {
                color: <?php echo esc_attr($theme_color_secondary); ?> !important;
            }
            .theme2nd-bg {
                background: <?php echo esc_attr($theme_color_secondary); ?> !important;
            }
            .theme2nd-bg-alt {
                background: <?php echo esc_attr($theme_color_secondary_light); ?> !important;
            }
            .m-btn-theme2nd {
                background: <?php echo esc_attr($theme_color_secondary); ?> !important;
            }

            .pagination .page-item.active .page-link, .pagination .page-item .page-link:hover {
                background: <?php echo esc_attr($theme_color_primary); ?> !important;
                border-color: <?php echo esc_attr($theme_color_primary); ?> !important;
            } 
            .post .nav span.dark-color a:hover { 
                color:  <?php echo esc_attr($theme_color_primary); ?> !important;
            }  
            .comment-reply .m-btn:hover, .woocommerce-pagination ul li a:hover, .wp-block-tag-cloud a:hover {
                background: <?php echo esc_attr($theme_color_primary); ?> !important;
            }
            .comment-reply .m-btn{
                border-color: <?php echo esc_attr($theme_color_primary); ?> !important;
            }  
            .top-button { 
                background: <?php echo esc_attr($theme_color_primary); ?> !important;
            }
            .top-button:hover { 
                background: <?php echo esc_attr($theme_color_primary_hover); ?> !important;
                color: #fff;
            } 
            @media (min-width: 992px) {
                .main-menu ul.menu ul.sub-menu {
                    border-color: <?php echo esc_attr($theme_color_primary); ?> !important;
                }
            }
            @media (max-width: 992px) {
                .main-menu ul.menu > li:hover > a, .main-menu ul li a:hover {
                    color: <?php echo esc_attr($theme_color_primary); ?> !important;
                } 
            }
            
            .user-registration-form-login.login input[type=submit],
            .post-page-numbers.current span ,
            .post-password-form [type=submit],
            .form-submit input,
            .woocommerce-product-search button,
            .woocommerce-pagination ul li span ,
            .wp-block-button__link,
            .wp-block-search__button,
            .woocommerce button.button,
            .woocommerce-form-login__submit,
            .single_add_to_cart_button, 
            .widget_price_filter .price_slider_wrapper .ui-widget-content, 
            .product .onsale,
            .button.alt,
            .actions button, 
            .woocommerce a.button {
                background-color: <?php echo esc_attr($theme_color_primary); ?> !important;
                color: #fff !important;
            }

            .main-menu .tc-menu-close,
            .tc-toggle-menu i,
            .main-menu ul.menu ul.sub-menu {
                background-color: #fff;
            }

            /* ==== Background hover ==== */
            .post-password-form [type=submit]:hover,
            .form-submit input:hover,
            .widget_price_filter .price_slider_wrapper button:hover,
            .woocommerce-product-search button:hover, 
            .woocommerce a.button:hover {
                background: #002080 !important;
            }
            /* ==== Widget Hover ==== */
            .widget_recent_comments ul a:hover,
            .widget_recent_entries ul li a:hover,
            .widget_layered_nav ul li a:hover,
            .widget_product_categories ul li a:hover,
            .widget_nav_menu ul li a:hover,
            .widget_pages ul li a:hover,
            .widget_archive ul li a:hover,
            .widget_meta ul li a:hover,
            .widget_categories ul li a:hover {
                color: <?php echo esc_attr($theme_color_primary); ?> !important;
            }
            .widget_calendar tr td:hover,
            .widget_calendar tr td:hover a, 
            .tagcloud a:hover {
                background: <?php echo esc_attr($theme_color_primary); ?>;
                color: #fff !important;
            }
            /* ==== Color hover ==== */
            .main-menu ul.menu ul.sub-menu li a:hover,
            .fixed-header .main-menu ul.menu > li:hover > a,
            .woocommerce-MyAccount-navigation ul li a:hover, 
            .menu-color-dark ul.menu > li:hover > a, 
            .menu-color-dark ul.menu > li:hover > i, 
            table th a:hover, 
            table td a:hover,
            .wp-block-latest-comments__comment-meta a:hover,
            .wp-block-latest-posts.wp-block-latest-posts__list li a:hover,
            .wp-block-archives.wp-block-archives-list li a:hover,
            .wp-block-rss .wp-block-rss__item-title a:hover {
                color: <?php echo esc_attr($theme_color_primary); ?> !important;
            } 
            .wp-block-tag-cloud a:hover,
            .comment-reply .m-btn:hover,
            .widget_price_filter .price_slider_wrapper button:hover,
            .woocommerce-pagination ul li a:hover {
                color: #fff !important;
            }
            /* ==== Color ==== */ 
            .woocommerce-MyAccount-navigation ul li.is-active a, 
            .menu-color-dark ul li.menu-item-object-page.current_page_item a, 
            .comment-reply .m-btn,
            .fixed-header ul li.current_page_item a, 
            .menu-item-object-page.current-menu-ancestor > a,
            .menu-item-object-page.current-menu-ancestor > a,
            .main-menu ul li ul li.menu-item-object-page.current_page_item > a {
                color: <?php echo esc_attr($theme_color_primary); ?> !important;
            }
            
            .wp-block-button__link,
            .wp-block-search__button,
            .woocommerce button.button,
            .woocommerce-form-login__submit,
            .button.alt,
            .actions button, 
            .woocommerce a.button,
            .white-color, 
            .blog-grid-overlay h5, 
            .post-page-numbers.current span,
            .woocommerce-pagination ul li span,
            .main-menu ul > li > a, 
            .widget_price_filter .price_slider_wrapper button,
            .product .added_to_cart,
            .woocommerce-product-search button {
                color: #fff !important;
            }

            .price-table-03 .pt-head .price, 
            .wp-block-tag-cloud a,
            .main-menu ul.sub-menu .fa-angle-right,
            .main-menu .tc-menu-close,
            .menu-color-dark ul.menu > li.menu-item > a, 
            .menu-color-dark ul.menu > li > i, 
            .header-nav.header-white.fixed-header .main-menu ul .fa-angle-down, 
            .tc-toggle-menu i,
            .woocommerce-EditAccountForm.edit-account fieldset legend,
            .wp-block-latest-posts.wp-block-latest-posts__list + p,
            .wp-block-latest-posts.wp-block-latest-posts__list li a,
            .gallery-size-thumbnail + p, 
            .wp-block-search + p, 
            .wp-block-tag-cloud + p,
            .comment-body .comment-reply-link,
            .comment-body .comment-metadata .c-name a,
            table td a, 
            table th, 
            table th a, 
            .woocommerce-cart-form__contents td a,
            .woocommerce-cart-form__contents th,
            .widget_recently_viewed_products li a,
            .woocommerce-pagination ul li a,
            .woocommerce-tabs ul.tabs li a,
            .woocommerce-result-count,
            .textwidget strong,
            .widget_rss ul .rsswidget,
            .widget_rss .h5 a,
            .wp-block-calendar table th,
            .widget_calendar thead tr th, 
            .tagcloud a,
            .widget .h5, h5,
            .card-body strong, 
            .entry-content strong {
                color: #171347 !important;
            }

            /* ==== Theme Bg Color Primary Hover, Active, Focus, After, Before ==== */
            .video-btn.theme:after,
            #loading,
            .herbyCookieConsent .herbyBtn,
            .navbar-toggler,
            .owl-dots .owl-dot.active, 
            .portfolio-filter-01 .filter li:after, 
            .tab-style-1 .nav-item a:after,
            .price-table-01 .pt-head:after, 
            .tab-style-4 .nav .nav-item a:after,
            .custom-control-input:checked ~ .custom-control-label:before,
            .tab-style-5 .nav-tabs .nav-item > a.active,
            .pagination .page-item.active .page-link,
            .video-btn.theme, 
            .m-btn.m-btn-theme,
            .theme-bg,
            .theme-after:after,
            .theme-before:before, 
            .social-icon.theme a,
            .social-icon.theme2nd a:hover,
            .m-btn.m-btn-theme-light.active, 
            .m-btn.m-btn-theme-light:focus, 
            .m-btn.m-btn-theme-light:hover,
            .theme-hover-bg:hover,
            .portfolio-box-02 .portfolio-desc .pb-tag a:hover,
            .tag-cloud a:hover,
            .pagination .page-item .page-link:hover,
            .m-btn.m-btn-t-theme.active, 
            .m-btn.m-btn-t-theme:focus, 
            .m-btn.m-btn-t-theme:hover { 
                background-color: <?php echo esc_attr($theme_color_primary); ?> !important;
            }
            /* ==== Theme Color Primary ==== */
            .m-btn.m-btn-theme-light,
            .m-btn.m-btn-t-theme,
            .m-link-theme,
            .m-btn.m-link.theme,
            .video-btn.white span,
            .theme-color,
            .header-white .main-navbar .navbar-nav > li > a.active,
            .header-dark .main-navbar .navbar-nav > li > a.active,
            .header-white .main-navbar .navbar-nav > li:hover > a,
            .header-dark .main-navbar .navbar-nav > li:hover > a,
            .px-dropdown .px-dropdown-menu > li:hover > a,
            .px-mega .mm-title,
            .px-mega .mm-link li:hover > a,
            .mm-in .mm-dorp-in > li > a:hover,
            .mm-in .px-mega-menu .mm-title,
            .mm-in .px-mega-menu .mm-link > li > a:hover,
            .portfolio-filter-01 .filter li:hover,
            .portfolio-filter-01 .filter li.active,
            .portfolio-box-02 .gallery-link:hover,
            .portfolio-box-02 .portfolio-desc .pb-tag a,
            .tab-style-1 .nav-item a.active,
            .tab-style-2 .nav .nav-item a.active,
            .tab-style-2 .nav .nav-item a.active,
            .tab-style-4 .nav .nav-item .icon,
            .accordion-03 .acco-group .acco-heading span,
            .accordion-04 .acco-group .acco-heading span,
            .accordion-05 .acco-group.acco-active .acco-heading,
            .accordion-06 .acco-group.acco-active .acco-heading,
            .list-type-01.theme li i,
            .list-type-02.theme li i {
                color: <?php echo esc_attr($theme_color_primary); ?> !important;
            }
            /* ==== Theme Color Primary Border ==== */
            .techcandle-mega-menu,
            .m-btn.m-btn-t-theme,
            .px-dropdown .px-dropdown-menu,
            .px-mega .px-mega-menu,
            .owl-dots .owl-dot,
            .accordion-05 .acco-group .acco-des,
            .comment-respond-form .form-control:focus,
            .list-type-05 li:after,
            .m-btn.m-btn-t-gray:focus, 
            .m-btn.m-btn-t-gray:hover,
            .border-color-theme, 
            .card-frame:hover, 
            .accordion-06 .acco-group.acco-active .acco-heading:after,
            .tag-cloud a:hover,
            .pagination .page-item .page-link:hover 
            .pagination .page-item.active .page-link,
            .custom-control-input:checked ~ .custom-control-label:before {
                border-color: <?php echo esc_attr($theme_color_primary); ?> !important;
            }

            /* ==== Theme Color Secondary Bg Hover, Active, Focus, After, Before ==== */
            .m-btn.m-btn-theme2nd-light.active, 
            .m-btn.m-btn-theme2nd-light:focus,
            .m-btn.m-btn-theme2nd-light:hover, 
            .m-btn.m-btn-t-theme2nd.active, 
            .m-btn.m-btn-t-theme2nd:focus,
            .m-btn.m-btn-t-theme2nd:hover,
            .theme2nd-bg,
            .theme2nd-after:after,
            .theme2nd-before:before,
            .social-icon.theme a:hover,
            .social-icon.theme2nd a,
            .counter-col-02 .cc-icon:after,
            .tab-style-2 .nav .nav-item a:after,
            .tab-style-3 .nav a:after,
            .price-table .pt-head .msg,
            .price-table-01 .pt-head .msg,
            .price-table-01.active .pt-head:after,
            .blog-grid .b-meta .meta,
            .list-type-03 li i,
            .m-btn.m-btn-theme2nd {
                background-color: <?php echo esc_attr($theme_color_secondary); ?> !important;
            }

            /* ==== Theme Color Secondary ==== */
            .m-btn.m-btn-theme2nd-light,
            .m-btn.m-btn-t-theme2nd,
            .m-link-theme2nd,
            .m-btn.m-link.theme2nd,
            .theme2nd-color,
            .tab-style-3 .nav a.active,
            .list-type-02 li i {
                color: <?php echo esc_attr($theme_color_secondary); ?> !important;
            }
            /* ==== Theme Border Color Secondary ==== */
            .m-btn.m-btn-t-theme2nd,
            .list-type-04 li:after,
            .border-color-theme2nd {
                border-color: <?php echo esc_attr($theme_color_secondary); ?> !important;
            } 
            /* ==== Theme Color Secondary Hover, Focus, Active ==== */
            .m-btn.m-btn-theme2nd.active, 
            .m-btn.m-btn-theme2nd:focus, 
            .m-btn.m-btn-theme2nd:hover {
                background: <?php echo esc_attr($theme_color_secondary_hover); ?> !important;
            }
            /* ==== Theme Color Secondary Light ==== */
            .theme2nd-bg-alt {
                background-color: <?php echo esc_attr($theme_color_secondary_light); ?> !important;
            }
            /* ==== Theme Color Primary Light ==== */
            .theme-bg-alt {
                background-color: <?php echo esc_attr($theme_color_primary_light); ?> !important;
            }
            /* ==== Theme Color Primary Hover, Focus, Active ==== */
            .m-btn.m-btn-theme.active,
            .m-btn.m-btn-theme:focus, 
            .m-btn.m-btn-theme:hover {
                background: <?php echo esc_attr($theme_color_primary_hover); ?> !important;
            }
              
            <?php
        } // end mombo_color function

        /**
         * Title Color
         *
         * @package Mombo
         * @since 1.0
         */
        public function mombo_main_headings_color() {
         
             
        }

        /**
         * Theme Background Colors
         *
         * @package Mombo
         * @since 1.0
         */
        public function mombo_backgound_image_cover_bg() { ?>
            
            <?php 
        }

        /**
         * Theme Spacing Element
         *
         * @package Mombo
         * @since 1.0
         */
        public function mombo_spaing_elements() {
            

            // Return CSS
            /* if ( ! empty( $css ) ) {
                echo wp_strip_all_tags( $css );
            } */
        }

    }
}

new Mombo_Helpers;