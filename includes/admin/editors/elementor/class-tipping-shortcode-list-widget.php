<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Elementor/Elementor_BTCPW_Shortcode_List_Widget
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
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
            'content_section',
            [
                'label' => __('Content', 'btcpaywall'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shortcode',
            [
                'label' => 'Shortcodes',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => array_flip(btcpaywall_all_created_forms()),
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
