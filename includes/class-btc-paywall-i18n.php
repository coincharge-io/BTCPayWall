<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @email      support@btcpaywall.com
 * @since      1.0.0
 *
 * @package    BTCPayWall
 * @subpackage BTCPayWall/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    BTCPayWall
 * @subpackage BTCPayWall/includes
 * @author     BTCPayWall by Coincharge https://btcpaywall.com
 */
class BTCPayWall_i18n
{


	/**
	 * Load the plugin text domain for translation.
	 *
	 */
	public function load_plugin_textdomain()
	{

		load_plugin_textdomain(
			'btc-paywall',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}
}
