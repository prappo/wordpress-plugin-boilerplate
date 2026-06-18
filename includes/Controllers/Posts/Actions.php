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

	/**
	 * Maximum number of posts that can be returned in a single request.
	 *
	 * @var int
	 */
	const MAX_PER_PAGE = 100;

	/**
	 * Columns selected for list responses.
	 *
	 * Avoids loading the full (and potentially very large) post_content column
	 * for every row when only a listing is needed.
	 *
	 * @var array
	 */
	const LIST_COLUMNS = array( 'ID', 'post_title', 'post_excerpt', 'post_date' );

	/**
	 * Retrieve a paginated list of published posts.
	 *
	 * Previously this loaded the entire posts table (including revisions,
	 * drafts and other post types) into memory on every call. It now selects
	 * only the columns needed for a listing, restricts results to published
	 * posts and pages the query.
	 *
	 * @param \WP_REST_Request $request The REST request object.
	 * @return \Prappo\WpEloquent\Support\Collection
	 */
	public function get_all_posts( \WP_REST_Request $request ) {
		$per_page = absint( $request->get_param( 'per_page' ) );
		$per_page = $per_page > 0 ? min( $per_page, self::MAX_PER_PAGE ) : 10;

		$page   = max( 1, absint( $request->get_param( 'page' ) ) );
		$offset = ( $page - 1 ) * $per_page;

		return Posts::where( 'post_type', 'post' )
			->where( 'post_status', 'publish' )
			->orderBy( 'post_date', 'desc' )
			->offset( $offset )
			->limit( $per_page )
			->get( self::LIST_COLUMNS );
	}

	public function get_post( \WP_REST_Request $request ) {
		$post = Posts::find( absint( $request->get_param( 'id' ) ) );
		return $post;
	}
}
