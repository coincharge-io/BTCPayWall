<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Payment_Details
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

if (!isset($_GET['id'])) {
    wp_die(__('Payment ID not supplied. Please try again', 'btcpaywall'), __('Error', 'btcpaywall'));
}
$id = sanitize_text_field($_GET['id']);
$payment = new BTCPayWall_Payment($id);
$is_tipping = substr($payment->revenue_type, 0, 1) === "T";
$tipping = new BTCPayWall_Tipping($payment->invoice_id);
$tipper = new BTCPayWall_Tipper($tipping->tipper_id);
$customer = new BTCPayWall_Customer($payment->customer_id);
$customer_or_tipper = $is_tipping ? $tipper : $customer;
$download_ids = explode(',', $payment->download_ids);
?>
<div class="wrap">

    <div id="icon-options-general" class="icon32"></div>
    <h1><?php esc_html_e('Posts in Page', 'posts-in-page'); ?></h1>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">
                    <?php if ($payment->revenue_type === 'Pay-per-file') : ?>
                        <div class="postbox btcpaywall_payment">

                            <h2><span><?php esc_attr_e('Files', 'posts-in-page'); ?></span></h2>

                            <div class="inside">
                                <div class="meta-box-sortables" style="min-height: 0">

                                    <div id="btcpaywall_payment_container_type" class="btcpaywall_payment_container_type ">
                                        <ul>
                                            <?php foreach ($download_ids as $id) : ?>
                                                <?php $download = new BTCPayWall_Digital_Download($id); ?>
                                                <div class="btcpaywall_payment_container inside_wrap">
                                                    <li><span>File name: <?php echo esc_html($download->get_name()); ?></span> <span>Price: <?php echo esc_html($download->get_price()); ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="postbox btcpaywall_payment">

                            <h2><span><?php esc_attr_e('Blog', 'posts-in-page'); ?></span></h2>

                            <div class="inside">
                                <div class="meta-box-sortables" style="min-height: 0">
                                    <div id="btcpaywall_payment_container_type" class="btcpaywall_payment_container_type ">
                                        <div class="btcpaywall_payment_container inside_wrap">
                                            <h4>Name: <?php echo esc_html($payment->page_title); ?></h4>
                                            <h4> Revenue type: <?php echo esc_html($payment->revenue_type); ?></h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="postbox btcpaywall_payment">

                        <h2><span><?php esc_attr_e('Customer Details', 'posts-in-page'); ?></span></h2>

                        <div class="inside">
                            <div class="meta-box-sortables" style="min-height: 0">
                                <div id="btcpaywall_payment_container_customer_details" class="btcpaywall_payment_container_customer_details">
                                    <div class="btcpaywall_payment_container_customer_name">
                                        <p>Full name: <?php echo esc_html($customer_or_tipper->full_name); ?></p>
                                    </div>
                                    <div class="btcpaywall_payment_container_customer_email">
                                        <p>Email: <?php echo esc_html($customer_or_tipper->email); ?></p>
                                    </div>
                                    <div class="btcpaywall_payment_container_customer_address">
                                        <p>Address: <?php echo esc_html($customer_or_tipper->address); ?></p>
                                    </div>
                                    <div class="btcpaywall_payment_container_customer_phone">
                                        <p>Phone: <?php echo esc_html($customer_or_tipper->phone); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .inside -->

                    </div>

                    <div class="postbox btcpaywall_payment_message">

                        <h2><span><?php esc_attr_e('Message', 'posts-in-page'); ?></span></h2>

                        <div class="inside">
                            <div class="meta-box-sortables" style="min-height: 0">
                                <div id="btcpaywall_payment_container_customer_message" class="btcpaywall_payment_container_customer_message postbox">

                                    <textarea disabled><?php echo esc_html($customer_or_tipper->message); ?></textarea>


                                </div>
                            </div>
                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables .ui-sortable -->

            </div>
            <!-- post-body-content -->

            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">

                <div class="meta-box-sortables">

                    <div class="postbox btcpaywall_payment">

                        <h2><span><?php esc_attr_e('Payment', 'posts-in-page'); ?></span></h2>

                        <div class="inside">
                            <div class="meta-box-sortables" style="min-height: 0">
                                <div id="btcpaywall_payment_container" class="btcpaywall_payment_container ">
                                    <div class="btcpaywall_payment_amount inside_wrap">
                                        <label>Amount:</label>
                                        <input type="number" value="<?php echo esc_attr($payment->amount); ?>" />
                                    </div>
                                    <div class="btcpaywall_payment_currency inside_wrap">
                                        <label>Currency:</label>
                                        <input type="text" value="<?php echo esc_attr($payment->currency); ?>" />
                                    </div>
                                    <div class="btcpaywall_payment_status inside_wrap">
                                        <label>Status:</label>
                                        <input type="text" value="<?php echo esc_attr($payment->status); ?>" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- .inside -->

                    </div>
                    <div class="postbox btcpaywall_payment_meta">

                        <h2><span><?php esc_attr_e('Payment Meta', 'posts-in-page'); ?></span></h2>

                        <div class="inside">
                            <div class="meta-box-sortables" style="min-height: 0">
                                <div id="btcpaywall_payment_container" class="btcpaywall_payment_container ">
                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <p>Transaction id: <?php echo esc_html($payment->id); ?></p>
                                    </div>
                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <p>Payment method: <?php echo esc_html($payment->payment_method); ?></p>
                                    </div>
                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <p>Gateway: <?php echo esc_html($payment->gateway); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->

                    <!-- #postbox-container-1 .postbox-container -->

                </div>
                <!-- #post-body .metabox-holder .columns-2 -->

                <br class="clear">
            </div>
            <!-- #poststuff -->

        </div> <!-- .wrap -->