<?php
/**
 * If uninstall not called from WordPress, then exit.
 *
 * @since 1.0.0
 * @package WordPress Plugin Boilerplate
 */

use MyPlugin\Database\Migrations\Accounts;

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';

// delete tables from database which is created by this plugin.
Accounts::down();
