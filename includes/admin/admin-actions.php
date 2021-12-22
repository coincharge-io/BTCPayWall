<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

function btcpaywall_add_my_media_button()
{

    $shortcodes = btcpaywall_all_created_forms();
?>
    <div id='btcpw_shortcodes'>
        <button type='button' id='btcpw_shortcode_button'>BTCPayWall Shortcodes <span><i class="fas fa-arrow-down"></i></span></button>
        <div id='sc_menu'>
            <?php foreach ($shortcodes as $key => $val) : ?>
                <div class='sc_menu_item btcpw_shortcode' data="<?php echo esc_attr($val); ?>"><?php echo esc_html($key); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
<?php
}
add_action('media_buttons', 'btcpaywall_add_my_media_button', 15);
