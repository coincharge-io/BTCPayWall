<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Elementor/Elementor_BTCPW_Tipping_Box_Widget
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
class Elementor_BTCPW_Tipping_Box_Widget extends \Elementor\Widget_Base
{
    /**
     * @return string
     */
    public function get_name()
    {
        return 'elementor_btcpw_tipping_box';
    }

    /**
     * @return string
     */
    public function get_title()
    {
        return 'BTCPW Tipping Box';
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
                    '250x300' => '250x300',
                    '300x300' => '300x300',
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
                'label' => 'Background color for free input field',
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffa500',
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
        $this->end_controls_section();
    }

    /**
     *
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        echo do_shortcode("[btcpw_tipping_box dimension='{$settings['dimension']}' title='{$settings['title']}' description='{$settings['description']}' currency='{$settings['currency']}' background_color='{$settings['background_color']}' title_text_color='{$settings['title_text_color']}' tipping_text='{$settings['tipping_text']}' tipping_text_color='{$settings['tipping_text_color']}' redirect='{$settings['redirect']}' description_color='{$settings['description_color']}' button_text='{$settings['button_text']}' button_text_color='{$settings['button_text_color']}' button_color='{$settings['button_color']}' button_color_hover='{$settings['button_color_hover']}' logo_id='{$settings['logo_id']['url']}' background_id='{$settings['background_id']['url']}' background='{$settings['background']}' input_background='{$settings['input_background']}']");
    }
}
