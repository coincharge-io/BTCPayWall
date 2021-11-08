<?php

if (!defined('ABSPATH')) {
    exit;
}

function add_menu_pages()
{

    add_menu_page('BTCPayWall', 'BTCPayWall', 'manage_options', 'btcpw_general_settings', '', 'dashicons-tagcloud');
    add_submenu_page('btcpw_general_settings', 'Settings', 'Settings', 'manage_options', 'btcpw_general_settings', 'render_general_settings_page');
    add_submenu_page('btcpw_general_settings', 'Payments', 'Payments', 'manage_options', 'btcpw_payments', 'render_payments_page');
    add_submenu_page('btcpw_general_settings', 'All forms', 'All forms', 'manage_options', 'btcpw_forms', 'render_tipping_list');
    add_submenu_page('btcpw_general_settings', 'Add form', 'Add form', 'manage_options', 'btcpw_form', 'render_new_form');
    add_submenu_page(null, 'Edit shortcode', 'Edit shortcode', 'manage_options', 'btcpw_edit', 'render_edit_page');

    add_submenu_page('btcpw_general_settings', 'Add product', 'Add product', 'manage_options', 'post-new.php?post_type=btcpw_product');
}
add_action('admin_menu', 'add_menu_pages');
