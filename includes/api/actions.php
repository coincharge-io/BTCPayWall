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
            'callback'            => function () {
                $shortcodes = new BTCPayWall_Pay_Per_Shortcode();
                $prepare_templates = [];
                $prepare_templates[''] = '';
                foreach ($shortcodes->get_all_shortcodes('pay-per-post') as $val) {
                    $prepare_templates["#$val[id]-$val[name]"] = (new BTCPayWall_Pay_Per_Shortcode($val['id']))->shortcode();
                }
                return $prepare_templates;
            },
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
            'callback'            => function () {
                $shortcodes = new BTCPayWall_Pay_Per_Shortcode();
                $prepare_templates = [];
                $prepare_templates[''] = '';
                foreach ($shortcodes->get_all_shortcodes('pay-per-view') as $val) {
                    $prepare_templates["#$val[id]-$val[name]"] = (new BTCPayWall_Pay_Per_Shortcode($val['id']))->shortcode();
                }
                return $prepare_templates;
            },            'permission_callback' => function () {
                return current_user_can('edit_posts');
            },
        )
    );
}
add_action('rest_api_init', 'btcpaywall_register_apis');
