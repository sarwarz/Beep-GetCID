<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://beepcoder.com
 * @since             1.0.0
 * @package           Beep_Getcid
 *
 * @wordpress-plugin
 * Plugin Name:       Beep Get CID
 * Plugin URI:        https://beepcoder.com/plugins/wp-getcid
 * Description:       The Beep GET CID tool is a WordPress plugin that helps you generate a Confirmation ID for Microsoft phone activation process.
 * Version:           1.0.0
 * Author:            Beepcoder
 * Author URI:        https://beepcoder.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       beep-getcid
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BEEP_GETCID_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-beep-getcid-activator.php
 */
function activate_beep_getcid() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-beep-getcid-activator.php';
	Beep_Getcid_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-beep-getcid-deactivator.php
 */
function deactivate_beep_getcid() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-beep-getcid-deactivator.php';
	Beep_Getcid_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_beep_getcid' );
register_deactivation_hook( __FILE__, 'deactivate_beep_getcid' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-beep-getcid.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_beep_getcid() {

	$plugin = new Beep_Getcid();
	$plugin->run();

}
run_beep_getcid();
