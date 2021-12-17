<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function btcpaywall_starts_with($string, $startString)
{
    $len = strlen($startString);

    return (substr($string, 0, $len) === $startString);
}


/**
 * Check if API key contains required permission
 */
function btcpaywall_check_permission($list, $permission)
{
    foreach ($list as $perm) {
        if (btcpaywall_starts_with($perm, $permission)) {
            return true;
        }
    }
    return false;
}
function btcpaywall_all_created_forms()
{
    $form = new BTCPayWall_Tipping_Form();
    $result = $form->get_forms();
    $shortcodes = array();
    foreach ($result as $row) {
        $placeholder = "#{$row['id']} {$row['form_name']} - {$row['name']}";
        $shortcodes[$placeholder] = btcpaywall_output_shortcode_attributes($row['name'], $row['id']);
    }
    return $shortcodes;
}
function btcpaywall_output_shortcode_attributes($name, $id)
{
    switch ($name) {

        case 'Tipping Box':
            return "[btcpw_tipping_box id={$id}]";
        case 'Tipping Banner High':
            return "[btcpw_tipping_banner_high id={$id}]";
        case 'Tipping Banner Wide':
            return "[btcpw_tipping_banner_wide id={$id}]";
        case 'Tipping Page':
            return "[btcpw_tipping_page id={$id}]";
        default:
            return null;
    }
}
/**
 * Extract tipping name
 */
function btcpaywall_extract_name($dimension)
{
    switch ($dimension) {
        case '250x300':
        case '300x300':
            return array(
                'name' => 'Tipping Box',
                'type' => 'btcpw_tipping_box_shortcode'
            );
        case '200x710':
            return array(
                'name' => 'Tipping Banner High',
                'type' => 'btcpw_tipping_banner_shortcode'
            );
        case '600x280':
            return array(
                'name' => 'Tipping Banner Wide',
                'type' => 'btcpw_tipping_banner_shortcode'
            );
        default:
            return array(
                'name' => 'Tipping Page',
                'type' => 'btcpw_tipping_page_shortcode'
            );
    }
}
function btcpaywall_check_store_id($store_id)
{

    if (get_option("btcpw_btcpay_store_id") !== false) {

        update_option("btcpw_btcpay_store_id", $store_id);
    } else {

        add_option("btcpw_btcpay_store_id", $store_id, null, 'no');
    }
}
function btcpaywall_render_post_settings_meta_box($post, $meta)
{

    wp_nonce_field(plugin_basename(__FILE__), 'btcpw_post_meta_box_nonce');
}
function btcpaywall_round_amount($currency, $amount)
{
    switch ($currency) {
        case 'BTC':
            return $amount;
        case 'EUR':
        case 'USD':
            return round($amount, 1);
        default:
            return round($amount, 0);
    }
}
