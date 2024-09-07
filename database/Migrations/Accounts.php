<?php
/**
 * Database configuration using Eloquent ORM.
 *
 * @package WordPressPluginBoilerplate
 * @subpackage Database
 * @since 1.0.0
 */

namespace WordPressPluginBoilerplate\Database\Migrations;

use WordPressPluginBoilerplate\Interfaces\Migration;
use Prappo\WpEloquent\Database\Capsule\Manager as Capsule;
use Prappo\WpEloquent\Database\Schema\Blueprint;
use Prappo\WpEloquent\Support\Facades\Schema;

/**
 * Class Accounts
 *
 * Represents the migration for creating the 'accounts' table.
 *
 * @package WordPressPluginBoilerplate\Database\Migrations
 */
class Accounts implements Migration {

	/**
	 * Table name for the migration.
	 *
	 * @var string
	 */
	private static $table = 'accounts';

	/**
	 * Run the migrations.
	 */
	public static function up() {
		if ( Capsule::schema()->hasTable( self::$table ) ) {
			return;
		}
		Capsule::schema()->create(
			self::$table,
			function ( Blueprint $table ) {
				$table->id();
				$table->string( 'user_id' )->uniqid();
				$table->string( 'host' );
				$table->integer( 'port' );
				$table->string( 'first_name' );
				$table->string( 'last_name' );
				$table->string( 'email' )->unique();
				$table->string( 'name' );
				$table->string( 'password' );
				$table->dateTime( 'created_at' )->nullable();
				$table->dateTime( 'updated_at' )->nullable();
			}
		);
	}

	/**
	 * Reverse the migrations.
	 */
	public static function down() {
		Schema::dropIfExists( self::$table );
	}
}
