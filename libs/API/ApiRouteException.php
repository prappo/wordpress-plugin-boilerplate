<?php
/**
 * API route exception.
 *
 * @package WordpressPluginBoilerplate
 * @since 1.0.0
 */

namespace WordPressPluginBoilerplate\Libs\API;

use Exception;

/**
 * Class ApiRouteException
 *
 * @since 1.0.0
 */
class ApiRouteException extends Exception {
	/**
	 * Constructor
	 *
	 * @param string  $message exception message.
	 * @param integer $code code.
	 */
	public function __construct( $message = '', $code = 0 ) {
		parent::__construct( $message, $code );
	}
}
