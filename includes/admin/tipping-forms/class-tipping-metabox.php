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
        if (array_key_exists('wporg_field', $_POST)) {
            update_post_meta(
                $post_id,
                '_wporg_meta_key',
                $_POST['wporg_field']
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


?>
        <div class="btcpaywall_metabox_wrap">
            <ul class="btcpaywall_metabox_wrap_metabox_tabs">
                <li class="current" data-tab="tab-1">Template</li>
                <li data-tab="tab-2">Appearance</li>
                <li data-tab="tab-3">Fields</li>
            </ul>
            <div id="tab-1" class="btcpaywall_options_wrap btcpaywall_tabset current">
                <div class="btcpaywall_tipping_templates">
                    <div class="btcpaywall_template_tipping_box">
                        <h4>Tipping Box - 250x300/300x300</h4>
                        <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-box.png'; ?>">
                        <div>
                            <button>Activate</button>
                        </div>
                    </div>
                    <div class="btcpaywall_template_tipping_banner_high">
                        <h4>Tipping Banner High - 200x710</h4>
                        <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-banner-high.png'; ?>">
                        <div>
                            <button>Activate</button>
                        </div>
                    </div>
                    <div class="btcpaywall_template_tipping_banner_wide">
                        <h4>Tipping Banner Wide - 600x200</h4>
                        <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-banner-wide.png'; ?>">
                        <div>
                            <button>Activate</button>
                        </div>
                    </div>
                    <div class="btcpaywall_template_tipping_page">
                        <h4>Tipping Page - 520x600</h4>
                        <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-page.png'; ?>">
                        <div>
                            <button>Activate</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="btcpaywall_options_wrap btcpaywall_tabset">
                <div class="btcpaywall_template_appearance">
                    <div data-id="global" class="btcpaywall_container_header">
                        <h2>Global</h2>
                    </div>
                    <div class="btcpaywall_container_body global-body">
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_button_background"><?php echo __('Background image', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <?php if ('') : ?>
                                    <button id="btcpaywall_tipping_button_background" class="btcpaywall_tipping_button_background" name="btcpaywall_tipping_button_background"><img src="<?php echo esc_url([][0]); ?>" height=100px width=100px /></a></button>
                                    <button class="btcpaywall_tipping_button_remove_background">Remove background</button>
                                    <input type="hidden" id="btcpaywall_tipping_background" class="btcpaywall_tipping_background" name="btcpaywall_tipping_image_background" value=<?php echo esc_attr([]['logo']); ?> />
                                <?php else : ?>
                                    <button id="btcpaywall_tipping_button_background" class="btcpaywall_tipping_button_background" name="btcpaywall_tipping_button_background">Upload</button>
                                    <button class="btcpaywall_tipping_button_remove_background" style="display:none">Remove background</button>
                                    <input type="hidden" id="btcpaywall_tipping_background" class="btcpaywall_tipping_background" name="btcpaywall_tipping_image_background" value=<?php echo esc_attr([]['logo']); ?> />
                                <?php endif; ?>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_text_header_footer_background">Background color for header and footer</label>
                                <span title="This color will be used as background for header and footer section." class="btcpaywall_helper_tip"></span>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_text_header_footer_background" name="btcpaywall_tipping_text_header_footer_background" />
                            </div>
                        </fieldset>
                    </div>
                    <div data-id="header" class="btcpaywall_container_header">
                        <h2>Header</h2>
                    </div>
                    <div class="btcpaywall_container_body header-body">
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_button_logo"><?php echo __('Logo', 'btcpaywall'); ?></label>
                            </div>
                            <div>
                                <?php if ('') : ?>
                                    <button id="btcpaywall_tipping_button_logo" class="btcpaywall_tipping_button_logo" name="btcpaywall_tipping_button_logo"><img src="<?php echo esc_url([][0]); ?>" height=100px width=100px /></a></button>
                                    <button class="btcpaywall_tipping_button_remove_logo">Remove logo</button>
                                    <input type="hidden" id="btcpaywall_tipping_logo" class="btcpaywall_tipping_logo" name="btcpaywall_tipping_image_logo" value=<?php echo esc_attr([]['logo']); ?> />
                                <?php else : ?>
                                    <button id="btcpaywall_tipping_button_logo" class="btcpaywall_tipping_button_logo" name="btcpaywall_tipping_button_logo">Upload</button>
                                    <button class="btcpaywall_tipping_button_remove_logo" style="display:none">Remove logo</button>
                                    <input type="hidden" id="btcpaywall_tipping_logo" class="btcpaywall_tipping_logo" name="btcpaywall_tipping_image_logo" value=<?php echo esc_attr([]['logo']); ?> />
                                <?php endif; ?>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_title">Title</label>
                            </div>
                            <div>
                                <textarea id="btcpaywall_tipping_text_title" name="btcpw_tipping_text_title"></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_color_title">Title text color</label>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_color_title" name="btcpw_tipping_color_title" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_text_description">Description</label>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_text_description" name="btcpaywall_tipping_text_description" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_color_description">Description text color</label>
                            </div>
                            <div>
                                <input type="text" id="btcpaywall_tipping_color_description" name="btcpaywall_tipping_color_description" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_text_progress_bar_step1">Step 1</label>
                                <span title="Text for first step in progress bar. The progress bar is positioned underneath the header." class="btcpaywall_helper_tip"></span>
                            </div>
                            <div>
                                <textarea id="btcpaywall_tipping_text_progress_bar_step1" name="btcpaywall_tipping_text_progress_bar_step1">Step 1</textarea>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_color_progress_bar_step1">Step 1 color</label>
                            </div>
                            <div>
                                <input id="btcpaywall_tipping_color_progress_bar_step1" name="btcpaywall_tipping_color_progress_bar_step1" type="text" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_text_progress_bar_step2">Step 2</label>
                                <span title="Text for second step in progress bar." class="btcpaywall_helper_tip"></span>

                            </div>
                            <div>
                                <textarea id="btcpaywall_tipping_text_progress_bar_step2" name="btcpaywall_tipping_text_progress_bar_step2">Step2</textarea>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpaywall_tipping_color_progress_bar_step2">Step 2 color</label>
                            </div>
                            <div>
                                <input id="btcpaywall_tipping_color_progress_bar_step2" name="btcpaywall_tipping_color_progress_bar_step2" type="text" />
                            </div>
                        </fieldset>
                    </div>
                    <div data-id="main" class="btcpaywall_container_header">
                        <h2>Main</h2>
                    </div>
                    <div class="btcpaywall_container_body main-body">
                        <div class="btcpaywall_template_main">
                            <fieldset class="btcpaywall_field_wrap">
                                <div>
                                    <label for="btcpaywall_tipping_text_main">Tipping text</label>
                                    <span title="This text will be displayed in the main area, above input fields." class="btcpaywall_helper_tip"></span>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_text_main" name="btcpaywall_tipping_text_main" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap">
                                <div>
                                    <label for="btcpaywall_tipping_color_main">Tipping text color</label>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_color_main" name="btcpaywall_tipping_color_main" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap">
                                <div>
                                    <label for="btcpaywall_tipping_color_amounts">Input background color</label>
                                    <span title="This color will be used as background for all price fields." class="btcpaywall_helper_tip"></span>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_color_amounts" name="btcpaywall_tipping_color_amounts" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div data-id="footer" class="btcpaywall_container_header">
                        <h2>Footer</h2>
                    </div>
                    <div class="btcpaywall_container_body footer-body">
                        <div class="btcpaywall_template_footer">
                            <fieldset class="btcpaywall_field_wrap">
                                <div>
                                    <label for="btcpaywall_tipping_text_button">Button text</label>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_text_button" name="btcpaywall_tipping_text_button" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap">
                                <div>
                                    <label for="btcpaywall_tipping_color_button_text">Button text color</label>
                                </div>
                                <div>
                                    <input type="text" id="btcpaywall_tipping_color_button_text" name="btcpaywall_tipping_color_button_text" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap">
                                <div>
                                    <label for="btcpaywall_tipping_color_button">Button color</label>
                                </div>
                                <div>
                                    <input id="btcpaywall_tipping_color_button" name="btcpaywall_tipping_color_button" type="text" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-3" class="btcpaywall_options_wrap btcpaywall_tabset">
                <fieldset class="btcpaywall_field_wrap">
                    <div>
                        <label for="btcpaywall_tipping_text_currency">Currency</label>
                        <span title="Currency value is used as starting value for conversion rate. Donors can change it and see conversion rate based on that." class="btcpaywall_helper_tip"></span>
                    </div>
                    <div>
                        <input id="btcpaywall_tipping_text_currency" name="btcpaywall_tipping_text_currency" type="text" />
                    </div>
                </fieldset>
                <fieldset class="btcpaywall_field_wrap">
                    <div>
                        <label for="btcpaywall_tipping_bool_free_input">Free input of amount</label>
                        <span title="Do you want to allow donors to enter custom amount for donation?" class="btcpaywall_helper_tip"></span>
                    </div>
                    <div>
                        <input type="checkbox" id="btcpaywall_tipping_bool_free_input" name="btcpaywall_tipping_bool_free_input" value="true" />
                    </div>
                </fieldset>
                <fieldset class="btcpaywall_field_wrap">
                    <div>
                        <label for="btcpaywall_tipping_text_thankyou">Link to Thank you page</label>
                    </div>
                    <div>
                        <input type="text" id="btcpaywall_tipping_text_thankyou" name="btcpaywall_tipping_text_thankyou" />
                    </div>
                </fieldset>

                <div data-id="fixed-amount" class="btcpaywall_container_header">
                    <h2>Fixed amount</h2>
                </div>
                <div class="btcpaywall_container_body fixed-amount-body">

                    <fieldset class="btcpaywall_field_wrap">
                        <div>
                            <label for="btcpaywall_tipping_bool_show_icons">Show icons</label>
                            <span title="Do you want do display Font Awesome icons next to the fixed amount fields?" class="btcpaywall_helper_tip"></span>
                        </div>
                        <div>
                            <input type="checkbox" id="btcpaywall_tipping_bool_show_icons" name="btcpaywall_tipping_bool_show_icons" value="true" />
                        </div>
                    </fieldset>
                    <fieldset class="btcpaywall_field_wrap">
                        <label>Default amount 1</label>
                        <input type="checkbox" id="btcpaywall_tipping_bool_show_default_amount_1" name="btcpaywall_tipping_bool_show_default_amount_1" value="true" />
                        <input type="number" min=0 placeholder="Default Amount 1" step=1 name="btcpaywall_tipping_number_default_amount_1" id="btcpaywall_tipping_number_default_amount_1">
                        <select required name="btcpaywall_tipping_text_default_currency_1" id="btcpaywall_tipping_text_default_currency_1">
                            <option disabled value="">Select currency</option>
                            <?php foreach (['SATS', "USD"] as $currency) : ?>
                                <option value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" id="btcpaywall_tipping_text_default_icon_1" name="btcpaywall_tipping_text_default_icon_1" placeholder="Font Awesome 5 Icon" title="Enter Font Awesome 5 Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </fieldset>
                    <fieldset class="btcpaywall_field_wrap">
                        <label>Default amount 2</label>
                        <input type="checkbox" id="btcpaywall_tipping_bool_show_default_amount_2" name="btcpaywall_tipping_bool_show_default_amount_2" value="true" />
                        <input type="number" min=0 placeholder="Default Amount 2" step=1 name="btcpaywall_tipping_number_default_amount_2" id="btcpaywall_tipping_number_default_amount_2">
                        <select required name="btcpaywall_tipping_text_default_currency_2" id="btcpaywall_tipping_text_default_currency_2">
                            <option disabled value="">Select currency</option>
                            <?php foreach (['SATS', "USD"] as $currency) : ?>
                                <option value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" id="btcpaywall_tipping_text_default_icon_2" name="btcpaywall_tipping_text_default_icon_2" placeholder="Font Awesome 5 Icon" title="Enter Font Awesome 5 Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </fieldset>
                    <fieldset class="btcpaywall_field_wrap">
                        <label>Default amount 3</label>
                        <input type="checkbox" id="btcpaywall_tipping_bool_show_default_amount_3" name="btcpaywall_tipping_bool_show_default_amount_3" value="true" />
                        <input type="number" min=0 placeholder="Default Amount 3" step=1 name="btcpaywall_tipping_number_default_amount_3" id="btcpaywall_tipping_number_default_amount_3">
                        <select required name="btcpaywall_tipping_text_default_currency_3" id="btcpaywall_tipping_text_default_currency_3">
                            <option disabled value="">Select currency</option>
                            <?php foreach (['SATS', "USD"] as $currency) : ?>
                                <option value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" id="btcpaywall_tipping_text_default_icon_3" name="btcpaywall_tipping_text_default_icon_3" placeholder="Font Awesome 5 Icon" title="Enter Font Awesome 5 Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </fieldset>
                </div>
                <div data-id="donor" class="btcpaywall_container_header">
                    <h2>Donor information</h2>
                </div>
                <div class="btcpaywall_container_body donor-body">
                    <div class="btcpaywall_template_donor_information">
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <p>Full name</p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_name">Display</label>

                                <input type="checkbox" name="btcpaywall_tipping_bool_display_name" value="true" />

                                <label for="btcpaywall_tipping_bool_mandatory_name">Mandatory</label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_name" value="true" />
                            </div>

                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <p>Email</p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_email">Display</label>

                                <input type="checkbox" name="btcpaywall_tipping_bool_display_email" value="true" />

                                <label for="btcpaywall_tipping_bool_mandatory_email">Mandatory</label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_email" value="true" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <p>Address</p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_address">Display</label>

                                <input type="checkbox" name="btcpaywall_tipping_bool_display_address" value="true" />

                                <label for="btcpaywall_tipping_bool_mandatory_email">Mandatory</label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_email" value="true" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <p>Phone number</p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_phone">Display</label>

                                <input type="checkbox" name="btcpaywall_tipping_bool_display_phone" value="true" />

                                <label for="btcpaywall_tipping_bool_mandatory_phone">Mandatory</label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_phone" value="true" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <p>Message</p>
                            </div>
                            <div>
                                <label for="btcpaywall_tipping_bool_display_message">Display</label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_display_message" value="true" />

                                <label for="btcpaywall_tipping_bool_mandatory_message">Mandatory</label>
                                <input type="checkbox" name="btcpaywall_tipping_bool_mandatory_message" value="true" />
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
