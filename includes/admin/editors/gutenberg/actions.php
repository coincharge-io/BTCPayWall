<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Gutenberg/Actions
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}


function btcpaywall_load_gutenberg()
{
    $asset_file = include(BTCPAYWALL_PLUGIN_DIR . 'assets/dist/js/index.asset.php');

    wp_register_script(
        'btcpaywall-gutenberg-block-script',
        BTCPAYWALL_PLUGIN_URL . 'assets/dist/js/index.js',
        $asset_file['dependencies'],
        BTCPAYWALL_VERSION
    );


    register_block_type(
        'btcpaywall/gutenberg-start-block',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_gutenberg',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'pay_block' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'width' => array(
                    'type' => 'integer',
                    'default' => '500'
                ),
                'height' => array(
                    'type' => 'integer',
                    'default' => '600'
                ),
                'background_color' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'price' => array(
                    'type' => 'integer',
                    'default' => '1000'
                ),
                'duration' => array(
                    'type' => 'integer',
                    'default' => '20'
                ),
                'duration_type' => array(
                    'type' => 'string',
                    'default' => 'minute'
                ),
                'header_text' => array(
                    'type' => 'string',
                    'default' => 'Pay now to unlock blogpost'
                ),
                'info_text' => array(
                    'type' => 'string',
                    'default' => 'For {price} {currency} you will have access for {duration} {dtype}.'
                ),
                'header_color' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'info_color' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'link' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'help_text' => array(
                    'type' => 'string',
                    'default' => 'Help'
                ),
                'help_link' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'additional_link' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'additional_help_text' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'additional_help_link' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'display_name' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_name' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_email' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_email' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_phone' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_phone' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_address' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_address' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_message' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_message' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'button_text' => array(
                    'type' => 'string',
                    'default' => 'Pay'
                ),
                'button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#e45a29j'
                ),
                'continue_button_text' => array(
                    'type' => 'string',
                    'default' => 'Continue'
                ),
                'continue_button_text_color' =>  array(
                    'type' => 'string',
                    'default' => '#fff'
                ),
                'continue_button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'continue_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
                'previous_button_text' => array(
                    'type' => 'string',
                    'default' => 'Previous'
                ),
                'previous_button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'previous_button_color' => array(
                    'type' => 'string',
                    'default' => '#1d5aa3'
                ),
                'previous_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#fff'
                ),
            )
        ]
    );


    register_block_type(
        'btcpaywall/gutenberg-end-block',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_end_gutenberg',
        ]
    );


    register_block_type(
        'btcpaywall/gutenberg-start-video-block',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_start_video_gutenberg',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'pay_view_block' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'width' => array(
                    'type' => 'integer',
                    'default' => '500'
                ),
                'height' => array(
                    'type' => 'integer',
                    'default' => '600'
                ),
                'background_color' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'title' => array(
                    'type' => 'string',
                    'default' => 'Untitled'
                ),
                'description' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'title_color' => array(
                    'type' => 'string',
                    'default' => '#fff'
                ),
                'description_color' => array(
                    'type' => 'string',
                    'default' => '#fff'
                ),
                'preview' => array(
                    'type' => 'number',
                    'default' => ''
                ),
                'currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'price' => array(
                    'type' => 'integer',
                    'default' => '1000'
                ),
                'duration' => array(
                    'type' => 'integer',
                    'default' => '20'
                ),
                'duration_type' => array(
                    'type' => 'string',
                    'default' => 'minute'
                ),
                'header_text' => array(
                    'type' => 'string',
                    'default' => 'Pay now to watch the whole video'
                ),
                'info_text' => array(
                    'type' => 'string',
                    'default' => 'For {price} {currency} you will have access for {duration} {dtype}.'
                ),
                'header_color' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'info_color' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'link' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'help_text' => array(
                    'type' => 'string',
                    'default' => 'Help'
                ),
                'help_link' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'additional_link' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'additional_help_text' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'additional_help_link' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'display_name' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_name' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_email' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_email' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_phone' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_phone' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_address' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_address' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_message' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_message' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'button_text' => array(
                    'type' => 'string',
                    'default' => 'Pay'
                ),
                'button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#e45a29j'
                ),
                'continue_button_text' => array(
                    'type' => 'string',
                    'default' => 'Continue'
                ),
                'continue_button_text_color' =>  array(
                    'type' => 'string',
                    'default' => '#fff'
                ),
                'continue_button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'continue_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
                'previous_button_text' => array(
                    'type' => 'string',
                    'default' => 'Previous'
                ),
                'previous_button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'previous_button_color' => array(
                    'type' => 'string',
                    'default' => '#1d5aa3'
                ),
                'previous_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
            )
        ]
    );

    register_block_type(
        'btcpaywall/gutenberg-end-video-block',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_end_gutenberg',
        ]
    );


    register_block_type(
        'btcpaywall/gutenberg-tipping-box',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_tipping_box',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'dimension' => array(
                    'type' => 'string',
                    'default' => '250x300'
                ),
                'title' => array(
                    'type' => 'string',
                    'default' => 'Support my work'
                ),
                'description' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'background_color' => array(
                    'type' => 'string',
                    'default' => '#E6E6E6'
                ),
                'title_text_color' => array(
                    'type' => 'string',
                    'default' => '#ffffff'
                ),
                'tipping_text' => array(
                    'type' => 'string',
                    'default' => 'Enter Tipping Amount'
                ),
                'tipping_text_color' => array(
                    'type' => 'string',
                    'default' => '#000000'
                ),
                'redirect' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'description_color' => array(
                    'type' => 'string',
                    'default' => '#000000'
                ),
                'button_text' => array(
                    'type' => 'string',
                    'default' => 'Tipping now'
                ),
                'button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#e45a29j'
                ),
                'logo_id' => array(
                    'type' => 'number',
                    'default' => BTCPAYWALL_PLUGIN_URL . '/assets/dist/img/BTCPayWall_logo.png',
                ),
                'background_id' => array(
                    'type' => 'number',
                    'default' => ''
                ),
                'input_background' => array(
                    'type' => 'string',
                    'default' => '#ffa500'
                ),
                'background' => array(
                    'type' => 'string',
                    'default' => '#1d5aa3'
                )
            )
        ]
    );

    register_block_type(
        'btcpaywall/gutenberg-tipping-banner-wide',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_tipping_banner_wide',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'dimension' => array(
                    'type' => 'string',
                    'default' => '600x280'
                ),
                'title' => array(
                    'type' => 'string',
                    'default' => 'Support my work'
                ),
                'description' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'background_color' => array(
                    'type' => 'string',
                    'default' => '#E6E6E6'
                ),
                'title_text_color' => array(
                    'type' => 'string',
                    'default' => '#ffffff'
                ),
                'tipping_text' => array(
                    'type' => 'string',
                    'default' => 'Enter Tipping Amount'
                ),
                'tipping_text_color' => array(
                    'type' => 'string',
                    'default' => '#000000'
                ),
                'redirect' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'description_color' => array(
                    'type' => 'string',
                    'default' => '#000000'
                ),
                'logo_id' => array(
                    'type' => 'number',
                    'default' => BTCPAYWALL_PLUGIN_URL . '/assets/dist/img/BTCPayWall_logo.png',
                ),
                'background_id' => array(
                    'type' => 'number',
                    'default' => ''
                ),
                'input_background' => array(
                    'type' => 'string',
                    'default' => '#ffa500'
                ),
                'background' => array(
                    'type' => 'string',
                    'default' => '#1d5aa3'
                ),
                'value1_enabled' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'value1_amount' => array(
                    'type' => 'string',
                    'default' => '1000'
                ),
                'value1_currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'value1_icon' => array(
                    'type' => 'string',
                    'default' => 'fas fa-coffee'
                ),
                'value2_enabled' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'value2_amount' => array(
                    'type' => 'string',
                    'default' => '2000'
                ),
                'value2_currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'value2_icon' => array(
                    'type' => 'string',
                    'default' => 'fas fa-beer'
                ),
                'value3_enabled' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'value3_amount' => array(
                    'type' => 'string',
                    'default' => '3000'
                ),
                'value3_currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'value3_icon' => array(
                    'type' => 'string',
                    'default' => 'fas fa-cocktail'
                ),
                'display_name' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_name' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_email' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_email' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_phone' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_phone' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_address' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_address' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_message' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_message' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'show_icon' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'free_input' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'button_text' => array(
                    'type' => 'string',
                    'default' => 'Pay'
                ),
                'button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
                'continue_button_text' => array(
                    'type' => 'string',
                    'default' => 'Continue'
                ),
                'continue_button_text_color' =>  array(
                    'type' => 'string',
                    'default' => '#fff'
                ),
                'continue_button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'continue_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
                'previous_button_text' => array(
                    'type' => 'string',
                    'default' => 'Previous'
                ),
                'previous_button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'previous_button_color' => array(
                    'type' => 'string',
                    'default' => '#1d5aa3'
                ),
                'previous_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
                'selected_amount_background' => array(
                    'type' => 'string',
                    'default' => '#000'
                ),
            )
        ]
    );

    register_block_type(
        'btcpaywall/gutenberg-tipping-banner-high',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_tipping_banner_high',
            'attributes' => array(
                'className' => array(
                    'type' => 'string',
                    'default' => '',
                ),
                'dimension' => array(
                    'type' => 'string',
                    'default' => '200x710'
                ),
                'title' => array(
                    'type' => 'string',
                    'default' => 'Support my work'
                ),
                'description' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'background_color' => array(
                    'type' => 'string',
                    'default' => '#E6E6E6'
                ),
                'title_text_color' => array(
                    'type' => 'string',
                    'default' => '#ffffff'
                ),
                'tipping_text' => array(
                    'type' => 'string',
                    'default' => 'Enter Tipping Amount'
                ),
                'tipping_text_color' => array(
                    'type' => 'string',
                    'default' => '#000000'
                ),
                'redirect' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'description_color' => array(
                    'type' => 'string',
                    'default' => '#000000'
                ),
                'logo_id' => array(
                    'type' => 'number',
                    'default' => BTCPAYWALL_PLUGIN_URL . '/assets/dist/img/BTCPayWall_logo.png',
                ),
                'background_id' => array(
                    'type' => 'number',
                    'default' => ''
                ),
                'input_background' => array(
                    'type' => 'string',
                    'default' => '#ffa500'
                ),
                'background' => array(
                    'type' => 'string',
                    'default' => '#1d5aa3'
                ),
                'value1_enabled' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'value1_amount' => array(
                    'type' => 'string',
                    'default' => '1000'
                ),
                'value1_currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'value1_icon' => array(
                    'type' => 'string',
                    'default' => 'fas fa-coffee'
                ),
                'value2_enabled' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'value2_amount' => array(
                    'type' => 'string',
                    'default' => '2000'
                ),
                'value2_currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'value2_icon' => array(
                    'type' => 'string',
                    'default' => 'fas fa-beer'
                ),
                'value3_enabled' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'value3_amount' => array(
                    'type' => 'string',
                    'default' => '3000'
                ),
                'value3_currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'value3_icon' => array(
                    'type' => 'string',
                    'default' => 'fas fa-cocktail'
                ),
                'display_name' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_name' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_email' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_email' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_phone' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_phone' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_address' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_address' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_message' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_message' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'show_icon' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'free_input' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'button_text' => array(
                    'type' => 'string',
                    'default' => 'Pay'
                ),
                'button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#e45a29j'
                ),
                'continue_button_text' => array(
                    'type' => 'string',
                    'default' => 'Continue'
                ),
                'continue_button_text_color' =>  array(
                    'type' => 'string',
                    'default' => '#fff'
                ),
                'continue_button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'continue_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
                'previous_button_text' => array(
                    'type' => 'string',
                    'default' => 'Previous'
                ),
                'previous_button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'previous_button_color' => array(
                    'type' => 'string',
                    'default' => '#1d5aa3'
                ),
                'previous_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
                'selected_amount_background' => array(
                    'type' => 'string',
                    'default' => '#000'
                ),
            )
        ]
    );

    register_block_type(
        'btcpaywall/gutenberg-tipping-page',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_tipping_pages',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'dimension' => array(
                    'type' => 'string',
                    'default' => '200x710'
                ),
                'title' => array(
                    'type' => 'string',
                    'default' => 'Support my work'
                ),
                'description' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'background_color' => array(
                    'type' => 'string',
                    'default' => '#E6E6E6'
                ),
                'title_text_color' => array(
                    'type' => 'string',
                    'default' => '#ffffff'
                ),
                'tipping_text' => array(
                    'type' => 'string',
                    'default' => 'Enter Tipping Amount'
                ),
                'tipping_text_color' => array(
                    'type' => 'string',
                    'default' => '#000000'
                ),
                'redirect' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'description_color' => array(
                    'type' => 'string',
                    'default' => '#000000'
                ),
                'logo_id' => array(
                    'type' => 'number',
                    'default' => BTCPAYWALL_PLUGIN_URL . '/assets/dist/img/BTCPayWall_logo.png',
                ),
                'background_id' => array(
                    'type' => 'number',
                    'default' => ''
                ),
                'input_background' => array(
                    'type' => 'string',
                    'default' => '#ffa500'
                ),
                'background' => array(
                    'type' => 'string',
                    'default' => '#1d5aa3'
                ),
                'value1_enabled' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'value1_amount' => array(
                    'type' => 'string',
                    'default' => '1000'
                ),
                'value1_currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'value1_icon' => array(
                    'type' => 'string',
                    'default' => 'fas fa-coffee'
                ),
                'value2_enabled' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'value2_amount' => array(
                    'type' => 'string',
                    'default' => '2000'
                ),
                'value2_currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'value2_icon' => array(
                    'type' => 'string',
                    'default' => 'fas fa-beer'
                ),
                'value3_enabled' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'value3_amount' => array(
                    'type' => 'string',
                    'default' => '3000'
                ),
                'value3_currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'value3_icon' => array(
                    'type' => 'string',
                    'default' => 'fas fa-cocktail'
                ),
                'display_name' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_name' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_email' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_email' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_phone' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_phone' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_address' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_address' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'display_message' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'mandatory_message' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'show_icon' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'free_input' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'step1' => array(
                    'type' => 'string',
                    'default' => 'Pledge'
                ),
                'step2' => array(
                    'type' => 'string',
                    'default' => 'Info'
                ),
                'active_color' => array(
                    'type' => 'string',
                    'default' => '#808080'
                ),
                'inactive_color' => array(
                    'type' => 'string',
                    'default' => '#D3D3D3'
                ),
                'button_text' => array(
                    'type' => 'string',
                    'default' => 'Pay'
                ),
                'button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#e45a29j'
                ),
                'continue_button_text' => array(
                    'type' => 'string',
                    'default' => 'Continue'
                ),
                'continue_button_text_color' =>  array(
                    'type' => 'string',
                    'default' => '#fff'
                ),
                'continue_button_color' => array(
                    'type' => 'string',
                    'default' => '#FE642E'
                ),
                'continue_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
                'previous_button_text' => array(
                    'type' => 'string',
                    'default' => 'Previous'
                ),
                'previous_button_text_color' => array(
                    'type' => 'string',
                    'default' => '#FFFFFF'
                ),
                'previous_button_color' => array(
                    'type' => 'string',
                    'default' => '#1d5aa3'
                ),
                'previous_button_color_hover' => array(
                    'type' => 'string',
                    'default' => '#FFF'
                ),
                'selected_amount_background' => array(
                    'type' => 'string',
                    'default' => '#000'
                ),
            )
        ]
    );
    register_block_type(
        'btcpaywall/gutenberg-pay-per-post-templates',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_pay_per_post_templates_gutenberg',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'shortcode' => array(
                    'type' => 'string'
                ),
                'override' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'pay_block' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'price' => array(
                    'type' => 'integer',
                    'default' => '1000'
                ),
                'duration' => array(
                    'type' => 'integer',
                    'default' => '20'
                ),
                'duration_type' => array(
                    'type' => 'string',
                    'default' => 'minute'
                ),
            )
        ]
    );
    register_block_type(
        'btcpaywall/gutenberg-pay-per-view-templates',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_pay_per_view_templates_gutenberg',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'shortcode' => array(
                    'type' => 'string'
                ),
                'title' => array(
                    'type' => 'string',
                    'default' => 'Untitled'
                ),
                'description' => array(
                    'type' => 'string',
                    'default' => ''
                ),
                'preview' => array(
                    'type' => 'number',
                    'default' => ''
                ),
                'override' => array(
                    'type' => 'boolean',
                    'default' => false
                ),
                'pay_block' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'currency' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'price' => array(
                    'type' => 'integer',
                    'default' => '1000'
                ),
                'duration' => array(
                    'type' => 'integer',
                    'default' => '20'
                ),
                'duration_type' => array(
                    'type' => 'string',
                    'default' => 'minute'
                ),
            )
        ]
    );
    register_block_type(
        'btcpaywall/gutenberg-donation-templates',
        [
            'editor_script' => 'btcpaywall-gutenberg-block-script',
            'render_callback' => 'btcpaywall_render_shortcodes_gutenberg',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'shortcode' => array(
                    'type' => 'string'
                )
            )
        ]
    );
}

add_action('init', 'btcpaywall_load_gutenberg');
