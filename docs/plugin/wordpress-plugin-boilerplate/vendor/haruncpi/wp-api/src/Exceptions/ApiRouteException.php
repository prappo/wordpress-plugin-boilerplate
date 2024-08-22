<?php
/**
 * API route exception.
 *
 * @package WpApi
 * @subpackage Exceptions
 * @author Harun <harun.cox@gmail.com>
 * @license cc-by-4.0
 * @since 1.0.0
 */

namespace Haruncpi\WpApi\Exceptions;

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
