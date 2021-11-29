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
    $labels = array(
        'name'               => _x('BP Digital Download', 'post type general name', 'btcpaywall'),
        'singular_name'      => _x('BP Digital Download', 'post type singular name', 'btcpaywall'),
        'add_new'            => __('Add New', 'btcpaywall'),
        'add_new_item'       => __('Add New Digital Download', 'btcpaywall'),
        'edit_item'          => __('Edit Digital Download', 'btcpaywall'),
        'new_item'           => __('New Digital Download', 'btcpaywall'),
        'all_items'          => __('All Digital Downloads', 'btcpaywall'),
        'view_item'          => __('View Digital Download', 'btcpaywall'),
        'search_items'       => __('Search Digital Download', 'btcpaywall'),
        'not_found'          => __('No Digital Download found', 'btcpaywall'),
        'not_found_in_trash' => __('No Digital Download found in Trash', 'btcpaywall'),
        'parent_item_colon'  => '',
        'menu_name'          => __('Digital Downloads', 'btcpaywall')
    );

    register_post_type('digital_download', [
        'labels' => $labels,
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
        'rewrite'     => array('slug' => 'digital-download'),
        'query_var' => true,
    ]);
}
add_action('init', 'register_post_types');
