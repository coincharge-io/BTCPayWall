<!DOCTYPE html>
<html>

<head>
    <title>Customer Notification</title>
</head>

<body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <div style="display: block; margin: 0 auto !important; max-width: 580px; padding: 10px; width: 580px; background: #ffffff; border-radius: 3px;">
        <?php //$customer = empty($name) ? 'customer' : $name;
        $payment_details = new BTCPayWall_Payment($invoice_id);
        $customer_data = new BTCPayWall_Customer($payment_details->customer_id);
        $customer = empty($customer_data->full_name) ? ',' :  " {$customer_data->full_name},";
        $is_tipping = strtolower($payment_details->revenue_type)[0] == 't' ? true : false;
        $message = strtolower($payment_details->revenue_type)[0] == 't' ? 'Thank you for your tipping. You can see tipping details in the table below.' : 'Thank you for your purchase. You can see payment details in the table below.'; ?>
        <p>Hello<?php echo esc_html($customer); ?></p>
        <p><?php echo esc_html__($message, 'btcpaywall'); ?></p>
        <table style="border-collapse: separate; width: 100%;
            table-layout: auto;" role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
            <tbody>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;" align="left">
                        <table style="border-collapse: separate; width: 100%; table-layout: fixed;" role="presentation" border="0" cellpadding="0" cellspacing="0">
                            <?php $header1 = strtolower($payment_details->revenue_type)[0] == 't' ? "Tipping Information" : "Payment Information"; ?>
                            <thead>
                                <tr>
                                    <th style="color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; font-size: 20px; border: 1px solid #000000;" colspan="2"><?php echo esc_html__($header1, 'btcpaywall'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$is_tipping) : ?>
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">Invoice id</td>
                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html($payment_details->invoice_id); ?></td>
                                    </tr>
                                <?php endif; ?>

                                <tr>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">Type</td>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html($payment_details->revenue_type); ?></td>
                                </tr>
                                <?php if ($payment_details->revenue_type == 'Pay-per-post' || $payment_details->revenue_type == 'Pay-per-view') : ?>
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">Page title</td>
                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html($payment_details->page_title); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if (!$is_tipping) : ?>

                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">Payment method</td>
                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html($payment_details->payment_method); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">Date</td>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html($payment_details->date_created); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">Total</td>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html(btcpaywall_round_amount($payment_details->currency, $payment_details->amount) . ' ' . $payment_details->currency); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php if ($collect_data) : ?>
                            <table style="border-collapse: separate; width: 100%; table-layout: fixed; margin-top:30px;" role="presentation" border="0" cellpadding="0" cellspacing="0">


                                <?php $header = "Your Data"; ?>
                                <thead>
                                    <tr>
                                        <th style="color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; font-size: 20px;  border: 1px solid #000000;" colspan="2"><?php echo esc_html__($header, 'btcpaywall'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($collect_data as $key => $value) : ?>
                                        <?php if ($key != 'id') : ?>
                                            <?php if (!empty($value)) : ?>
                                                <?php if ($key == 'full_name') : ?>
                                                    <?php $key = 'name'; ?>
                                                <?php endif; ?>
                                                <tr>
                                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html__(ucfirst($key), 'btcpaywall'); ?></td>
                                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo (esc_html__($value, 'btcpaywall')); ?></td>
                                                </tr>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        <?php endif; ?>
                        <?php if ($payment_details->download_links) : ?>
                            <div>
                                <p>
                                    You can download file/s by clicking on the button/s bellow.
                                </p>
                                <?php foreach ((array)$payment_details->download_links as $link) : ?>
                                    <div> <a href=<?php echo esc_url($link); ?> target="_blank">Download link</a> </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </td>

                </tr>
            </tbody>
        </table>
        <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
            <table style="border-collapse: separate; width: 100%;
            table-layout: auto;" role="presentation" border="0" cellpadding="0" cellspacing="0">

                <tr>
                    <td style="padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" class="content-block powered-by">
                        Powered by <a style="color: #999999; font-size: 12px; text-align: center; text-decoration:none;" href="https://btcpaywall.com/">BTCPayWall</a>.
                    </td>
                </tr>
            </table>
        </div>
        <!-- END FOOTER -->
    </div>
</body>

</html>