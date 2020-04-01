<?php
/**
 * AgriLife LiveWhale
 *
 * @package      agrilife-livewhale
 * @author       Zachary Watkins
 * @copyright    2020 Texas A&M AgriLife Communications
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:  AgriLife LiveWhale
 * Plugin URI:   https://github.com/AgriLife/agrilife-livewhale
 * Description:  A plugin for AgriLife websites to display LiveWhale calendar event information.
 * Version:      1.0.0
 * Author:       Zachary Watkins
 * Author URI:   https://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * Text Domain:  agrilife-livewhale
 * License:      GPL-2.0+
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
 */

/* Define some useful constants */
define( 'AGLVW_DIRNAME', 'agrilife-livewhale' );
define( 'AGLVW_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'AGLVW_DIR_FILE', __FILE__ );
define( 'AGLVW_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'AGLVW_TEXTDOMAIN', 'agrilife-livewhale' );

/**
 * The core plugin class that is used to initialize the plugin
 */
require AGLVW_DIR_PATH . 'src/class-agrilife-livewhale.php';
spl_autoload_register( 'AgriLife_LiveWhale::autoload' );
AgriLife_LiveWhale::get_instance();
