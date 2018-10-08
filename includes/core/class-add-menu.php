<?php
/**
 * Elementiu "Add admin menu" page for WordPress Dashboard.
 *
 * Elementiu theme page is responsible for creating and displaying the menus and submenus in the wp-admin navigation bar.
 * Elementiu "Add admin menu" page for WordPress dashboard.
 *
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Star class
 * @since 1.0.0
 */
if ( ! class_exists( 'ELMT_add_admin_menu' ) ) {

	class ELMT_add_admin_menu {

		public static function ELMT_add_adminmenu() {

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
			 * Render Theme Inspector submenu
			 * @since 1.0.0
			 */
			add_submenu_page ( 
				$parent_slug   = 'elementiu', 
				$page_title    = 'Theme inspector', 
				$menu_title    = 'Theme inspector', 
				$capability    = 'manage_options', 
				$menu_slug     = 'theme-inspector', 
				$function      = array( 'ELMT_theme_inspector', 'ELMT_inspector' ) // Call to functions 
			);

			/**
			 * Render Theme Options submenu
			 * @since 1.0.0
			 */
			add_submenu_page ( 
				$parent_slug   = 'elementiu', 
				$page_title    = 'Settings', 
				$menu_title    = 'Settings', 
				$capability    = 'manage_options', 
				$menu_slug     = 'theme-settings', 
				$function      = array( 'ELMT_theme_options', 'ELMT_theme_options_view' ) // Call to functions 
			);

			remove_submenu_page( 'elementiu', 'elementiu' );

		} 
	}
}

add_action( 'admin_menu',  array( 'ELMT_add_admin_menu', 'ELMT_add_adminmenu' ));