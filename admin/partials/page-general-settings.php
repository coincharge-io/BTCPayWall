<?php

$used_currency = get_option('btcpw_default_currency');
$supported_currencies = BTCPayWall_Admin::CURRENCIES;
$default_price = get_option('btcpw_default_price');
$default_duration = get_option('btcpw_default_duration');
$default_duration_type = get_option('btcpw_default_duration_type');
$default_text = get_option('btcpw_default_payblock_text');
$default_button = get_option('btcpw_default_payblock_button');
$default_info = get_option('btcpw_default_payblock_info');
$supported_durations = BTCPayWall_Admin::DURATIONS;
$used_format = get_option("btcpw_default_btc_format");
$supported_btc_format = BTCPayWall_Admin::BTC_FORMAT;
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
<div class="container">
    <h1>BTCPayWall Settings</h1>

    <div style="margin-top: 25px;">

        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_general_settings'); ?>
            <div>
                <h2>Store</h2>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_btcpay_store_id">Store id</label>
                    </div>
                    <div class="col-80">
                        <input type='text' id="btcpw_btcpay_store_id" name="btcpw_btcpay_store_id" value='<?php echo $store_id ?: 'Not connected to the store'; ?>' disabled />
                    </div>
                </div>
            </div>
            <div>
                <h2>Payment Block</h2>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_checkout_title">Checkout title</label>
                    </div>
                    <div class="col-80">
                        <textarea id="btcpw_checkout_title" name="btcpw_default_payblock_text"><?php echo $default_text; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_checkout_button">Checkout button text</label>
                    </div>
                    <div class="col-80">
                        <textarea id="btcpw_checkout_button" name="btcpw_default_payblock_button"><?php echo $default_button; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_checkout_info">Checkout price info</label>
                    </div>
                    <div class="col-80">
                        <textarea id="btcpw_checkout_info" name="btcpw_default_payblock_info"><?php echo $default_info; ?></textarea>
                    </div>
                </div>
            </div>
            <div>
                <h2>Price & Duration</h2>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_default_price">Default price</label>
                    </div>
                    <div class="col-80">
                        <input required type="number" min=0 placeholder="Default Price" step=1 name="btcpw_default_price" id="btcpw_default_price" value="<?php echo $default_price ?>">

                        <select required name="btcpw_default_currency" id="btcpw_default_currency">
                            <option disabled value="">Select currency</option>
                            <?php foreach ($supported_currencies as $currency) : ?>
                                <option <?php echo $used_currency === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                    <?php echo $currency; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="btcpw_price_format">
                            <p>Select Bitcoin price display:</p>
                            <?php foreach ($supported_btc_format as $format) : ?>
                                <div>
                                    <input type="radio" id="btcpw_default_btc_format" name="btcpw_default_btc_format" value="<?php echo $format ?>" <?php echo $used_format === $format ? 'checked' : '' ?>>
                                    <label for="btcpw_default_btc_format"><?php echo $format ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_default_duration">Default duration</label>
                    </div>
                    <div class="col-80">
                        <input type="number" min="1" placeholder="Default Access Duration" name="btcpw_default_duration" id="btcpw_default_duration" disabled value="<?php echo $default_duration ?>">

                        <select required name="btcpw_default_duration_type" id="btcpw_default_duration_type">
                            <option disabled value="">Select duration type</option>
                            <?php foreach ($supported_durations as $duration) : ?>
                                <option <?php echo $default_duration_type === $duration ? 'selected' : ''; ?> value="<?php echo $duration; ?>">
                                    <?php echo $duration; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div>
                <h2>BTCPay Server</h2>

                <div class="row">
                    <div class="col-20">
                        <label>BTCPay Server Url</label>
                    </div>
                    <div class="col-80">
                        <input type="url" placeholder="BTCPay Server Url" name="btcpw_btcpay_server_url" id="btcpw_btcpay_server_url" value="<?php echo $btcpay_server_url ?>" style="min-width: 335px;">
                        <div class="btcpw_generate_api">Generate API keys:<a href="" class="btcpw_auth_key" target="_blank"></a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_btcpay_auth_key_view">BTCPay Server API Key View</label>
                    </div>
                    <div class="col-80">
                        <input required type="text" placeholder="Auth Key View" name="btcpw_btcpay_auth_key_view" id="btcpw_btcpay_auth_key_view" value="<?php echo $btcpay_auth_key_view ?>" style="min-width: 500px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_btcpay_auth_key_create">BTCPay Server API Key Create</label>
                    </div>
                    <div class="col-80">
                        <input required type="text" placeholder="Auth Key Create" name="btcpw_btcpay_auth_key_create" id="btcpw_btcpay_auth_key_create" value="<?php echo $btcpay_auth_key_create ?>" style="min-width: 500px;">
                    </div>
                </div>
            </div>
    </div>
</div>
<div style="margin-top: 10px;">
    <a href="https://btcpaywall.com/setup-btcpaywall/" target="_blank">Help</a>
</div>
<p id="btcpw_btcpay_status_success" class="btcpw_btcpay_status" style="color: green;">
    BTCPAY SERVER CONNECTED
</p>
<p id="btcpw_btcpay_status_error" class="btcpw_btcpay_status" style="color: red;"></p>
<div style="display: inline-block; margin-top: 25px;">
    <button class="button button-primary" type="submit">Save</button>
    <button id="btcpw_btcpay_check_status" class="button button-secondary" type="button">Check BTCPay Server
        Status</button>
</div>
</form>

</div>

</div>