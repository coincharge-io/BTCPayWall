<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Tipping_Banner_High
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
class Tipping_Banner_High extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'tipping-banner-high',
            'BTCPW Tipping Banner High'
        );
    }

    public function widget($args, $instance)
    {
        $dimension = explode('x', '200x450');
        $supported_currencies = BTCPayWall::CURRENCIES;
        $logo = wp_get_attachment_image_src($instance['logo_id']) ? wp_get_attachment_image_src($instance['logo_id'])[0] : $instance['logo_id'];
        $background = wp_get_attachment_image_src($instance['background_id']) ? wp_get_attachment_image_src($instance['background_id'])[0] : $instance['background_id'];
        $collect = btcpaywall_get_collect($instance);
        $collect_d = btcpaywall_display_is_enabled($collect);

        $collect_data = filter_var($collect_d, FILTER_VALIDATE_BOOLEAN);
        $fixed_amount = btcpaywall_get_fixed_amount($instance);
        $free_input = filter_var($instance['free_input'], FILTER_VALIDATE_BOOLEAN);
        $first_enabled = array_column($fixed_amount, 'enabled');
        $d = array_search('true', $first_enabled);
        $index = 'value' . ($d + 1);
?>
        <style>
            .btcpw_widget.btcpw_skyscraper_tipping_container.high {
                background-color: <?php echo ($instance['background_color'] ? esc_html($instance['background_color']) : '');
                                    ?>;
                background-image: url(<?php echo ($background ? esc_url($background) : '');
                                        ?>);
            }

            #btcpw_widget_btcpw_skyscraper_tipping__button_high {
                color: <?php echo esc_html($instance['button_text_color']);
                        ?>;
                background: <?php echo esc_html($instance['button_color']);
                            ?>;
            }

            #btcpw_widget_btcpw_skyscraper_tipping__button_high:hover {
                background: <?php echo esc_html($instance['button_color_hover']);
                            ?>;
            }

            #btcpw_widget_btcpw_skyscraper_button_high .btcpw_widget.skyscraper-next-form.high {
                color: <?php echo esc_html($instance['continue_button_text_color']);
                        ?>;
                background: <?php echo esc_html($instance['continue_button_color']);
                            ?>;
            }

            #btcpw_widget_btcpw_skyscraper_button_high .btcpw_widget.skyscraper-next-form.high:hover {
                background: <?php echo esc_html($instance['continue_button_color_hover']);
                            ?>;
            }

            #btcpw_widget_btcpw_skyscraper_button_high .btcpw_widget.skyscraper-previous-form.high {
                color: <?php echo esc_html($instance['previous_button_text_color']);
                        ?>;
                background: <?php echo esc_html($instance['previous_button_color']);
                            ?>;
            }

            #btcpw_widget_btcpw_skyscraper_button_high .btcpw_widget.skyscraper-previous-form.high:hover {
                background: <?php echo esc_html($instance['previous_button_color_hover']);
                            ?>;
            }

            .btcpw_widget.btcpw_skyscraper_header_container.high,
            #btcpw_widget_btcpw_skyscraper_button_high {
                background-color: <?php echo esc_html($instance['hf_color']);
                                    ?>;
            }

            .btcpw_widget.btcpw_skyscraper_header_container.high h3 {
                color: <?php echo esc_html($instance['title_text_color']);
                        ?>
            }

            .btcpw_widget.btcpw_skyscraper_tipping_container.info_container.high {
                display: <?php echo (empty($instance['description'])) ? 'none' : 'block';
                            ?>
            }

            .btcpw_widget.btcpw_skyscraper_info_container.high p,
            div.btcpw_widget.btcpw_skyscraper_banner.wide>div.btcpw_widget.btcpw_skyscraper_header_container.high p {
                color: <?php echo esc_html($instance['description_color']);
                        ?>
            }

            .btcpw_widget.btcpw_skyscraper_tipping_info.high fieldset h4,
            .btcpw_widget.btcpw_skyscraper_tipping_info.high h3,
            #btcpw_widget_skyscraper_tipping_form_high>fieldset:nth-child(1)>h4 {
                color: <?php echo esc_html($instance['tipping_text_color']);
                        ?>
            }

            .btcpw_widget.btcpw_skyscraper_amount_value_1.high,
            .btcpw_widget.btcpw_skyscraper_amount_value_2.high,
            .btcpw_widget.btcpw_skyscraper_amount_value_3.high,
            .btcpw_widget.btcpw_skyscraper_tipping_free_input.high {
                background-color: <?php echo esc_html($instance['fixed_background'] . ' !important');
                                    ?>;
                border: <?php echo !empty($instance['selected_amount_background']) ? esc_html('3px solid ' . $instance['selected_amount_background']) : '#000';
                        ?>;
            }

            .btcpw_widget.btcpw_skyscraper_amount_value_1.high.selected,
            .btcpw_widget.btcpw_skyscraper_amount_value_2.high.selected,
            .btcpw_widget.btcpw_skyscraper_amount_value_3.high.selected {
                background-color: <?php echo !empty($instance['selected_amount_background']) ? esc_html($instance['selected_amount_background'] . ' !important') : '#000';
                                    ?>;
                border: <?php echo esc_html('3px solid' . $instance['fixed_background']);
                        ?>;
            }

            .btcpw_widget.btcpw_skyscraper_amount_value_1.high label,
            .btcpw_widget.btcpw_skyscraper_amount_value_2.high label,
            .btcpw_widget.btcpw_skyscraper_amount_value_3.high label,
            .btcpw_widget.btcpw_skyscraper_tipping_free_input.high select,
            .btcpw_widget.btcpw_widget.btcpw_skyscraper_amount_value_1.high i,
            .btcpw_widget.btcpw_skyscraper_amount_value_2.high i,
            .btcpw_widget.btcpw_skyscraper_amount_value_3.high i,
            .btcpw_widget.btcpw_skyscraper_tipping_free_input.high i {
                color: <?php echo esc_html($instance['selected_amount_background'] . ' !important'); ?>;
            }


            .btcpw_widget.btcpw_skyscraper_amount_value_1.high.selected label,
            .btcpw_widget.btcpw_skyscraper_amount_value_2.high.selected label,
            .btcpw_widget.btcpw_skyscraper_amount_value_3.high.selected label,
            .btcpw_widget.btcpw_skyscraper_tipping_free_input.high.selected select,
            .btcpw_widget.btcpw_skyscraper_amount_value_1.high.selected i,
            .btcpw_widget.btcpw_skyscraper_amount_value_2.high.selected i,
            .btcpw_widget.btcpw_skyscraper_amount_value_3.high.selected i,
            .btcpw_widget.btcpw_skyscraper_tipping_free_input.high.selected i {
                color: <?php echo esc_html($instance['fixed_background'] . ' !important'); ?>;
            }
        </style>
        <div id="btcpw_page">
            <div class="btcpw_widget btcpw_skyscraper_banner high">
                <div class="btcpw_widget btcpw_skyscraper_header_container high">
                    <?php if ($logo) : ?>
                        <div id="btcpw_skyscraper_logo_wrap_high">
                            <img alt="Tipping logo" src=<?php echo esc_url($logo); ?> />
                        </div>
                    <?php endif; ?>
                    <div>
                        <?php if (!empty($instance['title'])) : ?>
                            <h3><?php echo esc_html($instance['title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($instance['description'])) : ?>
                            <p><?php echo esc_html(($instance['description'])); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="btcpw_widget btcpw_skyscraper_tipping_container high">
                    <form method="POST" action="" id="btcpw_widget_skyscraper_tipping_form_high">
                        <fieldset>
                            <h4><?php echo (!empty($instance['tipping_text']) ? esc_html__($instance['tipping_text'], 'btcpaywall') : ''); ?>
                            </h4>
                            <div class="btcpw_widget btcpw_skyscraper_amount high">
                                <?php foreach ($fixed_amount as $key => $value) : ?>
                                    <?php if ($fixed_amount[$key]['enabled'] === true) : ?>
                                        <div class="<?php echo esc_attr("btcpw_widget btcpw_skyscraper_amount_{$key} high"); ?>">
                                            <div>
                                                <input type="radio" class="btcpw_widget btcpw_skyscraper_tipping_default_amount high" id="<?php echo esc_attr("btcpw_widget_{$key}_high"); ?>" name="btcpw_widget_btcpw_skyscraper_tipping_default_amount_high" <?php echo $key == $index ? 'required' : ''; ?> value="<?php echo esc_attr($fixed_amount[$key]['amount']) . ' ' . esc_attr($fixed_amount[$key]['currency']); ?>">
                                                <?php if (!empty($fixed_amount[$key]['amount'])) : ?>
                                                    <i class="<?php echo esc_attr($fixed_amount[$key]['icon']); ?>"></i>
                                                <?php endif; ?>
                                            </div>
                                            <label for="<?php echo esc_attr($key); ?>"><?php echo esc_attr($fixed_amount[$key]['amount']) . ' ' . esc_attr($fixed_amount[$key]['currency']); ?></label>

                                        </div>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                                <?php if (true === $free_input) : ?>
                                    <div class="btcpw_widget btcpw_skyscraper_tipping_free_input high">
                                        <input type="number" id="btcpw_widget_btcpw_skyscraper_tipping_amount_high" name="btcpw_widget_btcpw_skyscraper_tipping_amount_high" placeholder="0.00" required />


                                        <select required name="btcpw_widget_btcpw_skyscraper_tipping_currency_high" id="btcpw_widget_btcpw_skyscraper_tipping_currency_high" ; ?>">
                                            <option disabled value="">Select currency</option>
                                            <?php foreach ($supported_currencies as $currency) : ?>
                                                <option <?php echo $instance['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                                    <?php echo esc_html($currency); ?>
                                                <?php endforeach; ?>
                                        </select>
                                        <i class="fas fa-arrows-alt-v"></i>
                                    <?php endif; ?>
                                    </div>

                            </div>
                            <div class="btcpw_widget btcpw_skyscraper_tipping_converted_values high">
                                <input type="text" id="btcpw_widget_btcpw_skyscraper_converted_amount_high" name="btcpw_widget_btcpw_skyscraper_converted_amount_high" readonly />
                                <input type="text" id="btcpw_widget_btcpw_skyscraper_converted_currency_high" name="btcpw_widget_btcpw_skyscraper_converted_currency_high" readonly />
                            </div>


                            <div id="btcpw_widget_btcpw_skyscraper_button_high">
                                <input type="hidden" id="btcpw_widget_btcpw_skyscraper_redirect_link_high" name="btcpw_widget_btcpw_skyscraper_redirect_link_high" value=<?php echo esc_attr($instance['redirect']); ?> />
                                <?php if ($collect_data === true) : ?>
                                    <div>
                                        <input type="button" name="next" class="btcpw_widget skyscraper-next-form high" value="<?php echo (!empty($instance['continue_button_text']) ? esc_attr__($instance['continue_button_text'], 'btcpaywall') : 'Continue'); ?>" />
                                    </div>
                                <?php else : ?>
                                    <div>
                                        <button type="submit" id="btcpw_widget_btcpw_skyscraper_tipping__button_high"><?php echo (!empty($instance['button_text']) ? esc_html__($instance['button_text'], 'btcpaywall') : 'Tip'); ?></button>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </fieldset>
                        <?php if ($collect_data) : ?>
                            <fieldset>
                                <div class="btcpw_widget btcpw_skyscraper_donor_information high">
                                    <?php foreach ($collect as $key => $value) : ?>
                                        <?php if ($collect[$key]['display'] === true) : ?>
                                            <?php $label = $collect[$key]['label'];
                                            $id = $collect[$key]['id'];
                                            $type = $collect[$key]['type']; ?>
                                            <div class="<?php echo esc_attr("btcpw_widget btcpw_skyscraper_tipping_donor_{$id}_wrap high"); ?>">
                                                <label for="<?php echo esc_attr("btcpw_widget_btcpw_skyscraper_tipping_donor_{$id}_high"); ?>"><?php echo esc_html__($label, 'btcpaywall'); ?></label>
                                                <input type="<?php echo esc_attr($type); ?>" id="<?php echo esc_attr("btcpw_widget_btcpw_skyscraper_tipping_donor_{$id}_high"); ?>" name="<?php echo esc_attr("btcpw_widget_btcpw_skyscraper_tipping_donor_{$id}_high"); ?>" <?php echo $collect[$key]['mandatory'] === true ? 'required' : ''; ?> />

                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div id="btcpw_widget_btcpw_skyscraper_button_high">
                                    <div>
                                        <input type="button" name="previous" class="btcpw_widget skyscraper-previous-form high" value="<?php echo (!empty($instance['previous_button_text']) ? esc_attr__($instance['previous_button_text'], 'btcpaywall') : 'Previous'); ?>" />
                                    </div>
                                    <div>
                                        <button type="submit" id="btcpw_widget_btcpw_skyscraper_tipping__button_high"><?php echo (!empty($instance['button_text']) ? esc_html__($instance['button_text'], 'btcpaywall') : 'Tip'); ?></button>
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
    }

    public function form($instance)
    {
        $dimensions = array('160x600', '600x160');
        $supported_currencies = BTCPayWall::CURRENCIES;
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Support my work', 'btcpaywall');

        $description = !empty($instance['description']) ? $instance['description'] : esc_html__('', 'btcpaywall');

        $currency = !empty($instance['currency']) ? $instance['currency'] : esc_html__('SATS', 'btcpaywall');

        $background_color = !empty($instance['background_color']) ? $instance['background_color'] : esc_html__(
            '#E6E6E6',
            'btcpaywall'
        );
        $title_text_color = !empty($instance['title_text_color']) ? $instance['title_text_color'] : esc_html__(
            '#ffffff',
            'btcpaywall'
        );

        $tipping_text = !empty($instance['tipping_text']) ? $instance['tipping_text'] : esc_html__(
            'Enter Tipping Amount',
            'btcpaywall'
        );
        $tipping_text_color = !empty($instance['tipping_text_color']) ? $instance['tipping_text_color'] : esc_html__(
            '#000000',
            'btcpaywall'
        );
        $redirect = !empty($instance['redirect']) ? $instance['redirect'] : esc_html__('', 'btcpaywall');
        $amount = !empty($instance['amount']) ? $instance['amount'] : esc_html__('', 'btcpaywall');
        $description_color = !empty($instance['description_color']) ? $instance['description_color'] : esc_html__(
            '#000000',
            'btcpaywall'
        );

        $button_text = !empty($instance['button_text']) ? $instance['button_text'] : esc_html__('Tipping now', 'btcpaywall');
        $button_text_color = !empty($instance['button_text_color']) ? $instance['button_text_color'] : esc_html__(
            '#FFFFFF',
            'btcpaywall'
        );

        $button_color = !empty($instance['button_color']) ? $instance['button_color'] : esc_html__('#FE642E', 'btcpaywall');

        $button_color_hover = !empty($instance['button_color_hover']) ? $instance['button_color_hover'] : '#e45a29j';

        $logo_id = !empty($instance['logo_id']) ? $instance['logo_id'] : BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png';


        $background_id = !empty($instance['background_id']) ? $instance['background_id'] : esc_html__('', 'btcpaywall');

        $logo = wp_get_attachment_image_src($logo_id);
        $background = wp_get_attachment_image_src($background_id);

        $display_name = !empty($instance['display_name']) ? $instance['display_name'] : esc_html__('true', 'btcpaywall');
        $mandatory_name = !empty($instance['mandatory_name']) ? $instance['mandatory_name'] : esc_html__(
            'false',
            'btcpaywall'
        );

        $display_email = !empty($instance['display_email']) ? $instance['display_email'] : esc_html__('true', 'btcpaywall');
        $mandatory_email = !empty($instance['mandatory_email']) ? $instance['mandatory_email'] : esc_html__(
            'false',
            'btcpaywall'
        );

        $display_address = !empty($instance['display_address']) ? $instance['display_address'] : esc_html__(
            'true',
            'btcpaywall'
        );
        $mandatory_address = !empty($instance['mandatory_address']) ? $instance['mandatory_address'] : esc_html__(
            'false',
            'btcpaywall'
        );

        $display_phone = !empty($instance['display_phone']) ? $instance['display_phone'] : esc_html__('true', 'btcpaywall');
        $mandatory_phone = !empty($instance['mandatory_phone']) ? $instance['mandatory_phone'] : esc_html__(
            'false',
            'btcpaywall'
        );

        $display_message = !empty($instance['display_message']) ? $instance['display_message'] : esc_html__(
            'true',
            'btcpaywall'
        );
        $mandatory_message = !empty($instance['mandatory_message']) ? $instance['mandatory_message'] : esc_html__(
            'false',
            'btcpaywall'
        );

        $value1_enabled = !empty($instance['value1_enabled']) ? $instance['value1_enabled'] : esc_html__('true', 'btcpaywall');
        $value1_amount = !empty($instance['value1_amount']) ? $instance['value1_amount'] : esc_html__('1000', 'btcpaywall');
        $value1_icon = !empty($instance['value1_icon']) ? $instance['value1_icon'] : 'fas fa-coffee';
        $value1_currency = !empty($instance['value1_currency']) ? $instance['value1_currency'] : esc_html__('', 'btcpaywall');

        $value2_enabled = !empty($instance['value2_enabled']) ? $instance['value2_enabled'] : esc_html__('true', 'btcpaywall');
        $value2_amount = !empty($instance['value2_amount']) ? $instance['value2_amount'] : esc_html__('2000', 'btcpaywall');
        $value2_icon = !empty($instance['value2_icon']) ? $instance['value2_icon'] : 'fas fa-beer';
        $value2_currency = !empty($instance['value2_currency']) ? $instance['value2_currency'] : esc_html__('', 'btcpaywall');

        $value3_enabled = !empty($instance['value3_enabled']) ? $instance['value3_enabled'] : esc_html__('true', 'btcpaywall');
        $value3_amount = !empty($instance['value3_amount']) ? $instance['value3_amount'] : esc_html__('3000', 'btcpaywall');
        $value3_icon = !empty($instance['value3_icon']) ? $instance['value3_icon'] : 'fas fa-cocktail';
        $value3_currency = !empty($instance['value3_currency']) ? $instance['value3_currency'] : esc_html__('', 'btcpaywall');

        $free_input = !empty($instance['free_input']) ? $instance['free_input'] : esc_html__('true', 'btcpaywall');

        $fixed_background = !empty($instance['fixed_background']) ? $instance['fixed_background'] : esc_html__(
            '#ffa500',
            'btcpaywall'
        );
        $selected_amount_background = !empty($instance['selected_amount_background']) ? $instance['selected_amount_background'] : "#000";

        $hf_color = !empty($instance['hf_color']) ? $instance['hf_color'] : esc_html__('#1d5aa3', 'btcpaywall');

        $continue_button_text = !empty($instance['continue_button_text']) ? $instance['continue_button_text'] : esc_html__('Continue', 'btcpaywall');
        $continue_button_text_color = !empty($instance['continue_button_text_color']) ? $instance['continue_button_text_color'] : '#FFFFFF';

        $continue_button_color = !empty($instance['continue_button_color']) ? $instance['continue_button_color'] : '#FE642E';
        $continue_button_color_hover = !empty($instance['continue_button_color_hover']) ? $instance['continue_button_color_hover'] : '#FFF';

        $previous_button_text = !empty($instance['previous_button_text']) ? $instance['previous_button_text'] : esc_html__('Previous', 'btcpaywall');
        $previous_button_text_color = !empty($instance['previous_button_text_color']) ? $instance['previous_button_text_color'] : '#FFFFFF';

        $previous_button_color = !empty($instance['previous_button_color']) ? $instance['previous_button_color'] : '#2d5aa3';
        $previous_button_color_hover = !empty($instance['previous_button_color_hover']) ? $instance['previous_button_color_hover'] : '#FFF';

    ?>
        <style>
            .row {
                display: flex;
                flex-direction: row;
                padding: 10px;
                border: 1px solid #DCDCDC;
            }

            .col-20 {
                flex: 1;
                margin-top: 8px;
            }

            .col-80 {
                flex: 4;
                margin-top: 8px;
            }

            .col-50 {
                margin-top: 8px;
                flex: 0.4;
                display: flex;
            }

            .col-50.fixed-amount {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .col-50.fixed-amount>* {
                margin: 3px 0;
            }

            .col-fixed {
                display: flex;
                flex-direction: column;
            }

            .tipping_banner.high textarea {
                width: auto;
                height: 80px;
                padding: 6px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                resize: vertical;
                vertical-align: middle;

            }

            .container_predefined_amount input:not([type='checkbox']),
            .container_predefined_amount select {
                width: 70px !important;
            }

            .tipping_banner.high label {
                display: inline-block;
                width: 70px;
            }

            .tipping_banner.high input {
                max-width: 120px;
            }
        </style>
        <div class="tipping_banner high">
            <h1>Tipping</h1>
            <div class="row">

                <p>200x710</p>

            </div>
            <div class="row">
                <label for="<?php echo esc_attr($this->get_field_id('currency')); ?>"><?php echo esc_html__('Currency', 'btcpaywall'); ?></label>
                <select required id="<?php echo esc_attr($this->get_field_id('currency')); ?>" name="<?php echo esc_attr($this->get_field_name('currency')); ?>">
                    <option disabled value=""><?php echo esc_html__('Select currency', 'btcpaywall'); ?></option>
                    <?php foreach ($supported_currencies as $curr) : ?>
                        <option <?php echo $currency === $curr ? 'selected' : ''; ?> value="<?php echo esc_attr($curr); ?>">
                            <?php echo esc_html($curr); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row">
                <label for="<?php echo esc_attr($this->get_field_id('free_input')); ?>">Free input of amount</label>
                <input id="<?php echo esc_attr($this->get_field_id('free_input')); ?>" name="<?php echo esc_attr($this->get_field_name('free_input')); ?>" type="checkbox" <?php echo $free_input === 'true' ? 'checked' : ''; ?> value="true" />
            </div>
            <div class="row">
                <div>
                    <label for="<?php echo esc_attr($this->get_field_id('redirect')); ?>"><?php echo esc_html__('Link to Thank you page', 'btcpaywall'); ?></label>
                </div>
                <div>
                    <input id=" <?php echo esc_attr($this->get_field_id('redirect')); ?>" name="<?php echo esc_attr($this->get_field_name('redirect')); ?>" class="widget-tipping-basic_redirect" type="text" value="<?php echo esc_attr($redirect); ?>" />
                </div>
            </div>
            <h3><?php echo esc_html__('Global', 'btcpaywall'); ?></h3>

            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('background_image')); ?>"><?php echo esc_html__('Background image', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <?php if ($background) : ?>
                        <button id="btcpw_tipping_button_image_background_banner_high" class="widget-tipping-basic-upload_box_image_high" name="btcpw_tipping_button_image_background"><img width="100" height="100" alt="Tipping banner high background" src="<?php echo esc_url($background[0]); ?>" /></a></button>
                        <button type="button" class="widget-tipping-basic-remove_box_image_high">
                            <?php echo esc_html__('Remove', 'btcpaywall'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-background_id_high" id="<?php echo esc_attr($this->get_field_id('background_id')); ?>" name="<?php echo esc_attr($this->get_field_name('background_id')); ?>" type="text" value="<?php echo esc_attr($background_id); ?>" />
                    <?php else : ?>
                        <button id="btcpw_tipping_button_image_background_banner_high" class="widget-tipping-basic-upload_box_image_high" name="btcpw_tipping_button_image_background"><?php echo esc_html__('Upload', 'btcpaywall'); ?></button>
                        <button type="button" class="widget-tipping-basic-remove_box_image_high" style="display:none"><?php echo esc_html__('Remove', 'btcpaywall'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-background_id_high" id="<?php echo esc_attr($this->get_field_id('background_id')); ?>" name="<?php echo esc_attr($this->get_field_name('background_id')); ?>" type="text" value="<?php echo esc_attr($background_id); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('background_color')); ?>"><?php echo esc_html__('Background color', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('background_color')); ?>" class="widget-tipping-basic-background_color_high" name="<?php echo esc_attr($this->get_field_name('background_color')); ?>" type="text" value="<?php echo esc_attr($background_color); ?>" type="text" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('hf_color')); ?>"><?php echo esc_html__('Header and footer background color', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('hf_color')); ?>" class="widget-tipping-basic-hf_color_high" name="<?php echo esc_attr($this->get_field_name('hf_color')); ?>" type="text" value="<?php echo esc_attr($hf_color); ?>" />
                </div>
            </div>
            <h3><?php echo esc_html__('Header', 'btcpaywall'); ?></h3>

            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('logo')); ?>"><?php echo esc_html__('Tipping logo', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <?php if ($logo) : ?>
                        <button id="btcpw_tipping_button_logo_banner_high" class="widget-tipping-basic-upload_box_logo_high" name="btcpw_tipping_button_image"><img width="100" height="100" alt="Tipping banner high logo" src="<?php echo esc_url($logo[0]); ?>" /></a></button>
                        <button type="button" class="widget-tipping-basic-remove_box_image_high"><?php echo esc_html__('Remove', 'btcpaywall'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-logo_id_high" id="<?php echo esc_attr($this->get_field_id('logo_id')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_id')); ?>" type="text" value="<?php echo esc_attr($logo_id); ?>" />
                    <?php else : ?>
                        <button id="btcpw_tipping_button_logo_banner_high" class="widget-tipping-basic-upload_box_logo_high" name="btcpw_tipping_button_image"><?php echo esc_html__('Upload', 'btcpaywall'); ?></button>
                        <button type="button" class="widget-tipping-basic-remove_box_image_high" style="display:none"><?php echo esc_html__('Remove', 'btcpaywall'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-logo_id_high" id="<?php echo esc_attr($this->get_field_id('logo_id')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_id')); ?>" type="text" value="<?php echo esc_attr($logo_id); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'btcpaywall'); ?></label>
                    <textarea id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"><?php echo esc_html($title); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="<?php echo esc_attr($this->get_field_id('title_text_color')); ?>"><?php echo esc_html__('Title text color', 'btcpaywall'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('title_text_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_text_color')); ?>" class="widget-tipping-basic-title_text_color_high" type="text" value="<?php echo esc_attr($title_text_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php echo esc_html__('Description:', 'btcpaywall'); ?></label>
                    <textarea id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text"><?php echo esc_html($description); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="<?php echo esc_attr($this->get_field_id('description_color')); ?>"><?php echo esc_html__('Description text color:', 'btcpaywall'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('description_color')); ?>" name="<?php echo esc_attr($this->get_field_name('description_color')); ?>" class="widget-tipping-basic-description-color_high" type="text" value="<?php echo esc_attr($description_color); ?>" />
                </div>
            </div>
            <h3><?php echo esc_html__('Main', 'btcpaywall'); ?></h3>

            <div class="row">
                <div>
                    <label for="<?php echo esc_attr($this->get_field_id('tipping_text')); ?>"><?php echo esc_html__('Tipping text', 'btcpaywall'); ?></label>
                    <textarea id="<?php echo esc_attr($this->get_field_id('tipping_text')); ?>" name="<?php echo esc_attr($this->get_field_name('tipping_text')); ?>" type="text"><?php echo esc_html($tipping_text); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="<?php echo esc_attr($this->get_field_id('tipping_text_color')); ?>"><?php echo esc_html__('Tipping text color', 'btcpaywall'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('tipping_text_color')); ?>" name="<?php echo esc_attr($this->get_field_name('tipping_text_color')); ?>" type="text" class="widget-tipping-basic-tipping-color_high" value="<?php echo esc_attr($tipping_text_color); ?>" />
                </div>
            </div>


            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('fixed_background')); ?>"><?php echo esc_html__('Primary color for amount', 'btcpaywall'); ?></label>
                    <span title="This color will be used as background color for all unselected amount fields and as a text and border color for selected amount field." class="btcpaywall_helper_tip"></span>

                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('fixed_background')); ?>" name="<?php echo esc_attr($this->get_field_name('fixed_background')); ?>" type="text" class="widget-tipping-basic-fixed_background_high" value="<?php echo esc_attr($fixed_background); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('selected_amount_background')); ?>"><?php echo esc_html__('Secondary color for amount', 'btcpaywall'); ?></label>
                    <span title="This color will be used as background color for selected amount field and as a text and border color for all unselected amount fields." class="btcpaywall_helper_tip"></span>

                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('selected_amount_background')); ?>" name="<?php echo esc_attr($this->get_field_name('selected_amount_background')); ?>" type="text" class="widget-tipping-basic-selected_amount_background_high" value="<?php echo esc_attr($selected_amount_background); ?>" />
                </div>
            </div>
            <h3><?php echo esc_html__('Footer', 'btcpaywall'); ?></h3>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('button_text')); ?>"><?php echo esc_html__('Button text', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <textarea id="<?php echo esc_attr($this->get_field_id('button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('button_text')); ?>" type="text"><?php echo esc_html($button_text); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('button_text_color')); ?>"><?php echo esc_html__('Button text color', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('button_text_color')); ?>" class="widget-tipping-basic-button_text_color_high" name="<?php echo esc_attr($this->get_field_name('button_text_color')); ?>" type="text" value="<?php echo esc_attr($button_text_color); ?>" />

                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('button_color')); ?>"><?php echo esc_html__('Button color', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('button_color')); ?>" class="widget-tipping-basic-button_color_high" name="<?php echo esc_attr($this->get_field_name('button_color')); ?>" type="text" value="<?php echo esc_attr($button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('button_color_hover')); ?>"><?php echo esc_html__('Button color on hover', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('button_color_hover')); ?>" class="widget-tipping-basic-button_color_hover_high" name="<?php echo esc_attr($this->get_field_name('button_color_hover')); ?>" type="text" value="<?php echo esc_attr($button_color_hover); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('continue_button_text')); ?>"><?php echo esc_html__('Continue button text', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <textarea id="<?php echo esc_attr($this->get_field_id('continue_button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('continue_button_text')); ?>" type="text"><?php echo esc_html($continue_button_text); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('continue_button_text_color')); ?>"><?php echo esc_html__('Continue button text color', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('continue_button_text_color')); ?>" class="widget-tipping-basic-continue_button_text_color_high" name="<?php echo esc_attr($this->get_field_name('continue_button_text_color')); ?>" type="text" value="<?php echo esc_attr($continue_button_text_color); ?>" />

                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('continue_button_color')); ?>"><?php echo esc_html__('Continue button color', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('continue_button_color')); ?>" class="widget-tipping-basic-continue_button_color_high" name="<?php echo esc_attr($this->get_field_name('continue_button_color')); ?>" type="text" value="<?php echo esc_attr($continue_button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('continue_button_color_hover')); ?>"><?php echo esc_html__('Continue button color on hover', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('continue_button_color_hover')); ?>" class="widget-tipping-basic-continue_button_color_hover_high" name="<?php echo esc_attr($this->get_field_name('continue_button_color_hover')); ?>" type="text" value="<?php echo esc_attr($continue_button_color_hover); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('previous_button_text')); ?>"><?php echo esc_html__('Previous button text', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <textarea id="<?php echo esc_attr($this->get_field_id('previous_button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('previous_button_text')); ?>" type="text"><?php echo esc_html($previous_button_text); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('previous_button_text_color')); ?>"><?php echo esc_html__('Previous button text color', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('previous_button_text_color')); ?>" class="widget-tipping-basic-previous_button_text_color_high" name="<?php echo esc_attr($this->get_field_name('previous_button_text_color')); ?>" type="text" value="<?php echo esc_attr($previous_button_text_color); ?>" />

                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('previous_button_color')); ?>"><?php echo esc_html__('Previous button color', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('previous_button_color')); ?>" class="widget-tipping-basic-previous_button_color_high" name="<?php echo esc_attr($this->get_field_name('previous_button_color')); ?>" type="text" value="<?php echo esc_attr($previous_button_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="<?php echo esc_attr($this->get_field_id('previous_button_color_hover')); ?>"><?php echo esc_html__('Previous button color on hover', 'btcpaywall'); ?></label>
                </div>
                <div class="col-80">
                    <input id="<?php echo esc_attr($this->get_field_id('previous_button_color_hover')); ?>" class="widget-tipping-basic-previous_button_color_hover_high" name="<?php echo esc_attr($this->get_field_name('previous_button_color_hover')); ?>" type="text" value="<?php echo esc_attr($previous_button_color_hover); ?>" />
                </div>
            </div>
            <h3><?php echo esc_html__('Fixed amount'); ?></h3>
            <div class="container_predefined_amount">
                <div class="row">
                    <div class="col-50">
                        <p>Default price1</p>
                    </div>
                    <div class="col-50 fixed-amount">
                        <input id="<?php echo esc_attr($this->get_field_id('value1_enabled')); ?>" name="<?php echo esc_attr($this->get_field_name('value1_enabled')); ?>" <?php echo $value1_enabled === 'true' ? 'checked' : ''; ?> type="checkbox" value="true" /><span><?php echo esc_html__('Do you want to display default price 1?', 'btcpaywall'); ?></span>
                        <input type="number" min=0 placeholder="Default Price1" step=1 id="<?php echo esc_attr($this->get_field_id('value1_amount')); ?>" name="<?php echo esc_attr($this->get_field_name('value1_amount')); ?>" value="<?php echo esc_attr($value1_amount); ?>">

                        <select required id="<?php echo esc_attr($this->get_field_id('value1_currency')); ?>" name="<?php echo esc_attr($this->get_field_name('value1_currency')); ?>">
                            <option disabled value="">Select currency</option>
                            <?php foreach ($supported_currencies as $curr1) : ?>
                                <option <?php echo $value1_currency === $curr1 ? 'selected' : ''; ?> value="<?php echo esc_attr($curr1); ?>">
                                    <?php echo esc_html($curr1); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <input type="text" id="<?php echo esc_attr($this->get_field_id('value1_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('value1_icon')); ?>" value="<?php echo esc_attr($value1_icon); ?>" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </div>
                </div>
                <div class="row">
                    <div class="col-50">
                        <p>Default price2</p>
                    </div>
                    <div class="col-50 fixed-amount">
                        <input id="<?php echo esc_attr($this->get_field_id('value2_enabled')); ?>" name="<?php echo esc_attr($this->get_field_name('value2_enabled')); ?>" <?php echo $value2_enabled === 'true' ? 'checked' : ''; ?> type="checkbox" value="true" /><span><?php echo esc_html__('Do you want to display default price 2?', 'btcpaywall'); ?></span>
                        <input type="number" min=0 placeholder="Default Price2" step=1 id="<?php echo esc_attr($this->get_field_id('value2_amount')); ?>" name="<?php echo esc_attr($this->get_field_name('value2_amount')); ?>" value="<?php echo esc_attr($value2_amount); ?>">

                        <select required id="<?php echo esc_attr($this->get_field_id('value2_currency')); ?>" name="<?php echo esc_attr($this->get_field_name('value2_currency')); ?>">
                            <option disabled value="">Select currency</option>
                            <?php foreach ($supported_currencies as $curr2) : ?>
                                <option <?php echo $value2_currency === $curr2 ? 'selected' : ''; ?> value="<?php echo esc_attr($curr2); ?>">
                                    <?php echo esc_html($curr2); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <input type="text" id="<?php echo esc_attr($this->get_field_id('value2_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('value2_icon')); ?>" value="<?php echo esc_attr($value2_icon); ?>" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </div>
                </div>
                <div class="row">
                    <div class="col-50">
                        <p>Default price3</p>
                    </div>
                    <div class="col-50 fixed-amount">
                        <input id="<?php echo esc_attr($this->get_field_id('value3_enabled')); ?>" name="<?php echo esc_attr($this->get_field_name('value3_enabled')); ?>" <?php echo $value3_enabled === 'true' ? 'checked' : ''; ?> type="checkbox" value="true" /><span><?php echo esc_html__('Do you want to display default price 3?', 'btcpaywall'); ?></span>
                        <input type="number" min=0 placeholder="Default Price3" step=1 id="<?php echo esc_attr($this->get_field_id('value3_amount')); ?>" name="<?php echo esc_attr($this->get_field_name('value3_amount')); ?>" value="<?php echo esc_attr($value3_amount); ?>" />

                        <select required id="<?php echo esc_attr($this->get_field_id('value3_currency')); ?>" name="<?php echo esc_attr($this->get_field_name('value3_currency')); ?>">
                            <option disabled value="">Select currency</option>
                            <?php foreach ($supported_currencies as $curr3) : ?>
                                <option <?php echo $value3_currency === $curr3 ? 'selected' : ''; ?> value="<?php echo esc_attr($curr3); ?>">
                                    <?php echo esc_html($curr3); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <input type="text" id="<?php echo esc_attr($this->get_field_id('value3_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('value3_icon')); ?>" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." value="<?php echo esc_attr($value3_icon); ?>" />
                    </div>
                </div>
            </div>
            <h4><?php echo esc_html__('Donor information', 'btcpaywall'); ?></h4>
            <div class="row">
                <div class="col-20">
                    <p><?php echo esc_html__('Full name', 'btcpaywall'); ?></p>
                </div>
                <div class="col-80 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_name')); ?>"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_name')); ?>" name="<?php echo esc_attr($this->get_field_name('display_name')); ?>" type="checkbox" <?php echo $display_name === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_name')); ?>"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                        <input id="<?php echo esc_attr($this->get_field_id('mandatory_name')); ?>" name="<?php echo esc_attr($this->get_field_name('mandatory_name')); ?>" type="checkbox" <?php echo $mandatory_name === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <p><?php echo esc_html__('Email', 'btcpaywall'); ?></p>
                </div>
                <div class="col-80 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_email')); ?>"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_email')); ?>" name="<?php echo esc_attr($this->get_field_name('display_email')); ?>" type="checkbox" <?php echo $display_email === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_email')); ?>"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                        <input id="<?php echo esc_attr($this->get_field_id('mandatory_email')); ?>" name="<?php echo esc_attr($this->get_field_name('mandatory_email')); ?>" type="checkbox" <?php echo $mandatory_email === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <p><?php echo esc_html__('Address', 'btcpaywall'); ?></p>
                </div>
                <div class="col-80 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_address')); ?>"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_address')); ?>" name="<?php echo esc_attr($this->get_field_name('display_address')); ?>" type="checkbox" <?php echo $display_address === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_address')); ?>"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                        <input id="<?php echo esc_attr($this->get_field_id('mandatory_address')); ?>" name="<?php echo esc_attr($this->get_field_name('mandatory_address')); ?>" type="checkbox" <?php echo $mandatory_address === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <p><?php echo esc_html__('Phone number', 'btcpaywall'); ?></p>
                </div>
                <div class="col-80 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_phone')); ?>"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_phone')); ?>" name="<?php echo esc_attr($this->get_field_name('display_phone')); ?>" type="checkbox" <?php echo $display_phone === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_phone')); ?>"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                        <input id="<?php echo esc_attr($this->get_field_id('mandatory_phone')); ?>" name="<?php echo esc_attr($this->get_field_name('mandatory_phone')); ?>" type="checkbox" <?php echo $mandatory_phone === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <p><?php echo esc_html__('Message', 'btcpaywall'); ?></p>
                </div>
                <div class="col-80 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_message')); ?>"><?php echo esc_html__('Display', 'btcpaywall'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_message')); ?>" name="<?php echo esc_attr($this->get_field_name('display_message')); ?>" type="checkbox" <?php echo $display_message === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_message')); ?>"><?php echo esc_html__('Mandatory', 'btcpaywall'); ?></label>
                        <input id="<?php echo esc_attr($this->get_field_id('mandatory_message')); ?>" name="<?php echo esc_attr($this->get_field_name('mandatory_message')); ?>" type="checkbox" value="true" <?php echo $mandatory_message === 'true' ? 'checked' : ''; ?> />
                    </div>
                </div>
            </div>
        </div>
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        $instance['description'] = !empty($new_instance['description']) ? wp_strip_all_tags($new_instance['description']) : '';

        $instance['currency'] = !empty($new_instance['currency']) ? $new_instance['currency'] : '';

        $instance['background_color'] = !empty($new_instance['background_color']) ? wp_strip_all_tags($new_instance['background_color']) : '';
        $instance['title_text_color'] = !empty($new_instance['title_text_color']) ? wp_strip_all_tags($new_instance['title_text_color']) : '#ffffff';
        $instance['tipping_text'] = !empty($new_instance['tipping_text']) ? wp_strip_all_tags($new_instance['tipping_text']) : '';
        $instance['tipping_text_color'] = !empty($new_instance['tipping_text_color']) ? wp_strip_all_tags($new_instance['tipping_text_color']) : '#000000';
        $instance['redirect'] = !empty($new_instance['redirect']) ? wp_strip_all_tags($new_instance['redirect']) : '';
        $instance['amount'] = !empty($new_instance['amount']) ? wp_strip_all_tags($new_instance['amount']) : '';
        $instance['description_color'] = !empty($new_instance['description_color']) ? wp_strip_all_tags($new_instance['description_color']) : '#000000';

        $instance['button_text'] = !empty($new_instance['button_text']) ? wp_strip_all_tags($new_instance['button_text']) : '';
        $instance['button_text_color'] = !empty($new_instance['button_text_color']) ? wp_strip_all_tags($new_instance['button_text_color']) : '#FFFFFF';

        $instance['button_color'] = !empty($new_instance['button_color']) ? wp_strip_all_tags($new_instance['button_color']) : '#FE642E';
        $instance['button_color_hover'] = !empty($new_instance['button_color_hover']) ? wp_strip_all_tags($new_instance['button_color_hover']) : '#FFF';

        $instance['logo_id'] = !empty($new_instance['logo_id']) ? $new_instance['logo_id'] : '';
        $instance['background_id'] = !empty($new_instance['background_id']) ? $new_instance['background_id'] : '';

        $instance['display_name'] = !empty($new_instance['display_name']) ? $new_instance['display_name'] : 'false';
        $instance['mandatory_name'] = !empty($new_instance['mandatory_name']) ? $new_instance['mandatory_name'] : 'false';

        $instance['display_email'] = !empty($new_instance['display_email']) ? $new_instance['display_email'] : 'false';
        $instance['mandatory_email'] = !empty($new_instance['mandatory_email']) ? $new_instance['mandatory_email'] : 'false';

        $instance['display_address'] = !empty($new_instance['display_address']) ? $new_instance['display_address'] : 'false';
        $instance['mandatory_address'] = !empty($new_instance['mandatory_address']) ? $new_instance['mandatory_address'] : 'false';

        $instance['display_phone'] = !empty($new_instance['display_phone']) ? $new_instance['display_phone'] : 'false';
        $instance['mandatory_phone'] = !empty($new_instance['mandatory_phone']) ? $new_instance['mandatory_phone'] : 'false';

        $instance['display_message'] = !empty($new_instance['display_message']) ? $new_instance['display_message'] : 'false';
        $instance['mandatory_message'] = !empty($new_instance['mandatory_message']) ? $new_instance['mandatory_message'] : 'false';



        $instance['value1_enabled'] = !empty($new_instance['value1_enabled']) ? $new_instance['value1_enabled'] : 'false';
        $instance['value1_amount'] = !empty($new_instance['value1_amount']) ? $new_instance['value1_amount'] : 0;
        $instance['value1_currency'] = !empty($new_instance['value1_currency']) ? $new_instance['value1_currency'] : '';
        $instance['value1_icon'] = !empty($new_instance['value1_icon']) ? $new_instance['value1_icon'] : '';

        $instance['value2_enabled'] = !empty($new_instance['value2_enabled']) ? $new_instance['value2_enabled'] : 'false';
        $instance['value2_amount'] = !empty($new_instance['value2_amount']) ? $new_instance['value2_amount'] : 0;
        $instance['value2_currency'] = !empty($new_instance['value2_currency']) ? $new_instance['value2_currency'] : '';
        $instance['value2_icon'] = !empty($new_instance['value2_icon']) ? $new_instance['value2_icon'] : '';

        $instance['value3_enabled'] = !empty($new_instance['value3_enabled']) ? $new_instance['value3_enabled'] : 'false';
        $instance['value3_amount'] = !empty($new_instance['value3_amount']) ? $new_instance['value3_amount'] : 0;
        $instance['value3_currency'] = !empty($new_instance['value3_currency']) ? $new_instance['value3_currency'] : '';
        $instance['value3_icon'] = !empty($new_instance['value3_icon']) ? $new_instance['value3_icon'] : '';

        $instance['free_input'] = !empty($new_instance['free_input']) ? $new_instance['free_input'] : 'false';
        $instance['fixed_background'] = !empty($new_instance['fixed_background']) ? $new_instance['fixed_background'] : '#ffa500';
        $instance['hf_color'] = !empty($new_instance['hf_color']) ? wp_strip_all_tags($new_instance['hf_color']) : '#1d5aa3';
        $instance['continue_button_text'] = !empty($new_instance['continue_button_text']) ? wp_strip_all_tags($new_instance['continue_button_text']) : '';
        $instance['continue_button_text_color'] = !empty($new_instance['continue_button_text_color']) ? wp_strip_all_tags($new_instance['continue_button_text_color']) : '#FFF';

        $instance['continue_button_color'] = !empty($new_instance['continue_button_color']) ? wp_strip_all_tags($new_instance['continue_button_color']) : '#FE642E';
        $instance['continue_button_color_hover'] = !empty($new_instance['continue_button_color_hover']) ? wp_strip_all_tags($new_instance['continue_button_color_hover']) : '#FFF';

        $instance['previous_button_text'] = !empty($new_instance['previous_button_text']) ? wp_strip_all_tags($new_instance['previous_button_text']) : '';
        $instance['previous_button_text_color'] = !empty($new_instance['previous_button_text_color']) ? wp_strip_all_tags($new_instance['previous_button_text_color']) : '#FFF';

        $instance['previous_button_color'] = !empty($new_instance['previous_button_color']) ? wp_strip_all_tags($new_instance['previous_button_color']) : '#1d5aa3';
        $instance['previous_button_color_hover'] = !empty($new_instance['previous_button_color_hover']) ? wp_strip_all_tags($new_instance['previous_button_color_hover']) : '#FFF';

        $instance['selected_amount_background'] = !empty($new_instance['selected_amount_background']) ? wp_strip_all_tags($new_instance['selected_amount_background']) : '#000';

        return $instance;
    }
}
$my_widget = new Tipping_Banner_High();
?>
