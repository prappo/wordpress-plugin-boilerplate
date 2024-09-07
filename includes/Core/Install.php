<?php

namespace WordPressPluginBoilerplate\Core;

use WordPressPluginBoilerplate\Database\Migrations\Accounts;
use WordPressPluginBoilerplate\Database\Seeders\Accounts as SeedersAccounts;
use WordPressPluginBoilerplate\Traits\Base;

/**
 * This class is responsible for the functionality
 * which is required to set up after activating the plugin
 */
class Install {


	use Base;

	/**
	 * Initialize the class
	 *
	 * @return void
	 */
	public function init() {

		$this->install_pages();
		$this->install_tables();
		$this->insert_data();
	}

	/**
	 * Install the pages
	 *
	 * @return void
	 */
	private function install_pages() {
		wordpress_plugin_boilerplate_install_page(
			Template::FRONTEND_TEMPLATE_NAME,
			Template::FRONTEND_TEMPLATE_SLUG,
			Template::FRONTEND_TEMPLATE
		);
	}

	/**
	 * Install the tables
	 *
	 * @return void
	 */
	private function install_tables() {
		Accounts::up();
	}

	/**
	 * Insert data to the tables
	 *
	 * @return void
	 */
	private function insert_data() {
		// Insert data to the tables.
		SeedersAccounts::run();
	}
}
