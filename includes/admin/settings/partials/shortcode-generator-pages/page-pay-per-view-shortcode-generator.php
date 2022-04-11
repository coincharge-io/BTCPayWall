<?php
// Exit if accessed directly.


if (!defined('ABSPATH')) exit;
$id = sanitize_text_field($_GET['id']) ?? null;

$result = new BTCPayWall_Pay_Per_Shortcode($id);
$used_currency = get_option('btcpaywall_pay_per_view_currency');
$supported_currencies = BTCPayWall::CURRENCIES;
$price = get_option('btcpaywall_pay_per_view_price');
$duration = get_option('btcpaywall_pay_per_view_duration');
$duration_type = get_option('btcpaywall_pay_per_view_duration_type');
$supported_durations = BTCPayWall::DURATIONS;
$supported_btc_format = BTCPayWall::BTC_FORMAT;
$used_format = get_option("btcpaywall_pay_per_view_btc_format");
$disabled_field = ($result->duration_type === 'unlimited') || ($result->duration_type === 'onetime');
$disable = $disabled_field ? 'disabled' : '';
$preview_image = wp_get_attachment_image_src($result->preview_image);
?>
<style>
    .btcpw_pay__preview_preview.pay_per_view h2 {
        color: <?php echo esc_html($result->preview_title_color); ?>;

    }

    .btcpw_pay__preview_preview.pay_per_view p {
        color: <?php echo esc_html($result->preview_description_color); ?>;

    }

    .btcpw_help_preview.pay_per_view {
        display: <?php echo $result->link === true ? '' : 'none'; ?>;
    }

    .btcpw_additional_help_preview.pay_per_view {
        display: <?php echo $result->additional_link === true ? '' : 'none'; ?>;
    }

    .btcpw_pay_preview {
        background-color: <?php echo esc_html($result->background_color); ?>;
        width: <?php echo esc_html($result->width) . 'px'; ?>;
        height: <?php echo esc_html($result->height) . 'px'; ?>;
    }

    .btcpw_pay__content_preview h2 {
        color: <?php echo esc_html($result->header_color); ?>;
    }

    .btcpw_pay__content_preview p {
        color: <?php echo esc_html($result->info_color); ?>;
    }

    #btcpw_pay__button_preview {
        background-color: <?php echo esc_html($result->button_color); ?>;
        color: <?php echo esc_html($result->button_txt_color); ?>;
    }
</style>
<div id="btcpaywall_pay_per_view_shortcode_generator">
    <div>
        <form method="POST" action="options.php" id="pay-per-view-shortcode-generator-form">
            <?php if ($result->id > 0) : ?>
                <div class="row">

                    <div class="col-20">
                        <p>Shortcode</p>
                    </div>
                    <div class="col-80">
                        <button class="button hint-tooltip hint--top js-btcpaywall-shortcode-button" data-btcpaywall-shortcode="<?php echo esc_attr($result->shortcode()); ?>"><span class="dashicons dashicons-admin-page"></span>Copy Shortcode</button>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_shortcode_name">Name</label>
                </div>
                <div class="col-80">
                    <input type="text" name="btcpaywall_pay_per_view_shortcode_name" id="btcpaywall_pay_per_view_shortcode_name" value="<?php echo esc_attr($result->name); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="btcpaywall_pay_per_view_paywall"><?php echo esc_html__('Enable paywall', 'btcpaywall'); ?></label>
                </div>
                <div class="col-50">
                    <input type="checkbox" id="btcpaywall_pay_per_view_paywall" name="btcpaywall_pay_per_view_paywall" <?php checked($result->pay_block); ?> value="true" />
                </div>
            </div>
            <div class="row">

                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_price">Default price</label>
                </div>
                <div class="col-80">

                    <input required type="number" min=0 placeholder="Default Price" step=1 name="btcpaywall_pay_per_view_price" id="btcpaywall_pay_per_view_price" value="<?php echo esc_attr($result->price); ?>">

                    <select required name="btcpaywall_pay_per_view_currency" id="btcpaywall_pay_per_view_currency">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $result->currency === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                <?php echo esc_html($currency); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="btcpaywall_pay_per_view_price_format">
                        <p>Select Bitcoin price display:</p>
                        <?php foreach ($supported_btc_format as $format) : ?>
                            <div>
                                <input type="radio" id="btcpaywall_pay_per_view_btc_format" name="btcpaywall_pay_per_view_btc_format" value="<?php echo esc_attr($format); ?>" <?php echo $result->btc_format === $format ? 'checked' : '' ?>>
                                <label for="btcpaywall_pay_per_view_btc_format"><?php echo esc_html($format); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_duration">Default duration</label>
                </div>
                <div class="col-80">
                    <input type="number" min="1" placeholder="Default Access Duration" name="btcpaywall_pay_per_view_duration" id="btcpaywall_pay_per_view_duration" <?php echo esc_attr($disable); ?> value="<?php echo esc_attr($result->duration); ?>">
                    <select required name="btcpaywall_pay_per_view_duration_type" id="btcpaywall_pay_per_view_duration_type">
                        <option disabled value="">Select duration type</option>
                        <?php foreach ($supported_durations as $duration) : ?>
                            <option <?php echo $result->duration_type === $duration ? 'selected' : ''; ?> value="<?php echo esc_attr($duration); ?>">
                                <?php echo esc_html($duration); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <h3>Background</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_background">Background color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_background" class="btcpaywall_pay_per_view_background" name="btcpaywall_pay_per_view_background" type="text" value=<?php echo esc_attr($result->background_color); ?> />
                </div>
            </div>
            <h3>Dimension</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_width">Width</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_width" class="btcpaywall_pay_per_view_width" name="btcpaywall_pay_per_view_width" type="number" min="200" value=<?php echo esc_attr($result->width); ?> required />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_height">Height</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_height" class="btcpaywall_pay_per_view_height" name="btcpaywall_pay_per_view_height" type="number" min="200" value=<?php echo esc_attr($result->height); ?> required />
                </div>
            </div>

            <h3>Preview</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_preview_title">Title</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_preview_title" class="btcpaywall_pay_per_view_preview_title" name="btcpaywall_pay_per_view_preview_title" type="text" value="<?php echo esc_attr($result->preview_title); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_preview_title_color">Title color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_preview_title_color" class="btcpaywall_pay_per_view_preview_title_color" name="btcpaywall_pay_per_view_preview_title_color" type="text" value="<?php echo esc_attr($result->preview_title_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_preview_description">Description</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_preview_description" class="btcpaywall_pay_per_view_preview_description" name="btcpaywall_pay_per_view_preview_description" type="text" value="<?php echo esc_attr($result->preview_description_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_preview_description_color">Description color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_preview_description_color" class="btcpaywall_pay_per_view_preview_description_color" name="btcpaywall_pay_per_view_preview_description_color" type="text" value="<?php echo esc_attr($result->preview_description_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for=""><?php echo esc_html__('Preview image', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <?php if ($preview_image) : ?>
                        <button id="btcpaywall_pay_per_view_preview_image" name="btcpaywall_pay_per_view_preview_image"><img width="100" height="100" alt="Tipping banner high background" src="<?php echo esc_url($preview_image[0]); ?>" /></a></button>
                        <button type="button" class="btcpaywall_pay_per_view_remove_preview_image">
                            <?php echo esc_html__('Remove', 'btcpaywall'); ?></button>
                        <input type="hidden" class="btcpaywall_pay_per_view_preview_image_id" id="btcpaywall_pay_per_view_preview_image_id" type="text" value="<?php echo esc_attr($result->preview_image); ?>" />
                    <?php else : ?>
                        <button id="btcpaywall_pay_per_view_preview_image" name="btcpaywall_pay_per_view_preview_image"><?php echo esc_html__('Upload', 'btcpaywall'); ?></button>
                        <button type="button" class="btcpaywall_pay_per_view_remove_preview_image" style="display:none"><?php echo esc_html__('Remove', 'btcpaywall'); ?></button>
                        <input type="hidden" class="btcpaywall_pay_per_view_preview_image_id" id="btcpaywall_pay_per_view_preview_image_id" type="text" value="<?php echo esc_attr($result->preview_image); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <h3>Header</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_title">Title</label>
                </div>
                <div class="col-80">
                    <textarea id="btcpaywall_pay_per_view_title" name="btcpaywall_pay_per_view_title"><?php echo esc_html($result->header_text); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_title_color">Title color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_title_color" class="btcpaywall_pay_per_view_title_color" name="btcpaywall_pay_per_view_title_color" type="text" value="<?php echo esc_attr($result->header_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_info">Price information <span class="btcpaywall_helper_tip" title="Placeholders will be replaced with actual values in the paywall."></span></label>
                </div>
                <div class="col-80">
                    <textarea id="btcpaywall_pay_per_view_info" name="btcpaywall_pay_per_view_info"><?php echo esc_html($result->info_text); ?></textarea>
                    <div class="btcpaywall_pay_per_placeholders">
                        <button type="button" class="btcpaywall_pay_per_view_price_placeholder" value="{price}">Price</button>
                        <button type="button" class="btcpaywall_pay_per_view_currency_placeholder" value="{currency}">Currency</button>
                        <button type="button" class="btcpaywall_pay_per_view_duration_placeholder" value="{duration}">Duration</button>
                        <button type="button" class="btcpaywall_pay_per_view_duration_type_placeholder" value="{dtype}">Duration type</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_info_color">Price information color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_info_color" class="btcpaywall_pay_per_view_info_color" name="btcpaywall_pay_per_view_info_color" type="text" value="<?php echo esc_attr($result->info_color); ?>" />
                </div>
            </div>
            <h3>Button</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_button">Button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_button" name="btcpaywall_pay_per_view_button" value="<?php echo esc_attr($result->button_txt); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_button_color">Button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_button_color" class="btcpaywall_pay_per_view_button_color" name="btcpaywall_pay_per_view_button_color" type="text" value="<?php echo esc_attr($result->button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_button_text_color">Button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_button_text_color" class="btcpaywall_pay_per_view_button_text_color" name="btcpaywall_pay_per_view_button_text_color" type="text" value="<?php echo esc_attr($result->button_txt_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_continue_button">Continue button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_continue_button" name="btcpaywall_pay_per_view_continue_button" value="<?php echo esc_attr($result->continue_button_text); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_continue_button_color">Continue button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_continue_button_color" class="btcpaywall_pay_per_view_continue_button_color" name="btcpaywall_pay_per_view_continue_button_color" type="text" value="<?php echo esc_attr($result->continue_button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_continue_button_text_color">Continue button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_continue_button_text_color" class="btcpaywall_pay_per_view_continue_button_text_color" name="btcpaywall_pay_per_view_continue_button_text_color" type="text" value="<?php echo esc_attr($result->continue_button_text_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_previous_button">Previous button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_previous_button" name="btcpaywall_pay_per_view_previous_button" value="<?php echo esc_attr($result->previous_button_text); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_previous_button_color">Previous button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_previous_button_color" class="btcpaywall_pay_per_view_previous_button_color" name="btcpaywall_pay_per_view_previous_button_color" type="text" value="<?php echo esc_attr($result->previous_button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_view_previous_button_text_color">Previous button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpaywall_pay_per_view_previous_button_text_color" class="btcpaywall_pay_per_view_previous_button_text_color" name="btcpaywall_pay_per_view_previous_button_text_color" type="text" value="<?php echo esc_attr($result->previous_button_text_color); ?>" />
                </div>
            </div>

            <div id="btcpaywall_pay_per_view_paywall_help_button">
                <h3>Help link</h3>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_view_show_help_link">Display help link</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpaywall_pay_per_view_show_help_link" class="btcpaywall_pay_per_view_show_help_link" name="btcpaywall_pay_per_view_show_help_link" type="checkbox" <?php echo checked($result->link); ?> value="true" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_view_help_link">Help link url</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpaywall_pay_per_view_help_link" class="btcpaywall_pay_per_view_help_link" name="btcpaywall_pay_per_view_help_link" type="url" value="<?php echo esc_attr($result->help_link); ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_view_help_link_text">Help link text</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpaywall_pay_per_view_help_link_text" class="btcpaywall_pay_per_view_help_link_text" name="btcpaywall_pay_per_view_help_link_text" type="text" value="<?php echo esc_attr($result->help_text); ?>" />
                    </div>
                </div>
                <h3>Additional link</h3>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_view_show_additional_help_link">Display additional link</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpaywall_pay_per_view_show_additional_help_link" class="btcpaywall_pay_per_view_show_additional_help_link" name="btcpaywall_pay_per_view_show_additional_help_link" type="checkbox" <?php echo checked($result->additional_link); ?> value="true" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_view_additional_help_link">Additional link url</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpaywall_pay_per_view_additional_help_link" class="btcpaywall_pay_per_view_additional_help_link" name="btcpaywall_pay_per_view_additional_help_link" type="url" value="<?php echo esc_attr($result->additional_help_link); ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_view_additional_help_link_text">Additional link text</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpaywall_pay_per_view_additional_help_link_text" class="btcpaywall_pay_per_view_additional_help_link_text" name="btcpaywall_pay_per_view_additional_help_link_text" type="text" value="<?php echo esc_html($result->additional_help_text); ?>" />
                    </div>
                </div>
            </div>
            <h3><?php echo esc_html__('Customer information', 'btcpaywall'); ?> <span class="btcpaywall_helper_tip" title="Select which information about customers you want to collect by clicking on the checkboxes. Check the display if you want to make the field optional, or check both checkboxes if you want to make it mandatory."></span></h3>
            <div class="row">
                <div class="col-50">
                    <p>Full name</p>
                </div>
                <div class="col-50">
                    <label for="btcpaywall_pay_per_view_display_name"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" id="btcpaywall_pay_per_view_display_name" class="btcpaywall_name" name="btcpaywall_pay_per_view_display_name" <?php checked($result->display_name); ?> value="true" />

                    <label for="btcpaywall_pay_per_view_mandatory_name"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" id="btcpaywall_pay_per_view_mandatory_name" class="btcpaywall_name_mandatory" name="btcpaywall_pay_per_view_mandatory_name" <?php checked($result->mandatory_name); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Email</p>
                </div>
                <div class="col-50">
                    <label for="btcpaywall_pay_per_view_display_email"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" id="btcpaywall_pay_per_view_display_email" class="btcpaywall_email" name="btcpaywall_pay_per_view_display_email" <?php checked($result->display_email); ?> value="true" />

                    <label for="btcpaywall_pay_per_view_mandatory_email"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" id="btcpaywall_pay_per_view_mandatory_email" class="btcpaywall_email_mandatory" name="btcpaywall_pay_per_view_mandatory_email" <?php checked($result->mandatory_email); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Address</p>
                </div>
                <div class="col-50">
                    <label for="btcpaywall_pay_per_view_display_address"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" id="btcpaywall_pay_per_view_display_address" class="btcpaywall_address" name="btcpaywall_pay_per_view_display_address" <?php checked($result->display_address); ?> value="true" />

                    <label for="btcpaywall_pay_per_view_mandatory_address"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" id="btcpaywall_pay_per_view_mandatory_address" class="btcpaywall_address_mandatory" name="btcpaywall_pay_per_view_mandatory_address" <?php checked($result->mandatory_address); ?> value="true" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Phone number</p>
                </div>
                <div class="col-50">
                    <label for="btcpaywall_pay_per_view_display_phone"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                    <input type="checkbox" id="btcpaywall_pay_per_view_display_phone" class="btcpaywall_phone" name="btcpaywall_pay_per_view_display_phone" <?php checked($result->display_phone); ?> value="true" />

                    <label for="btcpaywall_pay_per_view_mandatory_phone"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" id="btcpaywall_pay_per_view_mandatory_phone" class="btcpaywall_phone_mandatory" name="btcpaywall_pay_per_view_mandatory_phone" <?php checked($result->mandatory_phone); ?> value="true" />

                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p>Message</p>
                </div>
                <div class="col-50">
                    <label for="btcpaywall_pay_per_view_display_message"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>
                    <input type="checkbox" id="btcpaywall_pay_per_view_display_message" class="btcpaywall_message" name="btcpaywall_pay_per_view_display_message" <?php checked($result->display_message); ?> value="true" />

                    <label for="btcpaywall_pay_per_view_mandatory_message"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                    <input type="checkbox" id="btcpaywall_pay_per_view_mandatory_message" class="btcpaywall_message_mandatory" name="btcpaywall_pay_per_view_mandatory_message" <?php checked($result->mandatory_message); ?> value="true" />

                </div>
            </div>
            <input type="hidden" id="btcpaywall_pay_per_view_id" value="<?php echo esc_attr($id); ?>" />
            <input type="hidden" id="btcpaywall_pay_per_view_type" value="pay-per-view" />

            <div class="btcpaywall__paywall_submit_button" style="display: inline-block;">
                <button class="button button-primary btcpaywall_button" type="submit">Save</button>
            </div>
        </form>
    </div>
    <div id="btcpw_pay_per_view_paywall_preview">
        <div class="btcpw_pay_preview pay_per_view">
            <div class="btcpw_pay__content_preview pay_per_view">
                <h2><?php echo esc_html($result->header_text); ?></h2>
            </div>
            <div class="btcpw_pay__preview_preview pay_per_view">
                <div class="btcpw_pay__preview_preview preview_img">
                    <img src="<?php echo esc_url($preview_image[0]); ?>" alt="Video preview">
                </div>
                <div class="btcpw_pay__preview_preview preview_description">
                    <h3><?php echo esc_html($result->preview_title); ?></h3>
                    <p><?php echo esc_html($result->preview_description); ?></p>
                </div>
            </div>
            <div class="btcpw_pay__content_preview pay_per_view">
                <p>
                    <?php echo esc_html($result->info_text); ?>
                </p>
            </div>
            <div class="btcpw_pay__footer_preview pay_per_view">
                <div>
                    <button disabled type="button" id="btcpw_pay__button_preview_pay_per_view"><?php echo esc_html($result->button_txt); ?></button>
                </div>
                <div class="btcpw_pay__loading">
                    <p class="loading"></p>
                </div>
                <div class="btcpw_links_preview">
                    <div class="btcpw_help_preview pay_per_view">
                        <a class="btcpw_help__link_preview pay_per_view" href="<?php echo esc_attr($result->help_link); ?>" target="_blank"><?php echo esc_html($result->help_text); ?></a>
                    </div>
                    <div class="btcpw_additional_help_preview pay_per_view">
                        <a class="btcpw_additional_help__link_preview pay_per_view" href="<?php echo esc_attr($result->additional_help_link); ?>" target="_blank"><?php echo esc_html($result->additional_help_text); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>