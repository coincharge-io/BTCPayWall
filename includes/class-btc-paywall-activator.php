<?php

/**
 * Fired during plugin activation
 *
 * @email      support@btcpaywall.com
 * @since      1.0.0
 *
 * @package    BTCPayWall
 * @subpackage BTCPayWall/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    BTCPayWall
 * @subpackage BTCPayWall/includes
 * @author     BTCPayWall by Coincharge https://btcpaywall.com
 */
class BTCPayWall_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 */
	public static function activate()
	{
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		$wp_table_forms = $wpdb->prefix . "btc_forms";
		$sql = "CREATE TABLE IF NOT EXISTS {$wp_table_forms}(
			  id mediumint(9) NOT NULL AUTO_INCREMENT,
			  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			  name tinytext NOT NULL,
			  form_name tinytext NOT NULL,
			  dimension char(7) NOT NULL,
			  redirect varchar(55),
			  title_text text,
			  description_text text,
			  button_text text,
			  tipping_text text,
			  title_text_color char(6),
			  description_text_color char(6),
			  button_text_color char(6),
			  button_color char(6),
			  tipping_text_color char(6),
			  background_color char(6),
			  input_background char(6),
			  hf_background char(6),
			  active_color char(6),
			  inactive_color char(6),
			  logo mediumint(9),
			  background mediumint(9),
			  collect_name boolean,
			  mandatory_name boolean,
			  collect_email boolean,
			  mandatory_email boolean,
			  collect_address boolean,
			  mandatory_address boolean,
			  collect_phone boolean,
			  mandatory_phone boolean,
			  collect_message boolean,
			  mandatory_message boolean,
			  value1_enabled boolean,
			  value1_currency char(4),
			  value1_amount decimal(16,8),
			  value1_icon varchar(100),
			  value2_enabled boolean,
			  value2_currency char(4),
			  value2_amount decimal(16,8),
			  value2_icon varchar(100),
			  value3_enabled boolean,
			  value3_currency char(4),
			  value3_amount decimal(16,8),
			  value3_icon varchar(100),
			  step1 tinytext,
			  step2 tinytext,
			  free_input boolean,
			  show_icon boolean,
			  currency char(4),
			  PRIMARY KEY  (id)) $charset_collate;";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
}
/*
*/