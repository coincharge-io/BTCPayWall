<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
$selected_gateway = get_option('btcpw_selected_payment_gateway');
$supported_gateways = array(
    'BTCPayServer',
    'OpenNode'
);
?>
<div id="btcpw_general_payment_gateway_options">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_general_payment_gateway_options'); ?>
            <div class="row">
                <div class="col-20">
                    <p for="btcpw_general_settings_price">Select Payment Gateway</p>
                </div>
                <div class="col-80">

                    <select required name="btcpw_selected_payment_gateway">
                        <?php foreach ($supported_gateways as $gateway) : ?>
                            <option <?php echo $selected_gateway === $gateway ? 'selected' : ''; ?> value="<?php echo esc_attr($gateway); ?>">
                                <?php echo esc_html($gateway); ?>
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