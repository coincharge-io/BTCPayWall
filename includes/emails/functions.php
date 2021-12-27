<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions/Email
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function btcpaywall_get_notify_administrator_body($amount, $collect_data = null, $type = 'Pay-per-file')
{
    $storeId = get_option('btcpw_btcpay_store_id');
    $siteurl = get_option('siteurl');
    $date = date('Y-m-d H:i:s', current_time('timestamp', 0));
    $email_body = "Website url: {$siteurl} \n";
    $email_body .= "Date: {$date} \n";
    $email_body .= "Amount: {$amount} \n";
    if (!empty($storeId)) {
        $email_body .= "Credit on Store ID: {$storeId} \n";
    }
    $email_body .= "Type: {$type} \n";
    if ($collect_data) {
        $email_body .= "Donor Information: \n";
        $email_body .= $collect_data;
    }
    $email_body .= "Thank you for using BTCPayWall";
    return $email_body;
}

function btcpaywall_get_send_purchased_links_body($links, $name)
{
    $customer = !empty($name) ? $name : 'customer';
    $email_body = "Dear ${customer},\n\n";
    $email_body .= "Thank you for your purchase. Please click on the link(s) below to download your files.\n\n";
    foreach ($links as $link) {
        $email_body .= "{$link}";
    }
    return $email_body;
}
