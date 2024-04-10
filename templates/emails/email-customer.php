<!DOCTYPE html>
<html>

<head>
        <meta name="generator" content="HTML Tidy for HTML5 for Linux version 5.6.0">
        <title>Customer Notification</title>
</head>

<body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">

        <div style="display: block; margin: 0 auto !important; max-width: 580px; padding: 10px; width: 580px; background: #ffffff; border-radius: 3px;">
                <?php //$customer = empty($name) ? 'customer' : $name;
                $payment_details = new BTCPayWall_Payment($invoice_id);
                $customer_data = new BTCPayWall_Customer($payment_details->customer_id);
                $customer = empty($customer_data->full_name) ? ',' : " {$customer_data->full_name},";
                $download_links = explode(',', $payment_details->download_links);
                $is_tipping = strtolower($payment_details->revenue_type)[0] == 't' ? true : false;
                $message = strtolower($payment_details->revenue_type)[0] == 't' ? 'Thank you for your tipping. You can see tipping details in the table below.' : 'Thank you for your purchase. You can see payment details in the table below.'; ?>
                <p>Hello<?php echo esc_html($customer); ?></p>
                <p><?php echo esc_html__($message, 'btcpaywall'); ?></p>
                <table style="border-collapse: separate; width: 100%; table-layout: auto;" role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                        <tbody>
                                <tr>
                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                <table style="border-collapse: separate; width: 100%; table-layout: fixed;" role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                        <?php $header1 = strtolower($payment_details->revenue_type)[0] == 't' ? "Tipping Information" : "Payment Information"; ?>
                                                        <thead>
                                                                <tr>
                                                                        <th style="color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; font-size: 20px; border: 1px solid #000000;" colspan="2">
                                                                                <strong><?php echo esc_html__($header1, 'btcpaywall'); ?></strong>
                                                                        </th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <strong>Payment id</strong>
                                                                        </td>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <?php echo esc_html($payment_details->id); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <strong>Invoice id</strong>
                                                                        </td>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <?php echo esc_html($payment_details->invoice_id); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <strong>Type</strong>
                                                                        </td>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <?php echo esc_html($payment_details->revenue_type); ?></td>
                                                                </tr>
                                                                <?php if ($payment_details->revenue_type != 'Pay-per-file') : ?>
                                                                        <tr>
                                                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                        <strong>Page title</strong>
                                                                                </td>
                                                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                        <?php echo esc_html($payment_details->page_title); ?></td>
                                                                        </tr>
                                                                        <?php else : ?><?php $download_ids = explode(',', $payment_details->download_ids); ?>
                                                                        <tr>
                                                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                        <strong>Products</strong>
                                                                                </td>
                                                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                        <ul>
                                                                                                <?php foreach ($download_ids as $id) : ?><?php $download = new BTCPayWall_Digital_Download($id); ?>
                                                                                                <li><?php echo esc_html($download->get_name()); ?></li>
                                                                                        <?php endforeach; ?>
                                                                                        </ul>
                                                                                </td>
                                                                        </tr>
                                                                <?php endif; ?>
                                                                <tr>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <strong>Payment method</strong>
                                                                        </td>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <?php echo esc_html($payment_details->payment_method); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <strong>Date</strong>
                                                                        </td>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <?php echo esc_html($payment_details->date_created); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <strong>Total</strong>
                                                                        </td>
                                                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                <?php echo esc_html(btcpaywall_round_amount($payment_details->currency, $payment_details->amount) . ' ' . $payment_details->currency); ?></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <?php if (true == $collect_data) : ?>
                                                        <table style="border-collapse: separate; width: 100%; table-layout: fixed; margin-top:30px;" role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                                <?php $header = "Your Data"; ?>
                                                                <thead>
                                                                        <tr>
                                                                                <th style="color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; font-size: 20px; border: 1px solid #000000;" colspan="2">
                                                                                        <strong><?php echo esc_html__($header, 'btcpaywall'); ?></strong>
                                                                                </th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <?php foreach ($collect_data as $key => $value) : ?><?php if ($key != 'id') : ?><?php if (!empty($value)) : ?><?php if ($key == 'full_name') : ?><?php $key = 'name'; ?><?php endif; ?>
                                                                        <tr>
                                                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                        <strong><?php echo esc_html__(ucfirst($key), 'btcpaywall'); ?></strong>
                                                                                </td>
                                                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                                                                                        <?php echo (esc_html__($value, 'btcpaywall')); ?></td>
                                                                        </tr>
                                                                        <?php endif; ?><?php endif; ?><?php endforeach; ?>
                                                                </tbody>
                                                        </table>
                                                        <?php endif; ?><?php if (!empty(array_filter($download_links))) : ?>
                                                        <div>
                                                                <p>You can download file/s by clicking on the button/s bellow.</p>
                                                                <ul>
                                                                        <?php foreach ($download_links as $key => $link) : ?><?php $product = new BTCPayWall_Digital_Download($download_ids[$key]);
                                                                                                                                $name = $product->get_name(); ?>
                                                                        <li><a href="<?php echo esc_url($link); ?>" target="_blank"><?php echo esc_html__($name, 'btcpaywall'); ?></a></li>
                                                                <?php endforeach; ?>
                                                                </ul>
                                                        </div>
                                                <?php endif; ?>
                                        </td>
                                </tr>
                        </tbody>
                </table>
                <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
                        <table style="border-collapse: separate; width: 100%; table-layout: auto;" role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                        <td style="padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" class="content-block powered-by">Powered by <a style="color: #999999; font-size: 12px; text-align: center; text-decoration:none;" href="https://btcpaywall.com/">BTCPayWall</a>.</td>
                                </tr>
                        </table>
                </div>
                <!-- END FOOTER -->
        </div>
</body>

</html>
