<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Elementor/Elementor_BTCPW_Pay_Block_Widget
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
class BTCPayWall_Elementor_Pay_Block_Widget extends \Elementor\Widget_Base
{
    /**
     * @return string
     */
    public function get_name()
    {
        return 'btcpaywall_pay_block';
    }

    /**
     * @return string
     */
    public function get_title()
    {
        return 'BTCPayWall Pay Widget';
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
