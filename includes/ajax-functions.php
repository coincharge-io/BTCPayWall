<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function ajax_get_invoice_id()
{

    if (empty($_GET['post_id'])) {
        wp_send_json_error(['message' => 'post_id required']);
    }

    $post_id = sanitize_text_field($_GET['post_id']);
    $order_id = generate_order_id($post_id);
    $invoice_id = generate_invoice_id($post_id, $order_id);

    if (is_wp_error($invoice_id)) {
        wp_send_json_error([
            'message' => $invoice_id->get_error_message(),
        ]);
    }

    wp_send_json_success([
        'amount' => $invoice_id['amount'],
        'invoice_id' => $invoice_id['id'],
        'order_id' => $order_id,
    ]);
}
add_action('wp_ajax_btcpw_get_invoice_id',  'ajax_get_invoice_id');
add_action('wp_ajax_nopriv_btcpw_get_invoice_id',  'ajax_get_invoice_id');

function generate_invoice_id($post_id, $order_id)
{
    $amount = calculate_price_for_invoice($post_id);

    $url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';

    $currency_scope = get_post_meta($post_id, 'btcpw_currency', true) ?: getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['currency'];
    //get_option('btcpw_default_currency', 'SATS');
    $currency = $currency_scope != 'SATS' ? $currency_scope : 'BTC';
    $blogname = get_option('blogname');

    $data = array(
        'amount' => $amount,
        'currency' => $currency,
        'metadata' => array(
            'orderId' => $order_id,
            'type' => 'Pay-per-' . get_post_meta($post_id, 'btcpw_invoice_content', true)['project'],
            'blog' => $blogname,
            'buyer' => array(
                'name' => (string) $_SERVER['REMOTE_ADDR']
            )
        )
    );

    $args = array(
        'headers' => array(
            'Authorization' => 'token ' . get_option('btcpw_btcpay_auth_key_create'),
            'Content-Type' => 'application/json',
        ),
        'body' => json_encode($data),
        'method' => 'POST',
        'timeout' => 60,
    );

    $response = wp_remote_request($url, $args);

    if (is_wp_error($response)) {
        return $response;
    }

    if ($response['response']['code'] != 200) {
        return new WP_Error($response['response']['code'], 'HTTP Error ' . $response['response']['code']);
    }

    $body = json_decode($response['body'], true);

    if (empty($body) || !empty($body['error'])) {
        return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
    }

    update_post_meta($order_id, 'btcpw_invoice_id', $body['id']);

    return array(
        'id' => $body['id'],
        'amount' => $body['amount'] . $body['currency']
    );
}

function ajax_convert_currencies()
{

    $url = 'https://api.coingecko.com/api/v3/exchange_rates';

    $args = array(
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
        'method' => 'GET',
        'timeout' => 10,
    );

    $response = wp_remote_request($url, $args);

    if (is_wp_error($response)) {
        return $response;
    }

    if ($response['response']['code'] != 200) {
        return new WP_Error($response['response']['code'], 'HTTP Error ' . $response['response']['code']);
    }

    $body = json_decode($response['body'], true);

    if (empty($body) || !empty($body['error'])) {
        return new WP_Error('converter_error', $body['error'] ?? 'Something went wrong');
    }

    wp_send_json_success(
        $body['rates'],
    );
}

add_action('wp_ajax_btcpw_convert_currencies',  'ajax_convert_currencies');
add_action('wp_ajax_nopriv_btcpw_convert_currencies',  'ajax_convert_currencies');
function ajax_tipping()
{
    $collect = "Donor Information: \n";

    if (!empty($_POST['name'])) {
        $name = sanitize_text_field($_POST['name']);
        $collect .= "Name: {$name} \n";
    }
    if (!empty($_POST['email'])) {
        $email = sanitize_text_field($_POST['email']);
        $collect .= "Email: {$email} \n";
    }
    if (!empty($_POST['address'])) {
        $address = sanitize_text_field($_POST['address']);
        $collect .= "Address: {$address} \n";
    }
    if (!empty($_POST['phone'])) {
        $phone = sanitize_text_field($_POST['phone']);
        $collect .= "Phone: {$phone} \n";
    }
    if (!empty($_POST['message'])) {
        $message = sanitize_text_field($_POST['message']);
        $collect .= "Message: {$message} \n";
    }

    $currency = sanitize_text_field($_POST['currency']);
    $amount = sanitize_text_field($_POST['amount']);


    if (!empty($_POST['predefined_amount'])) {
        $extract = explode(' ', sanitize_text_field($_POST['predefined_amount']));
        $amount = $extract[0];
        $currency = $extract[1];
    }
    $storeId = get_option('btcpw_btcpay_store_id');
    $blogname = get_option('blogname');
    $siteurl = get_option('siteurl');
    $date = date('Y-m-d H:i:s', current_time('timestamp', 0));

    $collects = "\nWeblog title: {$blogname} \n";
    $collects .= "Website url: {$siteurl} \n";
    $collects .= "Date: {$date} \n";
    $collects .= "Amount: {$amount} {$currency} \n";
    $collects .= "Credit on Store ID: {$storeId} \n";
    $collects .= $collect;
    $type = sanitize_text_field($_POST['type']);
    $itemDesc = "\nType: {$type}\n";
    $itemDesc .= "Weblog title: {$blogname} \n";
    $url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';

    $data = array(
        'amount' => $amount,
        'currency' => $currency,
        'metadata' => array(
            'type' => $type,
            'blog'    => $blogname,
            'donor' => $collects,
        )
    );
    $args = array(
        'headers' => array(
            'Authorization' => 'token ' . get_option('btcpw_btcpay_auth_key_create'),
            'Content-Type' => 'application/json',
        ),
        'body' => json_encode($data),
        'method' => 'POST',
        'timeout' => 60,
    );

    $response = wp_remote_request($url, $args);

    if (is_wp_error($response)) {
        return $response;
    }

    if ($response['response']['code'] != 200) {
        return new WP_Error($response['response']['code'], 'HTTP Error ' . $response['response']['code']);
    }

    $body = json_decode($response['body'], true);

    if (empty($body) || !empty($body['error'])) {
        return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
    }

    wp_send_json_success([
        'invoice_id' => $body['id'],
        'donor' => $body['metadata']['donor'],
    ]);
}
add_action('wp_ajax_btcpw_tipping',  'ajax_tipping');
add_action('wp_ajax_nopriv_btcpw_tipping',  'ajax_tipping');
function ajax_paid_invoice()
{

    if (empty($_POST['order_id'])) {
        wp_send_json_error();
    }

    $order_id = sanitize_text_field($_POST['order_id']);
    $post_id = get_post_meta($order_id, 'btcpw_post_id', true);
    $invoice_id = get_post_meta($order_id, 'btcpw_invoice_id', true);
    $secret = get_post_meta($order_id, 'btcpw_secret', true);
    $content_title = get_post_meta($post_id, 'btcpw_invoice_content', true)['title'];
    $store_id = get_option('btcpw_btcpay_store_id');


    if (empty($post_id) || empty($invoice_id)) {
        wp_send_json_error();
    }

    $url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices/' . $invoice_id;

    $args = array(
        'headers' => array(
            'Authorization' => 'token ' . get_option('btcpw_btcpay_auth_key_view'),
            'Content-Type' => 'application/json',
        ),
        'method' => 'GET',
        'timeout' => 60,
    );

    $response = wp_remote_request($url, $args);

    if (is_wp_error($response)) {
        return $response;
    }

    if ($response['response']['code'] != 200) {
        return new WP_Error($response['response']['code'], 'HTTP Error ' . $response['response']['code']);
    }

    $body = json_decode($response['body'], true);

    if (empty($body) || !empty($body['error'])) {
        return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
    }
    $amount = sanitize_text_field($_POST['amount']);
    $storeId = get_option('btcpw_btcpay_store_id');
    $blogname = get_option('blogname');
    $siteurl = get_option('siteurl');
    $date = date('Y-m-d H:i:s', current_time('timestamp', 0));
    $message = "\nWeblog title: {$blogname} \n";
    $message .= "Website url: {$siteurl} \n";
    $message .= "Date: {$date} \n";
    $message .= "Amount: {$amount} \n";
    $message .= "Credit on Store ID: {$storeId} \n";
    $message .= "Type: $content_title \n";

    if ($body['status'] === 'Settled') {
        $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);

        setcookie('btcpw_' . $post_id, $secret, get_cookie_duration($post_id), $cookie_path);

        update_post_meta($order_id, 'btcpw_status', 'success');

        wp_send_json_success(['notify' => $message]);
    }
    wp_send_json_error(['message' => 'invoice is not paid']);
}

add_action('wp_ajax_btcpw_paid_invoice',  'ajax_paid_invoice');
add_action('wp_ajax_nopriv_btcpw_paid_invoice',  'ajax_paid_invoice');



function ajax_notify_administrator()
{


    $admin = get_bloginfo('admin_email');
    $body = sanitize_text_field($_POST['donor_info']);

    wp_mail($admin, 'You have received a payment via BTCPayWall', $body);
}
add_action('wp_ajax_btcpw_notify_admin',  'ajax_notify_administrator');
add_action('wp_ajax_nopriv_btcpw_notify_admin',  'ajax_notify_administrator');
