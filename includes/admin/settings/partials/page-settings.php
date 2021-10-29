<?php
$used_currency = get_option('btcpw_default_currency');
$supported_currencies = BTCPayWall::CURRENCIES;
$default_price = get_option('btcpw_default_price');
$default_duration = get_option('btcpw_default_duration');
$default_duration_type = get_option('btcpw_default_duration_type');
$supported_durations = BTCPayWall::DURATIONS;
$supported_btc_format = BTCPayWall::BTC_FORMAT;
$used_format = get_option("btcpw_default_btc_format");
$disabled_field = ($default_duration_type === 'unlimited') || ($default_duration_type === 'onetime');
$disable = $disabled_field ? 'disabled' : '';


?>
<div id="btcpw_general_options_paywall">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_general_options'); ?>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_general_settings_price">Default price</label>
                </div>
                <div class="col-80">

                    <input required type="number" min=0 placeholder="Default Price" step=1 name="btcpw_default_price" id="btcpw_general_settings_price" value="<?php echo $default_price ?>">

                    <select required name="btcpw_default_currency" id="btcpw_general_settings_currency">
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
                                <input type="radio" id="btcpw_general_settings_btc_format" name="btcpw_default_btc_format" value="<?php echo $format ?>" <?php echo $used_format === $format ? 'checked' : '' ?>>
                                <label for="btcpw_general_settings_btc_format"><?php echo $format ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_general_settings_duration">Default duration</label>
                </div>
                <div class="col-80">
                    <input type="number" min="1" placeholder="Default Access Duration" name="btcpw_default_duration" id="btcpw_general_settings_duration" <?php echo $disable; ?> value="<?php echo $default_duration ?>">
                    <select required name="btcpw_default_duration_type" id="btcpw_general_settings_duration_type">
                        <option disabled value="">Select duration type</option>
                        <?php foreach ($supported_durations as $duration) : ?>
                            <option <?php echo $default_duration_type === $duration ? 'selected' : ''; ?> value="<?php echo $duration; ?>">
                                <?php echo $duration; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="btcpw__paywall_submit_button" style="display: inline-block;">
                <button class="button button-primary btcpw_button" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>