<?php
/**
 * Database configuration using Eloquent ORM.
 *
 * @package MyPlugin
 * @subpackage Database
 */

namespace MyPlugin\Database\Seeders;

/**
 * Class Accounts
 *
 * Represents the seeder for the 'accounts' table.
 *
 * @package MyPlugin\Database\Seeders
 * @since 1.0.0
 */
class Accounts {

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
			\MyPlugin\Models\Accounts::create( $account );
		}
	}
}
