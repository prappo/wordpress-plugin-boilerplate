<?php
/**
 * Resuable API response trait
 *
 * @package WpApi
 * @subpackage Traits
 * @author Harun <harun.cox@gmail.com>
 * @license cc-by-4.0
 * @since 1.0.0
 */

namespace Haruncpi\WpApi\Traits;

/**
 * Trait ApiResponse
 *
 * @since 1.0.0
 */
trait ApiResponse {
	/**
	 * Sent json response.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed   $data data.
	 * @param integer $code status code.
	 *
	 * @return void
	 */
	public function api_response( $data, $code = 200 ) {
		wp_send_json( $data, $code );
	}

	/**
	 * Sent data as JSON
	 *
	 * @since 1.0.0
	 *
	 * @param array $data data.
	 *
	 * @return void
	 */
	public function api_data( $data = array() ) {
		wp_send_json(
			array(
				'success' => true,
				'data'    => $data,
			),
			200
		);
	}

	/**
	 * Send success response with message.
	 *
	 * @since 1.0.0
	 *
	 * @param string $message message.
	 * @param int    $code response code.
	 *
	 * @return void
	 */
	public function api_success( $message, $code = 200 ) {
		wp_send_json(
			array(
				'success' => true,
				'message' => $message,
			),
			$code
		);
	}

	/**
	 * Send fail response with message.
	 *
	 * @since 1.0.0
	 *
	 * @param string $message message.
	 * @param int    $code response code.
	 *
	 * @return void
	 */
	public function api_fail( $message, $code = 200 ) {
		wp_send_json(
			array(
				'success' => false,
				'message' => $message,
			),
			$code
		);
	}
}
