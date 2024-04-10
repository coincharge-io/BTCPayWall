<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Elementor/Elementor_BTCPW_Pay_Per_Template_Widget
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
class Elementor_BTCPW_Pay_Per_Template_Widget extends \Elementor\Widget_Base
{
  /**
   * @return string
   */
  public function get_name()
  {
    return 'elementor_btcpw_pay_per_templates';
  }

  /**
   * @return string
   */
  public function get_title()
  {
    return 'BTCPW Pay Per Templates';
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
        'options' => array_flip(btcpaywall_get_pay_per_templates()),
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
      ]
    );
    $this->add_control(
      'description',
      [
        'label' => 'Description',
        'type'  => \Elementor\Controls_Manager::TEXT,
        'default' => 'No description',
      ]
    );

    $this->add_control(
      'preview',
      [
        'label' => 'Preview',
        'type'  => \Elementor\Controls_Manager::MEDIA,
        'default' =>
        ['url' => "plugin_dir_url(__DIR__) . 'public/img/preview.png'"]
      ]
    );
    $this->end_controls_tab();
    $this->add_control(
      'override',
      [
        'label' => 'Override default values for price and duration',
        'type'  => \Elementor\Controls_Manager::SWITCHER,
        'default' => 'no',
      ]
    );
    $this->add_control(
      'pay_block',
      [
        'label' => 'Enable payment block',
        'type'  => \Elementor\Controls_Manager::SWITCHER,
        'default' => 'yes',
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
      ]
    );


    $this->add_control(
      'price',
      [
        'label' => 'Price',
        'type'  => \Elementor\Controls_Manager::NUMBER,
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
      ]
    );

    $this->add_control(
      'duration',
      [
        'label' => 'Duration',
        'type'  => \Elementor\Controls_Manager::NUMBER,
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
      $type = strlen($split_shortcode[0]) == 19 ? 'payblock' : 'pay_view_block';
      $payblock = $settings['pay_block'] != $split_shortcode[2] ? $settings['pay_block'] : $split_shortcode[2];

      $price = (is_numeric($settings['price']) && $settings['price'] != $split_shortcode[3]) ? $settings['price'] : $split_shortcode[3];
      $currency = (in_array($settings['currency'], BTCPayWall::CURRENCIES) && $settings['currency'] != $split_shortcode[4]) ? $settings['currency'] : $split_shortcode[4];
      $duration = (is_numeric($settings['duration']) && $settings['duration'] != $split_shortcode[5]) ? $settings['duration'] : $split_shortcode[5];
      $duration_type = (in_array($settings['duration_type'], BTCPayWall::DURATIONS) && $settings['duration_type'] != $split_shortcode[6]) ? $settings['duration_type'] : $split_shortcode[6];
      $additional = "";
      if (count($split_shortcode) === 10) {
        $title = $settings['title'] !== $split_shortcode[7] ? $settings['title'] : $split_shortcode[7];
        $description = $settings['description'] !== $split_shortcode[8] ? $settings['description'] : $split_shortcode[8];
        $preview_image = ($settings['preview']['url'] !== $split_shortcode[9]) ? $settings['preview']['url'] : $split_shortcode[9];
        $additional = "title='{$title} description='{$description} preview='{$preview_image}'";
      };
      echo "[$split_shortcode[0] $split_shortcode[1] $type='{$payblock}' price='{$price}' currency='{$currency}' duration='{$duration}' duration_type='{$duration_type}' {$additional}]";
    } else {
      $split_shortcode = explode(" ", $settings['shortcode']);
      $type = strlen($split_shortcode[0]) == 19 ? 'payblock' : 'pay_view_block';
      $additional = "";
      //var_dump($split_shortcode);
      if (count($split_shortcode) === 10) {
        $title = $settings['title'] !== $split_shortcode[7] ? $settings['title'] : $split_shortcode[7];
        $description = $settings['description'] !== $split_shortcode[8] ? $settings['description'] : $split_shortcode[8];
        $preview_image = ($settings['preview']['url'] !== $split_shortcode[9]) ? $settings['preview']['url'] : $split_shortcode[9];
        $additional = "title='{$title} description='{$description} preview='{$preview_image}'";
      };
      echo "[$split_shortcode[0] $split_shortcode[1] $type='{$payblock}' $split_shortcode[3] $split_shortcode[4] $split_shortcode[5] $split_shortcode[6] {$additional}]";
      //echo $settings['shortcode'];
    }
  }
}
