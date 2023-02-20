<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
$id = isset($_GET['id']) ? sanitize_text_field($_GET['id']) : null;
$result = new BTCPayWall_Pay_Per_Shortcode($id);

$supported_currencies = BTCPayWall::CURRENCIES;
$supported_durations = BTCPayWall::DURATIONS;
$supported_btc_format = BTCPayWall::BTC_FORMAT;
/* $used_format = get_option("btcpaywall_pay_per_post_btc_format"); */
$disabled_field = ($result->duration_type === 'unlimited') || ($result->duration_type === 'onetime');
$disable = $disabled_field ? 'disabled' : '';
$back_url = (isset($_GET['action']) && (sanitize_text_field($_GET['action']) == 'edit')) ? 'admin.php?page=btcpw_pay_per_shortcode_list' : 'admin.php?page=btcpw_pay_per_shortcode_generator';
$preview_duration = ($result->duration_type == 'unlimited' || $result->duration_type == 'onetime' || $result->duration == 0) ? '' : $result->duration;
$search = array('{price}', '{duration}', '{dtype}', '{currency}');
$replace = array(btcpaywall_round_amount($result->currency, $result->price), $preview_duration, $result->duration_type, $result->currency);
$info_text = str_replace($search, $replace, $result->info_text);
?>
<style>
    .btcpw_help_preview.pay_per_post {
        display: <?php echo $result->link == true ? 'block' : 'none'; ?>;
    }

    .btcpw_additional_help_preview.pay_per_post {
        display: <?php echo $result->additional_link == true ? 'block' : 'none'; ?>;
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
        color: <?php echo esc_html($result->button_text_color); ?>;
    }

    #btcpw_pay__button_preview:hover {
        background-color: <?php echo esc_html($result->button_color_hover); ?>;
    }
</style>
<div id="btcpaywall_pay_per_post_shortcode_generator">
    <div>
        <form method="POST" action="options.php" id="pay-per-post-shortcode-generator-form">

            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_post_type"><?php echo esc_html__('Type', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input type="text" readonly id="btcpaywall_pay_per_post_type" value="pay-per-post" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_post_shortcode_name"><?php echo esc_html__('Name', 'btcpaywall'); ?></label>
                    <span class="btcpaywall_helper_tip" title="This field is used to differentiate generated shortcodes."></span>
                </div>
                <div class="col-80">
                    <input type="text" name="btcpaywall_pay_per_post_shortcode_name" required id="btcpaywall_pay_per_post_shortcode_name" value="<?php echo esc_attr($result->name); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="btcpaywall_pay_per_post_paywall"><?php echo esc_html__('Enable paywall', 'btcpaywall'); ?></label>
                    <span class="btcpaywall_helper_tip" title="Do you want to enable the paywall?"></span>
                </div>
                <div class="col-50">
                    <input type="checkbox" id="btcpaywall_pay_per_post_paywall" name="btcpaywall_pay_per_post_paywall" <?php checked($result->pay_block); ?> value="true" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_post_price"><?php echo esc_html__('Price', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">

                    <input required type="number" min=0 placeholder="Price" step="any" name="btcpaywall_pay_per_post_price" id="btcpaywall_pay_per_post_price" value="<?php echo esc_attr(btcpaywall_round_amount($result->currency, $result->price)); ?>">

                    <select required name="btcpaywall_pay_per_post_currency" id="btcpaywall_pay_per_post_currency">
                        <option disabled value=""><?php echo esc_html__('Select currency', 'btcpaywall'); ?></option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $result->currency === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                <?php echo esc_html($currency); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpaywall_pay_per_post_duration"><?php echo esc_html__('Duration', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input type="number" min="1" placeholder="Access Duration" name="btcpaywall_pay_per_post_duration" id="btcpaywall_pay_per_post_duration" <?php echo esc_attr($disable); ?> value="<?php echo esc_attr($result->duration); ?>">
                    <select required name="btcpaywall_pay_per_post_duration_type" id="btcpaywall_pay_per_post_duration_type">
                        <option disabled value=""><?php echo esc_html__('Select duration type', 'btcpaywall'); ?></option>
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
                        <label for="btcpaywall_pay_per_post_background"><?php echo esc_html__('Background color', 'btcpaywall'); ?></label>
                    </div>
                    <div class="col-80">
                        <input required id="btcpaywall_pay_per_post_background" class="btcpaywall_pay_per_post_background" name="btcpaywall_pay_per_post_background" type="text" value=<?php echo esc_attr($result->background_color); ?> />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_post_width"><?php echo esc_html__('Width', 'btcpaywall'); ?></label>
                    </div>
                    <div class="col-80">
                        <input required id="btcpaywall_pay_per_post_width" class="btcpaywall_pay_per_post_width" name="btcpaywall_pay_per_post_width" type="number" min="200" value=<?php echo esc_attr($result->width); ?> required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpaywall_pay_per_post_height"><?php echo esc_html__('Height', 'btcpaywall'); ?></label>
                    </div>
                    <div class="col-80">
                        <input required id="btcpaywall_pay_per_post_height" class="btcpaywall_pay_per_post_height" name="btcpaywall_pay_per_post_height" type="number" min="200" value=<?php echo esc_attr($result->height); ?> required />
                    </div>
                </div>
                <div data-id="header" class="btcpaywall_pay_per_container_header">
                    <h3><?php echo esc_html__('Main', 'btcpaywall'); ?></h3>
                </div>
                <div class="btcpaywall_pay_per_container_body header-body">

                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_title"><?php echo esc_html__('Title', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <textarea required id="btcpaywall_pay_per_post_title" name="btcpaywall_pay_per_post_title"><?php echo esc_html($result->header_text); ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_title_color"><?php echo esc_html__('Title color', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_title_color" class="btcpaywall_pay_per_post_title_color" name="btcpaywall_pay_per_post_title_color" type="text" value="<?php echo esc_attr($result->header_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_info"><?php echo esc_html__('Price information', 'btcpaywall'); ?> <span class="btcpaywall_helper_tip" title="Placeholders will be replaced with actual values in the paywall."></span></label>
                        </div>
                        <div class="col-80">
                            <textarea id="btcpaywall_pay_per_post_info" required name="btcpaywall_pay_per_post_info"><?php echo esc_html($result->info_text); ?></textarea>
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
                            <label for="btcpaywall_pay_per_post_info_color"><?php echo esc_html__('Price information color', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_info_color" class="btcpaywall_pay_per_post_info_color" name="btcpaywall_pay_per_post_info_color" type="text" value="<?php echo esc_attr($result->info_color); ?>" />
                        </div>
                    </div>
                </div>
                <div data-id="button" class="btcpaywall_pay_per_container_header">
                    <h3><?php echo esc_html__('Buttons', 'btcpaywall'); ?></h3>
                </div>
                <div class="btcpaywall_pay_per_container_body button-body">

                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_button"><?php echo esc_html__('Button text', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_button" name="btcpaywall_pay_per_post_button" required value="<?php echo esc_attr($result->button_text); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_button_color"><?php echo esc_html__('Button color', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_button_color" class="btcpaywall_pay_per_post_button_color" name="btcpaywall_pay_per_post_button_color" type="text" value="<?php echo esc_attr($result->button_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_button_text_color"><?php echo esc_html__('Button text color', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_button_text_color" class="btcpaywall_pay_per_post_button_text_color" name="btcpaywall_pay_per_post_button_text_color" type="text" value="<?php echo esc_attr($result->button_text_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_button_color_hover"><?php echo esc_html__('Button color on hover', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_button_color_hover" class="btcpaywall_pay_per_post_button_color_hover" name="btcpaywall_pay_per_post_button_color_hover" type="text" value="<?php echo esc_attr($result->button_color_hover); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_continue_button"><?php echo esc_html__('Continue button text', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_continue_button" name="btcpaywall_pay_per_post_continue_button" required value="<?php echo esc_attr($result->continue_button_text); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_continue_button_color"><?php echo esc_html__('Continue button color', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_continue_button_color" class="btcpaywall_pay_per_post_continue_button_color" name="btcpaywall_pay_per_post_continue_button_color" type="text" value="<?php echo esc_attr($result->continue_button_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_continue_button_text_color"><?php echo esc_html__('Continue button text color', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_continue_button_text_color" class="btcpaywall_pay_per_post_continue_button_text_color" name="btcpaywall_pay_per_post_continue_button_text_color" type="text" value="<?php echo esc_attr($result->continue_button_text_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_continue_button_color_hover"><?php echo esc_html__('Continue button color on hover', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_continue_button_color_hover" class="btcpaywall_pay_per_post_continue_button_color_hover" name="btcpaywall_pay_per_post_continue_button_color_hover" type="text" value="<?php echo esc_attr($result->continue_button_color_hover); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_previous_button"><?php echo esc_html__('Previous button text', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_previous_button" name="btcpaywall_pay_per_post_previous_button" required value="<?php echo esc_attr($result->previous_button_text); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_previous_button_color"><?php echo esc_html__('Previous button color', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_previous_button_color" class="btcpaywall_pay_per_post_previous_button_color" name="btcpaywall_pay_per_post_previous_button_color" type="text" value="<?php echo esc_attr($result->previous_button_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_previous_button_text_color"><?php echo esc_html__('Previous button text color', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_previous_button_text_color" class="btcpaywall_pay_per_post_previous_button_text_color" name="btcpaywall_pay_per_post_previous_button_text_color" type="text" value="<?php echo esc_attr($result->previous_button_text_color); ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="btcpaywall_pay_per_post_previous_button_color_hover"><?php echo esc_html__('Previous button color on hover', 'btcpaywall'); ?></label>
                        </div>
                        <div class="col-80">
                            <input id="btcpaywall_pay_per_post_previous_button_color_hover" class="btcpaywall_pay_per_post_previous_button_color_hover" name="btcpaywall_pay_per_post_previous_button_color_hover" type="text" value="<?php echo esc_attr($result->previous_button_color_hover); ?>" />
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
                                <label for="btcpaywall_pay_per_post_show_help_link"><?php echo esc_html__('Display help link', 'btcpaywall'); ?></label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_show_help_link" class="btcpaywall_pay_per_post_show_help_link" name="btcpaywall_pay_per_post_show_help_link" type="checkbox" <?php echo checked($result->link); ?> value="true" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_help_link"><?php echo esc_html__('Help link url', 'btcpaywall'); ?></label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_help_link" class="btcpaywall_pay_per_post_help_link" name="btcpaywall_pay_per_post_help_link" type="url" value="<?php echo esc_attr($result->help_link); ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_help_link_text"><?php echo esc_html__('Help link text', 'btcpaywall'); ?></label>
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
                                <label for="btcpaywall_pay_per_post_show_additional_help_link"><?php echo esc_html__('Display additional link', 'btcpaywall'); ?></label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_show_additional_help_link" class="btcpaywall_pay_per_post_show_additional_help_link" name="btcpaywall_pay_per_post_show_additional_help_link" type="checkbox" <?php echo checked($result->additional_link); ?> value="true" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_additional_help_link"><?php echo esc_html__('Additional link url', 'btcpaywall'); ?></label>
                            </div>
                            <div class="col-80">
                                <input id="btcpaywall_pay_per_post_additional_help_link" class="btcpaywall_pay_per_post_additional_help_link" name="btcpaywall_pay_per_post_additional_help_link" type="url" value="<?php echo esc_attr($result->additional_help_link); ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-20">
                                <label for="btcpaywall_pay_per_post_additional_help_link_text"><?php echo esc_html__('Additional link text', 'btcpaywall'); ?></label>
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
                            <p><?php echo esc_html__('Full name', 'btcpaywall'); ?></p>
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
                            <p><?php echo esc_html__('Email', 'btcpaywall'); ?></p>
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
                            <p><?php echo esc_html__('Address', 'btcpaywall'); ?></p>
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
                            <p><?php echo esc_html__('Phone number', 'btcpaywall'); ?></p>
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
                            <p><?php echo esc_html__('Message', 'btcpaywall'); ?></p>
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
            <div class="btcpw__paywall_submit_button" style="display: inline-block;">
                <button class="button button-secondary btcpw_button" type="button"><a href="<?php echo admin_url($back_url); ?>"><?php echo esc_html__('Back', 'btcpaywall'); ?></a></button>

                <button class="button button-primary btcpw_button" type="submit"><?php echo esc_html__('Save', 'btcpaywall'); ?></button>
            </div>
            <?php if ($result->id > 0) : ?>
                <div class="row" id="btcpaywall_pay_per_shortcode">

                    <p><?php echo esc_html__('Copy this shortcode and paste it to the place where you want the paywall to start', 'btcpaywall'); ?></p>

                    <button type="button" class="button hint-tooltip hint--top js-btcpaywall-shortcode-button" data-btcpaywall-shortcode="<?php echo esc_attr($result->shortcode()); ?>"><span class="dashicons dashicons-admin-page"></span>Copy Shortcode</button>

                </div>
            <?php endif; ?>

        </form>
    </div>
    <div id="btcpw_pay_per_post_paywall_preview">
        <div class="btcpw_pay_preview pay_per_post">
            <div class="btcpw_pay__content_preview pay_per_post">
                <h2><?php echo esc_html($result->header_text); ?></h2>
            </div>
            <div class="btcpw_pay__content_preview pay_per_post">
                <p>
                    <?php echo esc_html($info_text); ?>
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
