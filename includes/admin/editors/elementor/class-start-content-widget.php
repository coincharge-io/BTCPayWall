<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Elementor/Elementor_BTCPW_Start_Content_Widget
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
class Elementor_BTCPW_Start_Content_Widget extends \Elementor\Widget_Base
{


	/**
	 * @return string
	 */
	public function get_name()
	{
		return 'elementor_btcpw_start_content';
	}

	/**
	 * @return string
	 */
	public function get_title()
	{
		return 'BTCPW Pay-per-Post Start';
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
					'Default' => '',
					'SATS' => 'SATS',
					'EUR' => 'EUR',
					'USD' => 'USD',
				],
				'default' => 'Default',
			]
		);
		$this->add_control(
			'btc_format',
			[
				'label' => 'BTC format',
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition'	=> [
					'currency'	=> 'SATS'
				],
				'options' => [
					'Default' => '',
					'SATS' => 'SATS',
					'BTC'  => 'BTC',
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
					'default' => '',
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

		$settings         = $this->get_settings_for_display();
		$enable_pay_block = $settings['pay_block'];
		$price = $settings['price'];
		$duration = $settings['duration'];
		$duration_type = $settings['duration_type'];
		$currency = $settings['currency'];
		$btc_format = $settings['btc_format'];
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
		if ($enable_pay_block) {
			echo do_shortcode("[btcpw_start_content pay_block='true' currency='{$currency}' btc_format='{$btc_format}' duration='{$duration}' duration_type='{$duration_type}' price='{$price}' display_name='{$display_name}' mandatory_name='{$mandatory_name}' display_email='{$display_email}' mandatory_email='{$mandatory_email}' display_phone='{$display_phone}' mandatory_phone='{$mandatory_phone}' display_address='{$display_address}' mandatory_address='{$mandatory_address}' display_message='{$display_message}' mandatory_message='{$mandatory_message}']");
		}
	}
}
