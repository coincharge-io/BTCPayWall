<?php
/*
*Template Name: Add to Cart
*Template Post Type: digital_product
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

global $post;
$download = new BTCPayWall_Digital_Download($post->ID);

$logo_id = get_post_meta($post->ID, 'btcpw_product_image_id', true);
$logo = wp_get_attachment_image_src($logo_id, 'full');
$price = get_post_meta($post->ID, 'btcpw_price', true) . ' ' . get_option('btcpw_default_pay_per_file_currency', 'SATS');
$description = get_post_meta($post->ID, '_btcpw_product_description', true);
$button_color = get_option('btcpw_pay_per_file_button_color', '#f6b330');
$button_text_color = get_option('btcpw_pay_per_file_button_text_color', '#FFFFFF');
$default_button = get_option('btcpw_pay_per_file_button', 'Pay');
$allowed_tags = wp_kses_allowed_html('post');
?>
<style>
    .btcpw_container {
        display: <?php echo isset($logo_id) ? 'flex' : '' ?>;
        flex-direction: <?php echo isset($logo_id) ? 'row-reverse' : 'column' ?>;
        justify-content: <?php echo isset($logo_id) ? 'space-evenly' : 'center' ?>;
        max-width: 1200px;
        margin: 0 auto;
        padding: 15px;
        position: relative;
    }

    .btcpw_product_image {
        position: relative;
        width: 40%;
        height: 400px;
    }

    .btcpw_product_image img {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        object-fit: contain;
        user-select: none;

    }

    .btcpw_product_description {
        width: 60%;
        border-bottom: 1px solid #E1E8EE;
        margin-bottom: 20px;
        padding: 20px;
    }

    .btcpw_additonal_product_description {
        margin-bottom: 20px;
    }

    .btcpw_product_description span {
        font-size: 14px;
        color: #358ED7;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
    }

    .btcpw_product_description h1 {
        font-weight: 700;
        font-size: 30px;
        color: #43484D;
        letter-spacing: -2px;
        margin: 0;
    }

    .btcpw_product_description p {
        font-size: 16px;
        font-weight: 300;
        color: #86939E;
        line-height: 24px;
    }


    .btcpaywall_add_to_cart {
        background-color: <?php echo esc_html($button_color) . ' !important'; ?>;
        color: <?php echo esc_html($button_text_color) . ' !important'; ?>;
    }

    #content {
        display: block !important;
    }

    @media (max-width: 1100px) {

        .btcpw_container {
            flex-direction: column-reverse;
            width: 90%;
            margin: 5vh 0;
        }

        .btcpw_product_image {
            width: 100%;
            height: 300px;
        }

        .btcpw_product_description {
            width: 100%;
            min-height: auto;
            margin: 10px 0;

        }

        .btcpw_product_description h1 {
            font-size: 30px;
            letter-spacing: -2px;
        }

        .btcpw_product_description p {
            font-size: 12px;
            line-height: 16px;
        }
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
                <div class="btcpw_additonal_product_description">
                    <?php echo wp_kses(nl2br($description), $allowed_tags); ?>
                </div>
                <form id="btcpaywall_download_form" action="" method="POST">


                    <input type="hidden" id="btcpw_download_id" data-post_title="<?php echo esc_attr($post->post_title); ?>" data-post_id="<?php echo esc_attr($download->ID); ?>">
                    <button type="submit" class="btcpaywall_add_to_cart"><?php echo esc_html__($default_button, 'btcpaywall'); ?></button>
                </form>
            </div>
            <?php if (!empty($logo_id)) : ?>
                <div class="btcpw_product_image">
                    <img src="<?php echo esc_url($logo[0]); ?>">
                </div>
            <?php endif; ?>
        </div>

    </section>
    <div class="btcpw_tabset">
        <input type="radio" name="tabset" id="tab1" aria-controls="btcpw_product_description" checked>
        <label for="tab1"><?php echo esc_html__('Description', 'btcpaywall'); ?></label>
        <div class="btcpw_tab-panels">
            <section id="btcpw_product_description" class="btcpw_tab-panel">
                <div><?php the_content(); ?></div>
            </section>
        </div>
    </div>
</div>