<?php

/**
 * Donation form metabox
 *
 * @package     BTCPayWall
 * @subpackage  Admin/Donation_Forms_Metabox
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0.5
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;


/**
 * Donation_Forms_Metabox class.
 *
 * @since 1.0.5
 *
 */
class Donation_Forms_Metabox
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_box'], 10);
        add_action('save_post', [$this, 'save']);
        add_action('post_submitbox_misc_actions', [$this, 'add_shortcode_to_publish_metabox']);
        add_action('add_meta_boxes', [$this, 'set_default_values'], 10);
    }
    /**
     * Set up and add the meta box.
     */
    public function add_meta_box()
    {
        add_meta_box(
            'btcpaywall_donation_form',
            __('Donation Form', 'btcpaywall'),
            [$this, 'html'],
            'btcpw_donation',
            'normal',
            'high'
        );
    }


    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    public function save(int $post_id)
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
        $fields = Donation_Forms_Metabox::get_fields();
        foreach ($fields as $field) {
            if (strpos($field['name'], 'btcpaywall_tipping_number') !== false) {
                if (!empty($_POST[$field['name']])) {
                    update_post_meta($post_id, $field['name'], intval($_POST[$field['name']]));
                } else {
                    delete_post_meta($post_id, $field['name']);
                }
            } elseif (strpos($field['name'], 'btcpaywall_tipping_bool') !== false) {
                if (!empty($_POST[$field['name']])) {
                    $new_value = filter_var($_POST[$field['name']], FILTER_VALIDATE_BOOLEAN);
                    update_post_meta($post_id, $field['name'], $new_value);
                } else {
                    delete_post_meta($post_id, $field['name']);
                }
            } else {
                if (!empty($_POST[$field['name']])) {
                    $new_value = sanitize_text_field($_POST[$field['name']]);
                    update_post_meta($post_id, $field['name'], $new_value);
                } else {
                    delete_post_meta($post_id, $field['name']);
                }
            }
        }
    }

    /**
     * @since 1.0.5
     */

    public static function get_fields()
    {

        $fields = [
            ["name" => "btcpaywall_tipping_text_template_name"],
            [
                "name" => "btcpaywall_tipping_text_dimension",
                "std" => "250x300"
            ],
            [
                "name" => "btcpaywall_tipping_text_background",
                "std" => ""
            ],
            [
                "name" => "btcpaywall_tipping_color_background",
                "std" => "#E6E6E6"
            ],
            [
                "name" => "btcpaywall_tipping_color_header_footer_background",
                "std" => "#1d5aa3"
            ],
            [
                "name" => "btcpaywall_tipping_text_logo"
            ],
            [
                "name" => "btcpaywall_tipping_text_title",
                "std" => "Support my work"
            ],
            [
                "name" => "btcpaywall_tipping_color_title",
                "std" => "#ffffff"
            ],
            [
                "name" => "btcpaywall_tipping_text_description",
                "std" => ""
            ],
            [
                "name" => "btcpaywall_tipping_color_description",
                "std" => "#000000"
            ],
            [
                "name" => "btcpaywall_tipping_text_progress_bar_step1",
                "std" => "Pledge"
            ],
            [
                "name" => "btcpaywall_tipping_text_progress_bar_step2",
                "std" => "Info"
            ],
            [
                "name" => "btcpaywall_tipping_color_progress_bar_step1",
                "std" => "#808080"
            ],
            [
                "name" => "btcpaywall_tipping_color_progress_bar_step2",
                "std" => "#D3D3D3"
            ],
            [
                "name" => "btcpaywall_tipping_text_main",
                "std" => "Enter Tipping Amount"
            ],
            [
                "name" => "btcpaywall_tipping_color_main",
                "std" => "#000000"
            ],
            [
                "name" => "btcpaywall_tipping_color_amounts",
                "std" => "#ffa500"
            ],
            [
                "name" => "btcpaywall_tipping_color_selected_amount",
                "std" => "#000"
            ],
            [
                "name" => "btcpaywall_tipping_text_button",
                "std" => "Tipping now"
            ],
            [
                "name" => "btcpaywall_tipping_color_button_text",
                "std" => "#FFFFFF"
            ],
            [
                "name" => "btcpaywall_tipping_color_button",
                "std" => "#FE642E"
            ],
            [
                "name" => "btcpaywall_tipping_color_button_hover",
                "std" => "#FFF"
            ],
            [
                "name" => "btcpaywall_tipping_text_continue_button",
                "std" => "Continue"
            ],
            [
                "name" => "btcpaywall_tipping_color_continue_button_text",
                "std" => "#FFFFFF"
            ],
            [
                "name" => "btcpaywall_tipping_color_continue_button",
                "std" => "#FE642E"
            ],
            [
                "name" => "btcpaywall_tipping_color_continue_button_hover",
                "std" => "#FFF"
            ],
            [
                "name" => "btcpaywall_tipping_text_previous_button",
                "std" => "Previous"
            ],
            [
                "name" => "btcpaywall_tipping_color_previous_button_text",
                "std" => "#FFFFFF"
            ],
            [
                "name" => "btcpaywall_tipping_color_previous_button",
                "std" => "#1d5aa3"
            ],
            [
                "name" => "btcpaywall_tipping_color_previous_button_hover",
                "std" => "#FFF"
            ],
            [
                "name" => "btcpaywall_tipping_text_currency",
                "std" => "SATS"
            ],
            [
                "name" => "btcpaywall_tipping_bool_free_input",
                "std" => true
            ],
            ["name" => "btcpaywall_tipping_text_thankyou"],
            [
                "name" => "btcpaywall_tipping_bool_show_icons",
                "std" => true
            ],
            [
                "name" => "btcpaywall_tipping_bool_show_default_amount_1",
                "std" => true
            ],
            [
                "name" => "btcpaywall_tipping_number_default_amount_1",
                "std" => 1000
            ],
            [
                "name" => "btcpaywall_tipping_text_default_currency_1",
                "std" => "SATS"
            ],
            [
                "name" => "btcpaywall_tipping_text_default_icon_1",
                "std" => "fas fa-coffee"
            ],
            [
                "name" => "btcpaywall_tipping_bool_show_default_amount_2",
                "std" => true
            ],
            [
                "name" => "btcpaywall_tipping_number_default_amount_2",
                "std" => 2000
            ],
            [
                "name" => "btcpaywall_tipping_text_default_currency_2",
                "std" => "SATS"
            ],
            [
                "name" => "btcpaywall_tipping_text_default_icon_2",
                "std" => "fas fa-beer"
            ],
            [
                "name" => "btcpaywall_tipping_bool_show_default_amount_3",
                "std" => true
            ],
            [
                "name" => "btcpaywall_tipping_number_default_amount_3",
                "std" => 3000
            ],
            [
                "name" => "btcpaywall_tipping_text_default_currency_3",
                "std" => "SATS"
            ],
            [
                "name" => "btcpaywall_tipping_text_default_icon_3",
                "std" => "fas fa-cocktail"
            ],
            [
                "name" => "btcpaywall_tipping_bool_display_name",
                "std" => true
            ],
            [
                "name" => "btcpaywall_tipping_bool_mandatory_name",
                "std" => false
            ],
            [
                "name" => "btcpaywall_tipping_bool_display_email",
                "std" => true
            ],
            [
                "name" => "btcpaywall_tipping_bool_mandatory_email",
                "std" => false
            ],
            [
                "name" => "btcpaywall_tipping_bool_display_address",
                "std" => true
            ],
            [
                "name" => "btcpaywall_tipping_bool_mandatory_address",
                "std" => false
            ],
            [
                "name" => "btcpaywall_tipping_bool_display_phone",
                "std" => true
            ],
            [
                "name" => "btcpaywall_tipping_bool_mandatory_phone",
                "std" => false
            ],
            [
                "name" => "btcpaywall_tipping_bool_display_message",
                "std" => true
            ],
            [
                "name" => "btcpaywall_tipping_bool_mandatory_message",
                "std" => false
            ]
        ];
        return $fields;
    }

    public function add_shortcode_to_publish_metabox()
    {

        if ('btcpw_donation' !== get_post_type()) {
            return false;
        }
        global $post;

        if ('btcpw_donation' === $post->post_type) {
            $template = get_post_meta($post->ID, 'btcpaywall_tipping_text_template_name', true);
            $shortcode = btcpaywall_output_shortcode_attributes($template, $post->ID);
            printf(
                '<div class="misc-pub-section"><button type="button" class="button hint-tooltip hint--top js-btcpaywall-shortcode-button" aria-label="%1$s" data-btcpaywall-shortcode="%2$s"><span class="dashicons dashicons-admin-page"></span> %3$s</button></div>',
                esc_attr($shortcode),
                esc_attr($shortcode),
                esc_html__('Copy Shortcode', 'give')
            );
        }
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
        $template = $stored_data['btcpaywall_tipping_text_template_name'][0];
        $templates = array(
            'btcpaywall_tipping_box' => 'Tipping Box',
            'btcpaywall_tipping_banner_wide' => 'Tipping Banner Wide',
            'btcpaywall_tipping_banner_high' => 'Tipping Banner High',
            'btcpaywall_tipping_page' => 'Donation Page'
        );
        $template_name = isset($templates[$template]) ? $templates[$template] : null;
        $supported_currencies = BTCPayWall::CURRENCIES;
        $dimensions = ['250x300', '300x300'];
        $used_currency = $stored_data['btcpaywall_tipping_text_currency'][0];
        $amount_1_currency = $stored_data['btcpaywall_tipping_text_default_currency_1'][0];
        $amount_2_currency = $stored_data['btcpaywall_tipping_text_default_currency_2'][0];
        $amount_3_currency = $stored_data['btcpaywall_tipping_text_default_currency_3'][0];
        $logo = wp_get_attachment_image_src($stored_data['btcpaywall_tipping_text_logo'][0]);
        $background = wp_get_attachment_image_src($stored_data['btcpaywall_tipping_text_background'][0]);
?>
        <style>
            .btcpaywall_tipping_box {
                display: <?php echo $template === 'btcpaywall_tipping_box' ? 'flex' : 'none' ?>;
            }

            .btcpaywall_tipping_banner_and_page {
                display: <?php echo ($template !== 'btcpaywall_tipping_box' && !empty($template)) ? 'flex' : 'none' ?>;
            }

            .btcpaywall_tipping_banner_and_box {
                display: <?php echo ($template !== 'btcpaywall_tipping_page' && !empty($template)) ? 'flex' : 'none' ?>;
            }

            .btcpaywall_tipping_page {
                display: <?php echo $template === 'btcpaywall_tipping_page' ? 'flex' : 'none' ?>;
            }

            .btcpaywall_container_header[data-id=fixed-amount],
            .btcpaywall_container_header[data-id=donor] {
                display: <?php echo ($template !== 'btcpaywall_tipping_box' && !empty($template)) ? 'block' : 'none' ?>;
            }

            .btcpaywall_tipping_selected_template {
                display: <?php echo !empty($stored_data['btcpaywall_tipping_text_template_name'][0]) ? 'flex' : 'none'; ?>
            }

            .btcpaywall_tipping_templates {
                display: <?php echo empty($stored_data['btcpaywall_tipping_text_template_name'][0]) ? 'flex' : 'none'; ?>
            }

            #btcpaywall_template_appearance-wrap {
                display: <?php echo !empty($stored_data['btcpaywall_tipping_text_template_name'][0]) ? 'block' : 'none'; ?>
            }
        </style>

        <div class="btcpaywall_metabox_wrap">

            <div id="tab-1" class="btcpaywall_options_wrap btcpaywall_tabset current">

                <div class="btcpaywall_tipping_selected_template">
                    <div>
                        <?php echo esc_html($template_name); ?>
                    </div>

                    <?php if ($post->post_status !== 'publish') : ?>
                        <button type="button"><?php echo esc_html__('Change template', 'btcpaywall'); ?></button>
                    <?php endif; ?>
                </div>


                <div class="btcpaywall_tipping_templates">
                    <input type="hidden" name="btcpaywall_tipping_text_template_name" id="btcpaywall_tipping_template_name" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_template_name'][0]); ?>">
                    <h2><?php echo esc_html__('Select a template', 'btcpaywall'); ?></h2>
                    <table>
                        <thead>
                            <tr>
                                <th><?php echo esc_html__('Template', 'btcpaywall'); ?></th>
                                <th><?php echo esc_html__('Description', 'btcpaywall'); ?></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="btcpaywall_template_tipping_box">
                                <td class="btcpaywall_tipping_image_wrap">

                                    <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/dist/img/Tipping-box.png'; ?>">
                                </td>
                                <td>
                                    <p>Tipping Box - 250x300/300x300</p>
                                </td>

                                <td>
                                    <button data-id="btcpaywall_tipping_box" type="button"><?php echo esc_html__('Set up', 'btcpaywall'); ?></button>
                                </td>
                            </tr>
                            <tr class="btcpaywall_template_tipping_banner_high">
                                <td class="btcpaywall_tipping_image_wrap">

                                    <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/dist/img/Tipping-banner-high.png'; ?>">
                                </td>
                                <td>
                                    <p>Tipping Banner High - 200x710</p>
                                </td>

                                <td>
                                    <button data-id="btcpaywall_tipping_banner_high" type="button"><?php echo esc_html__('Set up', 'btcpaywall'); ?></button>
                                </td>
                            </tr>
                            <tr class="btcpaywall_template_tipping_banner_wide">
                                <td class="btcpaywall_tipping_image_wrap">

                                    <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/dist/img/Tipping-banner-wide.png'; ?>">
                                </td>
                                <td>
                                    <p>Tipping Banner Wide - 600x200</p>
                                </td>

                                <td>
                                    <button data-id="btcpaywall_tipping_banner_wide" type="button"><?php echo esc_html__('Set up', 'btcpaywall'); ?></button>
                                </td>
                            </tr>
                            <tr class="btcpaywall_template_tipping_page">
                                <td class="btcpaywall_tipping_image_wrap">
                                    <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/dist/img/Tipping-page.png'; ?>">
                                </td>
                                <td>
                                    <p>Donation Page - 520x600</p>
                                </td>

                                <td>
                                    <button data-id="btcpaywall_tipping_page" type="button"><?php echo esc_html__('Set up', 'btcpaywall'); ?></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="btcpaywall_template_appearance-wrap" class="btcpaywall_options_wrap btcpaywall_tabset">
                    <div class="btcpaywall_template_appearance">
                        <div class="btcpaywall_template_helper">
                            <p><?php echo wp_kses('Customize the form and go to the Publish section in the right sidebar to preview, publish, update or copy the shortcode for this form. Shortcode will be produced after publishing. For further information visit <a href=https://btcpaywall.com/tipping-module/ target=_blank>https://btcpaywall.com/tipping-module</a>', array('a'      => [
                                    'href'  => [],
                                    'title' => [],
                                    'target' => [],
                                ]));; ?></p>
                        </div>
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
                        <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
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
                                <input type="text" id="btcpaywall_tipping_text_thankyou" name="btcpaywall_tipping_text_thankyou" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_thankyou'][0] ?? ''); ?>" />
                            </div>
                        </fieldset>
                        <div data-id="global" class="btcpaywall_container_header">
                            <h2><?php echo __('Global', 'btcpaywall'); ?></h2>
                        </div>
                        <div class="btcpaywall_container_body global-body">
                            <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_box">
                                <div>
                                    <label for="btcpaywall_tipping_text_dimension"><?php echo __('Dimension', 'btcpaywall'); ?></label>
                                </div>
                                <div>
                                    <select required name="btcpaywall_tipping_text_dimension" id="btcpaywall_tipping_text_dimension">
                                        <option disabled value=""><?php echo __('Select dimension', 'btcpaywall'); ?></option>
                                        <?php foreach ($dimensions as $dimension) : ?>
                                            <option <?php echo $stored_data['btcpaywall_tipping_text_dimension'][0] === $dimension ? 'selected' : ''; ?> value="<?php echo esc_attr($dimension); ?>">
                                                <?php echo esc_html($dimension); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
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
                            <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_box">
                                <div>
                                    <label for="btcpaywall_tipping_text_description"><?php echo __('Description', 'btcpaywall'); ?></label>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_text_description" name="btcpaywall_tipping_text_description" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_description'][0] ?? ""); ?>" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_box">
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
                                    <label for="btcpaywall_tipping_color_progress_bar_step1"><?php echo __('Background color for active step', 'btcpaywall'); ?></label>
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
                                    <label for="btcpaywall_tipping_color_progress_bar_step2"><?php echo __('Background color for inactive step', 'btcpaywall'); ?></label>
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
                                        <label for="btcpaywall_tipping_color_amounts"><?php echo __('Primary color for amount', 'btcpaywall'); ?></label>
                                        <span title="This color will be used as background color for all unselected amount fields and as a text and border color for selected amount field." class="btcpaywall_helper_tip"></span>
                                    </div>
                                    <div>
                                        <input type="text" id="btcpaywall_tipping_color_amounts" name="btcpaywall_tipping_color_amounts" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_amounts'][0]); ?>" />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <label for="btcpaywall_tipping_color_selected_amount"><?php echo __('Secondary color for amount ', 'btcpaywall'); ?></label>
                                        <span title="This color will be used as background color for selected amount field and as a text and border color for all unselected amount fields." class="btcpaywall_helper_tip"></span>
                                    </div>
                                    <div>
                                        <input type="text" id="btcpaywall_tipping_color_selected_amount" name="btcpaywall_tipping_color_selected_amount" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_selected_amount'][0]); ?>" />
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
                                <fieldset class="btcpaywall_field_wrap common">
                                    <div>
                                        <label for="btcpaywall_tipping_color_button_hover"><?php echo __('Button color on hover', 'btcpaywall'); ?></label>
                                    </div>
                                    <div>
                                        <input id="btcpaywall_tipping_color_button_hover" name="btcpaywall_tipping_color_button_hover" type="text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_button_hover'][0]); ?>" />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <label for="btcpaywall_tipping_text_continue_button"><?php echo __('Continue button text', 'btcpaywall'); ?></label>
                                    </div>
                                    <div>
                                        <input type="text" id="btcpaywall_tipping_text_continue_button" name="btcpaywall_tipping_text_continue_button" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_continue_button'][0]); ?>" />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <label for="btcpaywall_tipping_color_continue_button_text"><?php echo __('Continue button text color', 'btcpaywall'); ?></label>
                                    </div>
                                    <div>
                                        <input type="text" id="btcpaywall_tipping_color_continue_button_text" name="btcpaywall_tipping_color_continue_button_text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_continue_button_text'][0]); ?>" />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <label for="btcpaywall_tipping_color_continue_button"><?php echo __('Continue button color', 'btcpaywall'); ?></label>
                                    </div>
                                    <div>
                                        <input id="btcpaywall_tipping_color_continue_button" name="btcpaywall_tipping_color_continue_button" type="text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_continue_button'][0]); ?>" />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <label for="btcpaywall_tipping_color_continue_button_hover"><?php echo __('Continue button color on hover', 'btcpaywall'); ?></label>
                                    </div>
                                    <div>
                                        <input id="btcpaywall_tipping_color_continue_button_hover" name="btcpaywall_tipping_color_continue_button_hover" type="text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_continue_button_hover'][0]); ?>" />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <label for="btcpaywall_tipping_text_previous_button"><?php echo __('Previous button text', 'btcpaywall'); ?></label>
                                    </div>
                                    <div>
                                        <input type="text" id="btcpaywall_tipping_text_previous_button" name="btcpaywall_tipping_text_previous_button" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_text_previous_button'][0]); ?>" />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <label for="btcpaywall_tipping_color_previous_button_text"><?php echo __('Previous button text color', 'btcpaywall'); ?></label>
                                    </div>
                                    <div>
                                        <input type="text" id="btcpaywall_tipping_color_previous_button_text" name="btcpaywall_tipping_color_previous_button_text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_previous_button_text'][0]); ?>" />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <label for="btcpaywall_tipping_color_previous_button"><?php echo __('Previous button color', 'btcpaywall'); ?></label>
                                    </div>
                                    <div>
                                        <input id="btcpaywall_tipping_color_previous_button" name="btcpaywall_tipping_color_previous_button" type="text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_previous_button'][0]); ?>" />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap common btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <label for="btcpaywall_tipping_color_previous_button_hover"><?php echo __('Previous button color on hover', 'btcpaywall'); ?></label>
                                    </div>
                                    <div>
                                        <input id="btcpaywall_tipping_color_previous_button_hover" name="btcpaywall_tipping_color_previous_button_hover" type="text" value="<?php echo esc_attr($stored_data['btcpaywall_tipping_color_previous_button_hover'][0]); ?>" />
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div data-id="fixed-amount" class="btcpaywall_container_header">
                            <h2><?php echo __('Fixed amount', 'btcpaywall'); ?> <span class="btcpaywall_helper_tip" title="Define whether to display fields with a fixed amount in the form."></span></h2>
                        </div>
                        <div class="btcpaywall_container_body fixed-amount-body">

                            <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
                                <div>
                                    <label for="btcpaywall_tipping_bool_show_icons"><?php echo __('Show icons', 'btcpaywall'); ?></label>
                                    <span title="Do you want do display Font Awesome icons next to the fixed amount fields?" class="btcpaywall_helper_tip"></span>
                                </div>
                                <div>
                                    <input type="checkbox" id="btcpaywall_tipping_bool_show_icons" <?php checked($stored_data['btcpaywall_tipping_bool_show_icons'][0]); ?> name="btcpaywall_tipping_bool_show_icons" value="true" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
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
                            <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
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
                            <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
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
                            <h2><?php echo __('Donor information', 'btcpaywall'); ?><span class="btcpaywall_helper_tip" title="Select which information about donors you want to collect by clicking on the checkboxes. Check the display if you want to make the field optional, or check both checkboxes if you want to make it mandatory."></span></h2>
                        </div>
                        <div class="btcpaywall_container_body donor-body">
                            <div class="btcpaywall_template_donor_information">
                                <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <p><?php echo __('Full name', 'btcpaywall'); ?></p>
                                    </div>
                                    <div>
                                        <label for="btcpaywall_tipping_bool_display_name"><?php echo __('Display', 'btcpaywall'); ?></label>

                                        <input type="checkbox" name="btcpaywall_tipping_bool_display_name" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_name'][0] ?? false); ?> />

                                        <label for="btcpaywall_tipping_bool_mandatory_name"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                        <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_name" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_name'][0] ?? false); ?> />
                                    </div>

                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <p><?php echo __('Email', 'btcpaywall'); ?></p>
                                    </div>
                                    <div>
                                        <label for="btcpaywall_tipping_bool_display_email"><?php echo __('Display', 'btcpaywall'); ?></label>

                                        <input type="checkbox" name="btcpaywall_tipping_bool_display_email" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_email'][0] ?? false); ?> />

                                        <label for="btcpaywall_tipping_bool_mandatory_email"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                        <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_email" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_email'][0] ?? false); ?> />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <p><?php echo __('Address', 'btcpaywall'); ?></p>
                                    </div>
                                    <div>
                                        <label for="btcpaywall_tipping_bool_display_address"><?php echo __('Display', 'btcpaywall'); ?></label>

                                        <input type="checkbox" name="btcpaywall_tipping_bool_display_address" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_address'][0] ?? false); ?> />

                                        <label for="btcpaywall_tipping_bool_mandatory_email"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                        <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_email" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_address'][0] ?? false); ?> />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <p><?php echo __('Phone number', 'btcpaywall'); ?></p>
                                    </div>
                                    <div>
                                        <label for="btcpaywall_tipping_bool_display_phone"><?php echo __('Display', 'btcpaywall'); ?></label>

                                        <input type="checkbox" name="btcpaywall_tipping_bool_display_phone" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_phone'][0] ?? false); ?> />

                                        <label for="btcpaywall_tipping_bool_mandatory_phone"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                        <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_phone" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_phone'][0] ?? false); ?> />
                                    </div>
                                </fieldset>
                                <fieldset class="btcpaywall_field_wrap btcpaywall_tipping_banner_and_page">
                                    <div>
                                        <p><?php echo __('Message', 'btcpaywall'); ?></p>
                                    </div>
                                    <div>
                                        <label for="btcpaywall_tipping_bool_display_message"><?php echo __('Display', 'btcpaywall'); ?></label>
                                        <input type="checkbox" name="btcpaywall_tipping_bool_display_message" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_display_message'][0] ?? false); ?> />

                                        <label for="btcpaywall_tipping_bool_mandatory_message"><?php echo __('Mandatory', 'btcpaywall'); ?></label>
                                        <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_message" value="true" <?php checked($stored_data['btcpaywall_tipping_bool_mandatory_message'][0] ?? false); ?> />
                                    </div>
                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>
        <?php
    }
    public function set_default_values()
    {
        $post_type = get_post_type(get_the_ID());
        if (get_post_meta(get_the_ID(), 'btcpaywall_default_values_set_once', true) == true || $post_type !== 'btcpw_donation') {
            return;
        }
        $fields = Donation_Forms_Metabox::get_fields();
        foreach ($fields as $field) {
            $value = $field['std'] ?? '';
            update_post_meta(get_the_ID(), $field['name'], $value);
        }
        update_post_meta(get_the_ID(), 'btcpaywall_default_values_set_once', true);
    }
}
new Donation_Forms_Metabox();
