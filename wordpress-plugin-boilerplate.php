<?php
/**
 * Plugin Name: WordPress Plugin Boilerplate
 * Description: A boilerplate for WordPress plugins.
 * Author: Prappo
 * Author URI: https://prappo.github.io
 * License: GPLv2
 * Version: 1.0.0
 * Text Domain: wordpress-plugin-boilerplate
 * Domain Path: /languages
 *
 * @package WordPress Plugin Boilerplate
 */

use WordPressPluginBoilerplate\Core\Install;

defined( 'ABSPATH' ) || exit;

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
require_once plugin_dir_path( __FILE__ ) . 'plugin.php';

/**
 * Initializes the WordPressPluginBoilerplate plugin when plugins are loaded.
 *
 * @since 1.0.0
 * @return void
 */
function wordpress_plugin_boilerplate_init() {
	WordPressPluginBoilerplate::get_instance()->init();
}

// Hook for plugin initialization.
add_action( 'plugins_loaded', 'wordpress_plugin_boilerplate_init' );

// Hook for plugin activation.
register_activation_hook( __FILE__, array( Install::get_instance(), 'init' ) );
