<?php

namespace MyPlugin\Core;

use MyPlugin\Database\Migrations\Accounts;
use MyPlugin\Traits\Base;

/**
 * This class is responsible for the functionality
 * which is required to set up after activating the plugin
 */
class Install {


	use Base;

	public function init() {

		$this->install_pages();
		$this->install_tables();
	}

	private function install_pages() {
		// Install frontend page
		myplugin_install_page(
			Template::FRONTEND_TEMPLATE_NAME,
			Template::FRONTEND_TEMPLATE_SLUG,
			Template::FRONTEND_TEMPLATE
		);
	}

	private function install_tables() {
		Accounts::up();
	}
}
