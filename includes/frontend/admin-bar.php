<?php
/**
 * Elementui "Admin-bar" page for WordPress Dashboard.
 *
 * Elementui Admin-bar page is responsible for creating and displaying the menus and submenus in the wp-admin navigation bar.
 * Elementui "Admin-bar" page for WordPress dashboard.
 *
 * @since 1.0.0
 */

function ELMT_disable_frontend_adminbar() {

	$options = get_option( 'ELMT_theme_options' );

		if ( isset( $options['ELMT_disable_admin_bar'] ) ) { 

			return FALSE;

		} else {

			return TRUE;

		}
	}

add_filter( 'show_admin_bar' , 'ELMT_disable_frontend_adminbar');