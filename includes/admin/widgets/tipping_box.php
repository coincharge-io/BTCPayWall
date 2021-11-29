<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
class Tipping_Box extends WP_Widget
{

    public function __construct()
    {

        parent::__construct(
            'tipping-box',  // Base ID
            'BTCPW Tipping Box'   // Name
        );
    }



    public function widget($args, $instance)
    {
        $supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
        $logo = wp_get_attachment_image_src($instance['logo_id']) ? wp_get_attachment_image_src($instance['logo_id'])[0] : $instance['logo_id'];
        $background = wp_get_attachment_image_src($instance['background_id']) ? wp_get_attachment_image_src($instance['background_id'])[0] : $instance['background_id'];
        $dimension = explode('x', ($instance['dimension'] == '250x300' ? '250x300' : '300x300'));


?>
        <style>
            .btcpw_tipping_box_container.btcpw_widget {
                background-color: <?php echo ($instance['background_color'] ? ($instance['background_color']) : '');
                                    ?>;
                width: <?php echo esc_html($dimension[0]) . 'px !important';
                        ?>;
                height: <?php echo esc_html($dimension[1]) . 'px !important';
                        ?>;
                background-image: url(<?php echo ($background ? ($background) : '');
                                        ?>);

            }


            #btcpw_tipping__button_btcpw_widget {
                color: <?php echo ($instance['button_text_color']);
                        ?>;
                background: <?php echo ($instance['button_color']);
                            ?>;
            }

            #tipping_form_box_widget fieldset div.btcpw_tipping_box_header_container h6 {
                color: <?php echo ($instance['title_text_color']);
                        ?>
            }



            #tipping_form_box_widget fieldset div p {
                color: <?php echo ($instance['description_color']);
                        ?>
            }

            #tipping_form_box_widget fieldset div.btcpw_tipping_box_header_container,
            #button {
                background-color: <?php echo ($instance['hf_color']);
                                    ?>;
            }

            #tipping_form_box_widget fieldset h6 {
                color: <?php echo ($instance['tipping_text_color']);
                        ?>;
            }

            .btcpw_tipping_free_input.btcpw_widget {
                background-color: <?php echo ($instance['input_background']);
                                    ?>;
            }
        </style>
        <div id="btcpw_page">
            <div class="btcpw_tipping_box_container btcpw_widget">

                <form method="POST" action="" id="tipping_form_box_widget">
                    <fieldset>
                        <div class="btcpw_tipping_box_header_container">
                            <?php if ($logo) : ?>
                                <div id="btcpw_box_widget_logo_wrap">
                                    <img width="70" height="70" alt="Tipping logo" src=<?php echo ($logo); ?> />
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
                        <div class="btcpw_tipping_box_info_container">

                        </div>
                        <h6><?php echo (!empty($instance['tipping_text']) ? $instance['tipping_text'] : ''); ?></h6>
                        <div class="btcpw_tipping_box_amount">

                            <div class="btcpw_tipping_free_input btcpw_widget">
                                <input type="number" id="btcpw_tipping_amount_btcpw_widget" name="btcpw_tipping_amount_btcpw_widget" placeholder="0.00" required />


                                <select required name="btcpw_tipping_currency_btcpw_widget" id="btcpw_tipping_currency_btcpw_widget">
                                    <option disabled value="">Select currency</option>
                                    <?php foreach ($supported_currencies as $currency) : ?>
                                        <option <?php echo $instance['currency'] === $currency ? 'selected' : ''; ?> value="<?php echo $currency; ?>">
                                            <?php echo $currency; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <i class="fas fa-arrows-alt-v"></i>

                            </div>
                            <div class="btcpw_tipping_converted_values">
                                <input type="text" id="btcpw_converted_amount_btcpw_widget" name="btcpw_converted_amount" readonly />
                                <input type="text" id="btcpw_converted_currency_btcpw_widget" name="btcpw_converted_currency" readonly />
                            </div>
                        </div>
                        <input type="hidden" id="btcpw_redirect_link_btcpw_widget" name="btcpw_redirect_link" value=<?php echo $instance['redirect']; ?> />
                        <div id="button">

                            <button type="submit" id="btcpw_tipping__button_btcpw_widget"><?php echo (!empty($instance['button_text']) ? ($instance['button_text']) : 'Tip'); ?></button>
                        </div>
                    </fieldset>

                </form>
            </div>
            <div id="powered_by_box">
                <p>Powered by <a href='https://btcpaywall.com/' target='_blank'>BTCPayWall</a></p>
            </div>
        </div>
    <?php
    }
    public function form($instance)
    {
        $dimensions = array('250x300', '300x300');
        $supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Support my
work', 'text_domain');
        $description = !empty($instance['description']) ?
            $instance['description'] : esc_html__('', 'text_domain');
        $dimension = !empty($instance['dimension']) ? $instance['dimension'] :
            esc_html__('250x300', 'text_domain');
        $currency = !empty($instance['currency']) ?
            $instance['currency'] : esc_html__('SATS', 'text_domain');
        $background_color = !empty($instance['background_color']) ? $instance['background_color']
            : esc_html__('#E6E6E6', 'text_domain');
        $title_text_color = !empty($instance['title_text_color']) ? $instance['title_text_color']
            : esc_html__('#ffffff', 'text_domain');
        $tipping_text = !empty($instance['tipping_text'])
            ? $instance['tipping_text'] : esc_html__('Enter Tipping Amount', 'text_domain');
        $tipping_text_color = !empty($instance['tipping_text_color']) ?
            $instance['tipping_text_color'] : esc_html__('#000000', 'text_domain');
        $redirect = !empty($instance['redirect']) ? $instance['redirect'] :
            esc_html__('', 'text_domain');
        $amount = !empty($instance['amount']) ?
            $instance['amount'] : esc_html__('', 'text_domain');
        $description_color = !empty($instance['description_color']) ?
            $instance['description_color'] : esc_html__('#000000', 'text_domain');
        $button_text = !empty($instance['button_text']) ? $instance['button_text'] :
            esc_html__('Tipping now', 'text_domain');
        $button_text_color = !empty($instance['button_text_color']) ?
            $instance['button_text_color'] : esc_html__('#FFFFFF', 'text_domain');
        $button_color = !empty($instance['button_color']) ? $instance['button_color'] :
            esc_html__('#FE642E', 'text_domain');
        $logo_id = !empty($instance['logo_id']) ?
            $instance['logo_id'] : esc_html__('https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg', 'text_domain');
        $background_id = !empty($instance['background_id']) ? $instance['background_id'] :
            esc_html__('', 'text_domain');
        $logo = wp_get_attachment_image_src($logo_id);
        $background = wp_get_attachment_image_src($background_id);
        $hf_color = !empty($instance['hf_color']) ? $instance['hf_color'] :
            esc_html__('#1d5aa3', 'text_domain');
        $input_background = !empty($instance['input_background']) ? $instance['input_background']
            : esc_html__('#ffa500', 'text_domain'); ?>
        <div class="tipping_box">
            <h1>Tipping</h1>
            <div class="row">
                <label for="<?php echo esc_attr($this->get_field_id('dimension')); ?>"><?php echo esc_html__('Dimension', 'text_domain'); ?></label>

                <select required id="<?php echo esc_attr($this->get_field_id('dimension')); ?>" name="<?php echo esc_attr($this->get_field_name('dimension')); ?>" type="text" value="<?php echo esc_attr($dimension); ?>">
                    <option disabled value="">
                        <?php echo esc_html__('Select dimension:', 'text_domain'); ?></option>
                    <?php foreach ($dimensions as $dim) : ?>
                        <option <?php echo $dimension === $dim ? 'selected' : ''; ?> value="<?php echo $dim; ?>">
                            <?php echo $dim; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('background_image')); ?>"><?php echo esc_html__('Background image', 'text_domain'); ?></label>
                </div>
                <div class="col-50">
                    <?php if ($background) : ?>
                        <button class="widget-tipping-basic-upload_box_image" name="lnpw_tipping_button_image_background"><img width="100" height="100" alt="Tipping box background" src="<?php echo $background[0]; ?>" /></a></button>
                        <button class="widget-tipping-basic-remove_box_image">
                            <?php echo esc_html__('Remove', 'text_domain'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-background_id" id="<?php echo esc_attr($this->get_field_id('background_id')); ?>" name="<?php echo esc_attr($this->get_field_name('background_id')); ?>" type="text" value="<?php echo esc_attr($background_id); ?>" />
                    <?php else : ?>
                        <button class="widget-tipping-basic-upload_box_image" name="lnpw_tipping_button_image_background"><?php echo esc_html__('Upload', 'text_domain'); ?></button>
                        <button class="widget-tipping-basic-remove_box_image" style="display:none"><?php echo esc_html__('Remove', 'text_domain'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-background_id" id="<?php echo esc_attr($this->get_field_id('background_id')); ?>" name="<?php echo esc_attr($this->get_field_name('background_id')); ?>" type="text" value="<?php echo esc_attr($background_id); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('background_color')); ?>"><?php echo esc_html__('Background color', 'text_domain'); ?></label>
                </div>
                <div class="col-50">
                    <input id="<?php echo esc_attr($this->get_field_id('background_color')); ?>" class="widget-tipping-basic-background_color" name="<?php echo esc_attr($this->get_field_name('background_color')); ?>" type="text" value="<?php echo esc_attr($background_color); ?>" type="text" />
                </div>
            </div>
            <div class="row">
                <label for="<?php echo esc_attr($this->get_field_id('hf_color')); ?>"><?php echo esc_html__('Header and footer background color', 'text_domain'); ?></label>

                <input id="<?php echo esc_attr($this->get_field_id('hf_color')); ?>" class="widget-tipping-basic-box-hf_color" name="<?php echo esc_attr($this->get_field_name('hf_color')); ?>" type="text" value="<?php echo esc_attr($hf_color); ?>" />

            </div>
            <h3><?php echo esc_html__('Description', 'text_domain'); ?></h3>

            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('logo')); ?>"><?php echo esc_html__('Tipping logo', 'text_domain'); ?></label>
                </div>
                <div class="col-50">
                    <?php if ($logo_id) : ?>
                        <button class="widget-tipping-basic-upload_box_logo" name="lnpw_tipping_button_image"><img alt="Tipping box logo" src="<?php echo $logo[0]; ?>" /></a></button>
                        <button class="widget-tipping-basic-remove_box_image"><?php echo esc_html__('Remove', 'text_domain'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-logo_id" id="<?php echo esc_attr($this->get_field_id('logo_id')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_id')); ?>" type="text" value="<?php echo esc_attr($logo_id); ?>" />
                    <?php else : ?>
                        <button class="widget-tipping-basic-upload_box_logo" name="lnpw_tipping_button_image"><?php echo esc_html__('Upload', 'text_domain'); ?></button>
                        <button class="widget-tipping-basic-remove_box_image" style="display:none"><?php echo esc_html__('Remove', 'text_domain'); ?></button>
                        <input type="hidden" class="widget-tipping-basic-logo_id" id="<?php echo esc_attr($this->get_field_id('logo_id')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_id')); ?>" type="text" value="<?php echo esc_attr($logo_id); ?>" />
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
                    <input id="<?php echo esc_attr($this->get_field_id('title_text_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_text_color')); ?>" class="widget-tipping-basic-title_text_color" type="text" value="<?php echo esc_attr($title_text_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php echo esc_html__('Description:', 'text_domain'); ?></label>
                    <textarea id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text"><?php echo esc_html($description); ?></textarea>
                </div>
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('description_color')); ?>"><?php echo esc_html__('Description text color:', 'text_domain'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('description_color')); ?>" name="<?php echo esc_attr($this->get_field_name('description_color')); ?>" class="widget-tipping-basic-description-color" type="text" value="<?php echo esc_attr($description_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('tipping_text')); ?>"><?php echo esc_html__('Tipping text', 'text_domain'); ?></label>
                    <textarea id="<?php echo esc_attr($this->get_field_id('tipping_text')); ?>" name="<?php echo esc_attr($this->get_field_name('tipping_text')); ?>" type="text"><?php echo esc_html($tipping_text); ?></textarea>
                </div>
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('tipping_text_color')); ?>"><?php echo esc_html__('Tipping text color', 'text_domain'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('tipping_text_color')); ?>" name="<?php echo esc_attr($this->get_field_name('tipping_text_color')); ?>" type="text" class="widget-tipping-basic-tipping-color" value="<?php echo esc_attr($tipping_text_color); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('redirect')); ?>"><?php echo esc_html__('Link to Thank you page', 'text_domain'); ?></label>

                    <input id="<?php echo esc_attr($this->get_field_id('redirect')); ?>" name="<?php echo esc_attr($this->get_field_name('redirect')); ?>" class="widget-tipping-basic_redirect" type="text" value="<?php echo esc_attr($redirect); ?>" />
                </div>
            </div>

            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('currency')); ?>"><?php echo esc_html__('Currency', 'text_domain'); ?></label>
                    <select required id="<?php echo esc_attr($this->get_field_id('currency')); ?>" name="<?php echo esc_attr($this->get_field_name('currency')); ?>" value="<?php echo esc_attr($title); ?>">>
                        <option disabled value="">
                            <?php echo esc_html__('Select currency', 'text_domain'); ?></option>
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
                    <label for="<?php echo esc_attr($this->get_field_id('input_background')); ?>"><?php echo esc_html__('Background color for free amount', 'text_domain'); ?></label>
                    <input id="<?php echo esc_attr($this->get_field_id('input_background')); ?>" name="<?php echo esc_attr($this->get_field_name('input_background')); ?>" type="text" class="widget-tipping-basic-input_background" value="<?php echo esc_attr($input_background); ?>" />
                </div>
            </div>
            <h3><?php echo esc_html__('Button', 'text_domain'); ?></h3>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('button_text')); ?>"><?php echo esc_html__('Button text', 'text_domain'); ?></label>

                    <textarea id="<?php echo esc_attr($this->get_field_id('button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('button_text')); ?>" type="text" value="<?php echo esc_attr($button_text); ?>"><?php echo esc_html($button_text); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <label for="<?php echo esc_attr($this->get_field_id('button_text_color')); ?>"><?php echo esc_html__('Button text color', 'text_domain'); ?></label>
                </div>
                <div class="col-50">
                    <input id="<?php echo esc_attr($this->get_field_id('button_text_color')); ?>" class="widget-tipping-basic-button_text_color" name="<?php echo esc_attr($this->get_field_name('button_text_color')); ?>" type="text" value="<?php echo esc_attr($button_text_color); ?>" />

                </div>
            </div>


            <div class="row">
                <label for="<?php echo esc_attr($this->get_field_id('button_color')); ?>"><?php echo esc_html__('Button color', 'text_domain'); ?></label>

                <input id="<?php echo esc_attr($this->get_field_id('button_color')); ?>" class="widget-tipping-basic-button_color" name="<?php echo esc_attr($this->get_field_name('button_color')); ?>" type="text" value="<?php echo esc_attr($button_color); ?>" />

            </div>


        </div>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['dimension'] = (!empty($new_instance['dimension'])) ? $new_instance['dimension'] : '';

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
        $instance['hf_color'] = !empty($new_instance['hf_color']) ? wp_strip_all_tags($new_instance['hf_color']) : '';
        $instance['logo_id'] = !empty($new_instance['logo_id']) ? $new_instance['logo_id'] : '';
        $instance['background_id'] = !empty($new_instance['background_id']) ? $new_instance['background_id'] : '';
        $instance['hf_color'] = !empty($new_instance['hf_color']) ? wp_strip_all_tags($new_instance['hf_color']) : '';
        $instance['input_background'] = !empty($new_instance['input_background']) ? $new_instance['input_background'] : '';

        return $instance;
    }
}
$my_widget = new Tipping_Box();


?>