<style>
    .btcpw_pay {
        background-color: <?php echo esc_html($atts['background_color']); ?>;
    }

    .btcpw_pay__content h2 {
        color: <?php echo esc_html($atts['header_color']); ?>;
    }

    .btcpw_pay__content p {
        color: <?php echo esc_html($atts['info_color']); ?>;
    }

    #btcpw_pay__button {
        background-color: <?php echo esc_html($atts['button_color']); ?>;
        color: <?php echo esc_html($atts['button_txt']); ?>;
    }
</style>
<div class="btcpw_pay">
    <div class="btcpw_pay__content">
        <h2><?php echo BTCPayWall_Public::get_payblock_header_string() ?></h2>
        <p>
            <?php echo BTCPayWall_Public::get_post_info_string() ?>
        </p>
    </div>
    <div class="btcpw_pay__footer">
        <div>
            <button type="button" id="btcpw_pay__button" data-post_id="<?php echo get_the_ID(); ?>"><?php echo BTCPayWall_Public::get_payblock_button_string() ?></button>
        </div>
        <div class="btcpw_pay__loading">
            <p class="loading"></p>
        </div>
        <div class="btcpw_help">
            <a class="btcpw_help__link" href="https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/" target="_blank">Help</a>
        </div>
    </div>
</div>