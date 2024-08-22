<?php
use MyPlugin\Core\Api;
use MyPlugin\Admin\Menu;
use MyPlugin\Core\Template;
use MyPlugin\Frontend\Frontend;

defined( 'ABSPATH' ) || exit;

/**
 * Class MyPlugin
 *
 * The main class for the Coldmailar plugin, responsible for initialization and setup.
 *
 * @since 1.0.0
 */
final class MyPlugin {

	/**
	 * The singleton instance.
	 *
	 * @var mixed
	 */
	private static $instance;

	/**
	 * Retrieves the singleton instance. If it does not exist, creates a new instance.
	 *
	 * @return mixed The singleton instance.
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Class constructor to set up constants for the plugin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {
		define( 'MYPLUGIN_VERSION', '1.0.0' );
		define( 'MYPLUGIN_PLUGIN_FILE', __FILE__ );
		define( 'MYPLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		define( 'MYPLUGIN_URL', plugin_dir_url( __FILE__ ) );
		define( 'MYPLUGIN_ASSETS_URL', MYPLUGIN_URL . '/assets' );
		define( 'MYPLUGIN_ROUTE_PREFIX', 'myplugin/v1' );
	}

	/**
	 * Main execution point where the plugin will fire up.
	 *
	 * Initializes necessary components for both admin and frontend.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		if ( is_admin() ) {
			Menu::get_instance()->init();
		}

		// Initialze core functionalities.
		Frontend::get_instance()->bootstrap();
		API::get_instance()->init();
		Template::get_instance()->init();

		add_action( 'init', array( $this, 'i18n' ) );
	}


	/**
	 * Internationalization setup for language translations.
	 *
	 * Loads the plugin text domain for localization.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function i18n() {
		load_plugin_textdomain( 'my-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}
