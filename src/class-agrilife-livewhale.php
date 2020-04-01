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

		if ( 'AgriFlex4' == $theme->name || 'AgriFlex4' == $theme->parent_theme ) {

			require_once AGLVW_DIR_PATH . '/src/class-assets.php';
			require_once AGLVW_DIR_PATH . '/src/class-block.php';

			new \AgriLife_LiveWhale\Assets();
			new \AgriLife_LiveWhale\Block();

		}

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
