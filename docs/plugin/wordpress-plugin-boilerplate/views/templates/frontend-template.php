<?php

/**
 * Template Name: MyPlugin
 */
function myplugin_remove_unwanted_scripts_and_styles() {
	global $wp_scripts, $wp_styles;

	// Loop through all scripts
	foreach ( $wp_scripts->queue as $handle ) {
		if ( $handle !== 'myplugin' ) {
			wp_dequeue_script( $handle );
			wp_deregister_script( $handle );
		}
	}

	$styles_to_keep = array( 'admin-bar', 'wp-auth-check', 'plugin-installer-style', 'colors', 'myplugin-0' );

	foreach ( $wp_styles->queue as $handle ) {

		if ( in_array( $handle, $styles_to_keep ) ) {
			continue;
		}
		wp_dequeue_style( $handle );
		wp_deregister_style( $handle );
	}
}

?>

<?php
// Template specific deregistration of scripts and styles
add_action( 'wp_enqueue_scripts', 'myplugin_remove_unwanted_scripts_and_styles', 100 );

wp_head();

?>
<div id="myplugin" class="myplugin-app"></div>
<?php

wp_footer();
?>
