<?php

namespace MyPlugin\Admin;

use MyPlugin\Traits\Base;

/**
 * Class Menu
 *
 * Represents the admin menu management for the MyPlugin plugin.
 *
 * @package MyPlugin\Admin
 */
class Menu {

	use Base;

	/**
	 * Parent slug for the menu.
	 *
	 * @var string
	 */
	private $parent_slug = 'myplugin';

	/**
	 * Initializes the admin menu.
	 *
	 * @return void
	 */
	public function init() {
		// Hook the function to the admin menu.
		add_action( 'admin_menu', array( $this, 'myplugin_menu' ) );
	}

	/**
	 * Adds a menu to the WordPress admin dashboard.
	 *
	 * @return void
	 */
	public function myplugin_menu() {

		add_menu_page(
			__( 'MyPlugin', 'myplugin' ),
			__( 'MyPlugin', 'myplugin' ),
			'manage_options',
			$this->parent_slug,
			array( $this, 'myplugin_page' ),
			'dashicons-email',
			3
		);

		$myplugin_url = admin_url( '/admin.php?page=' . $this->parent_slug );

		if ( isset( $_GET['page'] )
		&& ( $_GET['page'] === $this->parent_slug
		|| $_GET['page'] === $this->parent_slug . '/' ) ) {
			$myplugin_url = '';
		}

		$submenu_pages = array(
			array(
				'parent_slug' => $this->parent_slug,
				'page_title'  => __( 'Dashboard', 'myplugin' ),
				'menu_title'  => __( 'Dashboard', 'myplugin' ),
				'capability'  => 'manage_options',
				'menu_slug'   => $this->parent_slug,
				'function'    => array( $this, 'myplugin_page' ), // Uses the same callback function as parent menu.
			),
			array(
				'parent_slug' => $this->parent_slug,
				'page_title'  => __( 'Inbox', 'myplugin' ),
				'menu_title'  => __( 'Inbox', 'myplugin' ),
				'capability'  => 'manage_options',
				'menu_slug'   => $myplugin_url . '/#/inbox',
				'function'    => null, // Uses the same callback function as parent menu.
			),

			array(
				'parent_slug' => $this->parent_slug,
				'page_title'  => __( 'Chart', 'myplugin' ),
				'menu_title'  => __( 'Chart', 'myplugin' ),
				'capability'  => 'manage_options',
				'menu_slug'   => $myplugin_url . '/#/charts',
				'function'    => null, // Uses the same callback function as parent menu.
			),

			array(
				'parent_slug' => $this->parent_slug,
				'page_title'  => __( 'Settings', 'myplugin' ),
				'menu_title'  => __( 'Settings', 'myplugin' ),
				'capability'  => 'manage_options',
				'menu_slug'   => $myplugin_url . '/#/settings',
				'function'    => null, // Uses the same callback function as parent menu.
			),
		);

		$myplugin_submenu_pages = apply_filters( 'myplugin_submenu_pages', $submenu_pages );

		foreach ( $myplugin_submenu_pages as $submenu ) {

			add_submenu_page(
				$submenu['parent_slug'],
				$submenu['page_title'],
				$submenu['menu_title'],
				$submenu['capability'],
				$submenu['menu_slug'],
				$submenu['function']
			);
		}
	}

	/**
	 * Callback function for the main "MyPlugin" menu page.
	 *
	 * @return void
	 */
	public function myplugin_page() {
		?>
		<div id="myplugin" class="myplugin-app"></div>
		<?php
	}
}
