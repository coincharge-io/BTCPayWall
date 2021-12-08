<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


function enqueue_styles()
{

    wp_enqueue_style('btcpaywall', BTCPAYWALL_PLUGIN_URL . 'assets/src/css/btc-paywall-public.css', array(), null, 'all');

    wp_enqueue_style('load-fa', 'https://use.fontawesome.com/releases/v5.12.1/css/all.css');
}
add_action('wp_enqueue_scripts',  'enqueue_styles');

/**
 * Register the JavaScript for the -facing side of the site.
 *
 */
function enqueue_scripts()
{
    wp_enqueue_script('btcpaywall', BTCPAYWALL_PLUGIN_URL . 'assets/src/js/btc-paywall-public.js', array('jquery'), null, false);

    wp_enqueue_script('btcpay', get_option('btcpw_btcpay_server_url', '') . '/modal/btcpay.js', array(), null, true);


    wp_localize_script(
        'btcpaywall',
        'payment_gateways',
        [
            'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer')
        ]
    );
}
add_action('wp_enqueue_scripts',  'enqueue_scripts');
