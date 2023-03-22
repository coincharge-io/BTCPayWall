<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Functions
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
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
function btcpaywall_get_donation_templates()
{
    $query_args = [
        'post_type' => 'btcpw_donation',
        'post_status' => 'publish',
        'fields'  => 'ids',
        'no_found_rows' => true,
        'posts_per_page' => -1,
    ];
    $templates = [];
    $templates[''] = [''];
    $query = new WP_Query($query_args);
    if ($query->posts) {
        foreach ($query->posts as $key => $post_id) {
            $template = get_post_meta($post_id, 'btcpaywall_tipping_text_template_name', true);
            $shortcode = btcpaywall_output_shortcode_attributes($template, $post_id);
            $templates["#" . $post_id . '-' . get_the_title($post_id)] = $shortcode;
        }
    }
    return $templates;
}
function btcpaywall_get_templates($type = 'pay-per-post')
{
    $shortcodes = new BTCPayWall_Pay_Per_Shortcode();
    $prepare_templates = [];
    $prepare_templates[''] = '';
    foreach ($shortcodes->get_all_shortcodes($type) as $val) {
        $prepare_templates["#$val[id]-$val[name]"] = (new BTCPayWall_Pay_Per_Shortcode($val['id']))->shortcode();
    }
    return $prepare_templates;
}
// function btcpaywall_get_pay_per_view_templates()
// {
//     $shortcodes = new BTCPayWall_Pay_Per_Shortcode();
//     $prepare_templates = [];
//     $prepare_templates[''] = '';
//     foreach ($shortcodes->get_all_shortcodes('pay-per-view') as $val) {
//         $prepare_templates["#$val[id]-$val[name]"] = (new BTCPayWall_Pay_Per_Shortcode($val['id']))->shortcode();
//     }
//     return $prepare_templates;
// }
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
        case 'btcpaywall_tipping_box':
            return "[btcpw_tipping_box type=new id={$id}]";
        case 'btcpaywall_tipping_banner_high':
            return "[btcpw_tipping_banner_high type=new id={$id}]";
        case 'btcpaywall_tipping_banner_wide':
            return "[btcpw_tipping_banner_wide type=new id={$id}]";
        case 'btcpaywall_tipping_page':
            return "[btcpw_tipping_page type=new id={$id}]";
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
            return (float) $amount;
        case 'SATS':
            return round((float) $amount, 0);
        case 'EUR':
        case 'USD':
            return round((float) $amount, 2);
        default:
            return round((float) $amount, 0);
    }
}
