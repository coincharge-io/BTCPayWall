<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions/Install
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

if (!defined('ABSPATH')) {
    exit;
}
function btcpaywall_create_pages()
{
    $checkout_page  = get_option('btcpw_checkout_page') ? get_post(get_option('btcpw_checkout_page')) : false;
    if (empty($checkout_page)) {
        $checkout = wp_insert_post(
            array(
                'post_title'     => esc_html__('Checkout', 'btcpaywall'),
                'post_content'   => '[btcpaywall_checkout]',
                'post_status'    => 'publish',
                'post_author'    => 1,
                'post_type'      => 'page',
                'comment_status' => 'closed'
            )
        );
        update_option('btcpw_checkout_page', $checkout);
    }

    $success_page = get_option('btcpw_success_page') ? get_post(get_option('btcpw_success_page')) : false;
    if (empty($success_page)) {
        $success = wp_insert_post(
            array(
                'post_title'     => esc_html__('Purchase Confirmation', 'btcpaywall'),
                'post_content'   => esc_html__('[btcpaywall_receipt]', 'btcpaywall'),
                'post_status'    => 'publish',
                'post_author'    => 1,
                'post_parent'    => $checkout,
                'post_type'      => 'page',
                'comment_status' => 'closed'
            )
        );
        update_option('btcpw_success_page', $success);
    }
}


function btcpaywall_run_install()
{

    btcpaywall_create_pages();

    btcpaywall_register_tables();
}
register_activation_hook(BTCPAYWALL_PLUGIN_FILE, 'btcpaywall_run_install');

function btcpaywall_register_tables()
{

    $tables = [
        'customers_db'     => new BTCPayWall_DB_Customers(),
        'tipping_forms_db' => new BTCPayWall_DB_Tipping_Forms(),
        'tippers_db'        => new BTCPayWall_DB_Tippers(),
        'payments_db'      => new BTCPayWall_DB_Payments(),
        'tippings_db'     => new BTCPayWall_DB_Tippings(),
        'pay_per_shortcodes_db' => new BTCPayWall_DB_Pay_Per_Shortcode(),

    ];

    foreach ($tables as $table) {
        if (!$table->installed()) {
            $table->register_table();
        }
    }
}
