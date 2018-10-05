<?php
/**
 * Elementui "Admin-menu" page for WordPress Dashboard.
 *
 * Elementui theme page is responsible for creating and displaying the menus and submenus in the wp-admin navigation bar.
 * Elementui "Admin-menu" page for WordPress dashboard.
 *
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ELMT_add_admin_menu() {

	/**
     * Render Elementiu main-menu
     * @since 1.0.0
     */
	add_menu_page ( 
		$page_title    = 'Elementiu',
		$menu_title    = 'Elementiu',
		$capability    = 'manage_options',
		$menu_slug     = 'elementiu',
		$function      = '',
		$icon_url      = 'dashicons-image-filter',
		$position      = '98'

	);

	/**
     * Render Dashboard submenu
     * @since 1.0.0
     */
	add_submenu_page ( 
		$parent_slug   = 'elementiu', 
		$page_title    = 'Dashboard', 
		$menu_title    = 'Dashboard', 
		$capability    = 'manage_options', 
		$menu_slug     = 'dashboard', 
		$function      = '' // Call to function 
	);

	/**
     * Render Theme inspector submenu
     * @since 1.0.0
     */
	add_submenu_page ( 
		$parent_slug   = 'elementiu', 
		$page_title    = 'Theme inspector', 
		$menu_title    = 'Theme inspector', 
		$capability    = 'manage_options', 
		$menu_slug     = 'theme-inspector', 
		$function      = 'ELMT_set_theme_inspector' // Call to function 
	);

	/**
     * Render Performance submenu
     * @since 1.0.0
     */
	add_submenu_page ( 
		$parent_slug   = 'elementiu', 
		$page_title    = 'Performance', 
		$menu_title    = 'Performance', 
		$capability    = 'manage_options', 
		$menu_slug     = 'performance', 
		$function      = '' // Call to function  
	);

	/**
     * Render Settings submenu
     * @since 1.0.0
     */
	add_submenu_page ( 
		$parent_slug   = 'elementiu', 
		$page_title    = 'Settings', 
		$menu_title    = 'Settings', 
		$capability    = 'manage_options', 
		$menu_slug     = 'theme-settings', 
		$function      = array( 'ELMT_set_theme_options', 'ELMT_set_theme_settings' ) // Call to functions 
	);

	remove_submenu_page( 'elementiu', 'elementiu' );

} 

add_action( 'admin_menu', 'ELMT_add_admin_menu');