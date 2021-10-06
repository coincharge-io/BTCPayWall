<?php

/**
 * Plugin Name:       BTCPayWall
 * Plugin URI:        
 * Description:       With help of WordPress BTCPayWall powered by Coincharge plugin you can offer blog posts (pay-per-post), videos (pay-per-view) and download file (pay-per-file), accepting bitcoin payment via Lightning Network.
 * Version:           1.0.0
 * Author:            BTCPayWall by Coincharge https://btcpaywall.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       btc-paywall
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('BTCPAYWALL_VERSION', '1.0.0');
define('BTCPAYWALL_BASE_URL', plugin_dir_url(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-btc-paywall-activator.php
 */
function activate_btc_paywall()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-btc-paywall-activator.php';
	BTCPayWall_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-btc-paywall-deactivator.php
 */
function deactivate_btc_paywall()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-btc-paywall-deactivator.php';
	BTCPayWall_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_btc_paywall');
register_deactivation_hook(__FILE__, 'deactivate_btc_paywall');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-btc-paywall.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_btc_paywall()
{

	$plugin = new BTCPayWall();
	$plugin->run();
}

run_btc_paywall();
