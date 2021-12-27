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
