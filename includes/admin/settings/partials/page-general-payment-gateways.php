<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$selected_gateway = get_option('btcpw_selected_payment_gateway', 'BTCPayServer');
$supported_gateways = array(
    'BTCPayServer',
    'OpenNode',
    'Coinsnap',
    'LNBits'
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
                        <div><?php echo (file_get_contents(BTCPAYWALL_PLUGIN_DIR . 'assets/dist/img/coinsnap_logo.svg')); ?></div>
                    </td>
                    <td><input type="radio" id="coinsnap" name="btcpw_selected_payment_gateway" value=<?php echo esc_attr__("Coinsnap", "btcpaywall"); ?> <?php echo $selected_gateway === 'Coinsnap' ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo esc_html__('Receive Bitcoin and Lightning payments without your own Lightning node. You only need your own Lightning address.', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_general_settings&section=coinsnap'); ?>"><?php echo esc_html__('Manage', 'btcpaywall'); ?></a></td>
                </tr>
                <tr>
                    <td>
                        <div><?php echo (file_get_contents(BTCPAYWALL_PLUGIN_DIR . 'assets/dist/img/btcpay_logo.svg')); ?></div>
                    </td>
                    <td><input type="radio" id="btcpayserver" name="btcpw_selected_payment_gateway" value=<?php echo esc_attr__("BTCPayServer", "btcpaywall"); ?> <?php echo $selected_gateway === 'BTCPayServer' ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo esc_html__('BTCPay Server is a self-hosted, open-source cryptocurrency payment processor. It\'s secure, private, censorship-resistant and free.', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_general_settings&section=btcpayserver'); ?>"><?php echo esc_html__('Manage', 'btcpaywall'); ?></a></td>
                </tr>
                <tr>
                    <td>
                        <div><?php echo (file_get_contents(BTCPAYWALL_PLUGIN_DIR . 'assets/dist/img/opennode_logo.svg')); ?></div>
                    </td>
                    <td><input type="radio" id="opennode" name="btcpw_selected_payment_gateway" value=<?php echo esc_attr__("OpenNode", "btcpaywall"); ?> <?php echo $selected_gateway === 'OpenNode' ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo esc_html__('A simple Bitcoin payment processor for any business. Accept Bitcoin payments, receive Bitcoin donations and send Bitcoin payouts all on the OpenNode platform.', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_general_settings&section=opennode'); ?>"><?php echo esc_html__('Manage', 'btcpaywall'); ?></a></td>
                </tr>
                <tr>
                    <td>
                        <div><?php echo (file_get_contents(BTCPAYWALL_PLUGIN_DIR . 'assets/dist/img/lnbits_logo.svg')); ?></div>
                    </td>
                    <td><input type="radio" id="lnbits" name="btcpw_selected_payment_gateway" value=<?php echo esc_attr__("LNBits", "btcpaywall"); ?> <?php echo $selected_gateway === 'LNBits' ? 'checked' : ''; ?>>
                    </td>
                    <td><?php echo esc_html__('LNbits includes dozens of extensions built by contributors. Create faucets, paylinks, shareable points-of-sale, paywalls, event tickets, dice games, server services, even a shareable jukebox, and many, many more.', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_general_settings&section=lnbits'); ?>"><?php echo esc_html__('Manage', 'btcpaywall'); ?></a></td>
                </tr>
            </tbody>
        </table>
        <div class="btcpw__paywall_submit_button" style="display: inline-block;">
            <button class="button button-primary btcpw_button" type="submit">Save</button>
        </div>
    </form>

</div>
