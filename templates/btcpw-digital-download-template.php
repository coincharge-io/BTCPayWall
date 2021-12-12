<?php
/*
Template Name: Add to Cart
Template Post Type: digital_download
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

global $post;
$download = new BTCPayWall_Digital_Download($post->ID);


if (btcpaywall_item_in_cart($download->ID)) {
    $button_display   = "display:none;";
    $checkout_display = "";
} else {
    $button_display   = "";
    $checkout_display = "display:none;";
}
//BTCPayWall()->cart->empty_cart();
?>
<?php get_header(); ?>
<div id="primary">
    <div id="content" role="main">

        <form id="btcpaywall_download_form" action="" method="POST">

            <a href="<?php esc_attr(the_permalink(get_option('btcpw_checkout_page'))); ?>" class="btcpaywall_checkout" style=<?php echo "{$checkout_display}"; ?>>Checkout</a>

            <input type="hidden" id="btcpw_download_id" data-post_title="<?php echo esc_attr($post->post_title); ?>" data-post_id="<?php echo esc_attr($download->ID); ?>">
            <button type="submit" class="btcpaywall_add_to_cart" style=<?php echo "{$button_display}"; ?>>Add to cart</button>
        </form>
    </div>
</div>
<?php get_footer(); ?>