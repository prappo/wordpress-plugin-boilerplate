<?php
// If uninstall not called from WordPress, then exit

use MyPlugin\Database\Migrations\Accounts;

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

// delete tables from database which is created by this plugin
Accounts::down();
