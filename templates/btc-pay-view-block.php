<?php
$help = filter_var(get_option('btcpw_pay_per_view_show_help_link', true), FILTER_VALIDATE_BOOLEAN);
$help_link = get_option('btcpw_pay_per_view_help_link', 'https://btcpaywall.com/how-to-pay-the-bitcoin-paywall/');
$help_text = get_option('btcpw_pay_per_view_help_link_text', 'Help');
$additional_help = filter_var(get_option('btcpw_pay_per_view_show_additional_help_link', false), FILTER_VALIDATE_BOOLEAN);
$additional_help_link = get_option('btcpw_pay_per_view_additional_help_link');
$additional_help_text = get_option('btcpw_pay_per_view_additional_help_link_text');
$background = get_option('btcpw_pay_per_view_background', '#ECF0F1');
$width = get_option('btcpw_pay_per_view_width', 300);
$height = get_option('btcpw_pay_per_view_height', 300);

$header_color = get_option('btcpw_pay_per_view_header_color', '#000000');
$info_color = get_option('btcpw_pay_per_view_info_color', '#000000');
$button_color = get_option('btcpw_pay_per_view_button_color', '#000000');
$button_text_color = get_option('btcpw_pay_per_view_button_text_color', '#FFFFFF');
$default_text = get_option('btcpw_pay_per_view_title', 'Pay now to unlock blogpost');
$default_button = get_option('btcpw_pay_per_view_button', 'Pay');
$default_info = get_option('btcpw_pay_per_view_info', 'For [price] [currency] you will have access to the post for [duration] [dtype]');
$preview_title_color = get_option('btcpw_pay_per_view_preview_title_color','#000000');
$preview_description_color = get_option('btcpw_pay_per_view_preview_description_color','#000000');
?>
<style>
    .btcpw_pay {
        background-color: <?php echo esc_html($background); ?>;
    }

    .btcpw_pay__content h2 {
        color: <?php echo esc_html($header_color); ?>;
    }

    .btcpw_pay__preview h3 {
        color: <?php echo esc_html($preview_title_color); ?>;
    }

    .btcpw_pay__content p {
        color: <?php echo esc_html($info_color); ?>;
    }

    .btcpw_pay__preview p {
        color: <?php echo esc_html($preview_description_color); ?>;
    }

    #btcpw_pay__button {
        background-color: <?php echo esc_html($button_color); ?>;
        color: <?php echo esc_html($button_text_color); ?>;
    }
</style>
<div class="btcpw_pay">
    <div class="btcpw_pay__content">
        <h2><?php echo BTCPayWall_Public::get_payblock_header_string() ?></h2>

    </div>
    <div class="btcpw_pay__preview">
        <div class="btcpw_pay__preview preview_img">
            <img src=<?php echo esc_url($preview_url); ?> alt="Video preview">
        </div>
        <div class="btcpw_pay__preview preview_description">
            <h3><?php echo esc_html($atts['title']); ?></h3>
            <p><?php echo esc_html($atts['description']); ?></p>
        </div>

    </div>
    <div class="btcpw_pay__content">
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
        <?php if ($help === true) : ?>
            <div class="btcpw_help">
                <a class="btcpw_help__link" href="<?php echo esc_attr($help_link); ?>" target="_blank"><?php echo esc_html($help_text); ?></a>
            </div>
        <?php endif; ?>
        <?php if ($additional_help === true) : ?>
            <div class="btcpw_help">
                <a class="btcpw_help__link" href="<?php echo esc_attr($additional_help_link); ?>" target="_blank"><?php echo esc_html($additional_help_text); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
