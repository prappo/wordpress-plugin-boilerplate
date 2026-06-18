<?php

namespace WordPressPluginBoilerplate\Controllers\Accounts;

/**
 * Class Messages
 *
 * Provides static methods to generate standardized messages related to accounts actions.
 *
 * @package WordPressPluginBoilerplate\Controllers\Accounts
 */
class Messages {

	/**
	 * Returns an error message for account existence.
	 *
	 * @return array
	 */
	public static function error_account_exists() {
		return array(
			'status'  => 'error',
			'message' => __( 'account already exists', 'wordpress-plugin-boilerplate' ),
		);
	}

	/**
	 * Returns a success message for account creation.
	 *
	 * @return array
	 */
	public static function success_acount_created() {
		return array(
			'status'  => 'success',
			'message' => __( 'account created', 'wordpress-plugin-boilerplate' ),
		);
	}

	/**
	 * Returns a success message for account deletion.
	 *
	 * @return array
	 */
	public static function success_account_deleted() {
		return array(
			'status'  => 'success',
			'message' => __( 'account deleted successfully', 'wordpress-plugin-boilerplate' ),
		);
	}

	/**
	 * Returns an error message for account deletion failure.
	 *
	 * @return array
	 */
	public static function error_account_deleted() {
		return array(
			'status'  => 'error',
			'message' => __( 'unable to delete account', 'wordpress-plugin-boilerplate' ),
		);
	}

	/**
	 * Returns a success message for account update.
	 *
	 * @return array
	 */
	public static function success_account_update() {
		return array(
			'status'  => 'success',
			'message' => __( 'account updated successfully', 'wordpress-plugin-boilerplate' ),
		);
	}

	/**
	 * Returns an error message for account update failure.
	 *
	 * @return array
	 */
	public static function error_account_update() {
		return array(
			'status'  => 'error',
			'message' => __( 'unable to update account', 'wordpress-plugin-boilerplate' ),
		);
	}
}
