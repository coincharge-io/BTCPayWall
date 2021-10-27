<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;


/**
 * Get price information for protected post/video/file 
 * 
 * @param int $post_id  Post id
 * 
 * @since 1.0
 * 
 * @return string Display information about price inside paywall
 */
function get_post_info_string($post_id = null)
{

    if (!$post_id) {
        $post_id = get_the_ID();
    }

    if (get_post_meta($post_id, 'btcpw_price', true)) {
        $price = get_post_meta($post_id, 'btcpw_price', true);
    } else {
        $price = get_option('btcpw_default_price');
        //$price = getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['price'];
    }

    if (get_post_meta($post_id, 'btcpw_duration', true)) {
        $duration = get_post_meta($post_id, 'btcpw_duration', true);
    } else {
        $duration = get_option('btcpw_default_duration');
        //$duration = getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['duration'];
    }

    if (get_post_meta($post_id, 'btcpw_duration_type', true)) {
        $duration_type = get_post_meta($post_id, 'btcpw_duration_type', true);
    } else {
        $duration_type = get_option('btcpw_default_duration_type', 'unlimited');
        //$duration_type = getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['duration_type'];
    }


    if (get_post_meta($post_id, 'btcpw_currency', true)) {
        $currency = get_post_meta($post_id, 'btcpw_currency', true);
    } else {
        $currency = get_option('btcpw_default_currency', 'SATS');
        //$currency = getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['currency'];
    }
    $btc_format = get_post_meta(get_the_ID(), 'btcpw_btc_format', true) ?: get_option('btcpw_default_btc_format');

    //getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['btc_format'];
    //get_option('btcpw_default_btc_format');

    if ($currency === 'SATS' && $btc_format === 'BTC') {

        $price = $price / 100000000;

        $price = sprintf('%.8f', $price);

        $price = rtrim($price, '0');

        $currency = 'BTC';
    }

    //$payblock_info = get_option('btcpw_default_payblock_info');

    $payblock_info = getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['info'];
    if (!empty($payblock_info)) {

        $search = array('[price]', '[duration]', '[dtype]', '[currency]');

        $replace = array($price, $duration, $duration_type, $currency);

        str_replace($search, $replace, $payblock_info);
    }

    $non_number = $duration_type === 'unlimited' || $duration_type === 'onetime';

    $duration_type = ($duration > 1 && !$non_number) ? "{$duration_type}s" : $duration_type;

    $unlimited = "For {$price} {$currency} you will have unlimited access to the post.";

    $onetime = "For {$price} {$currency} you will have access to the post only once.";

    $other = "For {$price} {$currency} you will have access to the post for {$duration} {$duration_type}.";

    return $duration_type === 'unlimited' ? $unlimited : ($duration_type === 'onetime' ? $onetime : $other);
}
/**
 * Get paywall title
 * 
 * @since 1.0
 * 
 * @return string Display paywall title
 */
function get_payblock_header_string()
{

    return getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['title'] ?: 'For access to ' . get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'] . ' first pay';
}
/**
 * Get paywall button text
 * 
 * @since 1.0
 * 
 * @return string Display paywall button text
 */
function get_payblock_button_string()
{
    return getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['button'] ?: 'Pay';
}
/**
 * Return default values for each revenue type
 * 
 * @params string $name The name of revenue type.
 * @since 1.0
 * 
 * @return array Show default values for choosen project.
 */
function getDefaultValues($name)
{
    switch ($name) {
        case 'post':
            return [
                'title' => get_option('btcpw_pay_per_post_title', 'Pay now to unlock blogpost'),
                'info'    => get_option('btcpw_pay_per_post_info', 'For [price] [currency] you will have access to the post for [duration] [dtype]'),
                'button'    => get_option('btcpw_pay_per_post_button', 'Pay'),
                'currency' => get_option('btcpw_pay_per_post_currency', 'SATS'),
                'price'      => get_option('btcpw_pay_per_post_price', 1000), 'duration'    => get_option('btcpw_pay_per_post_duration'),
                'duration_type'    => get_option('btcpw_pay_per_post_duration_type', 'unlimited'),
                'btc_format' => get_option('btcpw_pay_per_post_btc_format', 'SATS')
            ];
        case 'video':
            return [
                'title' => get_option('btcpw_pay_per_view_title', 'Pay now to watch the whole video'),
                'info'    => get_option('btcpw_pay_per_view_info', 'For [price] [currency] you will have access to the post for [duration] [dtype]'),
                'button'    => get_option('btcpw_pay_per_view_button', 'Pay'),
                'currency' => get_option('btcpw_pay_per_view_currency', 'SATS'),
                'price'      => get_option('btcpw_pay_per_view_price', 1000), 'duration'    => get_option('btcpw_pay_per_view_duration'),
                'duration_type'    => get_option('btcpw_pay_per_view_duration_type', 'unlimited'),
                'btc_format' => get_option('btcpw_pay_per_view_btc_format', 'SATS')
            ];
        case 'file':
            return [
                'title' => get_option('btcpw_pay_per_file_title', 'Pay now to download the software'),
                'info'    => get_option('btcpw_pay_per_file_info', 'For [price] [currency] you will have access to the post for [duration] [dtype]'),
                'button'    => get_option('btcpw_pay_per_file_button', 'Pay'),
                'currency' => get_option('btcpw_pay_per_file_currency', 'SATS'),
                'price'      => get_option('btcpw_pay_per_file_price', 1000), 'duration'    => get_option('btcpw_pay_per_file_duration'),
                'duration_type'    => get_option('btcpw_pay_per_file_duration_type', 'unlimited'),
                'btc_format' => get_option('btcpw_pay_per_file_btc_format', 'SATS')
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
function calculate_price_for_invoice($post_id)
{
    $currency_scope = get_post_meta($post_id, 'btcpw_currency', true) ?: get_option('btcpw_default_currency', 'SATS');

    //getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['currency'];

    //get_option('btcpw_default_currency', 'SATS');

    if ($currency_scope === 'SATS') {

        if (get_post_meta($post_id, 'btcpw_price', true)) {

            $price = get_post_meta($post_id, 'btcpw_price', true);
        } else {

            $price = get_option('btcpw_default_price');
            //$price = getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['price'];
        }

        $value = $price / 100000000;

        $value = sprintf('%.8f', $value);

        $value = rtrim($value, '0');

        return $value;
    }

    return get_post_meta($post_id, 'btcpw_price', true) ?: get_option('btcpw_default_price');

    //getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['price'];
    //get_option('btcpw_default_price');
}

/**
 * Check if protected content is paid
 * 
 * @params int $post_id Post id. 
 * 
 * @since 1.0
 * 
 * @return bool Whether or not content is paid
 */
function is_paid_content($post_id = null)
{

    if (empty($post_id)) {
        $post_id = get_the_ID();
    }

    if (empty($_COOKIE['btcpw_' . $post_id])) {
        return false;
    }

    $order = get_posts([
        'post_type' => 'btcpw_order',
        'fields' => 'ids',
        'no_found_rows' => true,
        'meta_query' => [
            'relation' => 'AND',
            [
                'key' => 'btcpw_post_id',
                'value' => $post_id,
                'type' => 'NUMERIC',
            ],
            [
                'key' => 'btcpw_secret',
                'value' => sanitize_text_field($_COOKIE['btcpw_' . $post_id]),
            ],
        ],
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
function generate_order_id($post_id)
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
function get_cookie_duration($post_id)
{

    $duration = get_post_meta($post_id, 'btcpw_duration', true);

    if (empty($duration)) {
        $duration = get_option('btcpw_default_duration');
        //$duration = getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['duration'];
    }

    $duration_type = get_post_meta($post_id, 'btcpw_duration_type', true);

    if (empty($duration_type)) {
        $duration_type = get_option('btcpw_default_duration_type');
        //getDefaultValues(get_post_meta(get_the_ID(), 'btcpw_invoice_content', true)['project'])['duration_type'];
    }

    return $duration_type === 'unlimited' ? strtotime("14 Jan 2038") : ($duration_type === 'onetime' ? 0 : strtotime("+{$duration} {$duration_type}"));
}
/**
 * Update post meta values
 * 
 * @params array $atts Attribute values.
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

function update_meta_settings($atts)
{
    $valid_currency = in_array($atts['currency'], BTCPayWall::CURRENCIES);
    $valid_duration = in_array($atts['duration_type'], BTCPayWall::DURATIONS);
    $valid_btc_format = in_array($atts['btc_format'], BTCPayWall::BTC_FORMAT);

    if (($atts['currency'] != "") && $valid_currency) {
        update_post_meta(get_the_ID(), 'btcpw_currency', sanitize_text_field($atts['currency']));
    } else {
        delete_post_meta(get_the_ID(), 'btcpw_currency');
    }
    if (($atts['currency'] === 'SATS') && $valid_btc_format) {
        update_post_meta(get_the_ID(), 'btcpw_btc_format', sanitize_text_field($atts['btc_format']));
    } else {
        delete_post_meta(get_the_ID(), 'btcpw_btc_format');
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

function display_is_enabled($arr)
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
 * @param $atts
 *
 * @return string
 */


/**
 * 
 * @param $atts
 *
 * @since 1.0
 * 
 * @return array
 */
function getCollect($atts)
{
    return array(
        array(
            'id' => 'name',
            'label' => 'Full name' .  (filter_var($atts['mandatory_name'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
            'display' => filter_var($atts['display_name'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_name'], FILTER_VALIDATE_BOOLEAN)
        ),
        array(
            'id' => 'email',
            'label' => 'Email' .  (filter_var($atts['mandatory_email'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
            'display' => filter_var($atts['display_email'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_email'], FILTER_VALIDATE_BOOLEAN)
        ),
        array(
            'id' => 'address',
            'label' => 'Address' .  (filter_var($atts['mandatory_address'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
            'display' => filter_var($atts['display_address'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_address'], FILTER_VALIDATE_BOOLEAN)
        ),
        array(
            'id' => 'phone',
            'label' => 'Phone' .  (filter_var($atts['mandatory_phone'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
            'display' => filter_var($atts['display_phone'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_phone'], FILTER_VALIDATE_BOOLEAN)
        ),
        array(
            'id' => 'message',
            'label' => 'Message' .  (filter_var($atts['mandatory_message'], FILTER_VALIDATE_BOOLEAN) ? '*' : ''),
            'display' => filter_var($atts['display_message'], FILTER_VALIDATE_BOOLEAN),
            'mandatory' => filter_var($atts['mandatory_message'], FILTER_VALIDATE_BOOLEAN)
        ),
    );
}

/**
 * @param $atts
 *
 * @return string
 */
function getFixedAmount($atts)
{
    return array(
        'value_1' => array(
            'enabled' => (filter_var($atts['value1_enabled'], FILTER_VALIDATE_BOOLEAN)),
            'currency' => in_array($atts['value1_currency'], BTCPayWall::TIPPING_CURRENCIES) === true ? $atts['value1_currency'] : 'SATS',
            'amount' => esc_html($atts['value1_amount']),
            'icon' => esc_html($atts['value1_icon'])
        ),
        'value_2' => array(
            'enabled' => (filter_var($atts['value2_enabled'], FILTER_VALIDATE_BOOLEAN)),
            'currency' => in_array($atts['value2_currency'], BTCPayWall::TIPPING_CURRENCIES) === true ? $atts['value2_currency'] : 'SATS',
            'amount' => esc_html($atts['value2_amount']),
            'icon' => esc_html($atts['value2_icon'])
        ),
        'value_3' => array(
            'enabled' => (filter_var($atts['value3_enabled'], FILTER_VALIDATE_BOOLEAN)),
            'currency' => in_array($atts['value3_currency'], BTCPayWall::TIPPING_CURRENCIES) === true ? $atts['value3_currency'] : 'SATS',
            'amount' => esc_html($atts['value3_amount']),
            'icon' => esc_html($atts['value3_icon'])
        ),
    );
}
