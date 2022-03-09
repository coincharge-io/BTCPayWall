<?php

/**
 * Tipping form metabox
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Tipping_Forms_Metabox
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0.5
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;


/**
 * Tipping_Forms_Metabox class.
 *
 * @since 1.0.5
 *
 */
class Tipping_Forms_Metabox
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_box'], 10);
        add_action('save_post', [$this, 'save']);
    }
    /**
     * Set up and add the meta box.
     */
    public function add_meta_box()
    {
        add_meta_box(
            'btcpaywall_tipping_form',
            __('Tipping Form', 'btcpaywall'),
            [$this, 'html'],
            'tipping',
            'normal',
            'high'
        );
    }


    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    public static function save(int $post_id)
    {
        if (empty($post_id)) {
            return;
        }

        if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post_id)) || is_int(wp_is_post_autosave($post_id))) {
            return;
        }
        if (!isset($_POST['btcpaywall_tipping_nonce']) || !wp_verify_nonce(sanitize_text_field($_POST['btcpaywall_tipping_nonce']), basename(__FILE__))) {
            return;
        }
        $fields = Tipping_Forms_Metabox::get_fiels();
        foreach ($fields as $field) {
            if (strpos($field, 'btcpaywall_tipping_number')) {
                if (!empty($_POST[$field])) {
                    update_post_meta($post_id, $field, intval($_POST[$field]));
                } else {
                    delete_post_meta($post_id, $field);
                }
            } elseif (strpos($field, 'btcpaywall_tipping_bool')) {
                if (!empty($_POST[$field])) {
                    $new_value = filter_var($_POST[$field], FILTER_VALIDATE_BOOLEAN);
                    update_post_meta($post_id, $field, $new_value);
                } else {
                    delete_post_meta($post_id, $field);
                }
            } else {
                if (!empty($_POST[$field])) {
                    $new_value = sanitize_text_field($_POST[$field]);
                    update_post_meta($post_id, $field, $new_value);
                } else {
                    delete_post_meta($post_id, $field);
                }
            }
        }
    }

    /**
     * @since 1.0.5
     */

    public static function get_fiels()
    {
        $fields = [
            "btcpaywall_tipping_text_template_name",
            "btcpaywall_tipping_text_dimension",
            "btcpaywall_tipping_text_background",
            "btcpaywall_tipping_color_background",
            "btcpaywall_tipping_color_header_footer_background",
            "btcpaywall_tipping_text_logo",
            "btcpaywall_tipping_text_title",
            "btcpaywall_tipping_color_title",
            "btcpaywall_tipping_text_description",
            "btcpaywall_tipping_color_description",
            "btcpaywall_tipping_text_progress_bar_step1",
            "btcpaywall_tipping_text_progress_bar_step2",
            "btcpaywall_tipping_color_progress_bar_step1",
            "btcpaywall_tipping_color_progress_bar_step2",
            "btcpaywall_tipping_text_main",
            "btcpaywall_tipping_color_main",
            "btcpaywall_tipping_color_amounts",
            "btcpaywall_tipping_text_button",
            "btcpaywall_tipping_color_button_text",
            "btcpaywall_tipping_color_button",
            "btcpaywall_tipping_text_currency",
            "btcpaywall_tipping_bool_free_input",
            "btcpaywall_tipping_text_thankyou",
            "btcpaywall_tipping_bool_show_icons",
            "btcpaywall_tipping_bool_show_default_amount_1",
            "btcpaywall_tipping_number_default_amount_1",
            "btcpaywall_tipping_text_default_currency_1",
            "btcpaywall_tipping_text_default_icon_1",
            "btcpaywall_tipping_bool_show_default_amount_2",
            "btcpaywall_tipping_number_default_amount_2",
            "btcpaywall_tipping_text_default_currency_2",
            "btcpaywall_tipping_text_default_icon_2",
            "btcpaywall_tipping_bool_show_default_amount_3",
            "btcpaywall_tipping_number_default_amount_3",
            "btcpaywall_tipping_text_default_currency_3",
            "btcpaywall_tipping_text_default_icon_3",
            "btcpaywall_tipping_bool_display_name",
            "btcpaywall_tipping_bool_mandatory_name",
            "btcpaywall_tipping_bool_display_email",
            "btcpaywall_tipping_bool_mandatory_email",
            "btcpaywall_tipping_bool_display_address",
            "btcpaywall_tipping_bool_mandatory_address",
            "btcpaywall_tipping_bool_display_phone",
            "btcpaywall_tipping_bool_mandatory_phone",
            "btcpaywall_tipping_bool_display_message",
            "btcpaywall_tipping_bool_mandatory_message"
        ];
        return $fields;
    }
    /**
     * Display the meta box HTML to the user.
     *
     * @param \WP_Post $post   Post object.
     */
    public function html($post)
    {
        wp_nonce_field(basename(__FILE__), 'btcpaywall_tipping_nonce');
        $stored_data = get_post_meta($post->ID);
        $supported_currencies = BTCPayWall::TIPPING_CURRENCIES;
        $used_currency = $stored_data['btcpaywall_tipping_text_currency'][0];
        $amount_1_currency = $stored_data['btcpaywall_tipping_text_default_currency_1'][0];
        $amount_2_currency = $stored_data['btcpaywall_tipping_text_default_currency_2'][0];
        $amount_3_currency = $stored_data['btcpaywall_tipping_text_default_currency_3'][0];
        $logo = wp_get_attachment_image_src($stored_data['btcpaywall_tipping_text_logo'][0]);
        $background = wp_get_attachment_image_src($stored_data['btcpaywall_tipping_text_background'][0]);
?>
        <div class="btcpaywall_metabox_wrap">
            <ul class="btcpaywall_metabox_wrap_metabox_tabs">
                <li class="current" data-tab="tab-1">Template</li>
                <li data-tab="tab-2">Appearance</li>
                <li data-tab="tab-3">Fields</li>
            </ul>
            <div id="tab-1" class="btcpaywall_options_wrap btcpaywall_tabset current">
                <div class="btcpaywall_tipping_templates">
                    <input type="hidden" name="btcpaywall_tipping_text_template_name" id="btcpaywall_tipping_template_name" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_template_name']); ?>">
                    <div class="btcpaywall_template_tipping_box">
                        <h4>Tipping Box - 250x300/300x300</h4>
                        <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-box.png'; ?>">
                        <div>
                            <button data-id="btcpaywall_tipping_box" type="button">Activate</button>
                        </div>
                    </div>
                    <div class="btcpaywall_template_tipping_banner_high">
                        <h4>Tipping Banner High - 200x710</h4>
                        <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-banner-high.png'; ?>">
                        <div>
                            <button data-id="btcpaywall_tipping_banner_high" type="button">Activate</button>
                        </div>
                    </div>
                    <div class="btcpaywall_template_tipping_banner_wide">
                        <h4>Tipping Banner Wide - 600x200</h4>
                        <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-banner-wide.png'; ?>">
                        <div>
                            <button data-id="btcpaywall_tipping_banner_wide" type="button">Activate</button>
                        </div>
                    </div>
                    <div class="btcpaywall_template_tipping_page">
                        <h4>Tipping Page - 520x600</h4>
                        <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-page.png'; ?>">
                        <div>
                            <button data-id="btcpaywall_tipping_page" type="button">Activate</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="btcpaywall_options_wrap btcpaywall_tabset">
                <div class="btcpaywall_template_appearance">
                    <div data-id="global" class="btcpaywall_container_header">
                        <h2><?php echo __('Global', 'btcpaywall'); ?></h2>
                    </div>
                    <div class="btcpaywall_container_body global-body">
                        <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_box">
                            <div>
                                <label for="btcpaywall_tipping_text_dimension"><?php echo __('Dimension', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_text_dimension" name="btcpaywall_tipping_text_dimension" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_dimension'][0]); ?>" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap common">
                            <div>
                                <label for="btcpaywall_tipping_text_button_background"><?php echo __('Background image', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <?php if ($background) : ?>
                                    <button id="btcpaywall_tipping_text_button_background" class="btcpaywall_tipping_text_button_background" name="btcpaywall_tipping_button_background"><img src="<?php echo esc_url($background[0]); ?>" height=100px width=100px /></a></button>
                                    <button class="btcpaywall_tipping_button_remove_background"><?php echo __('Remove background', 'btcpaywall'); ?></button>
                                    <input type="hidden" id="btcpaywall_tipping_background" class="btcpaywall_tipping_background" name="btcpaywall_tipping_text_background" value=<?php echo esc_attr($stored_data['btcpaywall_tipping_text_background'][0]); ?> />
                                <?php else : ?>
                                    <button id="btcpaywall_tipping_text_button_background" class="btcpaywall_tipping_text_button_background" name="btcpaywall_tipping_button_background">Upload</button>
                                    <button class="btcpaywall_tipping_button_remove_background" style="display:none"><?php echo __('Remove background', 'btcpaywall'); ?></button>
                                    <input type="hidden" id="btcpaywall_tipping_background" class="btcpaywall_tipping_background" name="btcpaywall_tipping_text_background" value=<?php echo esc_attr($stored_data['btcpaywall_tipping_text_background'][0]); ?> />
                                <?php endif; ?>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap common">
                            <div>
                                <label for="btcpaywall_tipping_color_background"><?php echo __('Background color', 'btcpaywall'); ?></label>
                                <span title="This color will be used as background." class="btcpaywall_helper_tip"></span>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_color_background" name="btcpaywall_tipping_color_background" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_background'][0]); ?>" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap common">
                            <div>
                                <label for="btcpaywall_tipping_color_header_footer_background"><?php echo __('Background color for header and footer', 'btcpaywall'); ?></label>
                                <span title="This color will be used as background for header and footer section." class="btcpaywall_helper_tip"></span>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_color_header_footer_background" name="btcpaywall_tipping_color_header_footer_background" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_header_footer_background'][0]); ?>" />
                            </div>
                        </fieldset>
                    </div>
                    <div data-id="header" class="btcpaywall_container_header">
                        <h2><?php echo __('Header', 'btcpaywall'); ?></h2>
                    </div>
                    <div class="btcpaywall_container_body header-body">
                        <fieldset class="btcpaywall_field_wrap common">
                            <div>
                                <label for="btcpaywall_tipping_text_button_logo"><?php echo __('Logo', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <?php if ($logo) : ?>
                                    <button id="btcpaywall_tipping_text_button_logo" class="btcpaywall_tipping_text_button_logo" name="btcpaywall_tipping_text_button_logo"><img src="<?php echo esc_url($logo[0]); ?>" height=100px width=100px /></a></button>
                                    <button class="btcpaywall_tipping_button_remove_logo"><?php echo __('Remove logo', 'btcpaywall'); ?></button>
                                    <input type="hidden" id="btcpaywall_tipping_logo" class="btcpaywall_tipping_logo" name="btcpaywall_tipping_text_logo" value=<?php echo esc_attr($stored_data['btcpaywall_tipping_text_logo'][0]); ?> />
                                <?php else : ?>
                                    <button id="btcpaywall_tipping_text_button_logo" class="btcpaywall_tipping_text_button_logo" name="btcpaywall_tipping_text_button_logo">Upload</button>
                                    <button class="btcpaywall_tipping_button_remove_logo" style="display:none"><?php echo __('Remove logo', 'btcpaywall'); ?></button>
                                    <input type="hidden" id="btcpaywall_tipping_logo" class="btcpaywall_tipping_logo" name="btcpaywall_tipping_text_logo" value=<?php echo esc_attr($stored_data['btcpaywall_tipping_text_logo'][0]); ?> />
                                <?php endif; ?>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap common">
                            <div>
                                <label for="btcpaywall_tipping_text_title"><?php echo __('Title', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <textarea id="btcpaywall_tipping_text_title" name="btcpaywall_tipping_text_title"><?php echo esc_html($stored_data['btcpaywall_tipping_text_title'][0]); ?></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap common">
                            <div>
                                <label for="btcpaywall_tipping_color_title"><?php echo __('Title color', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_color_title" name="btcpaywall_tipping_color_title" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_title'][0]); ?>" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap common">
                            <div>
                                <label for="btcpaywall_tipping_text_description"><?php echo __('Description', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_text_description" name="btcpaywall_tipping_text_description" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_description'][0]); ?>" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap common">
                            <div>
                                <label for="btcpaywall_tipping_color_description"><?php echo __('Description color', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_color_description" name="btcpaywall_tipping_color_description" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_description'][0]); ?>" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_page">
                            <div>
                                <label for="btcpaywall_tipping_text_progress_bar_step1"><?php echo __('Step 1', 'btcpaywall'); ?></label>
                                <span title="Text for first step in progress bar. The progress bar is positioned underneath the header." class="btcpaywall_helper_tip"></span>
                            </div>
                            <div>
                                <textarea id="btcpaywall_tipping_text_progress_bar_step1" name="btcpaywall_tipping_text_progress_bar_step1"><?php echo esc_html($stored_data['btcpaywall_tipping_text_progress_bar_step1'][0]); ?></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_page">
                            <div>
                                <label for="btcpaywall_tipping_color_progress_bar_step1"><?php echo __('Step 1 color', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <input id="btcpaywall_tipping_color_progress_bar_step1" name="btcpaywall_tipping_color_progress_bar_step1" type="text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_progress_bar_step1'][0]); ?>" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_page">
                            <div>
                                <label for="btcpaywall_tipping_text_progress_bar_step2"><?php echo __('Step 2', 'btcpaywall'); ?></label>
                                <span title="Text for second step in progress bar." class="btcpaywall_helper_tip"></span>

                            </div>
                            <div>
                                <textarea id="btcpaywall_tipping_text_progress_bar_step2" name="btcpaywall_tipping_text_progress_bar_step2"><?php echo esc_html($stored_data['btcpaywall_tipping_text_progress_bar_step2'][0]); ?></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_page">
                            <div>
                                <label for="btcpaywall_tipping_color_progress_bar_step2"><?php echo __('Step 2 color', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <input id="btcpaywall_tipping_color_progress_bar_step2" name="btcpaywall_tipping_color_progress_bar_step2" type="text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_progress_bar_step2'][0]); ?>" />
                            </div>
                        </fieldset>
                    </div>
                    <div data-id="main" class="btcpaywall_container_header">
                        <h2><?php echo __('Main', 'btcpaywall'); ?></h2>
                    </div>
                    <div class="btcpaywall_container_body main-body">
                        <div class="btcpaywall_template_main">
                            <fieldset class="btcpaywall_field_wrap common">
                                <div>
                                    <label for="btcpaywall_tipping_text_main"><?php echo __('Main text', 'btcpaywall'); ?></label>
                                    <span title="This text will be displayed in the main area, above input fields." class="btcpaywall_helper_tip"></span>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_text_main" name="btcpaywall_tipping_text_main" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_main'][0]); ?>" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap common">
                                <div>
                                    <label for="btcpaywall_tipping_color_main"><?php echo __('Main text color', 'btcpaywall'); ?></label>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_color_main" name="btcpaywall_tipping_color_main" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_main'][0]); ?>" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap common">
                                <div>
                                    <label for="btcpaywall_tipping_color_amounts"><?php echo __('Amount fields background color', 'btcpaywall'); ?></label>
                                    <span title="This color will be used as background for all amount fields." class="btcpaywall_helper_tip"></span>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_color_amounts" name="btcpaywall_tipping_color_amounts" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_amounts'][0]); ?>" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div data-id="footer" class="btcpaywall_container_header">
                        <h2><?php echo __('Footer', 'btcpaywall'); ?></h2>
                    </div>
                    <div class="btcpaywall_container_body footer-body">
                        <div class="btcpaywall_template_footer">
                            <fieldset class="btcpaywall_field_wrap common">
                                <div>
                                    <label for="btcpaywall_tipping_text_button"><?php echo __('Button text', 'btcpaywall'); ?></label>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_text_button" name="btcpaywall_tipping_text_button" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_button'][0]); ?>" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap common">
                                <div>
                                    <label for="btcpaywall_tipping_color_button_text"><?php echo __('Button text color', 'btcpaywall'); ?></label>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_color_button_text" name="btcpaywall_tipping_color_button_text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_button_text'][0]); ?>" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap common">
                                <div>
                                    <label for="btcpaywall_tipping_color_button"><?php echo __('Button color', 'btcpaywall'); ?></label>
                                </div>
                                <div>
                                    <input id="btcpaywall_tipping_color_button" name="btcpaywall_tipping_color_button" type="text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_button'][0]); ?>" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-3" class="btcpaywall_options_wrap btcpaywall_tabset">
                <fieldset class="btcpaywall_field_wrap common">
                    <div>
                        <label for="btcpaywall_tipping_text_currency"><?php echo __('Currency', 'btcpaywall'); ?></label>
                        <span title="Currency value is used as starting value for conversion rate. Donors can change it and see conversion rate based on that." class="btcpaywall_helper_tip"></span>
                    </div>
                    <div>
                        <select required name="btcpaywall_tipping_text_currency" id="btcpaywall_tipping_text_currency">
                            <option disabled value=""><?php echo __('Select currency', 'btcpaywall'); ?></option>
                            <?php foreach ($supported_currencies as $currency) : ?>
                                <option <?php echo $used_currency === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="btcpaywall_field_wrap">
                    <div>
                        <label for="btcpaywall_tipping_bool_free_input"><?php echo __('Free input of amount', 'btcpaywall'); ?></label>
                        <span title="Do you want to allow donors to enter custom amount for donation?" class="btcpaywall_helper_tip"></span>
                    </div>
                    <div>
                        <input type="checkbox" id="btcpaywall_tipping_bool_free_input" <?php checked($stored_data['btcpaywall_tipping_bool_free_input'][0]); ?>name="btcpaywall_tipping_bool_free_input" value="true" />
                    </div>
                </fieldset>
                <fieldset class="btcpaywall_field_wrap common">
                    <div>
                        <label for="btcpaywall_tipping_text_thankyou"><?php echo __('Link to Thank you page', 'btcpaywall'); ?></label>
                    </div>
                    <div>
                        <input type="text" id="btcpaywall_tipping_text_thankyou" name="btcpaywall_tipping_text_thankyou" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_thankyou'][0]); ?>" />
                    </div>
                </fieldset>
                <div data-id="fixed-amount" class="btcpaywall_container_header">
                    <h2><?php echo __('Fixed amount', 'btcpaywall'); ?></h2>
                </div>
                <div class="btcpaywall_container_body fixed-amount-body">

                    <fieldset class="btcpaywall_field_wrap banner_and_page">
                        <div>
                            <label for="btcpaywall_tipping_bool_show_icons"><?php echo __('Show icons', 'btcpaywall'); ?></label>
                            <span title="Do you want do display Font Awesome icons next to the fixed amount fields?" class="btcpaywall_helper_tip"></span>
                        </div>
                        <div>
                            <input type="checkbox" id="btcpaywall_tipping_bool_show_icons" <?php checked($stored_data['btcpaywall_tipping_bool_show_icons'][0]); ?> name="btcpaywall_tipping_bool_show_icons" value="true" />
                        </div>
                    </fieldset>
                    <fieldset class="btcpaywall_field_wrap banner_and_page">
                        <label><?php echo __('Default amount 1', 'btcpaywall'); ?></label>
                        <input type="checkbox" id="btcpaywall_tipping_bool_show_default_amount_1" name="btcpaywall_tipping_bool_show_default_amount_1" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_show_default_amount_1'][0]); ?> />
                        <input type="number" min=0 placeholder="Default Amount 1" step=1 name="btcpaywall_tipping_number_default_amount_1" id="btcpaywall_tipping_number_default_amount_1" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_number_default_amount_1'][0]); ?>">
                        <select required name="btcpaywall_tipping_text_default_currency_1" id="btcpaywall_tipping_text_default_currency_1">
                            <option disabled value=""><?php echo __('Select currency', 'btcpaywall'); ?></option>
                            <?php foreach ($supported_currencies as $currency) : ?>
                                <option <?php echo $amount_1_currency === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <input type="text" id="btcpaywall_tipping_text_default_icon_1" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_default_icon_1'][0]); ?>" name="btcpaywall_tipping_text_default_icon_1" placeholder="Font Awesome 5 Icon" title="Enter Font Awesome 5 Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </fieldset>
                    <fieldset class="btcpaywall_field_wrap banner_and_page">
                        <label><?php echo __('Default amount 2', 'btcpaywall'); ?></label>
                        <input type="checkbox" id="btcpaywall_tipping_bool_show_default_amount_2" name="btcpaywall_tipping_bool_show_default_amount_2" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_show_default_amount_2'][0]); ?> />
                        <input type="number" min=0 placeholder="Default Amount 2" step=1 name="btcpaywall_tipping_number_default_amount_2" id="btcpaywall_tipping_number_default_amount_2" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_number_default_amount_2'][0]); ?>">
                        <select required name="btcpaywall_tipping_text_default_currency_2" id="btcpaywall_tipping_text_default_currency_2">
                            <option disabled value=""><?php echo __('Select currency', 'btcpaywall'); ?></option>
                            <?php foreach ($supported_currencies as $currency) : ?>
                                <option <?php echo $amount_2_currency === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" id="btcpaywall_tipping_text_default_icon_2" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_default_icon_2'][0]); ?>" name="btcpaywall_tipping_text_default_icon_2" placeholder="Font Awesome 5 Icon" title="Enter Font Awesome 5 Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </fieldset>
                    <fieldset class="btcpaywall_field_wrap banner_and_page">
                        <label><?php echo __('Default amount 3', 'btcpaywall'); ?></label>
                        <input type="checkbox" id="btcpaywall_tipping_bool_show_default_amount_3" name="btcpaywall_tipping_bool_show_default_amount_3" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_show_default_amount_3'][0]); ?> />
                        <input type="number" min=0 placeholder="Default Amount 3" step=1 name="btcpaywall_tipping_number_default_amount_3" id="btcpaywall_tipping_number_default_amount_3" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_number_default_amount_3'][0]); ?>">
                        <select required name="btcpaywall_tipping_text_default_currency_3" id="btcpaywall_tipping_text_default_currency_3">
                            <option disabled value=""><?php echo __('Select currency', 'btcpaywall'); ?></option>
                            <?php foreach ($supported_currencies as $currency) : ?>
                                <option <?php echo $amount_3_currency === $currency ? 'selected' : ''; ?> value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" id="btcpaywall_tipping_text_default_icon_3" name="btcpaywall_tipping_text_default_icon_3" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_default_icon_3'][0]); ?>" placeholder="Font Awesome 5 Icon" title="Enter Font Awesome 5 Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </fieldset>
                </div>
                <div data-id="donor" class="btcpaywall_container_header">
                    <h2><?php echo __('Donor information', 'btcpaywall'); ?></h2>
                </div>
                <div class="btcpaywall_container_body donor-body">
                    <div class="btcpaywall_template_donor_information">
                        <fieldset class="btcpaywall_field_wrap banner_and_page">
                            <div>
                                <p><?php echo __('Full name', 'btcpaywall'); ?></p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_name"><?php echo __('Display', 'btcpaywall'); ?></label>

                                <input type="checkbox" name="btcpaywall_tipping_bool_display_name" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_name'][0]); ?> />

                                <label for="btcpaywall_tipping_bool_mandatory_name"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_name" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_name'][0]); ?> />
                            </div>

                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap banner_and_page">
                            <div>
                                <p><?php echo __('Email', 'btcpaywall'); ?></p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_email"><?php echo __('Display', 'btcpaywall'); ?></label>

                                <input type="checkbox" name="btcpaywall_tipping_bool_display_email" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_email'][0]); ?> />

                                <label for="btcpaywall_tipping_bool_mandatory_email"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_email" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_email'][0]); ?> />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap banner_and_page">
                            <div>
                                <p><?php echo __('Address', 'btcpaywall'); ?></p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_address"><?php echo __('Display', 'btcpaywall'); ?></label>

                                <input type="checkbox" name="btcpaywall_tipping_bool_display_address" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_address'][0]); ?> />

                                <label for="btcpaywall_tipping_bool_mandatory_email"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_email" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_address'][0]); ?> />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap banner_and_page">
                            <div>
                                <p><?php echo __('Phone number', 'btcpaywall'); ?></p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_phone"><?php echo __('Display', 'btcpaywall'); ?></label>

                                <input type="checkbox" name="btcpaywall_tipping_bool_display_phone" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_phone'][0]); ?> />

                                <label for="btcpaywall_tipping_bool_mandatory_phone"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_phone" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_phone'][0]); ?> />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap banner_and_page">
                            <div>
                                <p><?php echo __('Message', 'btcpaywall'); ?></p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_message"><?php echo __('Display', 'btcpaywall'); ?></label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_display_message" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_message'][0]); ?> />

                                <label for="btcpaywall_tipping_bool_mandatory_message"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_message" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_message'][0]); ?> />
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
new Tipping_Forms_Metabox();
