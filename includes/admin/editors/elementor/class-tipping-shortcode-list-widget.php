<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
class Elementor_BTCPW_Shortcode_List_Widget extends \Elementor\Widget_Base
{


    /**
     * @return string
     */
    public function get_name()
    {
        return 'elementor_btcpw_shortcode_list';
    }

    /**
     * @return string
     */
    public function get_title()
    {
        return 'BTCPW Shortcode List';
    }

    /**
     * @return string
     */
    public function get_icon()
    {
        return 'fa fa-btc';
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
            'content_section',
            [
                'label' => __('Content', 'btc-paywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shortcode',
            [
                'label' => 'Shortcodes',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => array_flip(allCreatedForms()),
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
        echo $settings['shortcode'];
    }
}
