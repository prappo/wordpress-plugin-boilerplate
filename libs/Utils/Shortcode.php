<?php
namespace WordPressPluginBoilerplate\Libs\Utils;

/**
 * Shortcode Class for WordPress
 *
 * This class allows dynamic creation of shortcodes in WordPress with attributes and content support.
 */
class Shortcode {
	/** @var string */
	private $tag;
	/** @var array */
	private $attrs = array();
	private $render;

	/**
	 * Create a new Shortcode instance
	 */
	public static function add(): self {
		return new self();
	}

	/**
	 * Set the shortcode tag
	 */
	public function tag( string $tag ): self {
		$this->tag = $tag;
		return $this;
	}

	/**
	 * Define accepted attributes for the shortcode
	 */
	public function attrs( array $attrs ): self {
		$this->attrs = $attrs;
		return $this;
	}

	/**
	 * Set the rendering method for the shortcode (callback function or view file path)
	 */
	public function render( $render ): self {
		$this->render = $render;
		add_shortcode( $this->tag, array( $this, 'handleShortcode' ) );
		return $this;
	}

	/**
	 * Handle shortcode rendering
	 */
	public function handleShortcode( $atts, $content = null ) {
		$atts = shortcode_atts( array_fill_keys( $this->attrs, '' ), $atts, $this->tag );

		if ( is_callable( $this->render ) ) {
			return call_user_func( $this->render, $atts, $content );
		} elseif ( is_string( $this->render ) && file_exists( $this->render ) ) {
			ob_start();
			// Attributes are available to the view via the $atts array
			// (e.g. $atts['name']); $shortcode_content holds the inner content.
			$shortcode_content = $content; // Pass content to the view file
			include $this->render;
			return ob_get_clean();
		}

		return ''; // Return empty string if no valid render function or file is found
	}
}
