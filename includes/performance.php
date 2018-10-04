<?php
/**
 * Elementui "Performance" page for WordPress Dashboard.
 *
 * Elementui Performance page is responsible for creating and displaying the menus and submenus in the wp-admin navigation bar.
 * Elementui "Performance" page for WordPress dashboard.
 *
 * @since 1.0.0
 */


/**
 * Remove query strings from static resources
 * @since 1.0.0
 */
function remove_query_strings( $src ) {     
    $parts = explode( '?', $src ); 	
    return $parts[0];     
} 
    
add_filter( 'script_loader_src', 'remove_query_strings', 15, 1 ); 
add_filter( 'style_loader_src', 'remove_query_strings', 15, 1 );