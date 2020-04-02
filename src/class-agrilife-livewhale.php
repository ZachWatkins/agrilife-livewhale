<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across the
 * public-facing side of the site.
 *
 * @link       https://github.com/agrilife/agrilife-livewhale/blob/master/src/class-agrilife-livewhale.php
 * @since      1.0.0
 * @package    agrilife-livewhale
 * @subpackage agrilife-livewhale/src
 */

/**
 * The core plugin class
 *
 * @since 1.0.0
 * @return void
 */
class AgriLife_LiveWhale {

	/**
	 * File name
	 *
	 * @var file
	 */
	private static $file = __FILE__;

	/**
	 * Instance
	 *
	 * @var instance
	 */
	private static $instance;

	/**
	 * Initialize the class
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function __construct() {

		$theme = wp_get_theme();

		require_once AGLVW_DIR_PATH . '/src/class-assets.php';
		require_once AGLVW_DIR_PATH . '/src/class-block.php';

		new \AgriLife_LiveWhale\Assets();
		new \AgriLife_LiveWhale\Block();

		add_action( 'widgets_init', array( $this, 'register_widgets' ) );
		add_filter( 'dynamic_sidebar_params', array( $this, 'add_widget_class' ) );

	}

	/**
	 * Register widgets
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function register_widgets() {

		require_once AGLVW_DIR_PATH . '/src/class-widget.php';
		register_widget( 'Widget_LiveWhale' );

	}

	/**
	 * Add class name to widget elements
	 *
	 * @since 1.0.4
	 * @param array $params Widget parameters.
	 * @return array
	 */
	public function add_widget_class( $params ) {

		$str = $params[0]['before_widget'];
		preg_match( '/class="([^"]+)"/', $str, $match );
		$classes = explode( ' ', $match[1] );

		if ( in_array( 'widget', $classes, true ) ) {

			if ( false !== strpos( $params[0]['widget_id'], 'agrilife_livewhale' ) ) {

				$classes[] = 'livewhale';

				if ( 'sidebar' !== $params[0]['id'] && 'sidebar-alt' !== $params[0]['id'] ) {

					$classes[] = 'invert';

				}

			}

			$class_output               = implode( ' ', $classes );
			$params[0]['before_widget'] = str_replace( $match[0], "class=\"{$class_output}\"", $params[0]['before_widget'] );

		}

		return $params;

	}

	/**
	 * Autoloads any classes called within the theme
	 *
	 * @since 1.0.0
	 * @param string $classname The name of the class.
	 * @return void.
	 */
	public static function autoload( $classname ) {

		$filename = dirname( __FILE__ ) .
			DIRECTORY_SEPARATOR .
			str_replace( '_', DIRECTORY_SEPARATOR, $classname ) .
			'.php';

		if ( file_exists( $filename ) ) {
			require $filename;
		}

	}

	/**
	 * Return instance of class
	 *
	 * @since 1.0.0
	 * @return object.
	 */
	public static function get_instance() {

		return null === self::$instance ? new self() : self::$instance;

	}

}
