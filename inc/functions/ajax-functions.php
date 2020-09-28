<?php 
/**
 * Mombo theme registration
 *
 * @package Mombo
 * @since 1.0
 */

add_action('wp_ajax_mombo_item_registration', 'mombo_item_registration');
add_action('wp_ajax_nopriv_mombo_item_registration', 'mombo_item_registration');
function mombo_item_registration() { 
    $tf_token = (isset($_REQUEST['tf_token'])) ? sanitize_text_field( wp_unslash( $_REQUEST['tf_token'] ) )  : '';
    $tf_purchase_code = (isset($_REQUEST['tf_purchase_code'])) ? sanitize_text_field( wp_unslash( $_REQUEST['tf_purchase_code'] ) ) : '';
    $reg_type = (isset($_REQUEST['reg-type'])) ? sanitize_text_field( wp_unslash( $_REQUEST['reg-type'] ) ) : '';

    $verification = 'false';
    if ( !isset( $_REQUEST['tf-registration'] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['tf-registration'] ) ), 'mombo_item_registration' ) ) { 
        die( esc_html__('Permission denied', 'mombo') );
    }
    
    if( $tf_token && $tf_purchase_code ) {
        if( $reg_type == 'remove' ) {
            update_option( 'mombo_verification_key', array(
                'tf_token'         => '', 
                'tf_purchase_code' => '',
            ) ); 
            $verification = 'true';
        } else {
            $url = 'https://api.envato.com/v3/market/buyer/purchase?code='.$tf_purchase_code; 
            $defaults = array(
                'headers' => array(
                    'Authorization' => 'Bearer '.$tf_token,
                    'User-Agent' => 'TechCandle Mombo Theme',
                ),
                'timeout' => 300,
            );

            $theme_info = wp_get_theme();
            $theme_info = ( $theme_info->parent() ) ? $theme_info->parent() : $theme_info;
            $theme_name = $theme_info->get('Name'); 
            $author_name = $theme_info->get('Author'); 

            $raw_response = wp_remote_get( $url, $defaults );
            $response = json_decode( $raw_response['body'], true );
            if(isset($response['item']['wordpress_theme_metadata'])) {
                $tf_theme_name = (isset($response['item']['wordpress_theme_metadata']['theme_name'])) ? $response['item']['wordpress_theme_metadata']['theme_name'] : '';
                $tf_author_name = (isset($response['item']['wordpress_theme_metadata']['author_name'])) ? $response['item']['wordpress_theme_metadata']['author_name'] : '';
                if($theme_name == $tf_theme_name && $author_name == $tf_author_name) {
                    update_option( 'mombo_verification_key', array(
                        'tf_token'         => $tf_token, 
                        'tf_purchase_code' => $tf_purchase_code,
                    ) ); 
                    $verification = 'true';
                } 
            } 
        } 
    } 
    echo esc_html($verification);
    die(); 
}
  