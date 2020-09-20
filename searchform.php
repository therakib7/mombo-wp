<?php
/**
 * The template for displaying search form.
 *
 * @package Mombo
 * @since 1.0
 */
?> 
<div class="p-20px">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="d-flex flex-column flex-md-row m-5px-b input-group">
        <input type="search" name="s" class="form-control mr-sm-2 mb-2 mb-sm-0" placeholder="<?php esc_attr_e( 'Search here &hellip;', 'mombo' ); ?>" value="<?php echo esc_html( get_search_query() ); ?>">
        <button class="m-btn m-btn-theme m-btn-radius flex-shrink-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>

