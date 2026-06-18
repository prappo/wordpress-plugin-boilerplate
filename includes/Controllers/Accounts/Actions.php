<?php

namespace WordPressPluginBoilerplate\Controllers\Accounts;

use WordPressPluginBoilerplate\Models\Accounts;
use WordPressPluginBoilerplate\Libs\Utils\Encryption;

/**
 * Class Actions
 *
 * Handles account-related actions such as creation, retrieval, deletion, and update.
 *
 * @package WordPressPluginBoilerplate\Controllers\Accounts
 */
class Actions {

	/**
	 * Gmail SMTP host.
	 *
	 * @var string
	 */
	const GMAIL_SMPT_HOST = 'smtp.gmail.com';

	/**
	 * Outlook SMTP host.
	 *
	 * @var string
	 */
	const OUTLOOK_SMPT_HOST = 'smtp-mail.outlook.com';

	/**
	 * Gmail port.
	 *
	 * @var int
	 */
	const GMAIL_PORT = 465;

	/**
	 * Outlook port.
	 *
	 * @var int
	 */
	const OUTLOOK_PORT = 587;

	/**
	 * Creates a new account based on the provided request.
	 *
	 * @param \WP_REST_Request $request The REST request object.
	 * @return array The response message.
	 */
	public function create( \WP_REST_Request $request ) {
		$email = sanitize_email( (string) $request->get_param( 'email' ) );

		if ( ! is_email( $email ) ) {
			return Messages::error_account_exists();
		}

		if ( Accounts::where( 'email', $email )->exists() ) {
			return Messages::error_account_exists();
		}

		if ( $this->add( $request ) ) {
			return Messages::success_acount_created();
		}
	}

	/**
	 * Adds a new account to the database.
	 *
	 * @param \WP_REST_Request $request The REST request object.
	 * @return bool True on success.
	 */
	public function add( $request ) {
		$account             = new Accounts();
		$account->host       = self::GMAIL_SMPT_HOST;
		$account->port       = self::GMAIL_PORT;
		$account->first_name = sanitize_text_field( (string) $request->get_param( 'firstName' ) );
		$account->last_name  = sanitize_text_field( (string) $request->get_param( 'lastName' ) );
		$account->email      = sanitize_email( (string) $request->get_param( 'email' ) );
		$account->password   = Encryption::encrypt( (string) $request->get_param( 'appPassword' ) );
		$account->save();

		return true;
	}

	/**
	 * Retrieves all accounts from the database.
	 *
	 * @return mixed The list of accounts.
	 */
	public function get() {
		return Accounts::all();
	}

	/**
	 * Deletes an account based on the provided request.
	 *
	 * @param \WP_REST_Request $request The REST request object.
	 * @return array The response message.
	 */
	public function delete( \WP_REST_Request $request ) {
		$id = absint( $request->get_param( 'id' ) ); // Account ID requested to delete.

		if ( ! $id ) {
			return Messages::error_account_deleted();
		}

		try {
			Accounts::where( 'id', $id )->delete();
			return Messages::success_account_deleted();
		} catch ( \Exception $e ) {
			return Messages::error_account_deleted();
		}
	}

	/**
	 * Updates an account based on the provided request.
	 *
	 * @param \WP_REST_Request $request The REST request object.
	 * @return array The response message.
	 */
	public function update( \WP_REST_Request $request ) {
		$id = absint( $request->get_param( 'id' ) );

		if ( ! $id ) {
			return Messages::error_account_update();
		}

		try {
			Accounts::where( 'id', $id )->update(
				array(
					'first_name' => sanitize_text_field( (string) $request->get_param( 'firstName' ) ),
					'last_name'  => sanitize_text_field( (string) $request->get_param( 'lastName' ) ),
					'email'      => sanitize_email( (string) $request->get_param( 'email' ) ),
					'password'   => Encryption::encrypt( (string) $request->get_param( 'appPassword' ) ),
				)
			);
			return Messages::success_account_update();
		} catch ( \Exception $e ) {
			return Messages::error_account_update();
		}
	}
}
