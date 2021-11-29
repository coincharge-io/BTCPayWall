<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function register_shortcode_list()
{
    register_rest_route(
        'btcpaywall',
        '/shortcode-list/v1',
        array(
            'methods'             => 'GET',
            'callback'            => array('allCreatedForms'),
            'permission_callback' => function () {
                return current_user_can('edit_posts');
            },
        )
    );
}
add_action('rest_api_init',  'register_shortcode_list');
function btcpw_success_url($request)
{
    $id = $request->get_param('id');
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
        return $response;
    }

    if ($response['response']['code'] != 200) {
        return new WP_Error($response['response']['code'], 'HTTP Error ' . $response['response']['code']);
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

    if ($body['data']['status'] === 'paid') {
        $cookie_path = parse_url(get_permalink($post_id), PHP_URL_PATH);
        /* $revenue_type = $body['data']['metadata']['type'];


        //$payment_method = get_payment_method($body['id']);
        //$customer = new BTCPayWall_Customer();

        //$customer->create($_POST);

        $payment = new BTCPayWall_Payment();

        $payment->create([
            'invoice_id' => $body['id'],
            'customer_id' => $customer->id,
            'amount' => floatval($body['amount']),
            'page_title' => $body['metadata']['blog'],
            'revenue_type' => $revenue_type,
            'currency' => $body['currency'],
            'status' => $body['status'],
            'payment_method' => $payment_method,
            'date_created'  => date('Y-m-d H:i:s', $body['createdTime'])
        ]);

        if ($payment->revenue_type === 'Pay-per-file') {

            setcookie('btcpw_payment_id_' . $post_id, $payment->id, strtotime('+' . get_option('btcpw_link_expiration', 24) . 'hours', current_time('timestamp')), $cookie_path);

            setcookie('btcpw_link_expiration_' . $post_id, get_option('btcpw_link_expiration', 24), strtotime('+' . get_option('btcpw_link_expiration', 24) . 'hours', current_time('timestamp')), $cookie_path);
            $download = new BTCPayWall_Digital_Download($post_id);
            $download->increase_sales();
            if (is_email($customer->email) && !empty($customer->email)) {
                $link = get_download_url($payment->id, $download->get_file_url(), $download->ID, $customer->email);
                wp_mail($customer->email, 'BTCPayWall Digital Download Link', $link);
            }
        }
        update_post_meta($body['metadata']['orderId'], 'btcpw_payment_id', $payment->id);

        setcookie("btcpw_{$post_id}", $secret, get_cookie_duration($post_id), $cookie_path);

        update_post_meta($body['metadata']['orderId'], 'btcpw_status', 'success'); */
        $payment = new BTCPayWall_Payment($invoice_id);


        //$tipping = new BTCPayWall_Tipping(sanitize_text_field($_POST['invoice_id']));
        //$payment_method = get_payment_method($body['id']);

        $payment->update(array('status' => $body['data']['status'], 'payment_method' => $request['data']['payment_method']));

        if ($payment->revenue_type === 'Pay-per-file') {

            setcookie('btcpw_payment_id_' . $post_id, $payment->id, strtotime('+' . get_option('btcpw_link_expiration', 24) . 'hours', current_time('timestamp')), $cookie_path);

            setcookie('btcpw_link_expiration_' . $post_id, get_option('btcpw_link_expiration', 24), strtotime('+' . get_option('btcpw_link_expiration', 24) . 'hours', current_time('timestamp')), $cookie_path);
            $download = new BTCPayWall_Digital_Download($post_id);
            $download->increase_sales();
            if (is_email($body['data']['metadata']['customer_data']['email']) && !empty($body['data']['metadata']['customer_data']['email'])) {
                $link = get_download_url($payment->id, $download->get_file_url(), $download->ID, $body['data']['metadata']['customer_data']['email']);
                wp_mail($body['data']['metadata']['customer_data']['email'], 'BTCPayWall Digital Download Link', $link);
            }
        }
        if (substr($payment->revenue_type, 0, 7)  === 'Tipping') {
            $tipping = new BTCPayWall_Tipping($invoice_id);
            //$payment_method = get_payment_method($body['id']);

            $tipping->update(array('status' => $body['data']['status'], 'payment_method' => $request['data']['payment_method']));
        }
        update_post_meta($body['data']['metadata']['orderId'], 'btcpw_payment_id', $payment->id);

        setcookie("btcpw_{$post_id}", $secret, get_cookie_duration($post_id), $cookie_path);

        update_post_meta($order_id, 'btcpw_status', 'success');

        //wp_send_json_success(['notify' => $message]);

        //wp_send_json_success(['notify' => $message]);
    }
}
add_action('rest_api_init', function () {
    register_rest_route('btcpaywall/v1', '/webhook', array(
        'methods'  => 'POST',
        'callback' => 'btcpw_success_url',
    ));
});
