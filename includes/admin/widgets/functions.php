<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions/Widgets
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function btcpaywall_wpdocs_register_tiping_box_widget()
{
    require_once __DIR__ . '/tipping_box.php';
    register_widget(new Tipping_Box());
}
add_action('widgets_init', 'btcpaywall_wpdocs_register_tiping_box_widget');

function btcpaywall_wpdocs_register_tiping_banner_high_widget()
{
    require_once __DIR__ . '/tipping_banner_high.php';
    register_widget(new Tipping_Banner_High());
}
add_action('widgets_init', 'btcpaywall_wpdocs_register_tiping_banner_high_widget');
function btcpaywall_wpdocs_register_tiping_banner_wide_widget()
{
    require_once __DIR__ . '/tipping_banner_wide.php';
    register_widget(new Tipping_Banner_Wide());
}
add_action('widgets_init', 'btcpaywall_wpdocs_register_tiping_banner_wide_widget');
