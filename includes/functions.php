<?php
defined( 'ABSPATH' ) || exit;

/**
 * Installs a custom page with the specified title, name, and template file.
 *
 * @param string $page_title               The title of the page.
 * @param string $page_name                The name (slug) of the page.
 * @param string $page_template_file_name The filename of the page template.
 * @return void
 */
function myplugin_install_page( $page_title, $page_name, $page_template_file_name ) {
	// Check if a page with the specified name does not exist.
	if ( ! get_page_by_path( $page_name ) ) {
		$args = array(
			'post_title'  => $page_title,
			'post_name'   => $page_name,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_type'   => 'page',
		);
		// Insert a new page.
		$id = wp_insert_post( $args );
		// Add post meta for the page template.
		add_post_meta( $id, '_wp_page_template', $page_template_file_name );
	}
}
