<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       SK WP Skeleton Plugin V2
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sk-wp-skeleton-plugin-v2
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * define plugin setting constants 
 */
define('SKWPSPV2_NAME', 'SK WP Skeleton Plugin v2');
define('SKWPSPV2_COMMERCIAL_NAME', 'SK WP Skeleton Plugin v2 1.0.0');
define('SKWPSPV2_SLUG', 'sk-wp-skeleton-plugin-v2'); //same as text domain for better understanding
define('SKWPSPV2_PREFIX', 'skwpspv2');
define('SKWPSPV2_VERSION', '1.0.0');

define('SKWPSPV2_FILE_PATH', __FILE__);
define('SKWPSPV2_DIRECTORY_PATH', plugin_dir_path(__FILE__));
define('SKWPSPV2_DIRECTORY_NAME', basename(SKWPSPV2_DIRECTORY_PATH));
define('SKWPSPV2_FILE_NAME', basename(SKWPSPV2_FILE_PATH));
define('SKWPSPV2_INCLUDES_PATH', SKWPSPV2_DIRECTORY_PATH . '/includes');
define('SKWPSPV2_ADMIN_PATH', SKWPSPV2_DIRECTORY_PATH . '/admin');
define('SKWPSPV2_PUBLIC_PATH', SKWPSPV2_DIRECTORY_PATH . '/public');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_skwpspv2() {
    require_once SKWPSPV2_INCLUDES_PATH . '/class-skwpspv2-activator.php';
    SKWPSPV2_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_skwpspv2() {
    require_once SKWPSPV2_INCLUDES_PATH . '/class-skwpspv2-deactivator.php';
    SKWPSPV2_Deactivator::deactivate();
}

register_activation_hook(SKWPSPV2_FILE_PATH, 'activate_skwpspv2');
register_deactivation_hook(SKWPSPV2_FILE_PATH, 'deactivate_skwpspv2');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require SKWPSPV2_INCLUDES_PATH . '/class-skwpspv2-core.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_activate_skwpspv2() {

    $skwpspv2 = new SKWPSPV2_Core();
    $skwpspv2->run();
}

run_activate_skwpspv2();
