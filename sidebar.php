<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Mombo
 * @since 1.0
 */
?>
<div class="col-lg-4 md-m-15px-tb">
    <?php  
    $single_or_faq = ( is_singular('faq') ) ? "sidebar-faq" : "sidebar-single"; 
    $sidebar_id = ( is_single() ) ? $single_or_faq : "sidebar-blog"; 
    if ( is_active_sidebar( $sidebar_id ) ) :  
        dynamic_sidebar( $sidebar_id ); 
    else :
        the_widget('WP_Widget_Categories', '', 'before_widget=<aside class="card widget widget_categories">&before_title=<div class="card-header bg-transparent"><span class="h5 m-0px font-w-600 dark-color">&after_title=</span></div>&after_widget=</aside>'); 

        the_widget('WP_Widget_Archives', '', 'before_widget=<aside class="card widget widget_archive">&before_title=<div class="card-header bg-transparent"><span class="h5 m-0px font-w-600 dark-color">&after_title=</span></div>&after_widget=</aside>'); 

        the_widget('WP_Widget_Tag_Cloud', '', 'before_widget=<aside class="card widget widget_tag_cloud">&before_title=<div class="card-header bg-transparent"><span class="h5 m-0px font-w-600 dark-color">&after_title=</span></div>&after_widget=</aside>');
    endif; ?>
</div>
