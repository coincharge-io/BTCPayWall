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
            <ul class="btcpaywall_metabox_wrap-metabox-tabs">
                <li><a href="#btcpaywall_template_options">Template</a></li>
                <li><a href="#btcpaywall_global_options">Global</a></li>
                <li><a href="#btcpaywall_default_header_options">Header</a></li>
                <li><a href="#btcpaywall_default_main_options">Main</a></li>
                <li><a href="#btcpaywall_default_footer_options">Footer</a></li>
                <li><a href="#btcpaywall_template_fields">Fields</a></li>
            </ul>
            <div id="btcpaywall_template_options" class="btcpaywall_options_wrap">
                <fieldset><span>1</span></fieldset>
                <fieldset></fieldset>
                <fieldset></fieldset>
                <fieldset></fieldset>
                <fieldset></fieldset>
            </div>
            <div id="btcpaywall_global_options" class="btcpaywall_options_wrap">
                <fieldset><label>Currency</label><input value="bla" /></fieldset>
                <fieldset><label>Link to Thank you page</label><input value="bla" /></fieldset>
                <fieldset><label>Background color for header and footer</label><input value="bla" /></fieldset>
            </div>
            <div id="btcpaywall_default_header_options" class="btcpaywall_options_wrap">
                <fieldset><label>Logo</label><input value="bla" /></fieldset>
                <fieldset><label>Title</label><input value="bla" /></fieldset>
                <fieldset><label>Title text color</label><input value="bla" /></fieldset>

                <fieldset><label>Description</label><input value="bla" /></fieldset>
                <fieldset><label>Description text color</label><input value="bla" /></fieldset>
            </div>
            <div id="btcpaywall_default_main_options" class="btcpaywall_options_wrap">
                <fieldset><label>Tipping text</label><input value="bla" /></fieldset>
                <fieldset><label>Tipping text color</label><input value="bla" /></fieldset>
                <fieldset><label>Input background color</label><input value="bla" /></fieldset>
            </div>
            <div id="btcpaywall_default_footer_options" class="btcpaywall_options_wrap">
                <fieldset><label>Button text</label><input value="bla" /></fieldset>
                <fieldset><label>Button text color</label><input value="bla" /></fieldset>
                <fieldset><label>Button color</label><input value="bla" /></fieldset>
            </div>
            <div id="btcpaywall_template_fields" class="btcpaywall_options_wrap">

            </div>
        </div>
<?php
    }
}
new Tipping_Forms_Metabox();
