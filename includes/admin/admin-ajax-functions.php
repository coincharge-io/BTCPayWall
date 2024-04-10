<?php

/**
 * Digital Download
 *
 * @package    BTCPayWall
 * @subpackage Admin/AJAX
 * @copyright  Copyright (c) 2021, Coincharge
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since      1.0
 */


// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
function btcpaywall_check_greenfield_api_work()
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

    $view_permission = isset(json_decode($response_view['body'])->permissions[0]) ? json_decode($response_view['body'])->permissions[0] : 'btcpay.store.invalid-permission';
    $create_permission = isset(json_decode($response_create['body'])->permissions[0]) ? json_decode($response_create['body'])->permissions[0] : 'btcpay.store.invalid-permission';

    $valid_view_permission = btcpaywall_check_permission(json_decode($response_view['body'], true)['permissions'], 'btcpay.store.canviewinvoices');

    $valid_create_permission = btcpaywall_check_permission(json_decode($response_create['body'], true)['permissions'], 'btcpay.store.cancreateinvoice');

    $valid_permissions = $valid_create_permission && $valid_view_permission;

    $valid_response_code = ($response_view['response']['code'] === 200) && ($response_create['response']['code'] === 200);

    $view_store_id = substr($view_permission, strrpos($view_permission, ':') + 1);
    $create_store_id = substr($create_permission, strrpos($create_permission, ':') + 1);
    $valid_store_id = $view_store_id === $create_store_id;
    if ($valid_permissions && $valid_store_id && $valid_response_code) {
        btcpaywall_check_store_id($view_store_id);
        update_option('btcpw_btcpay_server_url', $server_url);
        update_option('btcpw_btcpay_auth_key_view', $auth_key_view);
        update_option('btcpw_btcpay_auth_key_create', $auth_key_create);
        wp_send_json_success(["store_id" => $view_store_id]);
    } else {
        update_option("btcpw_btcpay_store_id", null);

        wp_send_json_error(['message' => 'Something went wrong. Please check your credentials.']);
    }
}
add_action('wp_ajax_btcpw_check_greenfield_api_work', 'btcpaywall_check_greenfield_api_work');




/**
 * @since 1.0.9
 */
function btcpaywall_create_pay_per_shortcode()
{
    check_ajax_referer('shortcode-security-nonce', 'nonce_ajax');

    $row = new BTCPayWall_Pay_Per_Shortcode();
    //BTCPayWall_Tipping_Form class has a function for sanitizing $_POST before saving to DB
    $row->create(
        [
            'id' => $_POST['id'] ?? null,
            'type' => $_POST['type'] ?? null,
            'name' => $_POST['name'] ?? null,
            'pay_block' => isset($_POST['pay_block']) ? $_POST['pay_block'] : null,
            'width' => $_POST['width'] ?? null,
            'height' => $_POST['height'] ?? null,
            'btc_format' => $_POST['btc_format'] ?? null,
            'currency' => $_POST['currency'] ?? null,
            'price' => $_POST['price'] ?? null,
            'duration' => $_POST['duration'] ?? null,
            'duration_type' => $_POST['duration_type'] ?? null,
            'background_color' => $_POST['background_color'] ?? null,
            'title' => $_POST['preview_title'] ?? null,
            'title_color' => $_POST['preview_title_color'] ?? null,
            'description' => $_POST['preview_description'] ?? null,
            'description_color' => $_POST['preview_description_color'] ?? null,
            'preview' => $_POST['preview_image'] ?? null,
            'header_text' => $_POST['header_text'] ?? null,
            'info_text' => $_POST['info_text'] ?? null,
            'header_color' => $_POST['header_color'] ?? null,
            'info_color' => $_POST['info_color'] ?? null,
            'button_color' => $_POST['button_color'] ?? null,
            'button_color_hover' => $_POST['button_color_hover'] ?? null,
            'button_text' => $_POST['button_text'] ?? null,
            'button_text_color' => $_POST['button_text_color'] ?? null,
            'continue_button_text' => $_POST['continue_button_text'] ?? null,
            'continue_button_text_color' => $_POST['continue_button_text_color'] ?? null,
            'continue_button_color' => $_POST['continue_button_color'] ?? null,
            'continue_button_color_hover' => $_POST['continue_button_color_hover'] ?? null,
            'previous_button_text' => $_POST['previous_button_text'] ?? null,
            'previous_button_text_color' => $_POST['previous_button_text_color'] ?? null,
            'previous_button_color' => $_POST['previous_button_color'] ?? null,
            'previous_button_color_hover' => $_POST['previous_button_color_hover'] ?? null,
            'link' => isset($_POST['link']) ? $_POST['link'] : false,
            'help_link' => $_POST['help_link'] ?? null,
            'help_text' => $_POST['help_text'] ?? null,
            'additional_link' => isset($_POST['additional_link']) ? $_POST['additional_link'] : false,
            'additional_help_link' => $_POST['additional_help_link'] ?? null,
            'additional_help_text' => $_POST['additional_help_text'] ?? null,
            'display_name' => isset($_POST['display_name']) ? $_POST['display_name'] : null,
            'mandatory_name' => isset($_POST['mandatory_name']) ? $_POST['mandatory_name'] : null,
            'display_email' => isset($_POST['display_email']) ? $_POST['display_email'] : null,
            'mandatory_email' => isset($_POST['mandatory_email']) ? $_POST['mandatory_email'] : null,
            'display_phone' => isset($_POST['display_phone']) ? $_POST['display_phone'] : null,
            'mandatory_phone' => isset($_POST['mandatory_phone']) ? $_POST['mandatory_phone'] : null,
            'display_address' => isset($_POST['display_address']) ? $_POST['display_address'] : null,
            'mandatory_address' => isset($_POST['mandatory_address']) ? $_POST['mandatory_address'] : null,
            'display_message' => isset($_POST['display_message']) ? $_POST['display_message'] : null,
            'mandatory_message' => isset($_POST['mandatory_message']) ? $_POST['mandatory_message'] : null,
        ]
    );
    if ($row) {
        wp_send_json_success(array('res' => true, 'data' => array('id' => $row->id)));
    } else {
        wp_send_json_error(array('res' => false, 'message' => __('Something went wrong. Please try again later.')));
    }
}
add_action('wp_ajax_btcpw_create_shortcode', 'btcpaywall_create_pay_per_shortcode');

function btcpaywall_ajax_coinsnap_test_connection()
{
    if (empty($_POST['api_key']) || empty($_POST['store_id'])) {
        wp_send_json_error(['message' => 'Provide credentials']);
    }

    $auth_key = sanitize_text_field($_POST['api_key']);
    $store_id = sanitize_text_field($_POST['store_id']);
    update_option('btcpw_coinsnap_auth_key', $auth_key);
    update_option('btcpw_coinsnap_store_id', $store_id);
    update_option('btcpw_coinsnap_server_url', 'https://app.coinsnap.io');

    $server_url = get_option("btcpw_coinsnap_server_url");
    $args = array(
        'headers' => array(
            'X-Api-Key' =>  $auth_key,
            'Content-Type' => 'application/json',
        ),
        'method' => 'GET',
        'timeout' => 50
    );
    $url = "{$server_url}/api/v1/stores/{$store_id}";
    $response = wp_remote_get($url, $args);


    if (is_wp_error($response)) {
        wp_send_json_error(['message' => 'Something went wrong. Please check your API key.']);
    }

    $body = json_decode($response['body']);
    if (empty($body->storeId)) {
        wp_send_json_error(["message" => "Wrong credentials"]);
    }
    wp_send_json_success($body);
}
add_action('wp_ajax_btcpw_coinsnap_test_connection', 'btcpaywall_ajax_coinsnap_test_connection');
