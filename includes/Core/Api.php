<?php

namespace WordPressPluginBoilerplate\Core;

use WordPressPluginBoilerplate\Traits\Base;
use Haruncpi\WpApi\ApiConfig;

/**
 * Class API
 *
 * Initializes and configures the API for the WordPressPluginBoilerplate.
 *
 * @package WordPressPluginBoilerplate\Core
 */
class API {

	use Base;

	/**
	 * Initializes the API for the WordPressPluginBoilerplate.
	 *
	 * @return void
	 */
	public function init() {
		ApiConfig::set_route_file( WORDPRESS_PLUGIN_BOILERPLATE_DIR . '/includes/Routes/Api.php' )
			->set_namespace( 'WordPressPluginBoilerplate\Api' )
			->init();
	}
}
