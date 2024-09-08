<?php
/**
 * Posts Controller
 *
 * This file is used to register all actions for the Posts Controller.
 *
 * @since 1.0.0
 */

namespace WordPressPluginBoilerplate\Controllers\Posts;

use WordPressPluginBoilerplate\Models\Posts;

class Actions {
	public function get_all_posts() {
		$posts = Posts::all();
		return $posts;
	}

	public function get_post( \WP_REST_Request $request ) {
		$post = Posts::find( $request->get_param( 'id' ) );
		return $post;
	}
}
