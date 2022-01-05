<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
$used_currency = get_option('btcpw_default_pay_per_file_currency');
$supported_currencies = BTCPayWall::CURRENCIES;
$button_color = get_option('btcpw_pay_per_file_button_color');
$button_text_color = get_option('btcpw_pay_per_file_button_text_color');
$default_button = get_option('btcpw_pay_per_file_button');

?>
<style>
    #btcpw_pay__button_preview {
        background-color: <?php echo esc_html($button_color); ?>;
        color: <?php echo esc_html($button_text_color); ?>;
    }
</style>
<div id="btcpw_general_content_store_options">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_general_pay_per_file_options'); ?>
            <h3>Currency</h3>
            <div class="row">
                <div class="col-20">
                    <p for="btcpw_general_settings_price">Select Currency</p>
                </div>
                <div class="col-80">

                    <select required name="btcpw_default_pay_per_file_currency" id="btcpw_general_pay_per_file_settings_currency">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $used_currency === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                <?php echo esc_html($currency); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
            <h3>Button</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button">Button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button" name="btcpw_pay_per_file_button" value="<?php echo esc_attr($default_button); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button_color">Button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button_color" class="btcpw_pay_per_file_button_color" name="btcpw_pay_per_file_button_color" type="text" value="<?php echo esc_attr($button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button_text_color">Button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button_text_color" class="btcpw_pay_per_file_button_text_color" name="btcpw_pay_per_file_button_text_color" type="text" value="<?php echo esc_attr($button_text_color); ?>" />
                </div>
            </div>

            <div class="btcpw__paywall_submit_button" style="display: inline-block;">
                <button class="button button-primary btcpw_button" type="submit">Save</button>
            </div>
        </form>

    </div>
    <div id="btcpw_content_store_button_preview">
        <div class="btcpw_pay_preview content_store">

            <div>
                <button disabled type="button" id="btcpw_pay__button_preview"><?php echo esc_html($default_button); ?></button>
            </div>
        </div>
    </div>
</div>