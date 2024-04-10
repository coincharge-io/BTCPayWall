<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Admin Notify Email</title>
</head>

<body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <div class="container" style="display: block; margin: 0 auto !important; max-width: 580px; padding: 10px; width: 580px; background: #ffffff; border-radius: 3px;">
        <table style="border-collapse: separate; width: 100%;
            table-layout: auto; margin-top:30px;" role="presentation" border="0" cellpadding="0" cellspacing="0">
            <?php $payment_details = new BTCPayWall_Payment($invoice_id);
            $header1 = strtolower($type)[0] == 't' ? "Tipping Information" : "Payment Information"; ?>
            <thead>
                <tr>
                    <th style="color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; font-size: 20px;  border: 1px solid #000000;" colspan="2"><strong><?php echo esc_html__($header1, 'btcpaywall'); ?></strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong>Payment id</strong></td>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html($payment_details->id); ?></td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong>Invoice id</strong></td>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html($payment_details->invoice_id); ?></td>
                </tr>
                <?php if ($payment_details->revenue_type != 'Pay-per-file') : ?>
                    <tr>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong>Page title</strong></td>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html($payment_details->page_title); ?></td>
                    </tr>
                <?php else : ?>
                    <?php $download_ids = explode(',', $payment_details->download_ids); ?>
                    <tr>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong>Products</strong></td>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;">
                            <ul><?php foreach ($download_ids as $id) : ?>
                                    <?php $download = new BTCPayWall_Digital_Download($id); ?><li><?php echo esc_html($download->get_name()); ?></li><?php endforeach; ?></ul>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong>Payment method</strong></td>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html($payment_details->payment_method); ?></td>
                </tr>
                <?php if ($gateway == 'BTCPayServer') : ?>
                    <tr>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong>Credit on Store ID</strong></td>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html__($storeId, 'btcpaywall'); ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong>Type</strong></td>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html__($payment_details->revenue_type, 'btcpaywall'); ?></td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong>Date</strong></td>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html__($payment_details->date_created, 'btcpaywall'); ?></td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong>Total</strong></td>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo esc_html(btcpaywall_round_amount($payment_details->currency, $payment_details->amount) . ' ' . $payment_details->currency); ?></td>
                </tr>
            </tbody>
        </table>
        <?php if ($collect_data) : ?>
            <table style="border-collapse: separate; width: 100%;
            table-layout: auto; margin-top:30px;" role="presentation" border="0" cellpadding="0" cellspacing="0">


                <?php $header = strtolower($type)[0] == 't' ? "Tipper Information" : "Customer Information"; ?>
                <thead>
                    <tr>
                        <th style="color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; font-size: 20px;  border: 1px solid #000000;" colspan="2"><strong><?php echo esc_html__($header, 'btcpaywall'); ?></strong></th>
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
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><strong><?php echo esc_html__(ucfirst($key), 'btcpaywall'); ?></strong></td>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border: 1px solid #999; padding: 0.5rem;"><?php echo (esc_html__($value, 'btcpaywall')); ?></td>
                                </tr>

                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        <?php endif; ?>
        <!-- END CENTERED WHITE CONTAINER -->

        <!-- START FOOTER -->
        <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
            <h4><?php echo esc_html__('Thank you for using BTCPayWall', 'btcpaywall'); ?></h4>
            <table style="border-collapse: separate; width: 100%;
            table-layout: auto; margin-top:30px;" role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding-bottom: 10px;
        padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" class="content-block powered-by">
                        Powered by <a style="color: #999999; font-size: 12px; text-align: center; text-decoration:none;" href="https://btcpaywall.com/">BTCPayWall</a>.
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>