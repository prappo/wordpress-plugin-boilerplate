<?php

namespace MyPlugin\Interface;

/**
 * Interface Migration
 *
 * Defines the contract for database migration operations.
 *
 * @package MyPlugin\Interface
 */
interface Migration {

	/**
	 * Perform actions when migrating up.
	 *
	 * @return void
	 */
	public static function up();

	/**
	 * Perform actions when migrating down.
	 *
	 * @return void
	 */
	public static function down();
}
