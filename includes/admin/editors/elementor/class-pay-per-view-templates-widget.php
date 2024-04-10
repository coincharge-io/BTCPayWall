<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Elementor/Elementor_BTCPW_Pay_Per_View_Template_Widget
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
class Elementor_BTCPW_Pay_Per_View_Template_Widget extends \Elementor\Widget_Base
{
  /**
   * @return string
   */
  public function get_name()
  {
    return 'elementor_btcpw_pay_per_view_templates';
  }

  /**
   * @return string
   */
  public function get_title()
  {
    return 'BTCPW Pay Per View Templates';
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
        'options' => array_flip(btcpaywall_get_templates('pay-per-view')),
      ]
    );
    $this->start_controls_tab(
      'video-video_preview',
      [
        'label' => __('Main', 'btcpaywall'),
      ]
    );
    $this->add_control(
      'title',
      [
        'label' => 'Title',
        'type'  => \Elementor\Controls_Manager::TEXT,
        'default' => 'Untitled',
        'condition' => [
          'shortcode!' => ''
        ]
      ]
    );
    $this->add_control(
      'description',
      [
        'label' => 'Description',
        'type'  => \Elementor\Controls_Manager::TEXT,
        'default' => 'No description',
        'condition' => [
          'shortcode!' => ''
        ]
      ]
    );

    $this->add_control(
      'preview',
      [
        'label' => 'Preview',
        'type'  => \Elementor\Controls_Manager::MEDIA,
        'default' =>
        ['url' => "plugin_dir_url(__DIR__) . 'public/img/preview.png'"],
        'condition' => [
          'shortcode!' => ''
        ]
      ]
    );
    $this->end_controls_tab();
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
    $split_shortcode = explode(" ", $settings['shortcode']);
    $title = $settings['title'] !== $split_shortcode[7] ? $settings['title'] : $split_shortcode[7];
    $description = $settings['description'] !== $split_shortcode[8] ? $settings['description'] : $split_shortcode[8];
    $preview_image = ($settings['preview']['url'] !== $split_shortcode[9]) ? $settings['preview']['url'] : $split_shortcode[9];
    $additional = "title='{$title}' description='{$description}' preview='{$preview_image}'";
    if ($settings['override'] === 'yes') {
      $payblock = $settings['pay_block'] != $split_shortcode[2] ? ("pay_view_block={$settings['pay_block']}") : $split_shortcode[2];

      $price = (is_numeric($settings['price']) && $settings['price'] != $split_shortcode[3]) ? $settings['price'] : $split_shortcode[3];
      $currency = (in_array($settings['currency'], BTCPayWall::CURRENCIES) && $settings['currency'] != $split_shortcode[4]) ? $settings['currency'] : $split_shortcode[4];
      $duration = (is_numeric($settings['duration']) && $settings['duration'] != $split_shortcode[5]) ? $settings['duration'] : $split_shortcode[5];
      $duration_type = (in_array($settings['duration_type'], BTCPayWall::DURATIONS) && $settings['duration_type'] != $split_shortcode[6]) ? $settings['duration_type'] : $split_shortcode[6];
      echo "[$split_shortcode[0] $split_shortcode[1] {$payblock} price='{$price}' currency='{$currency}' duration='{$duration}' duration_type='{$duration_type}' {$additional}]";
    } else {
      echo "[btcpw_start_video $split_shortcode[1] $split_shortcode[2] $split_shortcode[3] $split_shortcode[4] $split_shortcode[5] $split_shortcode[6] {$additional}]";
    }
  }
}
