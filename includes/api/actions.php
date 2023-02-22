<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions/API
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
function btcpaywall_register_apis()
{
    register_rest_route(
        'btcpaywall/v1',
        '/donation-templates',
        array(
            'methods'             => 'GET',
            'callback'            => 'btcpaywall_get_donation_templates',
            'permission_callback' => function () {
                return current_user_can('edit_posts');
            },
        )
    );
    register_rest_route(
        'btcpaywall/v1',
        '/pay-per-post-templates',
        array(
            'methods'             => 'GET',
            'callback'            => 'btcpaywall_get_pay_per_post_templates',
            'permission_callback' => function () {
                return current_user_can('edit_posts');
            },
        )
    );
    register_rest_route(
        'btcpaywall/v1',
        '/pay-per-view-templates',
        array(
            'methods'             => 'GET',
            'callback'            => 'btcpaywall_get_pay_per_view_templates',
            'permission_callback' => function () {
                return current_user_can('edit_posts');
            },
        )
    );
}
add_action('rest_api_init', 'btcpaywall_register_apis');
