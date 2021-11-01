<?php
$help = filter_var(get_option('btcpw_pay_per_post_show_help_link'), FILTER_VALIDATE_BOOLEAN);
$help_link = get_option('btcpw_pay_per_post_help_link');
$help_text = get_option('btcpw_pay_per_post_help_link_text');
$additional_help = filter_var(get_option('btcpw_pay_per_post_show_additional_help_link'), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = get_option('btcpw_pay_per_post_additional_help_link');
$additional_help_text = get_option('btcpw_pay_per_post_additional_help_link_text');
$background = get_option('btcpw_pay_per_post_background');
$width = get_option('btcpw_pay_per_post_width');
$height = get_option('btcpw_pay_per_post_height');

$header_color = get_option('btcpw_pay_per_post_header_color');
$info_color = get_option('btcpw_pay_per_post_info_color');
$button_color = get_option('btcpw_pay_per_post_button_color');
$button_text_color = get_option('btcpw_pay_per_post_button_text_color');
$default_text = get_option('btcpw_pay_per_post_title');
$default_button = get_option('btcpw_pay_per_post_button');
$default_info = get_option('btcpw_pay_per_post_info');



?>
<style>
    .btcpw_help_preview.pay_per_post {
        display: <?php echo $help === true ? 'block' : 'none'; ?>;
    }

    .btcpw_additional_help_preview.pay_per_post {
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
<div id="btcpw_pay_per_post_paywall">
    <div>
        <form method="POST" action="options.php">
            <?php settings_fields('btcpw_pay_per_post_paywall_options'); ?>
            <h3>Background</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_background">Background color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_post_background" class="btcpw_pay_per_post_background" name="btcpw_pay_per_post_background" type="text" value=<?php echo $background; ?> />
                </div>
            </div>
            <h3>Dimension</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_width">Width</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_post_width" class="btcpw_pay_per_post_width" name="btcpw_pay_per_post_width" type="number" min="200" value=<?php echo $width; ?> required />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_height">Height</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_post_height" class="btcpw_pay_per_post_height" name="btcpw_pay_per_post_height" type="number" min="200" value=<?php echo $height; ?> required />
                </div>
            </div>
            <h3>Header</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_title">Title</label>
                </div>
                <div class="col-80">
                    <textarea id="btcpw_pay_per_post_title" name="btcpw_pay_per_post_title"><?php echo $default_text; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_header_color">Title color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_post_header_color" class="btcpw_pay_per_post_header_color" name="btcpw_pay_per_post_header_color" type="text" value="<?php echo $header_color; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_info">Price information</label>
                </div>
                <div class="col-80">
                    <textarea id="btcpw_pay_per_post_info" name="btcpw_pay_per_post_info"><?php echo $default_info; ?></textarea>
                    <div class="btcpw_pay_per_placeholders">
                        <button type="button" class="btcpw_pay_per_post_price_placeholder" value="[price]">Price</button>
                        <button type="button" class="btcpw_pay_per_post_currency_placeholder" value="[currency]">Currency</button>
                        <button type="button" class="btcpw_pay_per_post_duration_placeholder" value="[duration]">Duration</button>
                        <button type="button" class="btcpw_pay_per_post_duration_type_placeholder" value="[dtype]">Duration type</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_info_color">Price information color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_post_info_color" class="btcpw_pay_per_post_info_color" name="btcpw_pay_per_post_info_color" type="text" value="<?php echo $info_color; ?>" />
                </div>
            </div>
            <h3>Button</h3>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_button">Button text</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_post_button" name="btcpw_pay_per_post_button" value="<?php echo $default_button; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_button_color">Button color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_post_button_color" class="btcpw_pay_per_post_button_color" name="btcpw_pay_per_post_button_color" type="text" value="<?php echo $button_color; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="btcpw_pay_per_post_button_text_color">Button text color</label>
                </div>
                <div class="col-80">
                    <input id="btcpw_pay_per_post_button_text_color" class="btcpw_pay_per_post_button_text_color" name="btcpw_pay_per_post_button_text_color" type="text" value="<?php echo $button_text_color; ?>" />
                </div>
            </div>

            <div id="btcpw_pay_per_post_paywall_help_button">
                <h3>Help link</h3>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_post_show_help_link">Display help link</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_post_show_help_link" class="btcpw_pay_per_post_show_help_link" name="btcpw_pay_per_post_show_help_link" type="checkbox" <?php echo checked($help); ?> value="<?php echo $help; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_post_help_link">Help link url</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_post_help_link" class="btcpw_pay_per_post_help_link" name="btcpw_pay_per_post_help_link" type="url" value="<?php echo $help_link; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_post_help_link_text">Help link text</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_post_help_link_text" class="btcpw_pay_per_post_help_link_text" name="btcpw_pay_per_post_help_link_text" type="text" value="<?php echo $help_text; ?>" />
                    </div>
                </div>
                <h3>Additional link</h3>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_post_show_additional_help_link">Display additional link</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_post_show_additional_help_link" class="btcpw_pay_per_post_show_additional_help_link" name="btcpw_pay_per_post_show_additional_help_link" type="checkbox" <?php echo checked($additional_help); ?> value="<?php echo $additional_help; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_post_additional_help_link">Additional link url</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_post_additional_help_link" class="btcpw_pay_per_post_additional_help_link" name="btcpw_pay_per_post_additional_help_link" type="url" value="<?php echo $additional_help_link; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="btcpw_pay_per_post_additional_help_link_text">Additional link text</label>
                    </div>
                    <div class="col-80">
                        <input id="btcpw_pay_per_post_additional_help_link_text" class="btcpw_pay_per_post_additional_help_link_text" name="btcpw_pay_per_post_additional_help_link_text" type="text" value="<?php echo $additional_help_text; ?>" />
                    </div>
                </div>
            </div>
            <div class="btcpw__paywall_submit_button" style="display: inline-block;">
                <button class="button button-primary btcpw_button" type="submit">Save</button>
            </div>
        </form>
    </div>
    <div id="btcpw_pay_per_post_paywall_preview">
        <div class="btcpw_pay_preview pay_per_post">
            <div class="btcpw_pay__content_preview pay_per_post">
                <h2><?php echo $default_text; ?></h2>
            </div>
            <div class="btcpw_pay__content_preview pay_per_post">
                <p>
                    <?php echo $default_info; ?>
                </p>
            </div>
            <div class="btcpw_pay__footer_preview pay_per_post">
                <div>
                    <button disabled type="button" id="btcpw_pay__button_preview" data-post_id="<?php echo get_the_ID(); ?>"><?php echo $default_button; ?></button>
                </div>
                <div class="btcpw_pay__loading_preview pay_per_post">
                    <p class="loading_preview"></p>
                </div>
                <div class="btcpw_help_preview pay_per_post">
                    <a class="btcpw_help__link_preview pay_per_post" href="<?php echo esc_attr($help_link); ?>" target="_blank"><?php echo esc_html($help_text); ?></a>
                </div>
                <div class="btcpw_additional_help_preview pay_per_post">
                    <a class="btcpw_help__additional_link_preview pay_per_post" href="<?php echo esc_attr($additional_help_link); ?>" target="_blank"><?php echo esc_html($additional_help_text); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>