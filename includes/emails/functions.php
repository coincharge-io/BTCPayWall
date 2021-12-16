<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function btcpw_get_notify_administrator_body($amount, $collect_data = null, $type = 'Pay-per-file')
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

function btcpw_get_send_purchased_links_body($links, $name)
{
    $customer = !empty($name) ? $name : 'customer';
    $email_body = "Dear ${customer},\n\n";
    $email_body .= "Thank you for your purchase. Please click on the link(s) below to download your files.\n\n";
    $email_body = "{$links}";
    return $email_body;
}
