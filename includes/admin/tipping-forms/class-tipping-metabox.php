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
            'btcpw_tipping_form',
            __('Tipping Form', 'btcpaywall'),
            [$this, 'html'],
            'tipping',
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
        wp_nonce_field(basename(__FILE__), 'btcpw_tipping_nonce');


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
                        <div>
                            <h4>Tipping Box</h4>
                            <p>Dimension 250x300/300x300</p>
                            <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-box.png'; ?>">
                            <div>
                                <button>Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="btcpaywall_template_tipping_banner_high">
                        <div>
                            <h4>Tipping Banner High</h4>
                            <p>Dimension 200x710</p>
                            <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-banner-high.png'; ?>">
                            <div>
                                <button>Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="btcpaywall_template_tipping_banner_wide">
                        <div>
                            <h4>Tipping Banner Wide</h4>
                            <p>Dimension 600x200</p>
                            <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-banner-wide.png'; ?>">
                            <div>
                                <button>Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="btcpaywall_template_tipping_page">
                        <div>
                            <h4>Tipping Page</h4>
                            <p>Dimension 520x600</p>
                            <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-page.png'; ?>">
                            <div>
                                <button>Activate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="btcpaywall_options_wrap btcpaywall_tabset">
                <div class="btcpaywall_template_appearance">
                    <div data-id="header" class="btcpaywall_container_header">
                        <h2>Header</h2>
                    </div>
                    <div class="btcpaywall_container_body header-body">
                        <fieldset class="btcpaywall_field_wrap">
                            <label>Logo</label>
                            <input value="bla" />
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <label>Title</label>
                            <input value="bla" />
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Title text color</label>
                            <input value="bla" />
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Description</label>
                            <input value="bla" />
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Description text color</label>
                            <input value="bla" />
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label for="btcpw_tipping_page_step1">Step 1</label>
                                <span title="Text for first step in progress bar. The progress bar is positioned underneath the header." class="btcpaywall_helper_tip"></span>
                            </div>
                            <div>
                                <textarea id="btcpw_tipping_page_step1" name="btcpw_tipping_page_text[step1]">Step 1</textarea>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <label>Step 1 color</label>
                            <input id="btcpw_tipping_page_tipping_color_active" class="btcpw_tipping_page_tipping_color_active" name="btcpw_tipping_page_color[active]" type="text" />
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <div>
                                <label>Step 2</label>
                                <span title="Text for second step in progress bar." class="btcpaywall_helper_tip"></span>

                            </div>
                            <div>
                                <textarea id="btcpw_tipping_page_step2" name="btcpw_tipping_page_text[step2]">Step2</textarea>
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <label>Step 2 color</label>
                            <input id="btcpw_tipping_page_tipping_color_inactive" class="btcpw_tipping_page_tipping_color_inactive" name="btcpw_tipping_page_color[inactive]" type="text" />
                        </fieldset>
                    </div>
                    <div data-id="main" class="btcpaywall_container_header">
                        <h2>Main</h2>
                    </div>
                    <div class="btcpaywall_container_body main-body">
                        <div class="btcpaywall_template_main">
                            <fieldset class="btcpaywall_field_wrap">
                                <div>
                                    <label>Tipping text</label>
                                    <span title="This text will be displayed in the main area, above input fields." class="btcpaywall_helper_tip"></span>
                                </div>
                                <div>
                                    <input value=" bla" />
                                </div>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap">
                                <label>Tipping text color</label>
                                <input value="bla" />
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap">
                                <div>
                                    <label>Input background color</label>
                                    <span title="This color will be used as background for all price fields." class="btcpaywall_helper_tip"></span>
                                </div>
                                <div>
                                    <input value="bla" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div data-id="footer" class="btcpaywall_container_header">
                        <h2>Footer</h2>
                    </div>
                    <div class="btcpaywall_container_body footer-body">
                        <div class="btcpaywall_template_footer">
                            <fieldset class="btcpaywall_field_wrap"><label>Button text</label>
                                <input value="bla" />
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap"><label>Button text color</label>
                                <input value="bla" />
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap"><label>Button color</label>
                                <input value="bla" />
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-3" class="btcpaywall_options_wrap btcpaywall_tabset">
                <fieldset class="btcpaywall_field_wrap">
                    <div>
                        <label>Currency</label>
                        <span title="Currency value is used as starting value for conversion rate. Donors can change it and see conversion rate based on that." class="btcpaywall_helper_tip"></span>
                    </div>
                    <div>
                        <input value="bla" />
                    </div>
                </fieldset>
                <fieldset class="btcpaywall_field_wrap">
                    <div>
                        <label>Free input of amount</label>
                        <span title="Do you want to allow donors to enter custom amount for donation?" class="btcpaywall_helper_tip"></span>
                    </div>
                    <div>
                        <input type="checkbox" id="btcpw_tipping_page_enter_amount" class="btcpw_tipping_page_enter_amount" name="btcpw_tipping_page_enter_amount" value="true" />
                    </div>
                </fieldset>
                <fieldset class="btcpaywall_field_wrap">
                    <label>Link to Thank you page</label>
                    <input value="bla" />
                </fieldset>
                <fieldset class="btcpaywall_field_wrap">
                    <div>
                        <label>Background color for header and footer</label>
                        <span title="This color will be used as background for header and footer section." class="btcpaywall_helper_tip"></span>
                    </div>
                    <div>
                        <input value="bla" />
                    </div>
                </fieldset>
                <div data-id="fixed-amount" class="btcpaywall_container_header">
                    <h2>Fixed amount</h2>
                </div>
                <div class="btcpaywall_container_body fixed-amount-body">

                    <fieldset class="btcpaywall_field_wrap">
                        <div>
                            <label>Show icons</label>
                            <span title="Do you want do display Font Awesome icons next to the fixed amount fields?" class="btcpaywall_helper_tip"></span>
                        </div>
                        <div>
                            <input type="checkbox" id="btcpw_tipping_page_show_icon" class="btcpw_tipping_page_show_icon" name="btcpw_tipping_page_show_icon" value="true" />
                        </div>
                    </fieldset>
                    <fieldset class="btcpaywall_field_wrap"><label>Default price1</label>
                        <input type="checkbox" id="btcpw_page_value_1_enabled" class="btcpw_fixed_amount_enable" name="btcpw_tipping_page_fixed_amount[value1][enabled]" value="true" />
                        <input type="number" min=0 placeholder="Default Price1" step=1 name="btcpw_tipping_page_fixed_amount[value1][amount]" id="btcpw_default_page_price1">
                        <select required name="btcpw_tipping_page_fixed_amount[value1][currency]" id="btcpw_default_page_currency1">
                            <option disabled value="">Select currency</option>
                            <?php foreach (['SATS', "USD"] as $currency) : ?>
                                <option value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" id="btcpw_tipping_page_icon1" class="btcpw_tipping_page_icon1" name="btcpw_tipping_page_fixed_amount[value1][icon]" placeholder="Font Awesome Icon" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </fieldset>
                    <fieldset class="btcpaywall_field_wrap"><label>Default price2</label>
                        <input type="checkbox" id="btcpw_page_value_2_enabled" class="btcpw_fixed_amount_enable" name="btcpw_tipping_page_fixed_amount[value2][enabled]" value="true" />
                        <input type="number" min=0 placeholder="Default Price2" step=1 name="btcpw_tipping_page_fixed_amount[value2][amount]" id="btcpw_default_page_price2">
                        <select required name="btcpw_tipping_page_fixed_amount[value2][currency]" id="btcpw_default_page_currency2">
                            <option disabled value="">Select currency</option>
                            <?php foreach (['SATS', 'USD'] as $currency) : ?>
                                <option value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" id="btcpw_tipping_page_icon2" class="btcpw_tipping_page_icon2" name="btcpw_tipping_page_fixed_amount[value2][icon]" placeholder="Font Awesome Icon" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </fieldset>
                    <fieldset class="btcpaywall_field_wrap"><label>Default price3</label>
                        <input type="checkbox" id="btcpw_page_value_3_enabled" class="btcpw_fixed_amount_enable" name="btcpw_tipping_page_fixed_amount[value3][enabled]" value="true" />
                        <input type="number" min=0 placeholder="Default Price3" step=1 name="btcpw_tipping_page_fixed_amount[value3][amount]" id="btcpw_default_page_price3">
                        <select required name="btcpw_tipping_page_fixed_amount[value3][currency]" id="btcpw_default_page_currency3">
                            <option disabled value="">Select currency</option>
                            <?php foreach (['SATS', 'USD'] as $currency) : ?>
                                <option value="<?php echo esc_attr($currency); ?>">
                                    <?php echo esc_html($currency); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" id="btcpw_tipping_page_icon3" class="btcpw_tipping_page_icon3" name="btcpw_tipping_page_fixed_amount[value3][icon]" placeholder="Font Awesome Icon" title="Enter Font Awesome Icon class value. For example, in order to use beer icon <i class=fa fa-beer></i> you need to enter fa fa-beer." />
                    </fieldset>
                </div>
                <div data-id="donor" class="btcpaywall_container_header">
                    <h2>Donor information</h2>
                </div>
                <div class="btcpaywall_container_body donor-body">
                    <div class="btcpaywall_template_donor_information">
                        <fieldset class="btcpaywall_field_wrap"><label>Full name</label>

                            <label for="btcpw_tipping_page_collect[name][collect]">Display</label>

                            <input type="checkbox" class="btcpw_tipping_page_collect_name" name="btcpw_tipping_page_collect[name][collect]" value="true" />

                            <label for="btcpw_tipping_page_collect[name][mandatory]">Mandatory</label>
                            <input type="checkbox" class="btcpw_tipping_page_collect_name_mandatory" name="btcpw_tipping_page_collect[name][mandatory]" value="true" />


                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Email</label>
                            <label for="btcpw_tipping_page_collect[email][collect]">Display</label>

                            <input type="checkbox" class="btcpw_tipping_page_collect_email" name="btcpw_tipping_page_collect[email][collect]" value="true" />

                            <label for="btcpw_tipping_page_collect[email][mandatory]">Mandatory</label>
                            <input type="checkbox" class="btcpw_tipping_page_collect_email_mandatory" name="btcpw_tipping_page_collect[email][mandatory]" value="true" />

                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Address</label>
                            <label for="btcpw_tipping_page_collect[address][collect]">Display</label>

                            <input type="checkbox" class="btcpw_tipping_page_collect_address" name="btcpw_tipping_page_collect[address][collect]" value="true" />

                            <label for="btcpw_tipping_page_collect[address][mandatory]">Mandatory</label>
                            <input type="checkbox" class="btcpw_tipping_page_collect_address_mandatory" name="btcpw_tipping_page_collect[address][mandatory]" value="true" />

                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Phone number</label>

                            <label for="btcpw_tipping_page_collect[phone][collect]">Display</label>

                            <input type="checkbox" class="btcpw_tipping_page_collect_phone" name="btcpw_tipping_page_collect[phone][collect]" value="true" />

                            <label for="btcpw_tipping_page_collect[phone][mandatory]">Mandatory</label>
                            <input type="checkbox" class="btcpw_tipping_page_collect_phone_mandatory" name="btcpw_tipping_page_collect[phone][mandatory]" value="true" />

                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Message</label>

                            <label for="btcpw_tipping_page_collect[message][collect]">Display</label>
                            <input type="checkbox" class="btcpw_tipping_page_collect_message" name="btcpw_tipping_page_collect[message][collect]" value="true" />

                            <label for="btcpw_tipping_page_collect[message][mandatory]">Mandatory</label>
                            <input type="checkbox" class="btcpw_tipping_page_collect_message_mandatory" name="btcpw_tipping_page_collect[message][mandatory]" value="true" />

                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
new Tipping_Forms_Metabox();
