<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * @since 1.0.8
 */

function btcpaywall_gateway_admin_notice()
{
    $class = 'notice notice-warning';
    $gateway = get_option('btcpw_selected_payment_gateway');
    $is_valid_btcpay = !empty(get_option('btcpw_btcpay_store_id')) && $gateway === 'BTCPayServer';
    $is_valid_opennode = !empty(get_option('btcpw_opennode_auth_key')) && $gateway === 'OpenNode';
    $is_valid_coinsnap = !empty(get_option('btcpw_coinsnap_auth_key')) && $gateway === 'Coinsnap';
    $is_valid_lnbits = !empty(get_option('btcpw_lnbits_auth_key')) && $gateway === 'LNBits';
    $configurated_gateway = $is_valid_btcpay == false && $is_valid_opennode == false && $is_valid_coinsnap == false && $is_valid_lnbits == false;


    if (empty($gateway) || true == $configurated_gateway) {
        printf('<div class="%1$s"><h2>%2$s</h2><p>%3$s</p><p>%4$s <a href="%5$s" target=_blank>%5$s</a></p></div>', esc_attr($class), esc_html(__('BTCPayWall', 'btcpaywall')), esc_html(__('You have to configure a payment gateway in order to use the plugin.', 'btcpaywall')), esc_html(__('For further information visit:', 'btcpaywall')), esc_url('https://btcpaywall.com/payment-processing/'));
    }
}
add_action('admin_notices', 'btcpaywall_gateway_admin_notice');
