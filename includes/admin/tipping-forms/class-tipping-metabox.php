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
                    <div class="row">
                        <div class="btcpaywall_template_tipping_box">
                            <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-box.png'; ?>">
                            <div>
                                <label>Tipping Box(250x300/300x300)</label><button>Activate</button>
                            </div>
                        </div>
                        <div class="btcpaywall_template_tipping_banner_high">
                            <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-banner-high.png'; ?>">
                            <div>
                                <label>Tipping Banner High</label><button>Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="btcpaywall_template_tipping_banner_wide">
                            <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-banner-wide.png'; ?>">
                            <div>
                                <label>Tipping Banner Wide</label><button>Activate</button>
                            </div>
                        </div>
                        <div class="btcpaywall_template_tipping_page">
                            <img src="<?php echo BTCPAYWALL_PLUGIN_URL . '/assets/src/img/Tipping-page.png'; ?>">
                            <div>
                                <label>Tipping Page</label><button>Activate</button>
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
                            <div>
                                <label>Logo<span class="btcpaywall_helper_tip"></span></label>
                            </div>
                            <div>
                                <input value="bla" />
                            </div>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <label>Title</label>
                            <input value="bla" />
                            <span>Set title</span>
                        </fieldset>

                        <fieldset class="btcpaywall_field_wrap"><label>Title text color</label>
                            <input value="bla" />
                            <span>Set title color</span>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Description</label>
                            <input value="bla" />
                            <span>Add short description</span>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Description text color</label>
                            <input value="bla" />
                            <span>Set description text color</span>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Step 1</label>
                            <textarea id="btcpw_tipping_page_step1" name="btcpw_tipping_page_text[step1]">Step 1</textarea>
                            <span>Set text for first step in progress bar</span>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <label>Step 1 color</label>
                            <input id="btcpw_tipping_page_tipping_color_active" class="btcpw_tipping_page_tipping_color_active" name="btcpw_tipping_page_color[active]" type="text" />
                            <span>Set text color for first step in progress bar</span>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap">
                            <label>Step 2</label>
                            <textarea id="btcpw_tipping_page_step2" name="btcpw_tipping_page_text[step2]">Step2</textarea>
                            <span>Set text for second step in progress bar</span>
                        </fieldset>
                        <fieldset class="btcpaywall_field_wrap"><label>Step 2 color</label>
                            <input id="btcpw_tipping_page_tipping_color_inactive" class="btcpw_tipping_page_tipping_color_inactive" name="btcpw_tipping_page_color[inactive]" type="text" />
                            <span>Set text color for second step in progress bar</span>
                        </fieldset>
                    </div>
                    <div data-id="main" class="btcpaywall_container_header">
                        <h2>Main</h2>
                    </div>
                    <div class="btcpaywall_container_body main-body">
                        <div class="btcpaywall_template_main">
                            <fieldset class="btcpaywall_field_wrap">
                                <label>Tipping text</label>
                                <input value=" bla" />
                                <span>Set text which will be displayed in the main section, above input fields</span>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap">
                                <label>Tipping text color</label>
                                <input value="bla" />
                                <span>Set tipping text color</span>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap">
                                <label>Input background color</label>
                                <input value="bla" />
                                <span>Set background color for input fields</span>
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
                                <span>Set button text</span>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap"><label>Button text color</label>
                                <input value="bla" />
                                <span>Set button text color</span>
                            </fieldset>
                            <fieldset class="btcpaywall_field_wrap"><label>Button color</label>
                                <input value="bla" />
                                <span>Set button color</span>
                            </fieldset>
                        </div>
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
            <div id="tab-3" class="btcpaywall_options_wrap btcpaywall_tabset">
                <fieldset class="btcpaywall_field_wrap"><label>Currency</label>
                    <input value="bla" />
                    <span>Set currency</span>
                </fieldset>
                <fieldset class="btcpaywall_field_wrap"><label>Free input of amount</label>
                    <input type="checkbox" id="btcpw_tipping_page_enter_amount" class="btcpw_tipping_page_enter_amount" name="btcpw_tipping_page_enter_amount" value="true" />
                    <span>Do you want to allow donors to donate custom amount?</span>
                </fieldset>
                <fieldset class="btcpaywall_field_wrap"><label>Link to Thank you page</label>
                    <input value="bla" />
                    <span>Add url to the Thank you page</span>
                </fieldset>
                <fieldset class="btcpaywall_field_wrap"><label>Background color for header and footer</label>
                    <input value="bla" />
                    <span>Set color which will be used for header and footer background</span>
                </fieldset>
                <div data-id="fixed-amount" class="btcpaywall_container_header">
                    <h2>Fixed amount</h2>
                </div>
                <div class="btcpaywall_container_body fixed-amount-body">
                    <fieldset class="btcpaywall_field_wrap"><label>Show icons</label>
                        <input type="checkbox" id="btcpw_tipping_page_show_icon" class="btcpw_tipping_page_show_icon" name="btcpw_tipping_page_show_icon" value="true" />
                        <span>Do you want do display Font Awesome icons next to the fixed amount fields?</span>
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
            </div>
        </div>
<?php
    }
}
new Tipping_Forms_Metabox();
