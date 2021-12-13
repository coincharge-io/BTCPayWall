<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;
/**
 * Generate invoice and order id
 * 
 * @since 1.0
 * 
 * @return void
 */
function ajax_get_invoice_id()
{

    if (empty($_GET['post_id'])) {
        wp_send_json_error(['message' => 'post_id required']);
    }

    $customer_data = array(
        'full_name' => sanitize_text_field($_GET['full_name']),
        'email' => sanitize_email($_GET['email']),
        'address' => sanitize_text_field($_GET['address']),
        'phone' => sanitize_text_field($_GET['phone']),
        'message' => sanitize_text_field($_GET['message']),
    );
    $post_id = sanitize_text_field($_GET['post_id']);
    $order_id = generate_order_id($post_id);
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');

    if ($gateway === 'BTCPayServer') {
        $invoice_id = generate_invoice_id($post_id, $order_id, $customer_data);
    } else {
        $invoice_id = generate_opennode_invoice_id($post_id, $order_id, $customer_data);
    }

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

/**
 * Retrieve order id and invoice id from the server
 * 
 * @param int $post_id WP Post id.
 * @param int $order_id Order id.
 * 
 * @since 1.0
 * 
 * @return array Return invoice id and amount
 * @throws WP_Error
 */
function generate_invoice_id($post_id, $order_id, $customer_data)
{
    $amount = calculate_price_for_invoice($post_id);

    $url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';

    $currency_scope = get_post_meta($post_id, 'btcpw_currency', true) ? get_post_meta($post_id, 'btcpw_currency', true) : get_option('btcpw_default_currency', 'SATS');
    $blogname = get_option('blogname');

    $data = array(
        'amount' => $amount,
        'currency' => $currency_scope,
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
    $revenue_type = $body['metadata']['type'];


    // $payment_method = get_payment_method($body['id']);
    $customer = new BTCPayWall_Customer();

    $customer->create($customer_data);

    $payment = new BTCPayWall_Payment();

    $payment->create([
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
    ]);

    update_post_meta($order_id, 'btcpw_invoice_id', $body['id']);

    return array(
        'id' => $body['id'],
        'amount' => $body['amount'] . $body['currency']
    );
}

/**
 * Get payment method
 * 
 * @param int $invoice_id   Invoice ID.
 * 
 * @since 1.0
 * 
 * @return array Array of enabled payment methods
 * @throws WP_Error
 */
function get_payment_method($invoice_id)
{
    $url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices/' . $invoice_id . '/payment-methods';

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
    /* $url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';

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
    ); */
    $url = tipping_invoice_args($amount, $currency, $type, $blogname, $collects)['url'];

    $args = tipping_invoice_args($amount, $currency, $type, $blogname, $collects)['args'];

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

    //$payment_method = get_payment_method($body['id']);

    $tipper = new BTCPayWall_Tipper();

    $tipper->create([
        'full_name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'message' => $_POST['message'],
    ]);
    $tipping = new BTCPayWall_Tipping();

    $tipping->create([
        'tipper_id' => $tipper->id,
        'invoice_id' => $body['id'],
        'amount' => floatval($body['amount']),
        'page_title' => $body['metadata']['blog'],
        'revenue_type' => $body['metadata']['type'],
        'currency' => $body['currency'],
        'status' => $body['status'],
        'payment_method' => '',
        'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer'),
        'date_created'  => date('Y-m-d H:i:s', $body['createdTime'])
    ]);



    wp_send_json_success([
        'invoice_id' => tipping_invoice_response($body)['invoice_id'],
        'donor' => tipping_invoice_response($body)['donor'],
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

    if ($body['status'] !== 'Settled') {
        wp_send_json_error(['message' => 'Invoice is not paid.']);
    }
    $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);

    $payment = new BTCPayWall_Payment($invoice_id);



    $payment_method = get_payment_method($body['id']);

    $payment->update(array('status' => $body['status'], 'payment_method' => $payment_method));

    /* if ($payment->revenue_type === 'Pay-per-file') {

        setcookie('btcpw_payment_id_' . $post_id, $payment->invoice_id, strtotime("14 Jan 2038"), '/');

        setcookie('btcpw_link_expiration_' . $post_id, strtotime("14 Jan 2038"), strtotime("14 Jan 2038"), '/');
        $download = new BTCPayWall_Digital_Download($post_id);
        $download->increase_sales();
        if (is_email($body['metadata']['customer_data']['email']) && !empty($body['metadata']['customer_data']['email'])) {
            $link = get_download_url($payment->invoice_id, $download->get_file_url(), $download->ID, $body['metadata']['customer_data']['email']);
            wp_mail($body['metadata']['customer_data']['email'], 'BTCPayWall Digital Download Link', $link);
        }
    } */
    update_post_meta($body['metadata']['orderId'], 'btcpw_payment_id', $payment->invoice_id);

    setcookie("btcpw_{$post_id}", $secret, get_cookie_duration($post_id), $cookie_path);

    update_post_meta($order_id, 'btcpw_status', 'success');

    wp_send_json_success(['notify' => $message]);
}

add_action('wp_ajax_btcpw_paid_invoice',  'ajax_paid_invoice');
add_action('wp_ajax_nopriv_btcpw_paid_invoice',  'ajax_paid_invoice');

function ajax_paid_tipping()
{
    if (empty($_POST['invoice_id'])) {
        wp_send_json_error();
    }
    $invoice_id = sanitize_text_field($_POST['invoice_id']);
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
    $tipping = new BTCPayWall_Tipping($invoice_id);
    $payment_method = get_payment_method($body['id']);

    $tipping->update(array('status' => $body['status'], 'payment_method' => $payment_method));

    wp_send_json_success();
}
add_action('wp_ajax_btcpw_paid_tipping',  'ajax_paid_tipping');
add_action('wp_ajax_nopriv_btcpw_paid_tipping',  'ajax_paid_tipping');
function ajax_notify_administrator()
{


    $admin = get_bloginfo('admin_email');
    $body = sanitize_text_field($_POST['donor_info']);

    wp_mail($admin, 'You have received a payment via BTCPayWall', $body);
}
add_action('wp_ajax_btcpw_notify_admin',  'ajax_notify_administrator');
add_action('wp_ajax_nopriv_btcpw_notify_admin',  'ajax_notify_administrator');

/**
 * Regulate Digital Download Permissions
 * 
 * Check if customer has reached download limit for the specific product or if download link is still valid
 * 
 * @since 1.0
 * 
 * @return void 
 */
function ajax_btcpw_check_download_limit()
{
    if (empty($_POST['post_id'])) {
        wp_send_json_error(['message' => 'post_id required']);
    }
    $post_id = $_POST['post_id'];
    $payment_id = $_COOKIE["btcpw_payment_id_{$post_id}"];
    $payment = new BTCPayWall_Payment($payment_id);

    $payment->increase_download_number();
    wp_send_json_success(["success" => true, "download_number" => $payment->get_download_number()]);
}
add_action('wp_ajax_btcpw_check_download_limit',  'ajax_btcpw_check_download_limit');
add_action('wp_ajax_nopriv_btcpw_check_download_limit',  'ajax_btcpw_check_download_limit');




/**
 * Retrieve OrderId and InvoiceID for OpenNode
 * 
 * @param int $post_id WP Post id.
 * @param int $order_id Order id.
 * 
 * @since 1.0
 * 
 * @return array Return invoice id and amount
 * @throws WP_Error
 */
function generate_opennode_invoice_id($post_id, $order_id, $customer_data)
{
    $amount = calculate_price_for_invoice($post_id);

    $url = 'https://api.opennode.com/v1/charges';
    $currency_scope = get_post_meta($post_id, 'btcpw_currency', true) ? get_post_meta($post_id, 'btcpw_currency', true) : get_option('btcpw_default_currency', 'SATS');

    $blogname = get_option('blogname');
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


    //$payment_method = get_payment_method($body['id']);
    $customer = new BTCPayWall_Customer();

    $customer->create($customer_data);

    $payment = new BTCPayWall_Payment();

    $payment->create([
        'invoice_id' => $body['data']['id'],
        'customer_id' => $customer->id,
        'amount' => floatval($body['data']['amount']),
        'page_title' => $body['data']['metadata']['blog'],
        'revenue_type' => $revenue_type,
        'currency' => $body['data']['currency'],
        'status' => $body['data']['status'],
        'payment_method' => '',
        'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer'),
        'date_created'  => date('Y-m-d H:i:s', $body['data']['created_at'])
    ]);

    update_post_meta($order_id, 'btcpw_invoice_id', $body['data']['id']);


    return array(
        'id' => $body['data']['id'],
        'amount' => $body['data']['amount'] . $body['data']['currency']
    );
}




function tipping_invoice_args($amount, $currency, $type, $blogname, $collects)
{
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
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

    if ($gateway === 'BTCPayServer') {
        return array(
            'url' => $url,
            'args' => $args
        );
    }
    $url = 'https://api.opennode.com/v1/charges';


    $data = array(
        'amount' => $amount,
        'currency' => $currency === 'SATS' ? 'BTC' : $currency,
        'metadata' => array(
            'type' => $type,
            'blog'    => $blogname,
            'donor' => $collects,
        ),
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
    return array(
        'url' => $url,
        'args' => $args
    );
}


function tipping_invoice_response($body)
{
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');

    if ($gateway === 'BTCPayServer') {
        return array(
            'invoice_id' => $body['id'],
            'donor' => $body['metadata']['donor'],
        );
    }
    return  array(
        'invoice_id' => $body['data']['id'],
        'donor'  => $body['data']['metadata']['donor']
    );
}


function ajax_paid_opennode_invoice()
{


    $id = sanitize_text_field($_POST['id']);

    if (!$id) {
        wp_send_json_error([
            'message' => 'Invoice doesn\'t exist',
            'status' => 404
        ]);
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
        wp_send_json_error([
            'message' => 'Invoice doesn\'t exist',
            'status' => 404
        ]);
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
    $blogname = get_option('blogname');
    $siteurl = get_option('siteurl');
    $date = date('Y-m-d H:i:s', current_time('timestamp', 0));
    $message = "\nWeblog title: {$blogname} \n";
    $message .= "Website url: {$siteurl} \n";
    $message .= "Date: {$date} \n";
    $message .= "Amount: {$amount} \n";
    $message .= "Type: $content_title \n";
    $payment = new BTCPayWall_Payment($invoice_id);;

    $payment->update(array('status' => $body['data']['status'], 'payment_method' => 'Lightning-unverified'));

    /* if ($payment->revenue_type === 'Pay-per-file') {

        setcookie('btcpw_payment_id_' . $post_id, $payment->invoice_id, strtotime("14 Jan 2038"), '/');

        setcookie('btcpw_link_expiration_' . $post_id, strtotime("14 Jan 2038"), strtotime("14 Jan 2038"), '/');


        $download = new BTCPayWall_Digital_Download($post_id);
        $download->increase_sales();
        if (is_email($body['data']['metadata']['customer_data']['email']) && !empty($body['data']['metadata']['customer_data']['email'])) {
            $link = get_download_url($payment->invoice_id, $download->get_file_url(), $download->ID, $body['data']['metadata']['customer_data']['email']);
            wp_mail($body['metadata']['customer_data']['email'], 'BTCPayWall Digital Download Link', $link);
        }
    } */
    if (substr($payment->revenue_type, 0, 7)  === 'Tipping') {
        $tipping = new BTCPayWall_Tipping($invoice_id);
        //$payment_method = get_payment_method($body['id']);

        $tipping->update(array('status' => $body['data']['status'], 'payment_method' => 'Lightning-unverified'));
    }
    update_post_meta($body['data']['metadata']['orderId'], 'btcpw_payment_id', $payment->invoice_id);

    setcookie("btcpw_{$post_id}", $secret, get_cookie_duration($post_id), $cookie_path);

    update_post_meta($order_id, 'btcpw_status', 'success');
    wp_send_json_success(array(
        'status' => $body['data']['status'],
        'expires' => $body['data']['expires_at'],
        'notify' => $message
    ));
}
add_action('wp_ajax_btcpw_paid_opennode_invoice',  'ajax_paid_opennode_invoice');
add_action('wp_ajax_nopriv_btcpw_paid_opennode_invoice',  'ajax_paid_opennode_invoice');



function ajax_add_to_cart()
{
    if (!isset($_POST['id'])) {
        wp_die();
    }
    $download_id = absint($_POST['id']);
    $added_to_cart = BTCPayWall()->cart->add($download_id, array('title' => sanitize_text_field($_POST['title'])));
    if ($added_to_cart == false) {
        wp_send_json_error();
    }

    wp_send_json_success();
}
add_action('wp_ajax_btcpw_add_to_cart',  'ajax_add_to_cart');
add_action('wp_ajax_nopriv_btcpw_add_to_cart',  'ajax_add_to_cart');




function ajax_remove_from_cart()
{

    if (isset($_POST['cart_item'])) {


        $cart_item = absint($_POST['cart_item']);
        //$nonce     = sanitize_text_field($_POST['nonce']);

        btcpaywall_remove_from_cart($cart_item);

        wp_send_json_success();
    }
    wp_send_json_error();
}
add_action('wp_ajax_btcpw_remove_from_cart', 'ajax_remove_from_cart');
add_action('wp_ajax_nopriv_btcpw_remove_from_cart', 'ajax_remove_from_cart');





function ajax_generate_invoice_id_content_file()
{
    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
    $products = BTCPayWall()->cart->get_contents();
    $total = btcpaywall_get_total();
    $currency = ($gateway === 'OpenNode' && get_option('btcpw_default_pay_per_file_currency') === 'SATS') ? 'BTC' : get_option('btcpw_default_pay_per_file_currency');
    $customer_data = array(
        'full_name' => sanitize_text_field($_POST['full_name']),
        'email' => sanitize_email($_POST['email']),
        'address' => sanitize_text_field($_POST['address']),
        'phone' => sanitize_text_field($_POST['phone']),
        'message' => sanitize_text_field($_POST['message']),
    );

    $posts = '';
    $downloads = array();
    foreach ($products as $key => $val) {
        $posts .= " {$val['id']}";
        $downloads[] = $val['id'];
    }
    $order_id = wp_insert_post([
        'post_title' => 'Pay ' . $posts . ' from ' . $_SERVER['REMOTE_ADDR'],
        'post_status' => 'publish',
        'post_type' => 'btcpw_order',
    ]);
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
    $url = $gateway === 'OpenNode' ? 'https://api.opennode.com/v1/charges' : get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices';
    $auth = $gateway === 'OpenNode' ? get_option('btcpw_opennode_auth_key') : 'token ' . get_option('btcpw_btcpay_auth_key_create');
    $args = array(
        'headers' => array(
            'Authorization' => $auth,
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

    $body = $gateway === 'OpenNode' ? json_decode($response['body'], true)['data'] : json_decode($response['body'], true);


    $customer = new BTCPayWall_Customer();

    $customer->create([
        'full_name' => sanitize_text_field($_POST['full_name']),
        'email' => sanitize_email($_POST['email']),
        'address' => sanitize_text_field($_POST['address']),
        'phone' => sanitize_text_field($_POST['phone']),
        'message' => sanitize_text_field($_POST['message']),
    ]);

    $payment = new BTCPayWall_Payment();


    $payment->create([
        'invoice_id' => $body['id'],
        'customer_id' => $customer->id,
        'amount' => floatval($body['amount']),
        'page_title' => $body['metadata']['blog'],
        'revenue_type' => 'Pay-per-file',
        'currency' => $body['currency'],
        'gateway' => get_option('btcpw_selected_payment_gateway', 'BTCPayServer'),
        'download_ids' => $downloads,
        'status' => $body['status'],
        'payment_method' => '',
        'date_created'  => date('Y-m-d H:i:s')

    ]);
    wp_send_json_success([
        'invoice_id' => $body['id']
    ]);
}
add_action('wp_ajax_btcpw_generate_content_file_invoice_id',  'ajax_generate_invoice_id_content_file');
add_action('wp_ajax_nopriv_btcpw_generate_content_file_invoice_id',  'ajax_generate_invoice_id_content_file');




function ajax_paid_content_file_invoice()
{

    if (empty($_POST['invoice_id'])) {
        wp_send_json_error();
    }

    $invoice_id = sanitize_text_field($_POST['invoice_id']);


    $gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
    $url = $gateway === 'OpenNode' ? "https://api.opennode.com/v1/charge/{$invoice_id}" : get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . get_option('btcpw_btcpay_store_id') . '/invoices/' . $invoice_id;
    $auth = $gateway === 'OpenNode' ? get_option('btcpw_opennode_auth_key') : 'token ' . get_option('btcpw_btcpay_auth_key_view');
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

    $body = $gateway === 'OpenNode' ? json_decode($response['body'], true)['data'] : json_decode($response['body'], true);


    if (empty($body) || !empty($body['error'])) {
        return new WP_Error('invoice_error', $body['error'] ?? 'Something went wrong');
    }
    $amount = $body['amount'] . ' ' . $body['currency'];
    $storeId = get_option('btcpw_btcpay_store_id');
    $blogname = get_option('blogname');
    $siteurl = get_option('siteurl');
    $date = date('Y-m-d H:i:s', current_time('timestamp', 0));
    $message = "Website url: {$siteurl} \n";
    $message .= "Date: {$date} \n";
    $message .= "Amount: {$amount} \n";
    $message .= "Credit on Store ID: {$storeId} \n";
    $message .= "Type: Pay-per-file \n";

    if ($body['status'] !== 'Settled' && $body['status'] !== 'paid') {
        wp_send_json_error(['message' => 'Invoice is not paid.']);
    }

    $payment = new BTCPayWall_Payment($invoice_id);


    $payment_method = get_payment_method($body['id']) ? get_payment_method($body['id']) : 'BTC';

    $payment->update(array('status' => $body['status'], 'payment_method' => $payment_method));


    $links = array();
    $download_ids = explode(',', $payment->download_ids);
    foreach ($download_ids as $link_id) {
        $download = new BTCPayWall_Digital_Download($link_id);
        $download->increase_sales();
        $links[] = get_download_url($payment->invoice_id, $download->get_file_url(), $download->ID, $body['metadata']['customer_data']['email']);
    }
    $_SESSION['btcpaywall_purchase'] = $payment->invoice_id;
    /* $download = new BTCPayWall_Digital_Download($post_id);
    $download->increase_sales(); */
    wp_mail($body['metadata']['customer_data']['email'], 'BTCPayWall Digital Download Link', json_encode($links));
    /* if (is_email($body['metadata']['customer_data']['email']) && !empty($body['metadata']['customer_data']['email'])) {
        $link = get_download_url($payment->invoice_id, $download->get_file_url(), $download->ID, $body['metadata']['customer_data']['email']);
        wp_mail($body['metadata']['customer_data']['email'], 'BTCPayWall Digital Download Link', $link);
    } */
    BTCPayWall()->cart->empty_cart();
    wp_send_json_success(['notify' => $message]);
}

add_action('wp_ajax_btcpw_paid_content_file_invoice',  'ajax_paid_content_file_invoice');
add_action('wp_ajax_nopriv_btcpw_paid_content_file_invoice',  'ajax_paid_content_file_invoice');



//TODO Find better way for handling download count

//TODO Find better way for handling download count

/* function ajax_set_download_cookies()
{
    $downloadID = sanitize_text_field($_POST['download_id']);
    $paymentID = sanitize_text_field($_POST['payment_id']);

    setcookie("btcpw_{$paymentID}{$downloadID}", isset($_COOKIE["btcpw_{$paymentID}{$downloadID}"]) ? ++$_COOKIE["btcpw_{$paymentID}{$downloadID}"] : 0, strtotime("14 Jan 2038"), '/');

    wp_send_json_success();
}

add_action('wp_ajax_btcpw_set_download_number',  'ajax_set_download_cookies');
add_action('wp_ajax_nopriv_btcpw_set_download_number',  'ajax_set_download_cookies'); */
