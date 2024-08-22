<?php
/**
 * MyPlugin Routes
 *
 * Defines and registers custom API routes for the MyPlugin using the Haruncpi\WpApi library.
 *
 * @package MyPlugin\Routes
 */

namespace MyPlugin\Routes;

use Haruncpi\WpApi\ApiRoute;

ApiRoute::prefix(
	MYPLUGIN_ROUTE_PREFIX,
	function ( ApiRoute $route ) {

		// Define accounts API routes.

		$route->post( '/accounts/create', '\MyPlugin\Modules\Accounts\Actions@create' );
		$route->get( '/accounts/get', '\MyPlugin\Modules\Accounts\Actions@get' );
		$route->post( '/accounts/delete', '\MyPlugin\Modules\Accounts\Actions@delete' );
		$route->post( '/accounts/update', '\MyPlugin\Modules\Accounts\Actions@update' );

		// Allow hooks to add more custom API routes.
		do_action( 'myplugin_api', $route );
	}
);
