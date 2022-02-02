<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Shortcodes
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */


// Exit if accessed directly
if (!defined('ABSPATH')) exit;




function btcpaywall_render_shortcode_banner_wide_tipping($atts)
{

    $id = !empty($atts['id']) ? intval($atts['id']) : null;
    $form = new BTCPayWall_Tipping_Form($id);
    $result = json_decode(json_encode($form), true);

    $atts = shortcode_atts(array(
        'dimension' => $id ? $result['dimension'] : '600x200',
        'title' => $id ? $result['title_text'] : 'Support my work',
        'description' => $id ? $result['description_text'] : '',
        'currency' => $id ? $result['currency'] : 'SATS',
        'background_color' => $id ? '#' . $result['background_color'] : '#E6E6E6',
        'title_text_color' =>  $id ? '#' . $result['title_text_color'] : '#ffffff',
        'tipping_text' => $id ? $result['tipping_text'] : 'Enter Tipping Amount',
        'tipping_text_color' => $id ? '#' . $result['tipping_text_color'] : '#000000',
        'redirect' => $id ? $result['redirect'] : '',
        'description_color' => $id ? '#' . $result['description_text_color'] : '#000000',
        'button_text' => $id ? $result['button_text'] : 'Tipping now',
        'button_text_color' => $id ? '#' . $result['button_text_color'] : '#FFFFFF',
        'button_color' => $id ? '#' . $result['button_color'] : '#FE642E',
        'logo_id' => $id ? $result['logo'] : BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'background_id' => $id ? $result['background'] : '',
        'free_input' => $id ? filter_var($result['free_input'], FILTER_VALIDATE_BOOLEAN) : true,
        'input_background' => $id ? '#' . $result['input_background'] : '#ffa500',
        'background' => $id ? '#' . $result['hf_background'] : '#1d5aa3',
        'value1_enabled' => $id ? filter_var($result['value1_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
        'value1_amount' => $id ? round($result['value1_amount'], 0) : 1000,
        'value1_currency' => $id ? $result['value1_currency'] : 'SATS',
        'value1_icon' => $id ? $result['value1_icon'] : 'fas fa-coffee',
        'value2_enabled' => $id ? filter_var($result['value2_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
        'value2_amount' => $id ? round($result['value2_amount'], 0) : 2000,
        'value2_currency' => $id ? $result['value2_currency'] : 'SATS',
        'value2_icon' => $id ? $result['value2_icon'] : 'fas fa-beer',
        'value3_enabled' => $id ? filter_var($result['value3_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
        'value3_amount' => $id ? round($result['value3_amount'], 0) : 3000,
        'value3_currency' => $id ? $result['value3_currency'] : 'SATS',
        'value3_icon' => $id ? $result['value3_icon'] : 'fas fa-cocktail',
        'display_name' => $id ? filter_var($result['collect_name'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_name' => $id ? filter_var($result['mandatory_name'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_email' => $id ? filter_var($result['collect_email'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_email' => $id ? filter_var($result['mandatory_email'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_phone' => $id ? filter_var($result['collect_phone'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_phone' => $id ? filter_var($result['mandatory_phone'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_address' => $id ? filter_var($result['collect_address'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_address' => $id ? filter_var($result['mandatory_address'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_message' => $id ? filter_var($result['collect_message'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_message' => $id ? filter_var($result['mandatory_message'], FILTER_VALIDATE_BOOLEAN) : false,
        'show_icon'    => $id ? filter_var($result['show_icon'], FILTER_VALIDATE_BOOLEAN) : true,
        'widget'    => false
    ), $atts);

    $supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
    $logo = wp_get_attachment_image_src($atts['logo_id']) ? wp_get_attachment_image_src($atts['logo_id'])[0] : $atts['logo_id'];
    $background = wp_get_attachment_image_src($atts['background_id']) ? wp_get_attachment_image_src($atts['background_id'])[0] : $atts['background_id'];
    $collect = btcpaywall_get_collect($atts);
    $collect_data = btcpaywall_display_is_enabled($collect);
    $fixed_amount = btcpaywall_get_fixed_amount($atts);
    $first_enabled = array_column($fixed_amount, 'enabled');
    $d = array_search('true', $first_enabled);
    $index = 'value' . ($d + 1);

    ob_start();
?>
    <style>
        .btcpw_skyscraper_tipping_container.wide {
            background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
                                ?>;
            background-image: url(<?php echo ($background ? esc_url($background) : '');
                                    ?>);
        }

        .btcpw_skyscraper_banner.wide {
            background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
                                ?>;
            background-image: url(<?php echo ($background ? esc_url($background) : '');
                                    ?>);
        }

        .btcpw_skyscraper_header_container.wide,
        #btcpw_skyscraper_wide_button,
        #btcpw_skyscraper_wide_button>div:nth-child(1)>input {
            background-color: <?php echo esc_html($atts['background']);
                                ?>;
        }

        #btcpw_skyscraper_tipping_wide_button,
        #btcpw_skyscraper_wide_button>div>input.skyscraper-next-form {
            color: <?php echo esc_html($atts['button_text_color']);
                    ?>;
            background: <?php echo esc_html($atts['button_color']);
                        ?>;
        }

        .btcpw_skyscraper_header_container.wide h3 {
            color: <?php echo esc_html($atts['title_text_color']);
                    ?>
        }

        div.btcpw_skyscraper_banner.wide>div.btcpw_skyscraper_header_container.wide p {
            color: <?php echo esc_html($atts['description_color']);
                    ?>
        }

        #skyscraper_tipping_wide_form>fieldset h4 {
            color: <?php echo esc_html($atts['tipping_text_color']);
                    ?>
        }

        .btcpw_skyscraper_amount_value_1.wide,
        .btcpw_skyscraper_amount_value_2.wide,
        .btcpw_skyscraper_amount_value_3.wide,
        .btcpw_skyscraper_tipping_free_input.wide {
            background: <?php echo esc_html($atts['input_background']);
                        ?>;

        }
    </style>
    <div id="btcpw_page">
        <div class="btcpw_skyscraper_banner wide">
            <div class="btcpw_skyscraper_header_container wide">
                <?php if ($logo) : ?>
                    <div id="<?php echo "btcpw_skyscraper_logo_wrap_wide"; ?>">
                        <img alt="Tipping logo" src=<?php echo esc_url($logo); ?> />
                    </div>
                <?php endif; ?>
                <div>
                    <?php if (!empty($atts['title'])) : ?>
                        <h3><?php echo esc_html__($atts['title'], 'btcpaywall'); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($atts['description'])) : ?>
                        <p><?php echo esc_html__($atts['description'], 'btcpaywall'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="btcpw_skyscraper_tipping_container wide">
                <form method="POST" action="" id="<?php echo esc_attr("skyscraper_tipping_wide_form"); ?>">
                    <fieldset>
                        <h4><?php echo (!empty($atts['tipping_text']) ? esc_html($atts['tipping_text']) : ''); ?>
                        </h4>
                        <div class="btcpw_skyscraper_amount wide">
                            <?php foreach ($fixed_amount as $key => $value) : ?>

                                <?php if ($fixed_amount[$key]['enabled'] === true) : ?>
                                    <div class="<?php echo esc_attr("btcpw_skyscraper_amount_{$key} wide"); ?>">
                                        <div>
                                            <input type="radio" class="btcpw_skyscraper_tipping_default_amount wide" id="<?php echo esc_attr("{$key}_wide"); ?>" name="btcpw_skyscraper_tipping_default_amount_wide" <?php echo $key == $index ? 'required' : ''; ?> value="<?php echo esc_attr($fixed_amount[$key]['amount']) . ' ' . esc_attr($fixed_amount[$key]['currency']); ?>">
                                            <?php if (!empty($fixed_amount[$key]['amount'])) : ?>
                                                <?php if (true == $atts['show_icon']) : ?>
                                                    <i class="<?php echo esc_attr($fixed_amount[$key]['icon']); ?>"></i>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <label for="<?php echo esc_attr($key); ?>"><?php echo esc_html($fixed_amount[$key]['amount'] . ' ' . esc_html($fixed_amount[$key]['currency'])); ?></label>

                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                            <?php if (true == $atts['free_input']) : ?>
                                <div class="btcpw_skyscraper_tipping_free_input wide">
                                    <input type="number" id="btcpw_skyscraper_tipping_wide_amount" min="0" name="btcpw_skyscraper_tipping_amount_wide" placeholder="0.00" required />


                                    <select required name="btcpw_skyscraper_tipping_currency_wide" id="btcpw_skyscraper_tipping_wide_currency">
                                        <option disabled value="">Select currency</option>
                                        <?php foreach ($supported_currencies as $currency) : ?>
                                            <option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                                <?php echo esc_html($currency); ?>
                                            <?php endforeach; ?>
                                    </select>
                                    <i class="fas fa-arrows-alt-v"></i>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="btcpw_skyscraper_tipping_converted_values wide">
                            <input type="text" id="btcpw_skyscraper_wide_converted_amount" name="btcpw_skyscraper_converted_amount_wide" readonly />
                            <input type="text" id="btcpw_skyscraper_wide_converted_currency" name="btcpw_skyscraper_converted_currency_wide" readonly />
                        </div>


                        <div class="btcpw_skyscraper_button wide" id="btcpw_skyscraper_wide_button">
                            <input type="hidden" id="btcpw_skyscraper_redirect_link_wide" name="btcpw_skyscraper_redirect_link_wide" value="<?php echo esc_attr($atts['redirect']); ?>" />
                            <?php if (true === $collect_data) : ?>

                                <div>
                                    <input type="button" name="next" class="skyscraper-next-form wide" value=<?php echo esc_html__('Continue', 'btcpaywall'); ?>>
                                </div>

                            <?php else : ?>
                                <div>
                                    <button type="submit" id="btcpw_skyscraper_tipping_wide_button"><?php echo (!empty($atts['button_text']) ? esc_html__($atts['button_text'], 'btcpaywall') : 'Tip'); ?></button>
                                </div>
                            <?php endif; ?>
                        </div>

                    </fieldset>
                    <?php if ($collect_data === true) : ?>
                        <fieldset>
                            <div class="btcpw_skyscraper_donor_information wide">
                                <?php foreach ($collect as $key => $value) : ?>
                                    <?php if ($collect[$key]['display'] === true) : ?>
                                        <?php $id = $collect[$key]['id'];
                                        $label = $collect[$key]['label'];
                                        $type = $collect[$key]['type'];
                                        ?>
                                        <div class="<?php echo esc_attr("btcpw_skyscraper_tipping_donor_{$id}_wrap wide"); ?>">
                                            <label for="<?php echo esc_attr("btcpw_skyscraper_tipping_donor_{$id}_wide"); ?>"><?php echo esc_html__($label, 'btcpaywall'); ?></label>
                                            <input type="<?php echo esc_attr($type); ?>" id="<?php echo esc_attr("btcpw_skyscraper_tipping_donor_{$id}_wide"); ?>" name="<?php echo esc_attr("btcpw_skyscraper_tipping_donor_{$id}_wide"); ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <div class="<?php echo "btcpw_skyscraper_button wide"; ?>" id="btcpw_skyscraper_wide_button">
                                <div>
                                    <input type="button" name="previous" class="skyscraper-previous-form wide" value="<?php echo esc_html__('< Previous', 'btcpaywall'); ?>" />
                                </div>
                                <div>
                                    <button type="submit" id="btcpw_skyscraper_tipping_wide_button"><?php echo (!empty($atts['button_text']) ? esc_html__($atts['button_text'], 'btcpaywall') : 'Tip'); ?></button>
                                </div>
                            </div>
                        </fieldset>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <div id="powered_by_skyscraper">
            <p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
        </div>
    </div>
<?php

    return ob_get_clean();
}
add_shortcode('btcpw_tipping_banner_wide', 'btcpaywall_render_shortcode_banner_wide_tipping');
/**
 * @param $atts
 *
 * @return string
 */
function btcpaywall_render_shortcode_banner_high_tipping($atts)
{

    $id = !empty($atts['id']) ? intval($atts['id']) : null;
    $form = new BTCPayWall_Tipping_Form($id);
    $result = json_decode(json_encode($form), true);
    $atts = shortcode_atts(array(
        'dimension' => $id ? $result['dimension'] : '200x710',
        'title' => $id ? $result['title_text'] : 'Support my work',
        'description' => $id ? $result['description_text'] : '',
        'currency' => $id ? $result['currency'] : 'SATS',
        'background_color' => $id ? '#' . $result['background_color'] : '#E6E6E6',
        'title_text_color' => $id ? '#' . $result['title_text_color'] : '#ffffff',
        'tipping_text' => $id ? $result['tipping_text'] : 'Enter Tipping Amount',
        'tipping_text_color' => $id ? '#' . $result['tipping_text_color'] : '#000000',
        'redirect' => $id ? $result['redirect'] : '',
        'description_color' => $id ? '#' . $result['description_text_color'] : '#000000',
        'button_text' => $id ? $result['button_text'] : 'Tipping now',
        'button_text_color' => $id ? '#' . $result['button_text_color'] : '#FFFFFF',
        'button_color' => $id ? '#' . $result['button_color'] : '#FE642E',
        'logo_id' => $id ? $result['logo'] : BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'background_id' => $id ? $result['background'] : '',
        'free_input' => $id ? filter_var($result['free_input'], FILTER_VALIDATE_BOOLEAN) : true,
        'input_background' => $id ? '#' . $result['input_background'] : '#ffa500',
        'background' => $id ? '#' . $result['hf_background'] : '#1d5aa3',
        'value1_enabled' => $id ? filter_var($result['value1_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
        'value1_amount' => $id ? round($result['value1_amount'], 0) : 1000,
        'value1_currency' => $id ? $result['value1_currency'] : 'SATS',
        'value1_icon' => $id ? $result['value1_icon'] : 'fas fa-coffee',
        'value2_enabled' => $id ? filter_var($result['value2_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
        'value2_amount' => $id ? round($result['value2_amount'], 0) : 2000,
        'value2_currency' => $id ? $result['value2_currency'] : 'SATS',
        'value2_icon' => $id ? $result['value2_icon'] : 'fas fa-beer',
        'value3_enabled' => $id ? filter_var($result['value3_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
        'value3_amount' => $id ? round($result['value3_amount'], 0) : 3000,
        'value3_currency' => $id ? $result['value3_currency'] : 'SATS',
        'value3_icon' => $id ? $result['value3_icon'] : 'fas fa-cocktail',
        'display_name' => $id ? filter_var($result['collect_name'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_name' => $id ? filter_var($result['mandatory_name'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_email' => $id ? filter_var($result['collect_email'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_email' => $id ? filter_var($result['mandatory_email'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_phone' => $id ? filter_var($result['collect_phone'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_phone' => $id ? filter_var($result['mandatory_phone'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_address' => $id ? filter_var($result['collect_address'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_address' => $id ? filter_var($result['mandatory_address'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_message' => $id ? filter_var($result['collect_message'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_message' => $id ? filter_var($result['mandatory_message'], FILTER_VALIDATE_BOOLEAN) : false,
        'show_icon' => $id ? filter_var($result['show_icon'], FILTER_VALIDATE_BOOLEAN) : true,
        'widget' => false
    ), $atts);


    $supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
    $logo = wp_get_attachment_image_src($atts['logo_id']) ? wp_get_attachment_image_src($atts['logo_id'])[0] : $atts['logo_id'];
    $background = wp_get_attachment_image_src($atts['background_id']) ? wp_get_attachment_image_src($atts['background_id'])[0] : $atts['background_id'];
    $collect = btcpaywall_get_collect($atts);
    $collect_data = btcpaywall_display_is_enabled($collect);
    $fixed_amount = btcpaywall_get_fixed_amount($atts);
    $first_enabled = array_column($fixed_amount, 'enabled');
    $d = array_search('true', $first_enabled);
    $index = 'value' . ($d + 1);

    ob_start();
?>
    <style>
        .btcpw_skyscraper_tipping_container.high {
            background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
                                ?>;
            background-image: url(<?php echo ($background ? esc_url($background) : '');
                                    ?>);
        }


        .btcpw_skyscraper_amount_value_1.high,
        .btcpw_skyscraper_amount_value_2.high,
        .btcpw_skyscraper_amount_value_3.high,
        .btcpw_skyscraper_tipping_free_input.high {
            background-color: <?php echo esc_html($atts['input_background']);
                                ?>;
        }

        .btcpw_skyscraper_header_container.high,
        #btcpw_skyscraper_high_button,
        #btcpw_skyscraper_high_button>div:nth-child(1)>input {
            background-color: <?php echo esc_html($atts['background']);
                                ?>;
        }

        #btcpw_skyscraper_tipping_high_button,
        #btcpw_skyscraper_high_button>div>input.skyscraper-next-form {
            color: <?php echo esc_html($atts['button_text_color']);
                    ?>;
            background: <?php echo esc_html($atts['button_color']);
                        ?>;
        }

        .btcpw_skyscraper_header_container.high h3 {
            color: <?php echo esc_html($atts['title_text_color']);
                    ?>
        }


        div.btcpw_skyscraper_banner.high>div.btcpw_skyscraper_header_container.high p {
            color: <?php echo esc_html($atts['description_color']);
                    ?>
        }

        #skyscraper_tipping_high_form>fieldset h4 {
            color: <?php echo esc_html($atts['tipping_text_color']);
                    ?>
        }
    </style>
    <div id="btcpw_page">
        <div class="btcpw_skyscraper_banner high">
            <div class="btcpw_skyscraper_header_container high">
                <?php if ($logo) : ?>
                    <div id="btcpw_skyscraper_logo_wrap_high">
                        <img alt="Tipping logo" src=<?php echo esc_url($logo); ?> />
                    </div>
                <?php endif; ?>
                <div>
                    <?php if (!empty($atts['title'])) : ?>
                        <h3><?php echo esc_html__($atts['title'], 'btcpaywall'); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($atts['description'])) : ?>
                        <p><?php echo esc_html__($atts['description'], 'btcpaywall'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="btcpw_skyscraper_tipping_container high">
                <form method="POST" action="" id="skyscraper_tipping_high_form">
                    <fieldset>
                        <h4><?php echo (!empty($atts['tipping_text']) ? esc_html($atts['tipping_text']) : ''); ?>
                        </h4>
                        <div class="btcpw_skyscraper_amount high">
                            <?php foreach ($fixed_amount as $key => $value) : ?>

                                <?php if ($fixed_amount[$key]['enabled'] === true) : ?>
                                    <div class="<?php echo esc_attr("btcpw_skyscraper_amount_{$key} high"); ?>">
                                        <div>
                                            <input type="radio" class="btcpw_skyscraper_tipping_default_amount high" )" id="<?php echo esc_attr("{$key}_high"); ?>" name="btcpw_skyscraper_tipping_default_amount_high" <?php echo $key == $index ? 'required' : ''; ?> value="<?php echo esc_attr($fixed_amount[$key]['amount']) . ' ' . esc_attr($fixed_amount[$key]['currency']); ?>">
                                            <?php if (!empty($fixed_amount[$key]['amount'])) : ?>
                                                <?php if (true == $atts['show_icon']) : ?>
                                                    <i class="<?php echo esc_attr($fixed_amount[$key]['icon']); ?>"></i>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <label for="<?php echo esc_attr($key); ?>"><?php echo esc_html($fixed_amount[$key]['amount'] . ' ' . $fixed_amount[$key]['currency']); ?></label>

                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                            <?php if (true == $atts['free_input']) : ?>
                                <div class="btcpw_skyscraper_tipping_free_input high">
                                    <input type="number" min="0" id="<?php echo esc_attr("btcpw_skyscraper_tipping_high_amount"); ?>" name="btcpw_skyscraper_tipping_amount_high" placeholder="0.00" required />


                                    <select required name="btcpw_skyscraper_tipping_currency_high" id="btcpw_skyscraper_tipping_high_currency">
                                        <option disabled value="">Select currency</option>
                                        <?php foreach ($supported_currencies as $currency) : ?>
                                            <option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                                <?php echo esc_html($currency); ?>
                                            <?php endforeach; ?>
                                    </select>
                                    <i class="fas fa-arrows-alt-v"></i>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="btcpw_skyscraper_tipping_converted_values high">
                            <input type="text" id="btcpw_skyscraper_high_converted_amount" name="btcpw_skyscraper_converted_amount_high" readonly />
                            <input type="text" id="btcpw_skyscraper_high_converted_currency" name="btcpw_skyscraper_converted_currency_high" readonly />
                        </div>


                        <div class="btcpw_skyscraper_button high" id="btcpw_skyscraper_high_button">
                            <input type="hidden" id="btcpw_skyscraper_redirect_link_high" name="btcpw_skyscraper_redirect_link_high" value="<?php echo esc_attr($atts['redirect']); ?>" />
                            <?php if (true === $collect_data) : ?>

                                <div>
                                    <input type="button" name="next" class="skyscraper-next-form high" value="<?php echo esc_html__('Continue', 'btcpaywall'); ?>">
                                </div>

                            <?php else : ?>
                                <div>
                                    <button type="submit" id="<?php echo "btcpw_skyscraper_tipping_high_button"; ?>"><?php echo (!empty($atts['button_text']) ? esc_html__($atts['button_text'], 'btcpaywall') : 'Tip'); ?></button>
                                </div>
                            <?php endif; ?>
                        </div>

                    </fieldset>
                    <?php if ($collect_data === true) : ?>
                        <fieldset>
                            <div class="btcpw_skyscraper_donor_information high">
                                <?php foreach ($collect as $key => $value) : ?>
                                    <?php if ($collect[$key]['display'] === true) : ?>
                                        <?php $id = $collect[$key]['id'];
                                        $label = $collect[$key]['label'];
                                        $type = $collect[$key]['type'];
                                        ?>
                                        <div class="<?php echo esc_attr("btcpw_skyscraper_tipping_donor_{$id}_wrap high"); ?>">
                                            <label for="<?php echo esc_attr("btcpw_skyscraper_tipping_donor_{$id}_high"); ?>"><?php echo esc_html__($label, 'btcpaywall'); ?></label>
                                            <input type="<?php echo esc_attr($type); ?>" id="<?php echo esc_attr("btcpw_skyscraper_tipping_donor_{$id}_high"); ?>" name="<?php echo esc_attr("btcpw_skyscraper_tipping_donor_{$id}_high"); ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="<?php echo "btcpw_skyscraper_button high"; ?>" id="btcpw_skyscraper_high_button">
                                <div>
                                    <input type="button" name="previous" class="skyscraper-previous-form high" value="<?php echo esc_html__('< Previous', 'btcpaywall'); ?>" />
                                </div>
                                <div>
                                    <button type="submit" id="btcpw_skyscraper_tipping_high_button"><?php echo (!empty($atts['button_text']) ? esc_html__($atts['button_text'], 'btcpaywall') : 'Tip'); ?></button>
                                </div>
                            </div>
                        </fieldset>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <div id="powered_by_skyscraper">
            <p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
        </div>
    </div>
<?php

    return ob_get_clean();
}
add_shortcode('btcpw_tipping_banner_high', 'btcpaywall_render_shortcode_banner_high_tipping');
/**
 * @param $atts
 *
 * @return string
 */
function btcpaywall_render_shortcode_page_tipping($atts)
{

    $id = !empty($atts['id']) ? intval($atts['id']) : null;
    $form = new BTCPayWall_Tipping_Form($id);
    $result = json_decode(json_encode($form), true);

    $atts = shortcode_atts(array(
        'dimension' => $id ? $result['dimension'] : '520x600',
        'title' => $id ? $result['title_text'] : 'Support my work',
        'description' => $id ? $result['description_text'] : '',
        'currency' => $id ? $result['currency'] : 'SATS',
        'background_color' => $id ? '#' . $result['background_color'] : '#E6E6E6',
        'title_text_color' => $id ? '#' . $result['title_text_color'] : '#ffffff',
        'tipping_text' => $id ? $result['tipping_text'] : 'Enter Tipping Amount',
        'tipping_text_color' => $id ? '#' . $result['tipping_text_color'] : '#000000',
        'redirect' => $id ? $result['redirect'] : '',
        'description_color' => $id ? '#' . $result['description_text_color'] : '#000000',
        'button_text' => $id ? $result['button_text'] : 'Tipping now',
        'button_text_color' => $id ? '#' . $result['button_text_color'] : '#FFFFFF',
        'button_color' => $id ? '#' . $result['button_color'] : '#FE642E',
        'logo_id' => $id ? $result['logo'] : BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'background_id' => $id ? $result['background'] : '',
        'input_background' => $id ? '#' . $result['input_background'] : '#ffa500',
        'background' => $id ? '#' . $result['hf_background'] : '#1d5aa3',
        'free_input' => $id ? filter_var($result['free_input'], FILTER_VALIDATE_BOOLEAN) : true,
        'value1_enabled' => $id ? filter_var($result['value1_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
        'value1_amount' => $id ? round($result['value1_amount'], 0) : 1000,
        'value1_currency' => $id ? $result['value1_currency'] : 'SATS',
        'value1_icon' => $id ? $result['value1_icon'] : 'fas fa-coffee',
        'value2_enabled' => $id ? filter_var($result['value2_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
        'value2_amount' => $id ? round($result['value2_amount'], 0) : 2000,
        'value2_currency' => $id ? $result['value2_currency'] : 'SATS',
        'value2_icon' => $id ? $result['value2_icon'] : 'fas fa-beer',
        'value3_enabled' => $id ? filter_var($result['value3_enabled'], FILTER_VALIDATE_BOOLEAN) : true,
        'value3_amount' => $id ? round($result['value3_amount'], 0) : 3000,
        'value3_currency' => $id ? $result['value3_currency'] : 'SATS',
        'value3_icon' => $id ? $result['value3_icon'] : 'fas fa-cocktail',
        'display_name' => $id ? filter_var($result['collect_name'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_name' => $id ? filter_var($result['mandatory_name'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_email' => $id ? filter_var($result['collect_email'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_email' => $id ? filter_var($result['mandatory_email'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_phone' => $id ? filter_var($result['collect_phone'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_phone' => $id ? filter_var($result['mandatory_phone'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_address' => $id ? filter_var($result['collect_address'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_address' => $id ? filter_var($result['mandatory_address'], FILTER_VALIDATE_BOOLEAN) : false,
        'display_message' => $id ? filter_var($result['collect_message'], FILTER_VALIDATE_BOOLEAN) : false,
        'mandatory_message' => $id ? filter_var($result['mandatory_message'], FILTER_VALIDATE_BOOLEAN) : false,
        'step1' => $id ? $result['step1'] : 'Pledge',
        'active_color' => $id ? '#' . $result['active_color'] : '#808080',
        'step2' => $id ? $result['step2'] : 'Info',
        'inactive_color' => $id ? '#' . $result['inactive_color'] : '#D3D3D3',
        'show_icon' => $id ? $result['show_icon'] : true,
    ), $atts);

    $dimension = explode('x', '520x600');
    $supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
    $logo = wp_get_attachment_image_src($atts['logo_id']) ? wp_get_attachment_image_src($atts['logo_id'])[0] : $atts['logo_id'];

    $background = wp_get_attachment_image_src($atts['background_id']) ? wp_get_attachment_image_src($atts['background_id'])[0] : $atts['background_id'];
    $collect = btcpaywall_get_collect($atts);
    $collect_data = btcpaywall_display_is_enabled($collect);
    $fixed_amount = btcpaywall_get_fixed_amount($atts);
    $first_enabled = array_column($fixed_amount, 'enabled');
    $d = array_search('true', $first_enabled);
    $index = 'value' . ($d + 1);

    ob_start();
?>
    <style>
        .btcpw_page_tipping_container {
            background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
                                ?>;
            background-image: url(<?php echo ($background ? esc_url($background) : '');
                                    ?>);
            width: <?php echo esc_html($dimension[0]) . 'px !important';
                    ?>;
            height: <?php echo esc_html($dimension[1]) . 'px !important';
                    ?>;
        }

        #btcpw_page_tipping__button,
        #btcpw_page_button>input.page-next-form,
        #btcpw_page_button>input.page-previous-form {
            color: <?php echo esc_html($atts['button_text_color']);
                    ?>;
        }

        #btcpw_page_button {
            background-color: <?php echo esc_html($atts['background']);
                                ?>;
        }

        .btcpw_page_header_container h3 {
            color: <?php echo esc_html($atts['title_text_color']);
                    ?>
        }


        #page_tipping_form>fieldset>h4 {
            color: <?php echo esc_html($atts['tipping_text_color']);
                    ?>
        }

        .btcpw_page_amount_value_1,
        .btcpw_page_amount_value_2,
        .btcpw_page_amount_value_3,
        .btcpw_page_tipping_free_input {
            background-color: <?php echo esc_html($atts['input_background']);
                                ?>;

        }

        .btcpw_page_header_container,
        #btcpw_page_button>div:nth-child(1)>input {
            background-color: <?php echo esc_html($atts['background']);
                                ?>;
        }

        .btcpw_page_bar_container.active {
            background-color: <?php echo esc_html($atts['active_color']);
                                ?>;
        }

        #btcpw_page_tipping__button,
        #btcpw_page_button>input.page-next-form {
            background-color: <?php echo esc_html($atts['button_color']);
                                ?>;
        }

        .btcpw_page_bar_container div {
            background-color: <?php echo esc_html($atts['inactive_color']);
                                ?>;
        }
    </style>

    <div id="btcpw_page">
        <div class="btcpw_page_tipping_container">
            <form method="POST" action="" id="page_tipping_form">
                <div class="btcpw_page_header_container">
                    <?php if ($logo) : ?>
                        <div id="btcpw_page_logo_wrap">
                            <img alt="Tipping page logo" src=<?php echo esc_url($logo); ?> />
                        </div>
                    <?php endif; ?>
                    <div>
                        <?php if (!empty($atts['title'])) : ?>
                            <h3><?php echo esc_html__($atts['title'], 'btcpaywall'); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($atts['description'])) : ?>
                            <p><?php echo esc_html__($atts['description'], 'btcpaywall'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($collect_data == 'true') : ?>
                    <div class='btcpw_page_bar_container'>
                        <div class='btcpw_page_bar_container bar-1 active'>
                            <?php echo (!empty($atts['step1']) ? esc_html__($atts['step1'], 'btcpaywall') : '1.Pledge'); ?></div>
                        <div class='btcpw_page_bar_container bar-2'>
                            <?php echo (!empty($atts['step2']) ? esc_html__($atts['step2'], 'btcpaywall') : '2.Info'); ?></div>
                    </div>
                <?php endif; ?>
                <fieldset>
                    <h4><?php echo (!empty($atts['tipping_text']) ? esc_html__($atts['tipping_text'], 'btcpaywall') : ''); ?>
                    </h4>
                    <div class="btcpw_page_amount">
                        <?php foreach ($fixed_amount as $key => $value) : ?>

                            <?php if ($fixed_amount[$key]['enabled'] === true) : ?>
                                <div class="<?php echo esc_attr("btcpw_page_amount_{$key}"); ?>">
                                    <div>
                                        <input type="radio" class="btcpw_page_tipping_default_amount" id="<?php echo esc_attr("{$key}_page"); ?>" name="btcpw_page_tipping_default_amount" <?php echo $key == $index ? 'required' : ''; ?> value="<?php echo esc_attr($fixed_amount[$key]['amount']) . ' ' . (!empty($fixed_amount[$key]['currency']) ? esc_attr($fixed_amount[$key]['currency']) : 'SATS'); ?>">
                                        <?php if (!empty($fixed_amount[$key]['amount'])) : ?>
                                            <?php if (true == $atts['show_icon']) : ?>
                                                <i class="<?php echo esc_html($fixed_amount[$key]['icon']); ?>"></i>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <label for="<?php echo esc_attr("{$key}_page"); ?>"><?php echo esc_attr($fixed_amount[$key]['amount']) . ' ' . (!empty($fixed_amount[$key]['currency']) ? esc_attr($fixed_amount[$key]['currency']) : 'SATS'); ?></label>

                                </div>
                            <?php endif; ?>

                        <?php endforeach; ?>
                        <?php if (true == $atts['free_input']) : ?>
                            <div class="btcpw_page_tipping_free_input">
                                <input type="number" min="0" id="btcpw_page_tipping_amount" name="btcpw_page_tipping_amount" placeholder="0.00" required />


                                <select required name="btcpw_page_tipping_currency" id="btcpw_page_tipping_currency">
                                    <option disabled value="">Select currency</option>
                                    <?php foreach ($supported_currencies as $currency) : ?>
                                        <option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                            <?php echo esc_html($currency); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <i class="fas fa-arrows-alt-v"></i>
                            </div>
                        <?php endif; ?>

                    </div>
                    <?php if (true == $atts['free_input'] && $collect === false) : ?>
                        <div class="btcpw_page_tipping_free_input">
                            <input type="number" id="btcpw_page_tipping_amount" name="btcpw_page_tipping_amount" placeholder="0.00" required />


                            <select required name="btcpw_page_tipping_currency" id="btcpw_page_tipping_currency">
                                <option disabled value="">Select currency</option>
                                <?php foreach ($supported_currencies as $currency) : ?>
                                    <option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                        <?php echo esc_html($currency); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <i class="fas fa-arrows-alt-v"></i>
                        </div>
                    <?php endif; ?>

                    <div class="btcpw_page_tipping_converted_values">
                        <input type="text" id="btcpw_page_converted_amount" name="btcpw_page_converted_amount" readonly />
                        <input type="text" id="btcpw_page_converted_currency" name="btcpw_page_converted_currency" readonly />
                    </div>


                    <div id="btcpw_page_button">
                        <input type="hidden" id="btcpw_page_redirect_link" name="btcpw_page_redirect_link" value=<?php echo esc_attr($atts['redirect']); ?> />
                        <?php if ($collect_data === true) : ?>
                            <input type="button" name="next" class="page-next-form" value="<?php echo esc_html__('continue', 'btcpaywall'); ?>" />
                        <?php else : ?>
                            <button type="submit" id="btcpw_page_tipping__button"><?php echo (!empty($atts['button_text']) ? esc_html__($atts['button_text'], 'btcpaywall') : 'Tip'); ?></button>
                        <?php endif; ?>
                    </div>

                </fieldset>
                <?php if ($collect_data === true) : ?>
                    <fieldset>
                        <div class="btcpw_page_donor_information">
                            <?php foreach ($collect as $key => $value) : ?>
                                <?php if ($collect[$key]['display'] === true) : ?>
                                    <?php $id = $collect[$key]['id'];
                                    $label = $collect[$key]['label'];
                                    $type = $collect[$key]['type'];
                                    ?>
                                    <div class="<?php echo esc_attr("btcpw_page_tipping_donor_{$id}_wrap"); ?>">
                                        <label for="<?php echo esc_attr("btcpw_page_tipping_donor_{$id}"); ?>"><?php echo esc_html__($label, 'btcpaywall'); ?></label>
                                        <input type="<?php echo esc_attr($type); ?>" id="<?php echo esc_attr("btcpw_page_tipping_donor_{$id}"); ?>" name="<?php echo esc_attr("btcpw_page_tipping_donor_{$id}"); ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div id="btcpw_page_button">
                            <div>
                                <input type="button" name="previous" class="page-previous-form" value="<?php echo esc_html__('< previous', 'btcpaywall'); ?>" />
                            </div>
                            <div>
                                <button type="submit" id="btcpw_page_tipping__button"><?php echo (!empty($atts['button_text']) ? esc_html__($atts['button_text'], 'btcpaywall') : 'Tip'); ?></button>
                            </div>
                        </div>
                    </fieldset>
                <?php endif; ?>
            </form>
        </div>
        <div id="powered_by">
            <p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
        </div>
    </div>
<?php

    return ob_get_clean();
}
add_shortcode('btcpw_tipping_page', 'btcpaywall_render_shortcode_page_tipping');


/**
 * @param $atts
 *
 * @return string
 */
function btcpaywall_render_shortcode_box_tipping($atts)
{

    $id = !empty($atts['id']) ? intval($atts['id']) : null;
    $form = new BTCPayWall_Tipping_Form($id);
    $result = json_decode(json_encode($form), true);

    $atts = shortcode_atts(array(
        'dimension' => $id ? $result['dimension'] : '250x300',
        'title' => $id ? $result['title_text'] : 'Support my work',
        'description' => $id ? $result['description_text'] : '',
        'currency' => $id ? $result['currency'] : 'SATS',
        'background_color' => $id ? '#' . $result['background_color'] : '#E6E6E6',
        'title_text_color' => $id ? '#' . $result['title_text_color'] : '#ffffff',
        'tipping_text' => $id ? $result['tipping_text'] : 'Enter Tipping Amount',
        'tipping_text_color' => $id ? '#' . $result['tipping_text_color'] : '#000000',
        'redirect' => $id ? $result['redirect'] : false,
        'description_color' => $id ? '#' . $result['description_text_color'] : '#000000',
        'button_text' => $id ? $result['button_text'] : 'Tipping now',
        'button_text_color' => $id ? '#' . $result['button_text_color'] : '#FFFFFF',
        'button_color' => $id ? '#' . $result['button_color'] : '#FE642E',
        'logo_id' => $id ? $result['logo'] : BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'background_id' => $id ? $result['background'] : '',
        'input_background' => $id ? '#' . $result['input_background'] : '#ffa500',
        'background' => $id ? '#' . $result['hf_background'] : '#1d5aa3',
        'widget' => 'false',
    ), $atts);

    $dimension = explode('x', ($atts['dimension'] == '250x300' ? '250x300' : '300x300'));

    $supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
    $logo = wp_get_attachment_image_src($atts['logo_id']) ? wp_get_attachment_image_src($atts['logo_id'])[0] : $atts['logo_id'];
    $background = wp_get_attachment_image_src($atts['background_id']) ? wp_get_attachment_image_src($atts['background_id'])[0] : $atts['background_id'];

    $is_widget = $atts['widget'] === 'true' ? 'btcpw_widget' : '';

    ob_start();
?>

    <style>
        .btcpw_tipping_box_container {
            background-color: <?php echo ($atts['background_color'] ? esc_html($atts['background_color']) : '');
                                ?>;
            width: <?php echo esc_html($dimension[0]) . 'px !important';
                    ?>;
            height: <?php echo esc_html($dimension[1]) . 'px !important';
                    ?>;
            background-image: url(<?php echo ($background ? esc_url($background) : '');
                                    ?>);

        }


        #btcpw_tipping__button {
            color: <?php echo esc_html($atts['button_text_color']);
                    ?>;
            background: <?php echo esc_html($atts['button_color']);
                        ?>;
        }

        #tipping_form_box fieldset div.btcpw_tipping_box_header_container div h4 {
            color: <?php echo esc_html($atts['title_text_color']);
                    ?>
        }



        .btcpw_tipping_box_header_container,
        #button {
            background-color: <?php echo esc_html($atts['background']);
                                ?>;
        }

        #tipping_form_box fieldset div p {
            color: <?php echo esc_html($atts['description_color']);
                    ?>
        }

        #tipping_form_box fieldset h4 {
            color: <?php echo esc_html($atts['tipping_text_color']);
                    ?>
        }

        .btcpw_tipping_free_input {
            background-color: <?php echo esc_html($atts['input_background']);
                                ?>;
        }
    </style>

    <div id="btcpw_page">
        <div class="btcpw_tipping_box_container">

            <form method="POST" action="" id="tipping_form_box">
                <fieldset>
                    <div class="btcpw_tipping_box_header_container">
                        <?php if ($logo) : ?>
                            <div id="btcpw_box_logo_wrap">
                                <img alt="Tipping logo" src="<?php echo esc_url($logo); ?>" />
                            </div>
                        <?php endif; ?>

                        <div>
                            <?php if (!empty($atts['title'])) : ?>
                                <h4><?php echo esc_html__($atts['title'], 'btcpaywall'); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($atts['description'])) : ?>
                                <p><?php echo esc_html__($atts['description'], 'btcpaywall'); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                    <h5><?php echo (!empty($atts['tipping_text']) ? esc_html__($atts['tipping_text'], 'btcpaywall') : ''); ?></h5>
                    <div class="btcpw_tipping_box_amount">

                        <div class=<?php echo esc_attr("btcpw_tipping_free_input $is_widget"); ?>">
                            <input type="number" id="btcpw_tipping_amount" name="btcpw_tipping_amount" placeholder="0.00" required />


                            <select required name="btcpw_tipping_currency" id="btcpw_tipping_currency">
                                <option disabled value="">Select currency</option>
                                <?php foreach ($supported_currencies as $currency) : ?>
                                    <option <?php echo $atts['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                        <?php echo esc_html($currency); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <i class="fas fa-arrows-alt-v"></i>

                        </div>
                        <div class="btcpw_tipping_converted_values">
                            <input type="text" id="btcpw_converted_amount" name="btcpw_converted_amount" readonly />
                            <input type="text" id="btcpw_converted_currency" name="btcpw_converted_currency" readonly />
                        </div>
                    </div>
                    <input type="hidden" id="btcpw_redirect_link" name="btcpw_redirect_link" value=<?php echo esc_attr($atts['redirect']); ?> />
                    <div id="button">

                        <button type="submit" id="btcpw_tipping__button"><?php echo (!empty($atts['button_text']) ? esc_html__($atts['button_text'], 'btcpaywall') : 'Tip'); ?></button>
                    </div>
                </fieldset>

            </form>
        </div>
        <div id="powered_by_box">
            <p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
        </div>
    </div>
<?php

    return ob_get_clean();
}
add_shortcode('btcpw_tipping_box', 'btcpaywall_render_shortcode_box_tipping');
/* function btcpaywall_render_shortcode_btcpw_pay_file_block($atts)
{
    if (btcpaywall_is_paid_content()) {
        return '';
    }

    $atts = shortcode_atts(array(
        'title' => '',
        'description' => '',
        'preview' => '',
        'link'    => true,
        'help_link' => 'https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/',
        'help_text'    => 'Text',
    ), $atts);
    $help = (filter_var($atts['link'], FILTER_VALIDATE_BOOLEAN));

    $image = wp_get_attachment_image_src($atts['preview']);

    $preview_url = $image ? $image[0] : $atts['preview'];

    ob_start();
    include BTCPAYWALL_PLUGIN_URL . 'templates/btc-pay-file-block.php';


    return ob_get_clean();
}
add_shortcode('btcpw_pay_file_block', 'btcpaywall_render_shortcode_btcpw_pay_file_block'); */
/**
 * @param $atts
 *
 * @return string
 */
/* function btcpaywall_render_shortcode_btcpw_pay_view_block($atts)
{
    if (btcpaywall_is_paid_content()) {
        return '';
    }

    $atts = shortcode_atts(array(
        'title' => '',
        'description' => '',
        'preview' => '',
        'background_color' => '#ECF0F1',
        'header_color' => '#000000',
        'info_color' => '#000000',
        'button_color' => '#000000',
        'button_txt' => '#FFFFFF',
        'link'    => 'true',
        'help_link' => 'https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/',
        'help_text'    => 'Help',
        'display_name' => get_option('btcpw_default_pay_per_view_display_name', false),
        'mandatory_name' => get_option('btcpw_default_pay_per_view_mandatory_name', false),
        'display_email' => get_option('btcpw_default_pay_per_view_display_email', false),
        'mandatory_email' => get_option('btcpw_default_pay_per_view_mandatory_email', false),
        'display_phone' => get_option('btcpw_default_pay_per_view_display_phone', false),
        'mandatory_phone' => get_option('btcpw_default_pay_per_view_mandatory_phone', false),
        'display_address' => get_option('btcpw_default_pay_per_view_display_address', false),
        'mandatory_address' => get_option('btcpw_default_pay_per_view_mandatory_address', false),
        'display_message' => get_option('btcpw_default_pay_per_view_display_message', false),
        'mandatory_message' => get_option('btcpw_default_pay_per_view_mandatory_message', false),
    ), $atts);

    $help = filter_var($atts['link'], FILTER_VALIDATE_BOOLEAN);


    $image = wp_get_attachment_image_src($atts['preview']);

    $preview_url = $image ? $image[0] : $atts['preview'];

    ob_start();
    include BTCPAYWALL_PLUGIN_URL . 'templates/btc-pay-view-block.php';



    return ob_get_clean();
}
add_shortcode('btcpw_pay_video_block', 'btcpaywall_render_shortcode_btcpw_pay_view_block'); */
/**
 * @param array $atts
 *
 * @return false|string
 */
function btcpaywall_render_shortcode_btcpw_start_content($atts)
{
    if (btcpaywall_is_paid_content()) {
        return '';
    }

    $atts = shortcode_atts(array(
        'pay_block' => 'false',
        'btc_format' => '',
        'price' => '',
        'currency' => '',
        'duration' => '',
        'duration_type' => '',
        'background_color' => '',
        'header_color' => '',
        'info_color' => '',
        'button_color' => '',
        'button_txt' => '',
        'link'    => true,
        'help_link'    => '',
        'help_text'    => 'Help',
        'display_name' => get_option('btcpw_default_pay_per_post_display_name', false),
        'mandatory_name' =>  get_option('btcpw_default_pay_per_post_mandatory_name', false),
        'display_email' => get_option('btcpw_default_pay_per_post_display_email', false),
        'mandatory_email' => get_option('btcpw_default_pay_per_post_mandatory_email', false),
        'display_phone' => get_option('btcpw_default_pay_per_post_display_phone', false),
        'mandatory_phone' => get_option('btcpw_default_pay_per_post_mandatory_phone', false),
        'display_address' =>  get_option('btcpw_default_pay_per_post_display_address', false),
        'mandatory_address' =>  get_option('btcpw_default_pay_per_post_mandatory_address', false),
        'display_message' =>  get_option('btcpw_default_pay_per_post_display_message', false),
        'mandatory_message' =>  get_option('btcpw_default_pay_per_post_mandatory_message', false),
    ), $atts);


    btcpaywall_update_meta_settings($atts);

    $invoice_content = array('title' => 'Pay-per-post: ' . get_the_title(get_the_ID()), 'project' => 'post');
    update_post_meta(get_the_ID(), 'btcpw_invoice_content', $invoice_content);
    $s_data = '<!-- btcpw:start_content -->';

    $payblock = filter_var($atts['pay_block'], FILTER_VALIDATE_BOOLEAN);

    if ($payblock) {
        ob_start();
        include(BTCPAYWALL_PLUGIN_DIR . 'templates/btc-pay-block.php');
        echo "{$s_data}";
        return ob_get_clean();
    }
}
add_shortcode('btcpw_start_content', 'btcpaywall_render_shortcode_btcpw_start_content');
/**
 * @param $atts
 *
 * @return false|string
 */

function btcpaywall_render_shortcode_btcpw_start_video($atts)
{
    if (btcpaywall_is_paid_content()) {
        return '';
    }
    $img_preview = plugin_dir_url(__FILE__) . 'img/preview.png';

    $atts = shortcode_atts(array(
        'pay_view_block' => 'false',
        'btc_format' => '',
        'title' => 'Untitled',
        'description' => 'No description',
        'preview' => $img_preview,
        'currency' => '',
        'price' => '',
        'duration' => '',
        'duration_type' => '',
        'background_color'    => '',
        'header_color' => '',
        'info_color' => '',
        'button_color' => '',
        'button_txt' => '',
        'link'    => 'true',
        'help_link'    => '',
        'help_text'    => 'Help',
        'display_name' => get_option('btcpw_default_pay_per_view_display_name', false),
        'mandatory_name' => get_option('btcpw_default_pay_per_view_mandatory_name', false),
        'display_email' => get_option('btcpw_default_pay_per_view_display_email', false),
        'mandatory_email' => get_option('btcpw_default_pay_per_view_mandatory_email', false),
        'display_phone' => get_option('btcpw_default_pay_per_view_display_phone', false),
        'mandatory_phone' => get_option('btcpw_default_pay_per_view_mandatory_phone', false),
        'display_address' => get_option('btcpw_default_pay_per_view_display_address', false),
        'mandatory_address' => get_option('btcpw_default_pay_per_view_mandatory_address', false),
        'display_message' => get_option('btcpw_default_pay_per_view_display_message', false),
        'mandatory_message' => get_option('btcpw_default_pay_per_view_mandatory_message', false),
    ), $atts);


    btcpaywall_update_meta_settings($atts);

    $invoice_content = array('title' => 'Pay-per-view: ' . sanitize_text_field($atts['title']), 'project' => 'view');
    update_post_meta(get_the_ID(), 'btcpw_invoice_content', $invoice_content);

    $payblock = filter_var($atts['pay_view_block'], FILTER_VALIDATE_BOOLEAN);



    $s_data = '<!-- btcpw:start_content -->';

    if ($payblock) {
        ob_start();
        include(BTCPAYWALL_PLUGIN_DIR . 'templates/btc-pay-view-block.php');
        echo "{$s_data}";
        return ob_get_clean();
    }
}
add_shortcode('btcpw_start_video', 'btcpaywall_render_shortcode_btcpw_start_video');

/**
 * @param array $atts
 *
 * @return string
 */
function btcpaywall_render_shortcode_btcpw_end_content($atts)
{

    return '<!-- /btcpw:end_content -->';
}
add_shortcode('btcpw_end_content', 'btcpaywall_render_shortcode_btcpw_end_content');
add_shortcode('btcpw_end_video', 'btcpaywall_render_shortcode_btcpw_end_content');
/**
 * @param $atts
 *
 * @return false|string
 */
function btcpaywall_render_shortcode_btcpw_pay_block($atts)
{
    if (btcpaywall_is_paid_content()) {
        return '';
    }

    $atts = shortcode_atts(array(
        'background_color' => '#ECF0F1',
        'header_color' => '#000000',
        'info_color' => '#000000',
        'button_color' => '#000000',
        'button_txt' => '#FFFFFF',
        'link'    => 'true',
        'help_link' => 'https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/',
        'help_text' => 'Help',
        'display_name' => get_option('btcpw_default_pay_per_post_display_name', false),
        'mandatory_name' =>  get_option('btcpw_default_pay_per_post_mandatory_name', false),
        'display_email' => get_option('btcpw_default_pay_per_post_display_email', false),
        'mandatory_email' => get_option('btcpw_default_pay_per_post_mandatory_email', false),
        'display_phone' => get_option('btcpw_default_pay_per_post_display_phone', false),
        'mandatory_phone' => get_option('btcpw_default_pay_per_post_mandatory_phone', false),
        'display_address' =>  get_option('btcpw_default_pay_per_post_display_address', false),
        'mandatory_address' =>  get_option('btcpw_default_pay_per_post_mandatory_address', false),
        'display_message' =>  get_option('btcpw_default_pay_per_post_display_message', false),
        'mandatory_message' =>  get_option('btcpw_default_pay_per_post_mandatory_message', false),
    ), $atts);
    $help = filter_var($atts['link'], FILTER_VALIDATE_BOOLEAN);
    ob_start();

    include(BTCPAYWALL_PLUGIN_DIR . 'templates/btc-pay-block.php');

    return ob_get_clean();
}
add_shortcode('btcpw_pay_block', 'btcpaywall_render_shortcode_btcpw_pay_block');




/**
 * 
 */
function btcpaywall_render_checkout()
{
    $products = BTCPayWall()->cart->get_contents();
    $total = btcpaywall_get_total() . ' ' . get_option('btcpw_default_pay_per_file_currency', 'SATS');

    $collect_atts = array(
        'display_name' =>  get_option('btcpw_default_pay_per_file_display_name', false),
        'display_email' =>  get_option('btcpw_default_pay_per_file_display_email', false),
        'display_phone' =>  get_option('btcpw_default_pay_per_file_display_phone', false),
        'display_address' =>  get_option('btcpw_default_pay_per_file_display_address', false),
        'display_message' =>  get_option('btcpw_default_pay_per_file_display_message', false),
        'mandatory_name' =>  get_option('btcpw_default_pay_per_file_mandatory_name', false),
        'mandatory_email' =>  get_option('btcpw_default_pay_per_file_mandatory_email', false),
        'mandatory_address' =>  get_option('btcpw_default_pay_per_file_mandatory_address', false),
        'mandatory_phone' =>  get_option('btcpw_default_pay_per_file_mandatory_phone', false),
        'mandatory_message' =>  get_option('btcpw_default_pay_per_file_mandatory_message', false)
    );
    $collect = btcpaywall_get_collect($collect_atts);

    $collect_data = btcpaywall_display_is_enabled($collect);
    $button_color = get_option('btcpw_pay_per_file_button_color', '#f6b330');
    $button_text_color = get_option('btcpw_pay_per_file_button_text_color', '#FFFFFF');
?>
    <table id="btcpaywall_checkout_cart">
        <thead>
            <tr class="btcpaywall_cart_header_row">

                <th class="btcpaywall_cart_item_name"><?php echo esc_html__('Item Name', 'btcpaywall'); ?></th>
                <th class="btcpaywall_cart_item_price"><?php echo esc_html__('Item Price', 'btcpaywall'); ?></th>
                <th class="btcpaywall_cart_actions"><?php echo esc_html__('Actions', 'btcpaywall'); ?></th>
            </tr>
        </thead>
        <tbody>

            <?php if ($products) : ?>
                <?php foreach ($products as $key => $item) : ?>
                    <tr class="btcpaywall_cart_item" id="btcpaywall_cart_item_<?php echo esc_attr($key) . '_' . esc_attr($item['id']); ?>" data-download-id="<?php echo esc_attr($item['id']); ?>">

                        <td class="btcpaywall_cart_item_name">
                            <span class="btcpaywall_checkout_cart_item_title"><?php echo esc_html__(btcpaywall_get_cart_item_name($item), 'btcpaywall'); ?></span>
                        </td>
                        <td class="btcpaywall_cart_item_price">
                            <span><?php
                                    echo esc_html__(btcpaywall_cart_item_price($item['id']), 'btcpaywall'); ?></span>

                        </td>
                        <td class="btcpaywall_cart_actions">
                            <a data-cart-key="<?php echo esc_attr($key); ?>" class="btcpaywall_cart_remove_item_btn" href="#"><?php echo esc_html__('Remove', 'btcpaywall'); ?></a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
        <tfoot>
            <tr class="btcpaywall_cart_footer_row">
                <th colspan="3">
                    Total: <?php echo esc_html($total); ?>
                </th>
            </tr>
        </tfoot>
    </table>
    <?php if ($collect_data == true) : ?>
        <div id="btcpw_digital_download_customer_info">
            <h2>Personal Info</h2>
            <form method="POST" action="" id="btcpw_digital_download_form">
                <fieldset>
                    <div class="btcpw_digital_download_customer_information">
                        <?php foreach ($collect as $key => $value) : ?>
                            <?php if ($collect[$key]['display'] === true) : ?>
                                <?php $id = $collect[$key]['id'];
                                $label = $collect[$key]['label'];
                                $type = $collect[$key]['type'];
                                ?>
                                <div class="<?php echo esc_attr("btcpw_digital_download_customer_{$id}_wrap"); ?>">
                                    <?php if ($id !== 'message') : ?>
                                        <label for="<?php echo esc_attr("btcpw_digital_download_customer_{$id}"); ?>"><?php echo esc_html__($label, 'btcpaywall'); ?></label>
                                        <input type="<?php echo esc_attr($type); ?>" id="<?php echo esc_attr("btcpw_digital_download_customer_{$id}"); ?>" name="<?php echo esc_attr("btcpw_digital_download_customer_{$id}"); ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />
                                    <?php else : ?>
                                        <label for="<?php echo esc_attr("btcpw_digital_download_customer_{$id}"); ?>"><?php echo esc_html__($label, 'btcpaywall'); ?></label>
                                        <textarea type="<?php echo esc_attr($type); ?>" id="<?php echo esc_attr("btcpw_digital_download_customer_{$id}"); ?>" name="<?php echo esc_attr("btcpw_digital_download_customer_{$id}"); ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> /></textarea>
                                    <?php endif; ?>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="btcpw_digital_download_button" id="btcpw_digital_download_button">
                        <div>
                            <button type="submit" style="<?php echo esc_attr("background-color: " . $button_color . ';' . "color: " . $button_text_color . ';'); ?>" data-post_id="<?php echo esc_attr(get_the_ID()); ?>" class="btcpw_digital_download"><?php echo esc_html__('Pay', 'btcpaywall'); ?></button>
                        </div>
                    </div>
                </fieldset>


            </form>
        </div>
    <?php else : ?>
        <div>
            <form method="POST" action="" id="btcpw_digital_download_form">
                <div class="btcpw_digital_download_button" id="btcpw_digital_download_button">
                    <div>
                        <button type="submit" style="<?php echo esc_attr("background-color: " . $button_color . ';' . "color: " . $button_text_color . ';'); ?>" data-post_id="<?php echo esc_attr(get_the_ID()); ?>" class="btcpw_digital_download"><?php echo esc_html__('Pay', 'btcpaywall'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    <?php endif; ?>

<?php
}

add_shortcode('btcpaywall_checkout', 'btcpaywall_render_checkout');


function btcpaywall_render_receipt()
{

    //$payment = new BTCPayWall_Payment(sanitize_text_field($_SESSION['btcpaywall_purchase']));
    $payment = new BTCPayWall_Payment(sanitize_text_field($_COOKIE['btcpaywall_purchase']));
    $currency = get_option('btcpw_default_pay_per_file_currency', 'SATS');
    $download_ids = explode(',', $payment->download_ids);
    $download_links = explode(',', $payment->download_links);
    $customer = new BTCPayWall_Customer($payment->customer_id);
?>
    <p>Hello<?php echo esc_html($customer->full_name ? ' ' . $customer->full_name : ''); ?>,</p>
    <p><?php echo esc_html__('Thank you for your purchase. You can see payment details in the table below.', 'btcpaywall'); ?></p>
    <table id="btcpaywall_purchase_receipt" class="btcpaywall-table">
        <thead>
            <tr>
                <th colspan="2"><strong><?php echo esc_html__('Payment Information', 'btcpaywall'); ?></strong></th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td class="btcpaywall_receipt_payment_status"><strong><?php echo esc_html__('Payment Status', 'btcpaywall'); ?>:</strong></td>
                <td class="btcpaywall_receipt_payment_status <?php echo esc_attr($payment->status); ?>"><?php echo esc_html__($payment->status, 'btcpaywall'); ?></td>
            </tr>
            <tr>
                <td><strong><?php echo esc_html__('Payment ID', 'btcpaywall'); ?>:</strong></td>
                <td><?php echo esc_html($payment->id); ?></td>
            </tr>
            <tr>
                <td><strong><?php echo esc_html__('Invoice ID', 'btcpaywall'); ?>:</strong></td>
                <td><?php echo esc_html($payment->invoice_id); ?></td>
            </tr>
            <tr>
                <td><strong><?php echo esc_html__('Type', 'btcpaywall'); ?>:</strong></td>
                <td><?php echo esc_html($payment->revenue_type); ?></td>
            </tr>
            <?php $download_ids = explode(',', $payment->download_ids); ?>
            <tr>
                <td><strong>Products</strong></td>
                <td>
                    <ul><?php foreach ($download_ids as $id) : ?>
                            <?php $download = new BTCPayWall_Digital_Download($id); ?><li><?php echo esc_html($download->get_name()); ?></li><?php endforeach; ?></ul>
                </td>
            </tr>
            <tr>
                <td><strong><?php echo esc_html__('Payment Method', 'btcpaywall'); ?>:</strong></td>
                <td><?php echo esc_html($payment->payment_method ? $payment->payment_method : 'BTC'); ?></td>
            </tr>
            <tr>
                <td><strong><?php echo esc_html__('Date', 'btcpaywall'); ?>:</strong></td>
                <td><?php echo esc_html($payment->date_created); ?></td>
            </tr>
            <tr>
                <td><strong><?php echo esc_html__('Total Price', 'btcpaywall'); ?>:</strong></td>
                <td><?php echo esc_html(btcpaywall_round_amount($currency, $payment->amount) . ' ' . $currency); ?></td>
            </tr>

        </tbody>
    </table>
    <?php if (!empty($customer)) : ?>
        <table class="btcpaywall-table">
            <thead>
                <tr>
                    <th colspan="2"><strong><?php echo esc_html__("Your Data", 'btcpaywall'); ?></strong></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer as $key => $value) : ?>
                    <?php if ($key != 'id') : ?>
                        <?php if (!empty($value)) : ?>
                            <?php if ($key == 'full_name') : ?>
                                <?php $key = 'name'; ?>
                            <?php endif; ?>
                            <tr>
                                <td><strong><?php echo esc_html__(ucfirst($key), 'btcpaywall'); ?></strong></td>
                                <td><?php echo (esc_html__($value, 'btcpaywall')); ?></td>
                            </tr>

                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?php if ($download_links) : ?>
            <div>
                <p>
                    You can download file/s by clicking on the button/s bellow.
                </p>
                <ul>
                    <?php foreach ($download_links as $key => $link) : ?>
                        <?php $product = new BTCPayWall_Digital_Download($download_ids[$key]);
                        $name = $product->get_name(); ?>
                        <li> <a href="<?php echo esc_url($link); ?>" target="_blank"><?php echo esc_html__($name, 'btcpaywall'); ?></a> </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php
}

add_shortcode('btcpaywall_receipt', 'btcpaywall_render_receipt');
