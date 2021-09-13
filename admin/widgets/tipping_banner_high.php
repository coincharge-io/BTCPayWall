<?php


class Tipping_Banner_High extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'tipping-banner-high',
            'BP Tipping Banner High'
        );
    }

    public function widget($args, $instance)
    {

        $dimension = explode('x', '200x450');
        $supported_currencies = BTCPayWall_Admin::TIPPING_CURRENCIES;
        $logo = wp_get_attachment_image_src($instance['logo_id']) ? wp_get_attachment_image_src($instance['logo_id'])[0] : $instance['logo_id'];
        $background = wp_get_attachment_image_src($instance['background_id']) ? wp_get_attachment_image_src($instance['background_id'])[0] : $instance['background_id'];
        $collect = BTCPayWall_Public::getCollect($instance);
        $collect_d = filter_var(BTCPayWall_Public::display_is_enabled($collect), FILTER_VALIDATE_BOOL);
        $collect_data = filter_var($collect_d, FILTER_VALIDATE_BOOL);
        $fixed_amount = BTCPayWall_Public::getFixedAmount($instance);

        $first_enabled = array_column($fixed_amount, 'enabled');
        $d = array_search('true', $first_enabled);
        $index = 'value' . ($d + 1);
?>
        <style>
            .btcpw_widget.btcpw_skyscraper_tipping_container.high {
                background-color: <?php echo ($instance['background_color'] ? ($instance['background_color']) : '');
                                    ?>;
                background-image: url(<?php echo ($background ? $background : '');
                                        ?>);
                width: <?php echo esc_html($dimension[0]) . 'px !important';
                        ?>;
                height: <?php echo esc_html($dimension[1]) . 'px !important';
                        ?>;
            }

            #btcpw_widget_btcpw_skyscraper_tipping__button_high,
            #btcpw_widget_btcpw_skyscraper_button_high>div>input.btcpw_widget.skyscraper-next-form.high {
                color: <?php echo esc_html($instance['button_text_color']);
                        ?>;
                background: <?php echo esc_html($instance['button_color']);
                            ?>;
            }

            .btcpw_widget.btcpw_skyscraper_header_container.high,
            #btcpw_widget_btcpw_skyscraper_button_high,
            #btcpw_widget_btcpw_skyscraper_button_high>div:nth-child(1)>input {
                background-color: <?php echo esc_html($instance['hf_color']);
                                    ?>;
            }

            .btcpw_widget.btcpw_skyscraper_header_container.high h6 {
                color: <?php echo esc_html($instance['title_text_color']);
                        ?>
            }

            .btcpw_skyscraper_amount_value_1.high,
            .btcpw_skyscraper_amount_value_2.high,
            .btcpw_skyscraper_amount_value_3.high,
            .btcpw_skyscraper_tipping_free_input.high {
                background-color: <?php echo esc_html($instance['fixed_background']);
                                    ?>;
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

            .btcpw_widget.btcpw_skyscraper_tipping_info.high fieldset h6,
            .btcpw_widget.btcpw_skyscraper_tipping_info.high h6,
            #btcpw_widget_skyscraper_tipping_form_high>fieldset:nth-child(1)>h6 {
                color: <?php echo esc_html($instance['tipping_text_color']);
                        ?>
            }

            .btcpw_widget.btcpw_skyscraper_amount_value_1.high,
            .btcpw_widget.btcpw_skyscraper_amount_value_2.high,
            .btcpw_widget.btcpw_skyscraper_amount_value_3.high {
                background: <?php echo ($instance['fixed_background']);
                            ?>;

            }
        </style>
        <div id="btcpw_page">
            <div class="btcpw_widget btcpw_skyscraper_banner high">
                <div class="btcpw_widget btcpw_skyscraper_header_container high">
                    <?php if ($logo) : ?>
                        <div id="btcpw_skyscraper_logo_wrap_high">
                            <img alt="Tipping logo" src=<?php echo ($logo); ?> />
                        </div>
                    <?php endif; ?>
                    <div>
                        <?php if (!empty($instance['title'])) : ?>
                            <h6><?php echo ($instance['title']); ?></h6>
                        <?php endif; ?>
                        <?php if (!empty($instance['description'])) : ?>
                            <p><?php echo ($instance['description']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="btcpw_widget btcpw_skyscraper_tipping_container high">
                    <form method="POST" action="" id="btcpw_widget_skyscraper_tipping_form_high">
                        <fieldset>
                            <h6><?php echo (!empty($instance['tipping_text']) ? ($instance['tipping_text']) : ''); ?>
                            </h6>
                            <div class="btcpw_widget btcpw_skyscraper_amount high">
                                <?php foreach ($fixed_amount as $key => $value) : ?>
                                    <?php if (filter_var($fixed_amount[$key]['enabled'], FILTER_VALIDATE_BOOLEAN) === true) : ?>
                                        <div class="<?php echo "btcpw_widget btcpw_skyscraper_amount_$key high"; ?>">
                                            <div>
                                                <input type="radio" class="btcpw_widget btcpw_skyscraper_tipping_default_amount high" id="<?php echo "btcpw_widget_{$key}_high"; ?>" name="btcpw_widget_btcpw_skyscraper_tipping_default_amount_high" <?php echo $key == $index ? 'required' : ''; ?> value="<?php echo ($fixed_amount[$key]['amount'] . ' ' . $fixed_amount[$key]['currency']); ?>">
                                                <?php if (!empty($fixed_amount[$key]['amount'])) : ?>
                                                    <i class="<?php echo ($fixed_amount[$key]['icon']); ?>"></i>
                                                <?php endif; ?>
                                            </div>
                                            <label for="<?php echo $key; ?>"><?php echo ($fixed_amount[$key]['amount'] . ' ' . $fixed_amount[$key]['currency']); ?></label>

                                        </div>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                                <?php if (true === filter_var($instance['free_input'], FILTER_VALIDATE_BOOL)) : ?>
                                    <div class="btcpw_widget btcpw_skyscraper_tipping_free_input high">
                                        <input type="number" id="btcpw_widget_btcpw_skyscraper_tipping_amount_high" name="btcpw_widget_btcpw_skyscraper_tipping_amount_high" placeholder="0.00" required />


                                        <select required name="btcpw_widget_btcpw_skyscraper_tipping_currency_high" id="btcpw_widget_btcpw_skyscraper_tipping_currency_high" ; ?>">
                                            <option disabled value="">Select currency</option>
                                            <?php foreach ($supported_currencies as $currency) : ?>
                                                <option <?php echo $instance['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                                    <?php echo $currency; ?>
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
                                <input type="hidden" id="btcpw_widget_btcpw_skyscraper_redirect_link_high" name="btcpw_widget_btcpw_skyscraper_redirect_link_high" value=<?php echo ($instance['redirect']); ?> />
                                <?php if (filter_var($collect_data, FILTER_VALIDATE_BOOL) === true) : ?>
                                    <div>
                                        <input type="button" name="next" class="btcpw_widget skyscraper-next-form high" value="Continue >" />
                                    </div>
                                <?php else : ?>
                                    <div>
                                        <button type="submit" id="btcpw_widget_btcpw_skyscraper_tipping__button_high"><?php echo (!empty($instance['button_text']) ? ($instance['button_text']) : 'Tip'); ?></button>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </fieldset>
                        <?php if (filter_var($collect_data, FILTER_VALIDATE_BOOL) === true) : ?>
                            <fieldset>
                                <div class="btcpw_widget btcpw_skyscraper_donor_information high">
                                    <?php foreach ($collect as $key => $value) : ?>
                                        <?php if (filter_var($collect[$key]['display'], FILTER_VALIDATE_BOOL) === true) : ?>
                                            <div class="<?php echo "btcpw_widget btcpw_skyscraper_tipping_donor_{$collect[$key]['label']}_wrap high"; ?>">

                                                <input type="text" placeholder="<?php echo $collect[$key]['label']; ?>" id="<?php echo "btcpw_widget_btcpw_skyscraper_tipping_donor_{$collect[$key]['id']}_high"; ?>" name="<?php echo "btcpw_widget_btcpw_skyscraper_tipping_donor_{$collect[$key]['id']}_high"; ?>" <?php echo filter_var($collect[$key]['mandatory'], FILTER_VALIDATE_BOOL) === true ? 'required' : ''; ?> />

                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div id="btcpw_widget_btcpw_skyscraper_button_high">
                                    <div>
                                        <input type="button" name="previous" class="btcpw_widget_ skyscraper-previous-form high" value="< Previous" />
                                    </div>
                                    <div>
                                        <button type="submit" id="btcpw_widget_btcpw_skyscraper_tipping__button_high"><?php echo (!empty($instance['button_text']) ? ($instance['button_text']) : 'Tip'); ?></button>
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
        $supported_currencies = BTCPayWall_Admin::TIPPING_CURRENCIES;
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Support my work', 'text_domain');

        $description = !empty($instance['description']) ? $instance['description'] : esc_html__('', 'text_domain');

        $currency = !empty($instance['currency']) ? $instance['currency'] : esc_html__('SATS', 'text_domain');

        $background_color = !empty($instance['background_color']) ? $instance['background_color'] : esc_html__(
            '#E6E6E6',
            'text_domain'
        );
        $title_text_color = !empty($instance['title_text_color']) ? $instance['title_text_color'] : esc_html__(
            '#ffffff',
            'text_domain'
        );

        $tipping_text = !empty($instance['tipping_text']) ? $instance['tipping_text'] : esc_html__(
            'Enter Tipping Amount',
            'text_domain'
        );
        $tipping_text_color = !empty($instance['tipping_text_color']) ? $instance['tipping_text_color'] : esc_html__(
            '#000000',
            'text_domain'
        );
        $redirect = !empty($instance['redirect']) ? $instance['redirect'] : esc_html__('', 'text_domain');
        $amount = !empty($instance['amount']) ? $instance['amount'] : esc_html__('', 'text_domain');
        $description_color = !empty($instance['description_color']) ? $instance['description_color'] : esc_html__(
            '#000000',
            'text_domain'
        );

        $button_text = !empty($instance['button_text']) ? $instance['button_text'] : esc_html__('Tipping now', 'text_domain');
        $button_text_color = !empty($instance['button_text_color']) ? $instance['button_text_color'] : esc_html__(
            '#FFFFFF',
            'text_domain'
        );

        $button_color = !empty($instance['button_color']) ? $instance['button_color'] : esc_html__('#FE642E', 'text_domain');


        $logo_id = !empty($instance['logo_id']) ? $instance['logo_id'] :
            esc_html__('https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg', 'text_domain');
        $background_id = !empty($instance['background_id']) ? $instance['background_id'] : esc_html__('', 'text_domain');

        $logo = wp_get_attachment_image_src($logo_id);
        $background = wp_get_attachment_image_src($background_id);

        $display_name = !empty($instance['display_name']) ? $instance['display_name'] : esc_html__('true', 'text_domain');
        $mandatory_name = !empty($instance['mandatory_name']) ? $instance['mandatory_name'] : esc_html__(
            'false',
            'text_domain'
        );

        $display_email = !empty($instance['display_email']) ? $instance['display_email'] : esc_html__('true', 'text_domain');
        $mandatory_email = !empty($instance['mandatory_email']) ? $instance['mandatory_email'] : esc_html__(
            'false',
            'text_domain'
        );

        $display_address = !empty($instance['display_address']) ? $instance['display_address'] : esc_html__(
            'true',
            'text_domain'
        );
        $mandatory_address = !empty($instance['mandatory_address']) ? $instance['mandatory_address'] : esc_html__(
            'false',
            'text_domain'
        );

        $display_phone = !empty($instance['display_phone']) ? $instance['display_phone'] : esc_html__('true', 'text_domain');
        $mandatory_phone = !empty($instance['mandatory_phone']) ? $instance['mandatory_phone'] : esc_html__(
            'false',
            'text_domain'
        );

        $display_message = !empty($instance['display_message']) ? $instance['display_message'] : esc_html__(
            'true',
            'text_domain'
        );
        $mandatory_message = !empty($instance['mandatory_message']) ? $instance['mandatory_message'] : esc_html__(
            'false',
            'text_domain'
        );

        $value1_enabled = !empty($instance['value1_enabled']) ? $instance['value1_enabled'] : esc_html__('true', 'text_domain');
        $value1_amount = !empty($instance['value1_amount']) ? $instance['value1_amount'] : esc_html__('1000', 'text_domain');
        $value1_icon = !empty($instance['value1_icon']) ? $instance['value1_icon'] : esc_html__('fas fa-coffee', 'text_domain');
        $value1_currency = !empty($instance['value1_currency']) ? $instance['value1_currency'] : esc_html__('', 'text_domain');

        $value2_enabled = !empty($instance['value2_enabled']) ? $instance['value2_enabled'] : esc_html__('true', 'text_domain');
        $value2_amount = !empty($instance['value2_amount']) ? $instance['value2_amount'] : esc_html__('2000', 'text_domain');
        $value2_icon = !empty($instance['value2_icon']) ? $instance['value2_icon'] : esc_html__('fas fa-beer', 'text_domain');
        $value2_currency = !empty($instance['value2_currency']) ? $instance['value2_currency'] : esc_html__('', 'text_domain');

        $value3_enabled = !empty($instance['value3_enabled']) ? $instance['value3_enabled'] : esc_html__('true', 'text_domain');
        $value3_amount = !empty($instance['value3_amount']) ? $instance['value3_amount'] : esc_html__('3000', 'text_domain');
        $value3_icon = !empty($instance['value3_icon']) ? $instance['value3_icon'] : esc_html__(
            'fas fa-cocktail',
            'text_domain'
        );
        $value3_currency = !empty($instance['value3_currency']) ? $instance['value3_currency'] : esc_html__('', 'text_domain');

        $free_input = !empty($instance['free_input']) ? $instance['free_input'] : esc_html__('true', 'text_domain');

        $fixed_background = !empty($instance['fixed_background']) ? $instance['fixed_background'] : esc_html__(
            '#ffa500',
            'text_domain'
        );
        $hf_color = !empty($instance['hf_color']) ? $instance['hf_color'] : esc_html__('#1d5aa3', 'text_domain');
    ?>
        <div class="tipping_banner">
            <h1>Tipping</h1>
            <div class="row">

                <p>200x710</p>

            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('background_image')); ?>"><?php echo esc_html__('Background image', 'text_domain'); ?></label>
                </div>
                <div class="col-50">
                    <?php if ($background) : ?>
                        <button id="lnpw_tipping_button_image_background_banner_high" class="widget-tipping-basic-upload_box_image_high" name="lnpw_tipping_button_image_background"><img width="100" height="100" alt="Tipping box background" src="<?php echo $background[0]; ?>" /></a></button>
                        <button class="widget-tipping-basic-remove_box_image_high">
                            <?php echo esc_html__('Remove', 'text_domain'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-background_id_high" id="<?php echo esc_attr($this->get_field_id('background_id')); ?>" name="<?php echo esc_attr($this->get_field_name('background_id')); ?>" type="text" value="<?php echo esc_attr($background_id); ?>" />
                    <?php else : ?>
                        <button id="lnpw_tipping_button_image_background_banner_high" class="widget-tipping-basic-upload_box_image_high" name="lnpw_tipping_button_image_background"><?php echo esc_html__('Upload', 'text_domain'); ?></button>
                        <button class="widget-tipping-basic-remove_box_image_high" style="display:none"><?php echo esc_html__('Remove', 'text_domain'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-background_id_high" id="<?php echo esc_attr($this->get_field_id('background_id')); ?>" name="<?php echo esc_attr($this->get_field_name('background_id')); ?>" type="text" value="<?php echo esc_attr($background_id); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('background_color')); ?>"><?php echo esc_html__('Background color', 'text_domain'); ?></label>
                </div>
                <div class="col-50">
                    <input id="<?php echo esc_attr($this->get_field_id('background_color')); ?>" class="widget-tipping-basic-background_color_high" name="<?php echo esc_attr($this->get_field_name('background_color')); ?>" type="text" value="<?php echo esc_attr($background_color); ?>" type="text" />
                </div>
            </div>
            <div class="row">
                <label for="<?php echo esc_attr($this->get_field_id('hf_color')); ?>"><?php echo esc_html__('Header and footer background color', 'text_domain'); ?></label>

                <input id="<?php echo esc_attr($this->get_field_id('hf_color')); ?>" class="widget-tipping-basic-hf_color_high" name="<?php echo esc_attr($this->get_field_name('hf_color')); ?>" type="text" value="<?php echo esc_attr($hf_color); ?>" />

            </div>
            <h3><?php echo esc_html__('Description', 'text_domain'); ?></h3>

            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('logo')); ?>"><?php echo esc_html__('Tipping logo', 'text_domain'); ?></label>
                </div>
                <div class="col-50">
                    <?php if ($logo_id) : ?>
                        <button id="lnpw_tipping_button_logo_banner_high" class="widget-tipping-basic-upload_box_logo_high" name="lnpw_tipping_button_image"><img width="100" height="100" alt="Tipping box logo" src="<?php echo $logo[0]; ?>" /></a></button>
                        <button class="widget-tipping-basic-remove_box_image_high"><?php echo esc_html__('Remove', 'text_domain'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-logo_id_high" id="<?php echo esc_attr($this->get_field_id('logo_id')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_id')); ?>" type="text" value="<?php echo esc_attr($logo_id); ?>" />
                    <?php else : ?>
                        <button id="lnpw_tipping_button_logo_banner_high" class="widget-tipping-basic-upload_box_logo_high" name="lnpw_tipping_button_image"><?php echo esc_html__('Upload', 'text_domain'); ?></button>
                        <button class="widget-tipping-basic-remove_box_image_high" style="display:none"><?php echo esc_html__('Remove', 'text_domain'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-logo_id_high" id="<?php echo esc_attr($this->get_field_id('logo_id')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_id')); ?>" type="text" value="<?php echo esc_attr($logo_id); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'text_domain'); ?></label>
                    <textarea id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"><?php echo esc_html($title); ?></textarea>
                </div>
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('title_text_color')); ?>"><?php echo esc_html__('Title text color', 'text_domain'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('title_text_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_text_color')); ?>" class="widget-tipping-basic-title_text_color_high" type="text" value="<?php echo esc_attr($title_text_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php echo esc_html__('Description:', 'text_domain'); ?></label>
                    <textarea id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text"><?php echo esc_html($description); ?></textarea>
                </div>
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('description_color')); ?>"><?php echo esc_html__('Description text color:', 'text_domain'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('description_color')); ?>" name="<?php echo esc_attr($this->get_field_name('description_color')); ?>" class="widget-tipping-basic-description-color_high" type="text" value="<?php echo esc_attr($description_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('tipping_text')); ?>"><?php echo esc_html__('Tipping text', 'text_domain'); ?></label>
                    <textarea id="<?php echo esc_attr($this->get_field_id('tipping_text')); ?>" name="<?php echo esc_attr($this->get_field_name('tipping_text')); ?>" type="text"><?php echo esc_html($tipping_text); ?></textarea>
                </div>
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('tipping_text_color')); ?>"><?php echo esc_html__('Tipping text color', 'text_domain'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('tipping_text_color')); ?>" name="<?php echo esc_attr($this->get_field_name('tipping_text_color')); ?>" type="text" class="widget-tipping-basic-tipping-color_high" value="<?php echo esc_attr($tipping_text_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('redirect')); ?>">Link to Thank you page</label>

                    <input id="<?php echo esc_attr($this->get_field_id('redirect')); ?>" name="<?php echo esc_attr($this->get_field_name('redirect')); ?>" class="widget-tipping-basic_redirect" type="text" value="<?php echo esc_attr($redirect); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('free_input')); ?>">Free input of amount</label>
                    <input id="<?php echo esc_attr($this->get_field_id('free_input')); ?>" name="<?php echo esc_attr($this->get_field_name('free_input')); ?>" type="checkbox" <?php echo $free_input === 'true' ? 'checked' : ''; ?> value="true" />
                </div>
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('currency')); ?>"><?php echo esc_html__('Currency', 'text_domain'); ?></label>
                    <select required id="<?php echo esc_attr($this->get_field_id('currency')); ?>" name="<?php echo esc_attr($this->get_field_name('currency')); ?>">
                        <option disabled value=""><?php echo esc_html__('Select currency', 'text_domain'); ?></option>
                        <?php foreach ($supported_currencies as $curr) : ?>
                            <option <?php echo $currency === $curr ? 'selected' : ''; ?> value="<?php echo $curr; ?>">
                                <?php echo $curr; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('fixed_background')); ?>"><?php echo esc_html__('Background color for fixed amount', 'text_domain'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('fixed_background')); ?>" name="<?php echo esc_attr($this->get_field_name('fixed_background')); ?>" type="text" class="widget-tipping-basic-fixed_background_high" value="<?php echo esc_attr($fixed_background); ?>" />
                </div>
            </div>
            <div class="row">

            </div>
            <div class="container_predefined_amount">
                <div class="row">
                    <div class="col-50">
                        <p>Default price1</p>
                    </div>
                    <div class="col-50 col-fixed">
                        <input id="<?php echo esc_attr($this->get_field_id('value1_enabled')); ?>" name="<?php echo esc_attr($this->get_field_name('value1_enabled')); ?>" <?php echo $value1_enabled === 'true' ? 'checked' : ''; ?> type="checkbox" value="true" />
                        <input type="number" min=0 placeholder="Default Price1" step=1 id="<?php echo esc_attr($this->get_field_id('value1_amount')); ?>" name="<?php echo esc_attr($this->get_field_name('value1_amount')); ?>" value="<?php echo esc_attr($value1_amount); ?>">

                        <select required id="<?php echo esc_attr($this->get_field_id('value1_currency')); ?>" name="<?php echo esc_attr($this->get_field_name('value1_currency')); ?>">
                            <option disabled value="">Select currency</option>
                            <?php foreach ($supported_currencies as $curr1) : ?>
                                <option <?php echo $value1_currency === $curr1 ? 'selected' : ''; ?> value="<?php echo $curr1; ?>">
                                    <?php echo $curr1; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <input id="<?php echo esc_attr($this->get_field_id('value1_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('value1_icon')); ?>" type="text" value="<?php echo esc_attr($value1_icon); ?>" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </div>
                </div>
                <div class="row">
                    <div class="col-50">
                        <p>Default price2</p>
                    </div>
                    <div class="col-50 col-fixed">
                        <input id="<?php echo esc_attr($this->get_field_id('value2_enabled')); ?>" name="<?php echo esc_attr($this->get_field_name('value2_enabled')); ?>" <?php echo $value2_enabled === 'true' ? 'checked' : ''; ?> type="checkbox" value="true" />
                        <input type="number" min=0 placeholder="Default Price2" step=1 id="<?php echo esc_attr($this->get_field_id('value2_amount')); ?>" name="<?php echo esc_attr($this->get_field_name('value2_amount')); ?>" value="<?php echo esc_attr($value2_amount); ?>">

                        <select required id="<?php echo esc_attr($this->get_field_id('value2_currency')); ?>" name="<?php echo esc_attr($this->get_field_name('value2_currency')); ?>">
                            <option disabled value="">Select currency</option>
                            <?php foreach ($supported_currencies as $curr2) : ?>
                                <option <?php echo $value2_currency === $curr2 ? 'selected' : ''; ?> value="<?php echo $curr2; ?>">
                                    <?php echo $curr2; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <input id="<?php echo esc_attr($this->get_field_id('value2_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('value2_icon')); ?>" type="text" value="<?php echo esc_attr($value2_icon); ?>" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </div>
                </div>
                <div class="row">
                    <div class="col-50">
                        <p>Default price3</p>
                    </div>
                    <div class="col-50 col-fixed">
                        <input id="<?php echo esc_attr($this->get_field_id('value3_enabled')); ?>" name="<?php echo esc_attr($this->get_field_name('value3_enabled')); ?>" <?php echo $value3_enabled === 'true' ? 'checked' : ''; ?> type="checkbox" value="true" />
                        <input type="number" min=0 placeholder="Default Price3" step=1 id="<?php echo esc_attr($this->get_field_id('value3_amount')); ?>" name="<?php echo esc_attr($this->get_field_name('value3_amount')); ?>" value="<?php echo esc_attr($value3_amount); ?>" />

                        <select required id="<?php echo esc_attr($this->get_field_id('value3_currency')); ?>" name="<?php echo esc_attr($this->get_field_name('value3_currency')); ?>">
                            <option disabled value="">Select currency</option>
                            <?php foreach ($supported_currencies as $curr3) : ?>
                                <option <?php echo $value3_currency === $curr3 ? 'selected' : ''; ?> value="<?php echo $curr3; ?>">
                                    <?php echo $curr3; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <input id="<?php echo esc_attr($this->get_field_id('value3_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('value3_icon')); ?>" type="text" value="<?php echo esc_attr($value3_icon); ?>" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </div>
                </div>
            </div>
            <h3><?php echo esc_html__('Button', 'text_domain'); ?></h3>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('button_text')); ?>"><?php echo esc_html__('Button text', 'text_domain'); ?></label>

                    <textarea id="<?php echo esc_attr($this->get_field_id('button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('button_text')); ?>" type="text"><?php echo esc_html($button_text); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('button_text_color')); ?>"><?php echo esc_html__('Button text color', 'text_domain'); ?></label>
                </div>
                <div class="col-50">
                    <input id="<?php echo esc_attr($this->get_field_id('button_text_color')); ?>" class="widget-tipping-basic-button_text_color_high" name="<?php echo esc_attr($this->get_field_name('button_text_color')); ?>" type="text" value="<?php echo esc_attr($button_text_color); ?>" />

                </div>
            </div>


            <div class="row">
                <label for="<?php echo esc_attr($this->get_field_id('button_color')); ?>"><?php echo esc_html__('Button color', 'text_domain'); ?></label>

                <input id="<?php echo esc_attr($this->get_field_id('button_color')); ?>" class="widget-tipping-basic-button_color_high" name="<?php echo esc_attr($this->get_field_name('button_color')); ?>" type="text" value="<?php echo esc_attr($button_color); ?>" />

            </div>

            <h4><?php echo esc_html__('Collect further information', 'text_domain'); ?></h4>
            <div class="row">
                <div class="col-50">
                    <p><?php echo esc_html__('Full name', 'text_domain'); ?></p>
                </div>
                <div class="col-50 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_name')); ?>"><?php echo esc_html__('Display', 'text_domain'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_name')); ?>" name="<?php echo esc_attr($this->get_field_name('display_name')); ?>" type="checkbox" <?php echo $display_name === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_name')); ?>"><?php echo esc_html__('Mandatory', 'text_domain'); ?></label>
                        <input id="<?php echo esc_attr($this->get_field_id('mandatory_name')); ?>" name="<?php echo esc_attr($this->get_field_name('mandatory_name')); ?>" type="checkbox" <?php echo $mandatory_name === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p><?php echo esc_html__('Email', 'text_domain'); ?></p>
                </div>
                <div class="col-50 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_email')); ?>"><?php echo esc_html__('Display', 'text_domain'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_email')); ?>" name="<?php echo esc_attr($this->get_field_name('display_email')); ?>" type="checkbox" <?php echo $display_email === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_email')); ?>"><?php echo esc_html__('Mandatory', 'text_domain'); ?></label>
                        <input id="<?php echo esc_attr($this->get_field_id('mandatory_email')); ?>" name="<?php echo esc_attr($this->get_field_name('mandatory_email')); ?>" type="checkbox" <?php echo $mandatory_email === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p><?php echo esc_html__('Address', 'text_domain'); ?></p>
                </div>
                <div class="col-50 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_address')); ?>"><?php echo esc_html__('Display', 'text_domain'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_address')); ?>" name="<?php echo esc_attr($this->get_field_name('display_address')); ?>" type="checkbox" <?php echo $display_address === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_address')); ?>"><?php echo esc_html__('Mandatory', 'text_domain'); ?></label>
                        <input id="<?php echo esc_attr($this->get_field_id('mandatory_address')); ?>" name="<?php echo esc_attr($this->get_field_name('mandatory_address')); ?>" type="checkbox" <?php echo $mandatory_address === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p><?php echo esc_html__('Phone number', 'text_domain'); ?></p>
                </div>
                <div class="col-50 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_phone')); ?>"><?php echo esc_html__('Display', 'text_domain'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_phone')); ?>" name="<?php echo esc_attr($this->get_field_name('display_phone')); ?>" type="checkbox" <?php echo $display_phone === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_phone')); ?>"><?php echo esc_html__('Mandatory', 'text_domain'); ?></label>
                        <input id="<?php echo esc_attr($this->get_field_id('mandatory_phone')); ?>" name="<?php echo esc_attr($this->get_field_name('mandatory_phone')); ?>" type="checkbox" <?php echo $mandatory_phone === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <p><?php echo esc_html__('Message', 'text_domain'); ?></p>
                </div>
                <div class="col-50 col-2">
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('display_message')); ?>"><?php echo esc_html__('Display', 'text_domain'); ?></label>

                        <input id="<?php echo esc_attr($this->get_field_id('display_message')); ?>" name="<?php echo esc_attr($this->get_field_name('display_message')); ?>" type="checkbox" <?php echo $display_message === 'true' ? 'checked' : ''; ?> value="true" />
                    </div>
                    <div>
                        <label for="<?php echo esc_attr($this->get_field_id('mandatory_message')); ?>"><?php echo esc_html__('Mandatory', 'text_domain'); ?></label>
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
        $instance['title_text_color'] = !empty($new_instance['title_text_color']) ? wp_strip_all_tags($new_instance['title_text_color']) : '';
        $instance['tipping_text'] = !empty($new_instance['tipping_text']) ? wp_strip_all_tags($new_instance['tipping_text']) : '';
        $instance['tipping_text_color'] = !empty($new_instance['tipping_text_color']) ? wp_strip_all_tags($new_instance['tipping_text_color']) : '';
        $instance['tipping_color'] = !empty($new_instance['tipping_color']) ? wp_strip_all_tags($new_instance['tipping_color']) : '';
        $instance['redirect'] = !empty($new_instance['redirect']) ? wp_strip_all_tags($new_instance['redirect']) : '';
        $instance['amount'] = !empty($new_instance['amount']) ? wp_strip_all_tags($new_instance['amount']) : '';
        $instance['description_color'] = !empty($new_instance['description_color']) ? wp_strip_all_tags($new_instance['description_color']) : '';

        $instance['button_text'] = !empty($new_instance['button_text']) ? wp_strip_all_tags($new_instance['button_text']) : '';
        $instance['button_text_color'] = !empty($new_instance['button_text_color']) ? wp_strip_all_tags($new_instance['button_text_color']) : '';

        $instance['button_color'] = !empty($new_instance['button_color']) ? wp_strip_all_tags($new_instance['button_color']) : '';

        $instance['logo_id'] = !empty($new_instance['logo_id']) ? $new_instance['logo_id'] : '';
        $instance['background_id'] = !empty($new_instance['background_id']) ? $new_instance['background_id'] : '';
        $instance['hf_color'] = !empty($new_instance['hf_color']) ? wp_strip_all_tags($new_instance['hf_color']) : '';
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
        $instance['fixed_background'] = !empty($new_instance['fixed_background']) ? $new_instance['fixed_background'] : '';

        return $instance;
    }
}
$my_widget = new Tipping_Banner_High();
?>