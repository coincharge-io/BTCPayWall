<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Elementor/Elementor_BTCPW_Tipping_Banner_Wide_Widget
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Elementor_BTCPW_Tipping_Banner_Wide_Widget extends \Elementor\Widget_Base
{
    /**
     * @return string
     */
    public function get_name()
    {
        return 'elementor_btcpw_tipping_banner_wide';
    }

    /**
     * @return string
     */
    public function get_title()
    {
        return 'BTCPW Tipping Banner Wide';
    }

    /**
     * @return string
     */
    public function get_icon()
    {
        return 'fab fa-btc';
    }

    /**
     * @return string[]
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     *
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'settings',
            [
                'label' => __('General', 'btcpaywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'dimension',
            [
                'label' => 'Dimension',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    '600x200' => '600x200',
                ],
            ]
        );
        $this->add_control(
            'currency',
            [
                'label' => 'Currency',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'SATS' => 'SATS',
                    'BTC' => 'BTC',
                    'EUR' => 'EUR',
                    'USD' => 'USD',
                    'GBP' => 'GBP'
                ],
                'default' => 'SATS',
            ]
        );
        $this->add_control(
            'free_input',
            [
                'label' => 'Display free input',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Show free input field',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'redirect',
            [
                'label' => 'Link to Thank you page',
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => ''
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'global',
            [
                'label' => __('Global', 'btcpaywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'background_id',
            [
                'label' => 'Background image',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'background_color',
            [
                'label' => 'Background color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#E6E6E6'
            ]
        );
        $this->add_control(
            'background',
            [
                'label' => 'Header and footer background color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#1d5aa3',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'header',
            [
                'label' => __('Header', 'btcpaywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'logo_id',
            [
                'label' => 'Logo',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => "BTCPAYWALL_PLUGIN_URL . '/assets/dist/img/BTCPayWall_logo.png'",
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => 'Title',
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => 'Support my work'
            ]
        );
        $this->add_control(
            'title_text_color',
            [
                'label' => 'Title color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => 'Description',
                'type'  => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label' => 'Description color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'main',
            [
                'label' => __('Main', 'btcpaywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'tipping_text',
            [
                'label' => 'Main text',
                'type'  => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Enter Tipping Amount',
            ]
        );

        $this->add_control(
            'tipping_text_color',
            [
                'label' => 'Main text color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
            ]
        );

        $this->add_control(
            'input_background',
            [
                'label' => 'Primary color for amount',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffa500',
                'description' => 'This color will be used as background color for all unselected amount fields and as a text and border color for selected amount field.'
            ]
        );
        $this->add_control(
            'selected_amount_background',
            [
                'label' => 'Secondary color for amount',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'description' => 'This color will be used as background color for selected amount field and as a text and border color for all unselected amount fields.'
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'footer',
            [
                'label' => __('Footer', 'btcpaywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => 'Button text',
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => 'Tipping now',
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => 'Button text color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => 'Button color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#FE642E',
            ]
        );
        $this->add_control(
            'button_color_hover',
            [
                'label' => 'Button color on hover',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#e45a29j',
            ]
        );
        $this->add_control(
            'continue_button_text',
            [
                'label' => 'Continue button text',
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => 'Continue',
            ]
        );
        $this->add_control(
            'continue_button_text_color',
            [
                'label' => 'Continue button text color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
            ]
        );
        $this->add_control(
            'continue_button_color',
            [
                'label' => 'Continue button color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#FE642E',
            ]
        );
        $this->add_control(
            'continue_button_color_hover',
            [
                'label' => 'Continue button color on hover',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFF',
            ]
        );
        $this->add_control(
            'previous_button_text',
            [
                'label' => 'Previous button text',
                'type'  => \Elementor\Controls_Manager::TEXT,
                'default' => 'Previous',
            ]
        );
        $this->add_control(
            'previous_button_text_color',
            [
                'label' => 'Previous button text color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
            ]
        );
        $this->add_control(
            'previous_button_color',
            [
                'label' => 'Previous button color',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#1d5aa3',
            ]
        );
        $this->add_control(
            'previous_button_color_hover',
            [
                'label' => 'Previous button color on hover',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFF',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'fixed_amount',
            [
                'label' => __('Fixed amount', 'btcpaywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'show_icon',
            [
                'label' => 'Show icons',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Show icons',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'value1_enabled',
            [
                'label' => 'Enable value 1',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Enable value 1',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'value1_amount',
            [
                'label' => 'Value 1 amount',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1000
            ]
        );
        $this->add_control(
            'value1_currency',
            [
                'label' => 'Value 1 currency',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'SATS' => 'SATS',
                    'BTC' => 'BTC',
                    'EUR' => 'EUR',
                    'USD' => 'USD',
                    'GBP' => 'GBP'
                ],
                'default' => 'SATS',
            ]
        );
        $this->add_control(
            'value1_icon',
            [
                'label' => 'Value 1 icon',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'fas fa-coffee'
            ]
        );
        $this->add_control(
            'value2_enabled',
            [
                'label' => 'Enable value 2',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Enable value 2',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'value2_amount',
            [
                'label' => 'Value 2 amount',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2000
            ]
        );
        $this->add_control(
            'value2_currency',
            [
                'label' => 'Value 2 currency',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'SATS' => 'SATS',
                    'BTC' => 'BTC',
                    'EUR' => 'EUR',
                    'USD' => 'USD',
                    'GBP' => 'GBP'
                ],
                'default' => 'SATS',
            ]
        );
        $this->add_control(
            'value2_icon',
            [
                'label' => 'Value 2 icon',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'fas fa-beer'
            ]
        );
        $this->add_control(
            'value3_enabled',
            [
                'label' => 'Enable value 3',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Enable value 3',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'value3_amount',
            [
                'label' => 'Value 3 amount',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3000
            ]
        );
        $this->add_control(
            'value3_currency',
            [
                'label' => 'Value 3 currency',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'SATS' => 'SATS',
                    'BTC' => 'BTC',
                    'EUR' => 'EUR',
                    'USD' => 'USD',
                    'GBP' => 'GBP'
                ],
                'default' => 'SATS',
            ]
        );
        $this->add_control(
            'value3_icon',
            [
                'label' => 'Value 3 icon',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'fas fa-cocktail'
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'donor_information',
            [
                'label' => __('Donor information', 'btcpaywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'display_name',
            [
                'label' => 'Display name',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Collect name',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'mandatory_name',
            [
                'label' => 'Mandatory',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_control(
            'display_email',
            [
                'label' => 'Display email',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Collect email',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'mandatory_email',
            [
                'label' => 'Mandatory',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_control(
            'display_address',
            [
                'label' => 'Display address',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Collect address',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'mandatory_address',
            [
                'label' => 'Mandatory',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_control(
            'display_phone',
            [
                'label' => 'Display phone',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Collect phone',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'mandatory_phone',
            [
                'label' => 'Mandatory',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_control(
            'display_message',
            [
                'label' => 'Display message',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Collect message',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'mandatory_message',
            [
                'label' => 'Mandatory',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );


        $this->end_controls_section();
    }

    /**
     *
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $free_input = filter_var($settings['free_input'], FILTER_VALIDATE_BOOLEAN);
        $show_icon = filter_var($settings['show_icon'], FILTER_VALIDATE_BOOLEAN);
        $value1_enabled = filter_var($settings['value1_enabled'], FILTER_VALIDATE_BOOLEAN);
        $value2_enabled = filter_var($settings['value2_enabled'], FILTER_VALIDATE_BOOLEAN);
        $value3_enabled = filter_var($settings['value3_enabled'], FILTER_VALIDATE_BOOLEAN);
        $display_name = filter_var($settings['display_name'], FILTER_VALIDATE_BOOLEAN);
        $display_email = filter_var($settings['display_email'], FILTER_VALIDATE_BOOLEAN);
        $display_address = filter_var($settings['display_address'], FILTER_VALIDATE_BOOLEAN);
        $display_phone = filter_var($settings['display_phone'], FILTER_VALIDATE_BOOLEAN);
        $display_message = filter_var($settings['display_message'], FILTER_VALIDATE_BOOLEAN);
        $mandatory_name = filter_var($settings['mandatory_name'], FILTER_VALIDATE_BOOLEAN);
        $mandatory_email = filter_var($settings['mandatory_email'], FILTER_VALIDATE_BOOLEAN);
        $mandatory_address = filter_var($settings['mandatory_address'], FILTER_VALIDATE_BOOLEAN);
        $mandatory_phone = filter_var($settings['mandatory_phone'], FILTER_VALIDATE_BOOLEAN);
        $mandatory_message = filter_var($settings['mandatory_message'], FILTER_VALIDATE_BOOLEAN);

        echo do_shortcode("[btcpw_tipping_banner_wide dimension='{$settings['dimension']}' title='{$settings['title']}' description='{$settings['description']}' currency='{$settings['currency']}' background_color='{$settings['background_color']}' title_text_color='{$settings['title_text_color']}' tipping_text='{$settings['tipping_text']}' tipping_text_color='{$settings['tipping_text_color']}' redirect='{$settings['redirect']}' description_color='{$settings['description_color']}' button_text='{$settings['button_text']}' button_text_color='{$settings['button_text_color']}' button_color='{$settings['button_color']}' button_color_hover='{$settings['button_color_hover']}' continue_button_text='{$settings['continue_button_text']}' continue_button_text_color='{$settings['continue_button_text_color']}' continue_button_color='{$settings['continue_button_color']}' continue_button_color_hover='{$settings['continue_button_color_hover']}' previous_button_text='{$settings['previous_button_text']}' previous_button_text_color='{$settings['previous_button_text_color']}' previous_button_color='{$settings['previous_button_color']}' previous_button_color_hover='{$settings['previous_button_color_hover']}' selected_amount_background='{$settings['selected_amount_background']}' logo_id='{$settings['logo_id']['url']}' background_id='{$settings['background_id']['url']}' background='{$settings['background']}' input_background='{$settings['input_background']}' free_input='{$settings['free_input']}' value1_enabled='{$value1_enabled}' value1_amount='{$settings['value1_amount']}' value1_currency='{$settings['value1_currency']}' value1_icon='{$settings['value1_icon']}' value2_enabled='{$value2_enabled}' value2_amount='{$settings['value2_amount']}' value2_currency='{$settings['value2_currency']}' value2_icon='{$settings['value2_icon']}' value3_enabled='{$value3_enabled}' value3_amount='{$settings['value3_amount']}' value3_currency='{$settings['value3_currency']}' value3_icon='{$settings['value3_icon']}' display_name='{$display_name}' mandatory_name='{$mandatory_name}' display_email='{$display_email}' mandatory_email='{$mandatory_email}' display_phone='{$display_phone}' mandatory_phone='{$mandatory_phone}' display_address='{$display_address}' mandatory_address='{$mandatory_address}' display_message='{$display_message}' mandatory_message='{$mandatory_message}' show_icon='{$show_icon}' free_input='{$free_input}']");
    }
}
