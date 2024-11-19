<?php
/**
 * Frontend Template
 *
 * This file is used to markup the public facing aspects of the plugin.
 *
 * @package WordPressPluginBoilerplate
 */

use WordPressPluginBoilerplate\Assets\Frontend;



/**
 * Remove unwanted scripts and styles.
 *
 * @return void
 * @since 1.0.0
 */
function wordpress_plugin_boilerplate_remove_unwanted_scripts_and_styles() {
	global $wp_scripts, $wp_styles;

	// Loop through all scripts.
	foreach ( $wp_scripts->queue as $handle ) {
		if ( Frontend::HANDLE !== $handle ) {
			wp_dequeue_script( $handle );
			wp_deregister_script( $handle );
		}
	}

	$styles_to_keep = array( 'admin-bar', 'wp-auth-check', 'plugin-installer-style', 'colors', Frontend::HANDLE . '-0' );

	foreach ( $wp_styles->queue as $handle ) {

		if ( in_array( $handle, $styles_to_keep, true ) ) {
			continue;
		}
		wp_dequeue_style( $handle );
		wp_deregister_style( $handle );
	}
}

?>

<?php
// Template specific deregistration of scripts and styles.
add_action( 'wp_enqueue_scripts', 'wordpress_plugin_boilerplate_remove_unwanted_scripts_and_styles', 100 );

wp_head();

?>
<div id="myplugin-frontend" class="myplugin-app"></div>
<?php

wp_footer();
?>
