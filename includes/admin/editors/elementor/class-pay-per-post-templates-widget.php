<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Elementor/Elementor_BTCPW_Pay_Per_Post_Template_Widget
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
class Elementor_BTCPW_Pay_Per_Post_Template_Widget extends \Elementor\Widget_Base
{
  /**
   * @return string
   */
  public function get_name()
  {
    return 'elementor_btcpw_pay_per_post_templates';
  }

  /**
   * @return string
   */
  public function get_title()
  {
    return 'BTCPW Pay Per Post Templates';
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
        'options' => array_flip(btcpaywall_get_templates('pay-per-post')),
      ]
    );
    $this->add_control(
      'override',
      [
        'label' => 'Override default values for template',
        'type'  => \Elementor\Controls_Manager::SWITCHER,
        'default' => 'no',
        'condition' => [
          'shortcode!' => ''
        ]
      ]
    );
    $this->add_control(
      'pay_block',
      [
        'label' => 'Enable payment block',
        'type'  => \Elementor\Controls_Manager::SWITCHER,
        'default' => 'yes',
        'condition' => [
          'override!' => 'no',
          'shortcode!' => ''
        ]
      ]
    );

    $this->add_control(
      'currency',
      [
        'label' => 'Currency',
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
          'BTC' => 'BTC',
          'SATS' => 'SATS',
          'EUR' => 'EUR',
          'USD' => 'USD',
          'GBP' => 'GBP'
        ],
        'default' => 'Default',
        'condition' => [
          'override!' => 'no',
          'shortcode!' => ''
        ]
      ]
    );


    $this->add_control(
      'price',
      [
        'label' => 'Price',
        'type'  => \Elementor\Controls_Manager::NUMBER,
        'condition' => [
          'override!' => 'no',
          'shortcode!' => ''
        ]
      ]
    );

    $this->add_control(
      'duration_type',
      [
        'label' => 'Duration type',
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
          'minute' => 'minute',
          'hour' => 'hour',
          'week' => 'week',
          'month' => 'month',
          'year' => 'year',
          'onetime' => 'onetime',
          'unlimited' => 'unlimited'
        ],
        'default' => 'default',
        'condition' => [
          'override!' => 'no',
          'shortcode!' => ''
        ]
      ]
    );

    $this->add_control(
      'duration',
      [
        'label' => 'Duration',
        'type'  => \Elementor\Controls_Manager::NUMBER,
        'condition' => [
          'override!' => 'no',
          'shortcode!' => ''
        ]
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
    if ($settings['override'] === 'yes') {
      $split_shortcode = explode(" ", $settings['shortcode']);
      $payblock = $settings['pay_block'] != $split_shortcode[2] ? ("payblock={$settings['pay_block']}") : $split_shortcode[2];

      $price = (is_numeric($settings['price']) && $settings['price'] != $split_shortcode[3]) ? $settings['price'] : $split_shortcode[3];
      $currency = (in_array($settings['currency'], BTCPayWall::CURRENCIES) && $settings['currency'] != $split_shortcode[4]) ? $settings['currency'] : $split_shortcode[4];
      $duration = (is_numeric($settings['duration']) && $settings['duration'] != $split_shortcode[5]) ? $settings['duration'] : $split_shortcode[5];
      $duration_type = (in_array($settings['duration_type'], BTCPayWall::DURATIONS) && $settings['duration_type'] != $split_shortcode[6]) ? $settings['duration_type'] : $split_shortcode[6];
      echo "[$split_shortcode[0] $split_shortcode[1] {$payblock} price='{$price}' currency='{$currency}' duration='{$duration}' duration_type='{$duration_type}']";
    } else {
      echo $settings['shortcode'];
    }
  }
}
