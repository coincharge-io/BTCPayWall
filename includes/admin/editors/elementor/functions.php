<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions/Elementor
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
function load_elementor_widgets()
{
    require_once __DIR__ . '/class-start-content-widget.php';
    require_once __DIR__ . '/class-end-content-widget.php';
    require_once __DIR__ . '/class-pay-block-widget.php';
    require_once __DIR__ . '/class-start-video-widget.php';
    require_once __DIR__ . '/class-end-video-widget.php';
    //require_once __DIR__ . '/class-file-widget.php';
    require_once __DIR__ . '/class-tipping-box-widget.php';
    require_once __DIR__ . '/class-tipping-banner-high-widget.php';
    require_once __DIR__ . '/class-tipping-banner-wide-widget.php';
    require_once __DIR__ . '/class-tipping-page-widget.php';
    //require_once __DIR__ . '/class-tipping-shortcode-list-widget.php';
    require_once __DIR__ . '/class-donation-templates-widget.php';
    require_once __DIR__ . '/class-pay-per-post-templates-widget.php';
    require_once __DIR__ . '/class-pay-per-view-templates-widget.php';

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Start_Content_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_End_Content_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Pay_Block_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Start_Video_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_End_Video_Widget());
    //\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_File_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Tipping_Box_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Tipping_Banner_High_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Tipping_Banner_Wide_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Tipping_Page_Widget());
    //\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Shortcode_List_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Donation_Template_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Pay_Per_Post_Template_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Elementor_BTCPW_Pay_Per_View_Template_Widget());
}
add_action('elementor/widgets/widgets_registered', 'load_elementor_widgets');
