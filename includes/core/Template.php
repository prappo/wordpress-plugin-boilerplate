<?php

namespace MyPlugin\Core;

use MyPlugin\Trait\Base;

class Template {

	use Base;

	const FRONTEND_TEMPLATE      = 'frontend-template.php';
	const FRONTEND_TEMPLATE_NAME = 'MyPlugin';
	const FRONTEND_TEMPLATE_SLUG = 'myplugin';

	public function init() {
		add_filter( 'theme_page_templates', array( $this, 'custom_template' ) );
		add_filter( 'template_include', array( $this, 'load_custom_template' ) );
	}
	public function custom_template( $templates ) {
		$templates[ self::FRONTEND_TEMPLATE ] = self::FRONTEND_TEMPLATE_NAME;
		return $templates;
	}


	// Load the custom template file
	public function load_custom_template( $template ) {
		if ( get_page_template_slug() === self::FRONTEND_TEMPLATE ) {
			$template_file_dir = MYPLUGIN_DIR . 'views/templates/' . self::FRONTEND_TEMPLATE;

			if ( file_exists( $template_file_dir ) ) {
				return $template_file_dir;
			}
		}
		return $template;
	}
}
