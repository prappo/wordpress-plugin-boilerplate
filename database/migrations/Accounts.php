<?php

namespace MyPlugin\Database\Migrations;

use MyPlugin\Interface\Migration;
use Prappo\WpEloquent\Database\Schema\Blueprint;
use Prappo\WpEloquent\Support\Facades\Schema;

/**
 * Class Accounts
 *
 * Represents the migration for creating the 'accounts' table.
 *
 * @package MyPlugin\Database\Migrations
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
		if ( Schema::hasTable( self::$table ) ) {
			return;
		}
		Schema::create(
			self::$table,
			function ( Blueprint $table ) {
				$table->id();
				$table->string( 'user_id' );
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
