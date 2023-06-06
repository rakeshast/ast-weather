<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/aryanbokde
 * @since             1.0.0
 * @package           Ast_Weather
 *
 * @wordpress-plugin
 * Plugin Name:       Ast Weather
 * Plugin URI:        https://wordpress.org/plugins/ast-weather
 * Description:       Ast Weather allows you to display beautiful weather to your WordPress site in a minute without coding skills! The plugin is customizable and developer-friendly.
 * Version:           1.0.0
 * Author:            Rakesh
 * Author URI:        https://github.com/aryanbokde
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ast-weather
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
define( 'AST_WEATHER_VERSION', '1.0.0' );
define( 'AST_WEATHER_PLUGIN_URL', plugin_dir_url(__FILE__));
define( 'AST_WEATHER_PLUGIN_PATH', plugin_dir_path(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ast-weather-activator.php
 */
function activate_ast_weather() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ast-weather-activator.php';
	Ast_Weather_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ast-weather-deactivator.php
 */
function deactivate_ast_weather() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ast-weather-deactivator.php';
	Ast_Weather_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ast_weather' );
register_deactivation_hook( __FILE__, 'deactivate_ast_weather' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ast-weather.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ast_weather() {

	$plugin = new Ast_Weather();
	$plugin->run();

}
run_ast_weather();



