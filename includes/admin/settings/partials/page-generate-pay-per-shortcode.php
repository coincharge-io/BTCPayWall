<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>
<div id="btcpw_general_payment_gateway_options">
    <form method="POST" action="options.php">
        <?php settings_fields('btcpw_general_payment_gateway_options'); ?>
        <p><?php echo wp_kses('BTCPayWall supports Gutenberg, WPBakery and Elementor editors. You don\'t have to generate shortcode, if you\'re using supported editors, to be able to protect your content. The paywall can be customized directly from the editor. This doesn\'t prevent you from using this page to create a shortcode. The main benefit of using this page for shortcodes is the fact that shortcode, which you create, will be stored. That allows you to reuse the shortcode on different pages.', []); ?></p>
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
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_pay_per_shortcode&type=pay-per-post'); ?>"><?php echo esc_html__('Add shortcode', 'btcpaywall'); ?></a></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Pay-per-view', 'btcpaywall'); ?>
                    </td>
                    </td>
                    <td><?php echo esc_html__('With pay-per-view, you can offer video content for a fee to be played on your own website.', 'btcpaywall'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=btcpw_pay_per_shortcode&type=pay-per-view'); ?>"><?php echo esc_html__('Add shortcode', 'btcpaywall'); ?></a></td>

                </tr>
            </tbody>
        </table>
    </form>

</div>