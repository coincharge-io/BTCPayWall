<?php
$supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
$id = $_GET['id'] ?? null;
$form = new BTCPayWall_Donation_Form($id);
$result = json_decode(json_encode($form), true);

$predefined_enabled = $result['free_input'] ?? true;
$supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
$used_currency = $result['currency'] ?? 'SATS';
$redirect = $result['redirect'] ?? '';
$text = array(
    'title' => $result['title_text'] ?? 'Support my work',
    'info' => $result['tipping_text'] ?? 'Enter Tipping Amount',
    'button' => $result['button_text'] ?? 'Tipping now',
    'step1' => $result['step1'] ?? 'Pledge',
    'step2' => $result['step1'] ?? 'Info',
);
$form_name = $result['form_name'] ?? $text['title'];
$collect = array(
    'name' => array(
        'collect' => $result['collect_name'] ?? true,
        'mandatory' => $result['mandatory_name'] ?? false
    ),
    'email' => array(
        'collect' => $result['collect_email'] ?? true,
        'mandatory' => $result['mandatory_email'] ?? false
    ),
    'address' => array(
        'collect' => $result['collect_address'] ?? true,
        'mandatory' => $result['mandatory_address'] ?? false
    ),
    'phone' => array(
        'collect' => $result['collect_phone'] ?? true,
        'mandatory' => $result['mandatory_phone'] ?? false
    ),
    'message' => array(
        'collect' => $result['collect_message'] ?? true,
        'mandatory' => $result['mandatory_message'] ?? false
    ),

);
$color = array(
    'button_text' => !empty($result['button_text_color']) ? '#' . $result['button_text_color'] : '#FFFFFF',
    'background' => !empty($result['background_color']) ? '#' . $result['background_color'] : '#E6E6E6',
    'hf_background' => !empty($result['hf_background']) ? '#' . $result['hf_background'] : '#1d5aa3',
    'button' => !empty($result['button_color']) ? '#' . $result['button_color'] : '#FE642E',
    'title' => !empty($result['title_text_color']) ? '#' . $result['title_text_color'] : '#ffffff',
    'tipping' => !empty($result['tipping_text_color']) ? '#' . $result['tipping_text_color'] : '#000000',
    'input_background' => !empty($result['input_background']) ? '#' . $result['input_background'] : '#ffa500',
    'active' => !empty($result['active_color']) ? '#' . $result['active_color'] : '#808080',
    'inactive'  => !empty($result['inactive_color']) ? '#' . $result['inactive_color'] : '#D3D3D3',
);
$image = array(
    'logo' => $result['logo'] ?? '',
    'background' => $result['background'] ?? ''
);
$fixed_amount = array(
    'value1' => array(
        'enabled' => $result['value1_enabled'] ?? true,
        'currency' => $result['value1_currency'] ?? 'SATS',
        'amount' => !empty($result['value1_amount']) ? roundAmount($used_currency, $result['value1_amount']) : 1000,
        'icon' => $result['value1_icon'] ?? 'fas fa-coffee'
    ),
    'value2' => array(
        'enabled' => $result['value2_enabled'] ?? true,
        'currency' => $result['value2_currency'] ?? 'SATS',
        'amount' => !empty($result['value2_amount']) ? roundAmount($used_currency, $result['value2_amount']) : 2000,
        'icon' => $result['value2_icon'] ?? 'fa fa-beer'
    ),
    'value3' => array(
        'enabled' => $result['value3_enabled'] ?? true,
        'currency' => $result['value3_currency'] ?? 'SATS',
        'amount' => !empty($result['value3_amount']) ? roundAmount($used_currency, $result['value3_amount']) : 3000,
        'icon' => $result['value3_icon'] ?? 'fas fa-cocktail'
    ),
);
$predefined_enabled = $result['free_input'] ?? true;
$logo = wp_get_attachment_image_src($image['logo']);
$background = wp_get_attachment_image_src($image['background']);
$show_icon = $result['show_icon'] ?? true;
$shortcode = !empty($result) ? outputShortcodeAttributes($result['name'], $result['id']) : '';
$id = $result['id'] ?? null;

//TODO class_Exists

?>

<style>
    .btcpw_tipping_page_collect_name_mandatory,
    label[for="btcpw_tipping_page_collect[name][mandatory]"] {
        visibility: <?php echo ($collect['name']['collect']) == true ? '' : 'hidden';
                    ?>;
    }

    .btcpw_tipping_page_collect_email_mandatory,
    label[for="btcpw_tipping_page_collect[email][mandatory]"] {
        visibility: <?php echo ($collect['email']['collect']) ? '' : 'hidden';
                    ?>;
    }

    .btcpw_tipping_page_collect_address_mandatory,
    label[for="btcpw_tipping_page_collect[address][mandatory]"] {
        visibility: <?php echo ($collect['address']['collect']) == true  ? '' : 'hidden';
                    ?>;
    }

    .btcpw_tipping_page_collect_phone_mandatory,
    label[for="btcpw_tipping_page_collect[phone][mandatory]"] {
        visibility: <?php echo ($collect['phone']['collect']) == true ? '' : 'hidden';
                    ?>;
    }

    .btcpw_tipping_page_collect_message_mandatory,
    label[for="btcpw_tipping_page_collect[message][mandatory]"] {
        visibility: <?php echo ($collect['message']['collect']) == true ? '' : 'hidden';
                    ?>;
    }
</style>
<div class="tipping_page_settings">
    <?php include(__DIR__ . '/notices/form-notice.php'); ?>

    <form method="POST" action="" id="tipping_page_add_form">
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_form_name">Template name</label>
            </div>
            <div class="col-50" id="btcpw_tipping_page_shortcode">
                <input id="btcpw_tipping_page_form_name" class="btcpw_tipping_page_form_name" name="btcpw_tipping_page_form_name" type="text" value="<?php echo $form_name; ?>">
            </div>
        </div>
        <?php if ($shortcode) : ?>
            <div class="row">
                <div class="col-50">
                    <p>Shortcode</label>
                </div>
                <div class="col-50" id="btcpw_tipping_page_shortcode">
                    <p><?php echo $shortcode; ?>
                </div>
            </div>
        <?php endif; ?>
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
                    <button id="btcpw_tipping_page_button_image_background" class="btcpw_tipping_page_button_image_background" name="btcpw_tipping_page_button_image_background"><img src="<?php echo $background[0]; ?>" height=100px width=100px /></a></button>
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
                    <button id="btcpw_tipping_page_button_image" class="btcpw_tipping_page_button_image" name="btcpw_tipping_page_button_image"><img src="<?php echo $logo[0]; ?>" height=100px width=100px /></a></button>
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
                <input type="checkbox" id="btcpw_tipping_page_enter_amount" class="btcpw_tipping_page_enter_amount" name="btcpw_tipping_page_enter_amount" <?php checked($predefined_enabled); ?> value="true" />
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
                <input type="checkbox" id="btcpw_tipping_page_show_icon" class="btcpw_tipping_page_show_icon" name="btcpw_tipping_page_show_icon" <?php checked($show_icon); ?> value="true" />
            </div>
        </div>
        <div class="container_predefined_amount">
            <div class="row">
                <div class="col-50">
                    <label for="btcpw_default_price1">Default price1</label>
                </div>
                <div class="col-50">
                    <input type="checkbox" id="btcpw_page_value_1_enabled" class="btcpw_fixed_amount_enable" name="btcpw_tipping_page_fixed_amount[value1][enabled]" <?php checked($fixed_amount['value1']['enabled']); ?> value="true" />
                    <input type="number" min=0 placeholder="Default Price1" step=1 name="btcpw_tipping_page_fixed_amount[value1][amount]" id="btcpw_default_page_price1" value="<?php echo $fixed_amount['value1']['amount']; ?>">

                    <select required name="btcpw_tipping_page_fixed_amount[value1][currency]" id="btcpw_default_page_currency1">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $fixed_amount['value1']['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                <?php echo $currency; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input type="text" id="btcpw_tipping_page_icon1" class="btcpw_tipping_page_icon1" name="btcpw_tipping_page_fixed_amount[value1][icon]" placeholder="Font Awesome Icon" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." value="<?php echo $fixed_amount['value1']['icon']; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="btcpw_default_price2">Default price2</label>
                </div>
                <div class="col-50">
                    <input type="checkbox" id="btcpw_page_value_2_enabled" class="btcpw_fixed_amount_enable" name="btcpw_tipping_page_fixed_amount[value2][enabled]" <?php checked($fixed_amount['value2']['enabled']); ?> value="true" />
                    <input type="number" min=0 placeholder="Default Price2" step=1 name="btcpw_tipping_page_fixed_amount[value2][amount]" id="btcpw_default_page_price2" value="<?php echo $fixed_amount['value2']['amount']; ?>">

                    <select required name="btcpw_tipping_page_fixed_amount[value2][currency]" id="btcpw_default_page_currency2">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $fixed_amount['value2']['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                <?php echo $currency; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input type="text" id="btcpw_tipping_page_icon2" class="btcpw_tipping_page_icon2" name="btcpw_tipping_page_fixed_amount[value2][icon]" placeholder="Font Awesome Icon" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." value="<?php echo $fixed_amount['value2']['icon']; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="btcpw_default_price3">Default price3</label>
                </div>
                <div class="col-50">
                    <input type="checkbox" id="btcpw_page_value_3_enabled" class="btcpw_fixed_amount_enable" name="btcpw_tipping_page_fixed_amount[value3][enabled]" <?php checked($fixed_amount['value3']['enabled']); ?> value="true" />
                    <input type="number" min=0 placeholder="Default Price3" step=1 name="btcpw_tipping_page_fixed_amount[value3][amount]" id="btcpw_default_page_price3" value="<?php echo $fixed_amount['value3']['amount']; ?>">

                    <select required name="btcpw_tipping_page_fixed_amount[value3][currency]" id="btcpw_default_page_currency3">
                        <option disabled value="">Select currency</option>
                        <?php foreach ($supported_currencies as $currency) : ?>
                            <option <?php echo $fixed_amount['value3']['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                <?php echo $currency; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input type="text" id="btcpw_tipping_page_icon3" class="btcpw_tipping_page_icon3" name="btcpw_tipping_page_fixed_amount[value3][icon]" placeholder="Font Awesome Icon" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." value="<?php echo $fixed_amount['value3']['icon']; ?>" />
                </div>
            </div>
        </div>
        <h3>Button</h3>
        <div class="row">
            <div class="col-50">
                <label for="btcpw_tipping_page_button_text">Button text</label>
            </div>
            <div class="col-50">
                <input type="text" id="btcpw_tipping_page_button_text" name="btcpw_tipping_page_text[button]" value="<?php echo $text['button']; ?>">
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

                <input type="checkbox" class="btcpw_tipping_page_collect_name" name="btcpw_tipping_page_collect[name][collect]" <?php checked($collect['name']['collect']); ?> value="true" />

                <label for="btcpw_tipping_page_collect[name][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_name_mandatory" name="btcpw_tipping_page_collect[name][mandatory]" <?php checked($collect['name']['mandatory']); ?> value="true" />

            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <p>Email</p>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_collect[email][collect]">Display</label>

                <input type="checkbox" class="btcpw_tipping_page_collect_email" name="btcpw_tipping_page_collect[email][collect]" <?php checked($collect['email']['collect']); ?> value="true" />

                <label for="btcpw_tipping_page_collect[email][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_email_mandatory" name="btcpw_tipping_page_collect[email][mandatory]" <?php checked($collect['email']['mandatory']); ?> value="true" />

            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <p>Address</p>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_collect[address][collect]">Display</label>

                <input type="checkbox" class="btcpw_tipping_page_collect_address" name="btcpw_tipping_page_collect[address][collect]" <?php checked($collect['address']['collect']); ?> value="true" />

                <label for="btcpw_tipping_page_collect[address][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_address_mandatory" name="btcpw_tipping_page_collect[address][mandatory]" <?php checked($collect['address']['mandatory']); ?> value="true" />
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <p>Phone number</p>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_collect[phone][collect]">Display</label>

                <input type="checkbox" class="btcpw_tipping_page_collect_phone" name="btcpw_tipping_page_collect[phone][collect]" <?php checked($collect['phone']['collect']); ?> value="true" />

                <label for="btcpw_tipping_page_collect[phone][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_phone_mandatory" name="btcpw_tipping_page_collect[phone][mandatory]" <?php checked($collect['phone']['mandatory']); ?> value="true" />

            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <p>Message</p>
            </div>
            <div class="col-50">
                <label for="btcpw_tipping_page_collect[message][collect]">Display</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_message" name="btcpw_tipping_page_collect[message][collect]" <?php checked($collect['message']['collect']); ?> value="true" />

                <label for="btcpw_tipping_page_collect[message][mandatory]">Mandatory</label>
                <input type="checkbox" class="btcpw_tipping_page_collect_message_mandatory" name="btcpw_tipping_page_collect[message][mandatory]" <?php checked($collect['message']['mandatory']); ?> value="true" />

            </div>
        </div>
        <input type="hidden" id="btc_tipping_page_id" value="<?php echo $id; ?>" />
        <div style="display: inline-block; margin-top: 25px;">
            <button id="btcpw_previous_page" class="button button-secondary btcpw_button" type="button">Back</button>
            <button class="button button-primary btcpw_button" type="submit">Save</button>
        </div>
    </form>
</div>