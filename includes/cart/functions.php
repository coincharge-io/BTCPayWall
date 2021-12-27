<?php

/**
 * Digital Download
 *
 * @package     BTCPayWall
 * @subpackage  Functions/Cart
 * @copyright   Copyright (c) 2021, Coincharge
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since       1.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;
function btcpaywall_remove_from_cart($key)
{
    return BTCPayWall()->cart->remove($key);
}
function btcpaywall_item_in_cart($download_id = 0)
{
    return BTCPayWall()->cart->is_item_in_cart($download_id);
}
function btcpaywall_get_cart_item_name($item = array())
{
    return BTCPayWall()->cart->get_item_name($item);
}
function btcpaywall_cart_item_price($item_id = 0, $options = array())
{
    return BTCPayWall()->cart->get_item_price($item_id, $options);
}
function btcpaywall_remove_item_url($cart_key)
{
    return BTCPayWall()->cart->remove_item_url($cart_key);
}
function btcpaywall_get_total()
{
    return BTCPayWall()->cart->get_total();
}
function purchase_link()
{
    global $post;

    $download = new BTCPayWall_Digital_Download($post->ID);
    if (BTCPayWall()->cart->is_item_in_cart($download->ID)) {
        $button_display   = "display:none;";
        $checkout_display = '';
    } else {
        $button_display   = '';
        $checkout_display = "display:none;";
    }
    ob_start();
?>
    <form id="btcpaywall_download_form" action="" method="POST">

        <a href="#" class="btcpaywall_checkout" style=<?php echo "{$checkout_display}"; ?>>Checkout</a>

        <input type="hidden" name="download_id" value="<?php echo esc_attr($download->ID); ?>">
        <input type="submit" class="btcpaywall_add_to_cart" style=<?php echo "{$button_display}"; ?> />
    </form>
<?php

}
