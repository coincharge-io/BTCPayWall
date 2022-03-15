<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Pages
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
if (!defined('ABSPATH')) {
    exit;
}

function btcpaywall_add_menu_pages()
{

    add_menu_page('BTCPayWall', __('BTCPayWall', 'btcpaywall'), 'manage_options', 'btcpw_general_settings', '', 'dashicons-tagcloud');
    add_submenu_page('btcpw_general_settings', __('Settings', 'btcpaywall'), __('Settings', 'btcpaywall'), 'manage_options', 'btcpw_general_settings', 'btcpaywall_render_general_settings_page');
    add_submenu_page('btcpw_general_settings', __('Payments', 'btcpaywall'), __('Payments', 'btcpaywall'), 'manage_options', 'btcpw_payments', 'btcpaywall_render_payments_page');
    add_submenu_page('btcpw_general_settings', __('Pay-per-Post', 'btcpaywall'), __('Pay-per-Post', 'btcpaywall'), 'manage_options', 'btcpw_pay_per_post', 'btcpaywall_render_pay_per_post');
    add_submenu_page('btcpw_general_settings', __('Pay-per-View', 'btcpaywall'), __('Pay-per-View', 'btcpaywall'), 'manage_options', 'btcpw_pay_per_view', 'btcpaywall_render_pay_per_view');
    add_submenu_page('btcpw_general_settings', __('Download Store -> Settings', 'btcpaywall'), __('Download Store', 'btcpaywall'), 'manage_options', 'btcpw_download_store', 'btcpaywall_render_download_store_page');
    add_submenu_page('btcpw_general_settings', __('Download Store -> All Products', 'btcpaywall'), __('Download Store -> All Products', 'btcpaywall'), 'manage_options', 'edit.php?post_type=digital_download');
    add_submenu_page('btcpw_general_settings', __('Download Store -> Add Product', 'btcpaywall'), __('Download Store -> Add Product', 'btcpaywall'), 'manage_options', 'post-new.php?post_type=digital_download');
    add_submenu_page('btcpw_general_settings', __('Donation -> All Forms', 'btcpaywall'), __('Donation -> All Forms', 'btcpaywall'), 'manage_options', 'edit.php?post_type=btcpw_donation');
    add_submenu_page('btcpw_general_settings', __('Donation -> Add Form', 'btcpaywall'), __('Donation -> Add Form', 'btcpaywall'), 'manage_options', 'post-new.php?post_type=btcpw_donation');
}
add_action('admin_menu', 'btcpaywall_add_menu_pages');
