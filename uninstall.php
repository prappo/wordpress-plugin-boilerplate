<?php
/**
 * Uninstall the plugin
 *
 * @package WordPress_Plugin_Boilerplate
 * @subpackage Database
 */

use WordPressPluginBoilerplate\Database\Migrations\Accounts;

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

// delete tables from database which is created by this plugin.
Accounts::down();
