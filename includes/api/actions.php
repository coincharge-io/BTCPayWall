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
if (!defined('ABSPATH')) exit;
function btcpaywall_register_apis()
{
    register_rest_route(
        'btcpaywall/v1',
        '/shortcode-list',
        array(
            'methods'             => 'GET',
            'callback'            => 'btcpaywall_all_created_forms',
            'permission_callback' => function () {
                return current_user_can('edit_posts');
            },
        )
    );
}
add_action('rest_api_init',  'btcpaywall_register_apis');
