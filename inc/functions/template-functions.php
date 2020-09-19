<?php 

/**
 * Template functions part going here
 * @package Mombo
 */
if ( ! function_exists( 'mombo_preloader' ) ) :
    function mombo_preloader() {  
        if( mombo_get_options('preloader') ) { ?>
        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div><!-- /preloader-icon -->
            </div><!-- /preloader-inner -->
        </div><!-- /preloader -->
        <?php }
    }
endif;

/**
 *  Get theme options
 *
 * @since Mombo 1.0
 *
 * @return array mombo_options
 *
 */
if ( ! function_exists( 'mombo_get_options' ) ) :
    function mombo_get_options() {
        $result = get_theme_mod('mombo_options');
        foreach (func_get_args() as $arg) {
            if(is_array($arg)) {
                if (!empty($result[$arg[0]])) {
                    $result = $result[$arg[0]];
                } else {  
                  $result = $arg[1];
                }
            } else {
                if (!empty($result[$arg])) {
                    $result = $result[$arg];
                } else { 
                    $result = null;
                }
            }
        }
        return $result;
    }
endif;

/**
 * Return padding/margin values for customizer
 * @since Mombo 1.0
 * @since 1.0
 */
if ( ! function_exists( 'mombo_spacing_css' ) ) {

    function mombo_spacing_css( $top, $right, $bottom, $left ) {

        // Add px and 0 if no value
        $s_top      = ( isset( $top ) && '' !== $top ) ? intval( $top ) . 'px ' : '0px ';
        $s_right    = ( isset( $right ) && '' !== $right ) ? intval( $right ) . 'px ' : '0px ';
        $s_bottom   = ( isset( $bottom ) && '' !== $bottom ) ? intval( $bottom ) . 'px ' : '0px ';
        $s_left     = ( isset( $left ) && '' !== $left ) ? intval( $left ) . 'px' : '0px';
        
        // Return one value if it is the same on every inputs
        if ( ( intval( $s_top ) === intval( $s_right ) )
            && ( intval( $s_right ) === intval( $s_bottom ) )
            && ( intval( $s_bottom ) === intval( $s_left ) ) ) {
            return $s_left;
        }
        
        // Return
        return $s_top . $s_right . $s_bottom . $s_left;
    }

}