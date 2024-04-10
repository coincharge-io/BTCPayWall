<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

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
$help = filter_var(get_option('btcpw_pay_per_view_show_help_link'), FILTER_VALIDATE_BOOLEAN);
$help_link = get_option('btcpw_pay_per_view_help_link');
$help_text = get_option('btcpw_pay_per_view_help_link_text');
$additional_help = filter_var(get_option('btcpw_pay_per_view_show_additional_help_link'), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = get_option('btcpw_pay_per_view_additional_help_link');
$additional_help_text = get_option('btcpw_pay_per_view_additional_help_link_text');
$width = get_option('btcpw_pay_per_view_width');
$height = get_option('btcpw_pay_per_view_height');
$background = get_option('btcpw_pay_per_view_background');
$header_color = get_option('btcpw_pay_per_view_header_color');
$info_color = get_option('btcpw_pay_per_view_info_color');
$button_color = get_option('btcpw_pay_per_view_button_color');
$button_text_color = get_option('btcpw_pay_per_view_button_text_color');
$preview_title_color = get_option('btcpw_pay_per_view_preview_title_color');
$preview_description_color = get_option('btcpw_pay_per_view_preview_description_color');
$default_text = get_option('btcpw_pay_per_view_title');
$default_button = get_option('btcpw_pay_per_view_button');
$default_info = get_option('btcpw_pay_per_view_info');
$default_continue_button = get_option('btcpw_pay_per_view_continue_button');
$continue_button_color = get_option('btcpw_pay_per_view_continue_button_color');
$continue_button_text_color = get_option('btcpw_pay_per_view_continue_button_text_color');

$default_previous_button = get_option('btcpw_pay_per_view_previous_button');
$previous_button_color = get_option('btcpw_pay_per_view_previous_button_color');
$previous_button_text_color = get_option('btcpw_pay_per_view_previous_button_text_color');

?>
<style>
    .btcpw_pay__preview_preview.pay_per_view h2 {
        color: <?php echo esc_html($preview_title_color); ?>;

    }

    .btcpw_pay__preview_preview.pay_per_view p {
        color: <?php echo esc_html($preview_description_color); ?>;

    }

    .btcpw_help_preview.pay_per_view {
        display: <?php echo $help === true ? '' : 'none'; ?>;
    }

    .btcpw_additional_help_preview.pay_per_view {
        display: <?php echo $additional_help === true ? '' : 'none'; ?>;
    }

    .btcpw_pay_preview {
        background-color: <?php echo esc_html($background); ?>;
        width: <?php echo esc_html($width) . 'px'; ?>;
        height: <?php echo esc_html($height) . 'px'; ?>;
    }

    .btcpw_pay__content_preview h2 {
        color: <?php echo esc_html($header_color); ?>;
    }

    .btcpw_pay__content_preview p {
        color: <?php echo esc_html($info_color); ?>;
    }

    #btcpw_pay__button_preview {
        background-color: <?php echo esc_html($button_color); ?>;
        color: <?php echo esc_html($button_text_color); ?>;
    }
</style>
<div id="btcpw_general_pay_per_view_options_paywall">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_general_pay_per_view_options'); ?>
            <h2>Default Options</h2>
            <div class="row">

                <div class="col-20">
                    <label for="btcpw_general_pay_per_view_settings_price">Default price</label>
                </div>
                <div class="col-80">

                    <input required type="number" min=0 placeholder="Default Price" name="btcpw_default_pay_per_view_price" id="btcpw_general_pay_per_view_settings_price" value="<?php echo esc_attr($default_price); ?>">

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
                                <input type="radio" id="btcpw_general_pay_per_view_settings_btc_format" name="btcpw_default_pay_per_view_btc_format" value="<?php echo esc_attr($format); ?>" <?php echo $used_format === $format ? 'checked' : '' ?>>
                                <label for="btcpw_general_pay_per_view_settings_btc_format"><?php echo esc_html($format); ?></label>
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
                    <input type="number" min="1" placeholder="Default Access Duration" name="btcpw_default_pay_per_view_duration" id="btcpw_default_pay_per_view_duration" <?php echo esc_attr($disable); ?> value="<?php echo esc_attr($default_duration); ?>">
                    <select required name="btcpw_default_pay_per_view_duration_type" id="btcpw_default_pay_per_view_duration_type">
                        <option disabled value="">Select duration type</option>
                        <?php foreach ($supported_durations as $duration) : ?>
                            <option <?php echo $default_duration_type === $duration ? 'selected' : ''; ?> value="<?php echo esc_attr($duration); ?>">
                                <?php echo esc_html($duration); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <h3>Background</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_background">Background color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_background" class="btcpw_pay_per_view_background" name="btcpw_pay_per_view_background" type="text" value=<?php echo esc_attr($background); ?> />
                </div>
            </div>
            <h3>Dimension</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_width">Width</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_width" class="btcpw_pay_per_view_width" name="btcpw_pay_per_view_width" type="number" min="200" value=<?php echo esc_attr($width); ?> required />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_height">Height</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_height" class="btcpw_pay_per_view_height" name="btcpw_pay_per_view_height" type="number" min="200" value=<?php echo esc_attr($height); ?> required />
                </div>
            </div>

            <h3>Preview</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_preview_title_color">Title color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_preview_title_color" class="btcpw_pay_per_view_preview_title_color" name="btcpw_pay_per_view_preview_title_color" type="text" value="<?php echo esc_attr($preview_title_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_preview_description_color">Description color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_preview_description_color" class="btcpw_pay_per_view_preview_description_color" name="btcpw_pay_per_view_preview_description_color" type="text" value="<?php echo esc_attr($preview_description_color); ?>" />
                </div>
            </div>
            <h3>Header</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_title">Title</label>
                </div>
                <div class="col-80">
                    <textarea id="btcpw_pay_per_view_title" name="btcpw_pay_per_view_title"><?php echo esc_html($default_text); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_header_color">Title color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_header_color" class="btcpw_pay_per_view_header_color" name="btcpw_pay_per_view_header_color" type="text" value="<?php echo esc_attr($header_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_info">Price information <span class="btcpaywall_helper_tip" title="Placeholders will be replaced with actual values in the paywall."></span></label>
                </div>
                <div class="col-80">
                    <textarea id="btcpw_pay_per_view_info" name="btcpw_pay_per_view_info"><?php echo esc_html($default_info); ?></textarea>
                    <div class="btcpw_pay_per_placeholders">
                        <button type="button" class="btcpw_pay_per_view_price_placeholder" value="{price}">Price</button>
                        <button type="button" class="btcpw_pay_per_view_currency_placeholder" value="{currency}">Currency</button>
                        <button type="button" class="btcpw_pay_per_view_duration_placeholder" value="{duration}">Duration</button>
                        <button type="button" class="btcpw_pay_per_view_duration_type_placeholder" value="{dtype}">Duration type</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_info_color">Price information color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_info_color" class="btcpw_pay_per_view_info_color" name="btcpw_pay_per_view_info_color" type="text" value="<?php echo esc_attr($info_color); ?>" />
                </div>
            </div>
            <h3>Button</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_button">Button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_button" name="btcpw_pay_per_view_button" value="<?php echo esc_attr($default_button); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_button_color">Button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_button_color" class="btcpw_pay_per_view_button_color" name="btcpw_pay_per_view_button_color" type="text" value="<?php echo esc_attr($button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_button_text_color">Button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_button_text_color" class="btcpw_pay_per_view_button_text_color" name="btcpw_pay_per_view_button_text_color" type="text" value="<?php echo esc_attr($button_text_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_continue_button">Continue button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_continue_button" name="btcpw_pay_per_view_continue_button" value="<?php echo esc_attr($default_continue_button); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_continue_button_color">Continue button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_continue_button_color" class="btcpw_pay_per_view_continue_button_color" name="btcpw_pay_per_view_continue_button_color" type="text" value="<?php echo esc_attr($continue_button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_continue_button_text_color">Continue button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_continue_button_text_color" class="btcpw_pay_per_view_continue_button_text_color" name="btcpw_pay_per_view_continue_button_text_color" type="text" value="<?php echo esc_attr($continue_button_text_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_previous_button">Previous button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_previous_button" name="btcpw_pay_per_view_previous_button" value="<?php echo esc_attr($default_previous_button); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_previous_button_color">Previous button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_previous_button_color" class="btcpw_pay_per_view_previous_button_color" name="btcpw_pay_per_view_previous_button_color" type="text" value="<?php echo esc_attr($previous_button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_view_previous_button_text_color">Previous button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_view_previous_button_text_color" class="btcpw_pay_per_view_previous_button_text_color" name="btcpw_pay_per_view_previous_button_text_color" type="text" value="<?php echo esc_attr($previous_button_text_color); ?>" />
                </div>
            </div>

            <div id="btcpw_pay_per_view_paywall_help_button">
                <h3>Help link</h3>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_view_show_help_link">Display help link</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_view_show_help_link" class="btcpw_pay_per_view_show_help_link" name="btcpw_pay_per_view_show_help_link" type="checkbox" <?php echo checked($help); ?> value="<?php echo esc_attr($help); ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_view_help_link">Help link url</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_view_help_link" class="btcpw_pay_per_view_help_link" name="btcpw_pay_per_view_help_link" type="url" value="<?php echo esc_attr($help_link); ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_view_help_link_text">Help link text</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_view_help_link_text" class="btcpw_pay_per_view_help_link_text" name="btcpw_pay_per_view_help_link_text" type="text" value="<?php echo esc_attr($help_text); ?>" />
                    </div>
                </div>
                <h3>Additional link</h3>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_view_show_additional_help_link">Display additional link</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_view_show_additional_help_link" class="btcpw_pay_per_view_show_additional_help_link" name="btcpw_pay_per_view_show_additional_help_link" type="checkbox" <?php echo checked($additional_help); ?> value="<?php echo esc_attr($additional_help); ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_view_additional_help_link">Additional link url</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_view_additional_help_link" class="btcpw_pay_per_view_additional_help_link" name="btcpw_pay_per_view_additional_help_link" type="url" value="<?php echo esc_attr($additional_help_link); ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_view_additional_help_link_text">Additional link text</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_view_additional_help_link_text" class="btcpw_pay_per_view_additional_help_link_text" name="btcpw_pay_per_view_additional_help_link_text" type="text" value="<?php echo esc_html($additional_help_text); ?>" />
                    </div>
                </div>
            </div>
            <h3><?php echo esc_html__('Customer information', 'btcpaywall'); ?> <span class="btcpaywall_helper_tip" title="Select which information about customers you want to collect by clicking on the checkboxes. Check the display if you want to make the field optional, or check both checkboxes if you want to make it mandatory."></span></h3>
            <div class="row">
                <div class="col-50">
                    <p>Full name</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_name"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" class="btcpw_default__name" name="btcpw_default_pay_per_view_display_name" <?php checked($collect_name); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_name"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__name_mandatory" name="btcpw_default_pay_per_view_mandatory_name" <?php checked($mandatory_name); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Email</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_email"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" class="btcpw_default__email" name="btcpw_default_pay_per_view_display_email" <?php checked($collect_email); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_email"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__email_mandatory" name="btcpw_default_pay_per_view_mandatory_email" <?php checked($mandatory_email); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Address</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_address"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" class="btcpw_default__address" name="btcpw_default_pay_per_view_display_address" <?php checked($collect_address); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_address"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__address_mandatory" name="btcpw_default_pay_per_view_mandatory_address" <?php checked($mandatory_address); ?> value="true" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Phone number</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_phone"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" class="btcpw_default__phone" name="btcpw_default_pay_per_view_display_phone" <?php checked($collect_phone); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_phone"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__phone_mandatory" name="btcpw_default_pay_per_view_mandatory_phone" <?php checked($mandatory_phone); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Message</p>
                </div>
                <div class="col-50">
                    <label for="btcpw_default_pay_per_view_display_message"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__message" name="btcpw_default_pay_per_view_display_message" <?php checked($collect_message); ?> value="true" />

                    <label for="btcpw_default_pay_per_view_mandatory_message"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" class="btcpw_default__message_mandatory" name="btcpw_default_pay_per_view_mandatory_message" <?php checked($mandatory_message); ?> value="true" />

                </div>
            </div>
            <div class="btcpw__paywall_submit_button" style="display: inline-block;">
                <button class="button button-primary btcpw_button" type="submit">Save</button>
            </div>
        </form>
    </div>
    <div id="btcpw_pay_per_view_paywall_preview">
        <div class="btcpw_pay_preview pay_per_view">
            <div class="btcpw_pay__content_preview pay_per_view">
                <h2><?php echo esc_html($default_text); ?></h2>
            </div>
            <div class="btcpw_pay__preview_preview pay_per_view">
                <div class="btcpw_pay__preview_preview preview_img">
                    <img src="<?php echo esc_url(BTCPAYWALL_PLUGIN_URL . 'assets/src/img/preview.png'); ?>" alt="Video preview">
                </div>
                <div class="btcpw_pay__preview_preview preview_description">
                    <h3>Untitled</h3>
                    <p>No description</p>
                </div>
            </div>
            <div class="btcpw_pay__content_preview pay_per_view">
                <p>
                    <?php echo esc_html($default_info); ?>
                </p>
            </div>
            <div class="btcpw_pay__footer_preview pay_per_view">
                <div>
                    <button disabled type="button" id="btcpw_pay__button_preview_pay_per_view" data-post_id="<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_html($default_button); ?></button>
                </div>
                <div class="btcpw_pay__loading">
                    <p class="loading"></p>
                </div>
                <div class="btcpw_links_preview">
                    <div class="btcpw_help_preview pay_per_view">
                        <a class="btcpw_help__link_preview pay_per_view" href="<?php echo esc_attr($help_link); ?>" target="_blank"><?php echo esc_html($help_text); ?></a>
                    </div>
                    <div class="btcpw_additional_help_preview pay_per_view">
                        <a class="btcpw_additional_help__link_preview pay_per_view" href="<?php echo esc_attr($additional_help_link); ?>" target="_blank"><?php echo esc_html($additional_help_text); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
