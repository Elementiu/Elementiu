<?php
/**
 * Elementui "Analytics" page for WordPress Dashboard.
 *
 * Elementui Analytics page is responsible for creating and displaying the menus and submenus in the wp-admin navigation bar.
 * Elementui "Analytics" page for WordPress dashboard.
 *
 * @since 1.0.0
 */

function ELMT_google_analytics_code() {

	$options = get_option( 'ELMT_theme_options' );

		if ( isset( $options['ELMT_google_analytics'] ) ) { ?>

			<!-- Google Analytics -->
			<script>
			window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
			ga('create', '<?php echo $options['ELMT_google_analytics'];?>', 'auto');
			ga('send', 'pageview');
			</script>
			<script async src='https://www.google-analytics.com/analytics.js'></script>
			<!-- End Google Analytics -->

		<?php } else {

			return FALSE;

		}
	}

add_action('wp_head', 'ELMT_google_analytics_code');