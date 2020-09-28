<?php
/**
 *  Mombo Get Featured Image
 *
 * @package Mombo
 * @since 1.0
 */
if ( ! function_exists( 'mombo_post_featured_image' ) ) :
function mombo_post_featured_image($width = 900, $height = 600, $crop = false, $mobile = true) {
    if ( wp_is_mobile() && $mobile = true ) {
        $featured_image = mombo_aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full' ), 409, 275, false ); 
        if( $featured_image == false ) {
            the_post_thumbnail( 'full', array( 'alt' => get_the_title() ));
        } else { ?>
        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title(); ?>" />
        <?php }
    } else {
        $featured_image = mombo_aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full' ), $width, $height, $crop );
        if( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ) {
            $image_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
        } else {
            $image_alt = get_the_title();
        }
        $img_meta = wp_prepare_attachment_for_js( get_post_thumbnail_id() );

        if($img_meta['title'] !== "") {
            $imgtitle = 'title=" '. $img_meta['title'] .' "';
        } else {
            $imgtitle = '';
        }
        if( $featured_image == false ) {
            the_post_thumbnail( 'full', array( 'alt' => esc_attr( $image_alt ), 'title' => esc_attr( $img_meta['title'] ) ));
        } else { ?>
            <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" <?php echo wp_kses_post($imgtitle); ?> />
        <?php }
    }
}
endif;

/**
 *  Mombo Get Image Crop Size By Image ID
 *
 * @package Mombo
 * @since 1.0
 */
if ( ! function_exists( 'mombo_get_image_size_by_img_id' ) ) :
function mombo_get_image_size_by_img_id($img_id = false, $width = null, $height = null, $crop = false) {
    $url = wp_get_attachment_url( $img_id ,'full' );
    if ( wp_is_mobile() ) {
        $crop_image = mombo_aq_resize( $url, 409, 275, false ); 
        if( $crop_image == false ) {
            return $url;
        } else { 
            return $crop_image;
        }
    } else {
        $crop_image = mombo_aq_resize( $url, $width, $height, $crop );  
        if( $crop_image == false ) { 
            return $url;
        } else { 
            return $crop_image;
        }
    }
}
endif;

/**
 *  Mombo Get Image By Post ID
 *
 * @package Mombo
 * @since 1.0
 */
if ( ! function_exists( 'mombo_get_image_crop_size_by_id' ) ) :
function mombo_get_image_crop_size_by_id($post_id = false, $width = null, $height = null, $crop = false) {
    $url = get_the_post_thumbnail_url($post_id, 'full');
    if ( wp_is_mobile() ) { 
        $crop_image = mombo_aq_resize( $url, 409, 275, false ); 
        if( $crop_image == false ) {
            return $url;
        } else { 
            return $crop_image;
        }
    } else {
        $crop_image = mombo_aq_resize( $url, $width, $height, $crop ); 
        if( $crop_image == false ) {
            return $url;
        } else { 
            return $crop_image;
        }
    }
}
endif;

/**
 *  Mombo Get Image By URL
 *
 * @package EasyArt
 * @since 1.0
 */
if ( ! function_exists( 'mombo_get_image_crop_size_by_url' ) ) :
    function mombo_get_image_crop_size_by_url($url = false, $width = null, $height = null, $crop = false) {
        $crop_image = mombo_aq_resize( $url, $width, $height, $crop ); 
        if( $crop_image == false ) {
            return $url;
        } else { 
            return $crop_image;
        }
    }
endif;

/**
 *  Mombo Return Page Title
 *
 * @package Mombo
 * @since 1.0
 */
if(! function_exists('mombo_get_page_title') ) :
    function mombo_get_page_title() {
        $page_ID = get_queried_object_id();
        return get_the_title($page_ID);
    }
endif;

