<?php

namespace WordPressPluginBoilerplate\Controllers\Accounts;

use WordPressPluginBoilerplate\Models\Accounts;

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
		if ( Accounts::where(
			'email',
			$request->get_param( 'email' )
		)->exists() ) {
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
	 * @return void
	 */
	public function add( $request ) {
		$account             = new Accounts();
		$account->host       = self::GMAIL_SMPT_HOST;
		$account->port       = self::GMAIL_PORT;
		$account->first_name = $request->get_param( 'firstName' );
		$account->last_name  = $request->get_param( 'lastName' );
		$account->email      = $request->get_param( 'email' );
		$account->password   = $request->get_param( 'appPassword' );
		$account->save();
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
		$id = $request->get_param( 'id' ); // Account ID requested to delete.
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
		$id = $request->get_param( 'id' );

		try {
			Accounts::where( 'id', $id )->update(
				array(
					'first_name' => $request->get_param( 'firstName' ),
					'last_name'  => $request->get_param( 'lastName' ),
					'email'      => $request->get_param( 'email' ),
					'password'   => $request->get_param( 'appPassword' ),
				)
			);
			return Messages::success_account_update();
		} catch ( \Exception $e ) {
			return Messages::error_account_update();
		}
	}
}
