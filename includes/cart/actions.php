<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Process the Add to Cart request
 *
 * @since 1.0
 *
 * @param $data
 */
/*function edd_process_add_to_cart($data)
{
    $download_id = !empty($data['download_id']) ? absint($data['download_id']) : false;
    $options     = isset($data['edd_options']) ? $data['edd_options'] : array();



    if (!empty($download_id)) {
        edd_add_to_cart($download_id, $options);
    }

    if (edd_straight_to_checkout() && !edd_is_checkout()) {
        $query_args     = remove_query_arg(array('edd_action', 'download_id', 'edd_options'));
        $query_part     = strpos($query_args, "?");
        $url_parameters = '';

        if (false !== $query_part) {
            $url_parameters = substr($query_args, $query_part);
        }

        wp_redirect(edd_get_checkout_uri() . $url_parameters, 303);
        edd_die();
    } else {
        wp_redirect(remove_query_arg(array('edd_action', 'download_id', 'edd_options')));
        edd_die();
    }
}
add_action('edd_add_to_cart', 'edd_process_add_to_cart');

/**
 * Process the Remove from Cart request
 *
 * @since 1.0
 *
 * @param $data
 */
/*function edd_process_remove_from_cart($data)
{
    $cart_key = absint($_GET['cart_item']);

    if (!isset($_GET['edd_remove_from_cart_nonce'])) {
        edd_debug_log(__('Missing nonce when removing an item from the cart. Please read the following for more information: https://easydigitaldownloads.com/development/2018/07/05/important-update-to-ajax-requests-in-easy-digital-downloads-2-9-4', 'easy-digital-downloads'), true);
    }

    $nonce    = !empty($_GET['edd_remove_from_cart_nonce']) ? sanitize_text_field($_GET['edd_remove_from_cart_nonce']) : '';

    $nonce_verified = wp_verify_nonce($nonce, 'edd-remove-from-cart-' . $cart_key);
    if (false !== $nonce_verified) {
        edd_remove_from_cart($cart_key);
    }

    wp_redirect(remove_query_arg(array('edd_action', 'cart_item', 'nocache')));
    edd_die();
}
add_action('edd_remove', 'edd_process_remove_from_cart');
