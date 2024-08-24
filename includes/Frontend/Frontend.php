<?php

declare(strict_types=1);

namespace MyPlugin\Frontend;

use MyPlugin\Core\Template;
use MyPlugin\Traits\Base;
use MyPlugin\Libs\Assets;

/**
 * Class Frontend
 *
 * Handles frontend functionalities for the MyPlugin.
 *
 * @package MyPlugin\Frontend
 */
class Frontend {

	use Base;

	/**
	 * Script handle for MyPlugin.
	 */
	const HANDLE = 'myplugin';

	/**
	 * Development script path for MyPlugin.
	 */
	const DEV_SCRIPT = 'js/src/main.jsx';

	/**
	 * List of allowed screens for script enqueue.
	 *
	 * @var array
	 */
	private $allowed_screens = array(
		'toplevel_page_myplugin',
		'myplugin_page_myplugin-campaigns',
	);

	/**
	 * Frontend bootstrapper.
	 *
	 * @return void
	 */
	public function bootstrap() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_script' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_script' ) );
	}

	/**
	 * Enqueue script based on the current screen.
	 *
	 * @param string $screen The current screen.
	 */
	public function enqueue_script( $screen ) {
		$current_screen     = $screen;
		$template_file_name = Template::FRONTEND_TEMPLATE;

		if ( ! is_admin() ) {
			$template_slug = get_page_template_slug();
			if ( $template_slug ) {

				if ( $template_slug === $template_file_name ) {
					array_push( $this->allowed_screens, $template_file_name );
					$current_screen = $template_file_name;
				}
			}
		}

		if ( in_array( $current_screen, $this->allowed_screens, true ) ) {
			Assets\enqueue_asset(
				MYPLUGIN_DIR . '/js/dist',
				self::DEV_SCRIPT,
				$this->get_config()
			);
			wp_localize_script( 'myplugin', 'myplugin', $this->get_data() );
		}
	}

	/**
	 * Get the script configuration.
	 *
	 * @return array The script configuration.
	 */
	public function get_config() {
		return array(
			'dependencies' => array( 'react', 'react-dom' ),
			'handle'       => self::HANDLE,
			'in-footer'    => true,
		);
	}

	/**
	 * Get data for script localization.
	 *
	 * @return array The localized script data.
	 */
	public function get_data() {

		return array(
			'developer' => 'prappo',
			'isAdmin'   => is_admin(),
			'apiUrl'    => rest_url(),
			'userInfo'  => $this->get_user_data(),
		);
	}

	/**
	 * Get user data for script localization.
	 *
	 * @return array The user data.
	 */
	private function get_user_data() {
		$username   = '';
		$avatar_url = '';

		if ( is_user_logged_in() ) {
			// Get current user's data.
			$current_user = wp_get_current_user();

			// Get username.
			$username = $current_user->user_login; // or use user_nicename, display_name, etc.

			// Get avatar URL.
			$avatar_url = get_avatar_url( $current_user->ID );
		}

		return array(
			'username' => $username,
			'avatar'   => $avatar_url,
		);
	}
}
