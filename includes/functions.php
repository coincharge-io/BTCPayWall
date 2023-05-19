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
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Get price information for protected post/video/file from shortcode attributes
 *
 * @param array $atts Shortcode attributes
 *
 * @since 1.0.8.1
 *
 * @return string Display information about price inside paywall
 */
function btcpaywall_get_post_info_string_from_attributes($atts)
{
    $project_object = get_post_meta(get_the_ID(), 'btcpw_invoice_content', true);
    $project = isset($project_object['project']) ? $project_object['project'] : 'post';


    $post_id = get_the_ID();


    if (get_post_meta($post_id, 'btcpw_price', true)) {
        $price = get_post_meta($post_id, 'btcpw_price', true);
    } else {
        $price = get_option('btcpw_default_pay_per_' . $project . '_price', 1000);
    }

    if (get_post_meta($post_id, 'btcpw_duration', true)) {
        $duration = get_post_meta($post_id, 'btcpw_duration', true);
    } else {
        $duration = get_option('btcpw_default_pay_per_' . $project . '_duration');
    }

    if (get_post_meta($post_id, 'btcpw_duration_type', true)) {
        $duration_type = get_post_meta($post_id, 'btcpw_duration_type', true);
    } else {
        $duration_type = get_option('btcpw_default_pay_per_' . $project . '_duration_type', 'unlimited');
    }


    if (get_post_meta($post_id, 'btcpw_currency', true)) {
        $currency = get_post_meta($post_id, 'btcpw_currency', true);
    } else {
        $currency = get_option('btcpw_default_pay_per_' . $project . '_currency', 'SATS');
    }

    $payblock_info = $atts['info_text'];
    $non_number = $duration_type === 'unlimited' || $duration_type === 'onetime';

    $duration_type = ($duration > 1 && !$non_number) ? "{$duration_type}s" : $duration_type;


    $search = array('{price}', '{duration}', '{dtype}', '{currency}');

    $replace = array($price, $duration, $duration_type, $currency);

    $formatted = str_replace($search, $replace, $payblock_info);

    return $formatted;
}
/**
 * Get price information for protected post/video/file
 *
 * @param int $post_id  Post id
 * @param string $type Module name
 *
 * @since 1.0
 *
 * @return string Display information about price inside paywall
 */
function btcpaywall_get_post_info_string($post_id = null, $type = 'post')
{
    $project_object = get_post_meta(get_the_ID(), 'btcpw_invoice_content', true);
    $project = isset($project_object['project']) ? $project_object['project'] : 'post';

    if (!$post_id) {
        $post_id = get_the_ID();
    }

    if (get_post_meta($post_id, 'btcpw_price', true)) {
        $price = get_post_meta($post_id, 'btcpw_price', true);
    } else {
        $price = get_option('btcpw_default_pay_per_' . $project . '_price', 1000);
    }

    if (get_post_meta($post_id, 'btcpw_duration', true)) {
        $duration = get_post_meta($post_id, 'btcpw_duration', true);
    } else {
        $duration = get_option('btcpw_default_pay_per_' . $project . '_duration');
    }

    if (get_post_meta($post_id, 'btcpw_duration_type', true)) {
        $duration_type = get_post_meta($post_id, 'btcpw_duration_type', true);
    } else {
        $duration_type = get_option('btcpw_default_pay_per_' . $project . '_duration_type', 'unlimited');
    }


    if (get_post_meta($post_id, 'btcpw_currency', true)) {
        $currency = get_post_meta($post_id, 'btcpw_currency', true);
    } else {
        $currency = get_option('btcpw_default_pay_per_' . $project . '_currency', 'SATS');
    }


    $non_number = $duration_type === 'unlimited' || $duration_type === 'onetime';

    $duration_type = ($duration > 1 && !$non_number) ? "{$duration_type}s" : $duration_type;
    //$payblock_info = btcpaywall_get_default_values(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['info'];
    $payblock_info = btcpaywall_get_default_values($project)['info'];
    $project_object = get_post_meta(get_the_ID(), 'btcpw_invoice_content', true);
    if (!empty($payblock_info)) {
        $search = array('{price}', '{duration}', '{dtype}', '{currency}');

        $replace = array($price, $duration, $duration_type, $currency);

        $replaced = str_replace($search, $replace, $payblock_info);

        return $replaced;
    }



    $unlimited = "For {$price} {$currency} you will have unlimited access to the {$type}.";

    $onetime = "For {$price} {$currency} you will have access to the {$type} only once.";

    $other = "For {$price} {$currency} you will have access to the {$type} for {$duration} {$duration_type}.";

    return $duration_type === 'unlimited' ? $unlimited : ($duration_type === 'onetime' ? $onetime : $other);
}

/**
 * Get paywall title
 *
 * @since 1.0
 *
 * @return string Display paywall title
 */
function btcpaywall_get_payblock_header_string()
{
    $invoice_content = get_post_meta(get_the_ID(), 'btcpw_invoice_content', true);
    $project = isset($invoice_content['project']) ? $invoice_content['project'] : '';
    $default_values = btcpaywall_get_default_values($project);
    $title = isset($default_values['title']) ? $default_values['title'] : '';
    return $title ? $title : 'For access to ' . $project . ' first pay';
    //return btcpaywall_get_default_values(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['title'] ? btcpaywall_get_default_values(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['title'] : 'For access to ' . get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'] . ' first pay';
}
/**
 * Get paywall button text
 *
 * @param array $atts Shortcode attributes
 *
 * @since 1.0
 *
 * @return string Display paywall button text
 */
function btcpaywall_get_payblock_button_string($atts)
{
    $invoice_content = get_post_meta(get_the_ID(), 'btcpw_invoice_content', true);
    $project = isset($invoice_content['project']) ? $invoice_content['project'] : '';
    $default_values = btcpaywall_get_default_values($project);
    $button = isset($default_values['button']) ? $default_values['button'] : '';
    return !empty($atts['button_text']) ? $atts['button_text'] : $button;
    //return !empty($atts['button_text']) ? $atts['button_text'] : btcpaywall_get_default_values(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['button'];
}
/**
 * Return default values for each revenue type
 *
 * @params string $name The name of revenue type.
 * @since 1.0
 *
 * @return array Show default values for choosen project.
 */
function btcpaywall_get_default_values($name)
{
    switch ($name) {
        case 'post':
            return [
                'title' => get_option('btcpw_pay_per_post_title', 'Pay now to unlock blogpost'),
                'info'    => get_option('btcpw_pay_per_post_info', 'For {price} {currency} you will have access to the post for {duration} {dtype}'),
                'button'    => get_option('btcpw_pay_per_post_button', 'Pay'),
                'currency' => get_option('btcpw_pay_per_post_currency', 'SATS'),
                'price'      => get_option('btcpw_pay_per_post_price', 1000), 'duration'    => get_option('btcpw_pay_per_post_duration'),
                'duration_type'    => get_option('btcpw_pay_per_post_duration_type', 'unlimited'),
                'btc_format' => get_option('btcpw_pay_per_post_btc_format', 'SATS')
            ];
        case 'video':
            return [
                'title' => get_option('btcpw_pay_per_view_title', 'Pay now to watch the whole video'),
                'info'    => get_option('btcpw_pay_per_view_info', 'For {price} {currency} you will have access to the post for {duration} {dtype}'),
                'button'    => get_option('btcpw_pay_per_view_button', 'Pay'),
                'currency' => get_option('btcpw_pay_per_view_currency', 'SATS'),
                'price'      => get_option('btcpw_pay_per_view_price', 1000), 'duration'    => get_option('btcpw_pay_per_view_duration'),
                'duration_type'    => get_option('btcpw_pay_per_view_duration_type', 'unlimited'),
                'btc_format' => get_option('btcpw_pay_per_view_btc_format', 'SATS')
            ];
        default:
            return null;
    }
}
/**
 * Calculate price for invoice
 *
 * @params int $post_id Post id.
 *
 * @since 1.0
 *
 * @return string Price
 */
function btcpaywall_calculate_price_for_invoice($post_id)
{
    $invoice_content = get_post_meta(get_the_ID(), 'btcpw_invoice_content', true);
    $project = isset($invoice_content['project']) ? $invoice_content['project'] : 'post';
    return get_post_meta($post_id, 'btcpw_price', true) ? get_post_meta($post_id, 'btcpw_price', true) : get_option('btcpw_default_pay_per_' . $project . '_price', 1000);
    // $project = get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'] !== false ? get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'] : 'post';
    //
    // return get_post_meta($post_id, 'btcpw_price', true) ? get_post_meta($post_id, 'btcpw_price', true) : get_option('btcpw_default_pay_per_' . $project . '_price', 1000);
}

/**
 * Check if protected content is paid
 *
 * @param int $post_id Post id.
 *
 * @since 1.0
 *
 * @return bool Whether or not content is paid
 */
function btcpaywall_is_paid_content($post_id = null)
{
    if (empty($post_id)) {
        $post_id = get_the_ID();
    }
    $cookie = !empty($_COOKIE['btcpw_' . $post_id]) ? sanitize_text_field($_COOKIE['btcpw_' . $post_id]) : null;

    if (empty($cookie)) {
        return false;
    }

    $meta_query = [
        'relation' => 'AND',
        [
            'key' => 'btcpw_post_id',
            'value' => $post_id,
            'type' => 'NUMERIC',
        ],
        [
            'key' => 'btcpw_secret',
            'value' => $cookie,
        ]
    ];

    $order = get_posts([
        'post_type' => 'btcpw_order',
        'fields' => 'ids',
        'no_found_rows' => true,
        'meta_query' => $meta_query,
    ]);
    if (empty($order)) {
        return false;
    }

    return true;
}




/**
 * Generate order id
 *
 * @param $post_id Post id.
 *
 * @since 1.0
 *
 * @return int Order id.
 * @throws Exception
 */
function btcpaywall_generate_order_id($post_id)
{
    $order_id = wp_insert_post([
        'post_title' => 'Pay ' . $post_id . ' from ' . $_SERVER['REMOTE_ADDR'],
        'post_status' => 'publish',
        'post_type' => 'btcpw_order',
    ]);

    update_post_meta($order_id, 'btcpw_status', 'waiting');
    update_post_meta($order_id, 'btcpw_post_id', $post_id);
    update_post_meta($order_id, 'btcpw_from_ip', $_SERVER['REMOTE_ADDR']);
    update_post_meta($order_id, 'btcpw_secret', bin2hex(random_bytes(5)));

    return $order_id;
}
/**
 * Get cookie duration
 *
 * @param $post_id Post id.
 *
 * @since 1.0
 *
 * @return false|int Cookie duration.
 */
function btcpaywall_get_cookie_duration($post_id)
{
    $duration = get_post_meta($post_id, 'btcpw_duration', true);
    $invoice_content = get_post_meta(get_the_ID(), 'btcpw_invoice_content', true);
    $project = isset($invoice_content['project']) ? $invoice_content['project'] : 'post';

    if (empty($duration)) {
        $duration = get_option('btcpw_default_pay_per_' . $project . 'duration');
    }

    $duration_type = get_post_meta($post_id, 'btcpw_duration_type', true);

    if (empty($duration_type)) {
        $duration_type = get_option('btcpw_default_pay_per_' . $project . 'duration_type');
    }

    return $duration_type === 'unlimited' ? strtotime("14 Jan 2038") : ($duration_type === 'onetime' ? time() + 10 : strtotime("+{$duration} {$duration_type}"));
}
/**
 * Update post meta values
 *
 * @param array $atts Attribute values.
 *
 * @type string $currency
 * @type string $duration_type
 * @type string $duration
 * @type string $btc_format
 * @type int $price
 *
 * @since 1.0
 *
 * @return string|bool Update meta values or false.
 */

function btcpaywall_update_meta_settings($atts)
{
    $valid_currency = in_array($atts['currency'], BTCPayWall::CURRENCIES);
    $valid_duration = in_array($atts['duration_type'], BTCPayWall::DURATIONS);
    $valid_btc_format = in_array($atts['btc_format'], BTCPayWall::BTC_FORMAT);

    if (($atts['currency'] != "") && $valid_currency) {
        update_post_meta(get_the_ID(), 'btcpw_currency', sanitize_text_field($atts['currency']));
    } else {
        delete_post_meta(get_the_ID(), 'btcpw_currency');
    }
    if ($atts['price'] != "") {
        update_post_meta(get_the_ID(), 'btcpw_price', sanitize_text_field($atts['price']));
    } else {
        delete_post_meta(get_the_ID(), 'btcpw_price');
    }
    if ($atts['duration'] != "") {
        update_post_meta(get_the_ID(), 'btcpw_duration', sanitize_text_field($atts['duration']));
    } else {
        delete_post_meta(get_the_ID(), 'btcpw_duration');
    }
    if (($atts['duration_type'] != "") && $valid_duration) {
        update_post_meta(get_the_ID(), 'btcpw_duration_type', sanitize_text_field($atts['duration_type']));
    } else {
        delete_post_meta(get_the_ID(), 'btcpw_duration_type');
    }
}


/**
 * Display fields for collecting donor/customer information
 *
 * @params array $arr
 *
 * @since 1.0
 *
 * @return bool Whether or not to display fields
 */

function btcpaywall_display_is_enabled($arr)
{
    if (!is_array($arr)) {
        return;
    }

    foreach ($arr as $key => $value) {
        if ($arr[$key]['display'] === true) {
            return true;
        }
    }
    return false;
}

/**
 *
 * @param $atts
 *
 * @since 1.0
 *
 * @return array
 */
function btcpaywall_get_collect($atts)
{
    return array(
        array(
            'id' => 'name',
            'label' => 'Full name' .  (filter_var($atts['mandatory_name'], FILTER_VALIDATE_BOOLEAN) ? '' : ' - Optional'),
            'display' => filter_var($atts['display_name'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_name'], FILTER_VALIDATE_BOOLEAN),
            'type'  => 'text'
        ),
        array(
            'id' => 'email',
            'label' => 'Email' .  (filter_var($atts['mandatory_email'], FILTER_VALIDATE_BOOLEAN) ? '' : ' - Optional'),
            'display' => filter_var($atts['display_email'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_email'], FILTER_VALIDATE_BOOLEAN),
            'type' => 'email'
        ),
        array(
            'id' => 'address',
            'label' => 'Address' .  (filter_var($atts['mandatory_address'], FILTER_VALIDATE_BOOLEAN) ? '' : ' - Optional'),
            'display' => filter_var($atts['display_address'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_address'], FILTER_VALIDATE_BOOLEAN),
            'type' => 'text'
        ),
        array(
            'id' => 'phone',
            'label' => 'Phone' .  (filter_var($atts['mandatory_phone'], FILTER_VALIDATE_BOOLEAN) ? '' : ' - Optional'),
            'display' => filter_var($atts['display_phone'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_phone'], FILTER_VALIDATE_BOOLEAN),
            'type' => 'tel'
        ),
        array(
            'id' => 'message',
            'label' => 'Message' .  (filter_var($atts['mandatory_message'], FILTER_VALIDATE_BOOLEAN) ? '' : ' - Optional'),
            'display' => filter_var($atts['display_message'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_message'], FILTER_VALIDATE_BOOLEAN),
            'type' => 'text'
        ),
    );
}

/**
 * @param $atts
 *
 * @return string
 */
function btcpaywall_get_fixed_amount($atts)
{
    return array(
        'value_1' => array(
            'enabled' => (filter_var($atts['value1_enabled'], FILTER_VALIDATE_BOOLEAN)),
            'currency' => in_array($atts['value1_currency'], BTCPayWall::CURRENCIES) === true ? $atts['value1_currency'] : 'SATS',
            'amount' => esc_html($atts['value1_amount']),
            'icon' => esc_html($atts['value1_icon'])
        ),
        'value_2' => array(
            'enabled' => (filter_var($atts['value2_enabled'], FILTER_VALIDATE_BOOLEAN)),
            'currency' => in_array($atts['value2_currency'], BTCPayWall::CURRENCIES) === true ? $atts['value2_currency'] : 'SATS',
            'amount' => esc_html($atts['value2_amount']),
            'icon' => esc_html($atts['value2_icon'])
        ),
        'value_3' => array(
            'enabled' => (filter_var($atts['value3_enabled'], FILTER_VALIDATE_BOOLEAN)),
            'currency' => in_array($atts['value3_currency'], BTCPayWall::CURRENCIES) === true ? $atts['value3_currency'] : 'SATS',
            'amount' => esc_html($atts['value3_amount']),
            'icon' => esc_html($atts['value3_icon'])
        ),
    );
}

/**
 * Get an attachment ID given a URL.
 *
 * @param string $url
 *
 * @return int Attachment ID on success, 0 on failure
 */
function btcpaywall_get_attachment_id($url)
{
    $attachment_id = 0;

    $dir = wp_upload_dir();

    if (false !== strpos($url, $dir['baseurl'] . '/')) {
        $file = basename($url);

        $query_args = array(
            'post_type'   => 'attachment',
            'post_status' => 'inherit',
            'fields'      => 'ids',
            'meta_query'  => array(
                array(
                    'value'   => $file,
                    'compare' => 'LIKE',
                    'key'     => '_wp_attachment_metadata',
                ),
            )
        );

        $query = new WP_Query($query_args);

        if ($query->have_posts()) {
            foreach ($query->posts as $post_id) {
                $meta = wp_get_attachment_metadata($post_id);

                $original_file       = basename($meta['file']);
                $cropped_image_files = wp_list_pluck($meta['sizes'], 'file');

                if ($original_file === $file || in_array($file, $cropped_image_files)) {
                    $attachment_id = $post_id;
                    break;
                }
            }
        }
    }

    return $attachment_id;
}
