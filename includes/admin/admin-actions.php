<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

function btcpaywall_add_my_media_button()
{

    $shortcodes = btcpaywall_all_created_forms();
    $shortcodes_list = '';
    echo '<div id=btcpw_shortcodes>';
    echo '<button type=button id=btcpw_shortcode_button>BTCPayWall Shortcodes <span><i class="fas fa-arrow-down"></i></span></button>';
    echo '<div id=sc_menu>';
    foreach ($shortcodes as $key => $val) {
        $escaped_val = esc_attr($val);
        $escaped_key = esc_html($key);
        $shortcodes_list .= "<div class='sc_menu_item btcpw_shortcode' data='{$escaped_val}'>$escaped_key</div>";
    }

    echo $shortcodes_list;
    echo '</div>';
    echo '</div>';
}
add_action('media_buttons', 'btcpaywall_add_my_media_button', 15);
