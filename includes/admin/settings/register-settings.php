<?php
if (!defined('ABSPATH')) exit;

function register_settings()
{

    register_setting('btcpw_general_settings', 'btcpw_btcpay_server_url', array('type' => 'string', 'sanitize_callback' => 'sanitize_btcpay_server_url'));
    register_setting('btcpw_general_settings', 'btcpw_btcpay_auth_key_view', array('type' => 'string', 'sanitize_callback' => 'sanitize_btcpay_auth_key'));
    register_setting('btcpw_general_settings', 'btcpw_btcpay_auth_key_create', array('type' => 'string', 'sanitize_callback' => 'sanitize_btcpay_auth_key'));

    register_setting('btcpw_general_options', 'btcpw_default_currency', array('type' => 'string', 'default' => 'SATS', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_general_options', 'btcpw_default_btc_format', array('type' => 'string', 'default' => 'SATS', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_general_options', 'btcpw_default_price', array('type' => 'number', 'default' => 1000, 'sanitize_callback' => 'sanitize_number'));
    register_setting('btcpw_general_options', 'btcpw_default_duration', array('type' => 'integer', 'default' => '', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_general_options', 'btcpw_default_duration_type', array('type' => 'string', 'default' => 'unlimited', 'sanitize_callback' => 'sanitize_text'));

    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_background', array('type' => 'string', 'default' => '#ECF0F1', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_header_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_info_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_button_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_button_text_color', array('type' => 'string', 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_show_help_link', array('type' => 'boolean', 'default' => true, 'sanitize_callback' => 'sanitize_boolean'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_help_link', array('type' => 'string', 'default' => 'https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_help_link_text', array('type' => 'string', 'default' => 'Help', 'sanitize_callback' => 'sanitize_text'));

    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_show_additional_help_link', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'sanitize_boolean'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_additional_help_link', array('type' => 'string', 'default' => '', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_additional_help_link_text', array('type' => 'string', 'default' => '', 'sanitize_callback' => 'sanitize_text'));


    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_title', array('type' => 'string', 'default' => 'Pay now to unlock blogpost', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_info', array('type' => 'string', 'default' => 'For [price] [currency] you will have access to the post for [duration] [dtype]', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_button', array('type' => 'string', 'default' => 'Pay', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_width', array('type' => 'string', 'default' => '300', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_post_paywall_options', 'btcpw_pay_per_post_height', array('type' => 'string', 'default' => '300', 'sanitize_callback' => 'sanitize_text'));



    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_preview_title_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_preview_description_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_background', array('type' => 'string', 'default' => '#ECF0F1', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_header_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_info_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_button_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_button_text_color', array('type' => 'string', 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_show_help_link', array('type' => 'boolean', 'default' => true, 'sanitize_callback' => 'sanitize_boolean'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_help_link', array('type' => 'string', 'default' => 'https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_help_link_text', array('type' => 'string', 'default' => 'Help', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_title', array('type' => 'string', 'default' => 'Pay now to watch the whole video', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_info', array('type' => 'string', 'default' => 'For [price] [currency] you will have access to the video for [duration] [dtype]', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_button', array('type' => 'string', 'default' => 'Pay', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_show_additional_help_link', array('type' => 'boolean', 'default' => false, 'sanitize_callback' => 'sanitize_boolean'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_additional_help_link', array('type' => 'string', 'default' => '', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_additional_help_link_text', array('type' => 'string', 'default' => '', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_width', array('type' => 'string', 'default' => '350', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_view_paywall_options', 'btcpw_pay_per_view_height', array('type' => 'string', 'default' => '550', 'sanitize_callback' => 'sanitize_text'));


    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_preview_title_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_preview_description_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_background', array('type' => 'string', 'default' => '#ECF0F1', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_header_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_info_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_button_color', array('type' => 'string', 'default' => '#000000', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_button_text_color', array('type' => 'string', 'default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_color'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_show_help_link', array('type' => 'boolean', 'default' => true, 'sanitize_callback' => 'sanitize_boolean'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_help_link', array('type' => 'string', 'default' => 'https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_help_link_text', array('type' => 'string', 'default' => 'Help', 'sanitize_callback' => 'sanitize_text'));

    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_title', array('type' => 'string', 'default' => 'Pay now to download the software', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_info', array('type' => 'string', 'default' => 'For [price] [currency] you will have access to the software for [duration] [dtype]', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_button', array('type' => 'string', 'default' => 'Pay', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_width', array('type' => 'string', 'default' => '350', 'sanitize_callback' => 'sanitize_text'));
    register_setting('btcpw_pay_per_file_paywall_options', 'btcpw_pay_per_file_height', array('type' => 'string', 'default' => '550', 'sanitize_callback' => 'sanitize_text'));
}




add_action('admin_init', 'register_settings');
