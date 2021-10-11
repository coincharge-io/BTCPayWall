<?php
$help = filter_var(get_option('btcpw_pay_per_post_show_help_link', true), FILTER_VALIDATE_BOOLEAN);
$help_link = get_option('btcpw_pay_per_post_help_link', 'https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/');
$help_text = get_option('btcpw_pay_per_post_help_link_text', 'Help');
$additional_help = filter_var(get_option('btcpw_pay_per_post_show_additional_help_link', false), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = get_option('btcpw_pay_per_post_additional_help_link');
$additional_help_text = get_option('btcpw_pay_per_post_additional_help_link_text');
$background = get_option('btcpw_pay_per_post_background', '#ECF0F1');
$width = get_option('btcpw_pay_per_post_width', 300);
$height = get_option('btcpw_pay_per_post_height', 300);

$header_color = get_option('btcpw_pay_per_post_header_color', '#000000');
$info_color = get_option('btcpw_pay_per_post_info_color', '#000000');
$button_color = get_option('btcpw_pay_per_post_button_color', '#000000');
$button_text_color = get_option('btcpw_pay_per_post_button_text_color', '#FFFFFF');
$default_text = get_option('btcpw_pay_per_post_title', 'Pay now to unlock blogpost');
$default_button = get_option('btcpw_pay_per_post_button', 'Pay');
$default_info = get_option('btcpw_pay_per_post_info', 'For [price] [currency] you will have access to the post for [duration] [dtype]');
?>
<style>
    .btcpw_pay {
        background-color: <?php echo esc_html($background); ?>;
        width: <?php echo esc_html($width) . 'px'; ?>;
        height: <?php echo esc_html($height) . 'px'; ?>;

    }

    .btcpw_pay__content h2 {
        color: <?php echo esc_html($header_color); ?>;
    }

    .btcpw_pay__content p {
        color: <?php echo esc_html($info_color); ?>;
    }

    #btcpw_pay__button {
        background-color: <?php echo esc_html($button_color); ?>;
        color: <?php echo esc_html($button_text_color); ?>;
    }
</style>
<div class="btcpw_pay">
    <div class="btcpw_pay__content paywall_header">
        <h2><?php echo BTCPayWall_Public::get_payblock_header_string($default_text); ?></h2>

    </div>
    <div class="btcpw_pay__content paywall_info">
        <p>
            <?php echo BTCPayWall_Public::get_post_info_string(null, $default_info); ?>
        </p>
    </div>
    <div class="btcpw_pay__footer">
        <div>
            <button type="button" id="btcpw_pay__button" data-post_id="<?php echo get_the_ID(); ?>"><?php echo BTCPayWall_Public::get_payblock_button_string($default_button) ?></button>
        </div>
        <div class="btcpw_pay__loading">
            <p class="loading"></p>
        </div>
        <?php if ($help === true) : ?>
            <div class="btcpw_help">
                <a class="btcpw_help__link" href="<?php echo esc_attr($help_link); ?>" target="_blank"><?php echo esc_html($help_text); ?></a>
            </div>
        <?php endif; ?>
        <?php if ($additional_help === true) : ?>
            <div class="btcpw_additional_help">
                <a class="btcpw_additional_help__link" href="<?php echo esc_attr($additional_help_link); ?>" target="_blank"><?php echo esc_html($additional_help_text); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>