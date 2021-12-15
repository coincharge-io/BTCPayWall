<?php
/*
*Template Name: Add to Cart
*Template Post Type: digital_download
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
$description = get_post_meta($post->ID, 'btcpw_product_description', true);
?>
<style>
    .btcpw_container {
        display: <?php echo isset($logo_id) ? 'flex' : '' ?>;
        flex-direction: <?php echo isset($logo_id) ? 'row-reverse' : 'column' ?>;
        justify-content: <?php echo isset($logo_id) ? 'space-evenly' : 'center' ?>;


    }

    .btcpw_container>* {
        flex: 1;
    }

    .btcpw_product_description {
        margin: 20px 0;
    }

    .btcpw_product_image {
        overflow: hidden;
        background-size: cover;
        background-position: center;
        background-image: url(<?php echo $logo[0]; ?>);
    }

    .btcpw_tabset {
        margin-top: 60px;
    }

    .btcpw_tabset>input[type="radio"] {
        position: absolute;
        left: -200vw;
    }

    .btcpw_tabset .btcpw_tab-panel {
        display: none;
    }

    .btcpw_tabset>input:first-child:checked~.btcpw_tab-panels>.btcpw_tab-panel:first-child,
    .btcpw_tabset>input:nth-child(3):checked~.btcpw_tab-panels>.btcpw_tab-panel:nth-child(2) {
        display: block;
    }



    .btcpw_tabset>label {
        position: relative;
        display: inline-block;
        padding: 15px 15px 25px;
        border: 1px solid transparent;
        border-bottom: 0;
        cursor: pointer;
        font-weight: 600;
    }


    .btcpw_tabset>label:hover,
    .btcpw_tabset>input:focus+label {
        color: #06c;
    }

    .btcpw_tabset>label:hover::after,
    .btcpw_tabset>input:focus+label::after,
    .btcpw_tabset>input:checked+label::after {
        background: #06c;
    }

    .btcpw_tabset>input:checked+label {
        border-color: #ccc;
        margin-bottom: -1px;
    }

    .btcpw_tab-panel {
        padding: 30px 0;
        border-top: 1px solid #ccc;
    }

    .btcpw_product_description {
        padding: 0 30px;
    }

    #content {
        display: block !important;
    }
</style>
<?php get_header(); ?>
<?php get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
<div id="content" class="site-content">
    <section id="main">
        <div class="btcpw_container">
            <div class="btcpw_product_description">
                <h2><?php the_title(); ?></h2>
                <p><span class="btcpw_product_price"><em><?php echo $price; ?> incl. VAT</em></span></p>
                <div class="btcpw_product_description">
                    <?php echo $description; ?>
                </div>
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

    </section>
    <div class="btcpw_tabset">
        <!-- Tab 1 -->
        <input type="radio" name="tabset" id="tab1" aria-controls="btcpw_product_description" checked>
        <label for="tab1">Description</label>
        <div class="btcpw_tab-panels">
            <section id="btcpw_product_description" class="btcpw_tab-panel">
                <div><?php the_content(); ?></div>
            </section>
        </div>
    </div>
</div>