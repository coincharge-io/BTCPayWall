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
if (!defined('ABSPATH')) {
	exit;
}
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
			'content-option',
			[
				'label' => __('Option', 'btcpaywall'),
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
		$this->start_controls_tabs(
			'style_tabs'
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'content-design',
			[
				'label' => __('Paywall design', 'btcpaywall'),
			]
		);
		$this->add_control(
			'width',
			[
				'label' => 'Width',
				'type'  => \Elementor\Controls_Manager::NUMBER,
				'default' => 500
			]
		);
		$this->add_control(
			'height',
			[
				'label' => 'Height',
				'type'  => \Elementor\Controls_Manager::NUMBER,
				'default' => 600
			]
		);
		$this->add_control(
			'background_color',
			[
				'label' => 'Background color',
				'type'  => \Elementor\Controls_Manager::COLOR,
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'content-main',
			[
				'label' => __('Main', 'btcpaywall'),
			]
		);
		$this->add_control(
			'header_text',
			[
				'label' => 'Title',
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => 'Pay now to unlock blogpost',
			]
		);
		$this->add_control(
			'header_color',
			[
				'label' => 'Title color',
				'type'  => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFFFFF',
			]
		);
		$this->add_control(
			'info_text',
			[
				'label' => 'Price information',
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => 'For {price} {currency} you will have access for {duration} {dtype}.'
			]
		);
		$this->add_control(
			'info_color',
			[
				'label' => 'Price information color',
				'type'  => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFFFFF',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'content-button',
			[
				'label' => __('Buttons', 'btcpaywall'),
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => 'Button text',
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => 'Pay',
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
		$this->end_controls_tab();
		$this->start_controls_tab(
			'content-help',
			[
				'label' => __('Help link', 'btcpaywall'),
			]
		);
		$this->add_control(
			'link',
			[
				'label' => 'Display help link',
				'type'  => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'help_link',
			[
				'label' => 'Help link',
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'help_text',
			[
				'label' => 'Help link text',
				'type'  => \Elementor\Controls_Manager::TEXT,
				'default' => 'Help',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'content-additional',
			[
				'label' => __('Additional link', 'btcpaywall'),
			]
		);
		$this->add_control(
			'additional_link',
			[
				'label' => 'Display additional help link',
				'type'  => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$this->add_control(
			'additional_help_link',
			[
				'label' => 'Additional help link',
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'additional_help_text',
			[
				'label' => 'Additional help link text',
				'type'  => \Elementor\Controls_Manager::TEXT
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'content-customer-information',
			[
				'label' => __('Customer information', 'btcpaywall'),
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
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 *
	 */
	protected function render()
	{
		$settings         = $this->get_settings_for_display();
		$enable_pay_block = !empty($settings['pay_block']) ? $settings['pay_block'] : false;
		$price = $settings['price'];
		$duration = !empty($settings['duration']) ? $settings['duration'] : '';
		$duration_type = $settings['duration_type'];
		$currency = $settings['currency'];
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
		$link = filter_var($settings['link'], FILTER_VALIDATE_BOOLEAN);
		$additional_link = filter_var($settings['additional_link'], FILTER_VALIDATE_BOOLEAN);


		if ($enable_pay_block) {
			echo do_shortcode("[btcpw_start_content pay_block='true' width='{$settings['width']}' height='{$settings['height']}' background_color='{$settings['background_color']}' currency='{$currency}' duration='{$duration}' duration_type='{$duration_type}' price='{$price}' button_text='{$settings['button_text']}' header_text='{$settings['header_text']}' header_color='{$settings['header_color']}' info_text='{$settings['info_text']}' info_color='{$settings['info_color']}' link='{$link}' help_link='{$settings['help_link']}' help_text='{$settings['help_text']}' additional_link='{$additional_link}' additional_help_link='{$settings['additional_help_link']}' additional_help_text='{$settings['additional_help_text']}' button_text_color='{$settings['button_text_color']}' button_color='{$settings['button_color']}' button_color_hover='{$settings['button_color_hover']}' continue_button_text='{$settings['continue_button_text']}' continue_button_text_color='{$settings['continue_button_text_color']}' continue_button_color='{$settings['continue_button_color']}' continue_button_color_hover='{$settings['continue_button_color_hover']}' previous_button_text='{$settings['previous_button_text']}' previous_button_text_color='{$settings['previous_button_text_color']}' previous_button_color='{$settings['previous_button_color']}' previous_button_color_hover='{$settings['previous_button_color_hover']}' display_name='{$display_name}' mandatory_name='{$mandatory_name}' display_email='{$display_email}' mandatory_email='{$mandatory_email}' display_phone='{$display_phone}' mandatory_phone='{$mandatory_phone}' display_address='{$display_address}' mandatory_address='{$mandatory_address}' display_message='{$display_message}' mandatory_message='{$mandatory_message}']");
		}
	}
}
