<?php 
/* This template for theme function */

/*
 * Template parts functions
 * @since Mombo 1.0
*/
if ( ! function_exists( 'mombo_get_template_part' ) ) :
    function mombo_get_template_part($part_name = "") {
        $part_style_url = (isset($_GET["{$part_name}_style"])) ? sanitize_text_field( wp_unslash( $_GET["{$part_name}_style"] ) ) : '';
        switch($part_style_url) { 
            case 'one': 
            case 'two': 
                $part_style = $part_style_url; break;
            default: $part_style = "one"; break;
        }  
        return get_template_part( "template-parts/$part_name/$part_style" );
    }
endif;

/*
 * Get Meta Field Value
 * @since Mombo 1.0
*/
function mombo_meta_options() {
    foreach (func_get_args() as $arg) {
        if (!empty($arg)) {
            $result = get_post_meta( get_the_ID(), 'mombo_mb_'.$arg, true);
        } else { 
            $result = null;
        }
    }
    return $result;
}


/*
 * Excerpt Content
 * @since Mombo 1.0
*/

function mombo_excerpt_length($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if ( count($excerpt) >= $limit ) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}

function mombo_string_to_excerpt($text = "", $limit = null) {
    $excerpt = explode(' ', $text, $limit);
    if ( count($excerpt) >= $limit ) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}
