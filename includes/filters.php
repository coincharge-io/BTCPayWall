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


/* 


function add_digital_download($content)
{
    global $post;
    $download = new BTCPayWall_Digital_Download($post->ID);

    if (!$post instanceof WP_Post) return $content;


    if ($post->post_type !== 'digital_download' || has_shortcode($post->post_content, 'btcpw_digital_download')) {
        return $content;
    }
    return  $content . "[btcpw_digital_download id={$download->ID}]";
}

add_filter('the_content', 'add_digital_download');

 */

function btcpw_digital_download_template($single_template)
{
    global $post;

    if ($post->post_type == 'digital_download') {
        $single_template = BTCPAYWALL_PLUGIN_DIR . 'templates/single-digital_download.php';
    }
    return $single_template;
}
add_filter('single_template', 'btcpw_digital_download_template', 99, 1);
