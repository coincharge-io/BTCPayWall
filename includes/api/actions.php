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
