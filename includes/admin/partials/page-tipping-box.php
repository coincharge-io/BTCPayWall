<?php
global $wpdb;
$id = $_GET['id'] ?? null;
$table_name = "{$wpdb->prefix}btc_forms";
$result = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id),
    ARRAY_A
);
$supported_currencies = BTCPayWall_Admin::TIPPING_CURRENCIES;
$dimensions = ['250x300', '300x300'];
$used_currency = $result[0]['currency'] ?? 'SATS';
$used_dimension = $result[0]['dimension'] ?? '250x300';
$redirect = $result[0]['redirect'] ?? '';
$text = array(
    'title' => $result[0]['title_text'] ?? 'Support my work',
    'description' => $result[0]['description_text'] ?? '',
    'info' => $result[0]['tipping_text'] ?? 'Enter Tipping Amount',
    'button' => $result[0]['button_text'] ?? 'Tipping now',
);
$form_name = $result[0]['form_name'] ?? $text['title'];
$color = array(
    'button_text' => !empty($result[0]['button_text_color']) ? '#' . $result[0]['button_text_color'] : '#FFFFFF',
    'background' => !empty($result[0]['background_color']) ? '#' . $result[0]['background_color'] : '#E6E6E6',
    'hf_background' => !empty($result[0]['hf_background']) ? '#' . $result[0]['hf_background'] : '#1d5aa3',
    'button' => !empty($result[0]['button_color']) ? '#' . $result[0]['button_color'] : '#FE642E',
    'title' => !empty($result[0]['title_text_color']) ? '#' . $result[0]['title_text_color'] : '#ffffff',
    'description' => !empty($result[0]['description_text_color']) ? '#' . $result[0]['description_text_color'] : '#000000',
    'tipping' => !empty($result[0]['tipping_text_color']) ? '#' . $result[0]['tipping_text_color'] : '#000000',
    'input_background' => !empty($result[0]['input_background']) ? '#' . $result[0]['input_background'] : '#ffa500',
);
$image = array(
    'logo' => $result[0]['logo'] ?? '',
    'background' => $result[0]['background'] ?? ''
);
$logo = wp_get_attachment_image_src($image['logo']);
$background = wp_get_attachment_image_src($image['background']);
$shortcode = !empty($result[0]) ? BTCPayWall_Admin::outputShortcodeAttributes($result[0]['name'], $result[0]['id']) : '';
$id = $result[0]['id'] ?? null;
?>

<div class="tipping_box_settings">
    <?php include(__DIR__ . '/notices/form-notice.php'); ?>
    <form method="POST" action="" id="tipping_box_add_form">
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_form_name">Template name</label>
            </div>
            <div class="col-50" id="btcpw_tipping_page_shortcode">
                <input id="btcpw_tipping_box_form_name" class="btcpw_tipping_box_form_name" name="btcpw_tipping_box_form_name" type="text" value="<?php echo $form_name; ?>" />
            </div>
        </div>
        <?php if ($shortcode) : ?>
            <div class="row">
                <div class="col-50">
                    <p>Shortcode</label>
                </div>
                <div class="col-50" id="btcpw_tipping_box_shortcode">
                    <p><?php echo $shortcode; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_dimension">Dimension</label>
            </div>
            <div class="col-50">
                <select required name="btcpw_tipping_box_dimension" id="btcpw_tipping_box_dimension">
                    <option disabled value="">Select dimension</option>
                    <?php foreach ($dimensions as $dimension) : ?>
                        <option <?php echo $used_dimension === $dimension ? 'selected' : ''; ?> value="<?php echo $dimension; ?>">
                            <?php echo $dimension; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_image_background">Background image</label>
            </div>
            <div class="col-50">
                <?php if ($background) : ?>
                    <button id="btcpw_tipping_box_button_image_background" class="btcpw_tipping_box_button_image_background" name="btcpw_tipping_box_button_image_background"><img src="<?php echo $background[0]; ?>" height=100px width=100px /></a></button>
                    <button class="btcpw_tipping_box_button_remove_background">Remove image</button>
                    <input type="hidden" id="btcpw_tipping_box_image_background" class="btcpw_tipping_box_image_background" name="btcpw_tipping_box_image[background]" value=<?php echo $image['background']; ?> />
                <?php else : ?>
                    <button id="btcpw_tipping_box_button_image_background" class="btcpw_tipping_box_button_image_background" name="btcpw_tipping_box_button_image_background">Upload </button>
                    <button class="btcpw_tipping_box_button_remove_background" style="display:none">Remove image</button>
                    <input type="hidden" id="btcpw_tipping_box_image_background" class="btcpw_tipping_box_image_background" name="btcpw_tipping_box_image[background]" value=<?php echo $image['background']; ?> />
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_background">Background color</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_box_background" class="btcpw_tipping_box_background" name="btcpw_tipping_box_color[background]" type="text" value=<?php echo $color['background']; ?> />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_hf_background">Background color for header and footer</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_box_hf_background" class="btcpw_tipping_box_hf_background" name="btcpw_tipping_box_color[hf_background]" type="text" value=<?php echo $color['hf_background']; ?> />
            </div>
        </div>
        <h3>Description</h3>

        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_image">Tipping Logo</label>
            </div>
            <div class="col-50">
                <?php if ($logo) : ?>
                    <button id="btcpw_tipping_box_button_image" class="btcpw_tipping_box_button_image" name="btcpw_tipping_box_button_image"><img src="<?php echo $logo[0]; ?>" height=100px width=100px /></a></button>
                    <button class="btcpw_tipping_box_button_remove">Remove image</button>
                    <input type="hidden" id="btcpw_tipping_box_image" class="btcpw_tipping_box_image" name="btcpw_tipping_box_image[logo]" value=<?php echo $image['logo']; ?> />
                <?php else : ?>
                    <button id="btcpw_tipping_box_button_image" class="btcpw_tipping_box_button_image" name="btcpw_tipping_box_button_image">Upload</button>
                    <button class="btcpw_tipping_box_button_remove" style="display:none">Remove image</button>
                    <input type="hidden" id="btcpw_tipping_box_image" class="btcpw_tipping_box_image" name="btcpw_tipping_box_image[logo]" value=<?php echo $image['logo']; ?> />
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_title">Title</label>
                <textarea id="btcpw_tipping_box_title" name="btcpw_tipping_box_text[title]"><?php echo $text['title']; ?></textarea>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_box_title_color">Title text color</label>
                <input id="btcpw_tipping_box_title_color" class="btcpw_tipping_box_title_color" name="btcpw_tipping_box_color[title]" type="text" value=<?php echo $color['title']; ?> />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_description">Description</label>
                <textarea id="btcpw_tipping_box_description" name="btcpw_tipping_box_text[description]"><?php echo $text['description']; ?></textarea>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_box_description_color">Description text color</label>
                <input id="btcpw_tipping_box_description_color" class="btcpw_tipping_box_description_color" name="btcpw_tipping_box_color[description]" type="text" value=<?php echo $color['description']; ?> />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_text">Tipping text</label>
                <textarea id="btcpw_tipping_box_text" name="btcpw_tipping_box_text[info]"><?php echo $text['info']; ?></textarea>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_box_tipping_box_color">Tipping text color</label>
                <input id="btcpw_tipping_box_tipping_box_color" class="btcpw_tipping_box_tipping_box_color" name="btcpw_tipping_box_color[tipping]" type="text" value=<?php echo $color['tipping']; ?> />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_redirect">Link to Thank you Page</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_box_redirect" name="btcpw_tipping_box_redirect" value=<?php echo $redirect; ?> />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_currency">Currency</label>
            </div>
            <div class="col-50">
                <select required name="btcpw_tipping_box_currency" id="btcpw_tipping_box_currency">
                    <option disabled value="">Select currency</option>
                    <?php foreach ($supported_currencies as $currency) : ?>
                        <option <?php echo $used_currency === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                            <?php echo $currency; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_input_background">Input background color</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_box_input_background" class="btcpw_tipping_box_input_background" name="btcpw_tipping_box_color[input_background]" type="text" value=<?php echo $color['input_background']; ?> />
            </div>
        </div>
        <h3>Button</h3>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_button_text">Button text</label>
            </div>
            <div class="col-50">
                <input type="text" id="btcpw_tipping_box_button_text" name="btcpw_tipping_box_text[button]" value="<?php echo $text['button']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_button_text_color">Button text color</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_box_button_text_color" class="btcpw_tipping_box_button_text_color" name="btcpw_tipping_box_color[button_text]" type="text" value=<?php echo $color['button_text']; ?> />

            </div>
        </div>


        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_box_button_color">Button color</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_box_button_color" class="btcpw_tipping_box_button_color" name="btcpw_tipping_box_color[button]" type="text" value=<?php echo $color['button']; ?> />

            </div>
        </div>
        <input type="hidden" id="btc_tipping_box_id" value="<?php echo $id; ?>" />

        <div style="display: inline-block; margin-top: 25px;">
            <button id="btcpw_previous_page" class="button button-secondary btcpw_button" type="button">Back</button>
            <button class="button button-primary btcpw_button" type="submit">Save</button>
        </div>
    </form>
</div>