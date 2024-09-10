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
    add_menu_page('BTCPayWall', esc_html__('BTCPayWall', 'btcpaywall'), 'manage_options', 'btcpw_general_settings', '', 'dashicons-tagcloud');
    add_submenu_page('btcpw_general_settings', esc_html__('Settings', 'btcpaywall'), esc_html__('Settings', 'btcpaywall'), 'manage_options', 'btcpw_general_settings', 'btcpaywall_render_general_settings_page');
    add_submenu_page('btcpw_general_settings', esc_html__('Payments', 'btcpaywall'), esc_html__('Payments', 'btcpaywall'), 'manage_options', 'btcpw_payments', 'btcpaywall_render_payments_page');
    add_submenu_page('btcpw_general_settings', esc_html__('Pay-per -> Add template', 'btcpaywall'), esc_html__('Pay-per -> Add template', 'btcpaywall'), 'manage_options', 'btcpw_pay_per_shortcode_generator', 'btcpaywall_render_pay_per_shortcode_generator');
    add_submenu_page(null, esc_html__('Pay-per-shortcode', 'btcpaywall'), esc_html__('Pay-per-shortcode', 'btcpaywall'), 'manage_options', 'btcpw_pay_per_shortcode', 'btcpaywall_render_pay_per_manage_shortcode_page');

    add_submenu_page('btcpw_general_settings', esc_html__('Download -> Settings', 'btcpaywall'), esc_html__('Download Store', 'btcpaywall'), 'manage_options', 'btcpw_download_store', 'btcpaywall_render_download_store_page');
    add_submenu_page('btcpw_general_settings', esc_html__('Download -> All Products', 'btcpaywall'), esc_html__('Download Store -> All Products', 'btcpaywall'), 'manage_options', 'edit.php?post_type=btcpaywall_digital_download');
    add_submenu_page('btcpw_general_settings', esc_html__('Download -> Add Product', 'btcpaywall'), esc_html__('Download Store -> Add Product', 'btcpaywall'), 'manage_options', 'post-new.php?post_type=btcpaywall_digital_download');
    add_submenu_page('btcpw_general_settings', esc_html__('Donation -> All Forms', 'btcpaywall'), esc_html__('Donation -> All Forms', 'btcpaywall'), 'manage_options', 'edit.php?post_type=btcpw_donation');
    add_submenu_page('btcpw_general_settings', esc_html__('Donation -> Add Form', 'btcpaywall'), esc_html__('Donation -> Add Form', 'btcpaywall'), 'manage_options', 'post-new.php?post_type=btcpw_donation');
}
add_action('admin_menu', 'btcpaywall_add_menu_pages');
