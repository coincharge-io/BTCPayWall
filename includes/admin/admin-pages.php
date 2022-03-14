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
    //add_submenu_page(null, 'Edit shortcode', 'Edit shortcode', 'manage_options', 'btcpw_edit', 'btcpaywall_render_edit_page');
    add_submenu_page('btcpw_general_settings', __('All Digital Products', 'btcpaywall'), __('All Digital Products', 'btcpaywall'), 'manage_options', 'edit.php?post_type=digital_download');
    add_submenu_page('btcpw_general_settings', __('Add Digital Product', 'btcpaywall'), __('Add Digital Product', 'btcpaywall'), 'manage_options', 'post-new.php?post_type=digital_download');
    add_submenu_page('btcpw_general_settings', __('Donations', 'btcpaywall'), __('Donations', 'btcpaywall'), 'manage_options', 'btcpw_donation_page', 'btcpaywall_render_donations_page');

    // add_submenu_page('btcpw_general_settings', __('All Donations', 'btcpaywall'), __('All Donations', 'btcpaywall'), 'manage_options', 'edit.php?post_type=btcpw_donation');
    // add_submenu_page('btcpw_general_settings', __('Add Donation', 'btcpaywall'), __('Add Donation', 'btcpaywall'), 'manage_options', 'post-new.php?post_type=btcpw_donation');
}
add_action('admin_menu', 'btcpaywall_add_menu_pages');
