<?php

/**
 * Digital Download
 *
 * @package    BTCPayWall
 * @subpackage Admin/Settings
 * @copyright  Copyright (c) 2021, Coincharge
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since      1.0
 */
if (!defined('ABSPATH')) {
    exit;
}

function btcpaywall_register_settings()
{
    register_setting('btcpw_general_payment_gateway_options', 'btcpw_selected_payment_gateway', array('type' => 'string'));

    register_setting('btcpw_btcpay_server_settings', 'btcpw_btcpay_server_url', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_btcpay_server_url'));
    register_setting('btcpw_btcpay_server_settings', 'btcpw_btcpay_auth_key_view', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_btcpay_auth_key'));
    register_setting('btcpw_btcpay_server_settings', 'btcpw_btcpay_auth_key_create', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_btcpay_auth_key'));


    register_setting('btcpw_opennode_settings', 'btcpw_opennode_auth_key', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_opennode_auth_key'));


    register_setting('btcpw_coinsnap_settings', 'btcpw_coinsnap_auth_key', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_coinsnap_auth_key'));
    register_setting('btcpw_coinsnap_settings', 'btcpw_coinsnap_store_id', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_coinsnap_auth_key'));


    register_setting('btcpw_lnbits_settings', 'btcpw_lnbits_server_url', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_btcpay_server_url'));
    register_setting('btcpw_lnbits_settings', 'btcpw_lnbits_auth_key', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_lnbits_auth_key'));


    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_currency', array('type' => 'string', 'default' => 'SATS', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_pay_per_file_button', array('type' => 'string', 'default' => 'Pay', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_pay_per_file_button_color', array('type' => 'string', 'default' => '#f6b330', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_pay_per_file_button_text_color', array('type' => 'string', 'default' => '#FFFFFF', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_download_limit', array('type' => 'number', 'sanitize_callback' => 'btcpaywall_sanitize_number'));

    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_display_name', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_display_email', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_display_address', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_display_phone', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_display_message', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_mandatory_name', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_mandatory_email', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_mandatory_address', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_mandatory_phone', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_mandatory_message', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));

    register_setting('btcpw_misc_options', 'btcpw_remove_data_on_uninstall', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));

    register_setting('btcpw_misc_options', 'btcpw_invoices_email', array('type' => 'string', 'default' => '', 'sanitize_callback' => 'btcpaywall_sanitize_email'));
}



add_action('admin_init', 'btcpaywall_register_settings');
