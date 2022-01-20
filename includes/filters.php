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
        $content_end = substr($content, $end_pos + 26);
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
 * @since 1.1.0
 */
function btcpaywall_change_product_labels()
{
    global $wp_post_types;
    $labels = &$wp_post_types['digital_download']->labels;

    $labels->name = __('Digital Product', 'btcpaywall'); // 
    $labels->singular_name = __('Digital Product', 'btcpaywall');
    $labels->add_new      = __('Add New', 'btcpaywall');
    $labels->add_new_item = __('Add New Digital Product', 'btcpaywall');
    $labels->all_items = __('All Digital Products', 'btcpaywall');
    $labels->edit_item = __('Edit Digital Product', 'btcpaywall');
    $labels->new_item = __('New Digital Product', 'btcpaywall');
    $labels->view_item = __('View Digital Product', 'btcpaywall');
    $labels->search_items = __('Search Digital Product', 'btcpaywall');
    $labels->not_found = __('No Digital Product found', 'btcpaywall');
    $labels->not_found_in_trash = __('No Digital Product found in trash', 'btcpaywall');
    $labels->menu_item = __('Digital Products', 'btcpaywall');
    $labels->parent_item_colon = __('', 'btcpaywall');
    return $labels;
}
add_action('init', 'btcpaywall_change_product_labels', 999);

/**
 * @since 1.1.0
 */
function btcpaywall_change_cpt_slug($args, $post_type)
{


    if ('digital_download' === $post_type) {
        $args['rewrite']['slug'] = 'digital-product';
    }
    return $args;
}
add_filter('register_post_type_args', 'btcpaywall_change_cpt_slug', 10, 2);
