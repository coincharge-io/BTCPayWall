<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function register_apis()
{
    register_rest_route(
        'btcpaywall/v1',
        '/shortcode-list',
        array(
            'methods'             => 'GET',
            'callback'            => array('allCreatedForms'),
            'permission_callback' => function () {
                return current_user_can('edit_posts');
            },
        )
    );
    /* register_rest_route(
        'btcpaywall/v1',
        'webhook',
        array(
            'methods'             => WP_REST_Server::CREATABLE,
            'callback'            => 'btcpw_success_url',
            'args' => array(),
            'permission_callback' => function () {
                return true;
            }
        )
    ); */
}
add_action('rest_api_init',  'register_apis');
/* function btcpw_success_url(WP_REST_Request $request)
{
    $json = $request->get_params();
    $id = $json['id'];

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

    $payment = new BTCPayWall_Payment($invoice_id);


    $payment->update(array('status' => $body['data']['status'], 'payment_method' => $json['payment_method']));

    if ($payment->revenue_type === 'Pay-per-file') {

        setcookie('btcpw_payment_id_' . $post_id, $payment->invoice_id, strtotime("14 Jan 2038"), $cookie_path);

        setcookie('btcpw_link_expiration_' . $post_id, strtotime("14 Jan 2038"), strtotime("14 Jan 2038"), $cookie_path);
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

        $tipping->update(array('status' => $body['data']['status'], 'payment_method' => $json['payment_method']));
    }
    update_post_meta($body['data']['metadata']['orderId'], 'btcpw_payment_id', $payment->invoice_id);

    setcookie("btcpw_{$post_id}", $secret, get_cookie_duration($post_id), $cookie_path);

    update_post_meta($order_id, 'btcpw_status', 'success');
    wp_send_json_success();
}
 */