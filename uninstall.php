<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Uninstall
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.1.0
 */

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit;
}

// Load BTCPayWall file.
include_once('btcpaywall.php');

global $wpdb;

if (get_option('btcpw_remove_data_on_uninstall')) {
	$btcpaywall_post_types = array('btcpw_order', 'digital_download');
	foreach ($btcpaywall_post_types as $post_type) {

		$posts = get_posts(array('post_type' => $btcpaywall_post_types, 'post_status' => 'any', 'numberposts' => -1, 'fields' => 'ids'));

		if ($posts) {
			foreach ($posts as $post) {
				wp_delete_post($post, true);
			}
		}
	}
	// Clean meta values
	$deletable = array(
		'btcpw_currency', 'btcpw_btc_format', 'btcpw_price', 'btcpw_duration', 'btcpw_duration_type',
		'btcpw_digital_product_id', 'btcpw_digital_product_file', 'btcpw_digital_product_filename',
		'btcpw_product_sales', 'btcpw_product_limit', 'btcpw_product_image_id', 'btcpw_product_description', 'btcpw_status', 'btcpw_post_id', 'btcpw_from_ip', 'btcpw_secret'
	);
	foreach ($deleteable as $to_delete) {
		delete_metadata('post', 0, $to_delete, false, true);
	}

	foreach (wp_load_alloptions() as $option => $value) {

		if (strpos($option, 'btcpw_') !== false) {

			delete_option($option);
		}
	}
	$btcpaywall_created_pages = array('btcpw_purchase_page', 'btcpw_success_page');
	foreach ($btcpaywall_created_pages as $page) {
		$get_page = get_option($page, false);
		if ($get_page) {
			wp_delete_post($get_page, true);
		}
	}
	// Get table name
	$payments_table_name = $wpdb->prefix . "btcpaywall_payments";
	$forms_table_name = $wpdb->prefix . "btcpaywall_forms";
	$tippings_table_name = $wpdb->prefix . "btcpaywall_tippings";
	$tippers_table_name = $wpdb->prefix . "btcpaywall_tippers";
	$customers_table_name = $wpdb->prefix . "btcpaywall_customers";

	// Remove all database tables
	$wpdb->query("DROP TABLE IF EXISTS " . $payments_table_name);
	$wpdb->query("DROP TABLE IF EXISTS " . $forms_table_name);
	$wpdb->query("DROP TABLE IF EXISTS " . $tippings_table_name);
	$wpdb->query("DROP TABLE IF EXISTS " . $tippers_table_name);
	$wpdb->query("DROP TABLE IF EXISTS " . $customers_table_name);

	// Clear DB version
	delete_option($payments_table_name . '_db_version');
	delete_option($forms_table_name . '_db_version');
	delete_option($tippings_table_name . '_db_version');
	delete_option($tippers_table_name . '_db_version');
	delete_option($customers_table_name . '_db_version');
}
