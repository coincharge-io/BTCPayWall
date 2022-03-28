<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
$selected_gateway = get_option('btcpw_selected_payment_gateway');
$supported_gateways = array(
    'BTCPayServer',
    'OpenNode'
);
?>
<div id="btcpw_general_payment_gateway_options">
    <form method="POST" action="options.php">
        <?php settings_fields('btcpw_general_payment_gateway_options'); ?>
        <table>
            <thead>
                <tr>
                    <th><?php echo esc_html__('Payment gateway', 'btcpaywall'); ?></th>
                    <th><?php echo esc_html__('Enabled', 'btcpaywall'); ?></th>
                    <th><?php echo esc_html__('Description', 'btcpaywall'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo esc_html__('BTCPay Server', 'btcpaywall'); ?></td>
                    <td><input type="radio" id="btcpayserver" name="btcpw_selected_payment_gateway" value=<?php echo esc_attr__("BTCPayServer", "btcpaywall"); ?> <?php echo $selected_gateway === 'BTCPayServer' ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo esc_html__('BTCPay Server is a self-hosted, open-source cryptocurrency payment processor. It\'s secure, private, censorship-resistant and free.', 'btcpaywall'); ?></td>
                    <td><button><?php echo esc_html__('Manage', 'btcpaywall'); ?></button></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('OpenNode', 'btcpaywall'); ?></td>
                    <td><input type="radio" id="opennode" name="btcpw_selected_payment_gateway" value=<?php echo esc_attr__("OpenNode", "btcpaywall"); ?> <?php echo $selected_gateway === 'OpenNode' ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo esc_html__('A simple Bitcoin payment processor for any business. Accept Bitcoin payments, receive Bitcoin donations and send Bitcoin payouts all on the OpenNode platform.', 'btcpaywall'); ?></td>
                    <td><button><?php echo esc_html__('Manage', 'btcpaywall'); ?></button></td>

                </tr>
            </tbody>
        </table>
        <div class="btcpw__paywall_submit_button" style="display: inline-block;">
            <button class="button button-primary btcpw_button" type="submit">Save</button>
        </div>
    </form>

</div>