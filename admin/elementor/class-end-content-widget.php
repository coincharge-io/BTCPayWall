<?php


class Elementor_BTCPW_End_Content_Widget extends \Elementor\Widget_Base
{


	/**
	 * @return string
	 */
	public function get_name()
	{
		return 'elementor_btcpw_end_content';
	}

	/**
	 * @return string
	 */
	public function get_title()
	{
		return 'LP Pay-per-Post End';
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
		echo do_shortcode("[btcpw_end_content]");
	}
}
