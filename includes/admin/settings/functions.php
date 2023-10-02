<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Settings
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}




function btcpaywall_sanitize_number($value)
{
    return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
}
function btcpaywall_sanitize_email($value)
{
    return is_email($value) ? sanitize_email($value) : '';
}
function btcpaywall_validate_textarea($values)
{
    $default_values = array();

    if (!is_array($values)) {
        return $default_values;
    }

    foreach ($values as $key => $value) {
        $default_values[$key] = sanitize_textarea_field($value);
    }

    return $default_values;
}

function btcpaywall_sanitize_btcpay_server_url($value)
{
    $value = sanitize_text_field($value);

    return trim($value, '/');
}

function btcpaywall_sanitize_btcpay_auth_key($value)
{
    $value = sanitize_text_field($value);

    update_option('btcpw_selected_payment_gateway', 'BTCPayServer');

    return $value;
}
/**
 * @since 1.1.0
 */
function btcpaywall_sanitize_opennode_auth_key($value)
{
    $value = sanitize_text_field($value);

    update_option('btcpw_selected_payment_gateway', 'OpenNode');

    return $value;
}
/**
 * @since 1.1.0
 */
function btcpaywall_sanitize_coinsnap_auth_key($value)
{
    $value = sanitize_text_field($value);

    update_option('btcpw_selected_payment_gateway', 'Coinsnap');

    return $value;
}

/**
 * @since 1.1.0
 */
function btcpaywall_sanitize_lnbits_auth_key($value)
{
    $value = sanitize_text_field($value);

    update_option('btcpw_selected_payment_gateway', 'LNBits');

    return $value;
}

function btcpaywall_sanitize_payblock_area($value)
{
    $value = sanitize_textarea_field($value);

    return $value;
}

function btcpaywall_sanitize_color($value)
{
    $value = sanitize_hex_color($value);

    return $value;
}

function btcpaywall_sanitize_text($value)
{
    $value = sanitize_text_field($value);

    return $value;
}

function btcpaywall_sanitize_boolean($value)
{
    return (isset($value) ? true : false);
}
function btcpaywall_render_general_settings_page()
{
    include 'partials/page-general-settings.php';
}


/**
 * @since 1.0.6
 */
function btcpaywall_render_download_store_page()
{
    include 'partials/page-download-store-settings.php';
}
/**
 * @since 1.0.6
 */
// function btcpaywall_render_pay_per_post()
// {
//     include 'partials/page-pay-per-post.php';
// }

/**
 * @since 1.0.6
 */
// function btcpaywall_render_pay_per_view()
// {
//     include 'partials/page-pay-per-view.php';
// }


/**
 * @since 1.0.9
 */
function btcpaywall_render_pay_per_shortcode_generator()
{
    include 'partials/page-generate-pay-per-shortcode.php';
}



/**
 * @since 1.0.9
 */
function btcpaywall_render_pay_per_post_page_shortcode_generator()
{
    include 'partials/shortcode-generator-pages/page-pay-per-post-shortcode-generator.php';
}


/**
 * @since 1.0.9
 */
function btcpaywall_render_pay_per_manage_shortcode_page()
{
    include 'partials/page-manage-pay-per-shortcode.php';
}
