<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

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
<style>
    .btcpw_price_format {
        display: <?php echo $used_currency === 'SATS' ? 'block' : 'none';
                    ?>;
    }
</style>
<div class="btcpw_general_settings">
    <div style="margin-top: 25px;">

        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_btcpay_server_settings'); ?>
            <div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_btcpay_store_id">Store id</label>
                    </div>
                    <div class="col-80">
                        <input type='text' id="btcpw_btcpay_store_id" name="btcpw_btcpay_store_id" value='<?php echo $store_id ? esc_attr($store_id) : 'Not connected to the store'; ?>' disabled />
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-20">
                        <label>BTCPay Server Url</label>
                    </div>
                    <div class="col-80">
                        <input type="url" placeholder="BTCPay Server Url" name="btcpw_btcpay_server_url" id="btcpw_btcpay_server_url" value="<?php echo esc_attr($btcpay_server_url); ?>" style="min-width: 335px;">
                        <div class="btcpw_generate_api">Generate API keys:<a href="" class="btcpw_auth_key" target="_blank"></a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_btcpay_auth_key_view">BTCPay Server API Key View</label>
                    </div>
                    <div class="col-80">
                        <input required type="text" placeholder="Auth Key View" name="btcpw_btcpay_auth_key_view" id="btcpw_btcpay_auth_key_view" value="<?php echo esc_attr($btcpay_auth_key_view); ?>" style="min-width: 500px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_btcpay_auth_key_create">BTCPay Server API Key Create</label>
                    </div>
                    <div class="col-80">
                        <input required type="text" placeholder="Auth Key Create" name="btcpw_btcpay_auth_key_create" id="btcpw_btcpay_auth_key_create" value="<?php echo esc_attr($btcpay_auth_key_create); ?>" style="min-width: 500px;">
                    </div>
                </div>
            </div>

            <div class="btcpw_help_link" style="margin-top: 20px;">
                <a href="<?php echo esc_url("https://btcpaywall.com/"); ?>" target="_blank">Help</a>
            </div>
            <p id="btcpw_btcpay_status_success" class="btcpw_btcpay_status" style="color: green;">
                BTCPAY SERVER CONNECTED
            </p>
            <p id="btcpw_btcpay_status_error" class="btcpw_btcpay_status" style="color: red;"></p>
            <div class="btcpw_general_settings_buttons" style="display: inline-block;">
                <button class="button button-primary btcpw_button" type="submit">Save</button>
                <button id="btcpw_btcpay_check_status" class="button button-secondary btcpw_button" type="button">Check BTCPay Server
                    Status</button>
            </div>
        </form>

    </div>
</div>