<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>
<div id="btcpw_general_payment_gateway_options">
    <form method="POST" action="options.php">
        <?php settings_fields('btcpw_general_payment_gateway_options'); ?>
        <table>
            <thead>
                <tr>
                    <th><?php echo esc_html__('Type', 'btcpaywall'); ?></th>
                    <th><?php echo esc_html__('Description', 'btcpaywall'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div><?php echo esc_html__('Pay-per-post', 'btcpaywall'); ?></div>
                    </td>
                    </td>
                    <td><?php echo esc_html__('The BTCPayWall offers publishers the opportunity to offer high-quality content to readers willing to pay per single newspaper article.', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_pay_per_shortcode&type=pay-per-post'); ?>"><?php echo esc_html__('Set up', 'btcpaywall'); ?></a></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Pay-per-view', 'btcpaywall'); ?>
                    </td>
                    </td>
                    <td><?php echo esc_html__('With the Content Store View module, BTCPayWall offers the possibility of selling video content that the viewer can watch directly.', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_pay_per_shortcode&type=pay-per-view'); ?>"><?php echo esc_html__('Set up', 'btcpaywall'); ?></a></td>

                </tr>
            </tbody>
        </table>
    </form>

</div>