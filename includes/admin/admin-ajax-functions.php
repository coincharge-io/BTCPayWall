<?php
function ajax_check_greenfield_api_work()
{

    if (empty($_POST['auth_key_view']) || empty($_POST['auth_key_create']) || empty($_POST['server_url'])) {
        wp_send_json_error(['message' => 'Auth Keys & Server Url required']);
    }

    $auth_key_view = sanitize_text_field($_POST['auth_key_view']);
    $auth_key_create = sanitize_text_field($_POST['auth_key_create']);
    $server_url = sanitize_text_field($_POST['server_url']);

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
        wp_send_json_error(['message' => 'Something went wrong. Please check your credentials. If your server url is correct, make sure it doesn\'t contain trailing slash.']);
    }

    $view_permission = json_decode($response_view['body'])->permissions[0];
    $create_permission = json_decode($response_create['body'])->permissions[0];

    $valid_view_permission = checkPermission(json_decode($response_view['body'], true)['permissions'], 'btcpay.store.canviewinvoices');

    $valid_create_permission = checkPermission(json_decode($response_create['body'], true)['permissions'], 'btcpay.store.cancreateinvoice');

    $valid_permissions = $valid_create_permission && $valid_view_permission;

    $valid_response_code = ($response_view['response']['code'] === 200) && ($response_create['response']['code'] === 200);

    $view_store_id = substr($view_permission, strrpos($view_permission, ':') + 1);
    $create_store_id = substr($create_permission, strrpos($create_permission, ':') + 1);
    $valid_store_id = $view_store_id === $create_store_id;
    if ($valid_permissions && $valid_store_id && $valid_response_code) {
        check_store_id($view_store_id);
        wp_send_json_success(["store_id" => $view_store_id]);
    } else {
        wp_send_json_error(['message' => 'Something went wrong. Please check your credentials.']);
    }
}
add_action('wp_ajax_btcpw_check_greenfield_api_work', 'ajax_check_greenfield_api_work');



add_action('wp_ajax_btcpw_get_greenfield_invoices', 'get_greenfield_invoices');
function get_greenfield_invoices()
{

    $store_id = get_option('btcpw_btcpay_store_id');

    $args = array(
        'headers' => array(
            'Authorization' => 'token ' . get_option('btcpw_btcpay_auth_key_view'),
            'Content-Type' => 'application/json',
        ),
        'method' => 'GET',
        'timeout' => 20,
    );

    if (!empty($store_id)) {

        $url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . $store_id . '/invoices';


        $response = wp_remote_get($url, $args);

        if (is_wp_error($response)) {
            wp_send_json_error();
        }
        $body = wp_remote_retrieve_body($response);


        $data = json_decode($body, true);

        if ($data) {
            wp_send_json_success($data);
        }
        wp_send_json_error($data);
    }
}

function createShortcode()
{
    global $wpdb;
    check_ajax_referer('shortcode-security-nonce', 'nonce_ajax');
    $id = sanitize_text_field($_POST['id']) ?? null;
    $name = BTCPayWall_Admin::extractName($_POST['dimension'])['name'];
    $type = BTCPayWall_Admin::extractName($_POST['dimension'])['type'];
    $dimension = sanitize_text_field($_POST['dimension']) ?? "520x600";

    $background = sanitize_text_field($_POST['background']);
    $background_color = sanitize_hex_color_no_hash($_POST['background_color']);
    $hf_color = sanitize_hex_color_no_hash($_POST['hf_color']);
    $logo = sanitize_text_field($_POST['logo']);
    $form_name = sanitize_text_field($_POST['form_name']);
    $title_text = sanitize_text_field($_POST['title_text']);
    $title_text_color = sanitize_hex_color_no_hash($_POST['title_text_color']);

    $description_text = sanitize_text_field($_POST['description_text']);
    $description_text_color = sanitize_hex_color_no_hash($_POST['description_text_color']);

    $tipping_text = sanitize_text_field($_POST['tipping_text']);
    $tipping_text_color = sanitize_hex_color_no_hash($_POST['tipping_text_color']);
    $redirect = sanitize_text_field($_POST['redirect']);
    $currency = sanitize_text_field($_POST['currency']);
    $input_background = sanitize_hex_color_no_hash($_POST['input_background']);
    $button_text = sanitize_text_field($_POST['button_text']);
    $button_text_color = sanitize_hex_color_no_hash($_POST['button_text_color']);
    $button_color = sanitize_hex_color_no_hash($_POST['button_color']);

    $free_input = (rest_sanitize_boolean($_POST['free_input']));
    $value1_enabled = (rest_sanitize_boolean($_POST['value1_enabled']));
    $value1_currency = (rest_sanitize_boolean($_POST['value1_currency']));
    $value1_amount = (sanitize_text_field($_POST['value1_amount']));
    $value1_icon = (sanitize_text_field($_POST['value1_icon']));

    $value2_enabled = (rest_sanitize_boolean($_POST['value2_enabled']));
    $value2_currency = (rest_sanitize_boolean($_POST['value2_currency']));
    $value2_amount = (sanitize_text_field($_POST['value2_amount']));
    $value2_icon = (sanitize_text_field($_POST['value2_icon']));

    $value3_enabled = (rest_sanitize_boolean($_POST['value3_enabled']));
    $value3_currency = (rest_sanitize_boolean($_POST['value3_currency']));
    $value3_amount = (sanitize_text_field($_POST['value3_amount']));
    $value3_icon = (sanitize_text_field($_POST['value3_icon']));

    $collect_name = (rest_sanitize_boolean($_POST['collect_name']));
    $mandatory_name = (rest_sanitize_boolean($_POST['mandatory_name']));
    $collect_email = (rest_sanitize_boolean($_POST['collect_email']));
    $mandatory_email = (rest_sanitize_boolean($_POST['mandatory_email']));

    $collect_phone = (rest_sanitize_boolean($_POST['collect_phone']));
    $mandatory_phone = (rest_sanitize_boolean($_POST['mandatory_phone']));

    $collect_address = (rest_sanitize_boolean($_POST['collect_address']));
    $mandatory_address = (rest_sanitize_boolean($_POST['mandatory_address']));

    $collect_message = (rest_sanitize_boolean($_POST['collect_message']));
    $mandatory_message = (rest_sanitize_boolean($_POST['mandatory_message']));
    $show_icon = (rest_sanitize_boolean($_POST['show_icon']));
    $active_color = sanitize_hex_color_no_hash($_POST['active_color']);
    $inactive_color = sanitize_hex_color_no_hash($_POST['inactive_color']);
    $step1 = sanitize_text_field($_POST['step1']);
    $step2 = sanitize_text_field($_POST['step2']);
    $row = null;
    $table_name = $wpdb->prefix . 'btc_forms';
    if (empty($id)) {
        $row = $wpdb->insert(
            $table_name,
            array(
                'time' => current_time('mysql'),
                'name' => $name,
                'form_name' => $form_name,
                'dimension' => $dimension,
                'background' => $background,
                'background_color' => $background_color,
                'hf_background'    => $hf_color,
                'logo'    => $logo,
                'title_text' => $title_text,
                'title_text_color' => $title_text_color,
                'description_text'  => $description_text,
                'description_text_color' => $description_text_color,
                'tipping_text'    => $tipping_text,
                'tipping_text_color'    => $tipping_text_color,
                'redirect'    =>    $redirect,
                'currency'    => $currency,
                'input_background'    => $input_background,
                'button_text'    => $button_text,
                'button_text_color'    => $button_text_color,
                'button_color'    => $button_color,
                'value1_enabled' => $value1_enabled,
                'value1_amount'    => $value1_amount,
                'value1_currency'    => $value1_currency,
                'value1_icon'    => $value1_icon,
                'value2_enabled' => $value2_enabled,
                'value2_amount'    => $value2_amount,
                'value2_currency'    => $value2_currency,
                'value2_icon'    => $value2_icon,
                'value3_enabled' => $value3_enabled,
                'value3_amount'    => $value3_amount,
                'value3_currency'    => $value3_currency,
                'value3_icon'    => $value3_icon,
                'collect_name'    => $collect_name,
                'mandatory_name'    => $mandatory_name,
                'collect_email'    => $collect_email,
                'mandatory_email'    => $mandatory_email,
                'collect_address'    => $collect_address,
                'mandatory_address'    => $mandatory_address,
                'collect_phone'    => $collect_phone,
                'mandatory_phone'    => $mandatory_phone,
                'collect_message'    => $collect_message,
                'mandatory_message'    => $mandatory_message,
                'free_input'    => $free_input,
                'show_icon'        => $show_icon,
                'step1'            => $step1,
                'step2'            => $step2,
                'active_color'    => $active_color,
                'inactive_color'    => $inactive_color,
            )
        );
    } else {
        $row = $wpdb->update(
            $table_name,
            array(
                'time' => current_time('mysql'),
                'name' => $name,
                'form_name' => $form_name,
                'dimension' => $dimension,
                'background' => $background,
                'background_color' => $background_color,
                'hf_background'    => $hf_color,
                'logo'    => $logo,
                'title_text' => $title_text,
                'title_text_color' => $title_text_color,
                'description_text'  => $description_text,
                'description_text_color' => $description_text_color,
                'tipping_text'    => $tipping_text,
                'tipping_text_color'    => $tipping_text_color,
                'redirect'    =>    $redirect,
                'currency'    => $currency,
                'input_background'    => $input_background,
                'button_text'    => $button_text,
                'button_text_color'    => $button_text_color,
                'button_color'    => $button_color,
                'value1_enabled' => $value1_enabled,
                'value1_amount'    => $value1_amount,
                'value1_currency'    => $value1_currency,
                'value1_icon'    => $value1_icon,
                'value2_enabled' => $value2_enabled,
                'value2_amount'    => $value2_amount,
                'value2_currency'    => $value2_currency,
                'value2_icon'    => $value2_icon,
                'value3_enabled' => $value3_enabled,
                'value3_amount'    => $value3_amount,
                'value3_currency'    => $value3_currency,
                'value3_icon'    => $value3_icon,
                'collect_name'    => $collect_name,
                'mandatory_name'    => $mandatory_name,
                'collect_email'    => $collect_email,
                'mandatory_email'    => $mandatory_email,
                'collect_address'    => $collect_address,
                'mandatory_address'    => $mandatory_address,
                'collect_phone'    => $collect_phone,
                'mandatory_phone'    => $mandatory_phone,
                'collect_message'    => $collect_message,
                'mandatory_message'    => $mandatory_message,
                'free_input'    => $free_input,
                'show_icon'        => $show_icon,
                'step1'            => $step1,
                'step2'            => $step2,
                'active_color'    => $active_color,
                'inactive_color'    => $inactive_color,
            ),
            array('id' => $id)
        );
    }


    if ($row) {
        wp_send_json_success(array('res' => true, 'data' => array('type' => $type, 'id' => $wpdb->insert_id)));
    } else {
        wp_send_json_error(array('res' => false, 'message' => __('Something went wrong. Please try again later.')));
    }
}
add_action('wp_ajax_btcpw_create_shortcode', 'createShortcode');
