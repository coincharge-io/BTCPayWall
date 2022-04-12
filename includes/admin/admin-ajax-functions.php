<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Admin/AJAX
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

use phpDocumentor\Reflection\DocBlock\Tags\Var_;

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function ajax_btcpaywall_check_greenfield_api_work()
{

    if (empty($_POST['auth_key_view']) || empty($_POST['auth_key_create']) || empty($_POST['server_url'])) {
        wp_send_json_error(['message' => 'Auth Keys & Server Url required']);
    }

    $auth_key_view = sanitize_text_field($_POST['auth_key_view']);
    $auth_key_create = sanitize_text_field($_POST['auth_key_create']);
    $server_url = trim(sanitize_text_field($_POST['server_url']), '/');

    $args_view = array(
        'headers' => array(
            'Authorization' => 'token ' . $auth_key_view,
            'Content-Type' => 'application/json',
        ),
        'method' => 'GET',
        'timeout' => 10
    );
    $args_create = array(
        'headers' => array(
            'Authorization' => 'token ' . $auth_key_create,
            'Content-Type' => 'application/json',
        ),
        'method' => 'GET',
        'timeout' => 10
    );
    $url = "{$server_url}/api/v1/api-keys/current";
    $response_view = wp_remote_request($url, $args_view);

    $response_create = wp_remote_request($url, $args_create);

    if (is_wp_error($response_view) || is_wp_error($response_create)) {
        update_option("btcpw_btcpay_store_id", null);
        wp_send_json_error(['message' => 'Something went wrong. Please check your url and credentials.']);
    }

    $view_permission = json_decode($response_view['body'])->permissions[0];
    $create_permission = json_decode($response_create['body'])->permissions[0];

    $valid_view_permission = btcpaywall_check_permission(json_decode($response_view['body'], true)['permissions'], 'btcpay.store.canviewinvoices');

    $valid_create_permission = btcpaywall_check_permission(json_decode($response_create['body'], true)['permissions'], 'btcpay.store.cancreateinvoice');

    $valid_permissions = $valid_create_permission && $valid_view_permission;

    $valid_response_code = ($response_view['response']['code'] === 200) && ($response_create['response']['code'] === 200);

    $view_store_id = substr($view_permission, strrpos($view_permission, ':') + 1);
    $create_store_id = substr($create_permission, strrpos($create_permission, ':') + 1);
    $valid_store_id = $view_store_id === $create_store_id;
    if ($valid_permissions && $valid_store_id && $valid_response_code) {
        btcpaywall_check_store_id($view_store_id);
        wp_send_json_success(["store_id" => $view_store_id]);
    } else {
        update_option("btcpw_btcpay_store_id", null);

        wp_send_json_error(['message' => 'Something went wrong. Please check your credentials.']);
    }
}
add_action('wp_ajax_btcpw_check_greenfield_api_work', 'ajax_btcpaywall_check_greenfield_api_work');




/* function btcpaywall_create_shortcode()
{
    check_ajax_referer('shortcode-security-nonce', 'nonce_ajax');

    $row = new BTCPayWall_Tipping_Form();

    $row->create($_POST);     //BTCPayWall_Tipping_Form class has function for sanitizing $_POST before saving to DB

    if ($row) {
        wp_send_json_success(array('res' => true, 'data' => array('id' => $row->id)));
    } else {
        wp_send_json_error(array('res' => false, 'message' => __('Something went wrong. Please try again later.')));
    }
}
add_action('wp_ajax_btcpw_create_shortcode', 'btcpaywall_create_shortcode'); */
/**
 * @since 1.0.9
 */
function btcpaywall_create_pay_per_shortcode()
{
    check_ajax_referer('shortcode-security-nonce', 'nonce_ajax');

    $row = new BTCPayWall_Pay_Per_Shortcode();
    //BTCPayWall_Tipping_Form class has a function for sanitizing $_POST before saving to DB     
    $row->create([
        'id' => $_POST['id'],
        'type' => $_POST['type'],
        'name' => $_POST['name'],
        'pay_block' => $_POST['pay_block'],
        'width' => $_POST['width'],
        'height' => $_POST['height'],
        'btc_format' => $_POST['btc_format'],
        'currency' => $_POST['currency'],
        'price' => $_POST['price'],
        'duration' => $_POST['duration'],
        'duration_type' => $_POST['duration_type'],
        'background_color' => $_POST['background_color'],
        'preview_title' => $_POST['preview_title'],
        'preview_title_color' => $_POST['preview_title_color'],
        'preview_description' => $_POST['preview_description'],
        'preview_description_color' => $_POST['preview_description_color'],
        'preview_image' => $_POST['preview_image'],
        'header_text' => $_POST['header_text'],
        'info_text' => $_POST['info_text'],
        'header_color' => $_POST['header_color'],
        'info_color' => $_POST['info_color'],
        'button_color' => $_POST['button_color'],
        'button_txt' => $_POST['button_txt'],
        'button_txt_color' => $_POST['button_txt_color'],
        'continue_button_text' => $_POST['continue_button_text'],
        'continue_button_text_color' => $_POST['continue_button_text_color'],
        'continue_button_color' => $_POST['continue_button_color'],
        'previous_button_text' => $_POST['previous_button_text'],
        'previous_button_text_color' => $_POST['previous_button_text_color'],
        'previous_button_color' => $_POST['previous_button_color'],
        'link' => $_POST['link'],
        'help_link' => $_POST['help_link'],
        'help_text' => $_POST['help_text'],
        'additional_link' => $_POST['additional_link'],
        'additional_help_link' => $_POST['additional_help_link'],
        'additional_help_text' => $_POST['additional_help_text'],
        'display_name' => $_POST['display_name'],
        'mandatory_name' => $_POST['mandatory_name'],
        'display_email' => $_POST['display_email'],
        'mandatory_email' => $_POST['mandatory_email'],
        'display_phone' => $_POST['display_phone'],
        'mandatory_phone' => $_POST['mandatory_phone'],
        'display_address' => $_POST['display_address'],
        'mandatory_address' => $_POST['mandatory_address'],
        'display_message' => $_POST['display_message'],
        'mandatory_message' => $_POST['mandatory_message'],
    ]);
    if ($row) {
        wp_send_json_success(array('res' => true, 'data' => array('id' => $row->id)));
    } else {
        wp_send_json_error(array('res' => false, 'message' => __('Something went wrong. Please try again later.')));
    }
}
add_action('wp_ajax_btcpw_create_shortcode', 'btcpaywall_create_pay_per_shortcode');
