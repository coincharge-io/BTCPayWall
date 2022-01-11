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


/**
 * Prepare email body for notifying site admin
 * 
 * @param int $amount Amount
 * 
 * @param array $collect_data Whether or not customer information are collected
 * 
 * @param string $type Module type
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function btcpaywall_get_notify_administrator_body($amount, $collect_data = null, $type = 'Pay-per-file')
{
    $storeId = get_option('btcpw_btcpay_store_id');
    $siteurl = get_option('siteurl');
    $date = date('Y-m-d H:i:s', current_time('timestamp', 0));
    /* $storeId = get_option('btcpw_btcpay_store_id');
    $siteurl = get_option('siteurl');
    $date = date('Y-m-d H:i:s', current_time('timestamp', 0));
    $email_body = '<html><body>';
    $email_body .= '<h2>Payment</h2>';
    $email_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $email_body .= "<tr><td>Website url:</td><td>" . strip_tags($siteurl) . "</td></tr>";
    $email_body .= "<tr><td>Date:</td><td>" . strip_tags($date) . "</td></tr>";
    $email_body .= "<tr><td>Amount:</td><td>" . strip_tags($amount) . "</td></tr>";
    if (!empty($storeId)) {
        $email_body .= "<tr><td>Credit on Store ID:</td><td>" . strip_tags($storeId) . "</td></tr>";
    }
    $email_body .= "<tr><td>Type:</td><td>" . strip_tags($type) . "</td></tr></table>";
    if ($collect_data) {
        $email_body .= strtolower($type)[0] == 't' ? "<h2>Donor Information</h2>" : "<h2>Customer Information</h2>";
        $email_body .= "<table>";
        foreach ($collect_data as $key => $value) {
            if ($key == 'id') {
                continue;
            }
            if (!empty($value)) {
                if ($key == 'full_name') {
                    $key = 'name';
                }
                $email_body .= "<tr><td>" . ucfirst(strip_tags($key)) . ":</td><td>" . strip_tags($value) . "</td></tr>";;
            }
        }
        $email_body .= "</table>";
    }
    $email_body .= "<h3>Thank you for using BTCPayWall</h3>";
    $email_body .= "</body></html>";
    return $email_body; */
    ob_start();
    include(BTCPAYWALL_PLUGIN_DIR . 'templates/emails/email-notify-admin.php');
    return ob_get_clean();
}
/**
 * Send purchased links 
 * 
 * @param array|null $links
 * @param string $name Customer name
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function btcpaywall_get_send_purchased_links_body($links, $name)
{
    $customer = !empty($name) ? $name : 'customer';
    $email_body = "<p>Dear " . strip_tags($customer) . ",</p>";
    $email_body .= "<p>Thank you for your purchase. Please click on the link(s) below to download your files.</p>";
    foreach ($links as $link) {
        $email_body .= "{$link}";
    }
    return $email_body;
}
/**
 * Notify site admin upon payment 
 * 
 * @param string $email_body. 
 * 
 * @since 1.1.0
 * 
 * @return void
 */
function btcpaywall_notify_administrator($email_body, $type = 'Pay')
{
    //$admin = get_bloginfo('admin_email');
    $admin = 'leinert@onlineshop24.com';
    $subject = $type === 'Pay' ? 'You have received a payment via BTCPayWall' : 'You have received a donation via BTCPayWall';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($admin, $subject, $email_body, $headers);
}
