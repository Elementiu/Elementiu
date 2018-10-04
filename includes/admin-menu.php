<?php
/**
 * Elementui "Admin-menu" page for WordPress Dashboard.
 *
 * Elementui theme page is responsible for creating and displaying the menus and submenus in the wp-admin navigation bar.
 * Elementui "Admin-menu" page for WordPress dashboard.
 *
 * @since 1.0.0
 */

function add_admin_menu() {

	/**
     * Render main-menu
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
     * Render submenu
     * @since 1.0.0
     */
	add_submenu_page ( 
		$parent_slug   = 'elementiu', 
		$page_title    = 'Theme inspector', 
		$menu_title    = 'Theme inspector', 
		$capability    = 'manage_options', 
		$menu_slug     = 'theme-inspector', 
		$function      = 'elementiu_admin_menu_function' 
	);

	/**
     * Render submenu
     * @since 1.0.0
     */
	add_submenu_page ( 
		$parent_slug   = 'elementiu', 
		$page_title    = 'Settings', 
		$menu_title    = 'Settings', 
		$capability    = 'manage_options', 
		$menu_slug     = 'theme-settings', 
		$function      = 'set_theme_settings' 
	);

	remove_submenu_page( 'elementiu', 'elementiu' );

} 

add_action( 'admin_menu', 'add_admin_menu');