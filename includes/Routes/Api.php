<?php
/**
 * WordPressPluginBoilerplate Routes
 *
 * Defines and registers custom API routes for the WordPressPluginBoilerplate using the Haruncpi\WpApi library.
 *
 * @package WordPressPluginBoilerplate\Routes
 */

namespace WordPressPluginBoilerplate\Routes;

use WordPressPluginBoilerplate\Libs\API\Route;

Route::prefix(
	WORDPRESS_PLUGIN_BOILERPLATE_ROUTE_PREFIX,
	function ( Route $route ) {

		// Define accounts API routes.

		$route->post( '/accounts/create', '\WordPressPluginBoilerplate\Controllers\Accounts\Actions@create' );
		$route->get( '/accounts/get', '\WordPressPluginBoilerplate\Controllers\Accounts\Actions@get' );
		$route->post( '/accounts/delete', '\WordPressPluginBoilerplate\Controllers\Accounts\Actions@delete' );
		$route->post( '/accounts/update', '\WordPressPluginBoilerplate\Controllers\Accounts\Actions@update' );

		// Posts routes.
		$route->get( '/posts/get', '\WordPressPluginBoilerplate\Controllers\Posts\Actions@get_all_posts' );
		$route->get( '/posts/get/{id}', '\WordPressPluginBoilerplate\Controllers\Posts\Actions@get_post' );
		// Allow hooks to add more custom API routes.
		do_action( 'wordpress_plugin_boilerplate_api', $route );
	}
);
