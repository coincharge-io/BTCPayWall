<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */


// Exit if accessed directly
if (!defined('ABSPATH')) exit;


/**
 *
 * @param string $content
 * 
 * 
 * @return string
 */
function btcpaywall_filter_the_content($content)
{
    if (btcpaywall_is_paid_content()) {
        return $content;
    }

    if (($start_pos = strpos($content, '<!-- btcpw:start_content -->')) === false) {
        return $content;
    }

    $content_start = substr($content, 0, $start_pos);

    if (($end_pos = strpos($content, '<!-- /btcpw:end_content -->')) === false) {
        $content_end = '';
    } else {
        //Increase from 26 to 27
        $content_end = substr($content, $end_pos + 27);
    }

    return $content_start . $content_end;
}
add_filter('the_content',  'btcpaywall_filter_the_content', 50);



function btcpaywall_digital_download_template($single_template)
{
    global $post;

    if ($post->post_type == 'digital_download') {
        $single_template = BTCPAYWALL_PLUGIN_DIR . 'templates/single-digital_download.php';
    }
    return $single_template;
}
add_filter('single_template', 'btcpaywall_digital_download_template', 99, 1);

/**
 * @since 1.0.5
 */
function btcpaywall_donation_template($single_template)
{
    global $post;

    if ($post->post_type == 'btcpw_donation') {
        $single_template = BTCPAYWALL_PLUGIN_DIR . 'templates/single-donation.php';
    }
    return $single_template;
}
add_filter('single_template', 'btcpaywall_donation_template', 99, 1);


/**
 * @since 1.0.2
 */
function btcpaywall_change_product_labels()
{
    $labels = array(
        'name'               => _x('Digital Product', 'Digital Product', 'btcpaywall'),
        'singular_name'      => _x('Digital Product', 'Digital Product', 'btcpaywall'),
        'add_new'            => __('Add New', 'btcpaywall'),
        'add_new_item'       => __('Add New Digital Product', 'btcpaywall'),
        'edit_item'          => __('Edit Digital Product', 'btcpaywall'),
        'new_item'           => __('New Digital Product', 'btcpaywall'),
        'all_items'          => __('All Digital Products', 'btcpaywall'),
        'view_item'          => __('View Digital Product', 'btcpaywall'),
        'search_items'       => __('Search Digital Product', 'btcpaywall'),
        'not_found'          => __('No Digital Product found', 'btcpaywall'),
        'not_found_in_trash' => __('No Digital Product found in Trash', 'btcpaywall'),
        'parent_item_colon'  => '',
        'menu_name'          => __('Digital Products', 'btcpaywall')
    );
    return $labels;
}
add_filter('btcpaywall_change_product_labels', 'btcpaywall_change_product_labels', 10);


/**
 * @since 1.0.2
 */
function btcpaywall_change_cpt_slug($args, $post_type)
{


    if ('digital_download' === $post_type) {
        $args['rewrite']['slug'] = 'digital-product';
    }
    return $args;
}
add_filter('register_post_type_args', 'btcpaywall_change_cpt_slug', 10, 2);
