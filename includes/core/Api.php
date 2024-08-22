<?php

namespace MyPlugin\Core;

use MyPlugin\Traits\Base;
use Haruncpi\WpApi\ApiConfig;

/**
 * Class API
 *
 * Initializes and configures the API for the MyPlugin.
 *
 * @package MyPlugin\Core
 */
class API {

	use Base;

	/**
	 * Initializes the API for the MyPlugin.
	 *
	 * @return void
	 */
	public function init() {
		ApiConfig::set_route_file( MYPLUGIN_DIR . '/includes/Routes/Api.php' )
			->set_namespace( 'MyPlugin\Api' )
			->init();
	}
}
