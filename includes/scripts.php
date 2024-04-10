<?php

/**
 * Digital Download
 *
 * @package    BTCPayWall
 * @subpackage Functions/Enqueue
 * @copyright  Copyright (c) 2021, Coincharge
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since      1.0
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


function btcpaywall_enqueue_styles()
{
    wp_enqueue_style('btcpaywall', BTCPAYWALL_PLUGIN_URL . 'assets/src/css/btc-paywall-public.css', array(), null, 'all');
    //Use minified file
    //wp_enqueue_style('btcpaywall', BTCPAYWALL_PLUGIN_URL . 'assets/dist/css/BTCPayWall.css', array(), null, 'all');

    wp_enqueue_style('load-fa', 'https://use.fontawesome.com/releases/v5.12.1/css/all.css');
}
add_action('wp_enqueue_scripts', 'btcpaywall_enqueue_styles');
add_action('enqueue_block_assets', 'btcpaywall_enqueue_styles');

/**
 * Register the JavaScript for the -facing side of the site.
 */
function btcpaywall_enqueue_scripts()
{
    $gateway = get_option('btcpw_selected_payment_gateway');
    $script = '';
    $url = (get_option('btcpw_selected_payment_gateway', 'BTCPayServer') == 'BTCPayServer') ? get_option('btcpw_btcpay_server_url', '') . '/modal/btcpay.js' : 'https://stores.coinsnap.io/modal/btcpay.js';
    if ($gateway === 'LNBits') {
        $script = (BTCPAYWALL_PLUGIN_URL . 'assets/dist/js/lnbits.js');
        wp_enqueue_script('btcpaywall-qr-code', BTCPAYWALL_PLUGIN_URL . 'assets/src/js/qrcode-min.js', array('jquery'), null, false);
    } elseif ($gateway === 'OpenNode') {
        $script = (BTCPAYWALL_PLUGIN_URL . 'assets/dist/js/opennode.js');
    } elseif ($gateway === 'BTCPayServer') {
        $script = (BTCPAYWALL_PLUGIN_URL . 'assets/dist/js/btcpayserver.js');
    } elseif ($gateway === 'Coinsnap') {
        $script = (BTCPAYWALL_PLUGIN_URL . 'assets/dist/js/coinsnap.js');
    }
    if ($gateway === 'Coinsnap' || $gateway === 'BTCPayServer') {
        wp_enqueue_script('btcpay', $url, array(), null, true);
    }
    //$script = (get_option('btcpw_selected_payment_gateway', 'BTCPayServer') == 'BTCPayServer' || get_option('btcpw_selected_payment_gateway', 'BTCPayServer') == 'CoinchargePay') ? (BTCPAYWALL_PLUGIN_URL . 'assets/dist/js/btcpayserver.js') : (BTCPAYWALL_PLUGIN_URL . 'assets/dist/js/opennode.js');

    //wp_enqueue_script('btcpaywall', BTCPAYWALL_PLUGIN_URL . 'assets/src/js/btc-paywall-public.js', array('jquery'), null, false);
    wp_enqueue_script('btcpaywall', BTCPAYWALL_PLUGIN_URL . 'assets/dist/js/btc_paywall_public.js', array('jquery'), null, false);


    wp_enqueue_script('btcpaywall_gateway', $script, array('jquery'), null, true);

    wp_enqueue_script('jquery-ui-dialog');



    wp_localize_script(
        'btcpaywall_gateway',
        'payment',
        [
            'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer'),
            'success_url' => get_permalink(get_option('btcpw_success_page')),
            'post_id' => get_the_ID()
        ]
    );
}
add_action('wp_enqueue_scripts', 'btcpaywall_enqueue_scripts');
