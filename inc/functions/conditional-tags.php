<?php
/**
 * Custom conditional tags for this theme.
 *
 * @package Mombo
 */

define( 'AURORA_ACTIVE_CF7', in_array( 'contact-form-7/wp-contact-form-7.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

/**
 * Demo Importer
 *
 * @package Mombo
 */

function mombo_theme_ocdi_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__('Demo One','mombo'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/demo-one/demo-one.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/demo-one/demo-one.wie',
            'local_import_customizer_file'   => trailingslashit( get_template_directory() ) . 'inc/demos/demo-one/customizer.dat',
            'import_notice'                => esc_html__( 'Before importing demo data you must have to install required plugins', 'mombo' ),
            'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . 'inc/demos/demo-one/screenshot.jpg',
            'preview_url' => esc_url('http://demo.techcandle.net/mombo-wp/'),
        ),
        array(
            'import_file_name'             => esc_html__('Demo Two','mombo'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/demo-two/demo-two.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/demo-two/demo-two.wie',
            'local_import_customizer_file'   => trailingslashit( get_template_directory() ) . 'inc/demos/demo-two/customizer.dat',
            'import_notice'                => esc_html__( 'Before importing demo data you must have to install required plugins', 'mombo' ),
            'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . '/inc/demos/demo-two/screenshot.jpg',
            'preview_url' => esc_url('http://demo.techcandle.net/mombo-wp/home-two/'),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'mombo_theme_ocdi_import_files' );


function mombo_theme_ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'mombo_theme_ocdi_after_import_setup' );


function mombo_theme_ocdi_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'Mombo Demo Import' , 'mombo' );
    $default_settings['menu_title']  = esc_html__( 'Demo Importer' , 'mombo' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'pt-one-click-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'mombo_theme_ocdi_plugin_page_setup' );