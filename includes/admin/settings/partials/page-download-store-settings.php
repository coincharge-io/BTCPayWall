<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
$used_currency = get_option('btcpw_default_pay_per_file_currency');
$supported_currencies = BTCPayWall::CURRENCIES;
$button_color = get_option('btcpw_pay_per_file_button_color');
$button_text_color = get_option('btcpw_pay_per_file_button_text_color');
$default_button = get_option('btcpw_pay_per_file_button');
$download_limit = get_option('btcpw_default_pay_per_file_download_limit');
$collect_name = get_option('btcpw_default_pay_per_file_display_name', false);
$collect_email = get_option('btcpw_default_pay_per_file_display_email', false);
$collect_address = get_option('btcpw_default_pay_per_file_display_address', false);
$collect_phone = get_option('btcpw_default_pay_per_file_display_phone', false);
$collect_message = get_option('btcpw_default_pay_per_file_display_message', false);


$mandatory_name = get_option('btcpw_default_pay_per_file_mandatory_name', false);
$mandatory_email = get_option('btcpw_default_pay_per_file_mandatory_email', false);
$mandatory_address = get_option('btcpw_default_pay_per_file_mandatory_address', false);
$mandatory_phone = get_option('btcpw_default_pay_per_file_mandatory_phone', false);
$mandatory_message = get_option('btcpw_default_pay_per_file_mandatory_message', false);
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
            <h2>Default Options</h2>
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
            <h3>Download limit</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_default_pay_per_file_download_limit">Download limit</label>
                    <span class="btcpaywall_helper_tip" title="Set 0 for unlimited number of downloads."></span>
                </div>
                <div class="col-80">

                    <input required type="number" min=0 placeholder="Download limit" step=1 name="btcpw_default_pay_per_file_download_limit" id="btcpw_default_pay_per_file_download_limit" value="<?php echo esc_attr($download_limit); ?>">
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
            <h3><?php echo esc_html__('Customer information', 'btcpaywall'); ?> <span class="btcpaywall_helper_tip" title="Select which information about customers you want to collect by clicking on the checkboxes. Check the display if you want to make the field optional, or check both checkboxes if you want to make it mandatory."></span></h3>

            <div class="row">
                <div class="col-50">
                    <p>Full name</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_file_display_name"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" class="btcpw_default__name" name="btcpw_default_pay_per_file_display_name" <?php checked($collect_name); ?> value="true" />

                    <label for="btcpw_default_pay_per_file_mandatory_name"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__name_mandatory" name="btcpw_default_pay_per_file_mandatory_name" <?php checked($mandatory_name); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Email</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_file_display_email"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" class="btcpw_default__email" name="btcpw_default_pay_per_file_display_email" <?php checked($collect_email); ?> value="true" />

                    <label for="btcpw_default_pay_per_file_mandatory_email"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__email_mandatory" name="btcpw_default_pay_per_file_mandatory_email" <?php checked($mandatory_email); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Address</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_file_display_address"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" class="btcpw_default__address" name="btcpw_default_pay_per_file_display_address" <?php checked($collect_address); ?> value="true" />

                    <label for="btcpw_default_pay_per_file_mandatory_address"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__address_mandatory" name="btcpw_default_pay_per_file_mandatory_address" <?php checked($mandatory_address); ?> value="true" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Phone number</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_file_display_phone"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" class="btcpw_default__phone" name="btcpw_default_pay_per_file_display_phone" <?php checked($collect_phone); ?> value="true" />

                    <label for="btcpw_default_pay_per_file_mandatory_phone"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__phone_mandatory" name="btcpw_default_pay_per_file_mandatory_phone" <?php checked($mandatory_phone); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Message</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_file_display_message"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__message" name="btcpw_default_pay_per_file_display_message" <?php checked($collect_message); ?> value="true" />

                    <label for="btcpw_default_pay_per_file_mandatory_message"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__message_mandatory" name="btcpw_default_pay_per_file_mandatory_message" <?php checked($mandatory_message); ?> value="true" />

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