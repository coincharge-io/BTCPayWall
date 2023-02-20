<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Elementor/Elementor_BTCPW_Donation_Template_Widget
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
class Elementor_BTCPW_Donation_Template_Widget extends \Elementor\Widget_Base
{
  /**
   * @return string
   */
  public function get_name()
  {
    return 'elementor_btcpw_donation_templates';
  }

  /**
   * @return string
   */
  public function get_title()
  {
    return 'BTCPW Donation Templates';
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
        'label' => __('Templates', 'btcpaywall'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'shortcode',
      [
        'label' => 'Templates',
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => array_flip(btcpaywall_get_donation_templates()),
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
