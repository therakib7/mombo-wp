<?php 
if ( ! defined( 'ABSPATH' ) ) die( esc_html__( 'Direct access forbidden.', 'mombo' ) );

if( ! class_exists( 'Mombo_Static' ) ) :
class Mombo_Static {

    /**
     * Allow HTML tag from escaping HTML 
     * 
     * @return void
     * @since v1.0
     */
    public static function html_allow() {
        return array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'del' => array(),
            'span' => array(),
            'em' => array(),
            'strong' => array(),
            'h1' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h2' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h3' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h4' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h5' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'h6' => array(
                'class' => array(),
                'id' => array(),
            ),            
            'div' => array(
                'class' => array(),
                'id' => array(),
            ),
            'p' => array(
                'class' => array(),
                'id' => array(),
            ),
        );
    }

    /**
     * @since v1.0
     */
    public static function total_grid() {
        return array(
            '1' => esc_html__( '1 Grid', 'mombo' ),
            '2' => esc_html__( '2 Grid', 'mombo' ),
            '3' => esc_html__( '3 Grid', 'mombo' ),
            '4' => esc_html__( '4 Grid', 'mombo' ),
            '5' => esc_html__( '5 Grid', 'mombo' ),
            '6' => esc_html__( '6 Grid', 'mombo' ),
            '7' => esc_html__( '7 Grid', 'mombo' ),
            '8' => esc_html__( '8 Grid', 'mombo' ),
            '9' => esc_html__( '9 Grid', 'mombo' ),
            '10' => esc_html__( '10 Grid', 'mombo' ),
            '11' => esc_html__( '11 Grid', 'mombo' ),
            '12' => esc_html__( '12 Grid', 'mombo' ),
        );
    }

    /**
     * @since v1.0
     */
    public static function total_items() {
        return array(
            '2' => esc_html__( 'Two', 'mombo' ),
            '3' => esc_html__( 'Three', 'mombo' ),
            '4' => esc_html__( 'Four', 'mombo' ),
            '5' => esc_html__( 'Five', 'mombo' ),
            '6' => esc_html__( 'Six', 'mombo' ),
            '7' => esc_html__( 'Seven', 'mombo' ),
        );
    }

}

// Removing this line is like not having a functions.php file
new Mombo_Static;

endif;