<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

$used_currency = get_option('btcpw_default_currency');
$supported_currencies = BTCPayWall::CURRENCIES;
$default_price = get_option('btcpw_default_price');
$default_duration = get_option('btcpw_default_duration');
$default_duration_type = get_option('btcpw_default_duration_type');
$default_text = get_option('btcpw_default_payblock_text');
$default_button = get_option('btcpw_default_payblock_button');
$default_info = get_option('btcpw_default_payblock_info');
$supported_durations = BTCPayWall::DURATIONS;
$used_format = get_option("btcpw_default_btc_format");
$supported_btc_format = BTCPayWall::BTC_FORMAT;
$btcpay_server_url = get_option('btcpw_btcpay_server_url');
$btcpay_auth_key_view = get_option('btcpw_btcpay_auth_key_view');
$btcpay_auth_key_create = get_option('btcpw_btcpay_auth_key_create');
$store_id = get_option('btcpw_btcpay_store_id');
?>
<div class="btcpw_general_settings">
    <div style="margin-top: 25px;">
        <table class="general_settings_table">
            <tbody>
                <form method="POST" action="options.php">
                    <?php settings_fields('btcpw_btcpay_server_settings'); ?>
                    <tr class="odd">
                        <td>
                            <label for="btcpw_btcpay_store_id"><?php echo esc_html__('Store ID', 'btcpaywall'); ?></label>
                        </td>
                        <td>
                            <input type='text' id="btcpw_btcpay_store_id" name="btcpw_btcpay_store_id" value='<?php echo $store_id ? esc_attr($store_id) : 'Not connected to the store'; ?>' disabled />
                        </td>
                    </tr>
                    <tr class="even">
                        <td>
                            <label><?php echo esc_html__('BTCPay Server Url', 'btcpaywall'); ?></label>
                        </td>
                        <td>
                            <input type="url" name="btcpw_btcpay_server_url" id="btcpw_btcpay_server_url" value="<?php echo esc_attr($btcpay_server_url); ?>">
                            <div class="btcpw_generate_api"><?php echo esc_html__('Generate API keys:', 'btcpaywall'); ?><a href="" class="btcpw_auth_key" target="_blank"></a></div>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td>
                            <label for="btcpw_btcpay_auth_key_view"><?php echo esc_html__('BTCPay Server API Key View', 'btcpaywall'); ?></label>
                        </td>
                        <td>
                            <input required type="text" name="btcpw_btcpay_auth_key_view" id="btcpw_btcpay_auth_key_view" value="<?php echo esc_attr($btcpay_auth_key_view); ?>">
                        </td>
                    </tr>
                    <tr class="even">
                        <td>
                            <label for="btcpw_btcpay_auth_key_create"><?php echo esc_html__('BTCPay Server API Key Create', 'btcpaywall'); ?></label>
                        </td>
                        <td>
                            <input required type="text" name="btcpw_btcpay_auth_key_create" id="btcpw_btcpay_auth_key_create" value="<?php echo esc_attr($btcpay_auth_key_create); ?>">
                        </td>
                    </tr>
                    <tr class="odd btcpw_help_link" style="margin-top: 20px;">
                        <td colspan=2><a href="<?php echo esc_url("https://btcpaywall.com/"); ?>" target="_blank"><?php echo esc_html__('Help', 'btcpaywall'); ?></a></td>
                    </tr>
                    <tr>
                        <td colspan=2 id="btcpw_btcpay_status_success" class="btcpw_btcpay_status" style="color: green;">
                            <?php echo esc_html__('BTCPAY SERVER CONNECTED', 'btcpaywall'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2 id="btcpw_btcpay_status_error" class="btcpw_btcpay_status" style="color: red;"></td>
                    </tr>
                    <tr class="even btcpw_general_settings_buttons">
                        <td>
                            <button class="button button-primary btcpw_button" type="submit">Save</button>
                        </td>
                        <td>
                            <button id="btcpw_btcpay_check_status" class="button button-secondary btcpw_button" type="button"><?php echo esc_html__('Test connection', 'btcpaywall'); ?></button>
                        </td>
                    </tr>
                </form>

            </tbody>
        </table>
    </div>
</div>
