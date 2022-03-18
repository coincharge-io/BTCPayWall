<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
?>
<div class="btcpaywall-demo-explanation">
    <p>This page shows how you can protect your content via shortcode. Beside shortcode, the plugin supports Gutenberg, Elementor and WPBakery editors. These examples are using your default settings. Try to change settings and come back to see a difference. The sole purpose of paywall on this page is to show you how it'll look like. Bear in mind that paywall might slightly differ on a page due to a theme configuration. You can change default settings for btc_format, price, currency, duration, duration_type and whether to collect donor information within shortcode if you decide to use shortcode.
    </p>
    <p>[btcpw_start_content pay_block=[true|false] btc_format=[SATS|BTC] price=[number] currency=[SATS|BTC|EUR|USD] duration=[number] duration_type=[minute|hour|week|month|year|onetime|unlimited] display_name=[true|false] mandatory_name=[true|false] display_email=[true|false] mandatory_email=[true|false] display_phone=[true|false] mandatory_phone=[true|false] display_address=[true|false] mandatory_address=[true|false] display_message=[true|false] mandatory_message=[true|false]]
    </p>
    <div class="btcpaywall-demo-container">
        <div class="btcpaywall-demo-pay-per-post-enabled">
            <h2><?php echo esc_html__('Enable paywall with default settings', 'btcpaywall'); ?></h2>
            <p>[btcpw_start_content pay_block=true]</p>
            <p><?php echo esc_html__('This is a demo.', 'btcpaywall'); ?></p>
            <p>[btcpw_end_content]</p>
            <div>
                <h2><?php echo esc_html__('Result', 'btcpaywall'); ?></h2>

                <?php echo do_shortcode("[btcpw_start_content pay_block='true']"); ?>
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