<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Enqueue
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function btcpaywall_admin_enqueue_styles()
{

    wp_enqueue_style('btcpaywall', BTCPAYWALL_PLUGIN_URL . 'assets/src/css/btc-paywall-admin.css', array(), BTCPAYWALL_VERSION, 'all');

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_style('load-fa', 'https://use.fontawesome.com/releases/v5.12.1/css/all.css');
    if (isset($_GET['page']) && sanitize_text_field($_GET['page']) == 'btcpw_pay_per_post' && isset($_GET['tab']) && sanitize_text_field($_GET['tab']) == 'demo') {
        wp_enqueue_style('btcpaywall' . '_preview', BTCPAYWALL_PLUGIN_URL . 'assets/src/css/btc-paywall-public.css', array(), BTCPAYWALL_VERSION, 'all');
    }
}

add_action('elementor/editor/before_enqueue_styles', 'btcpaywall_admin_enqueue_styles');
add_action('admin_enqueue_scripts',  'btcpaywall_admin_enqueue_styles');
function btcpaywall_enqueue_scripts_admin()
{

    wp_enqueue_script('btcpaywall', BTCPAYWALL_PLUGIN_URL . 'assets/src/js/btc-paywall-admin.js', array('jquery'), BTCPAYWALL_VERSION, false);

    wp_enqueue_script('iris', admin_url('js/iris.min.js'), array('jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch'), false, 1);

    wp_localize_script(
        'btcpaywall',
        'shortcode_ajax_object',
        [
            'ajax_url'  => admin_url('admin-ajax.php'),
            'redirectUrl' => admin_url('admin.php?page=btcpw_edit&action=edit&id='),
            'currency' => get_option('btcpw_general_settings_currency', 'SATS'),
            'btc_format' => get_option('btcpw_general_settings_btc_format', 'SATS'),
            'price' => get_option('btcpw_general_settings_price', 1000),
            'duration'  => get_option('btcpw_general_settings_duration'),
            'duration_type' => get_option('btcpw_general_settings_duration_type', 'unlimited'),
            'security'  => wp_create_nonce('shortcode-security-nonce'),
        ]
    );
    $current_screen = get_current_screen();

    if ($current_screen->post_type === 'btcpw_donation' || $current_screen->post_type === 'digital_download') {
        wp_enqueue_script('btcpaywall_unsaved', BTCPAYWALL_PLUGIN_URL . 'assets/src/js/btc-paywall-warn-unsaved.js', array('jquery'), BTCPAYWALL_VERSION, false);
    }
    if (isset($_GET['page']) && sanitize_text_field($_GET['page']) == 'btcpw_general_settings') {
        wp_enqueue_script('btcpaywall' . '_design_preview', BTCPAYWALL_PLUGIN_URL . 'assets/src/js/btc-paywall-design-preview-admin.js', array('jquery'), BTCPAYWALL_VERSION, false);
        wp_enqueue_script('btcpaywall_unsaved', BTCPAYWALL_PLUGIN_URL . 'assets/src/js/btc-paywall-warn-unsaved.js', array('jquery'), BTCPAYWALL_VERSION, false);
    }
    if (isset($_GET['page']) && sanitize_text_field($_GET['page']) == 'btcpw_form' && isset($_GET['tab']) && sanitize_text_field($_GET['tab']) == 'modules') {
        wp_enqueue_script('btcpaywall' . '_preview', BTCPAYWALL_PLUGIN_URL . 'assets/src/js/btc-paywall-preview-admin.js', array('jquery'), BTCPAYWALL_VERSION, false);
    }

    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
}


add_action('elementor/editor/after_enqueue_scripts', 'btcpaywall_enqueue_scripts_admin');

add_action('admin_enqueue_scripts',  'btcpaywall_enqueue_scripts_admin');
