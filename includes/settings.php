<?php
/**
 * Elementui "Settings" page for WordPress Dashboard.
 *
 * Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, iusto. Blanditiis optio laborum temporibus.
 * Elementui "Settings" page for WordPress dashboard.
 *
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'ELMT_set_theme_options' ) ) {

	class ELMT_set_theme_options {

		/**
		 * Start things up
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {	
				add_action( 'admin_init', array( 'ELMT_set_theme_options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'ELMT_theme_options' );
		}

		/**
		 * Returns single theme option
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'ELMT_theme_options', 'ELMT_theme_options', array( 'ELMT_set_theme_options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Checkbox
				if ( ! empty( $options['checkbox_example'] ) ) {
					$options['checkbox_example'] = 'on';
				} else {
					unset( $options['checkbox_example'] ); // Remove from options if not checked
				}

				// Input
				if ( ! empty( $options['ELMT_google_analytics'] ) ) {
					$options['ELMT_google_analytics'] = sanitize_text_field( $options['ELMT_google_analytics'] );
				} else {
					unset( $options['ELMT_google_analytics'] ); // Remove from options if empty
				}

				// Select
				if ( ! empty( $options['select_example'] ) ) {
					$options['select_example'] = sanitize_text_field( $options['select_example'] );
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 * @since 1.0.0
		 */
		public static function ELMT_set_theme_settings() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Theme Options', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'ELMT_theme_options' ); ?>

					<table class="form-table wpex-custom-admin-login-table">

						<?php // Disable admin-bar ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Disable admin-bar', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'ELMT_disable_admin_bar' ); ?>
								<input type="checkbox" name="ELMT_theme_options[ELMT_disable_admin_bar]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Check to disable frontend admin-bar', 'text-domain' ); ?>
							</td>
						</tr>

						<?php // Google Analytics (text input) ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Google Analytics', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'ELMT_google_analytics' ); ?>
								<input type="text" name="ELMT_theme_options[ELMT_google_analytics]" value="<?php echo esc_attr( $value ); ?>">
								<p>Add your Google Analytics code</p>
							</td>
						</tr>

						<?php // Facebook Pixel (text input) ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Facebook Pixel', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'ELMT_facebook_pixel' ); ?>
								<input type="text" name="ELMT_theme_options[ELMT_facebook_pixel]" value="<?php echo esc_attr( $value ); ?>">
								<p>Add your Facebook Pixel code</p>
							</td>
						</tr>

						<?php // Select example ?>
						<tr valign="top" class="wpex-custom-admin-screen-background-section">
							<th scope="row"><?php esc_html_e( 'Select Example', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'select_example' ); ?>
								<select name="ELMT_theme_options[select_example]">
									<?php
									$options = array(
										'1' => esc_html__( 'Option 1', 'text-domain' ),
										'2' => esc_html__( 'Option 2', 'text-domain' ),
										'3' => esc_html__( 'Option 3', 'text-domain' ),
									);
									foreach ( $options as $id => $label ) { ?>
										<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $value, $id, true ); ?>>
											<?php echo strip_tags( $label ); ?>
										</option>
									<?php } ?>
								</select>
							</td>
						</tr>

					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new ELMT_set_theme_options();