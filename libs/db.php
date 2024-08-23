<?php
/**
 * Database configuration using Eloquent ORM.
 *
 * @package WordPress_Plugin_Boilerplate
 * @subpackage Database
 * @since 1.0.0
 */

namespace MyPlugin\Libs\DatabaseConnection;

use Illuminate\Database\Capsule\Manager as Capsule;

global $wpdb;

$connect_type = $wpdb->is_mysql ? 'mysql' : 'sqlite';

// Create a new Capsule instance.
$capsule = new Capsule();

// Determine the database connection settings based on the constant.
if ( 'sqlite' === $connect_type ) {
	$capsule->addConnection(
		array(
			'driver'   => 'sqlite',
			'database' => WP_CONTENT_DIR . '/database/.ht.sqlite', // Path to SQLite database file.
			'prefix'   => $wpdb->prefix,
		)
	);
} else {
	$capsule->addConnection(
		array(
			'driver'    => 'mysql',
			'host'      => DB_HOST,
			'database'  => DB_NAME,
			'username'  => DB_USER,
			'password'  => DB_PASSWORD,
			'charset'   => $wpdb->charset,
			'collation' => $wpdb->collate,
			'prefix'    => $wpdb->prefix,
		)
	);
}

// Make this Capsule instance available globally via static methods.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
