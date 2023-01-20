<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$selected_gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
$supported_gateways = array(
    'BTCPayServer',
    'OpenNode',
    'CoinchargePay'
);
?>
<div id="btcpw_general_payment_gateway_options">
    <form method="POST" action="options.php">
        <?php settings_fields('btcpw_general_payment_gateway_options'); ?>
        <table>
            <thead>
                <tr>
                    <th><?php echo esc_html__('Payment gateway', 'btcpaywall'); ?></th>
                    <th><?php echo esc_html__('Activated', 'btcpaywall'); ?></th>
                    <th><?php echo esc_html__('Description', 'btcpaywall'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div><?php echo esc_html__('BTCPay Server', 'btcpaywall'); ?></div>
                        <div><?php echo (file_get_contents(BTCPAYWALL_PLUGIN_DIR . 'assets/dist/img/btcpay_logo.svg')); ?></div>
                    </td>
                    <td><input type="radio" id="btcpayserver" name="btcpw_selected_payment_gateway" value=<?php echo esc_attr__("BTCPayServer", "btcpaywall"); ?> <?php echo $selected_gateway === 'BTCPayServer' ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo esc_html__('BTCPay Server is a self-hosted, open-source cryptocurrency payment processor. It\'s secure, private, censorship-resistant and free.', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_general_settings&section=btcpayserver'); ?>"><?php echo esc_html__('Manage', 'btcpaywall'); ?></a></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('OpenNode', 'btcpaywall'); ?> <div><?php echo (file_get_contents(BTCPAYWALL_PLUGIN_DIR . 'assets/dist/img/opennode_logo.svg')); ?></div>
                    </td>
                    <td><input type="radio" id="opennode" name="btcpw_selected_payment_gateway" value=<?php echo esc_attr__("OpenNode", "btcpaywall"); ?> <?php echo $selected_gateway === 'OpenNode' ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo esc_html__('A simple Bitcoin payment processor for any business. Accept Bitcoin payments, receive Bitcoin donations and send Bitcoin payouts all on the OpenNode platform.', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_general_settings&section=opennode'); ?>"><?php echo esc_html__('Manage', 'btcpaywall'); ?></a></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('CoinchargePay', 'btcpaywall'); ?> <div><?php echo (file_get_contents(BTCPAYWALL_PLUGIN_DIR . 'assets/dist/img/coincharge_pay_logo.svg')); ?></div>
                    </td>
                    <td><input type="radio" id="coincharge_pay" name="btcpw_selected_payment_gateway" value=<?php echo esc_attr__("CoinchargePay", "btcpaywall"); ?> <?php echo $selected_gateway === 'CoinchargePay' ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo esc_html__('Coincharge pay', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_general_settings&section=coincharge_pay'); ?>"><?php echo esc_html__('Manage', 'btcpaywall'); ?></a></td>
                </tr>
            </tbody>
        </table>
        <div class="btcpw__paywall_submit_button" style="display: inline-block;">
            <button class="button button-primary btcpw_button" type="submit">Save</button>
        </div>
    </form>

</div>
