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
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Prepare email body for notifying site admin
 *
 * @param int $invoice_id Invoice id
 *
 * @param array $collect_data Whether or not customer information are collected
 *
 * @param string $type Module type
 *
 * @since 1.0.0
 *
 * @return void
 */
function btcpaywall_get_notify_administrator_body($invoice_id, $collect_data = null, $type = 'Pay-per-file')
{
    $storeId = get_option('btcpw_btcpay_store_id');
    $siteurl = get_option('siteurl');
    $date = date('Y-m-d H:i:s', current_time('timestamp', 0));
    $gateway = get_option('btcpw_selected_payment_gateway');
    ob_start();
    include(BTCPAYWALL_PLUGIN_DIR . 'templates/emails/email-notify-admin.php');
    return ob_get_clean();
}
/**
 * Send Payment Notification
 *
 * @param string $name Customer name
 * @param string $invoice_id
 * @param array $collect_data Whether or not customer information are collected
 *
 * @since 1.0.2
 *
 * @return void
 */
function btcpaywall_get_notify_customers_body($invoice_id, $collect_data)
{
    ob_start();
    include(BTCPAYWALL_PLUGIN_DIR . 'templates/emails/email-customer.php');
    return ob_get_clean();
}
/**
 * Notify site admin upon payment
 *
 * @param string $email_body.
 *
 * @since 1.0.2
 *
 * @return void
 */
function btcpaywall_notify_administrator($email_body, $type = 'Pay')
{
    $admin = get_bloginfo('admin_email');
    $email = get_option('btcpw_invoices_email');
    $email_to_send = is_email($email) ? $email : $admin;
    $subject = $type === 'Pay' ? 'You have received a payment via BTCPayWall' : 'You have received a donation via BTCPayWall';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($email_to_send, $subject, $email_body, $headers);
}


/**
 * Notify customer upon payment
 *
 * @param string $email_address.
 * @param string $email_body.
 * @param string $type.
 * @since 1.0.2
 *
 * @return void
 */
function btcpaywall_notify_customer($email_address, $email_body, $type = 'Pay')
{
    if (empty($email_address)) {
        return false;
    }
    $subject = $type === 'Pay' ? 'You have completed payment via BTCPayWall' : 'You have completed tipping via BTCPayWall';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($email_address, $subject, $email_body, $headers);
}
