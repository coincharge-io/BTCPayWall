<?php

/**
 *
 *
 * @package    BTCPayWall
 * @subpackage Functions/AJAX
 * @copyright  Copyright (c) 2021, Coincharge
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since      1.0
 */


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}



/**
 * Generate invoice and order id
 *
 * @since 1.0
 *
 * @return void
 */
function ajax_btcpaywall_get_invoice_id()
{
    if (empty($_POST['post_id'])) {
        wp_send_json_error(['message' => 'Post_id required']);
    }

    $customer_data = array(
        'full_name' => isset($_POST['full_name']) ? sanitize_text_field($_POST['full_name']) : '',
        'email' => isset($_POST['email']) ? sanitize_email($_POST['email']) : '',
        'address' => isset($_POST['address']) ? sanitize_text_field($_POST['address']) : '',
        'phone' => isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '',
        'message' => isset($_POST['message']) ? sanitize_text_field($_POST['message']) : '',
    );

    $post_id = sanitize_text_field($_POST['post_id']);
    $order_id = btcpaywall_generate_order_id($post_id);
    $gateway = get_option('btcpw_selected_payment_gateway');
    if ($gateway === 'BTCPayServer' || $gateway === 'Coinsnap') {
        $invoice_id = btcpaywall_generate_invoice_id($post_id, $order_id, $customer_data);
    } elseif ($gateway === "LNBits") {
        $invoice_id = btcpaywall_generate_lnbits_invoice_id($post_id, $order_id, $customer_data);
    } else {
        $invoice_id = btcpaywall_generate_opennode_invoice_id($post_id, $order_id, $customer_data);
    }
    if (is_wp_error($invoice_id)) {
        wp_send_json_error(
            [
                'message' => 'Invoice could not be generated.',
            ]
        );
    }
    $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);
    setcookie("btcpw_initiated_{$post_id}", $order_id, time() + 86400, $cookie_path);

    wp_send_json_success(
        [
            'amount' => $invoice_id['amount'],
            'invoice_id' => $invoice_id['id'],
            'order_id' => $order_id,
            'payment_request' => $invoice_id['payment_request']
        ]
    );
}
add_action('wp_ajax_btcpw_get_invoice_id', 'ajax_btcpaywall_get_invoice_id');
add_action('wp_ajax_nopriv_btcpw_get_invoice_id', 'ajax_btcpaywall_get_invoice_id');

/**
 * Retrieve order id and invoice id from the server
 *
 * @param int $post_id  WP Post id.
 * @param int $order_id Order id.
 *
 * @since 1.0
 *
 * @return array Return invoice id and amount
 * @throws WP_Error
 */
function btcpaywall_generate_invoice_id($post_id, $order_id, $customer_data)
{
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
    $amount = btcpaywall_calculate_price_for_invoice($post_id);
    $url = ($gateway === 'Coinsnap') ? get_option('btcpw_coinsnap_server_url') . '/api/v1/stores/' . get_option('btcpw_coinsnap_store_id') . '/invoices' : get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';
    $auth = ($gateway === 'Coinsnap') ? 'token ' . get_option('btcpw_coinsnap_auth_key') : 'token ' . get_option('btcpw_btcpay_auth_key_create');
    $currency_scope = get_post_meta($post_id, 'btcpw_currency', true) ? get_post_meta($post_id, 'btcpw_currency', true) : get_option('btcpw_default_currency', 'SATS');
    $blogname = get_post($post_id)->post_title;
    $data = array(
        'amount' => $amount,
        'currency' => $currency_scope,
        'referralCode' => 'DEV1ecd86d85cd2f8084b7a51701',
        'metadata' => array(
            'orderId' => $order_id,
            'type' => 'Pay-per-' . get_post_meta($post_id, 'btcpw_invoice_content', true)['project'],
            'blog' => $blogname,
            'buyer' => array(
                'name' => (string) $_SERVER['REMOTE_ADDR']
            ),
            'customer_data' => $customer_data
        )
    );
    $args = array(
        'headers' => array(
            'Authorization' => $auth,
            'Content-Type' => 'application/json',
        ),
        'body' => json_encode($data),
        'method' => 'POST',
        'timeout' => 60,
    );
    $gateway = BTCPayWall::create_client();
    $body = $gateway->createInvoice($data);
    $revenue_type = $body['metadata']['type'];

    $customer = new BTCPayWall_Customer();

    $customer->create(
        [
            'full_name' => sanitize_text_field($customer_data['full_name']),
            'email' => sanitize_email($customer_data['email']),
            'address' => sanitize_text_field($customer_data['address']),
            'phone' => sanitize_text_field($customer_data['phone']),
            'message' => sanitize_text_field($customer_data['message'])
        ]
    );
    $payment = new BTCPayWall_Payment();

    $payment->create(
        [
            'invoice_id' => $body['id'],
            'customer_id' => $customer->id,
            'amount' => floatval($body['amount']),
            'page_title' => $body['metadata']['blog'],
            'revenue_type' => $revenue_type,
            'currency' => $body['currency'],
            'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer'),
            'status' => $body['status'],
            'payment_method' => '',
            'date_created'  => date('Y-m-d H:i:s', $body['createdTime'])
        ]
    );
    update_post_meta($order_id, 'btcpw_invoice_id', $body['id']);

    return array(
        'id' => $body['id'],
        'amount' => $body['amount'] . $body['currency']
    );
}

/**
 * Get payment method
 *
 * @param int $invoice_id Invoice ID.
 *
 * @since 1.0
 *
 * @return array Array of enabled payment methods
 * @throws WP_Error
 */
function btcpaywall_get_payment_method($invoice_id)
{
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
    $url = ($gateway === 'Coinsnap') ? get_option('btcpw_coinsnap_server_url') . '/api/v1/stores/' . get_option('btcpw_coinsnap_store_id') . '/invoices/' . $invoice_id . '/payment-methods' : get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices/' . $invoice_id . '/payment-methods';
    $auth = ($gateway === 'Coinsnap') ? 'token ' . get_option('btcpw_coinsnap_auth_key') : 'token ' . get_option('btcpw_btcpay_auth_key_view');
    $args = array(
        'headers' => array(
            'Authorization' => $auth,
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
    foreach ($body as $method) {
        if ($method['activated'] === true) {
            return $method['paymentMethod'];
        }
    }
}
/**
 * Fetch exchange rates
 *
 * @since 1.0
 *
 * @return void
 */
function ajax_btcpaywall_convert_currencies()
{
    $url = 'https://api.coingecko.com/api/v3/exchange_rates';
    //TODO: Cache call
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

add_action('wp_ajax_btcpw_convert_currencies', 'ajax_btcpaywall_convert_currencies');
add_action('wp_ajax_nopriv_btcpw_convert_currencies', 'ajax_btcpaywall_convert_currencies');


function ajax_btcpaywall_tipping()
{
    $tipper = new BTCPayWall_Tipper();

    $tipper->create(
        [
            'full_name' => sanitize_text_field($_POST['name']),
            'email' => sanitize_email($_POST['email']),
            'phone' => (int)$_POST['phone'],
            'address' => sanitize_text_field($_POST['address']),
            'message' => sanitize_text_field($_POST['message']),
        ]
    );
    $customer = new BTCPayWall_Customer();

    $customer->create(
        [
            'full_name' => sanitize_text_field($_POST['name']),
            'email' => sanitize_email($_POST['email']),
            'phone' => (int)$_POST['phone'],
            'address' => sanitize_text_field($_POST['address']),
            'message' => sanitize_text_field($_POST['message']),
        ]
    );
    $currency = sanitize_text_field($_POST['currency']);
    $amount = sanitize_text_field($_POST['amount']);
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
    $get_url     = wp_get_referer();
    $post_id = url_to_postid($get_url);
    if (!empty($_POST['predefined_amount'])) {
        $extract = explode(' ', sanitize_text_field($_POST['predefined_amount']));
        $amount = $extract[0];
        $currency = $extract[1];
    }

    $type = sanitize_text_field($_POST['type']);


    //$url = btcpaywall_tipping_invoice_args($amount, $currency, $type, $customer,$suc)['url'];
    $success_url = get_permalink($post_id);
    $args = btcpaywall_tipping_invoice_args($amount, $currency, $type, $customer, $success_url)['args'];


    $payment_gateway = BTCPayWall::create_client();
    $bod = $payment_gateway->createInvoice(json_decode($args['body'], true));
    $body = btcpaywall_format_server_response($gateway, $bod, $type, $customer);
    $amountToStore = $gateway === 'LNBits' ? $amount : $body['amount'];
    $tipping = new BTCPayWall_Tipping();
    $tipping->create(
        [
            'tipper_id' => $tipper->id,
            'invoice_id' => $body['id'],
            'amount' => $amountToStore,
            'page_title' => get_the_title($post_id),
            'revenue_type' => $body['metadata']['type'],
            'currency' => $body['currency'],
            'status' => $body['status'],
            'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer')
        ]
    );

    $payment = new BTCPayWall_Payment();

    $payment->create(
        [
            'invoice_id' => $body['id'],
            'customer_id' => $customer->id,
            'amount' => $amountToStore,
            'page_title' => get_the_title($post_id),
            'revenue_type' => $body['metadata']['type'],
            'currency' => $body['currency'],
            'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer'),
            'status' => $body['status'],
            'payment_method' => ''
        ]
    );
    $id_or_req = $body['id'] ?? $body['payment_request'];
    $cookie_path = parse_url($success_url, PHP_URL_PATH);
    setcookie("btcpw_donation_initiated_{$post_id}", $id_or_req, time() + 86400, $cookie_path);


    wp_send_json_success(
        [
            'invoice_id' => $body['id'],
            'donor' => $body['metadata']['donor'],
            'payment_request' => $body['payment_request'] ?? ''
        ]
    );
}
add_action('wp_ajax_btcpw_tipping', 'ajax_btcpaywall_tipping');
add_action('wp_ajax_nopriv_btcpw_tipping', 'ajax_btcpaywall_tipping');
/**
 * @since 1.1.0
 */
function btcpaywall_format_server_response($gateway, $response, $type, $customer)
{
    if ($gateway === 'LNBits') {
        $key = ($type === 'Pay-per-file') ? 'customer_data' : 'donor';
        return array(
            'id' => $response['checking_id'],
            'status' => 'New',
            'currency' => 'SATS',
            'payment_request' => $response['payment_request'],
            'metadata' => array(
                'type' => $type,
                $key => $customer
            )
        );
    }
    return $response;
}
function ajax_btcpaywall_paid_invoice()
{
    if (empty($_POST['order_id'])) {
        wp_send_json_error();
    }

    $order_id = sanitize_text_field($_POST['order_id']);
    $post_id = get_post_meta($order_id, 'btcpw_post_id', true);
    $invoice_id = get_post_meta($order_id, 'btcpw_invoice_id', true);
    $secret = get_post_meta($order_id, 'btcpw_secret', true);

    if (empty($post_id) || empty($invoice_id)) {
        wp_send_json_error();
    }

    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
    $url = ($gateway === 'Coinsnap') ? get_option('btcpw_coinsnap_server_url') . '/api/v1/stores/' . get_option('btcpw_coinsnap_store_id') . '/invoices/' . $invoice_id : get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices/' . $invoice_id;
    $auth = ($gateway === 'Coinsnap') ? 'token ' . get_option('btcpw_coinsnap_auth_key') : 'token ' . get_option('btcpw_btcpay_auth_key_view');


    $gateway = BTCPayWall::create_client();
    $body = $gateway->getInvoice($invoice_id);
    $amount = sanitize_text_field($_POST['amount']);
    /*if ($body['status'] !== 'Settled') {
        wp_send_json_error(['message' => 'Invoice is not paid.']);
    }*/
    $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);
    $invalid_statuses = ['failed', 'expired', 'Unpaid', 'Expired', 'Cancelled', 'Failed', 'Invalid', 'Expired'];
    if (in_array($body['status'], $invalid_statuses) && body['paid'] != true) {
        setcookie("btcpw_initiated_{$post_id}", '', time() - 3600, $cookie_path);
        wp_send_json_error(['message' => 'Donation is not paid.']);
    }

    $valid_statuses = ['paid', 'Complete', 'Settled', 'Paid'];
    if (!in_array($body['status'], $valid_statuses) && body['paid'] != true) {
        wp_send_json_error(['message' => 'Donation is not paid.']);
    }

    $payment = new BTCPayWall_Payment($invoice_id);



    $payment_method = btcpaywall_get_payment_method($body['id']);

    $payment->update(array('status' => $body['status'], 'payment_method' => $payment_method));


    update_post_meta($body['metadata']['orderId'], 'btcpw_payment_id', $payment->invoice_id);

    setcookie("btcpw_{$post_id}", $secret, btcpaywall_get_cookie_duration($post_id), $cookie_path);
    setcookie("btcpw_initiated_{$post_id}", '', time() - 3600, $cookie_path);

    update_post_meta($order_id, 'btcpw_status', 'success');
    btcpaywall_notify_administrator(btcpaywall_get_notify_administrator_body($invoice_id, $body['metadata']['customer_data'], $body['metadata']['type']), 'Pay');
    
    if(isset($body['metadata']['customer_data']) && isset($body['metadata']['customer_data']['email'])){
        btcpaywall_notify_customer($body['metadata']['customer_data']['email'], btcpaywall_get_notify_customers_body($invoice_id, $body['metadata']['customer_data']),'Pay');
    }
    
    wp_send_json_success();
}

add_action('wp_ajax_btcpw_paid_invoice', 'ajax_btcpaywall_paid_invoice');
add_action('wp_ajax_nopriv_btcpw_paid_invoice', 'ajax_btcpaywall_paid_invoice');

function ajax_btcpaywall_paid_tipping()
{
    if (empty($_POST['invoice_id'])) {
        wp_send_json_error();
    }

    $invoice_id = sanitize_text_field($_POST['invoice_id']);
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
    $url = ($gateway === 'Coinsnap') ? get_option('btcpw_coinsnap_server_url') . '/api/v1/stores/' . get_option('btcpw_coinsnap_store_id') . '/invoices/' . $invoice_id : get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices/' . $invoice_id;
    $auth = ($gateway === 'Coinsnap') ? 'token ' . get_option('btcpw_coinsnap_auth_key') : 'token ' . get_option('btcpw_btcpay_auth_key_view');

    $get_url     = wp_get_referer();
    $post_id = url_to_postid($get_url);
    $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);

    $gateway = BTCPayWall::create_client();
    $body = $gateway->getInvoice($invoice_id);

    $tipping = new BTCPayWall_Tipping($invoice_id);
    $payment_method = btcpaywall_get_payment_method($body['id']);
    $invalid_statuses = ['failed', 'expired', 'Unpaid', 'Expired', 'Cancelled', 'Failed', 'Invalid', 'Expired'];
    if (in_array($body['status'], $invalid_statuses)) {
        setcookie("btcpw_donation_initiated_{$post_id}", '', time() - 3600, $cookie_path);
        wp_send_json_error(['message' => 'Donation is not paid.']);
    }

    $valid_statuses = ['paid', 'Complete', 'Settled', 'Paid'];
    if (!in_array($body['status'], $valid_statuses) && $body['paid'] != true) {
        wp_send_json_error(['message' => 'Donation is not paid.']);
    }

    $tipping->update(array('status' => 'Paid', 'payment_method' => $payment_method));
    $payment = new BTCPayWall_Payment($invoice_id);

    $payment->update(array('status' => 'Paid', 'payment_method' => $payment_method));
    setcookie("btcpw_donation_initiated_{$post_id}", '', time() - 3600, $cookie_path);
    //btcpaywall_notify_administrator($body['metadata']['donor']);
    btcpaywall_notify_administrator(btcpaywall_get_notify_administrator_body($invoice_id, $body['metadata']['donor'], $body['metadata']['type']), 'Tipping');
    
    if(isset($body['metadata']['donor']) && isset($body['metadata']['donor']['email'])){
        btcpaywall_notify_customer($body['metadata']['donor']['email'], btcpaywall_get_notify_customers_body($invoice_id, $body['metadata']['donor']), 'Tipping');
    }
    wp_send_json_success();
}
add_action('wp_ajax_btcpw_paid_tipping', 'ajax_btcpaywall_paid_tipping');
add_action('wp_ajax_nopriv_btcpw_paid_tipping', 'ajax_btcpaywall_paid_tipping');


/**
 * Retrieve OrderId and InvoiceID for OpenNode
 *
 * @param int $post_id  WP Post id.
 * @param int $order_id Order id.
 *
 * @since 1.0
 *
 * @return array Return invoice id and amount
 * @throws WP_Error
 */
function btcpaywall_generate_opennode_invoice_id($post_id, $order_id, $customer_data)
{
    $amount = btcpaywall_calculate_price_for_invoice($post_id);

    $url = 'https://api.opennode.com/v1/charges';
    $currency_scope = get_post_meta($post_id, 'btcpw_currency', true) ? get_post_meta($post_id, 'btcpw_currency', true) : get_option('btcpw_default_currency', 'SATS');
    $get_url     = wp_get_referer();
    $get_post_id = $post_id ? $post_id : url_to_postid($get_url);
    $blogname = get_post($get_post_id)->post_title;

    $currency = $currency_scope === 'SATS' ? 'BTC' : $currency_scope;


    $data = array(
        'amount' => $amount,
        'currency' => $currency,
        'order_id' => $order_id,
        'success_url' => get_permalink($post_id),
        'metadata' => array(
            'orderId' => $order_id,
            'type' => 'Pay-per-' . get_post_meta($post_id, 'btcpw_invoice_content', true)['project'],
            'blog' => $blogname,
            'buyer' => array(
                'name' => (string) $_SERVER['REMOTE_ADDR']
            ),
            'customer_data' => $customer_data
        )
    );

    $args = array(
        'headers' => array(
            'Authorization' => get_option('btcpw_opennode_auth_key'),
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
    $revenue_type = $body['data']['metadata']['type'];


    $customer = new BTCPayWall_Customer();

    $customer->create(
        [
            'full_name' => sanitize_text_field($customer_data['full_name']),
            'email' => sanitize_email($customer_data['email']),
            'address' => sanitize_text_field($customer_data['address']),
            'phone' => sanitize_text_field($customer_data['phone']),
            'message' => sanitize_text_field($customer_data['message'])
        ]
    );

    $payment = new BTCPayWall_Payment();

    $payment->create(
        [
            'invoice_id' => $body['data']['id'],
            'customer_id' => $customer->id,
            'amount' => floatval($body['data']['amount']),
            'page_title' => $body['data']['metadata']['blog'],
            'revenue_type' => $revenue_type,
            'currency' => $body['data']['currency'],
            'status' => $body['data']['status'],
            'payment_method' => 'BTC',
            'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer'),
            'date_created'  => date('Y-m-d H:i:s', $body['data']['created_at'])
        ]
    );

    update_post_meta($order_id, 'btcpw_invoice_id', $body['data']['id']);


    return array(
        'id' => $body['data']['id'],
        'amount' => $body['data']['amount'] . $body['data']['currency']
    );
}
/**
 * Retrieve OrderId and InvoiceID for LNBits
 *
 * @param int $post_id  WP Post id.
 * @param int $order_id Order id.
 *
 * @since 1.1.0
 *
 * @return array Return invoice id and amount
 * @throws WP_Error
 */
function btcpaywall_generate_lnbits_invoice_id($post_id, $order_id, $customer_data)
{
    $amount = btcpaywall_calculate_price_for_invoice($post_id);

    $url = get_option('btcpw_lnbits_server_url') . '/api/v1/payments';
    $get_url     = wp_get_referer();
    $get_post_id = $post_id ? $post_id : url_to_postid($get_url);
    $blogname = get_post($get_post_id)->post_title;



    $memo = json_encode(
        array(
            'orderId' => $order_id,
            'type' => 'Pay-per-' . get_post_meta($post_id, 'btcpw_invoice_content', true)['project'],
            'blog' => $blogname,
            'buyer' => array(
                'name' => (string) $_SERVER['REMOTE_ADDR']
            ),
            'customer_data' => $customer_data
        )
    );
    //"orderId=$order_id, type=$type, blog=$blogname"
    $type = 'Pay-per-' . get_post_meta($post_id, 'btcpw_invoice_content', true)['project'];
    $data = array(
        'out' => false,
        'amount' => $amount,
        'memo' => $memo,
    );

    $args = array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'X-Api-Key' => get_option('btcpw_lnbits_auth_key'),
        ),
        'body' => json_encode($data),
        'method' => 'POST',
        'timeout' => 60,
    );
    $response = wp_remote_request($url, $args);

    if (is_wp_error($response)) {
        return $response;
    }


    $body = json_decode($response['body'], true);

    if (empty($body) || !empty($body['error'])) {
        return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
    }
    //$revenue_type = $body['data']['metadata']['type'];


    $customer = new BTCPayWall_Customer();

    $customer->create(
        [
            'full_name' => sanitize_text_field($customer_data['full_name']),
            'email' => sanitize_email($customer_data['email']),
            'address' => sanitize_text_field($customer_data['address']),
            'phone' => sanitize_text_field($customer_data['phone']),
            'message' => sanitize_text_field($customer_data['message'])
        ]
    );

    $payment = new BTCPayWall_Payment();

    $payment->create(
        [
            'invoice_id' => $body['checking_id'],
            'customer_id' => $customer->id,
            'amount' => floatval($amount),
            'page_title' => $blogname,
            'revenue_type' => $type,
            'currency' => 'SATS',
            'status' => 'New',
            'payment_method' => 'BTC',
            'gateway' => 'LNBits',
            'date_created'  => date('Y-m-d H:i:s')
        ]
    );

    update_post_meta($order_id, 'btcpw_invoice_id', $body['checking_id']);


    return array(
        'id' => $body['checking_id'],
        'amount' => $amount,
        'payment_request' => $body['payment_request']
    );
}

function btcpaywall_tipping_invoice_args($amount, $currency, $type, $collects, $success_url)
{
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
    //$url = ($gateway === 'Coinsnap') ? get_option('btcpw_coincharge_pay_server_url') . '/api/v2/stores/' . get_option('btcpw_coincharge_pay_store_id') . '/invoices/' : get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';
    if ($gateway === 'Coinsnap') {
        $url = get_option('btcpw_coinsnap_server_url') . '/api/v1/stores/' . get_option('btcpw_coinsnap_store_id') . '/invoices/';
        $auth =  'token ' . get_option('btcpw_coinsnap_auth_key');
        $data = array(
            'amount' => $amount,
            'currency' => $currency,
            'referralCode' => 'DEV1ecd86d85cd2f8084b7a51701',
            'metadata' => array(
                'type' => $type,
                'donor' => $collects,
            )
        );
        $args = array(
            'headers' => array(
                'Authorization' => $auth,
                'Content-Type' => 'application/json',
            ),
            'body' => json_encode($data),
            'method' => 'POST',
            'timeout' => 60,
        );
        return array(
            'url' => $url,
            'args' => $args
        );
    } elseif ($gateway === 'BTCPayServer') {
        $auth =  'token ' . get_option('btcpw_btcpay_auth_key_create');
        $url =  get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';
        $data = array(
            'amount' => $amount,
            'currency' => $currency,
            'metadata' => array(
                'type' => $type,
                'donor' => $collects,
            )
        );
        $args = array(
            'headers' => array(
                'Authorization' => $auth,
                'Content-Type' => 'application/json',
            ),
            'body' => json_encode($data),
            'method' => 'POST',
            'timeout' => 60,
        );
        return array(
            'url' => $url,
            'args' => $args
        );
    } elseif ($gateway === 'OpenNode') {
        $auth = get_option('btcpw_opennode_auth_key');
        $url = 'https://api.opennode.com/v1/charges';
        $data = array(
            'amount' => $amount,
            'currency' => $currency === 'SATS' ? 'BTC' : $currency,
            'success_url' => $success_url,
            'metadata' => array(
                'type' => $type,
                'donor' => $collects,
            ),
        );
        $args = array(
            'headers' => array(
                'Authorization' => $auth,
                'Content-Type' => 'application/json',
            ),
            'body' => json_encode($data),
            'method' => 'POST',
            'timeout' => 60,
        );
        return array(
            'url' => $url,
            'args' => $args
        );
    } elseif ($gateway === 'LNBits') {
        $url = get_option('btcpw_lnbits_server_url') . '/api/v1/payments';
        $auth = get_option('btcpw_lnbits_auth_key');
        $data = array(
            'amount' => $amount,
            'out' => false,
            'memo' => json_encode(
                array(
                    'type' => $type,
                    'donor' => $collects,
                )
            ),
        );
        $args = array(
            'headers' => array(
                'X-Api-Key' => $auth,
                'Content-Type' => 'application/json',
            ),
            'body' => json_encode($data),
            'method' => 'POST',
            'timeout' => 60,
        );
        return array(
            'url' => $url,
            'args' => $args
        );
    }
}

function ajax_btcpaywall_paid_opennode_invoice()
{
    $id = sanitize_text_field($_POST['id']);

    if (!$id) {
        wp_send_json_error(
            [
                'message' => 'Invoice doesn\'t exist',
                'status' => 404
            ]
        );
    }
    $url = "https://api.opennode.com/v1/charge/{$id}";


    $args = array(
        'headers' => array(
            'Authorization' => get_option('btcpw_opennode_auth_key'),
            'Content-Type' => 'application/json',
        ),
        'method' => 'GET',
        'timeout' => 60,
    );
    $response = wp_remote_request($url, $args);

    if (is_wp_error($response)) {
        wp_send_json_error(
            [
                'message' => 'Invoice doesn\'t exist',
                'status' => 404
            ]
        );
    }


    $body = json_decode($response['body'], true);

    if (empty($body) || !empty($body['error'])) {
        return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
    }
    $order_id = $body['data']['metadata']['orderId'];

    $post_id = get_post_meta($body['data']['metadata']['orderId'], 'btcpw_post_id', true);
    $invoice_id = get_post_meta($body['data']['metadata']['orderId'], 'btcpw_invoice_id', true);
    $secret = get_post_meta($body['data']['metadata']['orderId'], 'btcpw_secret', true);
    $content_title = get_post_meta($post_id, 'btcpw_invoice_content', true)['title'];

    if ($body['data']['status'] !== 'paid') {
        wp_send_json_error(['message' => 'Invoice is not paid.']);
    }
    $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);
    $amount = "{$body['data']['amount']} {$body['data']['currency']}";
    $payment = new BTCPayWall_Payment($invoice_id);

    $payment->update(array('status' => $body['data']['status'], 'payment_method' => 'BTC'));
    update_post_meta($body['data']['metadata']['orderId'], 'btcpw_payment_id', $payment->invoice_id);

    setcookie("btcpw_{$post_id}", $secret, btcpaywall_get_cookie_duration($post_id), $cookie_path);
    setcookie("btcpw_initiated_{$post_id}", '', time() - 3600, $cookie_path);

    update_post_meta($order_id, 'btcpw_status', 'success');
    btcpaywall_notify_administrator(btcpaywall_get_notify_administrator_body($invoice_id, $body['data']['metadata']['customer_data'], $body['data']['metadata']['type']), 'Pay');
    
    if(isset($body['data']['metadata']['customer_data']) && isset($body['data']['metadata']['customer_data']['email'])){
        btcpaywall_notify_customer($body['data']['metadata']['customer_data']['email'], btcpaywall_get_notify_customers_body($invoice_id, $body['data']['metadata']['customer_data']), 'Pay');
    }
    wp_send_json_success(
        array(
            'status' => $body['data']['status'],
            'expires' => $body['data']['expires_at'],
        )
    );
}
add_action('wp_ajax_opennode_paid_invoice', 'ajax_btcpaywall_paid_opennode_invoice');
add_action('wp_ajax_nopriv_opennode_paid_invoice', 'ajax_btcpaywall_paid_opennode_invoice');
/**
 * @since 1.1.o
 */
function ajax_btcpaywall_paid_lnbits_invoice()
{
    $id = sanitize_text_field($_POST['invoice_id']);
    if (!$id) {
        wp_send_json_error(
            [
                'message' => 'Invoice doesn\'t exist',
                'status' => 404
            ]
        );
    }
    $payment_gateway = BTCPayWall::create_client();
    $body = $payment_gateway->getInvoice($id);

    if (empty($body) || !empty($body['error'])) {
        return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
    }
    $memo = json_decode($body['details']['memo'], true);

    $order_id = $memo['orderId'];
    $post_id = get_post_meta($memo['orderId'], 'btcpw_post_id', true);
    $invoice_id = get_post_meta($memo['orderId'], 'btcpw_invoice_id', true);
    $secret = get_post_meta($memo['orderId'], 'btcpw_secret', true);
    $content_title = get_post_meta($post_id, 'btcpw_invoice_content', true)['title'];

    if ($body['paid'] !== true) {
        wp_send_json_error(['message' => 'Invoice is not paid.']);
    }
    $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);
    $amount = "{$body['data']['amount']} {$body['data']['currency']}";
    $payment = new BTCPayWall_Payment($invoice_id);

    $status = $body['paid'] === true ? 'Settled' : 'Invalid';
    $payment->update(array('status' => $status, 'payment_method' => 'Lightning'));
    update_post_meta($memo['orderId'], 'btcpw_payment_id', $payment->invoice_id);

    setcookie("btcpw_initiated_{$post_id}", false, time() - 3600, $cookie_path);
    setcookie("btcpw_{$post_id}", $secret, btcpaywall_get_cookie_duration($post_id), $cookie_path);

    update_post_meta($order_id, 'btcpw_status', 'success');
    btcpaywall_notify_administrator(btcpaywall_get_notify_administrator_body($invoice_id, $memo['customer_data'], $memo['type']), 'Pay');
    
    if(isset($memo['customer_data']) && isset($memo['customer_data']['email'])){
        btcpaywall_notify_customer($memo['customer_data']['email'], btcpaywall_get_notify_customers_body($invoice_id, $memo['customer_data']), 'Pay');
    }
    wp_send_json_success(
        array(
            'status' => $status,
            'expires' => $body['details']['expiry'],
        )
    );
}
add_action('wp_ajax_lnbits_paid_invoice', 'ajax_btcpaywall_paid_lnbits_invoice');
add_action('wp_ajax_nopriv_lnbits_paid_invoice', 'ajax_btcpaywall_paid_lnbits_invoice');
/**
 * @since 1.0.2
 */
function ajax_btcpaywall_paid_tipping_opennode_invoice()
{
    $id = sanitize_text_field($_POST['id']);

    if (!$id) {
        wp_send_json_error(
            [
                'message' => 'Invoice doesn\'t exist',
                'status' => 404
            ]
        );
    }

    $get_url     = wp_get_referer();
    $post_id = url_to_postid($get_url);
    $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);

    $payment_gateway = BTCPayWall::create_client();
    $body = $payment_gateway->getInvoice($id);
    //$body = json_decode($response['body'], true);
    $invalid_statuses = ['failed', 'expired', 'Unpaid', 'Expired', 'Cancelled', 'Failed', 'Invalid', 'Expired'];

    if (in_array($body['status'], $invalid_statuses) && $body['paid'] != true) {
        setcookie("btcpw_donation_initiated_{$post_id}", '', time() - 3600, $cookie_path);
        wp_send_json_error(['message' => 'Donation is not paid.']);
    }
    $valid_statuses = ['paid', 'Complete', 'Settled', 'Paid'];
    if (!in_array($body['status'], $valid_statuses) && body['paid'] != true) {
        wp_send_json_error(['message' => 'Donation is not paid.']);
    }


    setcookie("btcpw_donation_initiated_{$post_id}", '', time() - 3600, $cookie_path);
    $amount = "{$body['amount']} {$body['currency']}";




    $tipping = new BTCPayWall_Tipping($id);
    $payment = new BTCPayWall_Payment($id);

    $payment->update(array('status' => $body['status'], 'payment_method' => 'BTC'));
    $tipping->update(array('status' => $body['status'], 'payment_method' => 'BTC'));
    btcpaywall_notify_administrator(btcpaywall_get_notify_administrator_body($id, $body['metadata']['donor'], $body['metadata']['type']), 'Tipping');
    if(isset($body['metadata']['donor']) && isset($body['metadata']['donor']['email'])){
        btcpaywall_notify_customer($body['metadata']['donor']['email'], btcpaywall_get_notify_customers_body($id, $body['metadata']['donor']), 'Tipping');
    }
    wp_send_json_success(
        array(
            'status' => $body['status'],
            'expires' => $body['expires_at'],
        )
    );
}
add_action('wp_ajax_opennode_tipping_paid_invoice', 'ajax_btcpaywall_paid_tipping_opennode_invoice');
add_action('wp_ajax_nopriv_opennode_tipping_paid_invoice', 'ajax_btcpaywall_paid_tipping_opennode_invoice');

/**
 * @since 1.1.0
 */
function ajax_btcpaywall_paid_tipping_lnbits_invoice()
{
    $id = sanitize_text_field($_POST['id']);

    if (!$id) {
        wp_send_json_error(
            [
                'message' => 'Invoice doesn\'t exist',
                'status' => 404
            ]
        );
    }
    $get_url     = wp_get_referer();
    $post_id = url_to_postid($get_url);
    $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);
    $payment_gateway = BTCPayWall::create_client();
    $body = $payment_gateway->getInvoice($id);
    //$body = json_decode($response['body'], true);
    $invalid_statuses = ['failed', 'expired', 'Unpaid', 'Expired', 'Cancelled', 'Failed', 'Invalid', 'Expired'];

    if (in_array($body['status'], $invalid_statuses) && $body['paid'] != true) {
        setcookie("btcpw_donation_initiated_{$post_id}", '', time() - 3600, $cookie_path);
        wp_send_json_error(['message' => 'Donation is not paid.']);
    }
    $valid_statuses = ['paid', 'Complete', 'Settled', 'Paid'];
    if (!in_array($body['status'], $valid_statuses) && body['paid'] != true) {
        wp_send_json_error(['message' => 'Donation is not paid.']);
    }


    setcookie("btcpw_donation_initiated_{$post_id}", '', time() - 3600, $cookie_path);


    $memo = json_decode($body['details']['memo'], true);

    $order_id = $memo['orderId'];


    $amount = "{$body['data']['amount']} {$body['data']['currency']}";




    $tipping = new BTCPayWall_Tipping($id);
    $payment = new BTCPayWall_Payment($id);
    $status = 'Paid';
    $payment->update(array('status' => $status, 'payment_method' => 'Lightning'));
    $tipping->update(array('status' => $status, 'payment_method' => 'Lightning'));
    btcpaywall_notify_administrator(btcpaywall_get_notify_administrator_body($id, $memo['donor'], $memo['type']), 'Tipping');
    if(isset($memo['donor']) && isset($memo['donor']['email'])){
        btcpaywall_notify_customer($memo['donor']['email'], btcpaywall_get_notify_customers_body($id, $memo['donor']), 'Tipping');
    }
    wp_send_json_success(
        array(
            'status' => $status,
            'expires' => $body['expiry'],
        )
    );
}
add_action('wp_ajax_lnbits_tipping_paid_invoice', 'ajax_btcpaywall_paid_tipping_lnbits_invoice');
add_action('wp_ajax_nopriv_lnbits_tipping_paid_invoice', 'ajax_btcpaywall_paid_tipping_lnbits_invoice');
function ajax_btcpaywall_add_to_cart()
{
    if (!is_numeric($_POST['id'])) {
        wp_send_json_error();
    }
    $download_id = absint($_POST['id']);
    BTCPayWall()->cart->add($download_id, array('title' => sanitize_text_field($_POST['title'])));
    $checkout_page = get_permalink(get_option('btcpw_checkout_page'));
    wp_send_json_success(['data' => $checkout_page]);
}
add_action('wp_ajax_btcpw_add_to_cart', 'ajax_btcpaywall_add_to_cart');
add_action('wp_ajax_nopriv_btcpw_add_to_cart', 'ajax_btcpaywall_add_to_cart');




function ajax_btcpaywall_remove_from_cart()
{
    if (!is_numeric($_POST['cart_item'])) {
        wp_send_json_error();
    }
    $cart_item = absint($_POST['cart_item']);

    btcpaywall_remove_from_cart($cart_item);

    wp_send_json_success();
}
add_action('wp_ajax_btcpw_remove_from_cart', 'ajax_btcpaywall_remove_from_cart');
add_action('wp_ajax_nopriv_btcpw_remove_from_cart', 'ajax_btcpaywall_remove_from_cart');





function ajax_btcpaywall_generate_invoice_id_content_file()
{
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
    $products = BTCPayWall()->cart->get_contents();
    $total = btcpaywall_get_total();
    $currency = ($gateway === 'OpenNode' && get_option('btcpw_default_pay_per_file_currency') === 'SATS') ? 'BTC' : get_option('btcpw_default_pay_per_file_currency');
    $customer_data = array(
        'full_name' => sanitize_text_field($_POST['full_name']) ?? "",
        'email' => sanitize_email($_POST['email']) ?? "",
        'address' => sanitize_text_field($_POST['address']) ?? "",
        'phone' => sanitize_text_field($_POST['phone']),
        'message' => sanitize_text_field($_POST['message']) ?? "",
    );

    $posts = '';
    $downloads = array();
    foreach ($products as $key => $val) {
        $posts .= " {$val['id']}";
        $downloads[] = $val['id'];
    }
    /*$order_id = wp_insert_post([
        'post_title' => 'Pay ' . $posts . ' from ' . $_SERVER['REMOTE_ADDR'],
        'post_status' => 'publish',
        'post_type' => 'btcpw_order',
    ]);*/
    $order_id = btcpaywall_generate_order_id($posts);
    $data = [];
    if ($gateway === 'Coinsnap') {
        $data = array(
            'amount' => $total,
            'currency' => $currency,
            'order_id' => $order_id,
            'referralCode' => 'DEV1ecd86d85cd2f8084b7a51701',
            'metadata' => array(
                'orderId' => $order_id,
                'type' => 'Pay-per-file',
                'customer_data' => $customer_data
            )
        );
    } elseif ($gateway === 'BTCPayServer') {
        $data = array(
            'amount' => $total,
            'currency' => $currency,
            'order_id' => $order_id,
            'metadata' => array(
                'orderId' => $order_id,
                'type' => 'Pay-per-file',
                'customer_data' => $customer_data
            )
        );
    } elseif ($gateway === 'OpenNode') {
        $data = array(
            'amount' => $total,
            'currency' => $currency,
            'success_url' => get_permalink(get_option('btcpw_success_page')),
            'order_id' => $order_id,
            'metadata' => array(
                'orderId' => $order_id,
                'type' => 'Pay-per-file',
                'customer_data' => $customer_data
            )
        );
    } elseif ($gateway === 'LNBits') {
        $data = array(
            'amount' => $total,
            'out' => false,
            'memo' => json_encode(
                array(
                    'orderId' => $order_id,
                    'type' => 'Pay-per-file',
                    'customer_data' => $customer_data
                )
            ),
        );
    }
    $payment_gateway = BTCPayWall::create_client();
    $bod = $payment_gateway->createInvoice($data);
    $customer = new BTCPayWall_Customer();

    $customer->create(
        [
            'full_name' => sanitize_text_field($_POST['full_name']),
            'email' => sanitize_email($_POST['email']),
            'address' => sanitize_text_field($_POST['address']),
            'phone' => sanitize_text_field($_POST['phone']),
            'message' => sanitize_text_field($_POST['message']),
        ]
    );

    $body = btcpaywall_format_server_response($gateway, $bod, 'Pay-per-file', $customer);

    $payment = new BTCPayWall_Payment();

    $fileAmount = $gateway === 'LNBits' ? floatval($total) : floatval($body['amount']);
    $payment->create(
        [
            'invoice_id' => $body['id'],
            'customer_id' => $customer->id,
            'amount' => $fileAmount,
            'page_title' => $body['metadata']['blog'],
            'revenue_type' => 'Pay-per-file',
            'currency' => $body['currency'],
            'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer'),
            'download_ids' => $downloads,
            'status' => $body['status'],
            'payment_method' => '',
            'date_created'  => date('Y-m-d H:i:s')
        ]
    );
    setcookie('btcpaywall_initiated_purchase', $body['id'], time() + 60 * 60 * 24 * 30, '/');

    wp_send_json_success(
        [
            'invoice_id' => $body['id'],
            'payment_request' => $body['payment_request'] ?? ''
        ]
    );
}
add_action('wp_ajax_btcpw_generate_content_file_invoice_id', 'ajax_btcpaywall_generate_invoice_id_content_file');
add_action('wp_ajax_nopriv_btcpw_generate_content_file_invoice_id', 'ajax_btcpaywall_generate_invoice_id_content_file');




function ajax_btcpaywall_paid_content_file_invoice()
{
    if (empty($_POST['invoice_id'])) {
        wp_send_json_error();
    }

    $invoice_id = sanitize_text_field($_POST['invoice_id']);

    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');

    $payment_gateway = BTCPayWall::create_client();
    $bod = $payment_gateway->getInvoice($invoice_id);
    $payment = new BTCPayWall_Payment($invoice_id);

    $customer = new BTCPayWall_Customer($payment->customer_id);

    $body = btcpaywall_format_server_response(
        $gateway,
        $bod,
        'Pay-per-file',
        [
            'full_name' => $customer->full_name,
            'email' => $customer->email,
            'address' => $customer->address,
            'phone' => $customer->phone,
            'message' => $customer->message
        ]
    );
    if (empty($body) || !empty($bod['error'])) {
        return new WP_Error('invoice_error', $bod['error'] ?? 'Something went wrong');
    }
    $storeId = get_option('btcpw_btcpay_store_id');
    $siteurl = get_option('siteurl');
    $date = date('Y-m-d H:i:s', current_time('timestamp', 0));
    //Consider below
    $invalid_statuses = ['failed', 'expired', 'Unpaid', 'Expired', 'Cancelled', 'Failed', 'Invalid', 'Expired'];

    $payment_method = btcpaywall_get_payment_method($body['id']) ? btcpaywall_get_payment_method($body['id']) : 'BTC';

    $db_links = array();
    $download_ids = explode(',', $payment->download_ids);
    foreach ($download_ids as $link_id) {
        $download = new BTCPayWall_Digital_Download($link_id);
        $download->increase_sales();
        $link = btcpaywall_get_download_url($payment->invoice_id, $link_id, $customer->email, attachment_url_to_postid($download->get_file_url()));
        $db_links[] = esc_url_raw(rawurldecode($link));
    }
    $valid_statuses = ['paid', 'Complete', 'Settled', 'Paid'];
    $status = (in_array($body['status'], $valid_statuses) || body['paid'] == true) ? 'Paid' : 'Unpaid';
    if (in_array($body['status'], $invalid_statuses) && $body['paid'] != true) {
        setcookie("btcpaywall_initiated_purchase", '', time() - 3600, "/");
    }
    $payment->update(
        array(
            'status' => $status, 'payment_method' => $payment_method, 'download_links' => $db_links
        )
    );
    if ($status == 'Paid') {
        setcookie("btcpaywall_initiated_purchase", '', time() - 3600, "/");
        if(isset($body['metadata']['customer_data']) && isset($body['metadata']['customer_data']['email'])){
            btcpaywall_notify_customer($body['metadata']['customer_data']['email'], btcpaywall_get_notify_customers_body($invoice_id, $body['metadata']['customer_data']), 'Pay');
        }
        BTCPayWall()->cart->empty_cart();
        btcpaywall_notify_administrator(btcpaywall_get_notify_administrator_body($invoice_id, $body['metadata']['customer_data'], 'Pay-per-file'), 'Pay');
    }
    setcookie('btcpaywall_purchase', $payment->invoice_id, time() + 60 * 60 * 24 * 30, '/');
    wp_send_json_success();
}

add_action('wp_ajax_btcpw_paid_content_file_invoice', 'ajax_btcpaywall_paid_content_file_invoice');
add_action('wp_ajax_nopriv_btcpw_paid_content_file_invoice', 'ajax_btcpaywall_paid_content_file_invoice');


/**
 * @since 1.0.1
 */

function ajax_btcpaywall_opennode_monitor_invoice_status()
{
    if (empty($_GET['invoice_id'])) {
        wp_send_json_error(['status' => 'unpaid']);
    }

    $invoice_id = sanitize_text_field($_GET['invoice_id']);
    $gateway = BTCPayWall::create_client();
    $body = $gateway->getInvoice($invoice_id);


    if ($body['status'] !== 'paid') {
        wp_send_json_error(['status' => 'unpaid']);
    }

    wp_send_json_success(['status' => 'paid']);
}

add_action('wp_ajax_btcpw_opennode_monitor_invoice_status', 'ajax_btcpaywall_opennode_monitor_invoice_status');
add_action('wp_ajax_nopriv_btcpw_opennode_monitor_invoice_status', 'ajax_btcpaywall_opennode_monitor_invoice_status');

/**
 * @since 1.1.0
 */

function ajax_btcpaywall_lnbits_monitor_invoice_status()
{
    if (empty($_GET['invoice_id'])) {
        wp_send_json_error(['status' => 'unpaid']);
    }

    $invoice_id = sanitize_text_field($_GET['invoice_id']);
    $url = get_option('btcpw_lnbits_server_url') . '/api/v1/payments/' . $invoice_id;


    $args = array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'X-Api-Key' => get_option('btcpw_lnbits_auth_key'),
        ),
        'method' => 'GET',
        'timeout' => 60,
    );

    $response = wp_remote_request($url, $args);

    if (is_wp_error($response)) {
        return $response;
    }
    $body = json_decode($response['body'], true);


    if (empty($body) || !empty($body['error'])) {
        return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
    }

    if ($body['paid'] !== true) {
        wp_send_json_error(['status' => 'unpaid']);
    }

    wp_send_json_success(['status' => 'paid']);
}

add_action('wp_ajax_btcpw_lnbits_monitor_invoice_status', 'ajax_btcpaywall_lnbits_monitor_invoice_status');
add_action('wp_ajax_nopriv_btcpw_lnbits_monitor_invoice_status', 'ajax_btcpaywall_lnbits_monitor_invoice_status');

function ajax_btcpaywall_coinsnap_monitor_invoice_status()
{
    if (empty($_GET['invoice_id'])) {
        wp_send_json_error(['status' => 'unpaid']);
    }

    $invoice_id = sanitize_text_field($_GET['invoice_id']);


    $gateway = BTCPayWall::create_client();
    $body = $gateway->getInvoice($invoice_id);
    $paid_statuses = ['paid', 'Paid', 'Overpaid', 'Settled'];
    if (!in_array($body['status'], $paid_statuses) && $body['paid'] != true) {
        wp_send_json_error(['status' => 'unpaid']);
    }

    wp_send_json_success(['status' => $body['status'] ?? 'paid']);
}

add_action('wp_ajax_btcpw_coinsnap_monitor_invoice_status', 'ajax_btcpaywall_coinsnap_monitor_invoice_status');
add_action('wp_ajax_nopriv_btcpw_coinsnap_monitor_invoice_status', 'ajax_btcpaywall_coinsnap_monitor_invoice_status');


function ajax_btcpaywall_check_invoice_after_expiration()
{
    if (empty($_POST['order_id'])) {
        wp_send_json_error();
    }

    $order_id = sanitize_text_field($_POST['order_id']);
    $post_id = get_post_meta($order_id, 'btcpw_post_id', true);
    $invoice_id = get_post_meta($order_id, 'btcpw_invoice_id', true);
    $secret = get_post_meta($order_id, 'btcpw_secret', true);
    if (empty($post_id) || empty($invoice_id)) {
        wp_send_json_error();
    }

    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');


    $gateway = BTCPayWall::create_client();
    $body = $gateway->getInvoice($invoice_id);
    $amount = sanitize_text_field($_POST['amount']);
    $invalid_statuses = ['failed', 'expired', 'Unpaid', 'Expired', 'Cancelled', 'Failed', 'Invalid', 'Expired'];
    $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);
    if (in_array($body['status'], $invalid_statuses)) {
        setcookie("btcpw_initiated_{$post_id}", '', time() - 3600, $cookie_path);
        wp_send_json_error(['message' => 'Invoice is invalid.']);
    }
    $valid_statuses = ['paid', 'Complete', 'Settled', 'Paid'];
    if (!in_array($body['status'], $valid_statuses) && $body['paid'] !== 'true') {
        wp_send_json_error(['message' => 'Invoice is invalid.']);
    }
    if (get_post_meta($order_id, 'btcpw_status', true) == 'success') {
        wp_send_json_error(["message" => "Order was processed"]);
    }

    $payment = new BTCPayWall_Payment($invoice_id);



    $payment_method = btcpaywall_get_payment_method($body['id']);

    $payment->update(array('status' => $body['status'], 'payment_method' => $payment_method));


    update_post_meta($body['metadata']['orderId'], 'btcpw_payment_id', $payment->invoice_id);

    setcookie("btcpw_{$post_id}", $secret, btcpaywall_get_cookie_duration($post_id), $cookie_path);
    setcookie("btcpw_initiated_{$post_id}", '', time() - 3600, $cookie_path);

    update_post_meta($order_id, 'btcpw_status', 'success');
    btcpaywall_notify_administrator(btcpaywall_get_notify_administrator_body($invoice_id, $body['metadata']['customer_data'], $body['metadata']['type']), 'Pay');
    if(isset($body['metadata']['customer_data']) && isset($body['metadata']['customer_data']['email'])){
        btcpaywall_notify_customer($body['metadata']['customer_data']['email'], btcpaywall_get_notify_customers_body($invoice_id, $body['metadata']['customer_data']), 'Pay');
    }
    wp_send_json_success();
}

add_action('wp_ajax_btcpw_check_order_after_expiration', 'ajax_btcpaywall_check_invoice_after_expiration');
add_action('wp_ajax_nopriv_btcpw_check_order_after_expiration', 'ajax_btcpaywall_check_invoice_after_expiration');
