<?php
/*
*Template Name: Add to Cart
*Template Post Type: digital_download
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

global $post;
$download = new BTCPayWall_Digital_Download($post->ID);


$logo_id = get_post_meta($post->ID, 'btcpw_product_image_id', true);
$logo = wp_get_attachment_image_src($logo_id);
$price = get_post_meta($post->ID, 'btcpw_price', true) . ' ' . get_option('btcpw_default_pay_per_file_currency', 'SATS');
$description = get_post_meta($post->ID, 'btcpw_product_description', true);
?>
<style>
    .btcpw_container {
        display: <?php echo isset($logo_id) ? 'flex' : '' ?>;
        flex-direction: <?php echo isset($logo_id) ? 'row-reverse' : 'column' ?>;
        justify-content: <?php echo isset($logo_id) ? 'space-evenly' : 'center' ?>;
        min-height: 700px;
    }

    .btcpw_product_image {
        overflow: hidden;
        background-size: cover;
        background-position: center;
        background-image: url(<?php echo esc_url($logo[0]); ?>);
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
                <h1><?php the_title(); ?></h1>
                <p class="btcpw_product_price"><span class="btcpw_product_price"><em><?php echo esc_html($price); ?> incl. VAT</em></span></p>
                <div class="btcpw_product_description">
                    <?php echo esc_html__($description, 'btcpaywall'); ?>
                </div>
                <form id="btcpaywall_download_form" action="" method="POST">


                    <input type="hidden" id="btcpw_download_id" data-post_title="<?php echo esc_attr($post->post_title); ?>" data-post_id="<?php echo esc_attr($download->ID); ?>">
                    <button type="submit" class="btcpaywall_add_to_cart"><?php echo esc_html__('Buy now', 'btcpaywall'); ?></button>
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