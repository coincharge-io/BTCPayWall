<?php

if (!defined('ABSPATH')) {
    exit;
}

function btcpaywall_add_menu_pages()
{

    add_menu_page('BTCPayWall', 'BTCPayWall', 'manage_options', 'btcpw_general_settings', '', 'dashicons-tagcloud');
    add_submenu_page('btcpw_general_settings', 'Settings', 'Settings', 'manage_options', 'btcpw_general_settings', 'render_general_settings_page');
    add_submenu_page('btcpw_general_settings', 'Payments', 'Payments', 'manage_options', 'btcpw_payments', 'btcpaywall_render_payments_page');
    add_submenu_page(null, 'Edit shortcode', 'Edit shortcode', 'manage_options', 'btcpw_edit', 'render_edit_page');
}
add_action('admin_menu', 'btcpaywall_add_menu_pages');
