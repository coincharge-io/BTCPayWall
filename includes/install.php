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
function create_pages()
{
    $checkout_page  = get_option('btcpw_checkout_page') ? get_post(get_option('btcpw_checkout_page')) : false;
    if (empty($checkout_page)) {
        $checkout = wp_insert_post(
            array(
                'post_title'     => __('Checkout', 'btcpaywall'),
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
                'post_title'     => __('Purchase Confirmation', 'btcpaywall'),
                'post_content'   => __('Thank you for your purchase! [btcpaywall_receipt]', 'btcpaywall'),
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
/**
 * @since 1.1.0
 */


function btcpaywall_upgrade_function($upgrader_object, $options)
{

    global $wpdb;
    $current_plugin_path_name = BTCPAYWALL_PLUGIN_FILE;

    if ($options['action'] == 'update' && $options['type'] == 'plugin') {
        foreach ($options['plugins'] as $each_plugin) {
            if ($each_plugin == $current_plugin_path_name && BTCPAYWALL_VERSION == (int)'1.1.0') {
                $old_post_types = array('digital_download' => 'digital_product');
                foreach ($old_post_types as $old_type => $type) {
                    $wpdb->query($wpdb->prepare("UPDATE {$wpdb->posts} SET post_type = REPLACE(post_type, %s, %s) 
                                     WHERE post_type LIKE %s", $old_type, $type, $old_type));
                    $wpdb->query($wpdb->prepare("UPDATE {$wpdb->posts} SET guid = REPLACE(guid, %s, %s) 
                                     WHERE guid LIKE %s", "post_type={$old_type}", "post_type={$type}", "%post_type={$old_type}%"));
                    $wpdb->query($wpdb->prepare("UPDATE {$wpdb->posts} SET guid = REPLACE(guid, %s, %s) 
                                     WHERE guid LIKE %s", "/{$old_type}/", "/{$type}/", "%/{$old_type}/%"));
                }
            }
        }
    }
}
add_action('upgrader_process_complete', 'btcpaywall_upgrade_function', 10, 2);
function btcpaywall_run_install()
{

    create_pages();

    register_tables();
}
register_activation_hook(BTCPAYWALL_PLUGIN_FILE, 'btcpaywall_run_install');

function register_tables()
{

    $tables = [
        'customers_db'     => new BTCPayWall_DB_Customers(),
        'tipping_forms_db' => new BTCPayWall_DB_Tipping_Forms(),
        'tippers_db'        => new BTCPayWall_DB_Tippers(),
        'payments_db'      => new BTCPayWall_DB_Payments(),
        'tippings_db'     => new BTCPayWall_DB_Tippings(),
    ];

    foreach ($tables  as $table) {
        if (!$table->installed()) {
            $table->register_table();
        }
    }
}
