<?php
function enqueue_styles()
{

    wp_enqueue_style('btcpaywall', plugin_dir_url(__FILE__) . 'css/btc-paywall-admin.css', array(), BTCPAYWALL_VERSION, 'all');

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_style('load-fa', 'https://use.fontawesome.com/releases/v5.12.1/css/all.css');
    if (isset($_GET['page']) && $_GET['page'] == 'btcpw_form') {
        wp_enqueue_style('btcpaywall' . '_preview', plugin_dir_url(__FILE__) . 'css/btc-paywall-preview-admin.css', array(), BTCPAYWALL_VERSION, 'all');
    }
}

add_action('elementor/editor/before_enqueue_styles', 'enqueue_styles');
add_action('admin_enqueue_scripts',  'enqueue_styles');
function enqueue_scripts()
{

    wp_enqueue_script('btcpaywall', plugin_dir_url(__FILE__) . 'js/btc-paywall-admin.js', array('jquery'), BTCPAYWALL_VERSION, false);

    wp_enqueue_script('iris', admin_url('js/iris.min.js'), array('jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch'), false, 1);

    wp_localize_script(
        'btcpaywall',
        'shortcode_ajax_object',
        [
            'ajax_url'  => admin_url('admin-ajax.php'),
            'redirectUrl' => admin_url('admin.php?page=btcpw_edit&action=edit&id='),
            'security'  => wp_create_nonce('shortcode-security-nonce'),
        ]
    );
    if (isset($_GET['page']) && $_GET['page'] == 'btcpw_general_settings') {
        wp_enqueue_script('btcpaywall' . '_design_preview', plugin_dir_url(__FILE__) . 'js/btc-paywall-design-preview-admin.js', array('jquery'), BTCPAYWALL_VERSION, false);
    }
    if (isset($_GET['page']) && $_GET['page'] == 'btcpw_form') {
        wp_enqueue_script('btcpaywall' . '_preview', plugin_dir_url(__FILE__) . 'js/btc-paywall-preview-admin.js', array('jquery'), BTCPAYWALL_VERSION, false);
    }

    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
}


add_action('elementor/editor/after_enqueue_scripts', 'enqueue_scripts');

add_action('admin_enqueue_scripts',  'enqueue_scripts');
