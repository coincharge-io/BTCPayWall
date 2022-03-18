<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
?>
<div class="btcpaywall-demo-explanation">
    <p><?php echo esc_html__('This page shows how to use shortcode to protect your content using your default settings. Click on the arrow next to the supported shortcode attributes to see how and which attributes can be overridden via shortcode. Omitting a shortcode attribute results in using the default setting for that attribute.', 'btcpaywall'); ?></p>
    <p class="btcpaywall-demo-shortcode-attributes"><?php echo esc_html__('Click here for a full list of supported shortcode attributes', 'btcpaywall'); ?></p>
    <div class="btcpaywall-demo-shortcode-usage">
        <p><?php echo esc_html__('Shortcode attributes can be customized like this:', 'btcpaywall'); ?> <i>[btcpw_start_content pay_block='true' price='5' currency='EUR' duration='2' duration_type='week' display_name='true']</i></p>

        <ul>
            <li>pay_block=[true|false]</li>
            <li>btc_format=[SATS|BTC]</li>
            <li>price=[number]</li>
            <li>currency=[SATS|BTC|EUR|USD]</li>
            <li>duration=[number]</li>
            <li>duration_type=[minute|hour|week|month|year|onetime|unlimited]</li>
            <li>display_name=[true|false]</li>
            <li>mandatory_name=[true|false]</li>
            <li>display_email=[true|false]</li>
            <li>mandatory_email=[true|false]</li>
            <li>display_phone=[true|false]</li>
            <li>mandatory_phone=[true|false]</li>
            <li>display_address=[true|false]</li>
            <li>mandatory_address=[true|false]</li>
            <li>display_message=[true|false]</li>
            <li>mandatory_message=[true|false]</li>
        </ul>
    </div>
    <div class="btcpaywall-demo-container">
        <div class="btcpaywall-demo-pay-per-post-enabled">
            <h2><?php echo esc_html__('Enable paywall with default settings', 'btcpaywall'); ?></h2>
            <p>[btcpw_start_content pay_block=true]</p>
            <p><?php echo esc_html__('This is a demo.', 'btcpaywall'); ?></p>
            <p>[btcpw_end_content]</p>
            <div>
                <h2><?php echo esc_html__('Result', 'btcpaywall'); ?></h2>

                <?php echo do_shortcode('[btcpw_start_content pay_block="true"]'); ?>
            </div>
        </div>
        <div class="btcpaywall-demo-pay-per-post-disabled">
            <h2><?php echo esc_html__('Disable paywall', 'btcpaywall'); ?></h2>

            <p>[btcpw_start_content pay_block=false]</p>
            <p><?php echo esc_html__('This is a demo.', 'btcpaywall'); ?></p>
            <p>[btcpw_end_content]</p>
            <div>
                <h2><?php echo esc_html__('Result', 'btcpaywall'); ?></h2>

                <p><?php echo esc_html__('This is a demo.', 'btcpaywall'); ?></p>
            </div>
        </div>
    </div>
</div>