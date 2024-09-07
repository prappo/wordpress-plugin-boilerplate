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
			'message' => 'account already exists',
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
			'message' => 'account created',
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
			'message' => 'account deleted successfully',
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
			'message' => 'unable to delete account',
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
			'message' => 'account updated successfully',
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
			'message' => 'unable to update account',
		);
	}
}
