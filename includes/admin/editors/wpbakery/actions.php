<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions/WPBakery
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function btcpaywall_load_vc_widgets()
{

    vc_map(array(
        'name' => 'BTCPW Pay-per-Post Start',
        'base' => 'btcpw_start_content',
        'description' => 'Start area of paid content',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(
            array(
                'type' => 'checkbox',
                'heading' => 'Enable payment block',
                'param_name' => 'pay_block',
                'value' => 'true',
                'description' => 'Show payment block instead of content',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Currency',
                'param_name' => 'currency',
                'value' => array(
                    'Default' => '',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set currency',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'BTC format',
                'param_name' => 'btc_format',
                'dependency' => array(
                    'element' => 'currency',
                    'value' => 'SATS'
                ),
                'value' => array(
                    'Default' => '',
                    'SATS' => 'SATS',
                    'BTC' => 'BTC',
                ),
                'std' => 'Default',
                'description' => 'Set BTC format',
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Price',
                'param_name' => 'price',
                'description' => 'Set price',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Duration type',
                'param_name' => 'duration_type',
                'value' => array(
                    'default' => '',
                    'minute' => 'minute',
                    'hour' => 'hour',
                    'day' => 'day',
                    'week' => 'week',
                    'month' => 'month',
                    'year' => 'year',
                    'onetime' => 'onetime',
                    'unlimited' => 'unlimited',
                ),
                'std' => 'default',
                'description' => 'Set duration type',
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Duration',
                'param_name' => 'duration',
                'description' => 'Set duration',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display name',
                'param_name' => 'display_name',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory name',
                'param_name' => 'mandatory_name',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display email',
                'param_name' => 'display_email',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory email',
                'param_name' => 'mandatory_email',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display phone',
                'param_name' => 'display_phone',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory phone',
                'param_name' => 'mandatory_phone',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display address',
                'param_name' => 'display_address',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory address',
                'param_name' => 'mandatory_address',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display message',
                'param_name' => 'display_message',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory message',
                'param_name' => 'mandatory_message',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
        ),
    ));

    vc_map(array(
        'name' => 'BTCPW Pay-per-Post End',
        'base' => 'btcpw_end_content',
        'description' => 'End area of paid content',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(),
    ));

    vc_map(array(
        'name' => 'BTCPW Pay Widget',
        'base' => 'btcpw_pay_block',
        'description' => 'Show Payment Widget',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(),
    ));

    vc_map(array(
        'name' => 'BTCPW Pay-per-View Start',
        'base' => 'btcpw_start_video',
        'description' => 'Start area of paid video content',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(
            array(
                'type' => 'checkbox',
                'heading' => 'Enable payment block',
                'param_name' => 'pay_view_block',
                'value' => 'true',
                'description' => 'Show payment block instead of video',
            ),
            array(
                'type' => 'textarea',
                'heading' => 'Title',
                'param_name' => 'title',
                'value' => 'Untitled',
                'description' => 'Enter video title',
            ),
            array(
                'type' => 'textarea',
                'heading' => 'Description',
                'param_name' => 'description',
                'value' => 'No description',
                'description' => 'Enter video description',
            ),
            array(
                'type' => 'attach_image',
                'heading' => 'Preview',
                'param_name' => 'preview',
                'description' => 'Add video preview',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Currency',
                'param_name' => 'currency',
                'value' => array(
                    'Default' => '',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set currency',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'BTC format',
                'param_name' => 'btc_format',
                'dependency' => array(
                    'element' => 'currency',
                    'value' => 'SATS'
                ),
                'value' => array(
                    'Default' => '',
                    'SATS' => 'SATS',
                    'BTC' => 'BTC',
                ),
                'std' => 'Default',
                'description' => 'Set BTC format',
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Price',
                'param_name' => 'price',
                'description' => 'Set price',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Duration type',
                'param_name' => 'duration_type',
                'value' => array(
                    'default' => '',
                    'minute' => 'minute',
                    'hour' => 'hour',
                    'day' => 'day',
                    'week' => 'week',
                    'month' => 'month',
                    'year' => 'year',
                    'onetime' => 'onetime',
                    'unlimited' => 'unlimited',
                ),
                'std' => 'default',
                'description' => 'Set duration type',
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Duration',
                'param_name' => 'duration',
                'description' => 'Set duration',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display name',
                'param_name' => 'display_name',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory name',
                'param_name' => 'mandatory_name',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display email',
                'param_name' => 'display_email',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory email',
                'param_name' => 'mandatory_email',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display phone',
                'param_name' => 'display_phone',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory phone',
                'param_name' => 'mandatory_phone',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display address',
                'param_name' => 'display_address',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory address',
                'param_name' => 'mandatory_address',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display message',
                'param_name' => 'display_message',
                'value' => false,
                'std' => false,
                'description' => 'Collect information',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory message',
                'param_name' => 'mandatory_message',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
            ),
        ),
    ));

    vc_map(array(
        'name' => 'BTCPW Pay-per-View End',
        'base' => 'btcpw_end_video',
        'description' => 'End area of paid video content',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(),
    ));


    vc_map(array(
        'name' => 'BTCPW Tipping Banner Wide',
        'base' => 'btcpw_tipping_banner_wide',
        'description' => 'Add Wide Tipping Banner',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => 'Dimension',
                'param_name' => 'dimension',
                'value' => array(
                    '600x200' => '600x200',
                ),
                'std' => '600x200',
                'description' => 'Dimension',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Currency',
                'param_name' => 'currency',
                'value' => array(
                    'SATS' => 'SATS',
                    'BTC'    => 'BTC',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'SATS',
                'description' => 'Set currency',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display free input',
                'param_name' => 'free_input',
                'value' => true,
                'std' => true,
                'description' => 'Display free input',
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Link to Thank You Page',
                'param_name' => 'redirect',
                'description' => 'Set Link to Thank You Page',
            ),
            array(
                'type' => 'attach_image',
                'heading' => 'Background',
                'param_name' => 'background_id',
                'description' => 'Add background image',
                'group' => 'Global'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Background color',
                'param_name' => 'background_color',
                'value' => '#E6E6E6',
                'description' => 'Set background color',
                'group' => 'Global'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Background color for header and footer',
                'param_name' => 'background',
                'value' => '#1d5aa3',
                'description' => 'Set header and footer background color',
                'group' => 'Global'
            ),
            array(
                'type' => 'attach_image',
                'heading' => 'Logo',
                'param_name' => 'logo_id',
                'value' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
                'description' => 'Add logo',
                'group' => 'Header'
            ),
            array(
                'type' => 'textarea',
                'heading' => 'Title',
                'param_name' => 'title',
                'value' => 'Support my work',
                'description' => 'Set title',
                'group' => 'Header'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Title text color',
                'param_name' => 'title_text_color',
                'value' => '#ffffff',
                'description' => 'Set title text color',
                'group' => 'Header'
            ),
            array(
                'type' => 'textarea',
                'heading' => 'Description',
                'param_name' => 'description',
                'value' => '',
                'description' => 'Set description',
                'group' => 'Header'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Description text color',
                'param_name' => 'description_text_color',
                'value' => '#000000',
                'description' => 'Set description text color',
                'group' => 'Header'
            ),
            array(
                'type' => 'textarea',
                'heading' => 'Main text',
                'param_name' => 'tipping_text',
                'value' => 'Enter Tipping Amount',
                'description' => 'Set main text',
                'group' => 'Main'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Main text color',
                'param_name' => 'tipping_text_color',
                'value' => '#000000',
                'description' => 'Set main text color',
                'group' => 'Main'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Primary color for amount',
                'param_name' => 'input_background',
                'value' => '#ffa500',
                'description' => 'This color will be used as background color for all unselected amount fields and as a text and border color for selected amount field',
                'group' => 'Main'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Secondary color for amount',
                'param_name' => 'selected_amount_background',
                'value' => '#000',
                'description' => 'This color will be used as background color for selected amount field and as a text and border color for all unselected amount fields',
                'group' => 'Main'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Button text',
                'param_name' => 'button_text',
                'value' => 'Tipping now',
                'description' => 'Set button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Button text color',
                'param_name' => 'button_text_color',
                'value' => '#ffffff',
                'description' => 'Set button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Button color',
                'param_name' => 'button_color',
                'value' => '#FE642E',
                'description' => 'Set button color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Continue button text',
                'param_name' => 'continue_button_text',
                'value' => 'Continue',
                'description' => 'Set continue button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Continue button text color',
                'param_name' => 'continue_button_text_color',
                'value' => '#ffffff',
                'description' => 'Set continue_button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Continue button color',
                'param_name' => 'continue_button_color',
                'value' => '#FE642E',
                'description' => 'Set continue button color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Previous button text',
                'param_name' => 'previous_button_text',
                'value' => 'Previous',
                'description' => 'Set previous button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Previous button text color',
                'param_name' => 'previous_button_text_color',
                'value' => '#ffffff',
                'description' => 'Set previous button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Previous button color',
                'param_name' => 'previous_button_color',
                'value' => '#1d5aa3',
                'description' => 'Set previous button color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Show icon',
                'param_name' => 'show_icon',
                'value' => true,
                'std' => true,
                'description' => 'Display icons',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Value 1 enabled',
                'param_name' => 'value1_enabled',
                'value' => true,
                'std' => true,
                'description' => 'Display value 1',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 1 amount',
                'param_name' => 'value1_amount',
                'value' => 1000,
                'description' => 'Set amount for value 1',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Value 1 currency',
                'param_name' => 'value1_currency',
                'value' => array(
                    'Default' => 'SATS',
                    'BTC'    => 'BTC',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set value 1 currency',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 1 icon',
                'param_name' => 'value1_icon',
                'value' => 'fas fa-coffee',
                'description' => 'Set icon for value 1',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Value 2 enabled',
                'param_name' => 'value2_enabled',
                'value' => true,
                'std' => true,
                'description' => 'Display value 2',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 2 amount',
                'param_name' => 'value2_amount',
                'value' => 2000,
                'description' => 'Set amount for value 2',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Value 2 currency',
                'param_name' => 'value2_currency',
                'value' => array(
                    'Default' => 'SATS',
                    'BTC'    => 'BTC',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set value 2 currency',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 2 icon',
                'param_name' => 'value2_icon',
                'value' => 'fas fa-beer',
                'description' => 'Set icon for value 2',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Value 3 enabled',
                'param_name' => 'value3_enabled',
                'value' => true,
                'std' => true,
                'description' => 'Display value 3',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 3 amount',
                'param_name' => 'value3_amount',
                'value' => 3000,
                'description' => 'Set amount for value 3',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Value 3 currency',
                'param_name' => 'value3_currency',
                'value' => array(
                    'Default' => 'SATS',
                    'BTC'    => 'BTC',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set value 3 currency',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 3 icon',
                'param_name' => 'value3_icon',
                'value' => 'fas fa-coffee',
                'description' => 'Set icon for value 3',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display name',
                'param_name' => 'display_name',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory name',
                'param_name' => 'mandatory_name',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display email',
                'param_name' => 'display_email',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory email',
                'param_name' => 'mandatory_email',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display phone',
                'param_name' => 'display_phone',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory phone',
                'param_name' => 'mandatory_phone',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display address',
                'param_name' => 'display_address',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory address',
                'param_name' => 'mandatory_address',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display message',
                'param_name' => 'display_message',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory message',
                'param_name' => 'mandatory_message',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
        ),
    ));
    vc_map(array(
        'name' => 'BTCPW Tipping Banner High',
        'base' => 'btcpw_tipping_banner_high',
        'description' => 'Add High Tipping Banner',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => 'Dimension',
                'param_name' => 'dimension',
                'value' => array(
                    '200x710' => '200x710',
                ),
                'std' => '200x710',
                'description' => 'Dimension',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Currency',
                'param_name' => 'currency',
                'value' => array(
                    'SATS' => 'SATS',
                    'BTC'    => 'BTC',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'SATS',
                'description' => 'Set currency',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display free input',
                'param_name' => 'free_input',
                'value' => true,
                'std' => true,
                'description' => 'Display free input',
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Link to Thank You Page',
                'param_name' => 'redirect',
                'description' => 'Set Link to Thank You Page',
            ),
            array(
                'type' => 'attach_image',
                'heading' => 'Background',
                'param_name' => 'background_id',
                'description' => 'Add background image',
                'group' => 'Global'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Background color',
                'param_name' => 'background_color',
                'value' => '#E6E6E6',
                'description' => 'Set background color',
                'group' => 'Global'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Background color for header and footer',
                'param_name' => 'background',
                'value' => '#1d5aa3',
                'description' => 'Set header and footer background color',
                'group' => 'Global'
            ),
            array(
                'type' => 'attach_image',
                'heading' => 'Logo',
                'param_name' => 'logo_id',
                'value' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
                'description' => 'Add logo',
                'group' => 'Header'
            ),
            array(
                'type' => 'textarea',
                'heading' => 'Title',
                'param_name' => 'title',
                'value' => 'Support my work',
                'description' => 'Set title',
                'group' => 'Header'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Title text color',
                'param_name' => 'title_text_color',
                'value' => '#ffffff',
                'description' => 'Set title text color',
                'group' => 'Header'
            ),
            array(
                'type' => 'textarea',
                'heading' => 'Description',
                'param_name' => 'description',
                'value' => '',
                'description' => 'Set description',
                'group' => 'Header'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Description text color',
                'param_name' => 'description_text_color',
                'value' => '#000000',
                'description' => 'Set description text color',
                'group' => 'Header'
            ),
            array(
                'type' => 'textarea',
                'heading' => 'Main text',
                'param_name' => 'tipping_text',
                'value' => 'Enter Tipping Amount',
                'description' => 'Set main text',
                'group' => 'Main'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Main text color',
                'param_name' => 'tipping_text_color',
                'value' => '#000000',
                'description' => 'Set main text color',
                'group' => 'Main'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Primary color for amount',
                'param_name' => 'input_background',
                'value' => '#ffa500',
                'description' => 'This color will be used as background color for all unselected amount fields and as a text and border color for selected amount field',
                'group' => 'Main'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Secondary color for amount',
                'param_name' => 'selected_amount_background',
                'value' => '#000',
                'description' => 'This color will be used as background color for selected amount field and as a text and border color for all unselected amount fields',
                'group' => 'Main'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Button text',
                'param_name' => 'button_text',
                'value' => 'Tipping now',
                'description' => 'Set button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Button text color',
                'param_name' => 'button_text_color',
                'value' => '#ffffff',
                'description' => 'Set button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Button color',
                'param_name' => 'button_color',
                'value' => '#FE642E',
                'description' => 'Set button color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Continue button text',
                'param_name' => 'continue_button_text',
                'value' => 'Continue',
                'description' => 'Set continue button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Continue button text color',
                'param_name' => 'continue_button_text_color',
                'value' => '#ffffff',
                'description' => 'Set continue_button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Continue button color',
                'param_name' => 'continue_button_color',
                'value' => '#FE642E',
                'description' => 'Set continue button color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Previous button text',
                'param_name' => 'previous_button_text',
                'value' => 'Previous',
                'description' => 'Set previous button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Previous button text color',
                'param_name' => 'previous_button_text_color',
                'value' => '#ffffff',
                'description' => 'Set previous button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Previous button color',
                'param_name' => 'previous_button_color',
                'value' => '#1d5aa3',
                'description' => 'Set previous button color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Show icon',
                'param_name' => 'show_icon',
                'value' => true,
                'std' => true,
                'description' => 'Display icons',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Value 1 enabled',
                'param_name' => 'value1_enabled',
                'value' => true,
                'std' => true,
                'description' => 'Display value 1',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 1 amount',
                'param_name' => 'value1_amount',
                'value' => 1000,
                'description' => 'Set amount for value 1',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Value 1 currency',
                'param_name' => 'value1_currency',
                'value' => array(
                    'Default' => 'SATS',
                    'BTC'    => 'BTC',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set value 1 currency',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 1 icon',
                'param_name' => 'value1_icon',
                'value' => 'fas fa-coffee',
                'description' => 'Set icon for value 1',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Value 2 enabled',
                'param_name' => 'value2_enabled',
                'value' => true,
                'std' => true,
                'description' => 'Display value 2',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 2 amount',
                'param_name' => 'value2_amount',
                'value' => 2000,
                'description' => 'Set amount for value 2',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Value 2 currency',
                'param_name' => 'value2_currency',
                'value' => array(
                    'Default' => 'SATS',
                    'BTC'    => 'BTC',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set value 2 currency',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 2 icon',
                'param_name' => 'value2_icon',
                'value' => 'fas fa-beer',
                'description' => 'Set icon for value 2',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Value 3 enabled',
                'param_name' => 'value3_enabled',
                'value' => true,
                'std' => true,
                'description' => 'Display value 3',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 3 amount',
                'param_name' => 'value3_amount',
                'value' => 3000,
                'description' => 'Set amount for value 3',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Value 3 currency',
                'param_name' => 'value3_currency',
                'value' => array(
                    'Default' => 'SATS',
                    'BTC'    => 'BTC',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set value 3 currency',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 3 icon',
                'param_name' => 'value3_icon',
                'value' => 'fas fa-coffee',
                'description' => 'Set icon for value 3',
                'group' => 'Fixed amount'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display name',
                'param_name' => 'display_name',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory name',
                'param_name' => 'mandatory_name',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display email',
                'param_name' => 'display_email',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory email',
                'param_name' => 'mandatory_email',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display phone',
                'param_name' => 'display_phone',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory phone',
                'param_name' => 'mandatory_phone',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display address',
                'param_name' => 'display_address',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory address',
                'param_name' => 'mandatory_address',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display message',
                'param_name' => 'display_message',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory message',
                'param_name' => 'mandatory_message',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'
            ),
        ),
    ));
    vc_map(array(
        'name' => 'BTCPW Tipping Box',
        'base' => 'btcpw_tipping_box',
        'description' => 'Add Tipping Box',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => 'Dimension',
                'param_name' => 'dimension',
                'value' => array(
                    '250x300' => '250x300',
                    '300x300' => '300x300',
                ),
                'std' => '250x300',
                'description' => 'Set dimension',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Currency',
                'param_name' => 'currency',
                'value' => array(
                    'SATS' => 'SATS',
                    'BTC'    => 'BTC',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'SATS',
                'description' => 'Set currency',
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Link to Thank You Page',
                'param_name' => 'redirect',
                'description' => 'Set Link to Thank You Page',
            ),
            array(
                'type' => 'attach_image',
                'heading' => 'Background',
                'param_name' => 'background_id',
                'description' => 'Add background image',
                'group' => 'Global'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Background color',
                'param_name' => 'background_color',
                'value' => '#E6E6E6',
                'description' => 'Set background color',
                'group' => 'Global'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Background color for header and footer',
                'param_name' => 'background',
                'value' => '#1d5aa3',
                'description' => 'Set header and footer background color',
                'group' => 'Global'
            ),
            array(
                'type' => 'attach_image',
                'heading' => 'Logo',
                'param_name' => 'logo_id',
                'value' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
                'description' => 'Add logo',
                'group' => 'Header'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Title',
                'param_name' => 'title',
                'value' => 'Support my work',
                'description' => 'Set title',
                'group' => 'Header'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Title text color',
                'param_name' => 'title_text_color',
                'value' => '#ffffff',
                'description' => 'Set title text color',
                'group' => 'Header'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Description',
                'param_name' => 'description',
                'value' => '',
                'description' => 'Set description',
                'group' => 'Header'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Description text color',
                'param_name' => 'description_text_color',
                'value' => '#000000',
                'description' => 'Set description text color',
                'group' => 'Header'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Main text',
                'param_name' => 'tipping_text',
                'value' => 'Enter Tipping Amount',
                'description' => 'Set main text',
                'group' => 'Main'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Main text color',
                'param_name' => 'tipping_text_color',
                'value' => '#000000',
                'description' => 'Set main text color',
                'group' => 'Main'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Background color for amount field',
                'param_name' => 'input_background',
                'value' => '#ffa500',
                'description' => 'Set background color for amount field',
                'group' => 'Main'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Button text',
                'param_name' => 'button_text',
                'value' => 'Tipping now',
                'description' => 'Set button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Button text color',
                'param_name' => 'button_text_color',
                'value' => '#ffffff',
                'description' => 'Set button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Button color',
                'param_name' => 'button_color',
                'value' => '#FE642E',
                'description' => 'Set button color',
                'group' => 'Footer'
            ),

        ),
    ));
    vc_map(array(
        'name' => 'BTCPW Tipping Page',
        'base' => 'btcpw_tipping_page',
        'description' => 'Add Tipping Page',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => 'Dimension',
                'param_name' => 'dimension',
                'value' => '520x600',
                'description' => 'Dimension',
            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Currency',
                'param_name' => 'currency',
                'value' => array(
                    'SATS' => 'SATS',
                    'BTC'    => 'BTC',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'SATS',
                'description' => 'Set currency',
            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display free input',
                'param_name' => 'free_input',
                'value' => true,
                'std' => true,
                'description' => 'Display free input',
            ),
            array(
                'type' => 'textfield',
                'heading' => 'Link to Thank You Page',
                'param_name' => 'redirect',
                'description' => 'Set Link to Thank You Page',
            ),
            array(
                'type' => 'attach_image',
                'heading' => 'Background',
                'param_name' => 'background_id',
                'description' => 'Add background image',
                'group' => 'Global'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Background color',
                'param_name' => 'background_color',
                'value' => '#E6E6E6',
                'description' => 'Set background color',
                'group' => 'Global'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Background color for header and footer',
                'param_name' => 'background',
                'value' => '#1d5aa3',
                'description' => 'Set header and footer background color',
                'group' => 'Global'
            ),
            array(
                'type' => 'attach_image',
                'heading' => 'Logo',
                'param_name' => 'logo_id',
                'value' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
                'description' => 'Add logo',
                'group' => 'Header'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Title',
                'param_name' => 'title',
                'value' => 'Support my work',
                'description' => 'Set title',
                'group' => 'Header'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Title text color',
                'param_name' => 'title_text_color',
                'value' => '#ffffff',
                'description' => 'Set title text color',
                'group' => 'Header'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Step1',
                'param_name' => 'step1',
                'value' => 'Pledge',
                'description' => 'Set text for step 1 on progress bar',
                'group' => 'Header'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Step2',
                'param_name' => 'step2',
                'value' => 'Info',
                'description' => 'Set text for step 2 on progress bar',
                'group' => 'Header'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Color for active step',
                'param_name' => 'active_color',
                'value' => '#808080',
                'description' => 'Set color for active step',
                'group' => 'Header'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Color for inactive step',
                'param_name' => 'inactive_color',
                'value' => '#D3D3D3',
                'description' => 'Set color for active step',
                'group' => 'Header'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Main text',
                'param_name' => 'tipping_text',
                'value' => 'Enter Tipping Amount',
                'description' => 'Set main text',
                'group' => 'Main'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Main text color',
                'param_name' => 'tipping_text_color',
                'value' => '#000000',
                'description' => 'Set main text color',
                'group' => 'Main'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Primary color for amount',
                'param_name' => 'input_background',
                'value' => '#ffa500',
                'description' => 'This color will be used as background color for all unselected amount fields and as a text and border color for selected amount field',
                'group' => 'Main'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Secondary color for amount',
                'param_name' => 'selected_amount_background',
                'value' => '#000',
                'description' => 'This color will be used as background color for selected amount field and as a text and border color for all unselected amount fields',
                'group' => 'Main'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Button text',
                'param_name' => 'button_text',
                'value' => 'Tipping now',
                'description' => 'Set button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Button text color',
                'param_name' => 'button_text_color',
                'value' => '#ffffff',
                'description' => 'Set button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Button color',
                'param_name' => 'button_color',
                'value' => '#FE642E',
                'description' => 'Set button color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Continue button text',
                'param_name' => 'continue_button_text',
                'value' => 'Continue',
                'description' => 'Set continue button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Continue button text color',
                'param_name' => 'continue_button_text_color',
                'value' => '#ffffff',
                'description' => 'Set continue_button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Continue button color',
                'param_name' => 'continue_button_color',
                'value' => '#FE642E',
                'description' => 'Set continue button color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'textarea',
                'heading' => 'Previous button text',
                'param_name' => 'previous_button_text',
                'value' => 'Previous',
                'description' => 'Set previous button text',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Previous button text color',
                'param_name' => 'previous_button_text_color',
                'value' => '#ffffff',
                'description' => 'Set previous button text color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Previous button color',
                'param_name' => 'previous_button_color',
                'value' => '#1d5aa3',
                'description' => 'Set previous button color',
                'group' => 'Footer'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Show icon',
                'param_name' => 'show_icon',
                'value' => true,
                'std' => true,
                'description' => 'Display icons',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Value 1 enabled',
                'param_name' => 'value1_enabled',
                'value' => true,
                'std' => true,
                'description' => 'Display value 1',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 1 amount',
                'param_name' => 'value1_amount',
                'value' => 1000,
                'description' => 'Set amount for value 1',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Value 1 currency',
                'param_name' => 'value1_currency',
                'value' => array(
                    'Default' => 'SATS',
                    'BTC'    => 'BTC',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set value 1 currency',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 1 icon',
                'param_name' => 'value1_icon',
                'value' => 'fas fa-coffee',
                'description' => 'Set icon for value 1',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Value 2 enabled',
                'param_name' => 'value2_enabled',
                'value' => true,
                'std' => true,
                'description' => 'Display value 2',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 2 amount',
                'param_name' => 'value2_amount',
                'value' => 2000,
                'description' => 'Set amount for value 2',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Value 2 currency',
                'param_name' => 'value2_currency',
                'value' => array(
                    'Default' => 'SATS',
                    'BTC'    => 'BTC',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set value 2 currency',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 2 icon',
                'param_name' => 'value2_icon',
                'value' => 'fas fa-beer',
                'description' => 'Set icon for value 2',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Value 3 enabled',
                'param_name' => 'value3_enabled',
                'value' => true,
                'std' => true,
                'description' => 'Display value 3',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 3 amount',
                'param_name' => 'value3_amount',
                'value' => 3000,
                'description' => 'Set amount for value 3',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'dropdown',
                'heading' => 'Value 3 currency',
                'param_name' => 'value3_currency',
                'value' => array(
                    'Default' => 'SATS',
                    'BTC'    => 'BTC',
                    'SATS' => 'SATS',
                    'EUR' => 'EUR',
                    'USD' => 'USD'
                ),
                'std' => 'Default',
                'description' => 'Set value 3 currency',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'textfield',
                'heading' => 'Value 3 icon',
                'param_name' => 'value3_icon',
                'value' => 'fas fa-coffee',
                'description' => 'Set icon for value 3',
                'group' => 'Fixed amount'

            ),
            array(
                'type' => 'colorpicker',
                'heading' => 'Previous button color',
                'param_name' => 'previous_button_color',
                'value' => '#1d5aa3',
                'description' => 'Set previous button color',
                'group' => 'Fixed amount'

            ),

            array(
                'type' => 'checkbox',
                'heading' => 'Display name',
                'param_name' => 'display_name',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory name',
                'param_name' => 'mandatory_name',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display email',
                'param_name' => 'display_email',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory email',
                'param_name' => 'mandatory_email',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display phone',
                'param_name' => 'display_phone',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory phone',
                'param_name' => 'mandatory_phone',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display address',
                'param_name' => 'display_address',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory address',
                'param_name' => 'mandatory_address',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Display message',
                'param_name' => 'display_message',
                'value' => true,
                'std' => true,
                'description' => 'Collect information',
                'group' => 'Donor information'

            ),
            array(
                'type' => 'checkbox',
                'heading' => 'Mandatory message',
                'param_name' => 'mandatory_message',
                'value' => false,
                'std' => false,
                'description' => 'Set as mandatory',
                'group' => 'Donor information'

            ),
        ),
    ));

    vc_map(array(
        'name' => 'BTCPW Shortcode List',
        'base' => 'btcpw_list_shortcodes',
        'description' => 'Shortcode list',
        'category' => 'Content',
        'icon' => BTCPAYWALL_PLUGIN_URL . '/assets/src/img/BTCPayWall_logo.png',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => 'Shortcode',
                'param_name' => 'shortcode',
                'value' => btcpaywall_all_created_forms(),
                'description' => 'Shortcode',
            ),
        )
    ));
}
add_action('vc_before_init', 'btcpaywall_load_vc_widgets');
