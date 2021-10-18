<?php



// Exit if accessed directly
if (!defined('ABSPATH')) exit;


/**
 *
 * @param string $content
 *
 * @return string
 */
function filter_the_content($content)
{


    if (is_paid_content()) {
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
add_filter('the_content',  'filter_the_content', 50);
