<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

function load_gutenberg()
{
    $asset_file = include(BTCPAYWALL_PLUGIN_DIR . 'assets/dist/js/index.asset.php');



    wp_register_script(
        'gutenberg-block-script',
        BTCPAYWALL_PLUGIN_URL . 'assets/dist/js/index.js',
        $asset_file['dependencies'],
        BTCPAYWALL_VERSION
    );

    register_block_type(
        'btcpaywall/gutenberg-start-block',
        [
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_gutenberg',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'pay_block' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'btc_format' => array(
                    'type' => 'string',
                    'default' => 'SATS'
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
            )
        ]
    );


    register_block_type(
        'btcpaywall/gutenberg-end-block',
        [
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_end_gutenberg',
        ]
    );


    register_block_type(
        'btcpaywall/gutenberg-start-video-block',
        [
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_start_video_gutenberg',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'pay_view_block' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'btc_format' => array(
                    'type' => 'string',
                    'default' => 'SATS'
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
            )
        ]
    );

    register_block_type(
        'btcpaywall/gutenberg-end-video-block',
        [
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_end_gutenberg',
        ]
    );
    register_block_type(
        'btcpaywall/gutenberg-shortcode-list',
        [
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_shortcodes_gutenberg',
        ]
    );
    register_block_type(
        'btcpaywall/gutenberg-file-block',
        [
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_file_gutenberg',
            'attributes' => array(
                'className' => array(
                    'default' => '',
                    'type' => 'string'
                ),
                'pay_file_block' => array(
                    'type' => 'boolean',
                    'default' => true
                ),
                'btc_format' => array(
                    'type' => 'string',
                    'default' => 'SATS'
                ),
                'file' => array(
                    'type' => 'string',
                    'default' => 'paywall_example.pdf'
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
            )
        ]
    );

    register_block_type(
        'btcpaywall/gutenberg-tipping-box',
        [
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_tipping_box',
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
                'logo_id' => array(
                    'type' => 'string',
                    'default' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg'
                ),
                'background_id' => array(
                    'type' => 'string',
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
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_tipping_banner_wide',
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
                'logo_id' => array(
                    'type' => 'string',
                    'default' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg'
                ),
                'background_id' => array(
                    'type' => 'string',
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
            )
        ]
    );

    register_block_type(
        'btcpaywall/gutenberg-tipping-banner-high',
        [
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_tipping_banner_high',
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
                'logo_id' => array(
                    'type' => 'string',
                    'default' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg'
                ),
                'background_id' => array(
                    'type' => 'string',
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
            )
        ]
    );

    register_block_type(
        'btcpaywall/gutenberg-tipping-page',
        [
            'editor_script' => 'gutenberg-block-script',
            'render_callback' => 'render_tipping_pages',
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
                'logo_id' => array(
                    'type' => 'string',
                    'default' => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg'
                ),
                'background_id' => array(
                    'type' => 'string',
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
            )
        ]
    );
}

add_action('init', 'load_gutenberg');
