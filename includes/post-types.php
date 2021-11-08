<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function register_post_types()
{

    register_post_type('btcpw_order', [
        'label' => 'BP Orders',
        'public' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'show_in_menu' => false,
        'show_in_admin_bar' => false,
        'show_in_rest' => false,
        'rest_base' => null,
        'menu_position' => null,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title', 'custom-fields'],
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);
    register_post_type('btcpw_product', [
        'labels' => array(
            'name'          => __('Digital Product', 'btcpaywall'),
            'singular_name' => __('Digital Product', 'btcpaywall'),
            'add_new'       => __('Add New Product', 'btcpaywall')
        ),
        'public' => true,
        'show_ui'         => true,
        'show_in_menu'    => false,
        'rest_base' => null,
        'menu_position' => null,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,

    ]);
}
add_action('init', 'register_post_types');
