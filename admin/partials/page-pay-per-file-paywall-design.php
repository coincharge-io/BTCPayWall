<?php
$help = filter_var(get_option('btcpw_pay_per_file_show_help_link'), FILTER_VALIDATE_BOOLEAN);
$help_link = get_option('btcpw_pay_per_file_help_link');
$help_text = get_option('btcpw_pay_per_file_help_link_text');

$additional_help = filter_var(get_option('btcpw_pay_per_file_show_additional_help_link'), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = get_option('btcpw_pay_per_file_additional_help_link');
$additional_help_text = get_option('btcpw_pay_per_file_additional_help_link_text');
$width = get_option('btcpw_pay_per_file_width');
$height = get_option('btcpw_pay_per_file_height');
$background = get_option('btcpw_pay_per_file_background');
$header_color = get_option('btcpw_pay_per_file_header_color');
$info_color = get_option('btcpw_pay_per_file_info_color');
$button_color = get_option('btcpw_pay_per_file_button_color');
$button_text_color = get_option('btcpw_pay_per_file_button_text_color');
$preview_title_color = get_option('btcpw_pay_per_file_preview_title_color');
$preview_description_color = get_option('btcpw_pay_per_file_preview_description_color');
$default_text = get_option('btcpw_pay_per_file_title');
$default_button = get_option('btcpw_pay_per_file_button');
$default_info = get_option('btcpw_pay_per_file_info');
$used_currency = get_option('btcpw_pay_per_view_currency');
$supported_currencies = BTCPayWall_Admin::CURRENCIES;
$default_price = get_option('btcpw_pay_per_view_price');
$default_duration = get_option('btcpw_pay_per_view_duration');
$default_duration_type = get_option('btcpw_pay_per_view_duration_type');
$supported_durations = BTCPayWall_Admin::DURATIONS;
$supported_btc_format = BTCPayWall_Admin::BTC_FORMAT;
$used_format = get_option("btcpw_pay_per_view_btc_format");
$disabled_field = ($default_duration_type === 'unlimited') || ($default_duration_type === 'onetime');
$disable = $disabled_field ? 'disabled' : '';
?>
<style>
    .btcpw_pay__preview_preview.pay_per_file h2 {
        color: <?php echo esc_html($preview_title_color); ?>;

    }

    .btcpw_pay__preview_preview.pay_per_file p {
        color: <?php echo esc_html($preview_description_color); ?>;

    }

    .btcpw_help_preview.pay_per_file {
        display: <?php echo $help === true ? 'block' : 'none'; ?>;
    }

    .btcpw_additional_help_preview.pay_per_file {
        display: <?php echo $additional_help === true ? 'block' : 'none'; ?>;
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
<div id="btcpw_pay_per_file_paywall">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_pay_per_file_paywall_options'); ?>
            <h3>Background</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_background">Background color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_background" class="btcpw_pay_per_file_background" name="btcpw_pay_per_file_background" type="text" value=<?php echo $background; ?> />
                </div>
            </div>
            <h3>Dimension</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_width">Width</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_width" class="btcpw_pay_per_file_width" name="btcpw_pay_per_file_width" type="number" min="200" value=<?php echo $width; ?> required />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_height">Height</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_height" class="btcpw_pay_per_file_height" name="btcpw_pay_per_file_height" type="number" min="200" value=<?php echo $height; ?> required />
                </div>
            </div>
            <h2>Price & Duration</h2>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_price">Default price</label>
                </div>
                <div class="col-80">

                    <input required type="number" min=0 placeholder="Default Price" step=1 name="btcpw_pay_per_file_price" id="btcpw_pay_per_file_price" value="<?php echo $default_price ?>">

                    <select required name="btcpw_pay_per_file_currency" id="btcpw_pay_per_file_currency">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $used_currency === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                <?php echo $currency; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="btcpw_price_format">
                        <p>Select Bitcoin price display:</p>
                        <?php foreach ($supported_btc_format as $format) : ?>
                            <div>
                                <input type="radio" id="btcpw_pay_per_file_btc_format" name="btcpw_pay_per_file_btc_format" value="<?php echo $format ?>" <?php echo $used_format === $format ? 'checked' : '' ?>>
                                <label for="btcpw_pay_per_file_btc_format"><?php echo $format ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_duration">Default duration</label>
                </div>
                <div class="col-80">
                    <input type="number" min="1" placeholder="Default Access Duration" name="btcpw_pay_per_file_duration" id="btcpw_pay_per_file_duration" <?php echo $disable; ?> value="<?php echo $default_duration ?>">
                    <select required name="btcpw_pay_per_file_duration_type" id="btcpw_pay_per_file_duration_type">
                        <option disabled value="">Select duration type</option>
                        <?php foreach ($supported_durations as $duration) : ?>
                            <option <?php echo $default_duration_type === $duration ? 'selected' : ''; ?> value="<?php echo $duration; ?>">
                                <?php echo $duration; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <h3>Preview</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_preview_title_color">Title color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_preview_title_color" class="btcpw_pay_per_file_preview_title_color" name="btcpw_pay_per_file_preview_title_color" type="text" value="<?php echo $preview_title_color; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_preview_description_color">Description color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_preview_description_color" class="btcpw_pay_per_file_preview_description_color" name="btcpw_pay_per_file_preview_description_color" type="text" value="<?php echo $preview_description_color; ?>" />
                </div>
            </div>
            <h3>Description</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_title">Title</label>
                </div>
                <div class="col-80">
                    <textarea id="btcpw_pay_per_file_title" name="btcpw_pay_per_file_title"><?php echo $default_text; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_header_color">Title color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_header_color" class="btcpw_pay_per_file_header_color" name="btcpw_pay_per_file_header_color" type="text" value="<?php echo $header_color; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_info">Price information</label>
                </div>
                <div class="col-80">
                    <textarea id="btcpw_pay_per_file_info" name="btcpw_pay_per_file_info"><?php echo $default_info; ?></textarea>
                    <div class="btcpw_pay_per_placeholders">
                        <button type="button" class="btcpw_pay_per_file_price_placeholder" value="[price]">Price</button>
                        <button type="button" class="btcpw_pay_per_file_currency_placeholder" value="[currency]">Currency</button>
                        <button type="button" class="btcpw_pay_per_file_duration_placeholder" value="[duration]">Duration</button>
                        <button type="button" class="btcpw_pay_per_file_duration_type_placeholder" value="[dtype]">Duration type</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_info_color">Price information color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_info_color" class="btcpw_pay_per_file_info_color" name="btcpw_pay_per_file_info_color" type="text" value="<?php echo $info_color; ?>" />
                </div>
            </div>
            <h3>Button</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button">Button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button" name="btcpw_pay_per_file_button" value="<?php echo $default_button; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button_color">Button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button_color" class="btcpw_pay_per_file_button_color" name="btcpw_pay_per_file_button_color" type="text" value="<?php echo $button_color; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_file_button_text_color">Button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_file_button_text_color" class="btcpw_pay_per_file_button_text_color" name="btcpw_pay_per_file_button_text_color" type="text" value="<?php echo $button_text_color; ?>" />
                </div>
            </div>

            <div id="btcpw_pay_per_file_paywall_help_button">
                <h3>Help link</h3>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_file_show_help_link">Display help link</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_file_show_help_link" class="btcpw_pay_per_file_show_help_link" name="btcpw_pay_per_file_show_help_link" type="checkbox" <?php echo checked($help); ?> value="<?php echo $help; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_file_help_link">Help link url</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_file_help_link" class="btcpw_pay_per_file_help_link" name="btcpw_pay_per_file_help_link" type="url" value="<?php echo $help_link; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_file_help_link_text">Help link text</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_file_help_link_text" class="btcpw_pay_per_file_help_link_text" name="btcpw_pay_per_file_help_link_text" type="text" value="<?php echo $help_text; ?>" />
                    </div>
                </div>
                <h3>Additional link</h3>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_file_show_additional_help_link">Display additional link</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_file_show_additional_help_link" class="btcpw_pay_per_file_show_additional_help_link" name="btcpw_pay_per_file_show_additional_help_link" type="checkbox" <?php echo checked($additional_help); ?> value="<?php echo $additional_help; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_file_additional_help_link">Additional link url</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_file_additional_help_link" class="btcpw_pay_per_file_additional_help_link" name="btcpw_pay_per_file_additional_help_link" type="url" value="<?php echo $additional_help_link; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_file_additional_help_link_text">Additional link text</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_file_additional_help_link_text" class="btcpw_pay_per_file_additional_help_link_text" name="btcpw_pay_per_file_additional_help_link_text" type="text" value="<?php echo $additional_help_text; ?>" />
                    </div>
                </div>
            </div>
            <div class="btcpw__paywall_submit_button" style="display: inline-block;">
                <button class="button button-primary btcpw_button" type="submit">Save</button>
            </div>
        </form>
    </div>
    <div id="btcpw_pay_per_file_paywall_preview">
        <div class="btcpw_pay_preview pay_per_file">
            <div class="btcpw_pay__content_preview pay_per_file">
                <h2> <?php echo $default_text; ?>
                </h2>
            </div>
            <div class="btcpw_pay__preview_preview pay_per_file">
                <div class="btcpw_pay__preview_preview preview_img">
                    <img src="<?php echo BTCPAYWALL_BASE_URL . 'public/img/file_preview.png'; ?>" alt="Video preview">
                </div>
                <div class="btcpw_pay__preview_preview preview_description">
                    <h3>Untitled</h3>
                    <p>No description</p>
                </div>
            </div>
            <div class="btcpw_pay__content_preview pay_per_file">
                <p>
                    <?php echo $default_info; ?>
                </p>
            </div>
            <div class="btcpw_pay__footer_preview pay_per_file">
                <div>
                    <button disabled type="button" id="btcpw_pay__button_preview_pay_per_file" data-post_id="<?php echo get_the_ID(); ?>"> <?php echo $default_button; ?>
                    </button>
                </div>
                <div class="btcpw_pay__loading">
                    <p class="loading"></p>
                </div>
                <div class="btcpw_help_preview pay_per_file">
                    <a class="btcpw_help__link_preview pay_per_file" href="<?php echo esc_attr($help_link); ?>" target="_blank"><?php echo esc_html($help_text); ?></a>
                </div>
                <div class="btcpw_additional_help_preview pay_per_file">
                    <a class="btcpw_additional_help__link_preview pay_per_file" href="<?php echo esc_attr($additional_help_link); ?>" target="_blank"><?php echo esc_html($additional_help_text); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>