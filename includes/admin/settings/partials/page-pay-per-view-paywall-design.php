<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
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
<div id="btcpw_pay_per_view_paywall">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_pay_per_view_paywall_options'); ?>
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
            <h3>Description</h3>
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
                    <label for="btcpw_pay_per_view_info">Price information</label>
                </div>
                <div class="col-80">
                    <textarea id="btcpw_pay_per_view_info" name="btcpw_pay_per_view_info"><?php echo esc_html($default_info); ?></textarea>
                    <div class="btcpw_pay_per_placeholders">
                        <button type="button" class="btcpw_pay_per_view_price_placeholder" value="[price]">Price</button>
                        <button type="button" class="btcpw_pay_per_view_currency_placeholder" value="[currency]">Currency</button>
                        <button type="button" class="btcpw_pay_per_view_duration_placeholder" value="[duration]">Duration</button>
                        <button type="button" class="btcpw_pay_per_view_duration_type_placeholder" value="[dtype]">Duration type</button>
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
                        <input id="btcpw_pay_per_view_additional_help_link_text" class="btcpw_pay_per_view_additional_help_link_text" name="btcpw_pay_per_view_additional_help_link_text" type="text" value="<?php echo esc_attr($additional_help_text); ?>" />
                    </div>
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
                    <img src="<?php echo BTCPAYWALL_PLUGIN_URL . 'public/img/preview.png'; ?>" alt="Video preview">
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
                    <button disabled type="button" id="btcpw_pay__button_preview_pay_per_view"><?php echo esc_html($default_button); ?></button>
                </div>
                <div class="btcpw_pay__loading">
                    <p class="loading"></p>
                </div>
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