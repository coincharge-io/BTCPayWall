<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Uninstall
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0.2
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
		'btcpw_product_sales', 'btcpw_product_limit', 'btcpw_product_image_id', 'btcpw_product_description', 'btcpw_status', 'btcpw_post_id', 'btcpw_from_ip', 'btcpw_secret', 'btcpw_btcpay_store_id', "btcpaywall_tipping_text_template_name",
		"btcpaywall_tipping_text_dimension", "btcpaywall_tipping_text_background", "btcpaywall_tipping_color_background", "btcpaywall_tipping_color_header_footer_background", "btcpaywall_tipping_text_logo", "btcpaywall_tipping_text_title", "btcpaywall_tipping_color_title", "btcpaywall_tipping_text_description",
		"btcpaywall_tipping_color_description",
		"btcpaywall_tipping_text_progress_bar_step1",
		"btcpaywall_tipping_text_progress_bar_step2",
		"btcpaywall_tipping_color_progress_bar_step1",
		"btcpaywall_tipping_color_progress_bar_step2",
		"btcpaywall_tipping_text_main",
		"btcpaywall_tipping_color_main",
		"btcpaywall_tipping_color_amounts",
		"btcpaywall_tipping_text_button",
		"btcpaywall_tipping_color_button_text",
		"btcpaywall_tipping_color_button",
		"btcpaywall_tipping_text_currency",
		"btcpaywall_tipping_bool_free_input",
		"btcpaywall_tipping_text_thankyou",
		"btcpaywall_tipping_bool_show_icons",
		"btcpaywall_tipping_bool_show_default_amount_1",
		"btcpaywall_tipping_number_default_amount_1",
		"btcpaywall_tipping_text_default_currency_1",
		"btcpaywall_tipping_text_default_icon_1",
		"btcpaywall_tipping_bool_show_default_amount_2",
		"btcpaywall_tipping_number_default_amount_2",
		"btcpaywall_tipping_text_default_currency_2",
		"btcpaywall_tipping_text_default_icon_2",
		"btcpaywall_tipping_bool_show_default_amount_3",
		"btcpaywall_tipping_number_default_amount_3",
		"btcpaywall_tipping_text_default_currency_3",
		"btcpaywall_tipping_text_default_icon_3",
		"btcpaywall_tipping_bool_display_name",
		"btcpaywall_tipping_bool_mandatory_name",
		"btcpaywall_tipping_bool_display_email",
		"btcpaywall_tipping_bool_mandatory_email",
		"btcpaywall_tipping_bool_display_address",
		"btcpaywall_tipping_bool_mandatory_address",
		"btcpaywall_tipping_bool_display_phone",
		"btcpaywall_tipping_bool_mandatory_phone",
		"btcpaywall_tipping_bool_display_message",
		"btcpaywall_tipping_bool_mandatory_message"
	);
	foreach ($deleteable as $to_delete) {
		delete_metadata('post', 0, $to_delete, false, true);
	}

	foreach (wp_load_alloptions() as $option => $value) {

		if (strpos($option, 'btcp') !== false) {

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
	$pay_per_shortcodes_table_name = $wpdb->prefix . "btcpaywall_pay_per_shortcodes";

	// Remove all database tables
	$wpdb->query("DROP TABLE IF EXISTS " . $payments_table_name);
	$wpdb->query("DROP TABLE IF EXISTS " . $forms_table_name);
	$wpdb->query("DROP TABLE IF EXISTS " . $tippings_table_name);
	$wpdb->query("DROP TABLE IF EXISTS " . $tippers_table_name);
	$wpdb->query("DROP TABLE IF EXISTS " . $customers_table_name);
	$wpdb->query("DROP TABLE IF EXISTS " . $pay_per_shortcodes_table_name);

	// Clear DB version
	delete_option($payments_table_name . '_db_version');
	delete_option($forms_table_name . '_db_version');
	delete_option($tippings_table_name . '_db_version');
	delete_option($tippers_table_name . '_db_version');
	delete_option($customers_table_name . '_db_version');
	delete_option($pay_per_shortcodes_table_name . '_db_version');
}
