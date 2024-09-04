<?php
/**
 * Database configuration using Eloquent ORM.
 *
 * @package WordPressPluginBoilerplate
 * @subpackage Database
 */

namespace WordPressPluginBoilerplate\Database\Seeders;

use Prappo\WpEloquent\Database\Capsule\Manager as Capsule;
/**
 * Class Accounts
 *
 * Represents the seeder for the 'accounts' table.
 *
 * @package WordPressPluginBoilerplate\Database\Seeders
 * @since 1.0.0
 */
class Accounts {
	private static $table = 'accounts';

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public static function run() {

		// Insert data to the tables.
		$accounts = array(
			array(
				'user_id'    => '1',
				'host'       => 'localhost',
				'port'       => 3306,
				'first_name' => 'John',
				'last_name'  => 'Doe',
				'email'      => 'demouser1@email.com',
				'name'       => 'John Doe',
				'password'   => 'password',
				'created_at' => gmdate( 'Y-m-d H:i:s' ),
				'updated_at' => gmdate( 'Y-m-d H:i:s' ),
			),
			array(
				'user_id'    => '2',
				'host'       => 'localhost',
				'port'       => 3306,
				'first_name' => 'Jane',
				'last_name'  => 'Doe',
				'email'      => 'demouser2@email.com',
				'name'       => 'Jane Doe',
				'password'   => 'password',
				'created_at' => gmdate( 'Y-m-d H:i:s' ),
				'updated_at' => gmdate( 'Y-m-d H:i:s' ),
			),
		);

		foreach ( $accounts as $account ) {
			if ( ! \WordPressPluginBoilerplate\Models\Accounts::where( 'user_id', $account['user_id'] )->exists() ) {
				\WordPressPluginBoilerplate\Models\Accounts::create( $account );
			}
		}
	}
}
