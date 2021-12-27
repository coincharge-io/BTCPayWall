<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Settings
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
if (!defined('ABSPATH')) exit;

function btcpaywall_register_settings()
{
    register_setting('btcpw_general_payment_gateway_options', 'btcpw_selected_payment_gateway', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_text'));

    register_setting('btcpw_btcpay_server_settings', 'btcpw_btcpay_server_url', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_btcpay_server_url'));
    register_setting('btcpw_btcpay_server_settings', 'btcpw_btcpay_auth_key_view', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_btcpay_auth_key'));
    register_setting('btcpw_btcpay_server_settings', 'btcpw_btcpay_auth_key_create', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_btcpay_auth_key'));


    register_setting('btcpw_opennode_settings', 'btcpw_opennode_auth_key', array('type' => 'string', 'sanitize_callback' => 'btcpaywall_sanitize_btcpay_auth_key'));

    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_currency', array('type' => 'string', 'default' => 'SATS', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_btc_format', array('type' => 'string', 'default' => 'SATS', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_price', array('type' => 'number', 'default' => 1000, 'sanitize_callback' => 'btcpaywall_sanitize_number'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_duration', array('type' => 'integer', 'default' => '', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_duration_type', array('type' => 'string', 'default' => 'unlimited', 'sanitize_callback' => 'btcpaywall_sanitize_text'));


    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_display_name', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_display_email', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_display_address', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_display_phone', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_display_message', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_mandatory_name', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_mandatory_email', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_mandatory_address', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_mandatory_phone', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_default_pay_per_post_mandatory_message', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));

    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_currency', array('type' => 'string', 'default' => 'SATS', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_btc_format', array('type' => 'string', 'default' => 'SATS', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_price', array('type' => 'number', 'default' => 1000, 'sanitize_callback' => 'btcpaywall_sanitize_number'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_duration', array('type' => 'integer', 'default' => '', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_duration_type', array('type' => 'string', 'default' => 'unlimited', 'sanitize_callback' => 'btcpaywall_sanitize_text'));


    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_display_name', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_display_email', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_display_address', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_display_phone', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_display_message', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_mandatory_name', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_mandatory_email', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_mandatory_address', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_mandatory_phone', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_default_pay_per_view_mandatory_message', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));

    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_background', array('type' => 'string', 'default' => '#ECF0F1', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_header_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_info_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_button_color', array('type' => 'string', 'default' => '#f6b330', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_button_text_color', array('type' => 'string', 'default' => '#FFFFFF', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_show_help_link', array('type' => 'boolean', 'default' => true, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_help_link', array('type' => 'string', 'default' => 'https://btcpaywall.com/how-to-pay-at-the-bitcoin-paywall/', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_help_link_text', array('type' => 'string', 'default' => 'Help', 'sanitize_callback' => 'btcpaywall_sanitize_text'));

    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_show_additional_help_link', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_additional_help_link', array('type' => 'string', 'default' => '', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_additional_help_link_text', array('type' => 'string', 'default' => '', 'sanitize_callback' => 'btcpaywall_sanitize_text'));


    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_title', array('type' => 'string', 'default' => 'Pay now to unlock blogpost', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_info', array('type' => 'string', 'default' => 'For [price] [currency] you will have access to the post for [duration] [dtype]', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_button', array('type' => 'string', 'default' => 'Pay', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_width', array('type' => 'string', 'default' => '400', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_post_options', 'btcpw_pay_per_post_height', array('type' => 'string', 'default' => '600', 'sanitize_callback' => 'btcpaywall_sanitize_text'));



    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_preview_title_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_preview_description_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_background', array('type' => 'string', 'default' => '#ECF0F1', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_header_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_info_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_button_color', array('type' => 'string', 'default' => '#f6b330', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_button_text_color', array('type' => 'string', 'default' => '#FFFFFF', 'sanitize_callback' => 'btcpaywall_sanitize_color'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_show_help_link', array('type' => 'boolean', 'default' => true, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_help_link', array('type' => 'string', 'default' => 'https://btcpaywall.com/how-to-pay-at-the-bitcoin-paywall/', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_help_link_text', array('type' => 'string', 'default' => 'Help', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_title', array('type' => 'string', 'default' => 'Pay now to watch the whole video', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_info', array('type' => 'string', 'default' => 'For [price] [currency] you will have access to the video for [duration] [dtype]', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_button', array('type' => 'string', 'default' => 'Pay', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_show_additional_help_link', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'btcpaywall_sanitize_boolean'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_additional_help_link', array('type' => 'string', 'default' => '', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_additional_help_link_text', array('type' => 'string', 'default' => '', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_width', array('type' => 'string', 'default' => '450', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
    register_setting('btcpw_general_pay_per_view_options', 'btcpw_pay_per_view_height', array('type' => 'string', 'default' => '750', 'sanitize_callback' => 'btcpaywall_sanitize_text'));



    register_setting('btcpw_general_pay_per_file_options', 'btcpw_default_pay_per_file_currency', array('type' => 'string', 'default' => 'SATS', 'sanitize_callback' => 'btcpaywall_sanitize_text'));
}



add_action('admin_init', 'btcpaywall_register_settings');
