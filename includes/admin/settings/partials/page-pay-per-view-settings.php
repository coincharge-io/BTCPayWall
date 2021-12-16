<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$used_currency = get_option('btcpw_default_pay_per_view_currency');
$supported_currencies = BTCPayWall::CURRENCIES;
$default_price = get_option('btcpw_default_pay_per_view_price');
$default_duration = get_option('btcpw_default_pay_per_view_duration');
$default_duration_type = get_option('btcpw_default_pay_per_view_duration_type');
$supported_durations = BTCPayWall::DURATIONS;
$supported_btc_format = BTCPayWall::BTC_FORMAT;
$used_format = get_option("btcpw_default_pay_per_view_btc_format");
$disabled_field = ($default_duration_type === 'unlimited') || ($default_duration_type === 'onetime');
$disable = $disabled_field ? 'disabled' : '';
$collect_name = get_option('btcpw_default_pay_per_view_display_name', false);
$collect_email = get_option('btcpw_default_pay_per_view_display_email', false);
$collect_address = get_option('btcpw_default_pay_per_view_display_address', false);
$collect_phone = get_option('btcpw_default_pay_per_view_display_phone', false);
$collect_message = get_option('btcpw_default_pay_per_view_display_message', false);


$mandatory_name = get_option('btcpw_default_pay_per_view_mandatory_name', false);
$mandatory_email = get_option('btcpw_default_pay_per_view_mandatory_email', false);
$mandatory_address = get_option('btcpw_default_pay_per_view_mandatory_address', false);
$mandatory_phone = get_option('btcpw_default_pay_per_view_mandatory_phone', false);
$mandatory_message = get_option('btcpw_default_pay_per_view_mandatory_message', false);
?>
<div id="btcpw_general_pay_per_view_options_paywall">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_general_pay_per_view_options'); ?>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_general_pay_per_view_settings_price">Default price</label>
                </div>
                <div class="col-80">

                    <input required type="number" min=0 placeholder="Default Price" step=1 name="btcpw_default_pay_per_view_price" id="btcpw_general_pay_per_view_settings_price" value="<?php echo esc_attr($default_price); ?>">

                    <select required name="btcpw_default_pay_per_view_currency" id="btcpw_general_pay_per_view_settings_currency">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $used_currency === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                <?php echo esc_html($currency); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="btcpw_pay_per_view_price_format">
                        <p>Select Bitcoin price display:</p>
                        <?php foreach ($supported_btc_format as $format) : ?>
                            <div>
                                <input type="radio" id="btcpw_general_pay_per_view_settings_btc_format" name="btcpw_default_pay_per_view_btc_format" value="<?php echo esc_attr($format) ?>" <?php echo $used_format === $format ? 'checked' : '' ?>>
                                <label for="btcpw_general_pay_per_view_settings_btc_format"><?php echo esc_html($format) ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_general_pay_per_view_settings_duration">Default duration</label>
                </div>
                <div class="col-80">
                    <input type="number" min="1" placeholder="Default Access Duration" name="btcpw_default_pay_per_view_duration" id="btcpw_general_pay_per_view_settings_duration" <?php echo $disable; ?> value="<?php echo esc_attr($default_duration); ?>">
                    <select required name="btcpw_default_pay_per_view_duration_type" id="btcpw_general_pay_per_view_settings_duration_type">
                        <option disabled value="">Select duration type</option>
                        <?php foreach ($supported_durations as $duration) : ?>
                            <option <?php echo $default_duration_type === $duration ? 'selected' : ''; ?> value="<?php echo esc_attr($duration); ?>">
                                <?php echo esc_html($duration); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <h4>Collect further information</h4>
            <div class="row">
                <div class="col-50">
                    <p>Full name</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_name">Display</label>

                    <input type="checkbox" class="btcpw_default__name" name="btcpw_default_pay_per_view_display_name" <?php checked($collect_name); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_name">Mandatory</label>
                    <input type="checkbox" class="btcpw_default__name_mandatory" name="btcpw_default_pay_per_view_mandatory_name" <?php checked($mandatory_name); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Email</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_email">Display</label>

                    <input type="checkbox" class="btcpw_default__email" name="btcpw_default_pay_per_view_display_email" <?php checked($collect_email); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_email">Mandatory</label>
                    <input type="checkbox" class="btcpw_default__email_mandatory" name="btcpw_default_pay_per_view_mandatory_email" <?php checked($mandatory_email); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Address</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_address">Display</label>

                    <input type="checkbox" class="btcpw_default__address" name="btcpw_default_pay_per_view_display_address" <?php checked($collect_address); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_address">Mandatory</label>
                    <input type="checkbox" class="btcpw_default__address_mandatory" name="btcpw_default_pay_per_view_mandatory_address" <?php checked($mandatory_address); ?> value="true" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Phone number</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_phone">Display</label>

                    <input type="checkbox" class="btcpw_default__phone" name="btcpw_default_pay_per_view_display_phone" <?php checked($collect_phone); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_phone">Mandatory</label>
                    <input type="checkbox" class="btcpw_default__phone_mandatory" name="btcpw_default_pay_per_view_mandatory_phone" <?php checked($mandatory_phone); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Message</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_message">Display</label>
                    <input type="checkbox" class="btcpw_default__message" name="btcpw_default_pay_per_view_display_message" <?php checked($collect_message); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_message">Mandatory</label>
                    <input type="checkbox" class="btcpw_default__message_mandatory" name="btcpw_default_pay_per_view_mandatory_message" <?php checked($mandatory_message); ?> value="true" />

                </div>
            </div>
            <div class="btcpw__paywall_submit_button" style="display: inline-block;">
                <button class="button button-primary btcpw_button" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>