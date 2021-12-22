<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
$used_currency = get_option('btcpw_default_pay_per_file_currency');
$supported_currencies = BTCPayWall::CURRENCIES;

?>
<div id="btcpw_general_payment_gateway_options">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_general_pay_per_file_options'); ?>
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
    </div>

    <div class="btcpw__paywall_submit_button" style="display: inline-block;">
        <button class="button button-primary btcpw_button" type="submit">Save</button>
    </div>
    </form>
</div>
</div>