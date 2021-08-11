<?php
$supported_currencies = BTCPayWall_Admin::TIPPING_CURRENCIES;
$predefined_enabled = get_option('btcpw_tipping_page_enter_amount');
$used_currency = get_option('btcpw_tipping_page_currency');
$redirect = get_option('btcpw_tipping_page_redirect');
$collect = get_option('btcpw_tipping_page_collect');
$fixed_amount = get_option('btcpw_tipping_page_fixed_amount');
$text = get_option('btcpw_tipping_page_text');
$color = get_option('btcpw_tipping_page_color');
$image = get_option('btcpw_tipping_page_image');
$logo = wp_get_attachment_image_src($image['logo']);
$background = wp_get_attachment_image_src($image['background']);
$show_icon = get_option('btcpw_tipping_page_show_icon');

//TODO class_Exists
?>

<style>
    .btcpw_tipping_page_collect_name_mandatory,
    label[for="btcpw_tipping_page_collect[name][mandatory]"] {
        visibility: <?php echo ($collect['name']['collect'] ?? 'false') === 'true' ? '' : 'hidden';
                    ?>;
    }

    .btcpw_tipping_page_collect_email_mandatory,
    label[for="btcpw_tipping_page_collect[email][mandatory]"] {
        visibility: <?php echo ($collect['email']['collect'] ?? 'false') === 'true' ? '' : 'hidden';
                    ?>;
    }

    .btcpw_tipping_page_collect_address_mandatory,
    label[for="btcpw_tipping_page_collect[address][mandatory]"] {
        visibility: <?php echo ($collect['address']['collect'] ?? 'false') === 'true' ? '' : 'hidden';
                    ?>;
    }

    .btcpw_tipping_page_collect_phone_mandatory,
    label[for="btcpw_tipping_page_collect[phone][mandatory]"] {
        visibility: <?php echo ($collect['phone']['collect'] ?? 'false') === 'true' ? '' : 'hidden';
                    ?>;
    }

    .btcpw_tipping_page_collect_message_mandatory,
    label[for="btcpw_tipping_page_collect[message][mandatory]"] {
        visibility: <?php echo ($collect['message']['collect'] ?? 'false') === 'true' ? '' : 'hidden';
                    ?>;
    }
</style>
<div class="tipping_page_settings">
    <form method="POST" action="options.php">
        <?php settings_fields('btcpw_tipping_page_settings'); ?>
        <div class="row">
            <div class="col-50">
                <p>Dimension</label>
            </div>
            <div class="col-50">
                <p>520x600</p>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_image_background">Background image</label>
            </div>
            <div class="col-50">
                <?php if ($background) : ?>
                    <button id="btcpw_tipping_page_button_image_background" class="btcpw_tipping_page_button_image_background" name="btcpw_tipping_page_button_image_background"><img src="<?php echo $background[0]; ?>" /></a></button>
                    <button class="btcpw_tipping_page_button_remove_background">Remove image</button>
                    <input type="hidden" id="btcpw_tipping_page_image_background" class="btcpw_tipping_page_image_background" name="btcpw_tipping_page_image[background]" value=<?php echo $image['background']; ?> />
                <?php else : ?>
                    <button id="btcpw_tipping_page_button_image_background" class="btcpw_tipping_page_button_image_background" name="btcpw_tipping_page_button_image_background">Upload </button>
                    <button class="btcpw_tipping_page_button_remove_background" style="display:none">Remove image</button>
                    <input type="hidden" id="btcpw_tipping_page_image_background" class="btcpw_tipping_page_image_background" name="btcpw_tipping_page_image[background]" value=<?php echo $image['background']; ?> />
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_background">Background color</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_page_background" class="btcpw_tipping_page_background" name="btcpw_tipping_page_color[background]" type="text" value=<?php echo $color['background']; ?> />
            </div>
        </div>

        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_hf_background">Background color for header and footer</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_hf_background" class="btcpw_tipping_hf_background" name="btcpw_tipping_page_color[hf_background]" type="text" value=<?php echo $color['hf_background']; ?> />
            </div>
        </div>
        <h3>Description</h3>

        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_image">Tipping Logo</label>
            </div>
            <div class="col-50">
                <?php if ($logo) : ?>
                    <button id="btcpw_tipping_page_button_image" class="btcpw_tipping_page_button_image" name="btcpw_tipping_page_button_image"><img src="<?php echo $logo[0]; ?>" /></a></button>
                    <button class="btcpw_tipping_page_button_remove">Remove image</button>
                    <input type="hidden" id="btcpw_tipping_page_image" class="btcpw_tipping_page_image" name="btcpw_tipping_page_image[logo]" value=<?php echo $image['logo']; ?> />
                <?php else : ?>
                    <button id="btcpw_tipping_page_button_image" class="btcpw_tipping_page_button_image" name="btcpw_tipping_page_button_image">Upload</button>
                    <button class="btcpw_tipping_page_button_remove" style="display:none">Remove image</button>
                    <input type="hidden" id="btcpw_tipping_page_image" class="btcpw_tipping_page_image" name="btcpw_tipping_page_image[logo]" value=<?php echo $image['logo']; ?> />
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_title">Title</label>
                <textarea id="btcpw_tipping_page_title" name="btcpw_tipping_page_text[title]"><?php echo $text['title']; ?></textarea>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_title_color">Title text color</label>
                <input id="btcpw_tipping_page_title_color" class="btcpw_tipping_page_title_color" name="btcpw_tipping_page_color[title]" type="text" value=<?php echo $color['title']; ?> />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_text">Tipping text</label>
                <textarea id="btcpw_tipping_page_text" name="btcpw_tipping_page_text[info]"><?php echo $text['info']; ?></textarea>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_tipping_color">Tipping text color</label>
                <input id="btcpw_tipping_page_tipping_color" class="btcpw_tipping_page_tipping_color" name="btcpw_tipping_page_color[tipping]" type="text" value=<?php echo $color['tipping']; ?> />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_redirect">Link to Thank you Page</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_page_redirect" name="btcpw_tipping_page_redirect" value=<?php echo $redirect; ?> />
            </div>
        </div>
        <h3>Amount</h3>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_enter_amount">Free input of amount</label>
                <input type="checkbox" id="btcpw_tipping_page_enter_amount" class="btcpw_tipping_page_enter_amount" name="btcpw_tipping_page_enter_amount" <?php checked(isset($predefined_enabled)); ?> value="true" />
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_currency">Currency</label>
                <select required name="btcpw_tipping_page_currency" id="btcpw_tipping_page_currency">
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
                <label for="btcpw_tipping_page_input_background">Input background color</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_page_input_background" class="btcpw_tipping_page_input_background" name="btcpw_tipping_page_color[input_background]" type="text" value=<?php echo $color['input_background']; ?> />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_show_icon">Show icons</label>
                <input type="checkbox" id="btcpw_tipping_page_show_icon" class="btcpw_tipping_page_show_icon" name="btcpw_tipping_page_show_icon" <?php checked(isset($show_icon)); ?> value="true" />
            </div>
        </div>
        <div class="container_predefined_amount">
            <div class="row">
                <div class="col-50">
                    <label for="btcpw_default_price1">Default price1</label>
                </div>
                <div class="col-50">
                    <input type="checkbox" class="btcpw_fixed_amount_enable" name="btcpw_tipping_page_fixed_amount[value1][enabled]" <?php checked(isset($fixed_amount['value1']['enabled'])); ?> value="true" />
                    <input type="number" min=0 placeholder="Default Price1" step=1 name="btcpw_tipping_page_fixed_amount[value1][amount]" id="btcpw_default_price1" value="<?php echo $fixed_amount['value1']['amount']; ?>">

                    <select required name="btcpw_tipping_page_fixed_amount[value1][currency]" id="btcpw_default_currency1">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $fixed_amount['value1']['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                <?php echo $currency; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input type="text" id="btcpw_tipping_page_icon1" class="btcpw_tipping_page_icon1" name="btcpw_tipping_page_fixed_amount[value1][icon]" placeholder="Font Awesome Icon" title="Font Awesome Icon class" value="<?php echo $fixed_amount['value1']['icon']; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="btcpw_default_price2">Default price2</label>
                </div>
                <div class="col-50">
                    <input type="checkbox" class="btcpw_fixed_amount_enable" name="btcpw_tipping_page_fixed_amount[value2][enabled]" <?php checked(isset($fixed_amount['value2']['enabled'])); ?> value="true" />
                    <input type="number" min=0 placeholder="Default Price2" step=1 name="btcpw_tipping_page_fixed_amount[value2][amount]" id="btcpw_default_price2" value="<?php echo $fixed_amount['value2']['amount']; ?>">

                    <select required name="btcpw_tipping_page_fixed_amount[value2][currency]" id="btcpw_default_currency2">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $fixed_amount['value2']['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                <?php echo $currency; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input type="text" id="btcpw_tipping_page_icon2" class="btcpw_tipping_page_icon2" name="btcpw_tipping_page_fixed_amount[value2][icon]" placeholder="Font Awesome Icon" title="Font Awesome Icon class" value="<?php echo $fixed_amount['value2']['icon']; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="btcpw_default_price3">Default price3</label>
                </div>
                <div class="col-50">
                    <input type="checkbox" class="btcpw_fixed_amount_enable" name="btcpw_tipping_page_fixed_amount[value3][enabled]" <?php checked(isset($fixed_amount['value3']['enabled'])); ?> value="true" />
                    <input type="number" min=0 placeholder="Default Price3" step=1 name="btcpw_tipping_page_fixed_amount[value3][amount]" id="btcpw_default_price3" value="<?php echo $fixed_amount['value3']['amount']; ?>">

                    <select required name="btcpw_tipping_page_fixed_amount[value3][currency]" id="btcpw_default_currency3">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $fixed_amount['value3']['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                <?php echo $currency; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input type="text" id="btcpw_tipping_page_icon3" class="btcpw_tipping_page_icon3" name="btcpw_tipping_page_fixed_amount[value3][icon]" placeholder="Font Awesome Icon" title="Font Awesome Icon class" value="<?php echo $fixed_amount['value3']['icon']; ?>" />
                </div>
            </div>
        </div>
        <h3>Button</h3>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_button_text">Button text</label>
            </div>
            <div class="col-50">
                <textarea id="btcpw_tipping_page_button_text" name="btcpw_tipping_page_text[button]"><?php echo $text['button']; ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_button_text_color">Button text color</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_page_button_text_color" class="btcpw_tipping_page_button_text_color" name="btcpw_tipping_page_color[button_text]" type="text" value=<?php echo $color['button_text']; ?> />

            </div>
        </div>


        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_button_color">Button color</label>
            </div>
            <div class="col-50">
                <input id="btcpw_tipping_page_button_color" class="btcpw_tipping_page_button_color" name="btcpw_tipping_page_color[button]" type="text" value=<?php echo $color['button']; ?> />

            </div>
        </div>
        <h3>Tabs</h3>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_step1">Step 1</label>
                <textarea id="btcpw_tipping_page_step1" name="btcpw_tipping_page_text[step1]"><?php echo $text['step1']; ?></textarea>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_tipping_color_active">Step 1 color</label>
                <input id="btcpw_tipping_page_tipping_color_active" class="btcpw_tipping_page_tipping_color_active" name="btcpw_tipping_page_color[active]" type="text" value=<?php echo $color['active']; ?> />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_step2">Step 2</label>
                <textarea id="btcpw_tipping_page_step2" name="btcpw_tipping_page_text[step2]"><?php echo $text['step2']; ?></textarea>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_tipping_color_inactive">Step 2 color</label>
                <input id="btcpw_tipping_page_tipping_color_inactive" class="btcpw_tipping_page_tipping_color_inactive" name="btcpw_tipping_page_color[inactive]" type="text" value=<?php echo $color['inactive']; ?> />
            </div>
        </div>
        <h3>Collect further information</h3>
        <div class="row">
            <div class="col-50">
                <p>Full name</p>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_collect[name][collect]">Display</label>

                <input type="checkbox" class="btcpw_tipping_page_collect_name" name="btcpw_tipping_page_collect[name][collect]" <?php checked(isset($collect['name']['collect'])); ?> value="true" />

                <label for="btcpw_tipping_page_collect[name][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_name_mandatory" name="btcpw_tipping_page_collect[name][mandatory]" <?php checked(isset($collect['name']['mandatory'])); ?> value="true" />

            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <p>Email</p>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_collect[email][collect]">Display</label>

                <input type="checkbox" class="btcpw_tipping_page_collect_email" name="btcpw_tipping_page_collect[email][collect]" <?php checked(isset($collect['email']['collect'])); ?> value="true" />

                <label for="btcpw_tipping_page_collect[email][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_email_mandatory" name="btcpw_tipping_page_collect[email][mandatory]" <?php checked(isset($collect['email']['mandatory'])); ?> value="true" />

            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <p>Address</p>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_collect[address][collect]">Display</label>

                <input type="checkbox" class="btcpw_tipping_page_collect_address" name="btcpw_tipping_page_collect[address][collect]" <?php checked(isset($collect['address']['collect'])); ?> value="true" />

                <label for="btcpw_tipping_page_collect[address][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_address_mandatory" name="btcpw_tipping_page_collect[address][mandatory]" <?php checked(isset($collect['address']['mandatory'])); ?> value="true" />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <p>Phone number</p>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_collect[phone][collect]">Display</label>

                <input type="checkbox" class="btcpw_tipping_page_collect_phone" name="btcpw_tipping_page_collect[phone][collect]" <?php checked(isset($collect['phone']['collect'])); ?> value="true" />

                <label for="btcpw_tipping_page_collect[phone][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_phone_mandatory" name="btcpw_tipping_page_collect[phone][mandatory]" <?php checked(isset($collect['name']['mandatory'])); ?> value="true" />

            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <p>Message</p>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_collect[message][collect]">Display</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_message" name="btcpw_tipping_page_collect[message][collect]" <?php checked(isset($collect['message']['collect'])); ?> value="true" />

                <label for="btcpw_tipping_page_collect[message][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_message_mandatory" name="btcpw_tipping_page_collect[message][mandatory]" <?php checked(isset($collect['message']['mandatory'])); ?> value="true" />

            </div>
        </div>

        <div style="display: inline-block; margin-top: 25px;">
            <button class="button button-primary" type="submit">Save</button>
        </div>
    </form>
</div>