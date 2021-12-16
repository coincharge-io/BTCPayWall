<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

$default_button_color = get_option('btcpw_pay_per_file_button_color');
$default_button_text = get_option('btcpw_pay_per_file_button_text');
$default_button_text_color = get_option('btcpw_pay_per_file_button_text_color');
$default_button_text_success = get_option('btcpw_pay_per_file_button_text_success');
?>
<style>
    #btcpw_pay__button_preview_pay_per_file {
        background-color: <?php echo esc_html($default_button_color); ?>;
        color: <?php echo esc_html($default_button_text_color); ?>;
    }
</style>
<div id="btcpw_pay_per_file_paywall">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_pay_per_file_paywall_options'); ?>

            <h3>Button Design</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button_text">Button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button_text" name="btcpw_pay_per_file_button_text" value="<?php echo esc_attr($default_button_text); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button_text_success">Button text for download button</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button_success" name="btcpw_pay_per_file_button_text_success" value="<?php echo esc_attr($default_button_text_success); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button_color">Button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button_color" class="btcpw_pay_per_file_button_color" name="btcpw_pay_per_file_button_color" type="text" value="<?php echo esc_attr($default_button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button_text_color">Button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button_text_color" class="btcpw_pay_per_file_button_text_color" name="btcpw_pay_per_file_button_text_color" type="text" value="<?php echo esc_attr($default_button_text_color); ?>" />
                </div>
            </div>


            <div class="btcpw__paywall_submit_button" style="display: inline-block;">
                <button class="button button-primary btcpw_button" type="submit">Save</button>
            </div>
        </form>
    </div>
    <div id="btcpw_pay_per_file_paywall_preview">
        <div class="btcpw_pay_preview pay_per_file pre-payment">
            <h2>Before payment</h2>
            <button disabled id="btcpw_pay__button_preview_pay_per_file"> <?php echo (!empty($default_button_text) ? esc_html($default_button_text) : 'Pay'); ?></button>
        </div>
        <div class="btcpw_pay_preview pay_per_file after-payment">
            <h2>After payment</h2>

            <a id="btcpw_pay__button_preview_pay_per_file_success" href="#"> <?php echo (!empty($default_button_text_success) ? esc_html($default_button_text_success) : 'Download'); ?></a>
        </div>
    </div>
</div>