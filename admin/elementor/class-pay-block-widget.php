<?php


class Elementor_BTCPW_Pay_Block_Widget extends \Elementor\Widget_Base
{


	/**
	 * @return string
	 */
	public function get_name()
	{
		return 'elementor_btcpw_pay_block';
	}

	/**
	 * @return string
	 */
	public function get_title()
	{
		return 'BP Pay Widget';
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
		//
	}

	/**
	 *
	 */
	protected function render()
	{
		echo do_shortcode("[btcpw_pay_block]");
	}
}
