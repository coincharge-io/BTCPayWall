<?php

/**
 * Digital Download
 *
 * @package    BTCPayWall
 * @subpackage Admin/Payment_Details
 * @copyright  Copyright (c) 2021, Coincharge
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since      1.0
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!isset($_GET['id'])) {
    wp_die(__('Payment ID not supplied. Please try again', 'btcpaywall'), __('Error', 'btcpaywall'));
}
$id = sanitize_text_field($_GET['id']);
$payment = new BTCPayWall_Payment($id);
$is_tipping = substr($payment->revenue_type, 0, 1) === "T";
$customer = new BTCPayWall_Customer($payment->customer_id);
$download_ids = explode(',', $payment->download_ids);
$download_links = explode(',', $payment->download_links);
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

                            <h2><span><?php esc_attr_e('Products', 'posts-in-page'); ?></span></h2>

                            <div class="inside">
                                <div class="meta-box-sortables" style="min-height: 0">

                                    <div id="btcpaywall_payment_container_type" class="btcpaywall_payment_container_type ">
                                        <table>
                                            <thead>
                                                <th>Name</th>
                                                <th>Download Link</th>
                                                <th>Price</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($download_ids as $key => $id) : ?>
                                                    <?php $download = new BTCPayWall_Digital_Download($id); ?>
                                                    <div class="btcpaywall_payment_container inside_wrap">


                                                        <tr>
                                                            <td><?php echo esc_html($download->get_name()); ?></td>

                                                            <td>
                                                                <span>
                                                                    <input value="<?php echo esc_url($download_links[$key]); ?>" />
                                                                </span>
                                                            </td>
                                                            <td><?php echo esc_html($download->get_price()); ?></td>
                                                        </tr>

                                                    </div>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Full name: </td>
                                                <td> <?php echo esc_html($customer->full_name); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email: </td>
                                                <td><?php echo esc_html($customer->email); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address: </td>
                                                <td><?php echo esc_html($customer->address); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone: </td>
                                                <td><?php echo esc_html($customer->phone); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
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

                                    <textarea disabled><?php echo esc_html($customer->message); ?></textarea>


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

                    <div class="postbox btcpaywall_payment_meta">

                        <h2><span><?php esc_attr_e('Payment Information', 'posts-in-page'); ?></span></h2>

                        <div class="inside">
                            <div class="meta-box-sortables" style="min-height: 0">
                                <div id="btcpaywall_payment_container" class="btcpaywall_payment_container ">
                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <label>Status:</label>
                                        <input type="text" disabled value="<?php echo esc_attr($payment->status); ?>" />
                                    </div>
                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <label>Payment id:</label>
                                        <input disabled type="text" value="<?php echo esc_attr($payment->id); ?>" />
                                    </div>
                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <label>Invoice id: </label>
                                        <input type="text" disabled value="<?php echo esc_html($payment->invoice_id); ?>" />
                                    </div>

                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <label>Type: </label>
                                        <input type="text" disabled value="<?php echo esc_html($payment->revenue_type); ?>" />
                                    </div>
                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <label>Payment method: </label>
                                        <input disabled type="text" value="<?php echo esc_attr($payment->payment_method); ?>" />
                                    </div>
                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <label>Gateway: </label>
                                        <input type="text" disabled value="<?php echo esc_html($payment->gateway); ?>" />
                                    </div>

                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <label>Date: </label>
                                        <input type="text" disabled value="<?php echo esc_html($payment->date_created); ?>" />
                                    </div>
                                    <div class="btcpaywall_payment_container inside_wrap">
                                        <label>Total: </label>
                                        <input type="text" disabled value="<?php echo esc_html(btcpaywall_round_amount($payment->currency, $payment->amount) . ' ' . $payment->currency); ?>" />
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
    </div>
</div>
