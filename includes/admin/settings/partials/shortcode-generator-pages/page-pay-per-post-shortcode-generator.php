<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
$id = sanitize_text_field($_GET['id']) ?? null;
$result = new BTCPayWall_Pay_Per_Shortcode($id);

$used_currency = get_option('btcpaywall_pay_per_post_currency');
$supported_currencies = BTCPayWall::CURRENCIES;
$price = get_option('btcpaywall_pay_per_post_price');
$duration = get_option('btcpaywall_pay_per_post_duration');
$duration_type = get_option('btcpaywall_pay_per_post_duration_type');
$supported_durations = BTCPayWall::DURATIONS;
$supported_btc_format = BTCPayWall::BTC_FORMAT;
$used_format = get_option("btcpaywall_pay_per_post_btc_format");
$disabled_field = ($result->duration_type === 'unlimited') || ($result->duration_type === 'onetime');
$disable = $disabled_field ? 'disabled' : '';
$back_url = (sanitize_text_field($_GET['action']) == 'edit') ? 'admin.php?page=btcpw_pay_per_shortcode_list' : 'admin.php?page=btcpw_pay_per_shortcode_generator';
?>
<style>
    .btcpw_help_preview.pay_per_post {
        display: <?php echo $result->link === true ? 'block' : 'none'; ?>;
    }

    .btcpw_additional_help_preview.pay_per_post {
        display: <?php echo $result->additional_link === true ? 'block' : 'none'; ?>;
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
<div id="btcpaywall_pay_per_post_shortcode_generator">
    <div>
        <form method="POST" action="options.php" id="pay-per-post-shortcode-generator-form">
            <?php if ($result->id > 0) : ?>
                <div class="row">

                    <div class="col-20">
                        <p>Shortcode</p>
                    </div>
                    <div class="col-80">
                        <button type="button" class="button hint-tooltip hint--top js-btcpaywall-shortcode-button" data-btcpaywall-shortcode="<?php echo esc_attr($result->shortcode()); ?>"><span class="dashicons dashicons-admin-page"></span>Copy Shortcode</button>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_post_shortcode_name">Name</label>
                </div>
                <div class="col-80">
                    <input type="text" name="btcpaywall_pay_per_post_shortcode_name" id="btcpaywall_pay_per_post_shortcode_name" value="<?php echo esc_attr($result->name); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="btcpaywall_pay_per_post_paywall"><?php echo esc_html__('Enable paywall', 'btcpaywall'); ?></label>
                </div>
                <div class="col-50">
                    <input type="checkbox" id="btcpaywall_pay_per_post_paywall" name="btcpaywall_pay_per_post_paywall" <?php checked($result->pay_block); ?> value="true" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_post_price">Default price</label>
                </div>
                <div class="col-80">

                    <input required type="number" min=0 placeholder="Default Price" step=1 name="btcpaywall_pay_per_post_price" id="btcpaywall_pay_per_post_price" value="<?php echo esc_attr($result->price); ?>">

                    <select required name="btcpaywall_pay_per_post_currency" id="btcpaywall_pay_per_post_currency">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $result->currency === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                <?php echo esc_html($currency); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="btcpaywall_pay_per_post_price_format">
                        <p>Select Bitcoin price display:</p>
                        <?php foreach ($supported_btc_format as $format) : ?>
                            <div>
                                <input type="radio" id="btcpaywall_pay_per_post_btc_format" name="btcpaywall_pay_per_post_btc_format" value="<?php echo esc_attr($result->btc_format); ?>" <?php echo $result->btc_format === $format ? 'checked' : '' ?>>
                                <label for="btcpaywall_pay_per_post_btc_format"><?php echo esc_html($format); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_post_duration">Default duration</label>
                </div>
                <div class="col-80">
                    <input type="number" min="1" placeholder="Default Access Duration" name="btcpaywall_pay_per_post_duration" id="btcpaywall_pay_per_post_duration" <?php echo esc_attr($disable); ?> value="<?php echo esc_attr($result->duration); ?>">
                    <select required name="btcpaywall_pay_per_post_duration_type" id="btcpaywall_pay_per_post_duration_type">
                        <option disabled value="">Select duration type</option>
                        <?php foreach ($supported_durations as $duration) : ?>
                            <option <?php echo $result->duration_type === $duration ? 'selected' : ''; ?> value="<?php echo esc_attr($duration); ?>">
                                <?php echo esc_html($duration); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div data-id="design" class="btcpaywall_pay_per_container_header">

                <h3><?php echo esc_html__('Paywall design', 'btcpaywall'); ?></h3>
            </div>
            <div class="btcpaywall_pay_per_container_body design-body">

                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_post_background">Background color</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpaywall_pay_per_post_background" class="btcpaywall_pay_per_post_background" name="btcpaywall_pay_per_post_background" type="text" value=<?php echo esc_attr($result->background_color); ?> />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_post_width">Width</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpaywall_pay_per_post_width" class="btcpaywall_pay_per_post_width" name="btcpaywall_pay_per_post_width" type="number" min="200" value=<?php echo esc_attr($result->width); ?> required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_post_height">Height</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpaywall_pay_per_post_height" class="btcpaywall_pay_per_post_height" name="btcpaywall_pay_per_post_height" type="number" min="200" value=<?php echo esc_attr($result->height); ?> required />
                    </div>
                </div>
                <div data-id="header" class="btcpaywall_pay_per_container_header">
                    <h3><?php echo esc_html__('Main', 'btcpaywall'); ?></h3>
                </div>
                <div class="btcpaywall_pay_per_container_body header-body">

                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_title">Title</label>
                        </div>
                        <div class="col-80">
                            <textarea id="btcpaywall_pay_per_post_title" name="btcpaywall_pay_per_post_title"><?php echo esc_html($result->header_text); ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_title_color">Title color</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_title_color" class="btcpaywall_pay_per_post_title_color" name="btcpaywall_pay_per_post_title_color" type="text" value="<?php echo esc_attr($result->header_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_info">Price information <span class="btcpaywall_helper_tip" title="Placeholders will be replaced with actual values in the paywall."></span></label>
                        </div>
                        <div class="col-80">
                            <textarea id="btcpaywall_pay_per_post_info" name="btcpaywall_pay_per_post_info"><?php echo esc_html($result->info_text); ?></textarea>
                            <div class="btcpaywall_pay_per_placeholders">
                                <button type="button" class="btcpaywall_pay_per_post_price_placeholder" value="{price}">Price</button>
                                <button type="button" class="btcpaywall_pay_per_post_currency_placeholder" value="{currency}">Currency</button>
                                <button type="button" class="btcpaywall_pay_per_post_duration_placeholder" value="{duration}">Duration</button>
                                <button type="button" class="btcpaywall_pay_per_post_duration_type_placeholder" value="{dtype}">Duration type</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_info_color">Price information color</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_info_color" class="btcpaywall_pay_per_post_info_color" name="btcpaywall_pay_per_post_info_color" type="text" value="<?php echo esc_attr($result->info_color); ?>" />
                        </div>
                    </div>
                </div>
                <div data-id="button" class="btcpaywall_pay_per_container_header">
                    <h3><?php echo esc_html__('Button', 'btcpaywall'); ?></h3>
                </div>
                <div class="btcpaywall_pay_per_container_body button-body">

                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_button">Button text</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_button" name="btcpaywall_pay_per_post_button" value="<?php echo esc_attr($result->button_text); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_button_color">Button color</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_button_color" class="btcpaywall_pay_per_post_button_color" name="btcpaywall_pay_per_post_button_color" type="text" value="<?php echo esc_attr($result->button_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_button_text_color">Button text color</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_button_text_color" class="btcpaywall_pay_per_post_button_text_color" name="btcpaywall_pay_per_post_button_text_color" type="text" value="<?php echo esc_attr($result->button_txt_color); ?>" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_continue_button">Continue button text</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_continue_button" name="btcpaywall_pay_per_post_continue_button" value="<?php echo esc_attr($result->continue_button_text); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_continue_button_color">Continue button color</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_continue_button_color" class="btcpaywall_pay_per_post_continue_button_color" name="btcpaywall_pay_per_post_continue_button_color" type="text" value="<?php echo esc_attr($result->continue_button_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_continue_button_text_color">Continue button text color</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_continue_button_text_color" class="btcpaywall_pay_per_post_continue_button_text_color" name="btcpaywall_pay_per_post_continue_button_text_color" type="text" value="<?php echo esc_attr($result->continue_button_text_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_previous_button">Previous button text</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_previous_button" name="btcpaywall_pay_per_post_previous_button" value="<?php echo esc_attr($result->previous_button_text); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_previous_button_color">Previous button color</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_previous_button_color" class="btcpaywall_pay_per_post_previous_button_color" name="btcpaywall_pay_per_post_previous_button_color" type="text" value="<?php echo esc_attr($result->previous_button_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_previous_button_text_color">Previous button text color</label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_previous_button_text_color" class="btcpaywall_pay_per_post_previous_button_text_color" name="btcpaywall_pay_per_post_previous_button_text_color" type="text" value="<?php echo esc_attr($result->previous_button_text_color); ?>" />
                        </div>
                    </div>
                </div>
                <div id="btcpaywall_pay_per_post_paywall_help_button">
                    <div data-id="link_1" class="btcpaywall_pay_per_container_header">
                        <h3><?php echo esc_html__('Help link', 'btcpaywall'); ?></h3>
                    </div>
                    <div class="btcpaywall_pay_per_container_body link_1-body">

                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_show_help_link">Display help link</label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_show_help_link" class="btcpaywall_pay_per_post_show_help_link" name="btcpaywall_pay_per_post_show_help_link" type="checkbox" <?php echo checked($result->link); ?> value="true" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_help_link">Help link url</label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_help_link" class="btcpaywall_pay_per_post_help_link" name="btcpaywall_pay_per_post_help_link" type="url" value="<?php echo esc_attr($result->help_link); ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_help_link_text">Help link text</label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_help_link_text" class="btcpaywall_pay_per_post_help_link_text" name="btcpaywall_pay_per_post_help_link_text" type="text" value="<?php echo esc_attr($result->help_text); ?>" />
                            </div>
                        </div>
                    </div>
                    <div data-id="link_2" class="btcpaywall_pay_per_container_header">

                        <h3><?php echo esc_html__('Additional link', 'btcpaywall'); ?></h3>
                    </div>
                    <div class="btcpaywall_pay_per_container_body link_2-body">

                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_show_additional_help_link">Display additional link</label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_show_additional_help_link" class="btcpaywall_pay_per_post_show_additional_help_link" name="btcpaywall_pay_per_post_show_additional_help_link" type="checkbox" <?php echo checked($result->additional_link); ?> value="true" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_additional_help_link">Additional link url</label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_additional_help_link" class="btcpaywall_pay_per_post_additional_help_link" name="btcpaywall_pay_per_post_additional_help_link" type="url" value="<?php echo esc_attr($result->additional_help_link); ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_additional_help_link_text">Additional link text</label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_additional_help_link_text" class="btcpaywall_pay_per_post_additional_help_link_text" name="btcpaywall_pay_per_post_additional_help_link_text" type="text" value="<?php echo esc_attr($result->additional_help_text); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div data-id="customer" class="btcpaywall_pay_per_container_header">
                    <h3><?php echo esc_html__('Customer information', 'btcpaywall'); ?> <span class="btcpaywall_helper_tip" title="Select which information about customers you want to collect by clicking on the checkboxes. Check the display if you want to make the field optional, or check both checkboxes if you want to make it mandatory."></span></h3>
                </div>
                <div class="btcpaywall_pay_per_container_body customer-body">

                    <div class="row">
                        <div class="col-50">
                            <p>Full name</p>
                        </div>
                        <div class="col-50">
                            <label for="btcpaywall_pay_per_post_display_name"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                            <input type="checkbox" class="btcpaywall_name" id="btcpaywall_pay_per_post_display_name" name="btcpaywall_pay_per_post_display_name" <?php checked($result->display_name); ?> value="true" />

                            <label for="btcpaywall_pay_per_post_mandatory_name"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                            <input type="checkbox" class="btcpaywall_name_mandatory" id="btcpaywall_pay_per_post_mandatory_name" name="btcpaywall_pay_per_post_mandatory_name" <?php checked($result->mandatory_name); ?> value="true" />

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-50">
                            <p>Email</p>
                        </div>
                        <div class="col-50">
                            <label for="btcpaywall_pay_per_post_display_email"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                            <input type="checkbox" id="btcpaywall_pay_per_post_display_email" class="btcpaywall_email" name="btcpaywall_pay_per_post_display_email" <?php checked($result->display_email); ?> value="true" />

                            <label for="btcpaywall_pay_per_post_mandatory_email"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                            <input type="checkbox" id="btcpaywall_pay_per_post_mandatory_email" class="btcpaywall_email_mandatory" name="btcpaywall_pay_per_post_mandatory_email" <?php checked($result->mandatory_email); ?> value="true" />

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-50">
                            <p>Address</p>
                        </div>
                        <div class="col-50">
                            <label for="btcpaywall_pay_per_post_display_address"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                            <input type="checkbox" id="btcpaywall_pay_per_post_display_address" class="btcpaywall_address" name="btcpaywall_pay_per_post_display_address" <?php checked($result->display_address); ?> value="true" />

                            <label for="btcpaywall_pay_per_post_mandatory_address"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                            <input type="checkbox" id="btcpaywall_pay_per_post_mandatory_address" class="btcpaywall_address_mandatory" name="btcpaywall_pay_per_post_mandatory_address" <?php checked($result->mandatory_address); ?> value="true" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-50">
                            <p>Phone number</p>
                        </div>
                        <div class="col-50">
                            <label for="btcpaywall_pay_per_post_display_phone"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                            <input type="checkbox" id="btcpaywall_pay_per_post_display_phone" class="btcpaywall_phone" name="btcpaywall_pay_per_post_display_phone" <?php checked($result->display_phone); ?> value="true" />

                            <label for="btcpaywall_pay_per_post_mandatory_phone"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                            <input type="checkbox" id="btcpaywall_pay_per_post_mandatory_phone" class="btcpaywall_phone_mandatory" name="btcpaywall_pay_per_post_mandatory_phone" <?php checked($result->mandatory_phone); ?> value="true" />

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-50">
                            <p>Message</p>
                        </div>
                        <div class="col-50">
                            <label for="btcpaywall_pay_per_post_display_message"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>
                            <input type="checkbox" id="btcpaywall_pay_per_post_display_message" class="btcpaywall_message" name="btcpaywall_pay_per_post_display_message" <?php checked($result->display_message); ?> value="true" />

                            <label for="btcpaywall_pay_per_post_mandatory_message"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                            <input type="checkbox" id="btcpaywall_pay_per_post_mandatory_message" class="btcpaywall_message_mandatory" name="btcpaywall_pay_per_post_mandatory_message" <?php checked($result->mandatory_message); ?> value="true" />

                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="btcpaywall_pay_per_post_id" value="<?php echo esc_attr($result->id); ?>" />
            <input type="hidden" id="btcpaywall_pay_per_post_type" value="pay-per-post" />

            <div class="btcpw__paywall_submit_button" style="display: inline-block;">
                <button class="button button-secondary btcpw_button" type="button"><a href="<?php echo admin_url($back_url); ?>"><?php echo esc_html__('Back', 'btcpaywall'); ?></a></button>

                <button class="button button-primary btcpw_button" type="submit">Save</button>
            </div>
        </form>
    </div>
    <div id="btcpw_pay_per_post_paywall_preview">
        <div class="btcpw_pay_preview pay_per_post">
            <div class="btcpw_pay__content_preview pay_per_post">
                <h2><?php echo esc_html($result->header_text); ?></h2>
            </div>
            <div class="btcpw_pay__content_preview pay_per_post">
                <p>
                    <?php echo esc_html($result->info_text); ?>
                </p>
            </div>
            <div>
                <button disabled type="button" id="btcpw_pay__button_preview"><?php echo esc_html($result->button_text); ?></button>
            </div>
            <div class="btcpw_pay__loading_preview pay_per_post">
                <p class="loading_preview"></p>
            </div>
            <div class="btcpw_links_preview">

                <div class="btcpw_help_preview pay_per_post">
                    <a class="btcpw_help__link_preview pay_per_post" href="<?php echo esc_attr($result->help_link); ?>" target="_blank"><?php echo esc_html($result->help_text); ?></a>
                </div>
                <div class="btcpw_additional_help_preview pay_per_post">
                    <a class="btcpw_help__additional_link_preview pay_per_post" href="<?php echo esc_attr($result->additional_help_link); ?>" target="_blank"><?php echo esc_html($result->additional_help_text); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>