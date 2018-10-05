<?php
/**
 * Elementui "Facebook Pixel" page for WordPress Dashboard.
 *
 * Elementui Facebook Pixel page is responsible for creating and displaying the menus and submenus in the wp-admin navigation bar.
 * Elementui "Facebook Pixel" page for WordPress dashboard.
 *
 * @since 1.0.0
 */

function ELMT_facebook_pixel_code() {

	$options = get_option( 'ELMT_theme_options' );

		if ( isset( $options['ELMT_facebook_pixel'] ) ) { ?>

            <!-- Facebook Pixel Code -->
            <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo $options['ELMT_google_analytics'];?>');
            fbq('track', 'PageView');
            </script>
            <noscript>
            <img height="1" width="1" style="display:none" 
                src="https://www.facebook.com/tr?id=your-pixel-id-goes-here&ev=PageView&noscript=1"/>
            </noscript>
            <!-- End Facebook Pixel Code -->

		<?php } else {

			return FALSE;

		}
	}

add_action('wp_head', 'ELMT_facebook_pixel_code');