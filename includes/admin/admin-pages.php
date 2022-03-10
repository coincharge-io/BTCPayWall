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

    add_menu_page('BTCPayWall', 'BTCPayWall', 'manage_options', 'btcpw_general_settings', '', 'dashicons-tagcloud');
    add_submenu_page('btcpw_general_settings', 'Settings', 'Settings', 'manage_options', 'btcpw_general_settings', 'btcpaywall_render_general_settings_page');
    add_submenu_page('btcpw_general_settings', 'Payments', 'Payments', 'manage_options', 'btcpw_payments', 'btcpaywall_render_payments_page');
    add_submenu_page(null, 'Edit shortcode', 'Edit shortcode', 'manage_options', 'btcpw_edit', 'btcpaywall_render_edit_page');
    add_submenu_page('btcpw_general_settings', 'All Digital Products', 'All Digital Products', 'manage_options', 'edit.php?post_type=digital_download');
    add_submenu_page('btcpw_general_settings', 'Add Digital Product', 'Add Digital Product', 'manage_options', 'post-new.php?post_type=digital_download');
    add_submenu_page('btcpw_general_settings', 'All Forms', 'All Forms', 'manage_options', 'edit.php?post_type=tipping');
    add_submenu_page('btcpw_general_settings', 'Add Form', 'Add Form', 'manage_options', 'post-new.php?post_type=tipping');
}
add_action('admin_menu', 'btcpaywall_add_menu_pages');
