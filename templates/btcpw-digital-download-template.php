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
$logo_id = get_post_meta($post->ID, 'btcpw_product_image_id', true);
$logo = wp_get_attachment_image_src($logo_id);
$price = get_post_meta($post->ID, 'btcpw_price', true) . get_option('btcpw_default_pay_per_file_currency', 'SATS');
?>
<style>
    .btcpw_container {
        display: <?php echo isset($logo_id) ? 'flex' : '' ?>;
        flex-direction: <?php echo isset($logo_id) ? 'row-reverse' : '' ?>;
        justify-content: space-evenly;


    }

    .btcpw_container>* {
        flex: 1;
    }

    .btcpw_product_image {
        overflow: hidden;
        background-size: cover;
        background-position: center;
        background-image: url(<?php echo $logo[0]; ?>);
    }
</style>
<?php get_header(); ?>
<div class="btcpw_container">
    <div>
        <h2><?php the_title(); ?></h2>
        <p><span class="btcpw_product_price"><?php echo $price; ?> incl. VAT</span></p>
        <?php the_content(); ?>
        <?php get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
        <form id="btcpaywall_download_form" action="" method="POST">

            <a href="<?php esc_attr(the_permalink(get_option('btcpw_checkout_page'))); ?>" class="btcpaywall_checkout" style=<?php echo "{$checkout_display}"; ?>>Checkout</a>

            <input type="hidden" id="btcpw_download_id" data-post_title="<?php echo esc_attr($post->post_title); ?>" data-post_id="<?php echo esc_attr($download->ID); ?>">
            <button type="submit" class="btcpaywall_add_to_cart" style=<?php echo "{$button_display}"; ?>>Add to cart</button>
        </form>
    </div>
    <?php if (!empty($logo_id)) : ?>
        <div class="btcpw_product_image">


        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>